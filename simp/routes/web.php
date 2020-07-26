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
    return redirect()->route('user.home.index');
});


//Route::get('penelitian', 'PenelitianController@index');
//Route::get('penelitian/create', 'PenelitianController@create');
//Route::post('penelitian', 'PenelitianController@store');

Route::group(['prefix' => 'admin'], function (){
    Route::get('login', 'Admin\AuthController@getLogin')->name('admin.login');
    Route::post('login', 'Admin\AuthController@login')->name('admin.login.submit');
    Route::get('logout', 'Admin\AuthController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AkunController@index')->name('admin.akun.index');

    Route::get('judul', 'Admin\JudulController@index')->name('admin.judul.index');
    Route::get('download/{proposal}/{jenis_proposal}', 'Admin\JudulController@download')->name('admin.judul.download');
    Route::get('download-penilaian/{proposal}/{jenis_proposal}', 'Admin\JudulController@downloadPenilaian')->name('admin.judul.download.penilaian');
    Route::get('monev', 'Admin\MonevController@index')->name('admin.monev.index');
    Route::get('hki', 'Admin\HkiController@index')->name('admin.hki.index');

    Route::get('akun/dosen', 'Admin\AkunDosenController@index')->name('admin.dosen.index');
    Route::post('akun/dosen/import', 'Admin\AkunDosenController@import')->name('admin.dosen.import');
    Route::get('akun/dosen/create', 'Admin\AkunDosenController@create')->name('admin.dosen.create');
    Route::post('akun/dosen/store', 'Admin\AkunDosenController@store')->name('admin.dosen.store');
    Route::get('akun/dosen/{id}/edit', 'Admin\AkunDosenController@edit')->name('admin.dosen.edit');
    Route::patch('akun/dosen/update/{id}', 'Admin\AkunDosenController@update')->name('admin.dosen.update');
    Route::get('akun/dosen/destroy/{id}', 'Admin\AkunDosenController@destroy')->name('admin.dosen.destroy');


    Route::get('akun/reviewer', 'Admin\AkunReviewerController@index')->name('admin.reviewer.index');
    Route::post('akun/reviewer/import', 'Admin\AkunReviewerController@import')->name('admin.reviewer.import');
    Route::get('akun/reviewer/create', 'Admin\AkunReviewerController@create')->name('admin.reviewer.create');
    Route::post('akun/reviewer/store', 'Admin\AkunReviewerController@store')->name('admin.reviewer.store');
    Route::get('akun/reviewer/{id}/edit', 'Admin\AkunReviewerController@edit')->name('admin.reviewer.edit');
    Route::patch('akun/reviewer/{id}/update', 'Admin\AkunReviewerController@update')->name('admin.reviewer.update');
    Route::get('akun/reviewer/{id}/destroy', 'Admin\AkunReviewerController@destroy')->name('admin.reviewer.destroy');

    Route::get('akun/kap3m', 'Admin\AkunKap3mController@index')->name('admin.kap3m.index');
    Route::get('akun/kap3m/create', 'Admin\AkunKap3mController@create')->name('admin.kap3m.create');
    Route::post('akun/kap3m/store', 'Admin\AkunKap3mController@store')->name('admin.kap3m.store');
    Route::get('akun/kap3m/{id}/edit', 'Admin\AkunKap3mController@edit')->name('admin.kap3m.edit');
    Route::patch('akun/kap3m/update/{id}', 'Admin\AkunKap3mController@update')->name('admin.kap3m.update');
    Route::get('akun/kap3m/destroy/{id}', 'Admin\AkunKap3mController@destroy')->name('admin.kap3m.destroy');
});

