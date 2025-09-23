<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin Fakultas']);
        Role::create(['name' => 'Dosen']);
        // Tambahkan role lain jika perlu di masa depan
        // Role::create(['name' => 'Mahasiswa']);
    }
}
