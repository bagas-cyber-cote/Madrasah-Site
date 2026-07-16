<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\pelaporanForm;
use Flux\Flux;

new class extends Component
{
    use WithFileUploads;

    public pelaporanForm $form;

    public function save()
    {
        $this->form->store();

        // Refresh komponen index
        $this->dispatch('pelaporan-created');

        session()->flash('success', 'Laporan berhasil ditambahkan.');

        // Tutup modal setelah data tersimpan
        Flux::modal('tambah-pelaporan')->close();
    }
};

?>

<flux:modal name="tambah-pelaporan" flyout>

    <form wire:submit.prevent="save" class="space-y-6">

        <div>
            <flux:heading size="lg">
                Tambah Pelaporan Pengajar
            </flux:heading>

            <flux:text class="mt-2">
                Silahkan isi data pelaporan pengajar.
            </flux:text>
        </div>

        <flux:input
            label="Nama Pengajar"
            wire:model="form.nama_pengajar"
        />
        <flux:input
            label="Kelas"
            wire:model="form.kelas"
        />
        <flux:input
            label="Mata Pelajaran"
            wire:model="form.mata_pelajaran"
        />

        <flux:textarea
            label="Materi"
            wire:model="form.materi"
        />

        <flux:input
            type="date"
            label="Tanggal"
            wire:model="form.tanggal"
        />

        <div>
            <label class="block text-sm font-medium mb-2">
                Foto Bukti
            </label>

            <input
                type="file"
                wire:model="form.foto_bukti"
                accept=".jpg,.jpeg,.png"
                class="block w-full border rounded-lg p-2"
            >

            <div wire:loading wire:target="form.foto_bukti">
                Uploading...
            </div>

            @error('form.foto_bukti')
                <span class="text-red-500 text-sm">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="flex">
            <flux:spacer />

            <flux:button
                type="submit"
                variant="primary"
            >
                Simpan
            </flux:button>
        </div>

    </form>

</flux:modal>