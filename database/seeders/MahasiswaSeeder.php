<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_mahasiswa')->insert([
            'id' => 1,
            'user_id' => 1,
            'prodi_id' => 1,
            'nim' => 'M0418054',
            'phone' => 6287772151880,
            'angkatan' => '2018',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
