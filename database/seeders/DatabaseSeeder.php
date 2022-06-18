<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaratrustSeeder::class,
            RuangSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            ProdiSeeder::class,
            MahasiswaSeeder::class,
            TujuanSeeder::class,
            SumberDanaSeeder::class,
        ]);
    }
}
