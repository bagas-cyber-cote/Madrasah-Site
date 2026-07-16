<?php

use Livewire\Component;
use App\Models\pelaporan_pengajar;
use Illuminate\Support\Facades\Storage;
use Flux\Flux;

new class extends Component
{
    public pelaporan_pengajar $pelaporan;

    public function mount(pelaporan_pengajar $pelaporan)
    {
        $this->pelaporan = $pelaporan;
    }

    public function delete()
    {
        if ($this->pelaporan->foto_bukti) {
            Storage::disk('public')->delete($this->pelaporan->foto_bukti);
        }

        $this->pelaporan->delete();

        Flux::modal('delete-pelaporan-' . $this->pelaporan->id)->close();

        $this->dispatch('pelaporan-created');

        session()->flash('success', 'Pelaporan berhasil dihapus.');
    }
};

?>

<flux:modal name="delete-pelaporan-{{ $pelaporan->id }}" class="md:w-md">

    <div class="space-y-6">

        <div>
            <flux:heading size="lg">
                Konfirmasi Hapus
            </flux:heading>

            <flux:text class="mt-2">
                Apakah Anda yakin ingin menghapus pelaporan ini?
            </flux:text>
        </div>

        <div class="flex justify-end gap-2">

            <flux:modal.close>
                <flux:button variant="ghost">
                    Batal
                </flux:button>
            </flux:modal.close>

            <flux:button
                variant="danger"
                wire:click="delete"
            >
                Ya, Hapus
            </flux:button>

        </div>

    </div>

</flux:modal>