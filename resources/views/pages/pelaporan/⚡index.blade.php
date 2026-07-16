<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use App\Models\pelaporan_pengajar;

new class extends Component
{
    #[On('pelaporan-created')]
    #[On('pelaporan-deleted')]
    public function refresh()
    {
        unset($this->pelaporan);
    }

    #[Computed]
    public function pelaporan()
    {
        return pelaporan_pengajar::latest()->get();
    }
};

?>

<div class="space-y-6">

    <div class="flex justify-end">
        <flux:modal.trigger name="tambah-pelaporan">
            <flux:button variant="primary">
                Tambah Pelaporan
            </flux:button>
        </flux:modal.trigger>
    </div>

    <livewire:pelaporan.create />
    
    <flux:table>

        <flux:table.columns>
            <flux:table.column>No</flux:table.column>
            <flux:table.column>Mata Pelajaran</flux:table.column>
            <flux:table.column>Aksi</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>

            @forelse($this->pelaporan as $item)

                <flux:table.row>

                    <flux:table.cell>
                        {{ $loop->iteration }}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $item->mata_pelajaran }}
                    </flux:table.cell>

                    <flux:table.cell>

                        <div class="flex gap-2">

                            <flux:modal.trigger name="detail-{{ $item->id }}">
                                <flux:button
                                    size="sm"
                                    variant="primary"
                                >
                                    Lihat
                                </flux:button>
                            </flux:modal.trigger>

                            <flux:modal.trigger name="delete-pelaporan-{{ $item->id }}">
                                <flux:button
                                    size="sm"
                                    variant="danger"
                                >
                                    Hapus
                                </flux:button>
                            </flux:modal.trigger>

                        </div>

                    </flux:table.cell>

                </flux:table.row>

            @empty

                <flux:table.row>

                    <flux:table.cell colspan="3">
                        Belum ada data pelaporan.
                    </flux:table.cell>

                </flux:table.row>

            @endforelse

        </flux:table.rows>

    </flux:table>

    @foreach($this->pelaporan as $item)

        {{-- Modal Detail --}}
        <flux:modal
            name="detail-{{ $item->id }}"
            class="md:w-2xl"
        >

            <div class="space-y-5">

                <flux:heading size="lg">
                    RIWAYAT PELAPORAN
                </flux:heading>

                <div>
                    <strong>Nama Pengajar</strong>

                    <div class="mt-1 rounded-lg border p-2">
                        {{ $item->nama_pengajar }}
                    </div>
                </div>

                <div>
                    <strong>Mata Pelajaran</strong>

                    <div class="mt-1 rounded-lg border p-2">
                        {{ $item->mata_pelajaran }}
                    </div>
                </div>

                <div>
                    <strong>Materi</strong>

                    <div class="mt-1 rounded-lg border p-2">
                        {{ $item->materi }}
                    </div>
                </div>

                <div>
                    <strong>Tanggal</strong>

                    <div class="mt-1 rounded-lg border p-2">
                        {{ $item->tanggal }}
                    </div>
                </div>

                <div>

                    <strong>Foto Bukti</strong>

                    @if($item->foto_bukti)

                        <img
                            src="{{ asset('storage/'.$item->foto_bukti) }}"
                            class="mt-2 w-full max-w-md rounded-lg border object-cover"
                        >

                    @else

                        <div class="mt-2 text-gray-500">
                            Tidak ada foto bukti.
                        </div>

                    @endif

                </div>

            </div>

        </flux:modal>

        <livewire:pelaporan.delet
            :pelaporan="$item"
            :key="'delete-'.$item->id"
        />

    @endforeach

</div>