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
        DB::table('user')->insert(
            ['id' => '1',
            'first_name' => 'test',
            'last_name' => 'test',
            'address'=>'test',
            'email_id' => 'test@administrator.com',
            'password' => bcrypt('123456'), 
            'gender' => 'female',
            'mobile_no'=>98565856585]);

    }
}
