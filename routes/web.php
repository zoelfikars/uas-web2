<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KursusController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\JadwalController as UserJadwalController;
use App\Http\Controllers\User\KursusController as UserKursusController;
use App\Http\Controllers\User\RiwayatController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/about', [GuestController::class, 'about'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('kursus', [UserKursusController::class, 'index'])->name('kursus');
    Route::get('kursus/search', [UserKursusController::class, 'search'])->name('kursus.search');
    Route::post('kursus/beli/', [UserKursusController::class, 'beli'])->name('kursus.beli');
    Route::get('jadwal', [UserJadwalController::class, 'index'])->name('jadwal');
    Route::get('jadwal/search', [UserJadwalController::class, 'search'])->name('jadwal.search');
    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('/peserta', PesertaController::class);
        Route::resource('/kursus', KursusController::class);
        Route::resource('/materi', MateriController::class);
        Route::resource('/jadwal', JadwalController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::get('/report', [TransaksiController::class, 'report'])->name('transaksi.report');
        Route::get('/transaksi/create/{id}', [TransaksiController::class, 'createWithUserId'])->name('transaksi.createWithUserId');
    });
});

require __DIR__ . '/auth.php';
