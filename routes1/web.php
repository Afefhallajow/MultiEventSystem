<?php

use App\Models\member;
use Illuminate\Support\Facades\Route;



// Route::get('/testemail', [App\Http\Controllers\MemberController::class, 'testEmail']);

Route::get('/MedicalForum', function(){
    return view('ads');
});



// export Registered Members
Route::get('export-all-registered', [App\Http\Controllers\HomeController::class, 'exportAllRegistered']);


Route::get('export-all-registered-in-workshops', [App\Http\Controllers\HomeController::class, 'exportAllRegisteredInWorkShops']);


Route::get('/registration', [App\Http\Controllers\MemberController::class, 'registrationView'])->name('reg.comp');

Route::post('/registration', [App\Http\Controllers\MemberController::class, 'save'])->name('saveMembersData');

Route::get('/success/{id}', function($id){

$member=member::where('id',$id)->first();
    $link = url('/badge'.'/'.$member->code);

    return view('thankyou',['link'=>$link]);

})->name('success');

Route::get('/medical-forum-registration', [App\Http\Controllers\MemberController::class, 'medicalRegistrationView']);
Route::post('/saveMembersMedicalData', [App\Http\Controllers\MemberController::class, 'saveMedicalData']);

// Link For Payment Datails
Route::get('/bank-details/{code}', [App\Http\Controllers\MemberController::class, 'bankDetailsView']);
Route::post('/bank-details/{code}', [App\Http\Controllers\MemberController::class, 'savebankDetailsView']);
// Badge
Route::get('/badge/{code}', [App\Http\Controllers\MemberController::class, 'badgeView'])->name('vis.badge');




Route::get('/update-registration-information/{code}', [App\Http\Controllers\MemberController::class, 'fixIssue'])->name('vis.fixIssue');
Route::post('/update-registration-information', [App\Http\Controllers\MemberController::class, 'postFixIssue'])->name('vis.postFixIssue');


// Check Email
Route::get('checkEmail/{email}', [App\Http\Controllers\MemberController::class, 'checkEmail']);

Auth::routes(["register" => false]);

Route::get('/prizzes', [App\Http\Controllers\MemberController::class, 'prizzes'])->name('prizzes');
Route::get('/set_winner/{prize_id}/{winner_order}/{winner_id}', [App\Http\Controllers\MemberController::class, 'setWinner']);
Route::get('/reset_winner/{prize_id}/{winner_order}', [App\Http\Controllers\MemberController::class, 'resetWinner']);



Route::post('/select-winner', 'HomeController@select_winner')->name('select_winner');
Route::post('/select-prize', 'HomeController@select_prize')->name('select_prize');
Route::post('/reset-all', 'HomeController@reset_all')->name('reset_all');


