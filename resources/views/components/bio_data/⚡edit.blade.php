<?php

use Livewire\Component;
use App\Models\bio_data;
use App\Livewire\Forms\bio_dataForm;

new class extends Component
{
    public bio_dataForm $form;

    public bio_data $bio_data;

    public function mount(bio_data $bio_data)
    {
        $this->bio_data = $bio_data;
        $this->form->setBioData($bio_data);
        
    }

    public function update()
    {
        $this->form->update();

         Flux::modal('edit-bio-data')->close();

        $this->dispatch('bio-data-updated');

        session()->flash('success', 'Bio Data berhasil diupdate.');
    }
};

?>

<flux:modal name="edit-bio-data" class="md:w-96">

    <form wire:submit="update" class="space-y-6">

        <div>
           <flux:heading class="text-center font-extrabold" size="xl">Ubah Bio Data Anda</flux:heading>
            <flux:text class="mt-2 text-center">
                Ubah Bio Data Anda.
            </flux:text>
        </div>

        <flux:input
            label="Nama"
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
            wire:model="form.asal_sekolah"
        />

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">
                Simpan Perubahan
            </flux:button>

        </div>

    </form>

</flux:modal>