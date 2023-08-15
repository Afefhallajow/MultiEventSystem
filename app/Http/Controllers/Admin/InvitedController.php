<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\configuration;
use App\Models\day;
use App\Models\Invited;
use App\Models\Place;
use App\Models\users_days;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use UltraMsg\WhatsAppApi;

class InvitedController extends Controller
{
    /**
     * InvitedController constructor.
     */
    public function __construct()
    {$this->middleware('permission:inviteds');
    }

    /**
     * Display a listing of the resource.
     */



    public function getInvited()
    {
        $user_day = users_days::where('user_id', Auth::user()->id)->get();
$inviteds =array();

     $day=array();

        foreach ($user_day as $item)
        {
            array_push(  $day,$item->day);
foreach (Invited::where('day_id',$item->day->id)->get() as $new)
            array_push(  $inviteds,$new);

        }
        if(\request()->ajax()) {
            return datatables()
                ->of($inviteds)
                ->addColumn('dayname', function ($data) {
                    if ($data->day)
                    return $data->day->name;
                    else
                        return "-";
                    })
                    ->addColumn('action', function ($data) {
                    $button = '<i data="' . $data->id . '" title="تعديل" class="icons_added edit bx bxs-edit font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<i data="' . $data->id . '" title="حذف" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<a target="_blank" href="'.route('print',[$data->id,0]).'"> <i data="' . $data->id . '" title="طباعة بدون خلفية" class="icons_added print bx bx-printer font-size-20 align-middle mr-1"></i></a>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<a target="_blank" href="'.route('print',[$data->id,1]).'"> <i data="' . $data->id . '" title="طباعة مع خلفية" class="icons_added print_back bx bxs-printer font-size-20 align-middle mr-1" style="color:#66c"></i></a>';
                    $button .= '&nbsp; &nbsp;';

                    return $button;
                })
                ->rawColumns(['dayname','action',])
                ->make(true);
        }
        return view('admin.Invited.day_invited',['days'=>$day,'places'=>Place::all()]);
    }

    public function index()
    {   if(request()->ajax()) {

        $days=$this->getdays();
$arr=array();
        for ($i=0;$i<count($days);$i++)
{
    $arr[$i]=$days[$i]->id;
}
         $inviteds=Invited::whereIn('day_id',$arr)->get();
            return datatables()
                ->of($inviteds)
                ->addColumn('dayname', function ($data) {
                    if ($data->day)
                        return $data->day->name;
                    else
                        return "-";
                })


                ->addColumn('action', function ($data) {
                    $button = '<i data="' . $data->id . '" title="تعديل" class="icons_added edit bx bxs-edit font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<i data="' . $data->id . '" title="حذف" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<a target="_blank" href="'.route('print',[$data->id,0]).'"> <i data="' . $data->id . '" title="طباعة بدون خلفية" class="icons_added print bx bx-printer font-size-20 align-middle mr-1"></i></a>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<a target="_blank" href="'.route('print',[$data->id,1]).'"> <i data="' . $data->id . '" title="طباعة مع خلفية" class="icons_added print_back bx bxs-printer font-size-20 align-middle mr-1" style="color:#66c"></i></a>';

                    return $button;
                })
                ->rawColumns(['action','dayname'])
                ->make(true);
        }
            return view('admin.Invited.invited',['days'=>day::all(),'places'=>Place::all()]);
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required',
            'area' => 'required',
            'age' => 'required',

            'id_number' => 'required',
            'gender' => 'required',

        ];

        $error = Validator::make(request()->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $invite = Invited::where('id', $request->hidden_id)->first();
        if ($invite)
        {

            $form_data = [
                'name' => request()->name,
                'email' => request()->email,
                'mobile' => request()->mobile,
                'age' => request()->age,
                'area' => request()->area,
                'gender' => request()->gender,
                'work' => request()->work,
                'day_id' => request()->day_id,
                'country' => request()->country,

            ];
            $invite->update($form_data);

            return \response()->json(['success'=>'تم التعديل بنجاح']);


        }else {
            $form_data = [
                'name' => request()->name,
                'email' => request()->email,
                'mobile' => '966'.request()->mobile,
                'id_number' => request()->id_number,
                'age' => request()->age,
                'invitation_type' => '2',
                'area' => request()->area,
                'gender' => request()->gender,
                'work' => request()->work,
                'day_id' => request()->day_id,
                'country' => request()->country,

            ];
            Invited::create($form_data);
            $day = day::where('id', \request()->day_id)->first();
            $conf = configuration::where('day_id', request()->day_id)->first();
            if (request()->send_email == 1) {
                try {

                    $data = array('memberEmail' => request()->email, 'config' => $conf, 'day' => $day);

                    Mail::send('email.invite', $data, function ($m) use ($data) {
                        $m->to($data['memberEmail'])->subject($data['config']->subject);
                    });

                } catch (\Exception $e) {

                }
            }

            if (\request()->send_whats == 1) {
                try {

                    $token = $conf->token; // Ultramsg.com token
                    $instance_id = $conf->instance; // Ultramsg.com instance id
                    $client = new WhatsAppApi($token, $instance_id);

                    $to = \request()->mobile;

                    $row1 = $conf->row1;
                    $row2 = $conf->row2;
                    $row3 = $conf->row3;
                    $row4 = $conf->row4;
                    $row5 = $conf->row5;

                    $body = $row1 . PHP_EOL . $row2 . PHP_EOL . $row3 . PHP_EOL . $row4 . PHP_EOL . $row5;
                    $api = $client->sendChatMessage($to, $body);

                } catch (\Exception $e) {

                }

            }
            return response()->json(['success' => 'done']);
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
        $item=Invited::findorfail($id);
        return \response()->json(['data'=>$item]);
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



        $day =Invited::findorfail($id)->delete();
        return \response()->json(['success'=>'تم الحذف بنجاح']);
    }
}
