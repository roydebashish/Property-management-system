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
            'name' => 'Mr. System Admin',
            'password'=> bcrypt('<d7ms*x5cT/@WRPx#S/!'),
            'email' => 'system@gmail.com',
            'user_role' => 'system',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Mr. Admin',
            'password'=> bcrypt(12345678),
            'email' => 'admin@gmail.com',
            'user_role' => 'admin',
        ]);
       
        DB::table('users')->insert([
            'name' => 'Mr. Account User',
            'password'=> bcrypt(12345678),
            'email' => 'account@gmail.com',
            'user_role' => 'account',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Mr. User',
            'password'=> bcrypt(12345678),
            'email' => 'user@gmail.com',
            'user_role' => 'user',
        ]);
    }
}
