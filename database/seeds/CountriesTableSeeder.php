<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(['country_name' => 'Bangladesh']);
        DB::table('countries')->insert(['country_name' => 'India']);
        DB::table('countries')->insert(['country_name' => 'Pakistan']);
        DB::table('countries')->insert(['country_name' => 'Malayasia']);
        DB::table('countries')->insert(['country_name' => 'Bhutan']);
        DB::table('countries')->insert(['country_name' => 'Nepal']);
        DB::table('countries')->insert(['country_name' => 'Singapore']);
    }
}
