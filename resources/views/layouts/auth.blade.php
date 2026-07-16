<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
    
    {{-- Google Fonts untuk bentuk huruf modern dan solid --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#0b2416] via-[#07190f] to-[#040d08] antialiased overflow-hidden">

    <div class="relative flex min-h-screen items-center justify-center px-6">

        <!-- ulatan cahaya bergerak perlahan yang membiaskan warna di balik card transparan -->
        <div class="absolute -left-20 -top-20 h-[450px] w-[450px] rounded-full bg-emerald-500/15 blur-[100px] animate-[liquid-1_25s_infinite_alternate_ease-in-out]"></div>
        <div class="absolute -right-20 -bottom-20 h-[500px] w-[500px] rounded-full bg-emerald-600/10 blur-[120px] animate-[liquid-2_30s_infinite_alternate_ease-in-out]"></div>
        <div class="absolute left-1/4 top-1/3 h-[350px] w-[350px] rounded-full bg-yellow-600/10 blur-[110px] animate-[liquid-3_20s_infinite_alternate_ease-in-out]"></div>

        {{-- 
            =========================================
            CARD UTAMA (GLASSMORPHISM)
            =========================================
        --}}
        <div
            class="relative w-full max-w-md rounded-[32px] border border-emerald-500/15 bg-[#0f1d15]/75 p-10 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8)] backdrop-blur-2xl animate-[fadeIn_0.8s_cubic-bezier(0.16,1,0.3,1)]">

            {{-- Efek pantulan cahaya di bagian atas tepi kaca --}}
            <div class="absolute inset-0 rounded-[32px] border border-t-white/10 border-l-white/5 border-r-transparent border-b-transparent pointer-events-none"></div>

            {{-- Logo dengan Ring Glassmorphism --}}
            <div class="flex justify-center">
                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-emerald-950/50 p-1.5 border border-emerald-500/20 shadow-xl backdrop-blur-md">
                    <img src="{{ asset('images/yayasan.jpg') }}" alt="Logo Sekolah"
                        class="h-full w-full rounded-full object-cover" />
                </div>
            </div>

            {{-- Title (Gradasi Warna Putih-Cream & Font Modern) --}}
            <div class="mt-6 text-center">
                <h1 class="text-2xl md:text-3xl font-extrabold uppercase tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-[#FFFFFF] to-[#D5C9BC] leading-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.6)]">
                    Pengelolaan Data<br>
                    <span class="text-xl md:text-2xl opacity-95">Siswa dan Guru YPSH-NWDI</span>
                </h1>
                <p class="mt-3 text-zinc-400 text-xs md:text-sm font-medium tracking-wider opacity-80">
                    Silakan login untuk melanjutkan
                </p>
            </div>

            {{-- Content ($slot diisi oleh komponen form Anda) --}}
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </div>

    {{-- 
        =========================================
        ANIMASI CSS (FADE IN & LIQUID EFFECT)
        =========================================
    --}}
    <style>
        /* Animasi masuk pertama kali untuk Card */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Gerakan memutar & perubahan ukuran bulatan cahaya 1 */
        @keyframes liquid-1 {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(70px, -50px) scale(1.15);
            }
            66% {
                transform: translate(-50px, 40px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        /* Gerakan memutar & perubahan ukuran bulatan cahaya 2 */
        @keyframes liquid-2 {
            0% {
                transform: translate(0px, 0px) scale(1.1);
            }
            50% {
                transform: translate(-80px, 60px) scale(0.85);
            }
            100% {
                transform: translate(0px, 0px) scale(1.1);
            }
        }

        /* Gerakan memutar & perubahan ukuran bulatan cahaya 3 */
        @keyframes liquid-3 {
            0% {
                transform: translate(0px, 0px) scale(0.9);
            }
            50% {
                transform: translate(40px, -70px) scale(1.2);
            }
            100% {
                transform: translate(0px, 0px) scale(0.9);
            }
        }
    </style>
    @fluxScripts
</body>

</html>