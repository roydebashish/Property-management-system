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
        $monthly_total_sale = 0;
        $monthly_total_expense = 0;
        for($i = 1; $i <= $counter; $i++)
        {
            $i = ($i < 10) ? '0'.$i : $i;
            $date = Carbon::now()->year.'-'.Carbon::now()->month.'-'.$i;
            $expense = Expense::whereDate('expense_date', $date)->pluck('expense');
            $total_expense = Helper::calulate_total_expense($expense);
            $sales = Sale::whereDate('created_at', $date)->sum('sale_amount');
            $monthly_total_sale += $sales;
            $monthly_total_expense += $total_expense;
            $data[] = [
                'date' => $date,
                'sale' => $sales,
                'expense' => $total_expense
            ];
        }
        #prepare monthly total sales & Expense
        $data[] = [
            'date' => 'Total =',
            'sale' => $monthly_total_sale,
            'expense' => $monthly_total_expense
        ];
        #pepare gross profit
         $data[] = [
            'date' => 'Gross Profit =',
            'sale' => $monthly_total_sale - $monthly_total_expense,
            'expense' => ''
        ];

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
