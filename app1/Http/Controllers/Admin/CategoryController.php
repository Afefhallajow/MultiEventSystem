<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\Category;
use App\Models\Attend;
use App\Models\AttendsWorkShop;
use App\Models\WorkShopRegisteredMember;
use DB;
use Storage;
use DataTables;

class CategoryController extends Controller 
{
    public function index()
    {
        return view('admin.category.index');
    }
    
      public function show($id){
        $Category = Category::findOrFail($id);
        
        return $Category;
    }
    
    
    public function store(Request $request)
    {
        if($request->file('badge_image')){
            $file = $request->file('badge_image');
            $fileName = $request->name.'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('badge/'.$fileName,file_get_contents($file));
        }
        
        return Category::create(['name' => $request->name,'badge_image' => $fileName,'textColor' => $request->textColor]);
    }
    
    public function getData(Request $request){
        if ($request->ajax()) {
            $data = Category::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->editColumn('badge_image', function($row){
                    return url('storage/app/public/badge/'.$row->badge_image);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    
     public function update(Request $request,$id){
        $Category = Category::findOrFail($id);
        
       $Category->update([
         'name' => $request->name,
        'textColor' => $request->textColor
         ]);
          if($request->file('badge_image')){
            $file = $request->file('badge_image');
            $fileName = $request->name.'.'.$file->getClientOriginalExtension();
            Storage::disk('public')->put('badge/'.$fileName,file_get_contents($file));
            
             $Category->update([
     'badge_image' => $fileName
    
         ]);
        }
         return redirect()->back();
         
        
        
    }
    
    public function destroy($id)
    {
        return Category::where('id',$id)->delete();
    }
    
}
