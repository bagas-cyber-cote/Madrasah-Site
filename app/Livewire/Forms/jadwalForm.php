<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\jadwal;

class jadwalForm extends Form
{
    public string $kelas = '';

    public string $guru = '';

    public string $mata_pelajaran = '';

    public string $hari = '';

    public string $jam_mulai = '';

    public string $jam_selesai = '';

    public function rules(): array
    {
        return [

            'kelas' => [
                'required',
                'string',
                'max:255',
            ],

            'guru' => [
                'required',
                'string',
                'max:255',
            ],

            'mata_pelajaran' => [
                'required',
                'string',
                'max:255',
            ],

            'hari' => [
                'required',
                'string',
            ],

            'jam_mulai' => [
                'required',
            ],

            'jam_selesai' => [
                'required',
            ],

        ];
    }

    public function store()
    {
        $this->validate();

        return jadwal::create([

            'kelas' => $this->kelas,

            'guru' => $this->guru,

            'mata_pelajaran' => $this->mata_pelajaran,

            'hari' => $this->hari,

            'jam_mulai' => $this->jam_mulai,

            'jam_selesai' => $this->jam_selesai,

        ]);
    }
}