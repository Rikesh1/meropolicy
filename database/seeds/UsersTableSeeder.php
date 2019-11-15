<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Will',
            'last_name' => 'Smith',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'phone' => rand(),
            'password' => bcrypt('password'),
        ]);
    }
}
