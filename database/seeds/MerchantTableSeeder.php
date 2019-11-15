<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->insert([
            'company_name' => 'Nextnepal',
            'company_slug' => 'nextnepal',
            'company_phone' => rand(),
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'merchant',
            'email' => 'merchant@gmail.com',
            'phone' => rand(),
            'password' => bcrypt('password'),
        ]);
    }
}
