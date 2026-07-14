<?php

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flux\Flux;

new class extends Component
{
    public ?int $selectedUserId = null;
    public string $newPassword = '';

    public string $search = '';
    public string $filterRole = 'Admin';

    public function filter($role)
    {
        $this->filterRole = $role;
    }

    public function openResetPassword($id)
    {
        $this->selectedUserId = $id;
        $this->newPassword = '';

        Flux::modal('reset-password')->show();
    }

    public function savePassword()
    {
        $this->validate([
            'newPassword' => ['required', 'min:8'],
        ]);

        $user = User::findOrFail($this->selectedUserId);

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        Flux::modal('reset-password')->close();

        session()->flash('success', 'Password berhasil diubah.');

        $this->reset('selectedUserId', 'newPassword');
    }

    public function with()
    {
        abort_unless(Auth::check() && Auth::user()->role === 'Admin', 403);

        $query = User::where('role', $this->filterRole);

        if ($this->search != '') {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        return [
            'users' => $query->latest()->paginate(10),
        ];
    }
};

?>

<div class="space-y-6">

    @if(session()->has('success'))
        <flux:callout variant="success">
            {{ session('success') }}
        </flux:callout>
    @endif

    <div>
        <flux:heading class="text-center" size="xl">
            Data User
        </flux:heading>

        <flux:text class="mt-2">
            Daftar seluruh akun yang terdaftar.
        </flux:text>
    </div>

    <div class="flex items-center justify-between mb-4">

        <div class="flex gap-2">

            <flux:button
                wire:click="filter('Admin')"
                :variant="$filterRole == 'Admin' ? 'primary' : 'ghost'">
                Admin
            </flux:button>

            <flux:button
                wire:click="filter('Guru')"
                :variant="$filterRole == 'Guru' ? 'primary' : 'ghost'">
                Guru
            </flux:button>

            <flux:button
                wire:click="filter('Siswa')"
                :variant="$filterRole == 'Siswa' ? 'primary' : 'ghost'">
                Siswa
            </flux:button>

        </div>

        <div class="w-72">

            <flux:input
                wire:model.live="search"
                icon="magnifying-glass"
                placeholder="Cari nama atau email..."
            />

        </div>

    </div>

    <flux:table :paginate="$users">

        <flux:table.columns>
            <flux:table.column>No</flux:table.column>
            <flux:table.column>Nama</flux:table.column>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column>Password</flux:table.column>
            <flux:table.column>Role</flux:table.column>
            <flux:table.column>Tanggal Dibuat</flux:table.column>
            <flux:table.column>Aksi</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>

            @forelse($users as $user)

                <flux:table.row :key="$user->id">

                    <flux:table.cell>
                        {{ $loop->iteration }}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $user->name }}
                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $user->email }}
                    </flux:table.cell>

                    <flux:table.cell class="font-mono text-xs">
                        {{ Str::limit($user->password,20) }}
                    </flux:table.cell>

                    <flux:table.cell>

                        @if($user->role == 'Admin')
                            <flux:badge color="green">
                                Admin
                            </flux:badge>

                        @elseif($user->role == 'Guru')
                            <flux:badge color="yellow">
                                Guru
                            </flux:badge>

                        @else
                            <flux:badge color="blue">
                                Siswa
                            </flux:badge>
                        @endif

                    </flux:table.cell>

                    <flux:table.cell>
                        {{ $user->created_at->format('d-m-Y') }}
                    </flux:table.cell>

                    <flux:table.cell>

                        <flux:dropdown>

                            <flux:button
                                icon="ellipsis-horizontal"
                                variant="ghost"
                                size="sm"
                            />

                            <flux:menu>

                                <flux:menu.item
                                    icon="key"
                                    wire:click="openResetPassword({{ $user->id }})"
                                >
                                    Reset Password
                                </flux:menu.item>

                            </flux:menu>

                        </flux:dropdown>

                    </flux:table.cell>

                </flux:table.row>

            @empty

                <flux:table.row>

                    <flux:table.cell colspan="7">
                        Tidak ada data user.
                    </flux:table.cell>

                </flux:table.row>

            @endforelse

        </flux:table.rows>

    </flux:table>

    <flux:modal name="reset-password" class="md:w-96">

        <div class="space-y-6">

            <div>

                <flux:heading size="lg">
                    Reset Password
                </flux:heading>

                <flux:text class="mt-2">
                    Masukkan password baru.
                </flux:text>

            </div>

            <flux:input
                wire:model="newPassword"
                type="password"
                label="Password Baru"
                placeholder="Masukkan password baru"
            />

            <div class="flex justify-end gap-2">

                <flux:modal.close>
                    <flux:button variant="ghost">
                        Batal
                    </flux:button>
                </flux:modal.close>

                <flux:button
                    variant="primary"
                    wire:click="savePassword"
                >
                    Simpan
                </flux:button>

            </div>

        </div>

    </flux:modal>

</div>