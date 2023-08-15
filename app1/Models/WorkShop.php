<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShop extends Model
{
    use HasFactory;

    protected $table = 'work_shops';
    protected $fillable = ['name','day','speaker','start_time','end_time','place','room'];
}
