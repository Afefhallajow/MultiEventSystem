<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = ['category_id','name','random_key','allowed_count','registered_count','label'];
    
    public function category(){
          return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function members(){
        return $this->hasMany(member::class,'company_id','id');
    }
}
