<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Image;
use App\Http\Controllers\Controller;
use App\Models\CerConf;
use App\Models\configuration;
use App\Models\day;
use App\Models\EmailConfiguration;
use App\Models\Invited;
use App\Models\Place;
use App\Models\users_days;
use Barryvdh\DomPDF\Facade\Pdf;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use UltraMsg\WhatsAppApi;

class DayController extends Controller
{
    /**
     * DayController constructor.
     */
    public function __construct()
    {$this->middleware('permission:days')->except(['makecer','sendcer','ExternalInvite','ExternalInviteStore']);
    }

    /**
     * Display a listing of the resource.
     */



    public function emailconf($id)
{$conf=configuration::where('day_id',$id)->first();
    $day=day::where('id',$id)->first();
    if($conf){

        return view('email.emailConf',['day'=>$day,'config'=>$conf]);
    }else
    {$conf=configuration::create([
        'day_id'=>$id,

        'subject'=>'ادخل العنوان',
        'subjectEn'=>'ادخل العنوان',
        'confirm_content'=>'ادخل المحتوى',
        'confirm_content_en'=>'ادخل المحتوى',
'invite_content'=>''
    ]);}
    return view('email.emailConf',['day'=>$day,'config'=>$conf]);


}
    public function storeemailconf($id)
    {
        $conf=configuration::where('day_id',$id)->update([
        'subject'=>\request()->subject,
        'subjectEn'=>\request()->subjectEn,
'confirm_content'=>\request()->content,
        'confirm_content_en'=>\request()->contentEn,
'invite_content'=>\request()->invite_content
    ]);
toastr()->success('تمت العملية بنجاح');
    return redirect()->back();

    }

    public function updateimage()
    {
        $day = day::where('id', \request()->day_id)->get();
        if (\request()->type == 1 && \request()->file('newImage')) {
            $photo = \request()->file('newImage');
            $imageName = Str::random(20) . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->delete('images/' . $day->image);

            Storage::disk('public')->put('images/' . $imageName, file_get_contents($photo));
            $day->image = $imageName;
            $day->save();


            return \response()->json(['sucsses' => 'تمت العملية بنجاح']);
        } elseif (\request()->type == 2 && \request()->file('newImage'))
        {$photo = \request()->file('newImage');
        $imageName = Str::random(20) . '.' . $photo->getClientOriginalExtension();
        Storage::disk('public')->delete('images/' . $day->bg_image);

        Storage::disk('public')->put('images/' . $imageName, file_get_contents($photo));
        $day->bg_image = $imageName;
        $day->save();
        return \response()->json(['sucsses' => 'تمت العملية بنجاح']);
    }
    else
{
    return \response()->json(['sucsses'=>'لم يتغير شيء']);

}
}
public function makecer($id){


    $item=Invited::where('id',$id)->first();
    $Arabic=new \I18N_Arabic('Glyphs');
    if($item) {
        $day = day::findorfail($item->day_id);
    }
    $img =\Image::make('storage/images/'.$day->image);

    $text  = $Arabic->utf8Glyphs($item->name);
$conf= $day->cerconf;
    $img->text($text, $conf->xpo, $conf->ypo, function($font) use ($conf) {
        $font->file(public_path('Linotype - DIN Next LT Arabic Medium.ttf'));

        $font->size($conf->size);
        $font->color($conf->color);
        $font->align('center');
        $font->valign('middle');
    });

    $data = [
        'imageLink' => 'temp/temp.jpeg',
        'url' => ''
    ];

    $img->save(\public_path('temp/temp'.'.jpeg'));
    $pdf = PDF::loadView('pdf', $data);
    return    $pdf->download($item->name.'.pdf');

}
    public function sendcer($id)
    {
        try {


            $url = asset(route('makecer', $id));
            $invited = Invited::where('id', $id)->first();
            $day = day::where('id', $invited->day_id)->first();
            $conf = configuration::where('day_id', $invited->day_id)->first();
            $data = array('memberEmail' => $invited->email, 'url' => $url, 'config' => $conf, 'day' => $day);

            Mail::send('email.cer', $data, function ($m) use ($data) {
                $m->to($data['memberEmail'])->subject($data['config']->subject);
            });
            return \response()->json(['success' => 'تمت']);
        } catch (\Exception $e)
        {return \response()->json(['errors'=>[$e->getMessage()]]);}
    }




    public function print($id,$type){
        $item=Invited::where('id',$id)->first();

if($item) {
    $day = day::findorfail($item->day_id);
}
        return view('admin.badge',['day'=>$day,'item'=>$item,'type'=>$type]);
    }


    public function ExternalInvite($id){
    $day=day::findorfail($id);

return view('ExternalInvite',['day'=>$day,'places'=>Place::all()]);
}
    public function ExternalInviteStore(){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required',
            'id_number' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'country' => 'required',

            'work' => 'required',

        ];

        $error = Validator::make(request()->all(), $rules);
        if($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
 if(\request()->work1)
 $work=\request()->work1;
 else
$work=\request()->work;
        $form_data = [
            'name' => request()->name,
            'email' => request()->email,
            'mobile' =>'966'. request()->mobile,
            'id_number' => request()->id_number,
            'age' => request()->age,
            'area' => request()->area,
            'gender' => request()->gender,
            'work' => $work,
            'day_id' => request()->day_id,
            'country' => request()->country,

        ];
Invited::create($form_data);

        $day = day::where('id', \request()->day_id)->first();
        $conf = configuration::where('day_id', request()->day_id)->first();
        if ( 1) {
try{
            $data = array('memberEmail' => request()->email, 'config' => $conf, 'day' => $day);

                Mail::send('email.welcom', $data, function ($m) use ($data) {
                    $m->to($data['memberEmail'])->subject($data['config']->subject);
                });
}
catch(\Exception $e)
{}




        }


return response()->json(['success'=>'done']);
    }


