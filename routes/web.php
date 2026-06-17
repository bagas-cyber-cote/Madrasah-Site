<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::livewire('login-user', 'pages::-login-user.index')
    ->name('login-user')
    ->middleware(['auth']);

require __DIR__.'/settings.php';
