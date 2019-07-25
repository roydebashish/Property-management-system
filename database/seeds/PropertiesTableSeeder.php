<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'property_name' => 'Mirage Obelisk',
            'country_id' => rand(1,7)
        ]);
        DB::table('properties')->insert([
            'property_name' => 'Valor Pillar',
            'country_id' => rand(1,7)
        ]);
        DB::table('properties')->insert([
            'property_name' => 'Secret Land Lookout',
            'country_id' => rand(1,7)
        ]);
        DB::table('properties')->insert([
            'property_name' => 'Spirit Mountain Mast',
            'country_id' => rand(1,7)
        ]);
    }
}
