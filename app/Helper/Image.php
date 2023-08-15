<?php

/*
|------------------------------------------------------
|--------------------- Image Class --------------------
|
| This class to handle all processes related with images.
|
| uploadImage:  upload new image and delete the old one if exist
|
|------------------------------------------------------
*/
namespace App\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image
{
    public static function uploadImage($photo) {
        $imageName   = Str::random(20).'.'. $photo->getClientOriginalExtension();

        Storage::disk('public')->put('images/'.$imageName,file_get_contents($photo));
        return $imageName;



    }
}
