<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;
use App\Models\pelaporan_pengajar;

class pelaporanForm extends Form
{
    use WithFileUploads;

    public $foto_bukti;

    public string $nama_pengajar = '';
    public string $mata_pelajaran = '';
    public string $materi = '';
    public string $tanggal = '';

    public ?pelaporan_pengajar $pelaporan = null;

    public function rules(): array
    {
        return [
            'foto_bukti' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'nama_pengajar' => [
                'required',
                'string',
                'max:255',
            ],

            'mata_pelajaran' => [
                'required',
                'string',
                'max:255',
            ],

            'materi' => [
                'required',
                'string',
            ],

            'tanggal' => [
                'required',
                'date',
            ],
        ];
    }

    public function store(): void
    {
        $this->validate();

        $path = null;

        if ($this->foto_bukti) {
            $path = $this->foto_bukti->store('foto-bukti', 'public');
        }

        pelaporan_pengajar::create([
            'nama_pengajar' => $this->nama_pengajar,
            'mata_pelajaran' => $this->mata_pelajaran,
            'materi' => $this->materi,
            'tanggal' => $this->tanggal,
            'foto_bukti' => $path,
        ]);

        $this->reset();
    }
}
