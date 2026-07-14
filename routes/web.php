<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

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
    Route::livewire('dashboard-userr', 'pages::userr.dashboard')
->name('dashboard.userr');
});



require __DIR__.'/settings.php';
