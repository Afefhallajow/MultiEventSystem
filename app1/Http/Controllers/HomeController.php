<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\Attend;
use App\Models\AttendsWorkShop;
use App\Models\Company;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use DataTables;
use Storage;
use Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FestivalExport;
use App\Exports\WorkShopExport;
use App\Exports\AllRegisteredExport;
use App\Exports\AllRegisteredExportInWorkshop;
use App\Exports\InterestedInWorkShop;
use App\Models\WorkShopRegisteredMember;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $underProcess = member::where('type','UnderProcess')->count();
        $confirmed = member::where('type','Confirmed')->count();
        $rejected = member::where('type','Rejected')->count();
        $members = member::count();
        $attenders = Attend::count();
        
        return view('home',compact('members','attenders'));
    }
    public function register_member()
    {
        return view('admin.visitor.register_member');
    }
    public function register_member_post(Request $request)
    {
        $code = Str::random(40);
        
        $member = member::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'city' => $request->city,
            'howYouKnow' => $request->howYouKnow,
            'code' => $code,
            'type' => 1,
            'hospital' => $request->hospital,
            'qrcode' => random_int(100, 10000),
        ]);
        return redirect('admin/print/printBadge/0/'.$code);
    }
    

    public function index2()
    {
        return view('remittance');
    }
    
    public function visaIndex()
    {
        return view('visa');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = member::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getExhebsData(Request $request)
    {
        if ($request->ajax()) {
            $data = member::where('type',1)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function getVisaMembers(Request $request)
    {
        if ($request->ajax()) {
            $data = member::where([
                ['member','=','No'],
                ['inBahreen','=','No'],
            ])->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function getRemittance(Request $request)
    {
        if ($request->ajax()) {
            $data = Remittance::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->editColumn('memeber_id', function($q){
                   $member = member::where('id',$q->memeber_id)->first();
                   return $member->name;
                })
                ->editColumn('datee', function($q){
                $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $q->datee)->format('d/m/Y');

                return $newDate;
                })
                ->editColumn('is_accept', function($row){
                   if($row->is_accept == 0)
                     return 'لم يتم التأكيد بعد';
                   if($row->is_accept == 1)
                     return 'يحتاج الفيزا لإكمال التأكيد';
                
                   return 'تم التأكيد';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getAll(Request $request)
    {
        if ($request->ajax()) {
            $data = member::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function destroy($id){
        $member = member::find($id);
        WorkShopRegisteredMember::where('member_id',$id)->delete();
       
        Attend::where('member_id',$id)->delete();
        AttendsWorkShop::where('member_id',$id)->delete();
        if($member->passportImage != null)
            Storage::disk('public')->delete('passportImages/'.$member->passportImage);
        $member->delete();
     
 // Company::find($member->company_id)->decrement('registered_count');
        return true;
    }

    public function destroyRemittance($id){
        $memberRemittance = Remittance::where('id',$id)->first();
        $memberRemittance->delete();
        return true;
    }

    public function approve($id){
        $remittance = Remittance::where('id',$id)->first();
        $member = member::find($remittance->memeber_id);
        $needVisa = 0;
        if($member->member == 'No' && $member->inBahreen == 'No' ){
            $needVisa = 1;
            $remittance->update([
                'is_accept' => 1
            ]);
        }else{
            $needVisa = 2;
            $remittance->update([
                'is_accept' => 2
            ]);
        }
        

       
        $link = url('/badge'.'/'.$member->code);
        $data = array('memberEmail' => $member->email,'link' => $link,'needVisa' => $needVisa);

        Mail::send('email.confirm',$data,function($m) use($data){
            $m->from('info@beloteroevent.com');
            $m->to($data['memberEmail'])->subject('Confirmation Email!');
        });

        return true;
        
    }
    
    public function addVisa(Request $request,$id){
        $fileName = null;
        if($request->file('visaFile')){
            $file = $request->file('visaFile');
            $fileName   = Str::random(30).'.'. $file->getClientOriginalExtension();
            Storage::disk('public')->put('Visa/'.$fileName,file_get_contents($file));    
        }
        
        member::where('id',$id)->update([
                'visaFile' => $fileName,
                'status' => 1
        ]);
        
        $member = member::where('id',$id)->first();
        
        $link = 'https://festival-gcc.org/storage/app/public/Visa/'.$fileName;
        $data = array('memberEmail' => $member->email,'link' => $link);
        
        Mail::send('email.visaMail',$data,function($m) use($data){
            $m->from('info@beloteroevent.com');
            $m->to($data['memberEmail'])->subject('Visa Confirmation Email!');
        });
        
        return redirect()->back();
    }
    
    public function allUsers(){
        $users = User::all();
        
        return view('admin.users.index',compact('users'));
    }
    
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function destroyUser($id){
        $member = User::find($id);
        WorkShopRegisteredMember::where('member_id',$id)->delete();
        Attend::where('member_id',$id)->delete();
        AttendsWorkShop::where('member_id',$id)->delete();
        $member->delete();
        
        return true;
    }
    
    public function showVisitor($id){
        $member = member::where('id',$id)->first();
        
        return view('admin.visitor.showVisitor',compact('member'));
    }
    
    public function resendVisa($id){
        $member = member::where('id',$id)->first();

        
        if($member->visaFile != null){
            $link = 'https://festival-gcc.org/storage/app/public/Visa/'.$member->visaFile;
            $data = array('memberEmail' => $member->email,'link' => $link);
            Mail::send('email.visaMail',$data,function($m) use($data){
                $m->from('info@beloteroevent.com');
                $m->to($data['memberEmail'])->subject('Visa Confirmation Email!');
            });
            
            return true;
        }
        
        return false;
        

    }
    
    public function exportByDate($date){
        return Excel::download(new FestivalExport($date), 'Visitor-'.$date.'.xlsx');
    }
    
    public function exportByWorkShop($id){
        return Excel::download(new WorkShopExport($id), 'WorkShopVisitors--'.$id.'.xlsx');
    }
    
    public function exportInterestedInWorkShop($id){
        return Excel::download(new InterestedInWorkShop($id), 'WorkShopInterestedVisitors--'.$id.'.xlsx');
    }
    
    public function exportAllRegistered(){
        return Excel::download(new AllRegisteredExport(), 'Registered.xlsx');
    }
    
    public function exportAllRegisteredInWorkShops(){
        return Excel::download(new AllRegisteredExportInWorkshop(), 'Registered.xlsx');
    }
    
    public function confirm($qrcode)
    {
        $member = member::where('qrcode',$qrcode)->first();
        $company = Company::where('id',$member->company_id)->first();
        if(!$member) abort(404);
        
        $link = route('vis.badge',['code' => $member->code]);
        $data = array('memberEmail' => $member->email,'link' => $link,'msg' => 'Confirm','member' => $member,'company' => $company);
        
                $confirmed = member::where('type','Confirmed')->count();
        $rejected = member::where('type','Rejected')->count();
        $member->type = 'Confirmed';
        $member->save();
        Mail::send('email.index',$data,function($m) use($data){
            $m->to($data['memberEmail'])->subject('Confirmation Email!');
        });
        
        return true;
    }
    
    public function reject($qrcode)
    {
            $member = member::where('qrcode',$qrcode)->first();
            if(!$member) abort(404);
            
            $link = route('vis.fixIssue',['code' => $member->code]);
            $data = array('memberEmail' => $member->email,'link' => $link,'msg' => 'Reject','member' => $member);
            
            $member->type = 'Rejected';
            $member->save();
                    
            Mail::send('email.index',$data,function($m) use($data){
                $m->to($data['memberEmail'])->subject('Reject Email!');
            });
            
            return true;
    }
    
    
    public function rejectAllRegistration($qrcode)
    {
            $member = member::where('qrcode',$qrcode)->first();
            if(!$member) abort(404);
            
            $data = array('memberEmail' => $member->email,'member' => $member);
            
            $member->type = 'Rejected';
            $member->save();
                    
            Mail::send('email.reject_all',$data,function($m) use($data){
                $m->to($data['memberEmail'])->subject('Reject Email!');
            });
            
            return true;
    }
    
}
