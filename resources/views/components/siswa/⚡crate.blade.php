<?php

use Livewire\Component;
use App\Livewire\Forms\siswaForm;
use App\Models\Kelas;

new class extends Component
{
    public siswaForm $form;


    public function save()
    {
        $this->form->store();

        Flux::modal('add-siswa')->close();

        session()->flash('success', 'Siswa berhasil ditambahkan.');

        $this->dispatch('siswa-created');
    }


    public function with(): array
    {
        return [
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ];
    }

};

?>


<flux:modal name="add-siswa" class="md:w-96">

    <form wire:submit.prevent="save" class="space-y-5">


        <flux:heading size="lg">
            Tambah Siswa
        </flux:heading>


        <flux:select
            label="Kelas"
            wire:model="form.kelas_id"
        >

            <option value="">
                Pilih Kelas
            </option>


            @foreach($kelas as $item)

                <option value="{{ $item->id }}">
                    {{ $item->nama_kelas }}
                </option>

            @endforeach


        </flux:select>


        <flux:input
            label="Nama Siswa"
            placeholder="Masukkan nama siswa"
            wire:model="form.nama_siswa"
        />


        <div class="flex justify-end">

            <flux:button
                type="submit"
                variant="primary"
            >
                Simpan
            </flux:button>

        </div>


    </form>

</flux:modal>