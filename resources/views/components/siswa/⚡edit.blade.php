<?php

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Livewire\Forms\siswaForm;

new class extends Component
{
    public siswaForm $form;
    public Siswa $siswa;

    public function mount(Siswa $siswa)
    {
        $this->siswa = $siswa;

        $this->form->siswa = $siswa;
        $this->form->nama_siswa = $siswa->nama_siswa;
        $this->form->kelas_id = $siswa->kelas_id;
    }

    public function update()
    {
        $this->validate([
            'form.nama_siswa' => 'required|string|max:255',
            'form.kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->siswa->update([
            'nama_siswa' => $this->form->nama_siswa,
            'kelas_id' => $this->form->kelas_id,
        ]);

        Flux::modal('edit-siswa')->close();

        session()->flash('success', 'Data siswa berhasil diperbarui.');

        $this->dispatch('siswa-updated');
    }

    public function with(): array
    {
        return [
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ];
    }
};

?>

<flux:modal name="edit-siswa" class="md:w-96">

    <form wire:submit.prevent="update" class="space-y-5">

        <flux:heading size="lg">
            Edit Siswa
        </flux:heading>

        <flux:select
            label="Kelas"
            wire:model="form.kelas_id"
        >
            @foreach($kelas as $item)
                <option value="{{ $item->id }}">
                    {{ $item->nama_kelas }}
                </option>
            @endforeach
        </flux:select>

        <flux:input
            label="Nama Siswa"
            wire:model="form.nama_siswa"
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