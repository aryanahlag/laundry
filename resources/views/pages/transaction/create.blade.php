@extends('layouts.master', ["activePage" => "Package", "titlePage" => "Paket" ])

@section('title')
    <h1>Form Transaksi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paket</label>
                                <button type="button" class="btn btn-block btn-light" data-toggle="modal" data-target="#modal-package" id="findP"><i class="fa fa-search"></i> Cari Paket </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Paket</label>
                                <input type="text" readonly class="form-control" name="name" id="package">
                                <input type="hidden" name="pid" id="package-id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kuantitas(satuan)</label>
                                <input type="text" min="1" class="form-control" name="qty" id="qty">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga(RP)</label>
                                <input type="text" readonly min="1" class="form-control" name="price" id="price">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="tambah" class="btn btn-block btn-sm btn-success "><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <hr>
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <select name="member_id" id="inputMember" class="form-control" ="">
                          <option value="">Pilih Member</option>
                          @foreach(\App\Member::orderBy('name', 'asc')->get() as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                          @endforeach
                        </select>
                        <small><a href="{{ route('krit-member') }}"><i class="fas fa-plus-square"></i> Buat Member baru</a></small>
                    </div>
                    <input type="hidden" id="sid">
                    <div class="table-responsive">
                        <form action="{{ route('admin.transaksi.store') }}" id="form-transaction" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paket</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody" data-cek="false">

                            </tbody>
                        </table>
                        <h4 id="subtot" style="font-weight: bold;">
                            Sub Total :
                        </h4>
                        </form>
                    </div>
                    <hr>
                    <div class="final">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Batas Akhir</label>
                                    <input type="date" value="{{ $now }}" name="date_line" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pajak(%)</label>
                                    <input type="number" min="0" name="tax" id="tax" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Diskon(%)</label>
                                    <input type="number" min="0" name="discount" id="discount" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Biaya Tambahan(Rp)</label>
                                    <input type="number" min="0" name="addit_pay" id="addit_pay" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="inputOrder" class="btn btn-block btn-success"><i class="fas fa-shopping-cart"></i> Order</button>
    <div class="modal fade" id="modal-package" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title package" id="exampleModalScrollableTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body package">
              {{-- <div class="table-responsive"> --}}
                  <table id="tablePackage" class="table table-stripped" style="width: 100%">
                      <thead>
                          <tr>
                              <th>Nama</th>
                              <th>Harga</th>
                              <th>*</th>
                          </tr>
                      </thead>
                  </table>
              {{-- </div> --}}
            </div>
            <div class="modal-footer package">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">&times; Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('js')
<script>
    $(document).ready( function () {
        $('#tablePackage').DataTable({
            "ajax" : "{{ route('admin.findPack') }}",
            "columns" : [
                {"data" : "name", render : function (a,b,c) {
                    return `<span data-s-name="${c.name}" class="s-name">${c.name}</span>`;
                }},
                {"data" : "price", render : function (a,b,c) {
                     return `<span data-s-price="${c.price}" class="s-price">${c.price}</span>`;
                }},
                {"data" : "id", render: function (a,b,c) {
                    return `<a href="javascript:void(0)" class="s-sid s-package badge badge-info" data-s-sid="${c.id}" data-s-price="${c.price}" data-s-name="${c.name}><i class="fa fa-check-circle"></i> Pilih</a>`
                }},
            ]
        });
    });

    $('body').on('click', '.s-package',function (e) {
        e.preventDefault();
        let sid = $(this).attr('data-s-sid');
        let name = $(this).attr('data-s-name');
        let p = $(this).attr('data-s-price');
        package.val(name);
        price.val(p);
        packageId.attr('data-s-sid', sid)
        $('#modal-package').modal('hide');
    });
</script>
<script src="{{ asset('js/transaction.js') }}"></script>
@endpush
