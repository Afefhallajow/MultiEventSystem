<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\Attend;
use App\Models\Category;
use App\Models\Company;
use Str;
use Session;
use Storage;

class VisitorController extends Controller
{
    public function index(){
        return view('admin.visitor.index');
    }

    public function showVisitors(){
        return view('admin.visitor.show');
    }

    public function indexExheb(){
        return view('admin.exheb.index');
    }

    public function showExheb (){
        return view('admin.exheb.show');
    }

    public function print(){ 
        return view('admin.visitor.print');
    }

    public function printBadge($withImage,$code){
$member = member::where('code',$code)->first();

        
        if($member){
            // $company = Company::where('id',$member->company_id)->first();
            // $category = Category::where('id',$company->category_id)->first();
            // $badgeLink = url('storage/app/public/badge/'.$category->badge_image);
            
            // $textColor = $category->textColor;
        
            // list($r, $g, $b) = sscanf($textColor, "#%02x%02x%02x");
        
            // $brColor = [$r,$g,$b];
            
            
            // return view('badge',compact('member','badgeLink','textColor','company','brColor'));
            return view('printBadge',compact('member'));
        }
        else{
            return 'This Link is Unavailable';
        }
    }

    public function store(Request $request){
        $code = Str::random(40);

        $fileName = null;
        if($request->file('passportImage')){
            $file = $request->file('passportImage');
            $fileName   = Str::random(7).'.'. $file->getClientOriginalExtension();
            Storage::disk('public')->put('passportImages/'.$fileName,file_get_contents($file));    
        }
        $check = member::where('email',$request->email)->first();
        if($check){
            Session::flash('msg', 'البريد الالكتروني مستخدم من قبل شخص آخر'); 
        
            return redirect()->back();
        }
        $newmember = member::create([
            'name' => $request->name,
            'mobile' => $request->code . $request->mobile,
            'email' => $request->email,
            'side' => $request->company,
            'job' => $request->position,
            'nationality' => $request->nationality,
            'address' => $request->country,
            'howYouKnow' => $request->know_from,
            'member' => $request->member,
            'inBahreen' => $request->inBahreen, 'code' => $code,
            'gender' => $request->gender,
            'passportImage' => $fileName,
            'badgeName' => $request->badgeName,
            'badgeSide' => $request->badgeSide,
            'badgeJob' => $request->badgeJob,
            'qrcode' => random_int(100000, 999999),
            'status' => ($request->member == 'No' && $request->inBahreen == 'No' ) ? '0' : '1'
        ]);
        
        $mytime = \Carbon\Carbon::now();
        Attend::create([
            'member_id' => $newmember->id,
            'datee' => $mytime->toDateString(),
        ]);
        
        
        $link = url('/badge'.'/'.$newmember->code);
        $needVisa = 0;
        if($request->member == 'No' && $request->inBahreen == 'No' ){
            $needVisa = 1;
        }else{
            $needVisa = 2;
        }
        $data = array('memberEmail' => $request->email,'link' => $link,'needVisa' => $needVisa);
            
        Mail::send('email.welcome',$data,function($m) use($data){
            $m->from('info@event-reg.app');
            $m->to($data['memberEmail'])->subject('Thanks For Registration!');
        });

        if($newmember)
            return $newmember;
        
        return false;
    }

    public function storeExheb(Request $request){
        $code = Str::random(40);
        $newmember = member::create([
            'name' => $request->name,
            'badgeName' => $request->name,
            'mobile' => '-',
            'email' => $code,
            'type' => $request->type,
            'badgeSide' => $request->company,
            'badgeJob' => $request->position,
            'nationality' => '-',
            'address' => $request->country,
            'howYouKnow' => '-',
            'member' => '-',
            'inBahreen' => '-',
            'code' => $code,
            'qrcode' => random_int(100000, 999999)
        ]);

        if($newmember)
            return $newmember;
       
        return false;
    }

}
