<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('profil_sekolah', 'pages::profil_sekolah.index')
->name('profil-sekolah.index');
    Route::livewire('bio_data', 'pages::bio_data.index')
->name('bio_data.index');
    
});



require __DIR__.'/settings.php';
