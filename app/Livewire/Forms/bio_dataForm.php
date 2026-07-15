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

    public string $nama = '';
    public string $tanggal_lahir = '';
    public string $jenis_kelamin = '';
    public string $alamat = '';
    public string $asal_sekolah = '';

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
                'min:3',
                'max:255',
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
                'max:255',
            ],

            'asal_sekolah' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    public function setBioData(bio_data $bio_data): void
    {
        $this->bio_data = $bio_data;
        $this->foto = null;

        $this->nama = $bio_data->nama;
        $this->tanggal_lahir = $bio_data->tanggal_lahir;
        $this->jenis_kelamin = $bio_data->jenis_kelamin;
        $this->alamat = $bio_data->alamat;
        $this->asal_sekolah = $bio_data->asal_sekolah;
    }

    public function store(): void
    {
        $this->validate();

        // Cek apakah user sudah memiliki biodata
        if (bio_data::where('user_id', Auth::id())->exists()) {
            session()->flash('error', 'Anda sudah memiliki biodata.');
            return;
        }

        $path = null;

        if ($this->foto) {
            $path = $this->foto->store('foto-profil', 'public');
        }

        bio_data::create([
            'user_id' => Auth::id(),
            'foto' => $path,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'asal_sekolah' => $this->asal_sekolah,
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
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'asal_sekolah' => $this->asal_sekolah,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('foto-profil', 'public');
        }

        $this->bio_data->update($data);

        $this->reset();
    }
}