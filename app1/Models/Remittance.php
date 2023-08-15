<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;
    protected $fillable = [
        'memeber_id',
        'money', 
        'sender',
        'datee',
        'bank',
        'is_accept',
        'remittanceFile',
    ];
}
