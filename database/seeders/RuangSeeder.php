<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruang_lab')->insert([
            'nama_ruang' => 'Lab Data Science'
        ]);

        DB::table('ruang_lab')->insert([
            'nama_ruang' => 'Lab Multimedia'
        ]);

        DB::table('ruang_lab')->insert([
            'nama_ruang' => 'Lab Komputasi Dasar'
        ]);

        DB::table('ruang_lab')->insert([
            'nama_ruang' => 'Lab Mikrokontroller'
        ]);
    }
}
