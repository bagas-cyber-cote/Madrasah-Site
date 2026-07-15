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
        <div class="w-full max-w-2xl flex justify-end">
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

            <!-- Card Utama: Warna disamakan dengan foto (gelap, tanpa border putih, menggunakan border abu-abu sangat tipis & gelap) -->
            <div class="space-y-4 rounded-2xl border border-white/5 bg-white/[0.03] backdrop-blur-md p-6 w-full max-w-2xl shadow-2xl mb-6 text-white">

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

        <!-- Card Utama: Warna disamakan dengan foto (gelap, tanpa border putih, menggunakan border abu-abu sangat tipis & gelap) -->
        <div class="space-y-4 rounded-2xl border border-white/5 bg-white/[0.03] backdrop-blur-md p-6 w-full max-w-2xl shadow-2xl text-white">

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
            </div>

            @if($bio)
                <div class="flex justify-center mt-6">
                    <flux:modal.trigger name="edit-bio-data">
                        <flux:button variant="primary" class="shadow-lg">
                            Edit Bio Data
                        </flux:button>
                    </flux:modal.trigger>
                </div>
            @endif

        </div>

    @endif

</div>