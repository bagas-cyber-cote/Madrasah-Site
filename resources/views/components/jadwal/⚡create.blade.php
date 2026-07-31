<?php

use Livewire\Component;
use App\Livewire\Forms\jadwalForm;
use Flux\Flux;

new class extends Component
{
    public jadwalForm $form;

    public function save()
    {
        $this->form->store();

        Flux::modal('add-jadwal')->close();

        session()->flash('success', 'Jadwal berhasil ditambahkan.');

        $this->dispatch('jadwal-created');
    }
};

?>

<flux:modal name="add-jadwal" class="md:w-96">

    <form wire:submit.prevent="save" class="space-y-5">

        <flux:heading size="lg">
            Tambah Jadwal Pengajar
        </flux:heading>

        <flux:input
            label="Kelas"
            placeholder="Contoh: VII A"
            wire:model="form.kelas"
        />

        <flux:input
            label="Guru"
            placeholder="Contoh: Ahmad"
            wire:model="form.guru"
        />

        <flux:input
            label="Mata Pelajaran"
            placeholder="Contoh: Matematika"
            wire:model="form.mata_pelajaran"
        />

        <flux:select
            label="Hari"
            wire:model="form.hari"
        >
            <option value="">Pilih Hari</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
        </flux:select>

        <flux:input
            type="time"
            label="Jam Mulai"
            wire:model="form.jam_mulai"
        />

        <flux:input
            type="time"
            label="Jam Selesai"
            wire:model="form.jam_selesai"
        />

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