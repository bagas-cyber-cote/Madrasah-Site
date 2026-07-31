<?php

use Livewire\Component;
use App\Models\jadwal;

new class extends Component
{

    public function mount()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
    }
    public function with(): array
    {
        return [
            'jadwals' => jadwal::orderBy('hari')
                ->orderBy('jam_mulai')
                ->get(),
        ];
    }
};

?>

<div class="space-y-6">

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

    <table class="w-full border border-gray-300">

        <thead>

            <tr class="bg-gray-100">

                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Guru</th>
                <th class="border px-4 py-2">Mata Pelajaran</th>
                <th class="border px-4 py-2">Hari</th>
                <th class="border px-4 py-2">Jam</th>
                <th class="border px-4 py-2">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($jadwals as $jadwal)

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
                        {{ $jadwal->hari }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $jadwal->jam_mulai }} -
                        {{ $jadwal->jam_selesai }}
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
                        >
                            Hapus
                        </flux:button>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="border px-4 py-4 text-center">
                        Belum ada jadwal.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>