<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('external/day/{id}',[\App\Http\Controllers\Admin\DayController::class,'ExternalInvite'])->name('externalInvite');
Route::post('external/day/',[\App\Http\Controllers\Admin\DayController::class,'ExternalInviteStore'])->name('ExternalInviteStore');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::post('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('exportExcel');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'viewprofile'])->name('myprofile');


    //////////////////////days route//////////////

Route::resource('days',\App\Http\Controllers\Admin\DayController::class);
//    Route::get('day/all',[\App\Http\Controllers\Admin\DayController::class,'getData']);


//////////////////////places route//////////////
    Route::resource('places',\App\Http\Controllers\Admin\PlaceController::class);

//////////////////////invites route//////////////

    Route::resource('invites',\App\Http\Controllers\Admin\InvitedController::class)->middleware('permission:inviteds');
    Route::get('/invite/get',[\App\Http\Controllers\Admin\InvitedController::class,'getInvited'])->name('getInvited');

//////////////////////employees route//////////////
    Route::resource('employees',\App\Http\Controllers\Admin\EmployeeController::class);
    Route::get('addper',[\App\Http\Controllers\Admin\EmployeeController::class,'addper']);
    Route::get('/view-permission/{id}', [\App\Http\Controllers\Admin\EmployeeController::class,'view_permission'])->name('view_permission');
    Route::post('/view-permission', [\App\Http\Controllers\Admin\EmployeeController::class,'permission'])->name('employees.permission');


    ///////////////////conf/////////
Route::get('whatsapp/{id}',[\App\Http\Controllers\Admin\ConfigurationController::class,'viewWhatsAppconf'])->name('whatsapp');
    Route::post('whatsapp/{id}',[\App\Http\Controllers\Admin\ConfigurationController::class,'storeWhatsApp'])->name('whatsapp');
    Route::get('email-configuration/{id}',[App\Http\Controllers\Admin\DayController::class,'emailconf'])->name('email');
    Route::post('email-configuration/{id}',[App\Http\Controllers\Admin\DayController::class,'storeemailconf'])->name('emailstore');
    Route::get('cer-configuration/{id}',[App\Http\Controllers\Admin\ConfigurationController::class,'viewCerConf'])->name('viewcerconf');
    Route::post('cer-configuration/{id}',[App\Http\Controllers\Admin\ConfigurationController::class,'storeCerConf'])->name('storecerconf');


    Route::resource('conf',\App\Http\Controllers\Admin\ConfigurationController::class);
//////////////presence///////
    Route::resource('presence',\App\Http\Controllers\Admin\PresenceController::class);
    Route::get('p/data','\App\Http\Controllers\Admin\PresenceController@getdata')->name('presencedata');
    Route::get('p/new','\App\Http\Controllers\Admin\PresenceController@showstorpage')->name('presencenew');
    Route::get('p/update','\App\Http\Controllers\Admin\PresenceController@updateimage')->name('updateimage');

    Route::get('test',function ()
    {
        return view('test');
    });

///////////////////
    Route::get('print/{id}/{type}',[App\Http\Controllers\Admin\DayController::class,'print'])->name('print');

    Route::get('sendcer/{id}',[App\Http\Controllers\Admin\DayController::class,'sendcer'])->name('sendcer');
    Route::get('makecer/{id}',[App\Http\Controllers\Admin\DayController::class,'makecer'])->name('makecer');
    Route::get('show_day_user/{id}',[App\Http\Controllers\Admin\EmployeeController::class,'view_days_user'])->name('view_days_user');
    Route::post('show_day_user/',[App\Http\Controllers\Admin\EmployeeController::class,'store_day_to_user'])->name('store_day_to_user');
//////////////////////qr
    Route::resource('qrcode',\App\Http\Controllers\Admin\qrcode::class);


});

Auth::routes();

