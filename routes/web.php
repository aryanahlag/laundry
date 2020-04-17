<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('r.o.c.k.e.t/reg', 'AdminController@getRegister')->name('getRegister')->middleware('guest');
Route::post('/pro/ses/reg', 'AdminController@postRegister')->name('postRegister')->middleware('guest');

Route::get('/init', 'HomeController@init')->name('init');

Route::middleware('auth')->group(function(){
	// admin
	Route::group(['prefix'=>'/admin', 'as'=>'admin.', 'middleware'=>'admin'], function(){

		// dashboard
        Route::get('/dashboard', 'DashboardController@admin')->name('dashboard');

        //type
        Route::resource('/jenis', 'TypeController');
        // user
        Route::resource('/r-l-u', 'UserController');

        //account
        Route::get('/akun', 'AccountController@account')->name('account');
        Route::get('/aktivitas', 'AccountController@logActivity')->name('activity');

        //unsolved notif double unique username
        Route::resource('/kasir', 'CashierController');
        Route::resource('/owner', 'OwnerController');

        Route::resource('/outlet', 'OutletController');
        Route::resource('/paket', 'PackageController');
        Route::get('/findPack', 'PackageController@findPack')->name('findPack');
        Route::resource('/member', 'MemberController');

        Route::resource('/transaksi', 'TransactionController', ['only' => ['index', 'create', 'destroy', 'invoice', 'store']]);
        Route::get('/transaksi/data', 'TransactionController@datatables')->name('transaksi.data');
        Route::put('/transaksi/status/{id}', 'TransactionController@updateStatus')->name('transaksi.status');

	});
    Route::get('/m/a', 'MemberController@kritTrans')->name('krit-member');
    Route::post('/m/e', 'MemberController@mTrans')->name('stor-member');
    Route::get('/m', 'TransactionController@tPackage')->name('tpackage');
	//employee
	Route::group(['prefix' => '/kasir', 'as'=>'kasir.', 'middleware'=>'kasir'], function(){
        Route::resource('/transaksi', 'Transaction2Controller', ['only' => ['index', 'create', 'destroy', 'invoice', 'store']]);
        Route::get('/transaksi/data', 'Transaction2Controller@datatables')->name('transaksi.data');
        Route::put('/transaksi/status/{id}', 'Transaction2Controller@updateStatus')->name('transaksi.status');
	});
	//member
	Route::group(['prefix' => '/owner', 'as'=>'owner.', 'middleware'=>'owner'], function(){
        Route::get('/report/data', 'ReportController@datatables')->name('report.data');
    });
    Route::get('/r', 'ReportController@index')->name('rOwner');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
