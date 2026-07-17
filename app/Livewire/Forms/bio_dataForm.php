<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\bio_data;

class bio_dataForm extends Form
{
    use WithFileUploads;

    public $foto;
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
    public string $tahun_ajaran = '';

    public ?bio_data $bio_data = null;

    public function rules(): array
    {
        return [

            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
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
                Rule::in(['Laki-laki', 'Perempuan']),
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

            'tahun_ajaran' => [
                'required',
                Rule::in([
                    '2026/2027',
                    '2027/2028',
                    '2028/2029',
                ]),
            ],

            'foto_kk' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'sertifikat' => [
                'nullable',
                'mimes:jpg,jpeg,png,pdf',
                'max:4096',
            ],

        ];
    }

    public function setBioData(bio_data $bio_data): void
    {
        $this->bio_data = $bio_data;

        $this->foto = null;
        $this->foto_kk = null;
        $this->sertifikat = null;

        $this->nama = $bio_data->nama;
        $this->email = $bio_data->email;
        $this->nisn = $bio_data->nisn;
        $this->nik = $bio_data->nik;
        $this->tanggal_lahir = $bio_data->tanggal_lahir;
        $this->jenis_kelamin = $bio_data->jenis_kelamin;
        $this->alamat = $bio_data->alamat;
        $this->asal_sekolah = $bio_data->asal_sekolah;
        $this->nama_ayah = $bio_data->nama_ayah;
        $this->nama_ibu = $bio_data->nama_ibu;
        $this->no_hp = $bio_data->no_hp;
        $this->tahun_ajaran = $bio_data->tahun_ajaran;
    }

    public function store(): void
    {
        $this->validate();

        if (bio_data::where('user_id', Auth::id())->exists()) {
            session()->flash('error', 'Anda sudah memiliki biodata.');
            return;
        }

        $fotoProfil = null;
        $fotoKK = null;
        $sertifikat = null;

        if ($this->foto) {
            $fotoProfil = $this->foto->store(
                'pendaftaran/'.$this->tahun_ajaran.'/foto-profil',
                'public'
            );
        }

        if ($this->foto_kk) {
            $fotoKK = $this->foto_kk->store(
                'pendaftaran/'.$this->tahun_ajaran.'/foto-kk',
                'public'
            );
        }

        if ($this->sertifikat) {
            $sertifikat = $this->sertifikat->store(
                'pendaftaran/'.$this->tahun_ajaran.'/sertifikat',
                'public'
            );
        }

        bio_data::create([

            'user_id' => Auth::id(),

            'foto' => $fotoProfil,

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
            'tahun_ajaran' => $this->tahun_ajaran,

            'foto_kk' => $fotoKK,
            'sertifikat' => $sertifikat,

            'status' => 'Menunggu',

        ]);

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        if (!$this->bio_data) {
            return;
        }

        $data = [

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
            'tahun_ajaran' => $this->tahun_ajaran,

        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store(
                'pendaftaran/'.$this->tahun_ajaran.'/foto-profil',
                'public'
            );
        }

        if ($this->foto_kk) {
            $data['foto_kk'] = $this->foto_kk->store(
                'pendaftaran/'.$this->tahun_ajaran.'/foto-kk',
                'public'
            );
        }

        if ($this->sertifikat) {
            $data['sertifikat'] = $this->sertifikat->store(
                'pendaftaran/'.$this->tahun_ajaran.'/sertifikat',
                'public'
            );
        }

        $this->bio_data->update($data);

        $this->reset();
    }
}