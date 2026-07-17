<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;
use App\Models\pendaftaran;

class pendaftaranForm extends Form
{
    use WithFileUploads;

    public $foto_kk;
    public $sertifikat;

    public string $nama = '';
    public string $email = '';
    public string $nisn = '';
    public string $nik = '';
    public string $tanggal_lahir = '';
    public string $jenis_kelamin = '';
    public string $alamat = '';
    public string $asal_sekolah = '';
    public string $nama_ayah = '';
    public string $nama_ibu = '';
    public string $no_hp = '';

    public ?pendaftaran $pendaftaran = null;

    public function rules(): array
    {
        return [
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'unique:pendaftarans,email',
            ],

            'nisn' => [
                'nullable',
                'string',
                'max:20',
            ],

            'nik' => [
                'nullable',
                'string',
                'max:20',
            ],

            'tanggal_lahir' => [
                'required',
                'date',
            ],

            'jenis_kelamin' => [
                'required',
                'string',
            ],

            'alamat' => [
                'required',
                'string',
            ],

            'asal_sekolah' => [
                'required',
                'string',
                'max:255',
            ],

            'nama_ayah' => [
                'required',
                'string',
                'max:255',
            ],

            'nama_ibu' => [
                'required',
                'string',
                'max:255',
            ],

            'no_hp' => [
                'required',
                'string',
                'max:20',
            ],

            'foto_kk' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'sertifikat' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ];
    }

    public function store(): void
    {
        $this->validate();

        $fotoKK = null;
        $sertifikat = null;

        if ($this->foto_kk) {
            $fotoKK = $this->foto_kk->store('foto-kk', 'public');
        }

        if ($this->sertifikat) {
            $sertifikat = $this->sertifikat->store('sertifikat', 'public');
        }

        pendaftaran::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'nisn' => $this->nisn,
            'nik' => $this->nik,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'asal_sekolah' => $this->asal_sekolah,
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'no_hp' => $this->no_hp,
            'foto_kk' => $fotoKK,
            'sertifikat' => $sertifikat,
            'status' => 'Menunggu',
        ]);

        $this->reset();
    }
}
