<?php

namespace App\Http\Controllers;

use App\Cashier;
use App\detailTransaction;
use App\Package;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Date;
use Auth;
use DB;
use DataTables;
use Validator;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.index');
    }

    public function create()
    {
        $data = [];
        $data['now'] = date('Y-m-d');
        return view('pages.transaction.create', $data);
    }

    public function invoice()
    {
        $query = DB::table('transaction')->max('invoice');
        // $kodeB = Inventaris::all();
        $date = date("ymdh");

        if ($query != null) {
            $value = substr($query, 11, 11);
            $code = (int) $value;
            // tambah 1
            $code = $code + 1;
            $auto_code = "RCK". $date . str_pad($code, 4, "0",  STR_PAD_LEFT);
        } else {
            $auto_code = "RCK". $date . "0001";
        }

        return $auto_code;
    }

    public function store(Request $request)
    {
        $cashier = Cashier::where('user_id', Auth::id())->first();
        $transaction = Transaction::create([
            'invoice' => $this->invoice(),
            'date' => Date::now()->format('Y/m/d'),
            'date_pay' => NULL,
            'pay' => $request->pay,
            'date_line' => $request->date_line,
            'status' => "baru",
            'tax' => $request->tax,
            'discount' => $request->discount,
            'addit_pay' => $request->addit_pay,
            'outlet_id' => $cashier,
            'member_id' => $request->member_id,
            'user_id' => Auth::user()->id,
        ]);

        if(count($request->pack_id) > 0){
            foreach($request->pack_id as $i => $v){
                $data = [
                    'transaction_id' => $transaction->id,
                    'package_id' => $request->pack_id[$i],
                    'qty' => $request->qty[$i],
                    'info' => $request->info[$i],
                ];

                $dTrans = detailTransaction::create($data);
            }
        }

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        if ($data->pay_process == 'belumDibayar') {
            return response()->json(['msg' => 'Belum melakukan PEMBAYARAN'], 401);
        }
        if ($data->status != 'diambil') {
            return response()->json(['msg' => 'Barang belum DIAMBIL'], 401);
        }

        $data->delete();

        return response()->json(['msg' => 'Data Dibuang'], 200);
    }

    public function updateStatus($ids)
    {
        Transaction::find($ids)->update(['pay_process'=>'diambil']);
        return redirect()->back();
    }

    public function datatables()
    {
        $trans = '';
        $trans = Transaction::with(['outlet', 'user', 'detailTransaction', 'member'])->where('pay_process', '!=' ,'dibayar')->orderBy('created_at', 'asc');

        return DataTables::of($trans)
            ->addColumn('total_price', function ($trans){
                $dt = DB::table('detail_transactions')
                    ->join('packages', 'detail_transactions.package_id', '=', 'packages.id')
                    ->select(DB::raw('SUM(detail_transactions.qty * packages.price) AS total'))
                    ->where('detail_transaction.transaction_id', $trans->id)
                    // ->count();
                    ->first();
                $tax = $trans->tax/100 * $dt->total;
                $discount = $trans->discount/100 * $dt->total;
                return $dt->total + $tax - $discount + $trans->addit_pay;
            })
            ->addColumn('action', function($trans){
                return view('pages.transaction.action', [
                    'model' => $trans,
                    'url_transaksi' => route('admin.transaksi.fix', $trans->id),
                    'url_edit' => route('admin.transaksi.edit', $trans->id),
                    'url_delete' => route('admin.transaksi.destroy', $trans->id),
                ]);
            })->rawColumns(['action', 'total_harga'])->addIndexColumn()->make(true);
    }
}
