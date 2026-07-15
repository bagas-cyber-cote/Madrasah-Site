<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\bio_data;
use App\Livewire\Forms\bio_dataForm;

new class extends Component
{
    use WithFileUploads;

    public bio_dataForm $form;
    public $foto;

    public bio_data $bio_data;

    public function mount(bio_data $bio_data)
    {
        $this->bio_data = $bio_data;
        $this->form->setBioData($bio_data);
        
    }

    public function update()
    {
        $this->form->foto = $this->foto;
        $this->form->update();

        Flux::modal('edit-bio-data')->close();

        $this->dispatch('bio-data-updated');

        session()->flash('success', 'Bio Data berhasil diupdate.');
    }

    public function removePhoto(): void
    {
        if (!$this->bio_data?->foto) {
            session()->flash('error', 'Foto profil belum ada.');
            return;
        }

        $path = $this->bio_data->foto;

        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $this->bio_data->forceFill(['foto' => null])->save();
        $this->bio_data->refresh();
        $this->form->setBioData($this->bio_data);

        session()->flash('success', 'Foto profil berhasil dihapus.');
    }
};

?>

<flux:modal name="edit-bio-data" class="md:w-96">

    <form wire:submit.prevent="update" class="space-y-6" enctype="multipart/form-data">

        <div>
           <flux:heading class="text-center font-extrabold" size="xl">Ubah Bio Data Anda</flux:heading>
            <flux:text class="mt-2 text-center">
                Ubah Bio Data Anda.
            </flux:text>
        </div>

        @if($bio_data->foto)
            <div class="flex flex-col items-center gap-2">
                <img
                    src="{{ asset('storage/' . $bio_data->foto) }}"
                    class="w-24 h-24 rounded-full object-cover border"
                >
                <button
                    type="button"
                    wire:click="removePhoto"
                    class="text-sm text-red-500 hover:underline"
                >
                    Hapus Foto
                </button>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium mb-2">
                Foto Profil
            </label>

            <input
                type="file"
                wire:model="foto"
                accept=".jpg,.jpeg,.png"
                class="block w-full border rounded-lg p-2"
            >

            @error('foto')
                <span class="text-red-500 text-sm">
                    {{ $message }}
                </span>
            @enderror
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