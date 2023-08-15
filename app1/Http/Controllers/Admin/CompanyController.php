<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Attend;
use App\Models\AttendsWorkShop;
use App\Models\WorkShopRegisteredMember;
use DB;
use Str;
use DataTables;

class CompanyController extends Controller 
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.company.index',compact('categories'));
    }
    
    public function show($id){
        $company = Company::findOrFail($id);
        
        return $company;
    }
    
    public function store(Request $request)
    {
        $key = Str::random(10);
        
        return Company::create(['name' => $request->name,'random_key' => $key,'category_id' => $request->category_id,'allowed_count' => $request->allowed_count,'label' => $request->label]);
    }
    
    public function getData(Request $request){
        if ($request->ajax()) {
            $data = Company::withCount('members')->get();
            
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('category_name', function($row){
                    $category = Category::where('id',$row->category_id)->first();
                    if($category){
                         return $category->name;
                    }
                    return '';
                   
                })
                ->addColumn('reg_link', function($row){
                    return route('reg.comp',['key' => $row->random_key]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    
    public function update(Request $request,$id){
         $company = Company::findOrFail($id);
       $company->update([
         'name' => $request->name,
    
         'category_id' => $request->category_id,
         'allowed_count' => $request->allowed_count,
         'label' => $request->label
         ]);
         return redirect()->back();
         
        
        
    }
    
    public function destroy($id)
    {
        return Company::where('id',$id)->delete();
    }
    
}
