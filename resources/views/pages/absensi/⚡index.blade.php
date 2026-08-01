<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use App\Models\Absensi;
use App\Models\DetailAbsensi;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public function mount()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== 'Admin' && Auth::user()->role !== 'Guru') {
            abort(403, 'Halaman ini hanya dapat diakses oleh Guru.');
        }
    }

    #[On('absensi-created')]
    #[On('absensi-updated')]
    public function refresh()
    {
        unset($this->absensi);
    }

    public function delete($id)
    {
        DetailAbsensi::where('absensi_id', $id)->delete();

        Absensi::find($id)?->delete();

        session()->flash('success', 'Absensi berhasil dihapus.');

        unset($this->absensi);
    }

    #[Computed]
    public function absensi()
    {
        return Absensi::with('kelas')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

};

?>

<div class="space-y-6">

    @if(session('success'))
        <div class="rounded-lg bg-green-100 text-green-700 p-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center">

        <flux:heading size="xl">
            Data Absensi
        </flux:heading>

        <flux:modal.trigger name="create-absensi">
            <flux:button variant="primary">
                Buat Absensi
            </flux:button>
        </flux:modal.trigger>

    </div>

    <flux:modal
        name="create-absensi"
        class="md:w-5xl"
    >
        <livewire:absensi.create />
    </flux:modal>

    <div class="space-y-4">

        @forelse($this->absensi as $item)

            <div class="rounded-xl border p-5 bg-white">

                <div class="flex justify-between items-start">

                    <div>

                        <flux:heading size="lg">
                            📁 {{ $item->kelas->nama_kelas }}
                        </flux:heading>

                        <div class="text-gray-500">
                            {{ $item->mata_pelajaran }}
                        </div>

                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $item->tanggal }}
                    </div>

                </div>

                <div class="mt-4 space-y-1">

                    <div>
                        <strong>Jam :</strong>
                        {{ $item->jam_pelajaran }}
                    </div>

                    <div>
                        <strong>Materi :</strong>
                        {{ $item->materi }}
                    </div>

                </div>

                <div class="mt-5 flex gap-2">

                    <flux:modal.trigger
                        name="edit-absensi-{{ $item->id }}"
                    >
                        <flux:button
                            size="sm"
                            variant="primary"
                        >
                            Edit
                        </flux:button>
                    </flux:modal.trigger>

                    <flux:button
                        size="sm"
                        variant="danger"
                        wire:click="delete({{ $item->id }})"
                        wire:confirm="Yakin ingin menghapus absensi ini?"
                    >
                        Hapus
                    </flux:button>

                </div>

                <livewire:absensi.edit
                    :absensi="$item"
                    :key="'edit-'.$item->id"
                />

            </div>

        @empty

            <div class="rounded-xl border p-5 text-center text-gray-500">
                Belum ada absensi.
            </div>

        @endforelse

    </div>

</div>