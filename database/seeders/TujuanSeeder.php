<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tujuan_akses_lab')->insert([
            'id' => 1,
            'tujuan' => 'Penelitian Tugas Akhir'
        ]);
        
        DB::table('tujuan_akses_lab')->insert([
            'id' => 2,
            'tujuan' => 'PKM'
        ]);
       
        DB::table('tujuan_akses_lab')->insert([
            'id' => 3,
            'tujuan' => 'MBKM'
        ]);
        
        DB::table('tujuan_akses_lab')->insert([
            'id' => 4,
            'tujuan' => 'Lainya'
        ]);
        
        // Tujuan Bebas Lab
        DB::table('tujuan_bebas_lab')->insert([
            'id' => 1,
            'tujuan' => 'Yudisium'
        ]);
        
        DB::table('tujuan_bebas_lab')->insert([
            'id' => 2,
            'tujuan' => 'Lainya'
        ]);
    }
}
