<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('formulir', 'formulir')
    ->name('formulir');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('profil_sekolah', 'pages::profil_sekolah.index')
->name('profil-sekolah.index');
    Route::livewire('bio_data', 'pages::bio_data.index')
->name('bio_data.index');
    Route::livewire('data_guru', 'pages:data_guru.index')
->name('data_guru.index');
    Route::livewire('userr', 'pages::userr.index')
->name('userr.index');
    Route::livewire('pelaporan', 'pages::pelaporan.index')
->name('pelaporan.index');
    Route::livewire('kelola_laporan', 'pages::admin.index')
->name('kelola_laporan.index');
    Route::livewire('pendaftaran', 'pages::pendaftaran.index')
->name('pendaftaran.index');
    Route::livewire('siswa', 'pages::siswa.index')
->name('siswa.index');
    Route::livewire('absensi', 'pages::absensi.index')
->name('absensi.index');
    Route::livewire('pembuatan_jadwal', 'pages::pembuatan_jadwal.index')
->name('pembuatan_jadwal.index');
 Route::livewire('Jadwal', 'pages::Jadwal.index')
->name('Jadwal.index');
});



require __DIR__.'/settings.php';
