<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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