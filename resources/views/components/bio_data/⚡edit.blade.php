<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\bio_data;
use App\Livewire\Forms\bio_dataForm;
use Flux\Flux;

new class extends Component
{
    use WithFileUploads;

    public bio_dataForm $form;

    public $foto;
    public $foto_kk;
    public $sertifikat;

    public bio_data $bio_data;

    public function mount(bio_data $bio_data)
    {
        $this->bio_data = $bio_data;
        $this->form->setBioData($bio_data);
    }

    public function update()
    {
        $this->form->foto = $this->foto;
        $this->form->foto_kk = $this->foto_kk;
        $this->form->sertifikat = $this->sertifikat;

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

        $this->bio_data->forceFill([
            'foto' => null
        ])->save();

        $this->bio_data->refresh();

        $this->form->setBioData($this->bio_data);

        session()->flash('success', 'Foto profil berhasil dihapus.');
    }
};

?>

<flux:modal name="edit-bio-data" class="md:w-3xl">

    <form wire:submit.prevent="update" class="space-y-5" enctype="multipart/form-data">

        <div>
            <flux:heading size="lg">
                Edit Data Pendaftaran
            </flux:heading>

            <flux:text class="mt-2">
                Silakan perbarui data berikut.
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

        <flux:input
            type="file"
            label="Foto Profil"
            wire:model="foto"
        />

        <flux:input
            label="Nama Lengkap"
            wire:model="form.nama"
        />

        <flux:input
            type="email"
            label="Email"
            wire:model="form.email"
        />

        <flux:input
            label="NISN"
            wire:model="form.nisn"
        />

        <flux:input
            label="NIK"
            wire:model="form.nik"
        />

        <flux:input
            type="date"
            label="Tanggal Lahir"
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

        <flux:input
            label="Nama Ayah"
            wire:model="form.nama_ayah"
        />

        <flux:input
            label="Nama Ibu"
            wire:model="form.nama_ibu"
        />

        <flux:input
            label="No HP"
            wire:model="form.no_hp"
        />

        <flux:select
            label="Tahun Ajaran"
            wire:model="form.tahun_ajaran"
        >
            <option value="">Pilih Tahun Ajaran</option>
            <option value="2026/2027">2026/2027</option>
            <option value="2027/2028">2027/2028</option>
            <option value="2028/2029">2028/2029</option>
        </flux:select>

        <flux:input
            type="file"
            label="Foto Kartu Keluarga"
            wire:model="foto_kk"
        />

        <flux:input
            type="file"
            label="Sertifikat (Opsional)"
            wire:model="sertifikat"
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