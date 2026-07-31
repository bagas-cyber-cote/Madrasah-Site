<?php

use Livewire\Component;
use App\Models\jadwal;

new class extends Component
{
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

    <flux:heading size="xl">
        Jadwal Pengajar
    </flux:heading>

    <table class="w-full border border-gray-300">

        <thead>

            <tr class="bg-gray-100">

                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Guru</th>
                <th class="border px-4 py-2">Mata Pelajaran</th>
                <th class="border px-4 py-2">Hari</th>
                <th class="border px-4 py-2">Jam</th>

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
                        {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="border px-4 py-4 text-center">
                        Belum ada jadwal.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>