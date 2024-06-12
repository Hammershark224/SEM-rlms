<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'tech1',
            'phone_num' => '0195757863',
            'email' => 'tech1@argon.com',
            'gender' => 'male',
            'role' => 'technical',
            'password' => bcrypt('tech1')
        ]);


    }
}
