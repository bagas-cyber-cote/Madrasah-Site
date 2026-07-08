<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-[#0f172a]">

    <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-6">

        {{-- Background Blur --}}
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-emerald-700/20 blur-3xl"></div>

        <div class="absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-yellow-500/10 blur-3xl"></div>

        {{-- Card --}}
        <div
            class="relative w-full max-w-md rounded-[32px] border border-white/10 bg-zinc-900/80 p-10 shadow-2xl backdrop-blur-xl animate-[fadeIn_.6s_ease]">

            {{-- Logo --}}
            <div class="flex justify-center">

                <div
                    class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-emerald-950 to-emerald-900 shadow-xl">
                    <img src="{{ asset('images/yayasan.jpg') }}" alt="Logo Sekolah"
                        class="h-24 w-24 rounded-full object-cover" />

                </div>

            </div>

            {{-- Title --}}
            <div class="mt-6 text-center">

                <h1 class="text-3xl font-bold text-yellow-500 text-justify-center">
                    PENGELOLAAN DATA SISWA DAN GURU YPSH-NWDI
                </h1>
                <p class="mt-2 text-zinc-400">
                    Silakan login untuk melanjutkan
                </p>
            </div>
            {{-- Content --}}
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </div>
    <style>
        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(30px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }
    </style>
    @fluxScripts
</body>

</html>