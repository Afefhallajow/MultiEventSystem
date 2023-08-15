<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\day;
use App\Models\Invited;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /*
     * Display a listing of the resource.
     */

    public function __construct()
    {$this->middleware('permission:presence');
    }

    public function index()
    {
        $days=$this->getdays();
    return view('admin.Presence.presence',['days'=>$days]);
    }
    public function showstorpage()
    {
        $days=$this->getdays();
        return view('admin.Presence.new_presence',['days'=>$days]);
    }

    public function getdata()
    {

        $days=$this->getdays();
        $arr=array();
        for ($i=0;$i<count($days);$i++)
        {
            $arr[$i]=$days[$i]->id;
        }

        $inviteds=Invited::whereIn('day_id',$arr)->where('isPresence',1)->get();
if(1)
{
    return datatables()
        ->of($inviteds)
        ->addColumn('day', function ($data) {
        return $data->day->name;
        })
        ->addColumn('action', function ($data) {
            $button = '<a target="_blank"  ><i data="' . $data->id . '" title="ارسال شهادة حضور" class="icons_added edit bx bx-book sendcer font-size-20 align-middle mr-1"></i></a>';
            $button .= '&nbsp; &nbsp;';
            $button .= '<a target="_blank" href="'.route('makecer',[$data->id]).'"><i data="' . $data->id . '" title="تحميل شهادة الحضور" class="icons_added edit bx bx-download bx-book font-size-20 align-middle mr-1"></i></a>';
            $button .= '&nbsp; &nbsp;';


            $button .= '<i data="' . $data->id . '" title="حذف" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';





            $button .= '&nbsp; &nbsp;';
            $button .= '<a target="_blank" href="'.route('print',[$data->id,0]).'"> <i data="' . $data->id . '" title="طباعة بدون خلفية" class="icons_added print bx bx-printer font-size-20 align-middle mr-1"></i></a>';
            $button .= '&nbsp; &nbsp;';
            $button .= '<a target="_blank" href="'.route('print',[$data->id,1]).'"> <i data="' . $data->id . '" title="طباعة مع خلفية" class="icons_added print_back bx bxs-printer font-size-20 align-middle mr-1" style="color:#66c"></i></a>';
            $button .= '&nbsp; &nbsp;';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);



}
    }

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
if($inveted)
{if ($inveted->day_id == $request->day)
    {
        $inveted->isPresence =1;
        $inveted->save();
        toastr()->success('تمت العملية بنجاح');

    }else
        toastr()->error('المستخدم غير مسجل بلفعالية');
return redirect()->to(route('presencenew'));
}else{
    toastr()->error('المشارك غير موجود ');
    return redirect()->to(route('presencenew'));
}
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
        $inviteds=Invited::where('id',$id)->first();
$inviteds->isPresence=0;
        $inviteds->save();
return response()->json(['success'=>'تمت']);
    }
}
