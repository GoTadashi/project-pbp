<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/action-login', [App\Http\Controllers\controller_api_login::class, 'actionLogin']);

Route::post('/action-register', [App\Http\Controllers\controller_api_register::class, 'actionRegister']);

Route::post('/cari-siswa', [App\Http\Controllers\controller_api_siswa::class, 'cari']);
Route::get('/get-siswa', [App\Http\Controllers\controller_api_siswa::class, 'getSiswa']);
Route::get('/get-siswa/{nis}', [App\Http\Controllers\controller_api_siswa::class, 'getByIdSiswa']);
Route::post('/add-siswa', [App\Http\Controllers\controller_api_siswa::class, 'addSiswa']);
Route::post('/update-siswa', [App\Http\Controllers\controller_api_siswa::class, 'updateSiswa']);
Route::get('/delete-siswa/{nis}', [App\Http\Controllers\controller_api_siswa::class, 'deleteSiswa']);

Route::get('/get-guru', [App\Http\Controllers\controller_api_guru::class, 'getGuru']);
Route::get('/get-guru/{id_guru}', [App\Http\Controllers\controller_api_guru::class, 'getByIdGuru']);
Route::post('/add-guru', [App\Http\Controllers\controller_api_guru::class, 'addGuru']);
Route::post('/update-guru', [App\Http\Controllers\controller_api_guru::class, 'updateGuru']);
Route::get('/delete-guru/{id_guru}', [App\Http\Controllers\controller_api_guru::class, 'deleteGuru']);

Route::get('/get-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'getMatapelajaran']);
Route::post('/add-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'addMatapelajaran']);
Route::post('/update-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'updateMatapelajaran']);
Route::get('/delete-matapelajaran/{id_matapelajaran}', [App\Http\Controllers\controller_api_matapelajaran::class, 'deleteMatapelajaran']);

Route::get('/get-raport', [App\Http\Controllers\controller_api_raport::class, 'getRaport']);
Route::get('/get-raport/{nis}', [App\Http\Controllers\controller_api_raport::class, 'getRaportByNIS']);
Route::get('/get-raportDetail/{id_detail}', [App\Http\Controllers\controller_api_raport::class, 'getRaportByDetail']);
Route::get('/get-raport/{nis}/{kelas}-{semester}', [App\Http\Controllers\controller_api_raport::class, 'getRaportByNISKS']);
Route::get('/get-raport-main', [App\Http\Controllers\controller_api_raport::class, 'getRaportMain']);
Route::get('/get-raport-main/{nis}', [App\Http\Controllers\controller_api_raport::class, 'getRaportMainByNIS']);
Route::post('/add-raport', [App\Http\Controllers\controller_api_raport::class, 'addRaport']);
Route::post('/add-detail', [App\Http\Controllers\controller_api_raport::class, 'addDetailRaport']);
Route::post('/update-raport', [App\Http\Controllers\controller_api_raport::class, 'updateRaport']);
Route::post('/update-detail', [App\Http\Controllers\controller_api_raport::class, 'updateDetailRaport']);
Route::get('/delete-raport/{id_raport}', [App\Http\Controllers\controller_api_raport::class, 'deleteRaport']);
Route::get('/delete-detail/{id_detail}', [App\Http\Controllers\controller_api_raport::class, 'deleteDetailRaport']);

Route::get('/cari-siswa/{cari}', [App\Http\Controllers\controller_api_adds::class, 'cariSiswa']);
Route::get('/cari-guru/{cari}', [App\Http\Controllers\controller_api_adds::class, 'cariGuru']);
Route::get('/cari-kelas/{cari}', [App\Http\Controllers\controller_api_adds::class, 'cariKelas']);
