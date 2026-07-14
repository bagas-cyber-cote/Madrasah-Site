<?php

use Livewire\Component;
use App\Models\User;

new class extends Component
{
    public function with()
    {
        return [
            'totalUser' => User::count(),
            'totalGuru' => User::where('role', 'Guru')->count(),
            'totalSiswa' => User::where('role', 'Siswa')->count(),
        ];
    }
};

?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <flux:card>
        <flux:heading>Total User</flux:heading>

        <div class="mt-4 text-4xl font-bold">
            {{ $totalUser }}
        </div>
    </flux:card>

    <flux:card>
        <flux:heading class="text-rotate text-7xl">Total Guru</flux:heading>

        <div class="mt-4 text-4xl font-bold">
            {{ $totalGuru }}
        </div>
    </flux:card>

    <flux:card>
        <flux:heading>Total Siswa</flux:heading>

        <div class="mt-4 text-4xl font-bold">
            {{ $totalSiswa }}
        </div>
    </flux:card>


    <div class="hover-3d">
  <!-- content -->
  <figure class="w-60 rounded-2xl">
    <img src="https://img.daisyui.com/images/stock/card-1.webp?x" alt="Tailwind CSS 3D card" />
  </figure>
  <!-- 8 empty divs needed for the 3D effect -->
  <div>ADMIN</div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>

<div class="hover-3d">
  <!-- content -->
  <figure class="w-60 rounded-2xl">
    <img src="https://img.daisyui.com/images/stock/card-2.webp?x" alt="Tailwind CSS 3D hover" />
  </figure>
  <!-- 8 empty divs needed for the 3D effect -->
  <div>ADMIN</div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>

<div class="hover-3d">
  <!-- content -->
  <figure class="w-60 rounded-2xl">
    <img src="https://img.daisyui.com/images/stock/card-3.webp?x" alt="Tailwind CSS 3D hover" />
  </figure>
  <!-- 8 empty divs needed for the 3D effect -->
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
</div>
<span class="text-rotate text-7xl">
  <span class="justify-items-center">
    <span>DESIGN</span>
    <span>DEVELOP</span>
    <span>DEPLOY</span>
    <span>SCALE</span>
    <span>MAINTAIN</span>
    <span>REPEAT</span>
  </span>
</span>

<div class="aura">
  <button class="btn">button with aura</button>
</div>
</div>