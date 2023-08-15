<?php

namespace App\Http\Controllers;

use App\Models\day;
use App\Models\users_days;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
public  function getdays()
{
    if(Auth::user()->isadmin==1)
    {
        return day::all();
    }else {
        $arr = users_days::where('user_id', Auth::user()->id)->get();
        $days = array();
        foreach ($arr as $item) {
            $day = day::where('id', $item->day_id)->first();

            array_push($days, $day);
        }

    return $days;}
    }

}
