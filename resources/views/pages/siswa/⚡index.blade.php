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

    // Hapus satu siswa
    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();

        unset($this->siswa);

        session()->flash('success', 'Data siswa berhasil dihapus.');
    }

    // Hapus semua siswa dalam satu kelas
    public function deleteFolder($kelasId)
    {
        Siswa::where('kelas_id', $kelasId)->delete();

        unset($this->siswa);

        $this->kelasTerpilih = null;

        session()->flash('success', 'Semua siswa pada kelas berhasil dihapus.');
    }
};

?>

<div class="space-y-6">

    @if(session('success'))
        <div class="rounded-lg bg-green-100 p-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

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

    @if(!$kelasTerpilih)

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">

            @foreach($this->siswa as $kelasId => $dataSiswa)

                <div class="relative rounded-lg border bg-white p-4 hover:shadow-md transition">

                    {{-- Tombol titik tiga --}}
                    <div class="absolute top-2 right-2">

                        <details>

                            <summary class="cursor-pointer list-none text-xl font-bold">
                                ⋮
                            </summary>

                            <div class="absolute right-0 mt-2 w-32 rounded-lg border bg-white shadow-lg z-50">

                                <button
                                    wire:click="deleteFolder({{ $kelasId }})"
                                    wire:confirm="Yakin ingin menghapus semua siswa pada kelas ini?"
                                    class="w-full px-3 py-2 text-left text-red-600 hover:bg-red-50"
                                >
                                    🗑 Hapus
                                </button>

                            </div>

                        </details>

                    </div>

                    <button
                        wire:click="bukaKelas({{ $kelasId }})"
                        class="w-full"
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

                </div>

            @endforeach

        </div>

    @else

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

            <div class="space-y-3">

                @foreach($siswaKelas as $index => $item)

                    <div class="flex justify-between items-center rounded-lg border p-3">

                        <div class="flex items-center gap-3">

                            <div class="font-semibold">
                                {{ $index + 1 }}.
                            </div>

                            <div>
                                {{ $item->nama_siswa }}
                            </div>

                        </div>

                        <flux:button
                            variant="danger"
                            size="sm"
                            wire:click="delete({{ $item->id }})"
                            wire:confirm="Yakin ingin menghapus siswa ini?"
                        >
                            Hapus
                        </flux:button>

                    </div>

                @endforeach

            </div>

        </div>

    @endif

</div>