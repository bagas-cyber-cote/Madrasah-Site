<?php

use Livewire\Component;

new class extends Component
{
    //
};

?>

<div class="min-h-screen bg-[#0f1115]">
    <div class="mx-auto max-w-7xl px-8 py-12">
        {{-- Hero --}}
        <flux:card
            class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-r from-[#14532d] via-[#166534] to-[#0f1115] p-10 shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-emerald-400/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 h-72 w-72 rounded-full bg-yellow-400/10 blur-3xl"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <span
                        class="rounded-full border border-emerald-400/30 bg-emerald-500/20 px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-300">
                        Profil Yayasan
                    </span>
                    <h1 class="mt-6 text-5xl font-bold text-white">
                        {{ $profil?->nama_sekolah ?? 'YAYASAN PENDIDIKAN DAN SOSIAL HIDAYATURRAHMAN NWDI MENGGALA' }}
                    </h1>
                    <p class="mt-4 max-w-2xl text-lg leading-8 text-zinc-300">
                        Selamat datang di website resmi sekolah. Membangun generasi yang unggul,
                        berkarakter, dan berprestasi.
                    </p>
                </div>
                <div
                    class="flex aspect-hidden h-32 w-32 items-center justify-center rounded-full bg-gradient-to-tr from-emerald-950 p-1">
                    <img src="{{ asset('images/yayasan.jpg') }}" alt="Logo Sekolah"
                        class="h-full w-full rounded-full object-cover" /> 
                </div>
            </div>
        </flux:card>
        <div class="mt-14 grid gap-14 lg:grid-cols-3">
            {{-- Konten --}}
            <div class="space-y-12 lg:col-span-2">
                {{-- Sejarah --}}
                <section class="animate-fade-in">
                    <div class="flex items-center gap-4">
                        <div class="h-10 w-1 rounded-full bg-emerald-500"></div>
                        <h2 class="text-3xl font-bold text-white">
                            Sejarah yayasan
                        </h2>
                    </div>
                    <p class="mt-6 text-lg leading-9 text-zinc-400">
                        {{ $profil?->history ?? 'Tidak ada informasi sejarah yang tersedia.' }}
                    </p>
                </section>
                {{-- Informasi --}}
                <section>
                    <div class="flex items-center gap-4">
                        <div class="h-10 w-1 rounded-full bg-yellow-500"></div>
                        <h2 class="text-3xl font-bold text-white">
                            Informasi Yayasan
                </h2>
                    </div>
                    <div class="mt-10 space-y-8">
                        <div
                            class="group flex justify-between border-b border-zinc-800 pb-4 transition hover:border-emerald-500">
                            <span class="font-semibold text-zinc-500">
                                Alamat yayasan
                            </span>
                            <span class="max-w-xl text-right text-white">
                                {{ $profil?->alamat ?? 'jl. Haji Mansyur Desa Menggala Kecamatan Pemenang Kabupaten Lombok Utara' }}
                            </span>
                        </div>
                        <div
                            class="group flex justify-between border-b border-zinc-800 pb-4 transition hover:border-emerald-500">
                            <span class="font-semibold text-zinc-500">
                                Email
                            </span>
                            <span class="text-white">
                                {{ $profil?->email ?? 'YPSH_NWDI@gmail.com' }}
                            </span>
                        </div>
                        <div
                            class="group flex justify-between border-b border-zinc-800 pb-4 transition hover:border-emerald-500">
                            <span class="font-semibold text-zinc-500">
                                No. Telepon
                            </span>
                            <span class="text-white">
                                {{ $profil?->no_telp ?? '098754321' }}
                            </span>
                        </div>
                    </div>
                </section>
            </div>
            {{-- Kepala Sekolah --}}
            <div>
                <flux:card
                    class="sticky top-24 rounded-3xl border border-white/10 bg-[#18181b] p-8 shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-emerald-900/40">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/kepala-sekolah.jpeg') }}" alt="Kepala Sekolah"
                            class="h-32 w-32 rounded-full border-4 border-emerald-950 object-cover" />
                        <h3 class="mt-8 text-2xl font-bold text-white">
                            Kepala Yayasan
                        </h3>
                        <p class="mt-3 text-center text-lg text-zinc-300">
                            {{ $profil?->kepala_sekolah ?? 'Bapak Dr.Tuan Guru. H. Najmul Akyar, SH., MH' }}
                        </p>
                    </div>
                    <div class="my-8 border-t border-zinc-800"></div>
                    <div class="space-y-4 text-sm text-zinc-400">
                        <div class="flex justify-between">
                            <span>Status</span>
                            <span class="font-semibold text-emerald-400">
                                Aktif
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span>Website</span>
                            <span class="font-semibold text-yellow-400">
                                Resmi
                            </span>
                        </div>
                    </div>
                </flux:card>
            </div>
        </div>
    </div>
</div>