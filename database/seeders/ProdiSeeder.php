<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodi')->insert([
            'id' => 1,
            'nama_prodi' => 'S1 Biologi'
        ]);

        DB::table('prodi')->insert([
            'id' => 2,
            'nama_prodi' => 'S1 Farmasi'
        ]);

        DB::table('prodi')->insert([
            'id' => 3,
            'nama_prodi' => 'S1 Fisika'
        ]);

        DB::table('prodi')->insert([
            'id' => 4,
            'nama_prodi' => 'S1 Kimia'
        ]);

        DB::table('prodi')->insert([
            'id' => 5,
            'nama_prodi' => 'S1 Matematika'
        ]);

        DB::table('prodi')->insert([
            'id' => 6,
            'nama_prodi' => 'S1 Ilmu Lingkungan'
        ]);

        DB::table('prodi')->insert([
            'id' => 7,
            'nama_prodi' => 'S1 Informatika'
        ]);

        DB::table('prodi')->insert([
            'id' => 8,
            'nama_prodi' => 'S1 Statistika'
        ]);
    }
}
