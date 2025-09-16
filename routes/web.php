<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('arsip.index');
});

Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('arsip/{arsip}', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::put('/arsip/{arsip}/update-file', [ArsipController::class, 'updateFile'])->name('arsip.updateFile');
Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.destroy');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
