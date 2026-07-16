<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
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

        // 1. Dokter Penyakit Dalam
        $doctor1 = Doctor::create([
            'name' => 'dr. Andi Pratama, Sp.PD',
            'specialization' => 'Penyakit Dalam',
        ]);
        
        // Memasukkan jadwal untuk Dokter 1
        $doctor1->schedules()->createMany([
            ['day' => 'Senin', 'start_time' => '08:00:00', 'end_time' => '12:00:00']
        ]);

        // 2. Dokter Gigi
        $doctor2 = Doctor::create([
            'name' => 'drg. Siti Nurhaliza',
            'specialization' => 'Dokter Gigi',
        ]);
        
        $doctor2->schedules()->createMany([
            ['day' => 'Selasa', 'start_time' => '09:00:00', 'end_time' => '14:00:00']
        ]);

        // 3. Dokter Umum
        $doctor3 = Doctor::create([
            'name' => 'dr. Budi Setiawan',
            'specialization' => 'Umum',
        ]);
        
        $doctor3->schedules()->createMany([
            ['day' => 'Selasa', 'start_time' => '13:00:00', 'end_time' => '17:00:00']
        ]);

        // 4. Dokter Anak
        $doctor4 = Doctor::create([
            'name' => 'dr. Maya Anggraini, Sp.A',
            'specialization' => 'Anak',
        ]);

        $doctor4->schedules()->createMany([
            ['day' => 'Selasa', 'start_time' => '13:00:00', 'end_time' => '17:00:00']
        ]);
    }
}
