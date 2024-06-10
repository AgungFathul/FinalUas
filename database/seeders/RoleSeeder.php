<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pengguna_biasa']);

        for ($i = 1; $i <= 11; $i++) {
            $user = User::find($i);
            if ($user) {
                $user->assignRole('pengguna_biasa');
            }
        }
    }
}