<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Mr. Admin',
            'password'=> bcrypt(12345678),
            'email' => 'admin@gmail.com'
        ]);
    }
}
