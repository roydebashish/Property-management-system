<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
         $this->call(ExpenseTypesTableSeeder::class);
         $this->call(PropertiesTableSeeder::class);
         $this->call(MembersTableSeeder::class);
         $this->call(MiscellaneousTableSeeder::class);
    }
}
