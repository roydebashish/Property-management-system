<?php

use Illuminate\Database\Seeder;

class ExpenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->insert(['expense_type' => 'Electricity']);
        DB::table('expense_types')->insert(['expense_type' => 'Gas']);
        DB::table('expense_types')->insert(['expense_type' => 'Rental']);
        DB::table('expense_types')->insert(['expense_type' => 'Repair']);
        DB::table('expense_types')->insert(['expense_type' => 'Water']);
    }
}
