<?php

namespace App\Exports;
use App\Sale;
use App\Unit;
use App\Property;
use App\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
// use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
// use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class SaleExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sales = Sale::all();
        $sales->load('unit.property.country');
        return $sales;
    }
    
    /** Headings*/
    public function headings(): array
    {
        return [
            'Unit',
            'Property',
            'Country',
            'Sale Amount',
            'Payment Method',
            'Date',
        ];
    }

    /**
    * @var Sale $sale
    */
    public function map($sale): array
    {
        return [
            $sale->unit->unit_no,
            $sale->unit->property->property_name,
            $sale->unit->property->country->country_name,
            $sale->sale_amount,
            $sale->payment_method,
            $sale->created_at->format('d-m-Y'),
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
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}
