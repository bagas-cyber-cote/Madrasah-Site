<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif !important;
            }

            /* Custom scrollbar halus untuk sidebar */
            .custom-sidebar-scroll::-webkit-scrollbar {
                width: 4px;
            }
            .custom-sidebar-scroll::-webkit-scrollbar-thumb {
                background: rgba(16, 185, 129, 0.2);
                border-radius: 10px;
            }

            /* 
               =========================================
               ANIMASI LIQUID WAVE SAAT MENU DIKLIK
               =========================================
            */
            .liquid-click-effect {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            /* Efek riak air/cairan menyebar saat item aktif atau ditekan */
            .liquid-click-effect::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(16, 185, 129, 0.35); /* Warna hijau liquid semi-transparan */
                border-radius: 50%;
                transform: translate(-50%, -50%);
                transition: width 0.4s ease-out, height 0.4s ease-out, opacity 0.4s ease-out;
                opacity: 0;
                pointer-events: none;
                z-index: 0;
            }

            /* Trigger animasi ketika elemen sedang di-klik (aktif) */
            .liquid-click-effect:active::after {
                width: 250px;
                height: 250px;
                opacity: 1;
                transition: 0s; /* Langsung melebar seketika saat ditekan */
            }

            /* Memastikan teks/icon menu tetap berada di atas efek cairan */
            .liquid-click-effect > * {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    
    <body class="min-h-screen bg-gradient-to-br from-[#0b2416] via-[#07190f] to-[#040d08] text-zinc-100 antialiased overflow-x-hidden">

        {{-- 
            =========================================
            LIQUID LIGHTS (DIPINDAH KE BELAKANG SIDEBAR)
            =========================================
            Posisi div ini digeser ke kiri (left-0, -left-20) agar cahayanya tepat berada di balik 
            sidebar, membuat efek kaca (backdrop-blur) pada sidebar bekerja sempurna!
        --}}
        <div class="absolute -left-20 -top-20 h-[500px] w-[500px] rounded-full bg-emerald-500/15 blur-[100px] animate-[liquid-1_20s_infinite_alternate_ease-in-out] pointer-events-none z-0"></div>
        <div class="absolute -left-10 bottom-10 h-[450px] w-[450px] rounded-full bg-yellow-600/10 blur-[120px] animate-[liquid-2_25s_infinite_alternate_ease-in-out] pointer-events-none z-0"></div>
        <div class="absolute right-10 bottom-10 h-[500px] w-[500px] rounded-full bg-emerald-600/5 blur-[120px] pointer-events-none z-0"></div>

        <div class="flex min-h-screen relative z-10">

            {{-- 
                =========================================
                LIQUID GLASS SIDEBAR (DIPERBAIKI)
                =========================================
                Penambahan class inline css styling untuk memaksa transparansi backdrop
            --}}
            <flux:sidebar 
                sticky 
                collapsible="mobile" 
                style="background-color: rgba(15, 29, 21, 0.4) !important; backdrop-filter: blur(24px) !important; -webkit-backdrop-filter: blur(24px) !important;"
                class="!border-e !border-emerald-500/15 shadow-[10px_0_40px_-15px_rgba(0,0,0,0.7)] custom-sidebar-scroll"
            >
                <flux:sidebar.header class="border-b border-emerald-500/10 pb-4">
                    <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                    <flux:sidebar.collapse class="lg:hidden text-emerald-400 hover:bg-emerald-500/10" />
                </flux:sidebar.header>

                {{-- Navigasi Utama --}}
                <flux:sidebar.nav class="mt-6">
                    <flux:sidebar.group :heading="__('Platform')" class="grid text-emerald-500/70 font-semibold tracking-wider text-xs uppercase">
                        
                            <flux:sidebar.item 
                                icon="home" 
                                :href="route('dashboard')" 
                                :current="request()->routeIs('dashboard')" 
                                wire:navigate
                                class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                            >
                                {{ __('Dashboard') }}
                            </flux:sidebar.item>

                        <flux:sidebar.item 
                            icon="building-office" 
                            :href="route('profil-sekolah.index')" 
                            :current="request()->routeIs('profil-sekolah.index')" 
                            wire:navigate
                            class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                        >
                            {{ __('Profil Sekolah') }}
                        </flux:sidebar.item>

                        @if((auth()->check() && auth()->user()->role == 'siswa') || auth()->user()->role == 'Admin')
                            <flux:sidebar.item 
                                icon="building-office" 
                                :href="route('bio_data.index')" 
                                :current="request()->routeIs('bio_data.index')" 
                                wire:navigate
                                class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                            >
                                {{ __('Bio Data Siswa') }}
                            </flux:sidebar.item>
                        @endif

                        @if(auth()->check() && auth()->user()->role == 'Admin')
                            <flux:sidebar.item
                                icon="building-office"
                                :href="route('userr.index')"
                                :current="request()->routeIs('userr.index')"
                                wire:navigate 
                                class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                            >
                                {{ __('Kelola User') }}
                            </flux:sidebar.item>
                        @endif

                            @if(auth()->check() && auth()->user()->role == 'Guru')
                            <flux:sidebar.item 
                                icon="home" 
                                :href="route('pelaporan.index')" 
                                :current="request()->routeIs('pelaporan.index')" 
                                wire:navigate
                                class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                                >
                                    {{__('Pelaporan Pengajar')}}
                            </flux:sidebar.item>
                        @endif

                             @if(auth()->check() && auth()->user()->role == 'Admin')
                             <flux:sidebar.item 
                                icon="home" 
                                :href="route('kelola_laporan.index')" 
                                :current="request()->routeIs('kelola_laporan.index')" 
                                wire:navigate
                                class="liquid-click-effect hover:!bg-emerald-500/10 hover:!text-emerald-300 data-[current]:!bg-emerald-500/15 data-[current]:!text-emerald-400 data-[current]:!border-s-2 data-[current]:!border-emerald-400 rounded-xl transition-all duration-200"
                                >
                                    {{__('Kelola Laporan')}}
                            </flux:sidebar.item>
                        @endif
                    </flux:sidebar.group>
                </flux:sidebar.nav>

                <flux:spacer />

                {{-- Navigasi Bawah / Tautan Luar --}}
                <flux:sidebar.nav class="border-t border-emerald-500/10 pt-4">
                    <flux:sidebar.item 
                        icon="folder-git-2" 
                        href="https://github.com/laravel/livewire-starter-kit" 
                        target="_blank"
                        class="liquid-click-effect hover:!bg-emerald-500/5 hover:!text-emerald-300 rounded-xl"
                    >
                        {{ __('Repository') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item 
                        icon="book-open-text" 
                        href="https://laravel.com/docs/starter-kits#livewire" 
                        target="_blank"
                        class="liquid-click-effect hover:!bg-emerald-500/5 hover:!text-emerald-300 rounded-xl"
                    >
                        {{ __('Documentation') }}
                    </flux:sidebar.item>
                </flux:sidebar.nav>

                {{-- Menu Pengguna Desktop --}}
                <div class="mt-4 border-t border-emerald-500/10 pt-4">
                    <x-desktop-user-menu class="hidden lg:block !text-zinc-200" :name="auth()->user()->name" />
                </div>
            </flux:sidebar>

            {{-- 
                =========================================
                KONTEN AREA UTAMA (KANAN)
                =========================================
            --}}
            <div class="flex-1 flex flex-col min-w-0 relative z-10">
                
                <!-- Mobile User Header Menu -->
                <flux:header style="background-color: rgba(15, 29, 21, 0.4) !important; backdrop-filter: blur(16px) !important;" class="lg:hidden !border-b !border-emerald-500/15 px-6">
                    <flux:sidebar.toggle class="lg:hidden text-emerald-400" icon="bars-2" inset="left" />

                    <flux:spacer />

                    <flux:dropdown position="top" align="end">
                        <flux:profile
                            :initials="auth()->user()->initials()"
                            icon-trailing="chevron-down"
                            class="text-zinc-200 hover:bg-emerald-500/10"
                        />

                        <flux:menu class="!bg-[#0f1d15]/95 !backdrop-blur-md !border !border-emerald-500/20 text-zinc-200">
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <flux:avatar
                                            :name="auth()->user()->name"
                                            :initials="auth()->user()->initials()"
                                            class="bg-emerald-800"
                                        />

                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <flux:heading class="truncate !text-zinc-100">{{ auth()->user()->name }}</flux:heading>
                                            <flux:text class="truncate !text-zinc-400">{{ auth()->user()->email }}</flux:text>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>

                            <flux:menu.separator class="!border-emerald-500/10" />

                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="hover:!bg-emerald-500/15">
                                    {{ __('Settings') }}
                                </flux:menu.item>
                            </flux:menu.radio.group>

                            <flux:menu.separator class="!border-emerald-500/10" />

                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item
                                    as="button"
                                    type="submit"
                                    icon="arrow-right-start-on-rectangle"
                                    class="w-full cursor-pointer hover:!bg-red-500/15 hover:!text-red-400"
                                    data-test="logout-button"
                                >
                                    {{ __('Log out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </flux:header>

                {{-- Slot Utama Konten Dashboard --}}
                <main class="flex-1 p-6 md:p-8 lg:p-10">
                    {{ $slot }}
                </main>
                
            </div>

        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts

        {{-- Script Tambahan keyframes animasi background cair --}}
        <style>
            @keyframes liquid-1 {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(50px, -30px) scale(1.15); }
                100% { transform: translate(0, 0) scale(1); }
            }
            @keyframes liquid-2 {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(-40px, 40px) scale(0.9); }
                100% { transform: translate(0, 0) scale(1); }
            }
        </style>
    </body>
</html>