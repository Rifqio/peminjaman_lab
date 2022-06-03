<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Student',
            'email' => 'student@student.uns.ac.id',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456')
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 1,
            'user_type' => 'App\Models\User'
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mipa.uns.ac.id',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456')
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 2,
            'user_type' => 'App\Models\User'
        ]);
    }
}
