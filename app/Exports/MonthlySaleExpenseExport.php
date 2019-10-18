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
use App\Sale;
use App\Helper;
use Carbon\Carbon;

class MonthlySaleExpenseExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $counter = Carbon::now()->daysInMonth;
        $data = [];
        for($i = 1; $i <= $counter; $i++)
        {
            $i = ($i < 10) ? '0'.$i : $i;
            $date = Carbon::now()->year.'-'.Carbon::now()->month.'-'.$i;
            $expense = Expense::whereDate('expense_date', $date)->get();
            //$total_expense = Helper::calulate_total_expense($expense);
            dd($expense);
            $sales = Sale::whereDate('created_at', $date)->sum('sale_amount');
            $data[] = [
                'date' => $date,
                'sale' => $sales,
                'expense' => $total_expense
            ];
        }
        
        return collect($data);
        
    }

    /** Headings*/
    public function headings(): array
    {
        return [
            'Date',
            'Sales',
            'Expenses'
        ];
    }

    /**
    * @var Expense $sale
    */
    public function map($data): array
    {
        return [
            $data['date'],
            $data['sale'],
            $data['expense'],
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
                $cellRange = 'A1:C1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
