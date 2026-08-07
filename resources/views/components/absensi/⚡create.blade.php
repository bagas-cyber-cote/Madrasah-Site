<?php

use Livewire\Component;
use App\Livewire\Forms\absensiForm;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\DetailAbsensi;
use Illuminate\Support\Facades\Auth;

new class extends Component
{

    public absensiForm $form;


    // menyimpan status setiap siswa
    public array $statusSiswa = [];



    public function getSiswaProperty()
    {
        if (!$this->form->kelas_id) {
            return collect();
        }


        return Siswa::where('kelas_id', $this->form->kelas_id)
            ->orderBy('nama_siswa')
            ->get();
    }

    public function save()
    {

        $absensi = $this->form->store(Auth::id());

        foreach ($this->statusSiswa as $siswaId => $status) {
            DetailAbsensi::create([
                'absensi_id' => $absensi->id,
                'siswa_id' => $siswaId,
                'status' => $status,
            ]);
        }
        session()->flash(
            'success',
            'Absensi berhasil dibuat.'
        );
        $this->dispatch('absensi-created');
        Flux::modal('create-absensi')->close();
    }
    public function with(): array
    {
        return [
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ];
    }

};

?>


<div class="space-y-5">


    <flux:heading size="lg">
        Buat Absensi
    </flux:heading>



    <form wire:submit.prevent="save" class="space-y-5">


        <flux:select
            label="Kelas"
            wire:model.live="form.kelas_id"
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





        <div class="space-y-3">


            <flux:heading size="base">
                Daftar Siswa
            </flux:heading>



            @forelse($this->siswa as $item)


                <div class="flex items-center justify-between rounded-lg border p-3">


                    <div class="font-medium">

                        {{ $loop->iteration }}.
                        {{ $item->nama_siswa }}

                    </div>




                    <select
                        wire:model="statusSiswa.{{ $item->id }}"
                        class="rounded-lg border p-2"
                    >


                        <option value="">
                            Pilih Status
                        </option>


                        <option value="Hadir">
                            Hadir
                        </option>


                        <option value="Izin">
                            Izin
                        </option>


                        <option value="Sakit">
                            Sakit
                        </option>


                        <option value="Tidak Hadir">
                            Alfa
                        </option>


                    </select>


                </div>


            @empty


                <div class="rounded-lg border p-3 text-emerald-600">

                    Pilih kelas terlebih dahulu.

                </div>


            @endforelse


        </div>





        <flux:input
            label="Mata Pelajaran"
            placeholder="Contoh: Matematika"
            wire:model="form.mata_pelajaran"
        />




        <flux:input
            label="Jam Pelajaran"
            placeholder="Contoh: 07:00 - 08:30"
            wire:model="form.jam_pelajaran"
        />




        <flux:textarea
            label="Materi"
            placeholder="Masukkan materi pelajaran"
            wire:model="form.materi"
        />




        <flux:input
            type="date"
            label="Tanggal"
            wire:model="form.tanggal"
        />





        <div class="flex justify-end">


            <flux:button
                type="submit"
                variant="primary"
            >

                Simpan Absensi

            </flux:button>


        </div>


    </form>


</div>