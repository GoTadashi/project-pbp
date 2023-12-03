<?php

use App\Http\Controllers\controller_guru;
use App\Http\Controllers\controller_siswa;
use App\Http\Controllers\controller_register;
use App\Http\Controllers\controller_login;
use App\Http\Controllers\controller_dashboard;
use App\Http\Controllers\controller_matapelajaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//REGISTER
Route::get('/register', [controller_register::class, 'register'])->name('register');
Route::post('/register/action', [controller_register::class, 'actionRegister'])->name('actionregister');

//LOGIN
Route::get('/', [controller_login::class, 'login'])->name('login');
Route::post('/actionlogin', [controller_login::class, 'actionlogin'])->name('actionlogin');

Route::get('/dashboard', [ControllerDashboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [controller_login::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


// Show the tampilan_siswa view
Route::get('/tampilan-siswa', [controller_siswa::class, 'getSiswa']);
// Show the tampilan_guru view
Route::get('/tampilan-guru', [controller_guru::class, 'getGuru']);


// Menampilkan semua siswa
Route::get('/tampilan-siswa', [controller_siswa::class, 'getSiswa']);
// Menampilkan form tambah siswa
Route::get('/tambah-siswa', function () {
    return view('tambah_siswa');
})->name('siswa.tambah');
// Menyimpan data siswa baru
Route::post('/add-siswa', [controller_siswa::class, 'addSiswa'])->name('siswa.add');
// Menampilkan form edit siswa berdasarkan NIS
Route::get('/edit-siswa/{nis}', [controller_siswa::class, 'getByIdSiswa'])->name('siswa.edit');
// Menyimpan perubahan data siswa
Route::post('/update-siswa', [controller_siswa::class, 'updateSiswa'])->name('siswa.update');
Route::post('/delete-siswa', [controller_siswa::class, 'deleteSiswa'])->name('siswa.delete');


// Show all gurus
Route::get('/tampilan-guru', [controller_guru::class, 'getGuru']);
// Show the form for creating a new guru
Route::get('/add-guru', function () {
    return view('tambah_guru');
});
// Store a new guru
Route::post('/add-guru', [controller_guru::class, 'addGuru'])->name('guru.add');;
// Show the form for editing a specific guru
Route::get('/edit-guru/{id}', [controller_guru::class, 'getByIdGuru'])->name('guru.edit');
// Update a specific guru
Route::post('/update-guru', [controller_guru::class, 'updateGuru'])->name('guru.update');
// Delete a specific guru
Route::post('/delete-guru', [controller_guru::class, 'deleteGuru'])->name('guru.delete');


// Menampilkan data matapelajaran
Route::get('/tampilan-matapelajaran', [controller_matapelajaran::class, 'getMatapelajaran']);
Route::get('/tambah-matapelajaran', function () {
    return view('tambah_matapelajaran');
});
Route::post('/tambah_matapelajaran', [controller_matapelajaran::class, 'addMatapelajaran']);
Route::get('/edit-matapelajaran/{id}', [controller_matapelajaran::class, 'getById']);
Route::post('/edit-matapelajaran', [controller_matapelajaran::class, 'update']);
Route::post('/hapus-matapelajaran', [controller_matapelajaran::class, 'deleteMatapelajaran']);

