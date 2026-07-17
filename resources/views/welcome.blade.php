<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#0f1115] text-white">

<!-- NAVBAR -->
<nav class="fixed top-0 inset-x-0 z-50 bg-gradient-to-b from-[#18442A]/40 to-transparent backdrop-blur-xl transition-all duration-300">
    <div class="mx-auto max-w-7xl px-8">
        <div class="flex h-24 items-center justify-between">
            <!-- Logo / Branding -->
            <a href="#beranda" class="nav-link group flex items-center gap-3">
                <div class="h-10 w-10 rounded-full border-2 border-[#E4DBC4]/30 bg-white/10 p-1 backdrop-blur-md">
                    <img src="{{ asset('images/yayasan.jpg') }}" class="h-full w-full object-contain" alt="Logo">
                </div>
                <span class="text-xl font-black tracking-wider text-[#F3EDE3] transition duration-300 group-hover:text-[#E4DBC4]">
                    YPSH <span class="text-[#E4DBC4] group-hover:text-[#F3EDE3]">NWDI</span>
                </span>
            </a>
            <!-- Menu Navigasi (Desktop) -->
            <div class="hidden items-center gap-2 rounded-full border border-white/10 bg-white/5 p-1.5 backdrop-blur-2xl shadow-[0_8px_32px_rgba(0,0,0,0.2)] md:flex">
                <a href="#beranda" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#F3EDE3] transition duration-300 hover:bg-[#45644A]/40 hover:text-[#E4DBC4]">
                    Beranda
                </a>
                <a href="#visi_dan_misi" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#F3EDE3] transition duration-300 hover:bg-[#45644A]/40 hover:text-[#E4DBC4]">
                    Visi dan Misi
                </a>
                <a href="#berita" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#F3EDE3] transition duration-300 hover:bg-[#45644A]/40 hover:text-[#E4DBC4]">
                    Berita
                </a>
                <a href="#sejarah" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#E4DBC4]/80 transition duration-300 hover:bg-[#45644A]/40 hover:text-[#F3EDE3]">
                    Sejarah
                </a>
                <a href="#prestasi" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#E4DBC4]/80 transition duration-300 hover:bg-[#45644A]/40 hover:text-[#F3EDE3]">
                    Prestasi
                </a>
                <a href="#kontak" class="nav-link rounded-full px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#E4DBC4]/80 transition duration-300 hover:bg-[#45644A]/40 hover:text-[#F3EDE3]">
                    Kontak
                </a>
            </div>
            <!-- Bagian Kanan Hanya Tersisa Portal (Tombol Duplikat Dihapus) -->
            <div class="hidden items-center gap-4 md:flex">
                <a href="{{ route('login') }}" class="rounded-xl border border-white/10 bg-white/10 px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-[#F3EDE3] backdrop-blur-md transition duration-300 hover:bg-[#45644A]/50 shadow-md">
                    Portal
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section id="beranda" class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-b from-[#18442A] via-[#1B3E2A] to-[#12271C]">
    <!-- Background Ambient Glow -->
    <div class="absolute -left-52 -top-52 h-[550px] w-[550px] rounded-full bg-[#45644A]/30 blur-[180px]"></div>
    <div class="absolute right-0 top-1/4 h-[500px] w-[500px] rounded-full bg-[#E4DBC4]/10 blur-[170px]"></div>
    <div class="absolute left-1/2 top-1/2 h-[350px] w-[350px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#45644A]/15 blur-[130px]"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-8 w-full py-20">
        <div class="grid items-center gap-20 lg:grid-cols-2">
            
            {{-- SEKTOR KIRI (Konten Teks & Aksi Utama) --}}
            <div>
                <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 backdrop-blur-2xl px-6 py-2 text-xs font-bold uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                    WEBSITE RESMI
                </span>
                <h1 class="mt-8 text-6xl font-black leading-tight text-[#F3EDE3] xl:text-7xl">
                    {{ __('YPSH NWDI') }} <br>
                    <span class="text-[#E4DBC4]">Menggala</span>
                </h1>
                <p class="mt-8 max-w-xl text-lg leading-9 text-[#E4DBC4]/85">
                    Selamat datang di Website Resmi Sekolah. Media informasi, berita, profil sekolah, serta berbagai layanan akademik dalam satu platform modern.
                </p>
                <!-- Kumpulan Tombol Utama Bersebelahan -->
                <div class="mt-12 flex items-center gap-5">
                    
                    {{-- Tombol Login Utama --}}
                    <a href="{{ route('login') }}" 
                        class="group overflow-hidden rounded-2xl border border-white/15 bg-white/10 px-9 py-4 font-semibold text-[#F3EDE3] backdrop-blur-2xl transition duration-500 hover:scale-105 hover:bg-[#45644A]/45 hover:shadow-[0_20px_50px_rgba(24,68,42,.45)]">
                        Login
                    </a>
                    {{-- Tombol Register Utama --}}
                    <a href="{{ route('register') }}" 
                        class="rounded-2xl border border-[#E4DBC4]/25 bg-white/5 px-9 py-4 font-semibold text-[#E4DBC4] backdrop-blur-2xl transition duration-500 hover:scale-105 hover:bg-white/10">
                        Register
                    </a>
                </div>
            </div>
            
            {{-- SEKTOR KANAN (Liquid Glass Showcase) --}}
            <div class="flex justify-center">
                <div class="group relative flex h-[430px] w-[430px] items-center justify-center rounded-[60px] border border-white/15 bg-white/10 backdrop-blur-3xl shadow-[0_30px_80px_rgba(0,0,0,.45)] transition duration-700 hover:rotate-2 hover:scale-105">
                    <div class="absolute inset-0 rounded-[60px] bg-gradient-to-br from-white/20 via-transparent to-white/5"></div>
                    <div class="absolute -top-12 left-10 h-32 w-52 rotate-[-20deg] rounded-full bg-white/25 blur-3xl"></div>
                    
                    <div class="relative h-80 w-80 rounded-full border-[6px] border-[#45644A] overflow-hidden shadow-[0_20px_60px_rgba(0,0,0,.45)]">
                        <img src="{{ asset('images/yayasan.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI DAN MISI SECTION -->
<section id="visi_dan_misi" class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-b from-[#12271C] via-[#142F21] to-[#153324]">
    <!-- Ambient Glow Background -->
    <div class="absolute right-0 top-1/4 h-[500px] w-[500px] rounded-full bg-[#45644A]/15 blur-[160px] pointer-events-none"></div>
    <div class="absolute left-0 bottom-1/4 h-[550px] w-[550px] rounded-full bg-[#E4DBC4]/5 blur-[180px] pointer-events-none"></div>
    
    <div class="relative z-10 mx-auto max-w-7xl px-8 w-full py-24">
        <!-- Header Section -->
        <div class="text-center mb-20">
            <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 backdrop-blur-2xl px-6 py-2 text-xs font-bold uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                PONDASI KAMI
            </span>
            <h2 class="mt-6 text-5xl font-black text-[#F3EDE3]">
                Visi & <span class="text-[#E4DBC4]">Misi</span>
            </h2>
        </div>

        <div class="grid gap-12 lg:grid-cols-5 items-start">
            <!-- Box Visi (Lebih besar/lebar) -->
            <div class="lg:col-span-2 group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-10 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col h-full justify-center">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <span class="text-xs font-bold uppercase tracking-widest text-[#E4DBC4]/70 bg-white/5 border border-white/10 px-4 py-1.5 rounded-full w-max mb-6">
                    VISI UTAMA
                </span>
                <h3 class="text-3xl font-black text-[#F3EDE3] mb-6">Religius <span class="text-[#E4DBC4]">Cerdas</span> dan Kompetitif</h3>
                <p class="text-[#E4DBC4]/85 leading-9 text-lg text-justify">
                    Misi Yayasan Pendidikan dan Sosial Hidayaturrahman NWDI Menggala adalah membentuk generasi **Religius** yang berakhlak mulia dan berfondasi spiritual kuat, **Cerdas** secara intelektual maupun emosional, serta **Kompetitif** dengan daya saing tinggi dan berjiwa tangguh untuk memberikan kemaslahatan sosial yang nyata bagi masyarakat.
                </p>
            </div>

            <!-- Box Misi (Daftar Poin Berjajar) -->
            <div class="lg:col-span-3 space-y-6">
                <!-- Misi 1 -->
                <div class="group relative rounded-[35px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_20px_40px_rgba(0,0,0,.2)] transition duration-500 hover:bg-white/10 flex gap-6 items-start">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-[#45644A] font-black text-[#F3EDE3] text-lg shadow-md">1</div>
                    <div>
                        <h4 class="text-xl font-bold text-[#F3EDE3] mb-2">Penguatan Nilai Keagamaan</h4>
                        <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify">Menumbuhkan pemahaman dan pengalaman ajaran agama.</p>
                    </div>
                </div>

                <!-- Misi 2 -->
                <div class="group relative rounded-[35px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_20px_40px_rgba(0,0,0,.2)] transition duration-500 hover:bg-white/10 flex gap-6 items-start">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-[#45644A] font-black text-[#F3EDE3] text-lg shadow-md">2</div>
                    <div>
                        <h4 class="text-xl font-bold text-[#F3EDE3] mb-2">Peningkatan Prestasi Akademik</h4>
                        <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify">Mengintensifkan KBM dan bimbingan agar kecerdasan semangat berprestasi dan kompetisi santri dapat berjalan secara optimal.</p>
                    </div>
                </div>

                <!-- Misi 3 -->
                <div class="group relative rounded-[35px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_20px_40px_rgba(0,0,0,.2)] transition duration-500 hover:bg-white/10 flex gap-6 items-start">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-[#45644A] font-black text-[#F3EDE3] text-lg shadow-md">3</div>
                    <div>
                        <h4 class="text-xl font-bold text-[#F3EDE3] mb-2">Pengembangan Kreativitas Islami</h4>
                        <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify">Menumbuhkan kreatifitas dan seni Islami.</p>
                    </div>
                </div>

                <!-- Misi 4 -->
                <div class="group relative rounded-[35px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_20px_40px_rgba(0,0,0,.2)] transition duration-500 hover:bg-white/10 flex gap-6 items-start">
                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-[#45644A] font-black text-[#F3EDE3] text-lg shadow-md">4</div>
                    <div>
                        <h4 class="text-xl font-bold text-[#F3EDE3] mb-2">Lingkungan Belajar Kondusif</h4>
                        <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify">Menciptakan suasana belajar mengajar yang kondusif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BERITA SECTION -->
<section id="berita" class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-b from-[#153324] via-[#142B1E] to-[#12271C]">
    <!-- Ambient Glow Background -->
    <div class="absolute left-0 top-1/4 h-[500px] w-[500px] rounded-full bg-[#45644A]/20 blur-[170px] pointer-events-none"></div>
    <div class="absolute right-0 bottom-1/4 h-[450px] w-[450px] rounded-full bg-[#E4DBC4]/10 blur-[150px] pointer-events-none"></div>
    
    <div class="relative z-10 mx-auto max-w-7xl px-8 w-full py-24">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
            <div>
                <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 backdrop-blur-2xl px-6 py-2 text-xs font-bold uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                    INFORMASI TERKINI
                </span>
                <h2 class="mt-6 text-5xl font-black text-[#F3EDE3]">
                    Berita & <span class="text-[#E4DBC4]">Artikel</span>
                </h2>
            </div>
            <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-[#E4DBC4] hover:text-[#F3EDE3] transition duration-300 group border-b border-[#E4DBC4]/30 pb-1">
                Lihat Semua Berita <span class="transform transition-transform group-hover:translate-x-1">➔</span>
            </a>
        </div>

        <!-- Grid Berita (3 Kolom) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full">
            <!-- Artikel 1 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col h-full">
                <div class="relative w-full aspect-[4/3] rounded-[35px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/berita1.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" alt="Berita 1">
                    <div class="absolute top-4 left-4 bg-[#12271C]/80 border border-white/10 backdrop-blur-md text-[#E4DBC4] px-4 py-1.5 rounded-full text-xs font-bold">Akademik</div>
                </div>
                <div class="flex items-center gap-3 text-xs text-[#E4DBC4]/60 mb-3">
                    <span>📅 14 Juli 2026</span>
                    <span>•</span>
                    <span>✍️ Admin</span>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-4 line-clamp-2 group-hover:text-[#E4DBC4] transition duration-300">Penerimaan Santri Baru Tahun Ajaran Baru Resmi Dibuka</h3>
                <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify line-clamp-3 mb-6">YPSH NWDI Menggala kembali membuka pendaftaran santri baru dengan kurikulum terintegrasi dan sistem digitalisasi penuh...</p>
                <a href="#" class="mt-auto inline-flex items-center gap-2 text-sm font-bold text-[#E4DBC4] group/btn">Baca Selengkapnya <span class="transform transition-transform group-hover/btn:translate-x-1">→</span></a>
            </div>

            <!-- Artikel 2 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col h-full">
                <div class="relative w-full aspect-[4/3] rounded-[35px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/berita2.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" alt="Berita 2">
                    <div class="absolute top-4 left-4 bg-[#12271C]/80 border border-white/10 backdrop-blur-md text-[#E4DBC4] px-4 py-1.5 rounded-full text-xs font-bold">Kegiatan</div>
                </div>
                <div class="flex items-center gap-3 text-xs text-[#E4DBC4]/60 mb-3">
                    <span>📅 10 Juli 2026</span>
                    <span>•</span>
                    <span>✍️ Humas</span>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-4 line-clamp-2 group-hover:text-[#E4DBC4] transition duration-300">Semarak Khataman Al-Qur'an dan Wisuda Tahfidz Angkatan Ke-X</h3>
                <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify line-clamp-3 mb-6">Suasana khidmat menyelimuti aula utama yayasan dalam perayaan wisuda akbar puluhan hafidz dan hafidzah berprestasi...</p>
                <a href="#" class="mt-auto inline-flex items-center gap-2 text-sm font-bold text-[#E4DBC4] group/btn">Baca Selengkapnya <span class="transform transition-transform group-hover/btn:translate-x-1">→</span></a>
            </div>

            <!-- Artikel 3 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col h-full">
                <div class="relative w-full aspect-[4/3] rounded-[35px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/berita3.jpg') }}" class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" alt="Berita 3">
                    <div class="absolute top-4 left-4 bg-[#12271C]/80 border border-white/10 backdrop-blur-md text-[#E4DBC4] px-4 py-1.5 rounded-full text-xs font-bold">Prestasi</div>
                </div>
                <div class="flex items-center gap-3 text-xs text-[#E4DBC4]/60 mb-3">
                    <span>📅 05 Juli 2026</span>
                    <span>•</span>
                    <span>✍️ Tim Media</span>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-4 line-clamp-2 group-hover:text-[#E4DBC4] transition duration-300">Santri YPSH Menggala Raih Juara Pidato 3 Bahasa Tingkat Provinsi</h3>
                <p class="text-[#E4DBC4]/80 leading-7 text-sm text-justify line-clamp-3 mb-6">Prestasi membanggakan kembali diukir dalam ajang perlombaan bahasa tingkat regional, memperkuat komitmen mutu mutu kompetensi...</p>
                <a href="#" class="mt-auto inline-flex items-center gap-2 text-sm font-bold text-[#E4DBC4] group/btn">Baca Selengkapnya <span class="transform transition-transform group-hover/btn:translate-x-1">→</span></a>
            </div>
        </div>
    </div>
</section>

<!-- SEJARAH SECTION -->
<section id="sejarah" class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-b from-[#12271C] via-[#102017] to-[#0E1812]">
    <div class="absolute -top-40 left-1/4 h-[500px] w-[500px] rounded-full bg-[#45644A]/20 blur-[160px]"></div>
    <div class="absolute right-0 bottom-1/4 h-[550px] w-[550px] rounded-full bg-[#E4DBC4]/5 blur-[180px]"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-8 w-full py-24">
        <div class="grid items-center gap-20 lg:grid-cols-2">
            
            <!-- SISI KIRI: FOTO UTAMA SEJARAH (Rata Sempurna Segala Sisi & Responsif) -->
            <div class="flex justify-center order-2 lg:order-1 w-full">
                <!-- Menggunakan w-full dan aspect-square agar ukuran sisi kiri, kanan, atas, bawahnya rata presisi -->
                <div class="group relative w-full max-w-[500px] aspect-square overflow-hidden rounded-[45px] shadow-[0_30px_80px_rgba(0,0,0,.45)] transition duration-700 hover:rotate-2 hover:scale-[1.03]">
                    
                    <!-- Foto Utama Kotak Lembut Bersih Tanpa Bingkai -->
                    <img src="{{ asset('images/gedung-yayasan.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Gedung Yayasan">
                </div>
            </div>
            <!-- SISI KANAN: KONTEN TEKS & FOTO PEMIMPIN YAYASAN -->
            <div class="order-1 lg:order-2">
                <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 backdrop-blur-2xl px-6 py-2 text-xs font-bold uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                    SEJARAH YAYASAN
                </span>
                <h2 class="mt-8 text-5xl font-black leading-tight text-[#F3EDE3] xl:text-6xl">
                    Sejarah Singkat <br>
                    <span class="text-[#E4DBC4]">Yayasan</span>
                </h2>
                <p class="mt-8 text-lg leading-9 text-[#E4DBC4]/85 text-justify">
                    Yayasan Pendidikan dan Sosial Hidayaturrahman NWDI Menggala, Yang berdiri sejak 1986 telah memberikan banyak sekali kontribusi bagi pendidikan di desa menggala salah satunya melahirkan para hafidz Al-Qur'an, Melahirkan para santri santriwati yang berkualitas bertaraf nasional.
                </p>
                
                <!-- BOX PEMIMPIN (Tetap Berbingkai & Foto Bulat Sempurna) -->
                <div class="group/leader relative mt-12 rounded-[40px] border border-white/15 bg-white/10 backdrop-blur-3xl shadow-[0_25px_60px_rgba(0,0,0,.35)] p-6 transition duration-500 hover:scale-[1.02]">
                    <div class="relative z-10 flex flex-col sm:flex-row items-center sm:items-start gap-6">
                        
                        <!-- Foto Pemimpin: Tetap Dipertahankan Bulat dengan Bingkai Hijau -->
                        <div class="h-28 w-28 flex-shrink-0 rounded-full border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A]">
                            <img src="{{ asset('images/kepala-sekolah.jpeg') }}" class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover/leader:scale-110" alt="Foto Pemimpin">
                        </div>
                        
                        <div class="text-center sm:text-left">
                            <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#E4DBC4]/70 bg-white/5 border border-white/10 px-3 py-1 rounded-full">
                                Ketua yayasan Saat Ini
                            </span>
                            <h3 class="mt-3 text-2xl font-black text-[#F3EDE3]">Dr. TGH. Najmul Akhyar, S.H,. M.H</h3>
                            <p class="mt-2 text-sm leading-7 text-[#E4DBC4]/80 text-justify">Memimpin pengembangan yayasan menuju era transformasi pendidikan modern digital.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- PRESTASI SECTION -->
<section id="prestasi" class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-b from-[#0E1812] via-[#102017] to-[#0A110D]">
    <!-- Ambient Glow Background -->
    <div class="absolute left-0 top-1/4 h-[500px] w-[500px] rounded-full bg-[#45644A]/15 blur-[160px] pointer-events-none"></div>
    <div class="absolute right-0 bottom-0 h-[600px] w-[600px] rounded-full bg-[#45644A]/20 blur-[180px] pointer-events-none"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-8 w-full py-24">
        
        <!-- Header Section -->
        <div class="text-center mb-20">
            <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 backdrop-blur-2xl px-6 py-2 text-xs font-bold uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                PENCAPAIAN KAMI
            </span>
            <h2 class="mt-6 text-5xl font-black text-[#F3EDE3]">
                Prestasi <span class="text-[#E4DBC4]">Yayasan</span>
            </h2>
        </div>

        <!-- Grid Container: Maksimal 4 kolom ke samping -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full">
            
            <!-- BOX 1 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Jauara1_Atletik.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 1">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🏆</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Juara Umum Akademik</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Meraih penghargaan tertinggi dalam kompetisi sains dan riset tingkat provinsi secara berturut-turut.</p>
            </div>

            <!-- BOX 2 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Juara1_GerakJalanPutri.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 2">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🕌</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Tahfidz Quran</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Mencetak lebih dari 100 hafidz dan hafidzah 30 juz yang berkompetensi tinggi di tingkat nasional.</p>
            </div>

            <!-- BOX 3 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Juara1Putri_Pidato_3Bahasa.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 3">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🌐</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Eco Green School</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Apresiasi sekolah berwawasan lingkungan dan pengelolaan tata ruang hijau terbaik berstandar nasional.</p>
            </div>

            <!-- BOX 4 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Juara2_kaligrafi.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 4">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🏅</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Pramuka Garuda</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Meraih tingkatan tertinggi Pramuka tingkat kabupaten dengan keterampilan bidang luar ruangan yang unggul.</p>
            </div>

            <!-- BOX 5 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Juara2_SeniPidato_3Bahasa.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 5">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🎨</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Seni Kaligrafi</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Menyabet medali emas festival seni lukis kaligrafi al-quran kontemporer tingkat provinsi.</p>
            </div>

            <!-- box 6 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/Juara2_Tahfidz.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 2">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🕌</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Tahfidz Quran</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Mencetak lebih dari 100 hafidz dan hafidzah 30 juz yang berkompetensi tinggi di tingkat nasional.</p>
            </div>

            <!-- box 7 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/JuaraHarapan_DutaBaca.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 2">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🕌</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Tahfidz Quran</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Mencetak lebih dari 100 hafidz dan hafidzah 30 juz yang berkompetensi tinggi di tingkat nasional.</p>
            </div>

            <!-- box 8 -->
            <div class="group relative rounded-[45px] border border-white/15 bg-white/5 backdrop-blur-3xl p-6 shadow-[0_30px_60px_rgba(0,0,0,.3)] transition duration-500 hover:-translate-y-2 hover:bg-white/10 flex flex-col items-center text-center h-full">
                <div class="absolute inset-0 rounded-[45px] bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                
                <div class="relative w-full aspect-square rounded-[40px] border-4 border-[#45644A] overflow-hidden shadow-lg bg-[#1B3E2A] mb-6 flex-shrink-0">
                    <img src="{{ asset('images/SebagaiKoperasiBerprestasi.jpg') }}" 
                        class="h-full w-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group-hover:scale-110" 
                        alt="Prestasi 2">
                    <div class="absolute bottom-3 right-3 bg-[#45644A] text-white p-2 rounded-xl text-xs shadow-md">🕌</div>
                </div>
                <h3 class="text-xl font-bold text-[#F3EDE3] mb-3">Tahfidz Quran</h3>
                <p class="text-[#E4DBC4]/80 leading-6 text-xs text-justify">Mencetak lebih dari 100 hafidz dan hafidzah 30 juz yang berkompetensi tinggi di tingkat nasional.</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="kontak" class="relative overflow-hidden bg-gradient-to-b from-[#0A110D] to-[#060A08]">
    <div class="absolute left-1/2 bottom-0 h-[400px] w-[600px] -translate-x-1/2 rounded-full bg-[#45644A]/10 blur-[150px] pointer-events-none"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-8 py-20">
        <div class="grid gap-16 md:grid-cols-2 lg:grid-cols-5"> <!-- Mengubah grid ke col-5 agar muat sejajar dengan proporsional -->
            
            {{-- Bagian Branding --}}
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-black tracking-wider text-[#F3EDE3]">YPSH NWDI <span class="text-[#E4DBC4]">Menggala</span></h2>
                <p class="mt-4 max-w-sm text-sm leading-7 text-[#E4DBC4]/70">
                    Membangun integritas moral, kecerdasan intelektual, dan keteguhan spiritual menuju masa depan gemilang.
                </p>
            </div>

            {{-- Tambahan Bagian Media Sosial di sebelah kiri Hubungi Kami --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-[#F3EDE3] mb-6">Media Sosial</h4>
                <ul class="space-y-4 text-sm text-[#E4DBC4]/80">
                    <li>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 transition-colors hover:text-[#F3EDE3]">
                            <!-- Icon Facebook SVG -->
                            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                            <span>Hidayaturrahman NWDI</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 transition-colors hover:text-[#F3EDE3]">
                            <!-- Icon Instagram SVG -->
                            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.01 3.752.054 2.647.121 3.962 1.425 4.083 4.083.044.968.054 1.32.054 3.752 0 2.43-.01 2.784-.054 3.752-.121 2.647-1.425 3.962-4.083 4.083-.968.044-1.32.054-3.752.054-2.43 0-2.784-.01-3.752-.054-2.647-.121-3.962-1.425-4.083-4.083-.044-.968-.054-1.32-.054-3.752 0-2.43.01-2.784.054-3.752.121-2.647 1.425-3.962 4.083-4.083.968-.044 1.32-.054 3.752-.054H12.315zm0-1.802h-1.37C8.302 .197 7.727.213 7.043.275c-3.11.142-4.814 1.835-4.957 4.957-.061.684-.077 1.259-.077 4.872 0 3.613.016 4.189.077 4.872.142 3.11 1.846 4.814 4.957 4.957.684.062 1.259.077 4.872.077 3.613 0 4.189-.016 4.872-.077 3.11-.142 4.814-1.835 4.957-4.957.061-.684.077-1.259.077-4.872 0-3.613-.016-4.189-.077-4.872-.142-3.11-1.846-4.814-4.957-4.957-.684-.062-1.259-.077-4.872-.077zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" clip-rule="evenodd" />
                            </svg>
                            <span>Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Bagian Hubungi Kami --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-[#F3EDE3] mb-6">Hubungi Kami</h4>
                <ul class="space-y-4 text-sm text-[#E4DBC4]/80">
                    <li class="flex items-center gap-3"><span>📞</span> +62 853-3749-1415</li>
                    <li class="flex items-center gap-3"><span>✉️</span> hidayaturrahmannwdi@gmail.com</li>
                </ul>
            </div>

            {{-- Bagian Alamat Lengkap --}}
            <div>
                <h4 class="text-sm font-bold uppercase tracking-[0.2em] text-[#F3EDE3] mb-6">Alamat Lengkap</h4>
                <p class="text-sm leading-7 text-[#E4DBC4]/80">
                    Jl. H. Mansur, Desa Menggala,<br>
                    Kabupaten Lombok Utara, Provinsi NTB,<br>
                    Kode Pos 83352.
                </p>
            </div>

        </div>
        <div class="mt-20 border-t border-white/5 pt-8 text-center text-xs text-[#E4DBC4]/40">
            <p>&copy; {{ date('Y') }} YPSH NWDI Menggala. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>


<!-- SCRIPT JAVASCRIPT ANIMASI GULIR -->
<script>
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                // Menghitung tinggi navbar agar posisi scroll pas dan tidak menutupi judul
                const navbarHeight = document.querySelector('nav') ? document.querySelector('nav').offsetHeight : 0;
                const targetPosition = targetSection.getBoundingClientRect().top + window.scrollY - navbarHeight;
                
                // Menjalankan animasi gulir halus ke atas atau ke bawah
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>
</body>

</html>