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
            'name' => 'Debashish Roy',
            'password'=> bcrypt(12345678),
            'email' => 'roy.debashish@outlook.com'
        ]);
    }
}
