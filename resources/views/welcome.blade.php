<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#0f1115] text-white">

    {{-- Hero --}}
    <section
        class="relative flex min-h-screen items-center justify-center overflow-hidden">

        {{-- Background Blur --}}
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-emerald-700/20 blur-3xl"></div>

        <div class="absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-yellow-500/10 blur-3xl"></div>
        <div class="relative z-10 mx-auto max-w-7xl px-6">
            <div class="grid items-center gap-16 lg:grid-cols-2">
                {{-- Left --}}
                <div>

                    <span
                        class="rounded-full border border-emerald-400/30 bg-emerald-500/20 px-5 py-2 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-300">

                        Website Resmi

                    </span>

                    <h1
                        class="mt-8 text-6xl font-black leading-tight">

                        {{('YPSH NWDI Menggala')}}

                    </h1>

                    <p
                        class="mt-8 max-w-xl text-lg leading-9 text-zinc-300">

                        Selamat datang di Website Resmi Sekolah.
                        Media informasi, berita, profil sekolah,
                        serta berbagai layanan akademik dalam
                        satu platform modern.

                    </p>

                    <div class="mt-10 flex gap-5">

                        <a href="{{ route('login') }}"
                            class="rounded-xl bg-emerald-700 px-8 py-4 font-semibold transition hover:bg-emerald-800">

                            Login

                        </a>

                        @if(Route::has('register'))

                        <a href="{{ route('register') }}"
                            class="rounded-xl border border-white/20 px-8 py-4 font-semibold transition hover:bg-white hover:text-black">

                            Register

                        </a>

                        @endif

                    </div>

                </div>

                {{-- Right --}}
                <div class="flex justify-center">

                    <div
                        class="flex h-96 w-96 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-emerald-950 to-emerald-900 shadow-2xl">
                        <img
                            src="{{ asset('images/yayasan.jpg') }}"
                            alt="Logo Sekolah"
                            class="h-96 w-96 rounded-full object-cover border-4 border-emerald-950 shadow-2x1" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section untuk prestasi sekolah -->
    <!-- section untuk profile -->
    <!-- section untuk berita dan footer -->


</body>

</html>