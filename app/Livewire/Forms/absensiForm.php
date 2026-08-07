<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Absensi;

class absensiForm extends Form
{
    public $kelas_id = '';

    public string $mata_pelajaran = '';

    public string $jam_pelajaran = '';

    public string $materi = '';

    public string $tanggal = '';

    public ?Absensi $absensi = null;


    public function rules(): array
    {
        return [

            'kelas_id' => [
                'required',
                'exists:kelas,id',
            ],

            'mata_pelajaran' => [
                'required',
                'string',
                'max:255',
            ],

            'jam_pelajaran' => [
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


    public function setAbsensi(Absensi $absensi): void
    {
        $this->absensi = $absensi;

        $this->kelas_id = $absensi->kelas_id;
        $this->mata_pelajaran = $absensi->mata_pelajaran;
        $this->jam_pelajaran = $absensi->jam_pelajaran;
        $this->materi = $absensi->materi;
        $this->tanggal = $absensi->tanggal;
    }


    public function store($userId)
    {
        $this->validate();

        return Absensi::create([

            'user_id' => $userId,

            'kelas_id' => $this->kelas_id,

            'mata_pelajaran' => $this->mata_pelajaran,

            'jam_pelajaran' => $this->jam_pelajaran,

            'materi' => $this->materi,

            'tanggal' => $this->tanggal,

        ]);
    }


    public function update(): void
    {
        $this->validate();

        $this->absensi->update([

            'kelas_id' => $this->kelas_id,

            'mata_pelajaran' => $this->mata_pelajaran,

            'jam_pelajaran' => $this->jam_pelajaran,

            'materi' => $this->materi,

            'tanggal' => $this->tanggal,

        ]);
    }

}
