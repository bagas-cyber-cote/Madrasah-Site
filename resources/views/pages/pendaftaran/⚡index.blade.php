<?php

use Livewire\Component;
use App\Models\bio_data;


new class extends Component
{

    public function with()
    {
        return [

            // Folder berdasarkan tahun ajaran
            'folderTahun' => bio_data::select('tahun_ajaran')
                ->selectRaw('MAX(created_at) as terbaru')
                ->groupBy('tahun_ajaran')
                ->orderBy('terbaru','desc')
                ->get(),


            // Semua data siswa
            'semuaSiswa' => bio_data::latest()->get(),

        ];
    }

};

?>



<div class="space-y-8">


    <div>

        <h1 class="text-3xl font-black text-white">
            Folder Pendaftaran Siswa
        </h1>

        <p class="text-white/60 mt-2">
            Pilih tahun ajaran untuk melihat data pendaftar
        </p>

    </div>




    {{-- FOLDER TAHUN AJARAN --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        @foreach($folderTahun as $tahun)


        <flux:modal.trigger name="folder-{{ $tahun->tahun_ajaran }}">


            <div
            class="
            cursor-pointer
            rounded-3xl
            border border-white/10
            bg-white/5
            backdrop-blur-xl
            p-8
            text-center
            hover:bg-white/10
            transition
            ">


                <div class="text-6xl">
                    📁
                </div>


                <h2 class="mt-4 text-xl font-bold text-white">

                    {{ $tahun->tahun_ajaran }}

                </h2>


                <p class="text-white/50">

                    Folder Pendaftaran

                </p>


            </div>


        </flux:modal.trigger>


        @endforeach


    </div>






    {{-- ISI FOLDER --}}

    @foreach($folderTahun as $tahun)


    <flux:modal 
    name="folder-{{ $tahun->tahun_ajaran }}"
    class="md:w-3xl">


        <div class="space-y-5 text-blcak>


            <h2 class="text-2xl font-black">

                📁 {{ $tahun->tahun_ajaran }}

            </h2>



            @foreach(
                $semuaSiswa->where(
                    'tahun_ajaran',
                    $tahun->tahun_ajaran
                )
                as $siswa
            )


            <flux:modal.trigger 
            name="detail-siswa-{{ $siswa->id }}">



                <div
                class="
                flex
                items-center
                gap-4
                p-4
                rounded-xl
                bg-white/5
                border
                border-white/10
                cursor-pointer
                hover:bg-white/10
                ">


                    @if($siswa->foto)

                    <img
                    src="{{asset('storage/'.$siswa->foto)}}"
                    class="w-14 h-14 rounded-full object-cover">

                    @else

                    <div
                    class="
                    w-14
                    h-14
                    rounded-full
                    bg-white/10
                    flex
                    items-center
                    justify-center
                    ">
                        👤
                    </div>

                    @endif



                    <div>

                        <h3 class="font-bold">
                            {{$siswa->nama}}
                        </h3>


                        <p class="text-/50 text-sm">
                            {{$siswa->asal_sekolah}}
                        </p>


                    </div>


                </div>


            </flux:modal.trigger>


            @endforeach



        </div>


    </flux:modal>


    @endforeach








    {{-- DETAIL SISWA --}}

    @foreach($semuaSiswa as $siswa)


    <flux:modal
    name="detail-siswa-{{ $siswa->id }}"
    class="md:w-3xl">


        <div class="space-y-6 text-black">


            <h2 class="text-2xl font-black">
                Detail Pendaftaran Siswa
            </h2>



            @if($siswa->foto)

            <img
            src="{{asset('storage/'.$siswa->foto)}}"
            class="
            w-32
            h-32
            rounded-full
            object-cover
            mx-auto
            ">

            @endif




            <div class="grid md:grid-cols-2 gap-4">


            @php

            $data = [

                'Nama' => $siswa->nama,

                'Email' => $siswa->email,

                'NISN' => $siswa->nisn,

                'NIK' => $siswa->nik,

                'Tanggal Lahir' => $siswa->tanggal_lahir,

                'Jenis Kelamin' => $siswa->jenis_kelamin,

                'Nama Ayah' => $siswa->nama_ayah,

                'Nama Ibu' => $siswa->nama_ibu,

                'No HP' => $siswa->no_hp,

                'Tahun Ajaran' => $siswa->tahun_ajaran,

                'Status' => $siswa->status ?? 'Menunggu',

            ];

            @endphp



            @foreach($data as $label=>$value)


            <div>

                <p class="text-black/50 text-sm">
                    {{$label}}
                </p>


                <div class="bg-white/10 rounded-xl p-3">

                    {{$value ?? '-'}}

                </div>


            </div>


            @endforeach


            </div>






            <div>

                <p class="text-black/50">
                    Alamat
                </p>


                <div class="bg-white/10 rounded-xl p-3">

                    {{$siswa->alamat}}

                </div>


            </div>







            @if($siswa->foto_kk)

            <div>

                <p class="text-black/50 mb-2">
                    Foto Kartu Keluarga
                </p>


                <img
                src="{{asset('storage/'.$siswa->foto_kk)}}"
                class="
                rounded-xl
                w-full
                ">

            </div>

            @endif






            @if($siswa->sertifikat)

            <a
            href="{{asset('storage/'.$siswa->sertifikat)}}"
            target="_blank"
            class="
            text-blue-400
            underline
            ">

                Lihat Sertifikat

            </a>

            @endif



        </div>


    </flux:modal>


    @endforeach



</div>