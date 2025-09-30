<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Cari role "Admin Fakultas"
        $adminRole = Role::where('name', 'Admin Fakultas')->first();

        // 2. Buat user admin baru
        User::create([
            'name' => 'Admin Fikom',
            'email' => 'admin@fikom.app',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role_id' => $adminRole->id,
        ]);
        User::create([
            'name' => 'dosen1',
            'email' => 'dosen@fikom.app',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role_id' => '2',
        ]);
    }
}
