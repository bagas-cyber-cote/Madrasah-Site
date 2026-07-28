<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Siswa;

class siswaForm extends Form
{
    public string $nama_siswa = '';
    public string $kelas_id = '';

    public ?Siswa $siswa = null;

    public function rules(): array
    {
        return [
            'nama_siswa' => [
                'required',
                'string',
                'max:255',
            ],

            'kelas_id' => [
                'required',
                'exists:kelas,id',
            ],
        ];
    }

    public function store(): void
    {
        $this->validate();

        Siswa::create([
            'nama_siswa' => $this->nama_siswa,
            'kelas_id' => $this->kelas_id,
        ]);

        $this->reset();
    }
}
