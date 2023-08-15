<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_no',
        'name',
        'age',
        'type',
        'mobile',
        'email',
        'question',
        'image',
        'code',
        'qrcode',
        'position'
    ];
    
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
