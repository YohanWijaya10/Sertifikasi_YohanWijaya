<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanAdminController;
use App\Http\Controllers\KatalogController;


use App\Models\Anggota;
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




Route::get('/Katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');

Route::get('/koleksi/create', [KoleksiController::class, 'create'])->name('koleksi.create');
Route::post('/koleksi/store', [KoleksiController::class, 'store'])->name('koleksi.store');
Route::get('/koleksi/{id}/edit', [KoleksiController::class, 'edit'])->name('koleksi.edit');
Route::put('/koleksi/{id}', [KoleksiController::class, 'update'])->name('koleksi.update');
Route::delete('/koleksi/{id}', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');
Route::get('/koleksi/{id}', function ($id) {
    $anggota = Anggota::find($id);

    if (!$anggota) {
        // Handle ketika anggota tidak ditemukan
        return redirect()->route('koleksi.index')->with('error', 'koleksi tidak ditemukan');
    }

    // Lanjutkan hanya jika anggota ditemukan
    return view('koleksi.detail', compact('koleksi'));
});


Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('/anggota/{id}', function ($id) {
    $anggota = Anggota::find($id);

    if (!$anggota) {
        // Handle ketika anggota tidak ditemukan
        return redirect()->route('anggota.index')->with('error', 'Anggota tidak ditemukan');
    }

    // Lanjutkan hanya jika anggota ditemukan
    return view('anggota.detail', compact('anggota'));
});




Route::get('/', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');



Route::get('/AdminPeminjaman/index', [PeminjamanAdminController::class, 'index'])->name('peminjamanAdmin.index');
Route::get('/AdminPeminjaman/create', [PeminjamanAdminController::class, 'create'])->name('peminjamanAdmin.create');
Route::post('/AdminPeminjaman/store', [PeminjamanAdminController::class, 'store'])->name('peminjamanAdmin.store');
Route::get('/AdminPeminjaman/{id}/edit', [PeminjamanAdminController::class, 'edit'])->name('peminjamanAdmin.edit');
Route::put('/AdminPeminjaman/{id}', [PeminjamanAdminController::class, 'update'])->name('peminjamanAdmin.update');