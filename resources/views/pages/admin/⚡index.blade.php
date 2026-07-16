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

<div class="space-y-6">

    <livewire:pages::admin.delete />

    <flux:heading size="xl">
        Pengelola Laporan
    </flux:heading>

    @forelse($this->folderLaporan as $kelas => $laporanKelas)

        <div class="rounded-xl border p-5 bg-white">

            <div class="flex items-center justify-between gap-3">
                <flux:heading size="lg">
                    📁 Laporan Dari kelas {{ $kelas }}
                </flux:heading>

                <livewire:pages::admin.delete :kelas="$kelas" :key="'delete-folder-' . $kelas" />
            </div>

            <div class="mt-4 space-y-4">

                @foreach($laporanKelas->groupBy('mata_pelajaran') as $mapel => $laporanMapel)

                    <div class="rounded-lg border p-4">

                        <flux:heading size="base">
                            📁 {{ $mapel }}
                        </flux:heading>

                        <div class="mt-3 space-y-2">

                            @foreach($laporanMapel as $item)

                                <div class="flex items-center justify-between rounded-lg border p-3">

                                    <div>
                                        <div class="font-medium">
                                            {{ $item->tanggal }}
                                        </div>

                                        <div class="text-sm text-gray-500">
                                            {{ $item->nama_pengajar }}
                                        </div>
                                    </div>

                                    <flux:modal.trigger name="detail-{{ $item->id }}">
                                        <flux:button size="sm" variant="primary">
                                            Buka
                                        </flux:button>
                                    </flux:modal.trigger>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @empty

        <div class="rounded-xl border p-6 text-center text-gray-500">
            Belum ada laporan.
        </div>

    @endforelse

    @foreach(\App\Models\pelaporan_pengajar::all() as $item)

        <flux:modal name="detail-{{ $item->id }}" class="md:w-2xl">

            <div class="space-y-5">

                <flux:heading size="lg">
                    Detail Laporan
                </flux:heading>

                <div>
                    <strong>Nama Pengajar</strong>
                    <div class="mt-1 border rounded-lg p-2">
                        {{ $item->nama_pengajar }}
                    </div>
                </div>

                <div>
                    <strong>Kelas</strong>
                    <div class="mt-1 border rounded-lg p-2">
                        {{ $item->kelas }}
                    </div>
                </div>

                <div>
                    <strong>Mata Pelajaran</strong>
                    <div class="mt-1 border rounded-lg p-2">
                        {{ $item->mata_pelajaran }}
                    </div>
                </div>

                <div>
                    <strong>Materi</strong>
                    <div class="mt-1 border rounded-lg p-2">
                        {{ $item->materi }}
                    </div>
                </div>

                <div>
                    <strong>Tanggal</strong>
                    <div class="mt-1 border rounded-lg p-2">
                        {{ $item->tanggal }}
                    </div>
                </div>

                <div>
                    <strong>Foto Bukti</strong>

                    @if($item->foto_bukti)

                        <img
                            src="{{ asset('storage/' . $item->foto_bukti) }}"
                            class="mt-2 w-full max-w-md rounded-lg border"
                        >

                    @else

                        <div class="mt-2 text-gray-500">
                            Tidak ada foto bukti.
                        </div>

                    @endif

                </div>

            </div>

        </flux:modal>

    @endforeach

</div>