<?php

use Livewire\Component;
use App\Models\pelaporan_pengajar;

new class extends Component
{
    public string $kelas = '';

    public function hapus()
    {
        if ($this->kelas === '') {
            return;
        }

        pelaporan_pengajar::where('kelas', $this->kelas)->delete();

        $this->dispatch('pelaporan-deleted');
    }
};

?>

<div>
    <flux:button
        variant="danger"
        size="sm"
        wire:click="hapus"
        wire:confirm="Yakin ingin menghapus semua laporan pada folder {{ $kelas }}?"
    >
        Hapus Folder
    </flux:button>
</div>