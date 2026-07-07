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

    <!-- section untuk profil sekolah -->
    {{-- ========================================================= --}}
{{-- PROFILE SEKOLAH --}}
{{-- ========================================================= --}}

<section
    id="profil"
    class="relative overflow-hidden bg-[#0f1115] py-32">

    {{-- Background Blur --}}
    <div class="absolute left-0 top-20 h-80 w-80 rounded-full bg-emerald-700/20 blur-3xl"></div>

    <div class="absolute right-0 bottom-0 h-80 w-80 rounded-full bg-yellow-500/10 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">

        {{-- Heading --}}
        <div class="mb-20 text-center">

            <span
                class="rounded-full border border-emerald-400/30 bg-emerald-500/20 px-5 py-2 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-300">

                Profil Sekolah

            </span>

            <h2 class="mt-8 text-5xl font-black">

                Sejarah Yayasan

            </h2>

            <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-zinc-300">

                Yayasan Pendidikan Sosial Hamzanwadi Nahdlatul Wathan
                Menggala merupakan lembaga pendidikan yang berkomitmen
                mencetak generasi yang beriman, berilmu, berkarakter,
                serta mampu menghadapi perkembangan zaman.

            </p>

        </div>

        {{-- Sejarah --}}
        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Foto Sekolah --}}
            <div>

                <img
                    src="{{ asset('images/gedung-yayasan.jpg') }}"
                    alt="Gedung Sekolah"
                    class="rounded-[30px] border border-white/10 shadow-2xl transition duration-500 hover:scale-[1.02]">

            </div>

            {{-- Card --}}
            <div
                class="rounded-[30px] border border-white/10 bg-white/5 p-10 backdrop-blur-xl">

                <h3
                    class="text-3xl font-bold text-emerald-300">

                    Sejarah Yayasan

                </h3>

                <p
                    class="mt-6 leading-9 text-zinc-300">

                    Yayasan Pendidikan Sosial Hamzanwadi Nahdlatul Wathan
                    Menggala didirikan sebagai bentuk kepedulian terhadap
                    dunia pendidikan. Berawal dari sebuah lembaga sederhana,
                    yayasan terus berkembang dengan membuka berbagai jenjang
                    pendidikan serta meningkatkan kualitas pembelajaran,
                    sarana prasarana, dan pelayanan kepada masyarakat.

                </p>

                <p
                    class="mt-6 leading-9 text-zinc-300">

                    Hingga saat ini, yayasan terus berkomitmen menjadi
                    lembaga pendidikan yang unggul dalam membentuk generasi
                    yang cerdas, berakhlak mulia, serta mampu bersaing
                    di tingkat nasional maupun internasional.

                </p>

            </div>

        </div>
        
        <div class="mt-36">

            <div class="mb-16 text-center">

                <span
                    class="rounded-full border border-emerald-400/30 bg-emerald-500/20 px-5 py-2 text-sm font-semibold uppercase tracking-[0.25em] text-emerald-300">

                    Pimpinan Yayasan

                </span>

                <h2 class="mt-8 text-5xl font-black">

                    Ketua Yayasan Saat Ini

                </h2>

            </div>

            <div
                class="mx-auto max-w-4xl rounded-[35px] border border-white/10 bg-white/5 p-12 backdrop-blur-xl">

                <div class="grid items-center gap-12 lg:grid-cols-2">

                    {{-- Foto Ketua --}}
                    <div class="flex justify-center">

                        <div
                            class="flex h-72 w-72 items-center justify-center rounded-full border border-white/10 bg-gradient-to-br from-emerald-950 to-emerald-900 shadow-2xl">

                            <img
                                src="{{ asset('images/kepala-sekolah.jpeg') }}"
                                alt="Ketua Yayasan"
                                class="h-64 w-64 rounded-full border-4 border-emerald-900 object-cover">

                        </div>

                    </div>

                    {{-- Biodata --}}
                    <div>

                        <h3
                            class="text-4xl font-bold">

                            Dr. Tuan Guru. H. Najmul Akhyar, S.H,. M.H

                        </h3>

                        <p
                            class="mt-3 text-xl text-emerald-300">

                            Ketua Yayasan YPSH NWDI Menggala

                        </p>

                        <p
                            class="mt-8 leading-9 text-zinc-300">

                            Beliau memimpin Yayasan YPSH NWDI Menggala
                            dengan visi menciptakan lembaga pendidikan
                            yang unggul, modern, religius, dan mampu
                            menghasilkan lulusan yang berkualitas.
                            Di bawah kepemimpinannya, yayasan terus
                            melakukan pengembangan dalam bidang akademik,
                            teknologi, dan pembangunan fasilitas sekolah.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
    <!-- section untuk prestasi sekolah -->
    <!-- section untuk berita dan footer -->


</body>

</html>