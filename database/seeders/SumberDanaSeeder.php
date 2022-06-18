<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SumberDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sumber_dana_peminjaman')->insert([
            'id' => 1,
            'sumber_dana' => 'Mandiri'
        ]);
        
        DB::table('sumber_dana_peminjaman')->insert([
            'id' => 2,
            'sumber_dana' => 'Hibah Proyek'
        ]);
     
        DB::table('sumber_dana_peminjaman')->insert([
            'id' => 3,
            'sumber_dana' => 'Lainya'
        ]);
    }
}
