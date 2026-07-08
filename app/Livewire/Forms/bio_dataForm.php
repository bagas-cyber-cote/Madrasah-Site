<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Validation\Rule;
use App\Models\bio_data;

class bio_dataForm extends Form
{
    public string $nama = '';
    public string $tanggal_lahir = '';
    public string $jenis_kelamin = '';
    public string $alamat = '';
    public string $asal_sekolah = '';

    public ?bio_data $bio_data = null;

    public function rules(): array
    {
        return [
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

        $this->nama = $bio_data->nama;
        $this->tanggal_lahir = $bio_data->tanggal_lahir;
        $this->jenis_kelamin = $bio_data->jenis_kelamin;
        $this->alamat = $bio_data->alamat;
        $this->asal_sekolah = $bio_data->asal_sekolah;
    }

    public function store(): void
    {
        $this->validate();

        bio_data::create(
            $this->only([
                'nama',
                'tanggal_lahir',
                'jenis_kelamin',
                'alamat',
                'asal_sekolah',
            ])
        );

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->bio_data->update(
            $this->only([
                'nama',
                'tanggal_lahir',
                'jenis_kelamin',
                'alamat',
                'asal_sekolah',
            ])
        );

        $this->reset();
    }
}
