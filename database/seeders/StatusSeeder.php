<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_aktivasi')->insert([
            'id' => 0,
            'status' => 'Belum Aktif'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 1,
            'status' => 'Aktif'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 2,
            'status' => 'Ditolak'
        ]);
    }
}
