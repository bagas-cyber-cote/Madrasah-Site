<?php

use Livewire\Component;

new class extends Component
{
    //
};

?>

<div class="min-h-screen bg-gradient-to-b from-[#18442A] via-[#1B3E2A] to-[#12271C] font-sans text-[#F3EDE3] relative overflow-hidden">
    
    {{-- Background Ambient Glow seperti di Section Hero --}}
    <div class="absolute -left-52 -top-52 h-[550px] w-[550px] rounded-full bg-[#45644A]/20 blur-[180px] pointer-events-none"></div>
    <div class="absolute right-0 top-1/4 h-[500px] w-[500px] rounded-full bg-[#E4DBC4]/10 blur-[170px] pointer-events-none"></div>
    <div class="absolute left-1/2 top-1/2 h-[350px] w-[350px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#45644A]/10 blur-[130px] pointer-events-none"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-8 py-20">
        
        {{-- Hero Profile (Liquid Glass Premium - Ukuran Logo Diperkecil & Proporsional) --}}
        <div class="relative overflow-hidden rounded-[40px] border border-white/15 bg-white/10 p-10 md:p-12 backdrop-blur-3xl shadow-[0_30px_80px_rgba(0,0,0,.35)] transition-all duration-500 hover:scale-[1.01]">
            <!-- Efek kilau cahaya ambient dari bagian atas -->
            <div class="absolute -top-12 left-10 h-32 w-52 rotate-[-20deg] rounded-full bg-white/20 blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                {{-- Bagian Teks --}}
                <div class="space-y-6 max-w-3xl">
                    <span class="inline-flex rounded-full border border-[#E4DBC4]/20 bg-white/10 px-6 py-2 text-xs !font-black uppercase tracking-[0.35em] text-[#E4DBC4] shadow-[0_8px_40px_rgba(255,255,255,.08)]">
                        Profil Yayasan
                    </span>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl !font-black leading-tight tracking-tight !text-[#F3EDE3] font-sans">
                        {{ $profil?->nama_sekolah ?? 'YAYASAN PENDIDIKAN DAN SOSIAL HIDAYATURRAHMAN NWDI MENGGALA' }}
                    </h1>
                    <p class="text-base md:text-lg leading-8 text-[#E4DBC4]/85 !font-semibold">
                        Selamat datang di website resmi sekolah. Membangun generasi yang unggul, berkarakter, dan berprestasi.
                    </p>
                </div>
                
                {{-- Logo Showcase (Ukuran diperkecil secara proporsional agar tidak melar) --}}
                <div class="flex justify-center shrink-0">
                    <div class="relative h-28 w-28 md:h-32 md:w-32 rounded-full border-[4px] border-[#45644A] overflow-hidden shadow-[0_15px_40px_rgba(0,0,0,.45)] bg-[#12271C]">
                        <img src="{{ asset('images/yayasan.jpg') }}" alt="Logo Sekolah" class="h-full w-full object-cover" /> 
                    </div>
                </div>
            </div>
        </div>

        {{-- Grid Main Content --}}
        <div class="mt-16 grid gap-12 lg:grid-cols-3 items-start">
            
            {{-- Konten Kiri (Sejarah & Informasi) --}}
            <div class="space-y-12 lg:col-span-2">
                
                {{-- Sejarah Section --}}
                <section class="relative overflow-hidden rounded-[32px] border border-white/10 bg-white/5 p-8 backdrop-blur-3xl shadow-[0_20px_50px_rgba(0,0,0,.2)]">
                    <div class="flex items-center gap-4">
                        <div class="h-8 w-1.5 rounded-full bg-[#E4DBC4]"></div>
                        <h2 class="text-2xl md:text-3xl !font-black tracking-tight text-[#F3EDE3] font-sans">
                            Sejarah Yayasan
                        </h2>
                    </div>
                    <p class="mt-6 text-lg leading-9 text-[#E4DBC4]/85 !font-semibold font-sans">
                        {{ $profil?->history ?? 'Tidak ada informasi sejarah yang tersedia.' }}
                    </p>
                </section>

                {{-- Informasi Section --}}
                <section class="relative overflow-hidden rounded-[32px] border border-white/10 bg-white/5 p-8 backdrop-blur-3xl shadow-[0_20px_50px_rgba(0,0,0,.2)]">
                    <div class="flex items-center gap-4">
                        <div class="h-8 w-1.5 rounded-full bg-[#E4DBC4]"></div>
                        <h2 class="text-2xl md:text-3xl !font-black tracking-tight text-[#F3EDE3] font-sans">
                            Informasi Yayasan
                        </h2>
                    </div>
                    
                    <div class="mt-8 space-y-6 font-sans">
                        <div class="group flex flex-col md:flex-row md:justify-between border-b border-white/10 pb-4 transition hover:border-[#E4DBC4]/40">
                            <span class="!font-black text-[#E4DBC4]/60 uppercase tracking-wider text-xs">
                                Alamat Yayasan
                            </span>
                            <span class="max-w-xl text-left md:text-right !font-semibold text-[#F3EDE3] mt-1 md:mt-0">
                                {{ $profil?->alamat ?? 'Jl. Haji Mansyur Desa Menggala Kecamatan Pemenang Kabupaten Lombok Utara' }}
                            </span>
                        </div>
                        
                        <div class="group flex justify-between border-b border-white/10 pb-4 transition hover:border-[#E4DBC4]/40">
                            <span class="!font-black text-[#E4DBC4]/60 uppercase tracking-wider text-xs">
                                Email
                            </span>
                            <span class="!font-semibold text-[#F3EDE3]">
                                {{ $profil?->email ?? 'YPSH_NWDI@gmail.com' }}
                            </span>
                        </div>
                        
                        <div class="group flex justify-between border-b border-white/10 pb-4 transition hover:border-[#E4DBC4]/40">
                            <span class="!font-black text-[#E4DBC4]/60 uppercase tracking-wider text-xs">
                                No. Telepon
                            </span>
                            <span class="!font-semibold text-[#F3EDE3]">
                                {{ $profil?->no_telp ?? '098754321' }}
                            </span>
                        </div>
                    </div>
                </section>
            </div>

            {{-- Kepala Sekolah Card (Sticky Liquid Glass) --}}
            <div class="lg:sticky lg:top-24">
                <div class="relative overflow-hidden rounded-[32px] border border-white/15 bg-white/10 p-8 backdrop-blur-3xl shadow-[0_30px_80px_rgba(0,0,0,.3)] transition duration-500 hover:scale-[1.02]">
                    <!-- Kilau Cahaya Sudut -->
                    <div class="absolute -top-12 left-6 h-24 w-40 rotate-[-20deg] rounded-full bg-white/20 blur-2xl pointer-events-none"></div>
                    
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="relative h-32 w-32 rounded-full border-4 border-[#45644A] overflow-hidden shadow-lg">
                            <img src="{{ asset('images/kepala-sekolah.jpeg') }}" alt="Kepala Sekolah" class="h-full w-full object-cover" />
                        </div>
                        
                        <h3 class="mt-6 text-2xl !font-black tracking-tight text-[#F3EDE3] font-sans text-center">
                            Kepala Yayasan
                        </h3>
                        <p class="mt-3 text-center text-lg text-[#E4DBC4]/85 !font-semibold">
                            {{ $profil?->kepala_sekolah ?? 'Dr. Tuan Guru. H. Najmul Akhyar, S.H., M.H.' }}
                        </p>
                    </div>

                    <div class="my-6 border-t border-white/10"></div>

                    <div class="space-y-4 text-sm font-sans !font-semibold">
                        <div class="flex justify-between">
                            <span class="text-[#E4DBC4]/60">Status</span>
                            <span class="!font-black text-emerald-400">
                                Aktif
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#E4DBC4]/60">Website</span>
                            <span class="!font-black text-[#E4DBC4]">
                                Resmi
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>