<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CerConf;
use App\Models\configuration;
use App\Models\day;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * ConfigurationController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:conf');
    }

    /**
     * Display a listing of the resource.
     */


    public function viewWhatsAppconf($id)
    {$day=configuration::where('day_id',$id)->first();

    return view('admin.conf.whatsapp',['day'=>$day]);
    }
    public function storeWhatsApp($id,Request $request)
    {
        $conf=configuration::where('day_id',$id)->update([
            'instance'=>$request->instance,
            'token'=>$request->token,
            'row1'=>$request->row1,
            'row2'=>$request->row2,
            'row3'=>$request->row3,
            'row4'=>$request->row4,
            'row5'=>$request->row5,

        ]);
toastr()->success('تمت العملية بنجاح');


        return redirect()->back();
    }

    public function viewCerConf($id)
    {
        $day=day::where('id',$id)->first();
        $imageSetting=CerConf::where('day_id',$id)->first();
        if($imageSetting)
        return view('admin.conf.CerConf',['day'=>$day,'imageSetting'=>$imageSetting]);
else
    $imageSetting=CerConf::create([
        'day_id'=>$id,
        'xpo'=>2000,
        'ypo'=>2000,
        'color'=>'#014a97',
        'size'=>'300',
    ]);
        return view('admin.conf.cerConf',['day'=>$day,'imageSetting'=>$imageSetting]);
    }
 public function storeCerConf($id,Request $request)
{

     CerConf::where('day_id',$id)->update([

        'xpo'=>$request->xpo,
        'ypo'=>$request->ypo,
        'color'=>$request->color,
        'size'=>$request->size,
    ]);
    $imageSetting =  CerConf::where('day_id',$id)->first();
    $Arabic = new \I18N_Arabic('Glyphs');
    $text = $Arabic->utf8Glyphs("سيظهر النص هنا");
    $day = day::findorfail($id);
$img =\Image::make('storage/images/'.$day->image);

    $img->text($text,$imageSetting->xpo,$imageSetting->ypo,function($font) use($imageSetting){
        $font->file(public_path('Linotype - DIN Next LT Arabic Medium.ttf'));
        $font->size($imageSetting->size);
        $font->color($imageSetting->color);
        $font->align($imageSetting->align);
        $font->valign($imageSetting->valgin);
    });
    $img->save(\public_path('textEample/'.$day->image));
    $data = [
        'imageLink' => public_path('textEample/'.$day->image),
        'url' => ''
    ];

    $pdf = PDF::loadView('pdf', $data);
    return    $pdf->download('test'.'.pdf');



}
    public function index()
    {
        //
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
    {$filename= $request->file('file');
        $data = getimagesize($filename);
        $width = $data[0];
        $height = $data[1];
    return $data;

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
