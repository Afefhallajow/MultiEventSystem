<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;
    protected $table = 'prizzes';
    protected $fillable = ['name','amount'];
    
    public function numberOfWinners($id){
        
        return \App\Models\member::where('prize_id',$id)->count();
        
    }
    
    public function winners(){
        
        return $this->hasMany(Winner::class,'prize_id','id');
        
    }
}
