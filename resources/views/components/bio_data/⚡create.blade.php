<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\bio_dataForm;
use Flux\Flux;

new class extends Component
{
    use WithFileUploads;

    public bio_dataForm $form;

    public $foto;
    public $foto_kk;
    public $sertifikat;

    public function save()
    {
        $this->form->foto = $this->foto;
        $this->form->foto_kk = $this->foto_kk;
        $this->form->sertifikat = $this->sertifikat;

        $this->form->store();

        Flux::modal('Add Bio Data')->close();

        session()->flash('success', 'Pendaftaran berhasil dikirim.');

        $this->dispatch('bio-data-created');
    }
};

?>

<flux:modal name="Add Bio Data" class="md:w-3xl">

    <form wire:submit.prevent="save" class="space-y-5" enctype="multipart/form-data">

        <div>
            <flux:heading size="lg">
                Formulir Pendaftaran Siswa
            </flux:heading>

            <flux:text class="mt-2">
                Silakan lengkapi data berikut.
            </flux:text>
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Foto Profil
            </label>

            <input
                type="file"
                wire:model="foto"
                class="w-full border rounded-lg p-2"
            >
        </div>

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

        <div>
            <label class="block text-sm font-medium mb-2">
                Foto Kartu Keluarga
            </label>

            <input
                type="file"
                wire:model="foto_kk"
                class="w-full border rounded-lg p-2"
            >
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">
                Sertifikat (Opsional)
            </label>

            <input
                type="file"
                wire:model="sertifikat"
                class="w-full border rounded-lg p-2"
            >
        </div>

        <div class="flex">
            <flux:spacer />

            <flux:button
                type="submit"
                variant="primary"
            >
                Kirim Pendaftaran
            </flux:button>

        </div>

    </form>

</flux:modal>