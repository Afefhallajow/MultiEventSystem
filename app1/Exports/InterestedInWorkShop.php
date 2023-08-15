<?php

namespace App\Exports;

use App\Disneyplus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\WorkShopRegisteredMember;
use App\Models\member;

class InterestedInWorkShop implements FromCollection , WithHeadings
{
    protected $date;

     function __construct($id) {
            $this->id = $id;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attenders = WorkShopRegisteredMember::select('member_id')->where('work_shop_id', $this->id)->get();
        $visitors = member::select('name','email','side')->whereIn('id', $attenders)->get();
        return $visitors;
    }
    
    public function headings(): array
    {
        return [
            'Visitor Name',
            'Visitor Email',
            'Visitor Side',
        ];
    }
    
}