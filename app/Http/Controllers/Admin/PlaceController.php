<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Image;
use App\Http\Controllers\Controller;
use App\Models\day;
use App\Models\Invited;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {$this->middleware('permission:places');
    }

    public function index()
    {
        $places = Place::all();
        if(request()->ajax()){
            return datatables()
                ->of($places)
                ->addColumn('action', function($data){
                    $button = '<i data="'.$data->id.'" class="icons_added edit bx bxs-edit font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<i data="'.$data->id.'" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';
                    $button .= '<a style="margin:.4rem" href="draw-chairs/'.$data->id.'"><i class="icons_added border-inner bx bx-book font-size-20 align-middle mr-1"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Places.places');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return DB::transaction(function(){
                $rules = [
                    'name' => 'required|string|max:255',
                    'name_en' => 'required|string|max:255',
                ];


                $form_data = [
                    'name' => request()->name,
                    'name_en' => request()->name_en,
                ];

                $error = Validator::make(request()->all(), $rules);
                if($error->fails()) {
                    return response()->json(['errors' => $error->errors()->all()]);
                }

                // Add Place
if(\request()->action =='Add')
                    $place = Place::create($form_data);
else
    $place = Place::where('id',\request()->hidden_id)->update($form_data);

                // Edit Place

                // change placed chair if they are out of chart && un reserved it


                return response()->json(['success' => 'تم حفظ المعلومات بنجاح']);
            });
        }
        catch (\Exception $ex){
            return response()->json(['errors'=>$ex->getMessage() ]);
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
        $item=Place::findorfail($id);
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
$days= day::where('place_id',$id)->get();
foreach ($days as $day)
{
    Invited::where('day_id',$day->id)->delete();
$day->delete();
}
Place::findorfail($id)->delete();
return response()->json(['success'=>'done']);
    }
}
