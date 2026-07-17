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

        if (Auth::user()->role !== 'Admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh Guru.');
        }
    } 
    
    #[On('pelaporan-created')]
    #[On('pelaporan-deleted')]
    public function refresh()
    {
        unset($this->folderLaporan);
    }

    #[Computed]
    public function folderLaporan()
    {
        return pelaporan_pengajar::latest()
            ->get()
            ->groupBy('kelas');
    }
};

?>

<div class="space-y-6 font-sans text-[#F3EDE3]">

    <livewire:pages::admin.delete />

    <flux:heading size="xl" class="!text-[#F3EDE3] !font-black tracking-tight text-3xl">
        Pengelola Laporan
    </flux:heading>

    @forelse($this->folderLaporan as $kelas => $laporanKelas)

        {{-- Container Kelas: Liquid Glass Emerald Mengkilap --}}
        <div class="relative overflow-hidden rounded-[32px] border-t-2 border-l-2 border-r border-b border-t-white/40 border-l-white/40 border-r-emerald-500/20 border-b-emerald-500/20 bg-emerald-950/15 p-5 backdrop-blur-3xl shadow-[0_25px_60px_rgba(0,0,0,0.4),inset_0_3px_6px_rgba(255,255,255,0.35)]">
            
            {{-- Efek Kilau Gradasi di Sudut Kaca --}}
            <div class="absolute -top-16 -left-16 h-40 w-40 rotate-[-20deg] rounded-full bg-gradient-to-br from-white/30 via-emerald-400/20 to-transparent blur-2xl pointer-events-none"></div>
            <div class="absolute -bottom-16 -right-16 h-40 w-40 rotate-[45deg] rounded-full bg-gradient-to-tl from-emerald-400/20 via-transparent to-transparent blur-2xl pointer-events-none"></div>

            <div class="relative z-10">
                <div class="flex items-center justify-between gap-3 border-b border-white/10 pb-4">
                    <flux:heading size="lg" class="!text-[#E4DBC4] !font-black tracking-wide">
                        📁 Laporan Dari kelas {{ $kelas }}
                    </flux:heading>

                    <livewire:pages::admin.delete :kelas="$kelas" :key="'delete-folder-' . $kelas" />
                </div>

                <div class="mt-4 space-y-4">

                    @foreach($laporanKelas->groupBy('mata_pelajaran') as $mapel => $laporanMapel)

                        {{-- Container Mata Pelajaran: Inner Glass Panel --}}
                        <div class="rounded-2xl border border-white/20 bg-emerald-900/10 p-4 backdrop-blur-md shadow-[inset_0_1px_3px_rgba(255,255,255,0.15)]">

                            <flux:heading size="base" class="!text-[#E4DBC4]/90 !font-extrabold tracking-wide">
                                📁 {{ $mapel }}
                            </flux:heading>

                            <div class="mt-3 space-y-2">

                                @foreach($laporanMapel as $item)

                                    {{-- Baris Dokumen Guru: Glossy Glass Row --}}
                                    <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 hover:bg-white/10 p-3 transition duration-300 shadow-[inset_0_1px_2px_rgba(255,255,255,0.1)]">

                                        <div>
                                            <div class="font-sans !font-bold text-sm text-[#E4DBC4]/60 tracking-wider">
                                                {{ $item->tanggal }}
                                            </div>

                                            <div class="text-base text-[#F3EDE3] !font-black tracking-tight mt-0.5">
                                                {{ $item->nama_pengajar }}
                                            </div>
                                        </div>

                                        <flux:modal.trigger name="detail-{{ $item->id }}">
                                            <button class="px-5 py-2 text-xs rounded-lg border-t border-l border-white/40 bg-emerald-600/80 hover:bg-emerald-500 text-[#F3EDE3] !font-black tracking-wide shadow-[0_4px_15px_rgba(16,185,129,0.2),inset_0_1px_2px_rgba(255,255,255,0.3)] transition duration-200">
                                                Buka
                                            </button>
                                        </flux:modal.trigger>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>
            </div>

        </div>

    @empty

        <div class="rounded-2xl border border-dashed border-white/20 bg-emerald-950/10 p-6 text-center text-[#E4DBC4]/50 !font-semibold">
            Belum ada laporan.
        </div>

    @endforelse

    @foreach(\App\Models\pelaporan_pengajar::all() as $item)

        {{-- Modal Detail: Gaya Liquid Glass Emerald Gelap --}}
        <flux:modal name="detail-{{ $item->id }}" class="md:w-2xl !bg-[#12271C] border border-white/10 rounded-[32px] p-8 backdrop-blur-3xl">

            <div class="space-y-5 text-[#F3EDE3]">

                <flux:heading size="lg" class="!text-[#F3EDE3] !font-black tracking-tight border-b border-white/10 pb-3 text-xl uppercase">
                    Detail Laporan
                </flux:heading>

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

                <div>
                    <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Mata Pelajaran</strong>
                    <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                        {{ $item->mata_pelajaran }}
                    </div>
                </div>

                <div>
                    <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Materi</strong>
                    <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold leading-relaxed">
                        {{ $item->materi }}
                    </div>
                </div>

                <div>
                    <strong class="text-xs uppercase tracking-wider text-[#E4DBC4]/60 !font-black">Tanggal</strong>
                    <div class="mt-1.5 rounded-xl border border-white/10 bg-white/5 p-3 !font-semibold">
                        {{ $item->tanggal }}
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

    @endforeach

</div>