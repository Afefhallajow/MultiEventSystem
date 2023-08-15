<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\day;
use App\Models\Invited;
use Illuminate\Http\Request;

class qrcode extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   return view('admin.qrview'); }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inveted=Invited::where('id',$request->id)->first();

        $day=day::where('id',$inveted->day_id)->first();
        if($inveted)

        {//return $inveted;
            return view('admin.qr',['item'=>$inveted,'day'=>$day])
;        }
else
    toastr()->error('المستخدم غير موجود');
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
