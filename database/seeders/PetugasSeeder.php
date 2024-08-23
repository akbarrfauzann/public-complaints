<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [
            [
                'nama_petugas' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'telp' => '08889013488',
                'level' => 'admin'
            ],
            [
                'nama_petugas' => 'petugas',
                'username' => 'petugas',
                'password' => bcrypt('petugas123'),
                'telp' => '08889013488',
                'level' => 'petugas'
            ]

            ];
            Petugas::insert($data);
    }
}
