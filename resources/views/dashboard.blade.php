@php
    use App\Models\User;
    use App\Models\pelaporan_pengajar; 

    // 1. Ambil data statistik dasar
    $totalGuru = User::where('role', 'Guru')->count();
    $totalSiswa = User::where('role', 'Siswa')->count();

    // 2. Hitung jumlah seluruh laporan mengajar yang telah dikirimkan
    $totalLaporan = pelaporan_pengajar::count();
@endphp

<x-layouts::app :title="__('Dashboard')">

    <!-- Container Utama menggunakan font-sans tebal -->
    <div class="space-y-12 text-[#F3EDE3] font-sans">

        {{-- Header Section --}}
        <!-- Container dengan efek tepi kaca mengkilap (Beveled Glass Borders & Specular Glow) -->
<div class="relative overflow-hidden rounded-[40px] border-t-2 border-l-2 border-r border-b border-t-white/40 border-l-white/40 border-r-emerald-500/20 border-b-emerald-500/20 bg-emerald-950/15 p-10 md:p-12 backdrop-blur-3xl shadow-[0_30px_80px_rgba(0,0,0,0.45),inset_0_3px_6px_rgba(255,255,255,0.35),inset_0_-3px_8px_rgba(16,185,129,0.25)] hover:shadow-[0_30px_80px_rgba(16,185,129,0.25),inset_0_4px_8px_rgba(255,255,255,0.5)] transition-all duration-500 hover:scale-[1.01] hover:bg-emerald-900/20 hover:border-t-white/60 hover:border-l-white/60">
    
    {{-- Efek kilau cahaya ambient EMERALD super terang di sudut kiri atas --}}
    <div class="absolute -top-16 -left-16 h-44 w-44 rotate-[-20deg] rounded-full bg-gradient-to-br from-white/40 via-emerald-400/30 to-transparent blur-2xl pointer-events-none"></div>
    
    {{-- Efek pantulan cahaya di sudut kanan bawah --}}
    <div class="absolute -bottom-16 -right-16 h-44 w-44 rotate-[45deg] rounded-full bg-gradient-to-tl from-emerald-400/30 via-transparent to-transparent blur-2xl pointer-events-none"></div>
    
    <div class="relative z-10 flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
        {{-- Bagian Teks --}}
        <div class="space-y-2 max-w-3xl">
            <!-- Badge dengan aksen Emerald Glass -->
            <span class="inline-flex rounded-full border-t border-l border-white/30 border-r border-b border-emerald-500/30 bg-emerald-500/10 px-6 py-2 text-xs !font-black uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(16,185,129,0.08)]">
                Dashboard Yayasan
            </span>
            <h1 class="mt-4 text-3xl font-black leading-tight text-[#F3EDE3] xl:text-3xl">
                {{ $profil?->nama_sekolah ?? 'YAYASAN PENDIDIKAN DAN SOSIAL HIDAYATURRAHMAN NWDI MENGGALA' }}
            </h1>
            <p class="text-lg leading-9 text-[#E4DBC4]/85 mt-4 !font-semibold block font-sans">
                Selamat datang kembali di portal manajemen, <span class="!font-black !text-[#F3EDE3] font-sans">{{ auth()->user()->name }}</span>.
            </p>
        </div>
        
        {{-- Logo Showcase --}}
        <div class="flex justify-center shrink-0">
            <div class="relative h-28 w-28 md:h-32 md:w-32 rounded-full border-[4px] border-[#45644A] overflow-hidden shadow-[0_15px_40px_rgba(0,0,0,.45)] bg-[#12271C]">
                <img src="{{ asset('images/yayasan.jpg') }}" alt="Logo Sekolah" class="h-full w-full object-cover" /> 
            </div>
        </div>
    </div>
</div>
        
        <p></p>
        </div>

        {{-- Grid Utama (Total Guru, Total Siswa, Guru Melapor) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1: Total Guru -->
            <div class="relative overflow-hidden rounded-[32px] border border-white/15 bg-white/10 p-8 backdrop-blur-3xl shadow-[0_20px_50px_rgba(0,0,0,.25)] transition duration-500 hover:scale-105 hover:bg-[#45644A]/45 hover:shadow-[0_20px_50px_rgba(24,68,42,.45)]">
                <!-- Efek kilau cahaya ambient dari bagian atas -->
                <div class="absolute -top-12 left-6 h-24 w-40 rotate-[-20deg] rounded-full bg-white/20 blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10">
                    <!-- Label menggunakan tag span standar untuk menghindari paksaan gaya dari komponen UI -->
                    <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 px-4 py-1.5 text-[10px] !font-black uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_4px_20px_rgba(255,255,255,.04)]">
                        Total Guru
                    </span>
                    <!-- Angka dengan ketebalan dipaksa maksimal (!font-black) agar sangat gemuk -->
                    <div class="mt-8 text-6xl !font-black tracking-tight !text-[#F3EDE3] font-sans">
                        {{ $totalGuru }}
                    </div>
                </div>
            </div>

            <!-- Card 2: Total Siswa -->
            <div class="relative overflow-hidden rounded-[32px] border border-white/15 bg-white/10 p-8 backdrop-blur-3xl shadow-[0_20px_50px_rgba(0,0,0,.25)] transition duration-500 hover:scale-105 hover:bg-[#45644A]/45 hover:shadow-[0_20px_50px_rgba(24,68,42,.45)]">
                <div class="absolute -top-12 left-6 h-24 w-40 rotate-[-20deg] rounded-full bg-white/20 blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10">
                    <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 px-4 py-1.5 text-[10px] !font-black uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_4px_20px_rgba(255,255,255,.04)]">
                        Total Siswa
                    </span>
                    <!-- Angka dengan ketebalan dipaksa maksimal (!font-black) dan warna emas hangat -->
                    <div class="mt-8 text-6xl !font-black tracking-tight !text-[#E4DBC4] font-sans">
                        {{ $totalSiswa }}
                    </div>
                </div>
            </div>

            <!-- Card 3: Guru Melapor -->
            <div class="relative overflow-hidden rounded-[32px] border border-white/15 bg-white/10 p-8 backdrop-blur-3xl shadow-[0_20px_50px_rgba(0,0,0,.25)] transition duration-500 hover:scale-105 hover:bg-[#45644A]/45 hover:shadow-[0_20px_50px_rgba(24,68,42,.45)]">
                <div class="absolute -top-12 left-6 h-24 w-40 rotate-[-20deg] rounded-full bg-white/20 blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10">
                    <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 px-4 py-1.5 text-[10px] !font-black uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_4px_20px_rgba(255,255,255,.04)]">
                        Guru Melapor
                    </span>
                    <div class="mt-8 text-6xl !font-black tracking-tight !text-[#F3EDE3] font-sans">
                        {{ $totalLaporan }}
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-layouts::app>