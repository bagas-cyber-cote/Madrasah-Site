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

            /* Custom scrollbar halus disesuaikan dengan tema forest green */
            .custom-sidebar-scroll::-webkit-scrollbar {
                width: 4px;
            }
            .custom-sidebar-scroll::-webkit-scrollbar-thumb {
                background: rgba(228, 219, 196, 0.15);
                border-radius: 10px;
            }
            .custom-sidebar-scroll::-webkit-scrollbar-thumb:hover {
                background: rgba(228, 219, 196, 0.3);
            }

            /* 
               =========================================
               ANIMASI LIQUID WAVE SAAT MENU DIKLIK
               =========================================
            */
            .liquid-click-effect {
                position: relative;
                overflow: hidden;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Efek riak air menggunakan warna krem hangat dari tema Hero */
            .liquid-click-effect::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: rgba(228, 219, 196, 0.15); 
                border-radius: 50%;
                transform: translate(-50%, -50%);
                transition: width 0.5s ease-out, height 0.5s ease-out, opacity 0.5s ease-out;
                opacity: 0;
                pointer-events: none;
                z-index: 0;
            }

            .liquid-click-effect:active::after {
                width: 300px;
                height: 300px;
                opacity: 1;
                transition: 0s;
            }

            .liquid-click-effect > * {
                position: relative;
                z-index: 1;
            }
        </style>
    </head>
    
    <body class="min-h-screen bg-gradient-to-b from-[#18442A] via-[#1B3E2A] to-[#12271C] text-[#F3EDE3] antialiased overflow-x-hidden relative">

        {{-- 
            =========================================
            BACKGROUND AMBIENT GLOW (TEMA HERO)
            =========================================
        --}}
        <div class="absolute -left-52 -top-52 h-[550px] w-[550px] rounded-full bg-[#45644A]/25 blur-[150px] animate-[liquid-1_20s_infinite_alternate_ease-in-out] pointer-events-none z-0"></div>
        <div class="absolute -left-20 bottom-10 h-[450px] w-[450px] rounded-full bg-[#E4DBC4]/8 blur-[130px] animate-[liquid-2_25s_infinite_alternate_ease-in-out] pointer-events-none z-0"></div>
        <div class="absolute right-10 bottom-10 h-[500px] w-[500px] rounded-full bg-[#45644A]/10 blur-[150px] pointer-events-none z-0"></div>

        <div class="flex min-h-screen relative z-10">

            {{-- 
                =========================================
                LIQUID GLASS SIDEBAR
                =========================================
            --}}
            <flux:sidebar 
                sticky 
                collapsible="mobile" 
                style="background-color: rgba(24, 68, 42, 0.25) !important; backdrop-filter: blur(32px) !important; -webkit-backdrop-filter: blur(32px) !important;"
                class="!border-e !border-[#E4DBC4]/15 shadow-[15px_0_50px_-15px_rgba(12,39,28,0.7)] custom-sidebar-scroll"
            >
                {{-- Header Sidebar --}}
                <flux:sidebar.header class="border-b border-[#E4DBC4]/10 pb-4">
                    <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                    <flux:sidebar.collapse class="lg:hidden text-[#E4DBC4] hover:bg-white/10" />
                </flux:sidebar.header>

                {{-- Navigasi Utama --}}
                <flux:sidebar.nav class="mt-6">
                    <flux:sidebar.group :heading="__('Platform')" class="grid text-[#E4DBC4]/60 font-bold tracking-[0.2em] text-[10px] uppercase pb-4">
                        
                        {{-- BOX: Dashboard --}}
                        <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                            <flux:sidebar.item 
                                icon="home" 
                                :href="route('dashboard')" 
                                :current="request()->routeIs('dashboard')" 
                                wire:navigate
                                class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                            >
                                {{ __('Dashboard') }}
                            </flux:sidebar.item>
                        </div>

                        {{-- BOX: Profil Sekolah --}}
                        <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                            <flux:sidebar.item 
                                icon="building-office" 
                                :href="route('profil-sekolah.index')" 
                                :current="request()->routeIs('profil-sekolah.index')" 
                                wire:navigate
                                class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                            >
                                {{ __('Profil Sekolah') }}
                            </flux:sidebar.item>
                        </div>

                        {{-- BOX: Bio Data Siswa (Conditional) --}}
                        @if((auth()->check() && auth()->user()->role == 'siswa') || auth()->user()->role == 'Admin')
                            <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                                <flux:sidebar.item 
                                    icon="building-office" 
                                    :href="route('bio_data.index')" 
                                    :current="request()->routeIs('bio_data.index')" 
                                    wire:navigate
                                    class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                                >
                                    {{ __('Bio Data Siswa') }}
                                </flux:sidebar.item>
                            </div>
                        @endif

                        {{-- BOX: Kelola User (Conditional) --}}
                        @if(auth()->check() && auth()->user()->role == 'Admin')
                            <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                                <flux:sidebar.item
                                    icon="building-office"
                                    :href="route('userr.index')"
                                    :current="request()->routeIs('userr.index')"
                                    wire:navigate 
                                    class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                                >
                                    {{ __('Kelola User') }}
                                </flux:sidebar.item>
                            </div>
                        @endif

                        {{-- BOX: Laporan Belajar (Conditional) --}}
                        @if(auth()->check() && auth()->user()->role == 'Guru')
                            <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                                <flux:sidebar.item 
                                    icon="home" 
                                    :href="route('pelaporan.index')" 
                                    :current="request()->routeIs('pelaporan.index')" 
                                    wire:navigate
                                    class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                                >
                                    {{__('Laporan Belajar')}}
                                </flux:sidebar.item>
                            </div>
                        @endif

                        {{-- BOX: Kelola Laporan (Conditional) --}}
                        @if(auth()->check() && auth()->user()->role == 'Admin')
                            <div class="mb-4 rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                                <flux:sidebar.item 
                                    icon="home" 
                                    :href="route('kelola_laporan.index')" 
                                    :current="request()->routeIs('kelola_laporan.index')" 
                                    wire:navigate
                                    class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/80 hover:!text-[#F3EDE3] data-[current]:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                                >
                                    {{__('Kelola Laporan')}}
                                </flux:sidebar.item>
                            </div>
                        @endif
                    </flux:sidebar.group>
                </flux:sidebar.nav>

                <flux:spacer />

                {{-- 
                    ======================================================
                    TIGA BOX LIQUID GLASS TERPISAH (BAWAH SIDEBAR)
                    ======================================================
                --}}
                <div class="mt-auto mb-4 space-y-4">
                    
                    {{-- BOX 1: Repository --}}
                    <div class="rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                        <flux:sidebar.item 
                            icon="folder-git-2" 
                            href="https://github.com/laravel/livewire-starter-kit" 
                            target="_blank"
                            class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/85 hover:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                        >
                            {{ __('Repository') }}
                        </flux:sidebar.item>
                    </div>

                    {{-- BOX 2: Documentation --}}
                    <div class="rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                        <flux:sidebar.item 
                            icon="book-open-text" 
                            href="https://laravel.com/docs/starter-kits#livewire" 
                            target="_blank"
                            class="liquid-click-effect !bg-transparent !border-0 !shadow-none !ring-0 text-[#E4DBC4]/85 hover:!text-[#F3EDE3] rounded-lg transition-all duration-300"
                        >
                            {{ __('Documentation') }}
                        </flux:sidebar.item>
                    </div>

                    {{-- BOX 3: Desktop User Menu --}}
                    <div class="rounded-xl border border-white/10 bg-white/5 backdrop-blur-md p-1.5 transition duration-300 hover:scale-[1.02] hover:bg-white/10 hover:border-white/20 shadow-[0_4px_12px_rgba(0,0,0,0.15)]">
                        <x-desktop-user-menu class="hidden lg:block !text-[#F3EDE3]" :name="auth()->user()->name" />
                    </div>

                </div>

            </flux:sidebar>

            {{-- 
                =========================================
                KONTEN AREA UTAMA (KANAN)
                =========================================
            --}}
            <div class="flex-1 flex flex-col min-w-0 relative z-10">
                
                <!-- Mobile User Header Menu -->
                <flux:header style="background-color: rgba(24, 68, 42, 0.3) !important; backdrop-filter: blur(20px) !important;" class="lg:hidden !border-b !border-[#E4DBC4]/15 px-6">
                    <flux:sidebar.toggle class="lg:hidden text-[#E4DBC4]" icon="bars-2" inset="left" />

                    <flux:spacer />

                    <flux:dropdown position="top" align="end">
                        <flux:profile
                            :initials="auth()->user()->initials()"
                            icon-trailing="chevron-down"
                            class="text-[#F3EDE3] hover:bg-[#45644A]/30"
                        />

                        {{-- DROP MENU MOBILE DENGAN DESAIN LIQUID GLASS --}}
                        <flux:menu class="!bg-[#1B3E2A]/90 !backdrop-blur-xl !border !border-[#E4DBC4]/15 text-[#F3EDE3] rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] p-2">
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-2 py-2 text-start text-sm">
                                        <flux:avatar
                                            :name="auth()->user()->name"
                                            :initials="auth()->user()->initials()"
                                            class="bg-[#45644A]/60 text-[#F3EDE3] border border-[#E4DBC4]/20"
                                        />

                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <flux:heading class="truncate !text-[#F3EDE3]">{{ auth()->user()->name }}</flux:heading>
                                            <flux:text class="truncate !text-[#E4DBC4]/70">{{ auth()->user()->email }}</flux:text>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>

                            <div class="my-2"></div> 

                            {{-- Tombol Setting Liquid Glass --}}
                            <flux:menu.radio.group>
                                <flux:menu.item 
                                    :href="route('profile.edit')" 
                                    icon="cog" 
                                    wire:navigate 
                                    class="group rounded-xl border border-[#E4DBC4]/10 bg-white/5 px-4 py-2.5 my-1 text-[#E4DBC4] backdrop-blur-md transition duration-300 hover:scale-[1.02] hover:bg-[#45644A]/40 hover:text-[#F3EDE3] hover:border-[#E4DBC4]/20"
                                >
                                    {{ __('Settings') }}
                                </flux:menu.item>
                            </flux:menu.radio.group>

                            {{-- Tombol Logout Liquid Glass --}}
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item
                                    as="button"
                                    type="submit"
                                    icon="arrow-right-start-on-rectangle"
                                    class="w-full rounded-xl border border-red-500/10 bg-red-500/5 px-4 py-2.5 my-1 text-red-300 backdrop-blur-md transition duration-300 hover:scale-[1.02] hover:bg-red-500/15 hover:text-red-200 hover:border-red-500/35 cursor-pointer"
                                >
                                    {{ __('Log out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </flux:header>

                {{-- Slot Utama Konten Dashboard --}}
                <main class="flex-1 p-6 md:p-8 lg:p-10 relative z-10">
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
                50% { transform: translate(60px, -40px) scale(1.15); }
                100% { transform: translate(0, 0) scale(1); }
            }
            @keyframes liquid-2 {
                0% { transform: translate(0, 0) scale(1); }
                50% { transform: translate(-50px, 50px) scale(0.9); }
                100% { transform: translate(0, 0) scale(1); }
            }
        </style>
    </body>
</html>