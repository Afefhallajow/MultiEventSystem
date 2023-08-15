<?php

namespace App\Exports;

use App\Disneyplus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Attend;
use App\Models\member;
use Maatwebsite\Excel\Concerns\WithMapping;

class AllRegisteredExport implements FromCollection , WithHeadings,WithMapping
{
    protected $date;

     function __construct() {
            
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visitors = member::with(['company.category'])->get();
        return $visitors;
    }
    
     /**
    * @var Invoice $invoice
    */
    public function map($member): array
    {
        return [
            $member->name,
              $member->mobile,
                $member->sector,
                  $member->qrcode
          
        ];
    }
    
    public function headings(): array
    {
        return [
            'الاسم',
            'الجوال',
            'القطاع',
            'الكود',
        ];
    }
    
}