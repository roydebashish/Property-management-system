<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index)
        {
            DB::table('members')->insert([
                'member_name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'dob' => '1992-07-10',
                'address' => $faker->address,
                'country_id' => $faker->numberBetween(1,7)
            ]);
        }
    }
}
