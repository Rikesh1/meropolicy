<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'first_name' => 'James',
            'last_name' => 'Bond',
            'username' => 'agent',
            'email' => 'agent@gmail.com',
            'phone' => rand(),
            'password' => bcrypt('password'),
        ]);
    }
}
