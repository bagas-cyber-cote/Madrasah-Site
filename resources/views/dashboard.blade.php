@php
    use App\Models\User;

    $totalGuru = User::where('role', 'Guru')->count();
    $totalSiswa = User::where('role', 'Siswa')->count();
@endphp

<x-layouts::app :title="__('Dashboard')">

    <div class="space-y-6">

        <div>
            <flux:heading size="xl">
                Dashboard
            </flux:heading>

            <flux:text>
                Selamat datang, {{ auth()->user()->name }}
            </flux:text>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <flux:card>
                <flux:heading>Total Guru</flux:heading>

                <div class="mt-4 text-5xl font-bold">
                    {{ $totalGuru }}
                </div>
            </flux:card>

            <flux:card>
                <flux:heading>Total Siswa</flux:heading>

                <div class="mt-4 text-5xl font-bold">
                    {{ $totalSiswa }}
                </div>
            </flux:card>

        </div>

    </div>

</x-layouts::app>