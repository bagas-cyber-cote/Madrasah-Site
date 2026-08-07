<?php

use Livewire\Component;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\DetailAbsensi;
use Flux\Flux;

new class extends Component
{
    public Absensi $absensi;

    public $kelas_id;
    public $mata_pelajaran;
    public $jam_pelajaran;
    public $materi;
    public $tanggal;

    public array $statusSiswa = [];

    public function mount(Absensi $absensi)
    {
        $this->absensi = $absensi;

        $this->kelas_id = $absensi->kelas_id;
        $this->mata_pelajaran = $absensi->mata_pelajaran;
        $this->jam_pelajaran = $absensi->jam_pelajaran;
        $this->materi = $absensi->materi;
        $this->tanggal = $absensi->tanggal;

        foreach (
            DetailAbsensi::where('absensi_id', $absensi->id)->get()
            as $detail
        ) {
            $this->statusSiswa[$detail->siswa_id] = $detail->status;
        }
    }

    public function getSiswaProperty()
    {
        if (!$this->kelas_id) {
            return collect();
        }

        return Siswa::where('kelas_id', $this->kelas_id)
            ->orderBy('nama_siswa')
            ->get();
    }

    public function update()
    {
        $this->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran' => 'required|string|max:255',
            'jam_pelajaran' => 'required|string|max:255',
            'materi' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $this->absensi->update([
            'kelas_id' => $this->kelas_id,
            'mata_pelajaran' => $this->mata_pelajaran,
            'jam_pelajaran' => $this->jam_pelajaran,
            'materi' => $this->materi,
            'tanggal' => $this->tanggal,
        ]);

        foreach ($this->statusSiswa as $siswaId => $status) {

            DetailAbsensi::updateOrCreate(
                [
                    'absensi_id' => $this->absensi->id,
                    'siswa_id' => $siswaId,
                ],
                [
                    'status' => $status,
                ]
            );

        }

        Flux::modal('edit-absensi-'.$this->absensi->id)->close();

        session()->flash('success','Absensi berhasil diupdate.');

        $this->dispatch('absensi-created');
    }

    public function with(): array
    {
        return [
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ];
    }
};

?>

<div>

<flux:modal
    name="edit-absensi-{{ $absensi->id }}"
    class="md:w-5xl"
>

<form wire:submit.prevent="update" class="space-y-5">

    <flux:heading size="lg">
        Edit Absensi
    </flux:heading>

    <flux:select
        label="Kelas"
        wire:model.live="kelas_id"
    >

        @foreach($kelas as $item)

            <option value="{{ $item->id }}">
                {{ $item->nama_kelas }}
            </option>

        @endforeach

    </flux:select>


    <flux:input
        label="Mata Pelajaran"
        wire:model="mata_pelajaran"
    />

    <flux:input
        label="Jam Pelajaran"
        wire:model="jam_pelajaran"
    />

    <flux:textarea
        label="Materi"
        wire:model="materi"
    />

    <flux:input
        type="date"
        label="Tanggal"
        wire:model="tanggal"
    />

    <hr>

    <flux:heading size="base">
        Status Kehadiran Siswa
    </flux:heading>

    <div class="space-y-3 max-h-80 overflow-y-auto">

        @foreach($this->siswa as $item)

        <div class="flex items-center justify-between border rounded-lg p-3">

            <div class="font-medium">
                {{ $loop->iteration }}.
                {{ $item->nama_siswa }}
            </div>

            <select
                wire:model="statusSiswa.{{ $item->id }}"
                class="rounded-lg border p-2"
            >
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Tidak Hadir">Alfa</option>
            </select>

        </div>

        @endforeach

    </div>

    <div class="flex justify-end">

        <flux:button
            type="submit"
            variant="primary"
        >
            Update Absensi
        </flux:button>

    </div>

</form>

</flux:modal>

</div>