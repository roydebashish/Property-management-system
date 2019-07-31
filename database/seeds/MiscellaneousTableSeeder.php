<?php

use Illuminate\Database\Seeder;

class MiscellaneousTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('miscellaneouses')->insert([
            'option_name' => 'voucher_serial',
            'option_value' => 10000
        ]);
    }
}
