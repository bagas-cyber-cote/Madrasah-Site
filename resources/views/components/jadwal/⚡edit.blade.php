<?php

use Livewire\Component;
use App\Models\jadwal;
use App\Livewire\Forms\jadwalForm;
use Flux\Flux;

new class extends Component
{
    public jadwalForm $form;

    public ?jadwal $jadwal = null;

    public function update()
    {
        if (!$this->jadwal) {
            return;
        }

        $this->validate($this->form->rules());

        $this->jadwal->update([
            'kelas' => $this->form->kelas,
            'guru' => $this->form->guru,
            'mata_pelajaran' => $this->form->mata_pelajaran,
            'hari' => $this->form->hari,
            'jam_mulai' => $this->form->jam_mulai,
            'jam_selesai' => $this->form->jam_selesai,
        ]);

        Flux::modal('edit-jadwal')->close();

        session()->flash('success', 'Jadwal berhasil diperbarui.');

        $this->dispatch('jadwal-updated');
    }
};

?>

<flux:modal name="edit-jadwal" class="md:w-96">

    <form wire:submit.prevent="update" class="space-y-5">

        <flux:heading size="lg">
            Edit Jadwal Pengajar
        </flux:heading>

        <flux:input
            label="Kelas"
            wire:model="form.kelas"
        />

        <flux:input
            label="Guru"
            wire:model="form.guru"
        />

        <flux:input
            label="Mata Pelajaran"
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
                Simpan Perubahan
            </flux:button>

        </div>

    </form>

</flux:modal>