<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'pengguna_biasa']);

        $admin = User::create([
            'name'      => 'AgungFathulMuhtadin',
            'email'     => 'agungfathul14@gmail.com',
            'password'  => Hash::make('qt7htrq5y7o'),
        ]);
        $admin->assignRole($adminRole);

        $user = User::create([
            'name'      => 'RakaIndraRahmawan',
            'email'     => 'rirahmawan@gmail.com',
            'password'  => Hash::make('testpassword'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'name'      => 'user1',
            'email'     => 'user1@gmail.com',
            'password'  => Hash::make('user123'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'name'      => 'user2',
            'email'     => 'user2@gmail.com',
            'password'  => Hash::make('user123'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'name'      => 'user3',
            'email'     => 'user3@gmail.com',
            'password'  => Hash::make('user123'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'name'      => 'user4',
            'email'     => 'user4@gmail.com',
            'password'  => Hash::make('user123'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'name'      => 'user5',
            'email'     => 'user5@gmail.com',
            'password'  => Hash::make('user123'),
        ]);
        $user->assignRole($userRole);

        
    }
}
