<?php

namespace App\Exports;

use App\Disneyplus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Attend;
use App\Models\member;

class AllRegisteredExportInWorkshop implements FromCollection , WithHeadings
{
    protected $date;

     function __construct() {
            
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visitors = member::select('name','email','mobile','side','qrcode')->where('type',1)->get();
        return $visitors;
    }
    
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile',
            'Side',
            'QrCode'
        ];
    }
    
}