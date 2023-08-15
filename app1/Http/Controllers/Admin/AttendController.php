<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\WorkShop;
use App\Models\Attend;
use App\Models\AttendsWorkShop;
use App\Models\WorkShopRegisteredMember;
use DB;
use DataTables;

class AttendController extends Controller 
{
    public function index(){
        return view('admin.attend.index');
    }
    
    public function indexWorkShop(){
        $workshops = WorkShop::all();
        return view('admin.attend.indexWorkShop',compact('workshops'));
    }
    
    public function attendAndPrintView(){
          return view('admin.attend.attendAndPrint'); 
    }

    public function store(Request $request){
        $memeber = member::where('qrcode',$request->qrcode)->first();
        $mytime = \Carbon\Carbon::now();
        
        $check = Attend::where([
                ['member_id','=',$memeber->id],
                ['datee','=',$mytime->toDateString()]
        ])->first();
        
        
        if($check){
            return 0;
        }
        
        $new = Attend::create([
            'member_id' => $memeber->id,
            'datee' => $mytime->toDateString(),
        ]);

        if($new)
            return $memeber;
        
        return false;
    }
    
    public function storeWorkShop(Request $request){
        $memeber = member::where('qrcode',$request->qrcode)->first();
        
        if($memeber->type == 0){
         return 0;   
        }else{
            $mytime = \Carbon\Carbon::now();
            $new = AttendsWorkShop::create([
                'member_id' => $memeber->id,
                'work_shop_id' => $request->name,
            ]);
            
             if($new){
                    return $memeber;
             }else{
                    return false;
             }
        }
        
        
    }

    public function attendPerDay(){
        $workshos = Attend::select('datee', DB::raw('count(*) as total'))
        ->groupBy('datee')
        ->get();

        $count = Attend::count();

        return view('admin.attend.attendPerDay',compact('workshos','count'));
    }
    
    public function attendPerWorkShop(){
        $workshos = AttendsWorkShop::select('work_shop_id', DB::raw('count(*) as total'))
        ->groupBy('work_shop_id')
        ->get();

        $count = AttendsWorkShop::count();

        return view('admin.attend.attendPerWorkShop',compact('workshos','count'));
    }
    
    public function intersetedInWorkShop(){
        $workshos = WorkShopRegisteredMember::select('work_shop_id', DB::raw('count(*) as total'))
        ->groupBy('work_shop_id')
        ->get();

        $count = WorkShopRegisteredMember::count();

        return view('admin.attend.interestedWorkShop',compact('workshos','count'));
    }
    
    public function viewIntersetedInWorkShop($id){
        $results = WorkShopRegisteredMember::where('work_shop_id',$id)->get();
        $route = '/admin/getBrowseInterestedInWorkshop/'.$id;
        return view('admin.attend.browseInterstedInWorkShop',compact('results','route'));
    }
    
    public function storeByCode($code){
        $memeber = member::where('qrcode',$code)->first();
        $mytime = \Carbon\Carbon::now();
        $new = Attend::create([
            'member_id' => $memeber->id,
            'datee' => $mytime->toDateString(),
        ]);
        if($new)
            return true;
        
        return false;
    }
    
    public function saveAttendAndPrint(Request $request){
        $memeber = member::where('qrcode',$request->qrcode)->first();
        $mytime = \Carbon\Carbon::now();
        $new = Attend::create([
            'member_id' => $memeber->id,
            'datee' => $mytime->toDateString(),
        ]);
        if($new)
            return $memeber;
            
        return false;
    }
    
    public function BrowseAttenders($date){
        $results = Attend::where('datee',$date)->get();
        $route =  route('vis.attPerDay',['date' => $date]);
        $eventDate = $date;
        return view('admin.attend.browseAttenders',compact('results','route','eventDate'));
    }
    
    public function BrowseWorkShopAttenders($id){
        $results = AttendsWorkShop::where('work_shop_id',$id)->get();
        $route = '/admin/getBrowseWorkShopAttendersData/'.$id;
         return view('admin.attend.browseWorkShopAttenders',compact('results','route'));
    }
    
    public function getBrowseWorkShopAttendersData(Request $request,$id){
        if ($request->ajax()) {
            $data = AttendsWorkShop::where('work_shop_id',$id)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('side', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->side;
                })
                ->addColumn('job', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->job;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function getEventData(Request $request,$date)
    {
        if ($request->ajax()) {
            $data = Attend::where('datee',$date)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('mobile', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->mobile;
                })
                ->addColumn('qrcode', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->qrcode;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function getBrowseInterestedInWorkshop(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = WorkShopRegisteredMember::where('work_shop_id',$id)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('side', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->side;
                })
                ->addColumn('job', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->job;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
