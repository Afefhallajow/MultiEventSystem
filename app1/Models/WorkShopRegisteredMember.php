<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkShop;

class WorkShopRegisteredMember extends Model
{
    use HasFactory;

    protected $table = 'workshops_registered_member';
    protected $fillable = ['member_id','work_shop_id'];

    
    public function getName($id){
        return WorkShop::where('id',$id)->first();
    }
}
