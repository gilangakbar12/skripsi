<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nmm' => '110121001',
            'nama' => 'Gilang Akbar Panggulu',
            'divisi' => 'Umum & Teknologi Informasi',
            'jenis_kelamin' => 'Laki-Laki',
            'no_telpon' => '08211259353',
            'alamat' => 'Jakarta Selatan',
            'universitas' => 'UPN Veteran Jakarta',
        ]);
    }
}
