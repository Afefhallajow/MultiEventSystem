<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $table = 'winners';
    protected $fillable = ['prize_id','member_id','winner_order'];
    
    public function prize(){
        
        return $this->belongsTo(Prize::class,'prize_id','id');
        
    }
    
    public function member(){
        
        return $this->belongsTo(member::class,'member_id','id');
        
    }
}
