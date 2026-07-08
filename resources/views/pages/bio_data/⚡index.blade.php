<?php

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\bio_data;

new class extends Component
{
    #[On('bio-data-created')]
    public function refreshData()
    {
        //
    }

    public function with()
    {
        return [
            'biodatas' => bio_data::latest()->get(),
        ];
    }
};

?>

<div class="space-y-6">

    <flux:modal.trigger name="Add Bio Data">
        <flux:button>Add Bio Data</flux:button>
    </flux:modal.trigger>

    <livewire:bio_data.create />

    @php
    $bio = $biodatas->first();
@endphp

<div class="space-y-3 rounded-lg border p-4">

    <div>
        <flux:heading size="sm">Nama</flux:heading>
        <div class="border rounded p-2 border-gray-950 w-64">
            {{ $bio?->nama ?? '' }}
        </div>
    </div>

    <div>
        <flux:heading size="sm">Tanggal Lahir</flux:heading>
        <div class="border rounded p-2 w-64">
            {{ $bio?->tanggal_lahir ?? '' }}
        </div>
    </div>

    <div>
        <flux:heading size="sm">Jenis Kelamin</flux:heading>
        <div class="border rounded p-2 w-64">
            {{ $bio?->jenis_kelamin ?? '' }}
        </div>
    </div>

    <div>
        <flux:heading size="sm">Alamat</flux:heading>
        <div class="border rounded p-2 w-64">
            {{ $bio?->alamat ?? '' }}
        </div>
    </div>

    <div>
        <flux:heading size="sm">Asal Sekolah</flux:heading>
        <div class="border rounded p-2 w-64">
            {{ $bio?->asal_sekolah ?? '' }}
        </div>
    </div>

</div>