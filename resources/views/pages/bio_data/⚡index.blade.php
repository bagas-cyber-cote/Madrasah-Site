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

<div class="space-y-6 flex flex-col items-center justify-center min-h-[80vh] w-full px-4">

    {{-- Tombol Tambah Biodata hanya untuk siswa --}}
    @if(Auth::user()->role === 'siswa' && $biodatas->isEmpty())
        <div class="w-full max-w-sm flex justify-end">
            <flux:modal.trigger name="Add Bio Data">
                <flux:button>Add Bio Data</flux:button>
            </flux:modal.trigger>
        </div>
    @endif

    {{-- Modal Create --}}
    <livewire:bio_data.create />

    @if(Auth::user()->role === 'admin')

        {{-- Tampilan Admin --}}
        @forelse($biodatas as $bio)

            <!-- Card Utama Admin: Sangat Ramping (max-w-sm), Liquid Glass -->
            <div class="space-y-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl p-6 w-full max-w-sm shadow-[0_8px_32px_0_rgba(0,0,0,0.3)] mb-6 text-white">

                <div>
                    <flux:heading size="sm" class="text-white/70 mb-1">Nama</flux:heading>
                    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                        {{ $bio->nama }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="text-white/70 mb-1">Tanggal Lahir</flux:heading>
                    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                        {{ $bio->tanggal_lahir }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="text-white/70 mb-1">Jenis Kelamin</flux:heading>
                    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                        {{ $bio->jenis_kelamin }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="text-white/70 mb-1">Alamat</flux:heading>
                    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                        {{ $bio->alamat }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm" class="text-white/70 mb-1">Asal Sekolah</flux:heading>
                    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                        {{ $bio->asal_sekolah }}
                    </div>
                </div>

            </div>

        @empty

            <p class="text-white/60 backdrop-blur-md bg-white/[0.03] px-4 py-2 rounded-lg border border-white/5">Belum ada biodata.</p>

        @endforelse

    @else

        {{-- Tampilan Siswa --}}
        @php
            $bio = $biodatas->first();
        @endphp

        @if($bio)

            <livewire:bio_data.edit :bio_data="$bio" :key="$bio->id" />

        @endif

        <!-- Card Utama Siswa: Sangat Ramping (max-w-sm), Liquid Glass -->
        <div class="space-y-4 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl p-6 w-full max-w-sm shadow-[0_8px_32px_0_rgba(0,0,0,0.3)] text-white">

            {{-- Lingkaran Foto Profil Ukuran Medium & Bulat Sempurna (h-32 w-32) --}}
            <div class="flex justify-center mb-6">
                @if($bio?->foto)
                    <img
                        src="{{ asset('storage/' . $bio->foto) }}"
                        alt="Foto Profil"
                        class="h-32 w-32 rounded-full object-cover border-2 border-white/20 shadow-lg flex-shrink-0 aspect-square"
                    >
                @else
                    <div class="flex h-32 w-32 items-center justify-center rounded-full border border-dashed border-white/20 bg-white/10 text-sm text-white/70 flex-shrink-0 aspect-square">
                        No Foto
                    </div>
                @endif
            </div>

            <div>
                <flux:heading size="sm" class="text-white/70 mb-1">Nama</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                    {{ $bio?->nama ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-white/70 mb-1">Tanggal Lahir</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                    {{ $bio?->tanggal_lahir ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-white/70 mb-1">Jenis Kelamin</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                    {{ $bio?->jenis_kelamin ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-white/70 mb-1">Alamat</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                    {{ $bio?->alamat ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-white/70 mb-1">Asal Sekolah</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                    {{ $bio?->asal_sekolah ?? '' }}
                </div>
                <div>
                 <flux:heading size="sm" class="text-white/70 mb-1">Email</flux:heading>
                <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
                     {{ $bio->email ?? '-' }}
                </div>
            </div>

            <div>
    <flux:heading size="sm" class="text-white/70 mb-1">NISN</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->nisn ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">NIK</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->nik ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">Nama Ayah</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->nama_ayah ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">Nama Ibu</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->nama_ibu ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">No HP</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->no_hp ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">Tahun Ajaran</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->tahun_ajaran ?? '-' }}
    </div>
</div>

<div>
    <flux:heading size="sm" class="text-white/70 mb-1">Status</flux:heading>
    <div class="border border-white/5 rounded-lg p-3 bg-black/20 text-white/90">
        {{ $bio->status ?? '-' }}
    </div>
</div>

@if($bio?->foto_kk)
<div>
    <flux:heading size="sm" class="text-white/70 mb-1">
        Foto Kartu Keluarga
    </flux:heading>

    <img
        src="{{ asset('storage/' . $bio->foto_kk) }}"
        alt="Foto KK"
        class="w-full rounded-lg border border-white/10"
    >
</div>
@endif

@if($bio?->sertifikat)
<div>
    <flux:heading size="sm" class="text-white/70 mb-1">
        Sertifikat
    </flux:heading>

    <a
        href="{{ asset('storage/' . $bio->sertifikat) }}"
        target="_blank"
        class="text-blue-400 hover:underline"
    >
        Lihat Sertifikat
    </a>
</div>
@endif
            </div>
            

            @if($bio)
                <div class="flex justify-center mt-6">
                    <flux:modal.trigger name="edit-bio-data">
                        <flux:button variant="primary" class="shadow-lg w-full">
                            Edit Bio Data
                        </flux:button>
                    </flux:modal.trigger>
                </div>
            @endif

        </div>

    @endif

</div>