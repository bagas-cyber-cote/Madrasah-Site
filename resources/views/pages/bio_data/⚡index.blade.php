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

<div class="space-y-6">

    {{-- Tombol Tambah Biodata hanya untuk siswa --}}
    @if(Auth::user()->role === 'siswa' && $biodatas->isEmpty())
        <flux:modal.trigger name="Add Bio Data">
            <flux:button>Add Bio Data</flux:button>
        </flux:modal.trigger>
    @endif

    {{-- Modal Create --}}
    <livewire:bio_data.create />

    @if(Auth::user()->role === 'admin')

        {{-- Tampilan Admin --}}
        @forelse($biodatas as $bio)

            <div class="space-y-3 rounded-lg border border-gray-900 p-4 w-80 mb-4">

                <div>
                    <flux:heading size="sm">Nama</flux:heading>
                    <div class="border rounded p-2">
                        {{ $bio->nama }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm">Tanggal Lahir</flux:heading>
                    <div class="border rounded p-2">
                        {{ $bio->tanggal_lahir }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm">Jenis Kelamin</flux:heading>
                    <div class="border rounded p-2">
                        {{ $bio->jenis_kelamin }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm">Alamat</flux:heading>
                    <div class="border rounded p-2">
                        {{ $bio->alamat }}
                    </div>
                </div>

                <div>
                    <flux:heading size="sm">Asal Sekolah</flux:heading>
                    <div class="border rounded p-2">
                        {{ $bio->asal_sekolah }}
                    </div>
                </div>

            </div>

        @empty

            <p>Belum ada biodata.</p>

        @endforelse

    @else

        {{-- Tampilan Siswa --}}
        @php
            $bio = $biodatas->first();
        @endphp

        @if($bio)

            <livewire:bio_data.edit :bio_data="$bio" :key="$bio->id" />

        @endif

        <div class="space-y-3 rounded-lg border border-gray-900 p-4 w-80">

            <div>
                <flux:heading size="sm">Nama</flux:heading>
                <div class="border rounded p-2">
                    {{ $bio?->nama ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm">Tanggal Lahir</flux:heading>
                <div class="border rounded p-2">
                    {{ $bio?->tanggal_lahir ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm">Jenis Kelamin</flux:heading>
                <div class="border rounded p-2">
                    {{ $bio?->jenis_kelamin ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm">Alamat</flux:heading>
                <div class="border rounded p-2">
                    {{ $bio?->alamat ?? '' }}
                </div>
            </div>

            <div>
                <flux:heading size="sm">Asal Sekolah</flux:heading>
                <div class="border rounded p-2">
                    {{ $bio?->asal_sekolah ?? '' }}
                </div>
            </div>

            @if($bio)
                <div class="aura aura-rainbow flex justify-center mt-4">
                    <flux:modal.trigger name="edit-bio-data">
                        <flux:button variant="primary">
                            Edit Bio Data
                        </flux:button>
                    </flux:modal.trigger>
                </div>
            @endif

        </div>

    @endif

</div>