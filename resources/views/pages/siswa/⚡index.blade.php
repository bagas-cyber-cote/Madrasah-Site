<?php

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

new class extends Component
{

    public $kelasTerpilih = null;


    public function mount()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== 'Admin') {
            abort(403, 'Halaman ini hanya dapat diakses oleh Admin.');
        }
    }


    #[On('siswa-created')]
    public function refresh()
    {
        unset($this->siswa);
    }


    #[Computed]
    public function siswa()
    {
        return Siswa::with('kelas')
            ->get()
            ->groupBy('kelas_id');
    }


    public function bukaKelas($kelasId)
    {
        $this->kelasTerpilih = $kelasId;
    }


    public function tutupKelas()
    {
        $this->kelasTerpilih = null;
    }


};

?>


<div class="space-y-6">


    <div class="flex justify-between items-center">

        <flux:heading size="xl">
            Data Siswa
        </flux:heading>


        <flux:modal.trigger name="add-siswa">

            <flux:button variant="primary">
                Tambah Siswa
            </flux:button>

        </flux:modal.trigger>

    </div>


    <livewire:siswa.crate />


    {{-- Folder kelas --}}

    @if(!$kelasTerpilih)


        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">


            @foreach($this->siswa as $kelasId => $dataSiswa)


                <button
                    wire:click="bukaKelas({{ $kelasId }})"
                    class="rounded-lg border bg-white p-4 hover:shadow-md transition"
                >

                    <div class="flex flex-col items-center">

                        <div class="text-5xl">
                            📁
                        </div>


                        <div class="mt-2 font-semibold">
                            {{ $dataSiswa->first()->kelas->nama_kelas }}
                        </div>


                        <div class="text-sm text-gray-500">
                            {{ $dataSiswa->count() }} Siswa
                        </div>

                    </div>

                </button>


            @endforeach


        </div>


    @else


        {{-- Isi folder kelas --}}

        @php
            $siswaKelas = $this->siswa[$kelasTerpilih];
        @endphp


        <div class="rounded-xl border bg-white p-5">


            <div class="flex justify-between items-center mb-4">


                <flux:heading size="lg">

                    📁 {{ $siswaKelas->first()->kelas->nama_kelas }}

                </flux:heading>


                <flux:button
                    wire:click="tutupKelas"
                    size="sm"
                >
                    Kembali
                </flux:button>


            </div>



            <div class="space-y-2">


                @foreach($siswaKelas as $index => $item)


                    <div class="flex items-center gap-3 rounded-lg border p-3">


                        <div class="font-semibold">
                            {{ $index + 1 }}.
                        </div>


                        <div>
                            {{ $item->nama_siswa }}
                        </div>


                    </div>


                @endforeach


            </div>


        </div>


    @endif


</div>