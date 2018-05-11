<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([
            'first_name' => 'test',
            'last_name'=>'test'
            'gender'=>'female',
            'email_id' => 'test@gmail.com',
            'password' => bcrypt('123456'),
            'mobile_no'=>9856545856
        ]);
    }
}
