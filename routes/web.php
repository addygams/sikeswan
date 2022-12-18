<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DiagnosaSementaraController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\ListPenunjangController;
use App\Http\Controllers\RekamAktifController;
use App\Http\Controllers\RekamPasifController;
use App\Http\Controllers\TenagaMedikController;
use App\Http\Controllers\PenunjangController;
use App\Http\Controllers\TerapiTambahanController;
use App\Http\Controllers\DaftarAktifController;
use App\Http\Livewire\Daftars;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2;

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
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/layanan1', 'App\Http\Controllers\GuestController@index')->name('layanan1');
Route::get('/layanan2', 'App\Http\Controllers\GuestController@index2')->name('layanan2');
Route::get('/profil', 'App\Http\Controllers\GuestController@profil')->name('profil');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

// Route::get('/daftar',function(){
//     return view('daftar');
// })->name('daftar');

Route::get('/daftarAktif', 'App\Http\Controllers\GuestController@show')->name('daftarAktif');

Route::middleware(['auth:sanctum', 'verified'])->get('daftaraktifs.index', function () {
    return view('daftaraktifs.index');
})->name('daftaraktifs.index');

// Route::get('daftarAktif/destroy/{rekamAktif}', 'App\Http\Controllers\DaftarAktifController@destroy');
Route::resource('daftaraktifs', DaftarAktifController::class);
Route::get('/daftars/showall', 'App\Http\Controllers\DaftarController@lihatsemua')->name('daftars.showall');
Route::resource('daftars', DaftarController::class);
Route::get('/daftars/create', 'App\Http\Controllers\DaftarController@create')->name('daftar');
Route::get('daftars/destroy/{daftar}', 'App\Http\Controllers\DaftarController@destroy');
Route::get('/kuotas/showall', 'App\Http\Controllers\KuotaController@lihatsemua')->name('kuotas.showall');
Route::resource('kuotas', KuotaController::class);
Route::get('kuotas/destroy/{kuota}', 'App\Http\Controllers\KuotaController@destroy');
Route::resource('obats', ObatController::class);
Route::resource('golongans', GolonganController::class);
Route::post('/obats/index', 'App\Http\Controllers\GolonganController@store')->name('store');
Route::get('/golongandelete/{id_golongan}', 'App\Http\Controllers\GolonganController@destroy');
Route::resource('rekamaktifs', RekamAktifController::class);
Route::get('rekamaktifs/destroy/{rekamAktif}', 'App\Http\Controllers\RekamAktifController@destroy');
Route::resource('rekampasifs', RekamPasifController::class);
Route::get('rekampasifs/delete/{penunjang}', 'App\Http\Controllers\RekamPasifController@delete')->name('rekampasifs.delete');
Route::get('rekampasifs/destroy/{rekampasif}', 'App\Http\Controllers\RekamPasifController@destroy');
Route::get('rekampasifs/deleteObat/{pakai}', 'App\Http\Controllers\RekamPasifController@deleteObat');
Route::resource('tenagamediks', TenagaMedikController::class);
Route::get('tenagamediks/destroy/{tenagamedik}', 'App\Http\Controllers\TenagaMedikController@destroy');
Route::post('/diagnosasementaras/search',[DiagnosaSementaraController::class,'showDiagnosa'])->name('diagnosasementaras.search');
Route::resource('diagnosasementaras', DiagnosaSementaraController::class);
Route::get('diagnosasementaras/destroy/{diagnosasementara}', 'App\Http\Controllers\DiagnosaSementaraController@destroy');
// Route::resource('penunjangs', PenunjangController::class);
Route::get('tambahans/destroy/{tambahan}', 'App\Http\Controllers\TerapiTambahanController@destroy');
Route::post('/tambahans/search',[TerapiTambahanController::class,'showTambahan'])->name('tambahans.search');
Route::resource('tambahans', TerapiTambahanController::class);
Route::post('/listpenunjangs/search',[ListPenunjangController::class,'showPenunjang'])->name('listpenunjangs.search');
Route::get('listpenunjangs/destroy/{listpenunjang}', 'App\Http\Controllers\ListPenunjangController@destroy');
Route::resource('listpenunjangs', ListPenunjangController::class);
Route::get('getKelurahan','App\Http\Controllers\GuestController@getKelurahan')->name('getKelurahan');
Route::get('/daftaraktifs/showall', 'App\Http\Controllers\DaftarAktifController@lihatsemua')->name('daftaraktifs.showall');
Route::get('select2', Select2::class);

