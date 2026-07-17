<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\pendaftaranForm;

new class extends Component
{
    use WithFileUploads;

    public pendaftaranForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('success', 'Pendaftaran berhasil dikirim.');

        $this->form->reset();
    }
};

?>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow-lg border p-8">

        <h1 class="text-3xl font-bold mb-2">
            Formulir Pendaftaran Siswa Baru
        </h1>

        <p class="text-gray-500 mb-6">
            Silakan isi data di bawah ini dengan lengkap.
        </p>

        @if(session()->has('success'))
            <div class="mb-5 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form
            wire:submit.prevent="save"
            enctype="multipart/form-data"
            class="space-y-5"
        >

            <flux:input
                label="Nama Lengkap"
                wire:model="form.nama"
            />
            @error('form.nama')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                type="email"
                label="Email"
                wire:model="form.email"
            />
            @error('form.email')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="NISN"
                wire:model="form.nisn"
            />
            @error('form.nisn')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="NIK"
                wire:model="form.nik"
            />
            @error('form.nik')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                type="date"
                label="Tanggal Lahir"
                wire:model="form.tanggal_lahir"
            />
            @error('form.tanggal_lahir')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:select
                label="Jenis Kelamin"
                wire:model="form.jenis_kelamin"
            >
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </flux:select>
            @error('form.jenis_kelamin')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:textarea
                label="Alamat"
                wire:model="form.alamat"
            />
            @error('form.alamat')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="Asal Sekolah"
                wire:model="form.asal_sekolah"
            />
            @error('form.asal_sekolah')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="Nama Ayah"
                wire:model="form.nama_ayah"
            />
            @error('form.nama_ayah')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="Nama Ibu"
                wire:model="form.nama_ibu"
            />
            @error('form.nama_ibu')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <flux:input
                label="No. HP"
                wire:model="form.no_hp"
            />
            @error('form.no_hp')
                <div class="text-sm text-red-500">{{ $message }}</div>
            @enderror

            <div>
                <label class="block mb-2 font-medium">
                    Upload Foto Kartu Keluarga (KK)
                </label>

                <input
                    type="file"
                    wire:model="form.foto_kk"
                    accept=".jpg,.jpeg,.png"
                    class="w-full rounded-lg border p-2"
                >

                <div
                    wire:loading
                    wire:target="form.foto_kk"
                    class="text-blue-600 text-sm mt-2"
                >
                    Mengupload KK...
                </div>

                @error('form.foto_kk')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Upload Sertifikat (Opsional)
                </label>

                <input
                    type="file"
                    wire:model="form.sertifikat"
                    accept=".jpg,.jpeg,.png"
                    class="w-full rounded-lg border p-2"
                >

                <div
                    wire:loading
                    wire:target="form.sertifikat"
                    class="text-blue-600 text-sm mt-2"
                >
                    Mengupload Sertifikat...
                </div>

                @error('form.sertifikat')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">

                <flux:button
                    type="submit"
                    variant="primary"
                    wire:loading.attr="disabled"
                >

                    <span wire:loading.remove>
                        Kirim Pendaftaran
                    </span>

                    <span wire:loading>
                        Mengirim...
                    </span>

                </flux:button>

            </div>

        </form>

    </div>

</div>