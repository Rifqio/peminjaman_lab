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
            'id' => 1,
            'status' => 'Belum Aktif'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 2,
            'status' => 'Terverifikasi Dosen'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 3,
            'status' => 'Terverifikasi Petugas'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 4,
            'status' => 'Terverifikasi Kepala Lab'
        ]);

        DB::table('status_aktivasi')->insert([
            'id' => 5,
            'status' => 'Ditolak'
        ]);

        DB::table('status_pembayaran')->insert([
            'id' => 1,
            'status' => 'Belum Lunas'
        ]);

        DB::table('status_pembayaran')->insert([
            'id' => 2,
            'status' => 'Lunas'
        ]);


    }
}
