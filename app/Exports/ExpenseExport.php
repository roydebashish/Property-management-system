<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Expense;
use App\Unit;
use App\Property;
use App\Country;
use App\Helper;

class ExpenseExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $expenses = Expense::all();
        $expenses->load('unit.property.country');
        return $expenses;
    }

    /** Headings*/
    public function headings(): array
    {
        return [
            'Unit',
            'Property',
            'Country',
            'Total Amount',
            'Date',
        ];
    }

    /**
    * @var Expense $sale
    */
    public function map($expense): array
    {
        return [
            $expense->unit->unit_no,
            $expense->unit->property->property_name,
            $expense->unit->property->country->country_name,
            Helper::total_expense_day($expense->expense),
            date('d-m-Y', strtotime($expense->expense_date)),
            // Date::dateTimeToExcel($sale->created_at),
        ];
    }

     /**
    * Style sheet
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
