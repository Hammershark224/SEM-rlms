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
            'username' => 'admin',
            'phone_num' => '0123456789',
            'email' => 'admin@argon.com',
            'gender' => 'male',
            'role' => 'admin',
            'password' => bcrypt('secret')
        ]);

        DB::table('system_administration_details')->insert([
            'user_ID' => 1,
            'staff_ID' => '01231',
            'position' => 'Administrator',
        ]);
    }
}
