<?php

use Livewire\Component;
use App\Livewire\Forms\bio_dataForm;

new class extends Component
{
    public bio_dataForm $form;

    public function save()
    {
        $this->form->store();
         Flux::modal('Add Bio Data')->close();

        session()->flash('success', 'Bio Data berhasil ditambahkan.');

        $this->dispatch('bio-data-created');
    }
};

?>

<flux:modal name="Add Bio Data" class="md:w-96">

    <form wire:submit="save" class="space-y-6">

        <div>
            <flux:heading size="lg">Bio Data Siswa</flux:heading>
            <flux:text class="mt-2">
                Tambahkan Bio Data Anda
            </flux:text>
        </div>

        <flux:input
            label="Nama"
            placeholder="Nama Lengkap Siswa"
            wire:model="form.nama"
        />

        <flux:input
            label="Tanggal Lahir"
            type="date"
            wire:model="form.tanggal_lahir"
        />

        <flux:select
            label="Jenis Kelamin"
            wire:model="form.jenis_kelamin"
        >
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </flux:select>

        <flux:textarea
            label="Alamat"
            wire:model="form.alamat"
        />

        <flux:input
            label="Asal Sekolah"
            placeholder="Asal Sekolah Sebelumnya"
            wire:model="form.asal_sekolah"
        />

        <div class="flex">
            <flux:spacer />

            <flux:button
                type="submit"
                variant="primary"
            >
                Simpan Bio Data anda
            </flux:button>
        </div>

    </form>

</flux:modal>
