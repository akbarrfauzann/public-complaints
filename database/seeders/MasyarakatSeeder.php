<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nik' => '320017864147',
            'nama' => 'Akbar',
            'username' => 'akbar',
            'password' => bcrypt('123456'),
            'telp' => '0896145232425'
        ];
        Masyarakat::insert($data);
    }
}
