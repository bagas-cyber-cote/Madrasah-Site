<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-700 via-green-600 to-green-800 p-4">

    <div class="w-full max-w-md">

        <flux:card class="bg-green shadow-2xl border-0 rounded-2xl overflow-hidden">

            <div class="text-center mb-8">

                <div class="mx-auto w-20 h-20 rounded-full bg-yellow-500 flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <h1 class="mt-4 text-3xl font-bold text-green-700">
                    Selamat Datang
                </h1>

                <p class="text-gray-500 mt-2">
                    Silakan login untuk melanjutkan
                </p>

            </div>

            <form wire:submit="login" class="space-y-5">

                <flux:input
                    wire:model="email"
                    type="email"
                    label="Email"
                    placeholder="email@example.com"
                />

                <flux:input
                    wire:model="password"
                    type="password"
                    label="Password"
                    placeholder="Masukkan password"
                />

                <div class="flex items-center justify-between">

                    <flux:checkbox
                        wire:model="remember"
                        label="Ingat saya"
                    />

                    <a href="#"
                    class="text-sm text-green-700 hover:text-yellow-600 font-medium">
                        Lupa Password?
                    </a>

                </div>

                <flux:button
                    type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-xl transition duration-300">
                    Login
                </flux:button>

            </form>

            <div class="mt-8">

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>

                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white px-4 text-gray-500">
                            atau
                        </span>
                    </div>
                </div>

                <p class="text-center text-sm text-gray-600 mt-6">
                    Belum memiliki akun?
                    <a href="#"
                    class="font-semibold text-green-700 hover:text-yellow-600">
                        Daftar sekarang
                    </a>
                </p>

            </div>

        </flux:card>

    </div>

</div>