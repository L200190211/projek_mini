<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

// Data Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'data_mhs'])->name('data_mhs');
Route::get('/add-mhs', [MahasiswaController::class, 'add_mhs'])->name('add_mhs');
Route::post('/add-data-mhs', [MahasiswaController::class, 'add_data_mhs'])->name('add_data_mhs');
Route::get('/edit-mhs/{id_mhs}', [MahasiswaController::class, 'edit_mhs'])->name('edit_mhs');
Route::post('/edit-data-mhs/{id_mhs}', [MahasiswaController::class, 'edit_data_mhs'])->name('edit_data_mhs');
Route::get('/delete-mhs/{id_mhs}', [MahasiswaController::class, 'delete_mhs'])->name('delete_mhs');

// Dosen
Route::get('/dosen', [DosenController::class, 'data_dosen'])->name('data_dosen');
Route::get('/add-dosen', [DosenController::class, 'add_dosen'])->name('add_dosen');
Route::post('/add-data-dosen', [DosenController::class, 'add_data_dosen'])->name('add_data_dosen');
Route::get('/edit-dosen/{id_dosen}', [DosenController::class, 'edit_dosen'])->name('edit_dosen');
Route::post('/edit-data-dosen/{id_dosen}', [DosenController::class, 'edit_data_dosen'])->name('edit_data_dosen');
Route::get('/delete-dosen/{id_dosen}', [DosenController::class, 'delete_dosen'])->name('delete_dosen');

// Makul
Route::get('/matakuliah', [MakulController::class, 'data_makul'])->name('data_makul');
Route::get('/add-makul', [MakulController::class, 'add_makul'])->name('add_makul');
Route::post('/add-data-makul', [MakulController::class, 'add_data_makul'])->name('add_data_makul');
Route::get('/edit-makul/{id_makul}', [MakulController::class, 'edit_makul'])->name('edit_makul');
Route::post('/edit-data-makul/{id_makul}', [MakulController::class, 'edit_data_makul'])->name('edit_data_makul');
Route::get('/delete-makul/{id_makul}', [MakulController::class, 'delete_makul'])->name('delete_makul');

// Kelas
Route::get('/kelas', [KelasController::class, 'data_kelas'])->name('data_kelas');
Route::get('/add-kelas', [KelasController::class, 'add_kelas'])->name('add_kelas');
Route::post('/add-data-kelas', [KelasController::class, 'add_data_kelas'])->name('add_data_kelas');
Route::get('/edit-kelas/{id_kelas}', [KelasController::class, 'edit_kelas'])->name('edit_kelas');
Route::post('/edit-data-kelas/{id_kelas}', [KelasController::class, 'edit_data_kelas'])->name('edit_data_kelas');
Route::get('/delete-kelas/{id_kelas}', [KelasController::class, 'delete_kelas'])->name('delete_kelas');

// KRS
Route::get('/krs/{id_mhs}', [KrsController::class, 'data_krs'])->name('data_krs');
Route::post('/add-data-krs/{id_krs}', [KrsController::class, 'add_data_krs'])->name('add_data_krs');
Route::get('/view-krs/{id_mhs}', [KrsController::class, 'view_krs'])->name('view_krs');
Route::get('/generate-pdf/{id_mhs}', [KRSController::class, 'generatePDF'])->name('generatePDF');

// User
