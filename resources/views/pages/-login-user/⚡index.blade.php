<?php

use livewire\Component;

new class extends Component
{

}
?>

<div class="min-h-screen bg-yellow-300 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div
            class="bg-white border-4 border-black rounded-3xl
                   shadow-[12px_12px_0px_0px_black]
                   p-8"
        >

            <div class="text-center mb-8">
                <h1 class="text-4xl font-black uppercase">
                    Login
                </h1>

                <p class="font-semibold mt-2">
                    Selamat datang kembali
                </p>
            </div>

            <form wire:submit="login" class="space-y-5">

                <flux:field>
                    <flux:label class="font-black">
                        Email
                    </flux:label>

                    <flux:input
                        wire:model="email"
                        type="email"
                        placeholder="email@example.com"
                        class="border-4 border-black rounded-xl
                               bg-white font-semibold"
                    />

                    <flux:error name="email" />
                </flux:field>

                <flux:field>
                    <flux:label class="font-black">
                        Password
                    </flux:label>

                    <flux:input
                        wire:model="password"
                        type="password"
                        placeholder="••••••••"
                        viewable
                        class="border-4 border-black rounded-xl
                               bg-white font-semibold"
                    />

                    <flux:error name="password" />
                </flux:field>

                <div class="flex items-center justify-between">
                    <flux:checkbox wire:model="remember">
                        Ingat saya
                    </flux:checkbox>

                    <a href="#"
                       class="font-bold underline">
                        Lupa Password?
                    </a>
                </div>

                <flux:button
                    type="submit"
                    variant="primary"
                    class="w-full bg-green-400 text-black
                           border-4 border-black
                           rounded-xl
                           font-black uppercase
                           shadow-[6px_6px_0px_0px_black]
                           hover:translate-x-1
                           hover:translate-y-1
                           hover:shadow-none
                           transition-all"
                >
                    Masuk
                </flux:button>

            </form>

            <div class="mt-6 text-center">
                <span class="font-semibold">
                    Belum punya akun?
                </span>

                <a href="#"
                   class="font-black underline ml-1">
                    Daftar
                </a>
            </div>

        </div>

    </div>

</div>