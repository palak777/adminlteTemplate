<?php

use Illuminate\Database\Seeder;

class countryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('country')->insert([
            [
            	'id'=>1,
                'country_name'       => 'India',                 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            	'id'=>2,
                'country_name'       => 'Australia',                 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            	'id'=>3,
                'country_name'       => 'U.S.A',                 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            	'id'=>4,
                'country_name'       => 'Shree Lanka',                 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
