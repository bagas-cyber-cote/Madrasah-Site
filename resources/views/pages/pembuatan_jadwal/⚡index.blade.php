<?php

use Livewire\Component;
use App\Models\jadwal;

new class extends Component
{
    public function mount()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
    }

    public function delete($id)
    {
        jadwal::findOrFail($id)->delete();

        session()->flash('success', 'Jadwal berhasil dihapus.');
    }

    public function with(): array
    {
        return [
            'jadwals' => jadwal::orderByRaw("
                FIELD(
                    hari,
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu'
                )
            ")
            ->orderBy('jam_mulai')
            ->get()
            ->groupBy('hari'),
        ];
    }
};

?>

<div class="space-y-6">

    @if(session('success'))
        <div class="rounded-lg bg-green-100 text-green-700 p-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between">

        <flux:heading size="xl">
            Jadwal Pengajar
        </flux:heading>

        <flux:modal.trigger name="add-jadwal">
            <flux:button variant="primary">
                Tambah Jadwal
            </flux:button>
        </flux:modal.trigger>

    </div>

    <livewire:jadwal.create />
    <livewire:jadwal.edit />

    @forelse($jadwals as $hari => $items)

        <div class="mt-8">

            <h2 class="text-2xl font-bold mb-4">
                {{ $hari }}
            </h2>

            <table class="w-full border border-gray-300">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Guru</th>
                        <th class="border px-4 py-2">Mata Pelajaran</th>
                        <th class="border px-4 py-2">Jam</th>
                        <th class="border px-4 py-2">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($items as $jadwal)

                        <tr>

                            <td class="border px-4 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $jadwal->kelas }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $jadwal->guru }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $jadwal->mata_pelajaran }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                            </td>

                            <td class="border px-4 py-2 flex gap-2">

                                <flux:modal.trigger name="edit-jadwal">
                                    <flux:button
                                        size="sm"
                                        variant="filled"
                                    >
                                        Edit
                                    </flux:button>
                                </flux:modal.trigger>

                                <flux:button
                                    size="sm"
                                    variant="danger"
                                    wire:click="delete({{ $jadwal->id }})"
                                    wire:confirm="Apakah Anda yakin ingin menghapus jadwal ini?"
                                >
                                    Hapus
                                </flux:button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @empty

        <div class="text-center py-10 border rounded-lg">
            Belum ada jadwal.
        </div>

    @endforelse

</div>