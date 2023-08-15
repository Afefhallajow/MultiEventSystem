<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class users_days extends Model
{
    use HasFactory, HasRoles;

    public $guarded=[];




    public function day(){
        return $this->belongsTo(day::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }




}
