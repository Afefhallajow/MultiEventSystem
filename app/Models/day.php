<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class day extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','name_en', 'date', 'time', 'description','description_en', 'place_id','bg_image','emailImage','whats_social','gmail_social','telegram_social','mail_social',
        'thanksMSG','thanksMSG_en','image','whatsInstance','whatsToken','info_link','map_url', 'color', 'image_loader', 'image_footer_print'
    ,'location'];
    public function place(){
        return $this->belongsTo(Place::class);
    }
    public function inviteds(){
        return $this->hasMany(Invited::class)->orderBy('created_at', 'desc');
    }
    public function cerconf(){
        return $this->hasOne(CerConf::class);
    }


}
