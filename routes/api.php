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

Route::get('/get-siswa', [App\Http\Controllers\controller_api_siswa::class, 'getSiswa']);
Route::post('/add-siswa', [App\Http\Controllers\controller_api_siswa::class, 'addSiswa']);
Route::post('/update-siswa', [App\Http\Controllers\controller_api_siswa::class, 'updateSiswa']);
Route::get('/delete-siswa/{nis}', [App\Http\Controllers\controller_api_siswa::class, 'deleteSiswa']);


Route::get('/get-guru', [App\Http\Controllers\controller_api_guru::class, 'getGuru']);
Route::post('/add-guru', [App\Http\Controllers\controller_api_guru::class, 'addGuru']);
Route::post('/update-guru', [App\Http\Controllers\controller_api_guru::class, 'updateGuru']);
Route::get('/delete-guru/{id_guru}', [App\Http\Controllers\controller_api_guru::class, 'deleteGuru']);

Route::get('/get-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'getMatapelajaran']);
Route::post('/add-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'addMatapelajaran']);
Route::post('/update-matapelajaran', [App\Http\Controllers\controller_api_matapelajaran::class, 'updateMatapelajaran']);
Route::get('/delete-matapelajaran/{id_matapelajaran}', [App\Http\Controllers\controller_api_matapelajaran::class, 'deleteMatapelajaran']);

Route::get('/get-raport', [App\Http\Controllers\controller_api_raport::class, 'getRaport']);
Route::post('/add-raport', [App\Http\Controllers\controller_api_raport::class, 'addRaport']);
Route::post('/update-raport', [App\Http\Controllers\controller_api_raport::class, 'updateRaport']);
Route::get('/delete-raport/{id_raport}', [App\Http\Controllers\controller_api_raport::class, 'deleteRaport']);