//Attend By Qrcode
Route::get('/attendVisitor/{code?}', [App\Http\Controllers\Admin\AttendController::class, 'storeByCode'])->name('vis.attend');
//Resend Visa
Route::get('resendVisa/{id}', [App\Http\Controllers\HomeController::class, 'resendVisa']);
// Export Excel For Festival Attending
Route::get('export/{date}', [App\Http\Controllers\HomeController::class, 'exportByDate']);
// Export Excel For WorkShops Attending
Route::get('export-workshop/{id}', [App\Http\Controllers\HomeController::class, 'exportByWorkShop']);
// Export Excel For Interested Memeber Of Workshops
Route::get('export-interested-in-workshop/{id}', [App\Http\Controllers\HomeController::class, 'exportInterestedInWorkShop']);
// Get All Users
Route::get('/getAllUsers', [App\Http\Controllers\HomeController::class, 'getUsers'])->name('getUsers');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'destroyUser']);
// Get All Registered Memebers
Route::get('/registeredMemebers', [App\Http\Controllers\HomeController::class, 'getData'])->name('registeredMembers');
Route::get('/registeredExhebs', [App\Http\Controllers\HomeController::class, 'getExhebsData'])->name('registeredExhebs');
Route::delete('/deleteMember/{id?}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('vis.del');
Route::get('/show-visitor/{id}', [App\Http\Controllers\HomeController::class, 'showVisitor']);
// Get All Remittance Memebers
Route::get('/remittance', [App\Http\Controllers\HomeController::class, 'index2']);
Route::get('/remittanceMemebers', [App\Http\Controllers\HomeController::class, 'getRemittance'])->name('MembersRemittance');
Route::delete('/deleteRemittance/{id}', [App\Http\Controllers\HomeController::class, 'destroyRemittance']);
Route::get('/approve/{id}', [App\Http\Controllers\HomeController::class, 'approve']);
// Get Visa Info
Route::get('/visaMembers', [App\Http\Controllers\HomeController::class, 'getVisaMembers'])->name('getVisaMembers');
// Get Workshop Info
Route::get('/workShopInfo', [App\Http\Controllers\Admin\WorkShopController::class, 'getData'])->name('getWorkShopData');
Route::delete('/deleteWorkShop/{id}', [App\Http\Controllers\Admin\WorkShopController::class, 'destroy']);
Route::put('/edit-workshop/{id}', [App\Http\Controllers\Admin\WorkShopController::class, 'editWorkShop']);
// Get All Data For Printing
Route::get('/all', [App\Http\Controllers\HomeController::class, 'getAll'])->name('allRegistration');
 Route::get('/print/printBadge/{withImage}/{code}', [\App\Http\Controllers\Admin\VisitorController::class,'printBadge']);

Route::group(['prefix'=>'admin','middleware'=>['auth']],function (){

    Route::get('register_member',[App\Http\Controllers\HomeController::class, 'register_member'])->name('register_member');
    Route::post('register_member',[App\Http\Controllers\HomeController::class, 'register_member_post'])->name('register_member');
    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/confirm/{qrcode?}', [App\Http\Controllers\HomeController::class, 'confirm'])->name('confirm');

    Route::get('/reject/{qrcode?}', [App\Http\Controllers\HomeController::class, 'reject'])->name('reject');

    Route::get('/reject-all-registration/{qrcode?}', [App\Http\Controllers\HomeController::class, 'rejectAllRegistration'])->name('reject-all');

    Route::get('/create/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'index'])->name('createVisitros');
    Route::post('/create/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'store']);
    Route::get('/show/visitors', [\App\Http\Controllers\Admin\VisitorController::class,'showVisitors'])->name('showVisitors');

    Route::get('/create/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'indexExheb'])->name('createExhebs');;
    Route::post('/create/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'storeExheb']);
    Route::get('/show/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'showExheb'])->name('showExhebs');

    Route::get('/remittance', [App\Http\Controllers\HomeController::class, 'index2']);


    Route::get('/attend', [App\Http\Controllers\Admin\AttendController::class, 'index']);
    Route::post('/attend', [App\Http\Controllers\Admin\AttendController::class, 'store']);

    Route::get('/attendWorkShop', [App\Http\Controllers\Admin\AttendController::class, 'indexWorkShop']);
    Route::post('/attendWorkShop', [App\Http\Controllers\Admin\AttendController::class, 'storeWorkShop']);


    Route::get('/attend&print', [App\Http\Controllers\Admin\AttendController::class, 'attendAndPrintView']);
    Route::post('/attend&print', [App\Http\Controllers\Admin\AttendController::class, 'saveAttendAndPrint']);



    Route::get('/attends-per-day', [App\Http\Controllers\Admin\AttendController::class, 'attendPerDay']);
    Route::get('/attends-per-workshop', [App\Http\Controllers\Admin\AttendController::class, 'attendPerWorkShop']);

    Route::get('/interested-in-workshop', [App\Http\Controllers\Admin\AttendController::class, 'intersetedInWorkShop']);
    Route::get('/view-interested-in-workshop/{id}', [App\Http\Controllers\Admin\AttendController::class, 'viewIntersetedInWorkShop']);
    Route::get('/getBrowseInterestedInWorkshop/{id}', [App\Http\Controllers\Admin\AttendController::class, 'getBrowseInterestedInWorkshop']);

    Route::get('/BrowseEventAttenders/{date}',[App\Http\Controllers\Admin\AttendController::class, 'BrowseAttenders']);
    Route::get('/getBrowseEventAttendersData/{date}',[App\Http\Controllers\Admin\AttendController::class, 'getEventData'])->name('vis.attPerDay');


    Route::get('/BrowseWorkShopAttenders/{id}',[App\Http\Controllers\Admin\AttendController::class, 'BrowseWorkShopAttenders']);
    Route::get('/getBrowseWorkShopAttendersData/{id}',[App\Http\Controllers\Admin\AttendController::class, 'getBrowseWorkShopAttendersData']);

    Route::get('/print/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'print']);
    Route::get('/print/printBadge/{withImage?}/{code?}', [\App\Http\Controllers\Admin\VisitorController::class,'printBadge'])->name('badge.print');


    Route::get('/visa', [App\Http\Controllers\HomeController::class, 'visaIndex']);
    Route::post('/addVisa/{id}', [App\Http\Controllers\HomeController::class, 'addVisa']);

    Route::get('/workshop', [App\Http\Controllers\Admin\WorkShopController::class, 'index']);
    Route::post('/workshop', [App\Http\Controllers\Admin\WorkShopController::class, 'store']);

    Route::get('/allUsers',[App\Http\Controllers\HomeController::class, 'allUsers']);




    Route::get('/create/manager', [\App\Http\Controllers\Admin\VisitorController::class,'createManager']);
    Route::get('/create/speak', [\App\Http\Controllers\Admin\VisitorController::class,'createSpeak']);
    Route::post('/reg/exheb', [\App\Http\Controllers\Admin\VisitorController::class,'storeExheb']);
    Route::post('/reg/manager', [\App\Http\Controllers\Admin\VisitorController::class,'storeManager']);
    Route::post('/reg/speak', [\App\Http\Controllers\Admin\VisitorController::class,'storeSpeak']);

    // Caregories
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::get('/all-categories',[\App\Http\Controllers\Admin\CategoryController::class, 'getData'])->name('categories.getData');

    // Companies
    Route::resource('/companies', \App\Http\Controllers\Admin\CompanyController::class);
    Route::get('/all-companies',[\App\Http\Controllers\Admin\CompanyController::class, 'getData'])->name('companies.getData');


});