Route::group(['prefix' => 'user'], function (){
    Route::get('login', 'User\AuthController@getLogin')->name('user.login');
    Route::post('login', 'User\AuthController@login')->name('user.login.submit');
    Route::get('logout', 'User\AuthController@logout')->name('user.logout');

    Route::get('/', 'User\HomeController@index')->name('user.home.index');
    Route::get('/penelitian/create', 'User\PenelitianController@create')->name('user.penelitian.create');
    Route::post('/penelitian/create', 'User\PenelitianController@store')->name('user.penelitian.store');

    Route::get('penelitian/revisi', 'User\PenelitianController@revisian')->name('user.penelitian.revisi');
    Route::patch('penelitian/{id}/revisi/upload', 'User\PenelitianController@uploadProposalAgain')->name('user.penelitian.uploadProposalAgain');
    Route::get('penelitian/download', 'User/PenelitianController@download')->name('user.penelitian.download');

    Route::get('penelitian/laporan', 'User\LaporanController@index')->name('user.laporan.index');
    Route::post('penelitian/laporan', 'User\LaporanController@store')->name('user.laporan.store');

    Route::get('/pengabdian/create', 'User\PengabdianController@create')->name('user.pengabdian.create');
    Route::post('/pengabdian/create', 'User\PengabdianController@store')->name('user.pengabdian.store');

    Route::get('pengabdian/revisi', 'User\PengabdianController@revisian')->name('user.pengabdian.revisi');
    Route::patch('pengabdian/{id}/revisi/upload', 'User\PengabdianController@uploadProposalAgain')->name('user.pengabdian.uploadProposalAgain');
    Route::get('pengabdian/download', 'User/PengabdianController@download')->name('user.pengabdian.download');

    Route::get('/hki/create', 'User\HkiController@create')->name('user.hki.create');
    Route::post('/hki/create', 'User\HkiController@store')->name('user.hki.store');

});

Route::group(['prefix' => 'reviewer'], function (){
   Route::get('login', 'Reviewer\AuthController@getLogin')->name('reviewer.login');
   Route::post('a/login', 'Reviewer\AuthController@login')->name('reviewer.login.submit');
   Route::get('logout', 'Reviewer\AuthController@logout')->name('reviewer.logout');

   Route::get('penelitian','Reviewer\PenelitianController@index')->name('reviewer.penelitian.index');
   Route::get('penelitian/download/{proposal}', 'Reviewer\PenelitianController@download')->name('reviewer.penelitian.download');
   Route::get('penelitian/revisi_proposal/{id}','Reviewer\PenelitianController@getRevisiProposal')->name('reviewer.penelitian.get_revisi_proposal');
   Route::patch('penelitian/revisi_proposal/{id}','Reviewer\PenelitianController@RevisiProposal')->name('reviewer.penelitian.revisi_proposal');
   Route::get('penelitian/acc_proposal/{id}','Reviewer\PenelitianController@acc')->name('reviewer.penelitian.acc_proposal');
   Route::get('penelitian/nilai/{id}','Reviewer\PenelitianController@nilai')->name('reviewer.penelitian.nilai');
   Route::post('penelitian/{id}/pdf','Reviewer\PenelitianController@pdf')->name('reviewer.penelitian.pdf');

   Route::get('pengabdian','Reviewer\PengabdianController@index')->name('reviewer.pengabdian.index');
   Route::get('pengabdian/download/{proposal}', 'Reviewer\PengabdianController@download')->name('reviewer.pengabdian.download');
   Route::get('pengabdian/revisi_proposal/{id}','Reviewer\PengabdianController@getRevisiProposal')->name('reviewer.pengabdian.get_revisi_proposal');
   Route::patch('pengabdian/revisi_proposal/{id}','Reviewer\PengabdianController@RevisiProposal')->name('reviewer.pengabdian.revisi_proposal');
   Route::get('pengabdian/acc_proposal/{id}','Reviewer\PengabdianController@acc')->name('reviewer.pengabdian.acc_proposal');
   Route::get('pengabdian/nilai/{id}','Reviewer\PengabdianController@nilai')->name('reviewer.pengabdian.nilai');
   Route::post('pengabdian/{id}/pdf','Reviewer\PengabdianController@pdf')->name('reviewer.pengabdian.pdf');
});

Route::group(['prefix'=> 'kap3m'], function (){
    Route::get('login', 'Kap3m\AuthController@getLogin')->name('kap3m.login');
    Route::post('login', 'Kap3m\AuthController@login')->name('kap3m.login.submit');
    Route::get('logout', 'Kap3m\AuthController@logout')->name('kap3m.logout');

    Route::get('/', 'Kap3m\HomeController@index')->name('kap3m.home.index');
    Route::get('download/{proposal}/{jenis_proposal}', 'Kap3m\HomeController@download')->name('kap3m.download');
    Route::get('download-penilaian/{proposal}/{jenis_proposal}', 'Kap3m\HomeController@downloadPenilaian')->name('kap3m.download.penilaian');

    Route::get('tolak/{id}', 'Kap3m\HomeController@tolak')->name('kap3m.tolak');
    Route::get('terima/{id}', 'Kap3m\HomeController@terima')->name('kap3m.terima');
});

Route::get('auth/login', 'AuthCoba\LoginController@getLogin')->name('auth.login');
Route::post('auth/login', 'AuthCoba\LoginController@login')->name('auth.login.submit');
Route::get('auth/logout', 'AuthCoba\LogoutController@logout')->name('auth.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
