<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'firstname' => 'Sagar ',
            'lastname' => 'Poudel',
            'phonenumber' => '9868299552',
            'address' => 'tinkune',

        ]);
    }
}