    public function index()
    {
        if(request()->ajax()){
$days=$this->getdays();
        return datatables()
            ->of($days)
            ->addColumn('place', function($data) {
            return $data->place->name;
            })
            ->addColumn('action', function($data){
                $button = '<i data="'.$data->id.'" title="تعديل" class="icons_added edit bx bxs-edit font-size-20 align-middle mr-1"></i>';
                $button .= '&nbsp; &nbsp;';

                $button .= '<i data="'.$data->id.'" title="حذف" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';
                $button .= '&nbsp; &nbsp;';



                $button .= '<a target="_blank" href="'.route("externalInvite", $data->id).'"><i title="تسجيل خارجي" class="icons_added register bx bx-user font-size-20 align-middle mr-1" style="color:#77c;padding-right:.7rem"></i>';
                $button .= '<a target="_blank" href="'.route('whatsapp',$data->id).'"><i title=" إعدادات رسالة الواتس" class="icons_added register bx bxl-whatsapp font-size-20 align-middle mr-1" style="color:#77c;padding-right:.7rem"></i>';
                $button .= '<a style="margin:1rem" href="email-configuration/'.$data->id.'"><i title="إعدادات الإيميل" class="icons_added register bx bx-envelope  font-size-20 align-middle mr-1" style="color:#66c"></i></a>';


                $button .= '<a target="_blank" href="'.route('viewcerconf',$data->id).'" ><i title=" تعديل الصور " class="icons_added register bx bx-file font-size-20 align-middle mr-1" style="color:#77c;padding-right:.4rem"></i>';
                return $button;
            })
            ->rawColumns(['action', 'place'])
            ->make(true);
    }

        return view('admin.Days.days',['places'=>Place::all()]);
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
    {   try{
            return DB::transaction(function(){
                $rules = [
                    'name' => 'required|string|max:255',
                    'name_en' => 'required|string|max:255',
                    'date' => 'required|date',
                    'time' => 'required|string',
                    'description' => 'required|string',
                    'description_en' => 'required|string',
                ];
                $form_data = [
                    'name' => request()->name,
                    'name_en' => request()->name_en,
                    //'map_url' => request()->map_url,
                    'date' => request()->date,
                    'time' => request()->time,
                    'description' => request()->description,
                    'description_en' => request()->description_en,
                    'thanksMSG' => request()->thanksMSG,
                    'thanksMSG_en' => request()->thanksMSG_en,
                    'place_id' => request()->place_id,
                    'location' => request()->location,

                      ];

                if(request()->action == 'Add'){
                    $rules['image'] = 'required|image';
                    $rules['bg_image'] = 'required|image';
                }
                else{
                    $rules['image'] = 'nullable|image';
                    $rules['bg_image'] = 'nullable|image';
                }

                $error = Validator::make(request()->all(), $rules);
                if($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                // Add Day
                $imgname = request()->name;
                if(request()->action == 'Add'){

                    $form_data['image'] = Image::uploadImage( request()->file('image'));

                    // bg image
                    $filename= request()->file('bg_image');
                    $data = getimagesize($filename);
                    $width = $data[0];
                    $height = $data[1];
if($height <250)
                    $form_data['bg_image'] = Image::uploadImage( request()->file('bg_image'));
else
    return \response()->json(['errors'=>['قياس الصورة غير صحيح']]);
                    // email image

                    $newDay = Day::create($form_data);


                    CerConf::create([
                    'day_id'=>$newDay->id,
                        'xpo'=>2000,
                        'ypo'=>2300,
                        'color'=>'#008000',
                        'size'=>200,
                    ]);

                    $conf=configuration::create([
                        'day_id'=>$newDay->id,

                        'subject'=>'ادخل العنوان',
                        'subjectEn'=>'ادخل العنوان',
                        'confirm_content'=>'ادخل المحتوى',
                        'confirm_content_en'=>'ادخل المحتوى',

                    ]);
                }

                // Edit Day
                else{
                    $record = Day::whereId(request()->hidden_id)->first();

                    $conf=configuration::create([
                        'day_id'=>$record->id,

                        'subject'=>'ادخل العنوان',
                        'subjectEn'=>'ادخل العنوان',
                        'confirm_content'=>'ادخل المحتوى',
                        'confirm_content_en'=>'ادخل المحتوى',

                    ]);
                    if ( \request()->file('image')) {
                        Storage::disk('public')->delete('images/' . $record->image);
                        $form_data['image'] = Image::uploadImage( request()->file('image'));

                    }
                    if ( \request()->file('bg_image')) {
                        Storage::disk('public')->delete('images/' . $record->bg_image);
                        $form_data['bg_image'] = Image::uploadImage( request()->file('bg_image'));

                    }




                    Day::whereId(request()->hidden_id)->update($form_data);
                }

                return response()->json(['success' => 'تم حفظ المعلومات بنجاح']);
            });
        }
        catch (\Exception $e)
{
    return response()->json(['errors'=>[$e->getMessage()] ]);
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
$item=day::findorfail($id);
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
    public function destroy($id)
    {Invited::where('day_id',$id)->delete();
CerConf::where('day_id',$id)->delete();
        configuration::where('day_id',$id)->delete();
        users_days::where('day_id',$id)->delete();

        $day =day::findorfail($id);
        Storage::disk('public')->delete('images/'.$day->image);
        Storage::disk('public')->delete('images/'.$day->bg_image);
$day->delete();
   return \response()->json(['success'=>'تمت ']);
    }
}
