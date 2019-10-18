<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SaleExport;
use App\Exports\ExpenseExport;
use App\Exports\MonthlySaleExpenseExport;
use App\Helper;

class ExportController extends Controller
{
     /*export sales*/
    public function export_sales(){
        return Excel::download(new SaleExport, Helper::generate_name('sales'));
    }

    /*export expenses*/
    public function export_expenses(){
        return Excel::download(new ExpenseExport, Helper::generate_name('expenses'));
    }

    /*export monthly sales & expenses*/
    public function export_monthly_sales_expenses(){ 
        return Excel::download(new MonthlySaleExpenseExport, Helper::generate_name('monthly_sales_expenses'));
    }
   
}
