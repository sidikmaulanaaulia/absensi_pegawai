<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PegawaiController as AdminPegawaiController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;
use App\Http\Controllers\Admin\JabatanController as AdminJabatanController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\AbsensiController as UserAbsensiController;

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


Route::get('/', function () {
    return view('auth.login');
})->name('welcome');


Route::middleware(['auth', 'check.role:admin'])->group(function () {
    //dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'show'])->name('dashboard.show');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //data pegawai
    Route::get('/pegawai', [AdminPegawaiController::class, 'show'])->name('pegawai.show');
    Route::get('/pegawai-detail/{slug}', [AdminPegawaiController::class, 'detail'])->name('pegawai.detail');
    Route::get('/pegawai-tambah', [AdminPegawaiController::class, 'create'])->name('pegawai.create');
    Route::get('/pegawai-edit/{slug}', [AdminPegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('/pegawai-edit/{slug}', [AdminPegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai-delete/{id}', [AdminPegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::post('/pegawai-tambah', [AdminPegawaiController::class, 'store'])    ->name('pegawai.store');
    //absensi
    Route::get('/absensi', [AdminAbsensiController::class, 'show'])->name('absensi.show');
    Route::get('/absensi-tambah', [AdminAbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi-tambah', [AdminAbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi-exit', [AdminAbsensiController::class, 'keluar'])->name('absensi.exit');
    Route::post('/absensi-exit', [AdminAbsensiController::class, 'exit'])->name('absensi.exit');
    Route::get('/absensi-edit/{id}', [AdminAbsensiController::class, 'edit'])->name('absensi.edit');
    Route::post('/absensi-edit/{id}', [AdminAbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('/absensi-delete/{id}', [AdminAbsensiController::class, 'destroy'])->name('absensi.destroy');

    //pengguna
    Route::get('/pengguna', [AdminPenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/pengguna-tambah', [AdminPenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna-tambah', [AdminPenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna-edit/{slug}', [AdminPenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna-update/{slug}', [AdminPenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna-delete/{id}', [AdminPenggunaController::class, 'destroy'])->name('pengguna.destroy ');

    //jabatan
     Route::get('/jabatan', [AdminJabatanController::class, 'show'])->name('jabatan.show');
     Route::get('/jabatan-tambah', [AdminJabatanController::class, 'create'])->name('jabatan.create');
     Route::post('/jabatan-tambah', [AdminJabatanController::class, 'store'])->name('jabatan.store');
     Route::get('/jabatan-edit/{slug}', [AdminJabatanController::class, 'edit'])->name('jabatan.edit');
     Route::post('/jabatan-edit/{slug}', [AdminJabatanController::class, 'update'])->name('jabatan.update');
     Route::delete('/jabatan-delete/{id}', [AdminJabatanController::class, 'destroy'])->name('jabatan.destroy');


    });


    Route::middleware(['auth', 'check.role:user'])->group(function () {
        Route::get('/dashboard-user', [UserDashboardController::class, 'show'])->name('dashboard-user.show');
        Route::get('/absensi-user', [UserAbsensiController::class, 'show'])->name('absensi-user.show');
    });


require __DIR__.'/auth.php';
