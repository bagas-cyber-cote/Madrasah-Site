<?php

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\bio_data;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    #[On('bio-data-created')]
    #[On('bio-data-updated')]
    public function refreshData()
    {
        //
    }

    public function with()
    {
        if (Auth::user()->role === 'admin') {

            return [
                'biodatas' => bio_data::latest()->get(),
            ];

        }

        return [
            'biodatas' => bio_data::where('user_id', Auth::id())
                ->latest()
                ->get(),
        ];
    }
};

?>

<div class="min-h-[85vh] flex flex-col items-center justify-center p-4 lg:p-8 w-full relative z-10 animate-[fadeInUp_0.6s_ease-out_both]">

    {{-- Tombol Tambah Biodata hanya untuk siswa (Di-center dengan gaya liquid glass) --}}
    @if(Auth::user()->role === 'siswa' && $biodatas->isEmpty())
        <div class="mb-8 flex justify-center">
            <flux:modal.trigger name="Add Bio Data">
                <button class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 via-teal-500 to-emerald-600 text-[#040d08] font-extrabold shadow-[0_0_20px_rgba(16,185,129,0.3)] hover:shadow-[0_0_35px_rgba(16,185,129,0.5)] hover:scale-[1.03] transition-all duration-300">
                    Add Bio Data
                </button>
            </flux:modal.trigger>
        </div>
    @endif

    {{-- Modal Create --}}
    <livewire:bio_data.create />

    @if(Auth::user()->role === 'admin')

        {{-- 
            =========================================
            TAMPILAN ADMIN (GRID CENTERED)
            =========================================
            Jika banyak data, disusun menggunakan grid responsif dan tetap diposisikan di tengah.
        --}}
        <div class="w-full max-w-5xl">
            <div class="mb-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-zinc-100 tracking-tight">
                    Daftar <span class="bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent">Biodata Siswa</span>
                </h2>
                <p class="text-sm text-emerald-500/70 mt-2">Panel pemantauan data siswa terdaftar</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center items-stretch">
                @forelse($biodatas as $bio)
                    <div class="w-full bg-[#0f1d15]/40 backdrop-blur-xl border border-emerald-500/15 rounded-3xl p-6 lg:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] hover:border-emerald-500/35 hover:shadow-[0_20px_50px_rgba(16,185,129,0.1)] transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-4">
                            <div>
                                <flux:heading size="sm" class="!text-emerald-400 !font-semibold tracking-wider uppercase text-[10px] mb-1.5">Nama</flux:heading>
                                <div class="bg-[#07190f]/60 border border-emerald-500/10 rounded-xl px-4 py-2.5 text-zinc-100 text-sm">
                                    {{ $bio->nama }}
                                </div>
                            </div>

                            <div>
                                <flux:heading size="sm" class="!text-emerald-400 !font-semibold tracking-wider uppercase text-[10px] mb-1.5">Tanggal Lahir</flux:heading>
                                <div class="bg-[#07190f]/60 border border-emerald-500/10 rounded-xl px-4 py-2.5 text-zinc-100 text-sm">
                                    {{ $bio->tanggal_lahir }}
                                </div>
                            </div>

                            <div>
                                <flux:heading size="sm" class="!text-emerald-400 !font-semibold tracking-wider uppercase text-[10px] mb-1.5">Jenis Kelamin</flux:heading>
                                <div class="bg-[#07190f]/60 border border-emerald-500/10 rounded-xl px-4 py-2.5 text-zinc-100 text-sm">
                                    {{ $bio->jenis_kelamin }}
                                </div>
                            </div>

                            <div>
                                <flux:heading size="sm" class="!text-emerald-400 !font-semibold tracking-wider uppercase text-[10px] mb-1.5">Alamat</flux:heading>
                                <div class="bg-[#07190f]/60 border border-emerald-500/10 rounded-xl px-4 py-2.5 text-zinc-100 text-sm min-h-[60px]">
                                    {{ $bio->alamat }}
                                </div>
                            </div>

                            <div>
                                <flux:heading size="sm" class="!text-emerald-400 !font-semibold tracking-wider uppercase text-[10px] mb-1.5">Asal Sekolah</flux:heading>
                                <div class="bg-[#07190f]/60 border border-emerald-500/10 rounded-xl px-4 py-2.5 text-zinc-100 text-sm">
                                    {{ $bio->asal_sekolah }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-[#0f1d15]/20 border border-emerald-500/10 rounded-3xl backdrop-blur-md">
                        <p class="text-zinc-400">Belum ada biodata siswa yang terekam.</p>
                    </div>
                @endforelse
            </div>
        </div>

    @else

        {{-- Tampilan Siswa --}}
        @php
            $bio = $biodatas->first();
        @endphp

        @if($bio)
            <livewire:bio_data.edit :bio_data="$bio" :key="$bio->id" />
        @endif

        {{-- 
            =========================================
            TAMPILAN SISWA (SINGLE BOX - CENTERED & LARGE)
            =========================================
            Diperbesar menggunakan `max-w-2xl` dan diletakkan persis di pusat layar dengan Liquid Glass premium.
        --}}
        <div class="w-full max-w-2xl bg-[#0f1d15]/40 backdrop-blur-xl border border-emerald-500/20 rounded-3xl p-8 lg:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.6)] hover:border-emerald-500/40 hover:shadow-[0_20px_50px_rgba(16,185,129,0.15)] transition-all duration-500">
            
            <div class="mb-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-extrabold text-zinc-100 tracking-tight">
                    Bio Data <span class="bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent">Siswa</span>
                </h2>
                <p class="text-sm text-emerald-500/70 mt-2 font-medium">Data pribadi yang terdaftar pada sistem</p>
            </div>

            <div class="space-y-6">
                <div>
                    <flux:heading size="sm" class="!text-emerald-400 !font-bold tracking-wider uppercase text-xs mb-2">Nama Lengkap</flux:heading>
                    <div class="bg-[#07190f]/60 border border-emerald-500/20 rounded-xl px-4 py-3.5 text-zinc-100 text-sm font-medium">
                        {{ $bio?->nama ?? 'Belum diisi' }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="!text-emerald-400 !font-bold tracking-wider uppercase text-xs mb-2">Tanggal Lahir</flux:heading>
                    <div class="bg-[#07190f]/60 border border-emerald-500/20 rounded-xl px-4 py-3.5 text-zinc-100 text-sm font-medium">
                        {{ $bio?->tanggal_lahir ?? 'Belum diisi' }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="!text-emerald-400 !font-bold tracking-wider uppercase text-xs mb-2">Jenis Kelamin</flux:heading>
                    <div class="bg-[#07190f]/60 border border-emerald-500/20 rounded-xl px-4 py-3.5 text-zinc-100 text-sm font-medium">
                        {{ $bio?->jenis_kelamin ?? 'Belum diisi' }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="!text-emerald-400 !font-bold tracking-wider uppercase text-xs mb-2">Alamat Domisili</flux:heading>
                    <div class="bg-[#07190f]/60 border border-emerald-500/20 rounded-xl px-4 py-3.5 text-zinc-100 text-sm font-medium min-h-[80px]">
                        {{ $bio?->alamat ?? 'Belum diisi' }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="!text-emerald-400 !font-bold tracking-wider uppercase text-xs mb-2">Asal Sekolah</flux:heading>
                    <div class="bg-[#07190f]/60 border border-emerald-500/20 rounded-xl px-4 py-3.5 text-zinc-100 text-sm font-medium">
                        {{ $bio?->asal_sekolah ?? 'Belum diisi' }}
                    </div>
                </div>

                @if($bio)
                    <div class="flex justify-end pt-4">
                        <flux:modal.trigger name="edit-bio-data">
                            <button class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-emerald-500 via-emerald-600 to-teal-500 text-[#040d08] font-bold shadow-[0_0_20px_rgba(16,185,129,0.3)] hover:shadow-[0_0_30px_rgba(16,185,129,0.45)] hover:scale-[1.02] transition-all duration-300">
                                Edit Bio Data
                            </button>
                        </flux:modal.trigger>
                    </div>
                @endif
            </div>

        </div>

    @endif

</div>

{{-- Custom Style Keyframe Animation --}}
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>