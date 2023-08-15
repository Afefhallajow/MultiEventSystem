<?php

namespace App\Exports;

use App\Disneyplus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Attend;
use App\Models\member;

class FestivalExport implements FromCollection , WithHeadings
{
    protected $date;

     function __construct($date) {
            $this->date = $date;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attenders = Attend::select('member_id')->where('datee', $this->date)->get();
        $visitors = member::select('name','mobile')->whereIn('id', $attenders)->get();
        return $visitors;
    }
    
    public function headings(): array
    {
        return [
            'Name',
            'Mobile',
        ];
    }
    
}