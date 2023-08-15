<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Remittance;
use App\Models\member;
use App\Models\Category;
use App\Models\Company;
use Str;
use Session;
use Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MemberController extends Controller
{

    public function saveMedicalData(Request $request){
                    $checkMail = member::where('email',$request->email)->first();

                    if($checkMail)
                        return '<p style="font-size:4vw;color:red;width:100%;margin: 5rem auto;text-align:center">البريد الالكتروني مستخدم من قبل شخص آخر</p>';

                    $code = '1'.Str::random(39);

                    $member = member::create([
                        'company_id' => $request->company_id,
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'email' => ($request->email != null) ? $request->email : '',
                        'side' => '-',
                        'howYouKnow' => '-',
                        'code' => $code,
                        'type' => 0,
                        'national_id_number' => $request->national_id_number,
                        'qrcode' => random_int(100000, 999999),
                    ]);


                    return redirect('/badge'.'/'.$member->code);



    }

    public function save(Request $request){


        $code =                     $code = Str::random(39);
$arr= member::all()->orderBy('id', 'DESC');
if($arr[0]->qrcode > 5000 )
{
    $qrcod=1;
}else
    $qrcod=$arr[0]->qrcode+1;
        $member = member::create([
            'name' => $request->first_name.' '.$request->last_name,
            'mobile' => '966'.$request->mobile,
            'email' => $request->email,
            'employee_no' => $request->employee_no,
            'code' => $code,
            'qrcode' => $qrcod,
        ]);

        $link = url('/badge'.'/'.$member->code);

        $data = array('memberEmail' => $member->email,'link' => $link,'member' => $member);

        if(filter_var($member->email, FILTER_VALIDATE_EMAIL) !== false){
            Mail::send('email.index',$data,function($m) use($data){
                 $m->to($data['memberEmail'])->subject('Thanks For Registration!');
            });
        }
        try {
            $token="jpba8gspyccy6c8h"; // Ultramsg.com token
            $instance_id="instance26715"; // Ultramsg.com instance id
            $client = new WhatsAppApi($token,$instance_id);

            $to=$member->mobile;
            $name1=' عزيزنا '.': '.$member->name;

            $row1="تم التسجيل بنجاح";
            $row2='الرقم المرجعي لتسجيلك: '.$member->qrcode;
            $row3='لتحميل البادج اضغط على الرابط: ';
            $row4=$link;

            $body=$name1.PHP_EOL.$row1.PHP_EOL.$row2.PHP_EOL.$row3.PHP_EOL.$row4;
            $api=$client->sendChatMessage($to,$body);
        }
catch (\Exception $e)
{

}
        return redirect()->route('success',$member->id);

    }

    public function bankDetailsView($code){
        $code = member::where('code',$code)->first();
        if($code)
            return view('bankDetails',compact('code'));
        else
            return 'This Link Unavailable';
    }

    public function savebankDetailsView(Request $request,$code){
        $code = member::where('code',$code)->first();
        $fileName = null;
        if($request->file('remittanceFile')){
                $file = $request->file('remittanceFile');
                $fileName   = Str::random(7).'.'. $file->getClientOriginalExtension();
                Storage::disk('public')->put('remittances/'.$fileName,file_get_contents($file));
        }

        Remittance::create([
            'memeber_id' => $code->id,
            'money' => $request->money,
            'sender' => $request->sender,
            'datee' => $request->datee,
            'bank' => $request->bank,
            'remittanceFile' => $fileName
        ]);

        return view('success');
    }

    public function badgeView($code){
        $member = member::where('code',$code)->first();


        if($member){
            // $company = Company::where('id',$member->company_id)->first();
            // $category = Category::where('id',$company->category_id)->first();
            // $badgeLink = url('storage/app/public/badge/'.$category->badge_image);

            // $textColor = $category->textColor;

            // list($r, $g, $b) = sscanf($textColor, "#%02x%02x%02x");

            // $brColor = [$r,$g,$b];


            // return view('badge',compact('member','badgeLink','textColor','company','brColor'));
            return view('badge',compact('member'));
        }
        else{
            return 'This Link is Unavailable';
        }

    }

    public function registrationView(){

        $allowed = true;

        return view('welcome',compact('allowed'));

        abort(404);
    }

    public function medicalRegistrationView(){
        return view('welcomeMedical');
    }

    public function checkEmail($email){
        // $member = member::where('email',$email)->first();
        // if($member)
        //     return false;
        return true;
    }

    public function fixIssue($code)
    {
        $member = member::where('code',$code)->first();
        return view('fixIssues',compact('member'));
    }


    public function postFixIssue(Request $request)
    {

        $code = Str::random(40);

        if($request->file('image')){
            $personalfile = $request->file('image');
            $personalfileName = $code.'.'.$personalfile->getClientOriginalExtension();
            Storage::disk('public')->put('personal/'.$personalfileName,file_get_contents($personalfile));

        }

         member::where('code',$request->code)->update([
            'image' => $personalfileName,
            'type' => 'UnderProcess'
        ]);

        return redirect()->back();

    }
    public function prizzes1()
    {
        $winner=Winner::all();
$i=0;
        return view('prizzess',compact(['winner','i']));

    }
    public function prizzes()
    {

        $prizes = \App\Models\Prize::with('winners')->get();
        $attenders = \App\Models\Attend::pluck('member_id');
        $ids = \App\Models\Winner::where('member_id','!=',null)->pluck('member_id');

        $cusers = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->count();
       /**
        if($cusers == 0)
            $users = [];
        else
            $users = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->get();
**/
       for($i=1;$i<=1500;$i++)
       {
           $users[$i]=$i;
       }
     return json_encode($users);
        return view('prizzess',compact(['prizes','users']));
    }


    public function setWinner($prize_id,$winner_order,$winner_id)
    {
        \App\Models\Winner::where('prize_id',$prize_id)->where('winner_order',$winner_order)->update([
            'member_id' => $winner_id
        ]);

        $attenders = \App\Models\Attend::pluck('member_id');
        $ids = \App\Models\Winner::where('member_id','!=',null)->pluck('member_id');

        $cusers = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->count();
        if($cusers == 0)
            $users = [];
        else
            $users = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->get();

        return $users;
    }

    public function resetWinner($prize_id,$winner_order)
    {
        \App\Models\Winner::where('prize_id',$prize_id)->where('winner_order',$winner_order)->update([
            'member_id' => null
        ]);

        $attenders = \App\Models\Attend::pluck('member_id');

        $ids = \App\Models\Winner::where('member_id','!=',null)->pluck('member_id');

        $cusers = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->count();
        if($cusers == 0)
            $users = [];
        else
            $users = \DB::table('members')->whereIn('id',$attenders)->whereNotIn('id',$ids)->inRandomOrder()->get();

        return $users;
    }

    // public function testEmail(){
    //       $data = array('memberEmail' => 'drghamdakhol@gmail.com','link' => '/testttttt','needVisa' => 0);


    //         Mail::send('email.welcome',$data,function($m) use($data){
    //              $m->from('Registration@roshandubai.com');
    //              $m->to($data['memberEmail'])->subject('Thanks For Registration!');
    //         });
    // }
}
