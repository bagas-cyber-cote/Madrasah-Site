<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\pelaporan_pengajar;

new class extends Component
{
    public function mount()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== 'Guru') {
            abort(403, 'Halaman ini hanya dapat diakses oleh Guru.');
        }
    }

    #[On('pelaporan-created')]
    #[On('pelaporan-deleted')]
    public function refresh()
    {
        unset($this->pelaporan);
    }

    #[Computed]
    public function pelaporan()
    {
        return pelaporan_pengajar::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
    }
};

?>

<div class="space-y-6 font-sans">

    {{-- Baris Tombol Aksi Utama --}}
    <div class="flex justify-end">
        <flux:modal.trigger name="tambah-pelaporan">
            <button class="px-6 py-2.5 rounded-xl border-t border-l border-white/40 bg-emerald-500/80 hover:bg-emerald-400 text-[#F3EDE3] !font-black tracking-wide shadow-[0_10px_30px_rgba(16,185,129,0.3),inset_0_2px_4px_rgba(255,255,255,0.4)] transition duration-300 transform hover:-translate-y-0.5">
                Tambah Pelaporan
            </button>
        </flux:modal.trigger>
    </div>

    <livewire:pelaporan.create />

    {{-- Kontainer Utama: Liquid Glass Emerald Mengkilap --}}
    <div class="relative overflow-hidden rounded-[32px] border-t-2 border-l-2 border-r border-b border-t-white/40 border-l-white/40 border-r-emerald-500/20 border-b-emerald-500/20 bg-emerald-950/15 p-6 backdrop-blur-3xl shadow-[0_30px_80px_rgba(0,0,0,0.45),inset_0_3px_6px_rgba(255,255,255,0.35)]">
        
        {{-- Efek Pantulan Cahaya di Sudut --}}
        <div class="absolute -top-16 -left-16 h-40 w-40 rotate-[-20deg] rounded-full bg-gradient-to-br from-white/30 via-emerald-400/20 to-transparent blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-16 -right-16 h-40 w-40 rotate-[45deg] rounded-full bg-gradient-to-tl from-emerald-400/20 via-transparent to-transparent blur-2xl pointer-events-none"></div>

        <div class="relative z-10 overflow-x-auto">
            <flux:table class="w-full text-left">
                <flux:table.columns>
                    <flux:table.column class="!text-[#E4DBC4] !font-black uppercase tracking-wider text-xs">No</flux:table.column>
                    <flux:table.column class="!text-[#E4DBC4] !font-black uppercase tracking-wider text-xs">Kelas</flux:table.column>
                    <flux:table.column class="!text-[#E4DBC4] !font-black uppercase tracking-wider text-xs">Mata Pelajaran</flux:table.column>
                    <flux:table.column class="!text-[#E4DBC4] !font-black uppercase tracking-wider text-xs text-right">Aksi</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse($this->pelaporan as $item)
                        <flux:table.row class="border-b border-white/10 hover:bg-white/5 transition duration-200">
                            
                            <flux:table.cell class="!text-[#F3EDE3] !font-semibold">
                                {{ $loop->iteration }}
                            </flux:table.cell>

                            <flux:table.cell class="!text-[#F3EDE3] !font-semibold">
                                {{ $item->kelas }}
                            </flux:table.cell>

                            <flux:table.cell class="!text-[#F3EDE3] !font-semibold">
                                {{ $item->mata_pelajaran }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <div class="flex gap-3 justify-end items-center">
                                    {{-- Tombol Lihat --}}
                                    <flux:modal.trigger name="detail-{{ $item->id }}">
                                        <button class="px-4 py-1.5 text-xs rounded-lg border-t border-l border-white/30 bg-emerald-600/80 hover:bg-emerald-500 text-[#F3EDE3] !font-black tracking-wide shadow-[inset_0_1px_2px_rgba(255,255,255,0.3)] transition duration-200">
                                            Lihat
                                        </button>
                                    </flux:modal.trigger>

                                    {{-- Tombol Hapus --}}
                                    <flux:modal.trigger name="delete-pelaporan-{{ $item->id }}">
                                        <button class="px-4 py-1.5 text-xs rounded-lg border-t border-l border-white/20 bg-red-600/80 hover:bg-red-500 text-white !font-black tracking-wide transition duration-200">
                                            Hapus
                                        </button>
                                    </flux:modal.trigger>
                                </div>
                            </flux:table.cell>

                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="4" class="text-center !text-[#E4DBC4]/60 py-8 !font-semibold">
                                Belum ada data pelaporan.
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </div>

    {{-- Detail Modals (Juga Disesuaikan dengan Gaya Kaca Mengkilap) --}}
    @foreach($this->pelaporan as $item)
        <flux:modal name="detail-{{ $item->id }}" class="md:w-2xl !bg-[#12271C] border border-white/10 rounded-[32px] p-8 backdrop-blur-3xl">
            <div class="space-y-6 text-[#F3EDE3]">
                
                <h2 class="text-2xl !font-black tracking-tight text-[#F3EDE3] border-b border-white/10 pb-3">
                    RIWAYAT PELAPORAN
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Nama Pengajar</strong>
                        <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                            {{ $item->nama_pengajar }}
                        </div>
                    </div>

                    <div>
                        <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Kelas</strong>
                        <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                            {{ $item->kelas }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Mata Pelajaran</strong>
                        <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                            {{ $item->mata_pelajaran }}
                        </div>
                    </div>

                    <div>
                        <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Tanggal</strong>
                        <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                            {{ $item->tanggal }}
                        </div>
                    </div>
                </div>

                <div>
                    <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Materi</strong>
                    <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold leading-relaxed">
                        {{ $item->materi }}
                    </div>
                </div>

                <div>
                    <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black block mb-2">Foto Bukti</strong>
                    @if($item->foto_bukti)
                        <div class="relative inline-block rounded-2xl border-2 border-[#45644A] overflow-hidden shadow-lg bg-[#12271C]">
                            <img src="{{ asset('storage/' . $item->foto_bukti) }}" class="w-full max-w-md max-h-64 object-cover">
                        </div>
                    @else
                        <div class="mt-1.5 rounded-xl border border-dashed border-white/10 p-4 text-center text-[#E4DBC4]/40 !font-semibold text-sm">
                            Tidak ada foto bukti.
                        </div>
                    @endif
                </div>

            </div>
        </flux:modal>

        <livewire:pelaporan.delet :pelaporan="$item" :key="'delete-'.$item->id" />
    @endforeach

</div>