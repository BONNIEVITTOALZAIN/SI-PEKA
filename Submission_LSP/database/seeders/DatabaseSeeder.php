<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // password default: password
            'role' => 'admin',
        ]);

        // 2. Buat Akun Pasien
        $pasien = User::create([
            'name' => 'Budi Santoso',
            'email' => 'pasien@pasien.com',
            'password' => bcrypt('password'), // password default: password
            'role' => 'pasien',
        ]);

        // 3. Buat Profil Pasien
        \App\Models\PatientProfile::create([
            'user_id' => $pasien->id,
            'nik' => '3201012345678901',
            'alamat' => 'Jl. Kebon Jeruk No. 12, Jakarta',
            'no_hp' => '081234567890',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
        ]);

        // 4. Set Status Akun Pasien (Langsung Diterima)
        \App\Models\AccountRegistration::create([
            'user_id' => $pasien->id,
            'status' => 'diterima',
            'verified_by' => 1, // ID Admin yang pertama dibuat
            'verified_at' => now(),
        ]);

        $this->call(DoctorSeeder::class);
    }
}
