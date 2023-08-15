<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Validator;
use Auth;
use DB;
use Exception;
use Mail;

use App\Exports\InvitedsExport;

use App\Helpers\Errors;
use App\Models\Invited;
use App\Models\Day;

use  App\Helpers\DayConfig;

class HomeController extends Controller
{
    public function __construct()
    {
    }
 public function viewprofile()
 {$user= \App\Models\User::findorfail(\Illuminate\Support\Facades\Auth::user()->id);
     return view('admin.Users.profile',['admin'=>$user]);
 }
    public function export(){
        // filter results
        $invitation_type = request()->invitation_type;
        $isPresence = request()->isPresence;
        $day_id = request()->day_id;

return new InvitedsExport( $invitation_type, $isPresence,$day_id);

    }

    public function index(){
        $day = $this->getdays();

            $day_id = null;
            $days = $this->getdays();
             $num_days =count( $days);

        if(request()->ajax()){
            $day_id = request()->day_id;
            $page = 'admin.includes.homecharts';
            $days = [];
            $num_days = 0;
        }
        else{
            $page = 'test';
        }

        $info = self::getInvitedsInfo($day_id);
        $num_invited = $info['num_invited'];
        $inviteds = $info['inviteds'];
        $registered = $info['registered'];
        $confirmed = $info['confirmed'];
        $apology = $info['apology'];
        $under_study = $info['under_study'];
        $sentConfirm = $info['sentConfirm'];
        $sentWaiting = $info['sentWaiting'];

        $invitation_type = [$inviteds, $registered];
        $registrations = [$confirmed, $apology];
        $sendInvitations = [$sentConfirm, $sentWaiting];
        return view($page, compact('registrations', 'invitation_type', 'sendInvitations', 'days', 'num_invited', 'num_days', 'day_id'));

    }

    public function getInvitedsInfo($day_id = null){
        if($day_id && $day_id> 0){
            $num_invited = Invited::where('day_id', $day_id)->count();

            // invitation_type
            $inviteds = Invited::where('day_id', $day_id)->where('invitation_type', '2')->count();
            $registered = Invited::where('day_id', $day_id)->where('invitation_type', '1')->count();

            //registered
            $confirmed = Invited::where('day_id', $day_id)->where('invitation_type', '1')->where('isPresence', 1)->count();
            $apology = Invited::where('day_id', $day_id)->where('invitation_type', '1')->where('isPresence', 0)->count();
            $under_study = Invited::where('day_id', $day_id)->where('invitation_type', '1')->where('isPresence', 0)->count();

            // Send Invitations Confirm
            $sentConfirm = Invited::where('day_id', $day_id)->where('invitation_type', '2')->where('isPresence', 1)->count();
            $sentWaiting = Invited::where('day_id', $day_id)->where('invitation_type', '2')->where('isPresence', 0)->count();
        }
        else{
            $num_invited = Invited::all()->count();

            // invitation_type
            $inviteds = Invited::where('invitation_type', '2')->count();
            $registered = Invited::where('invitation_type', '1')->count();

            //registered
            $confirmed = Invited::where('invitation_type', '1')->where('isPresence', 1)->count();
            $apology = Invited::where('invitation_type', '1')->where('isPresence', 0)->count();
            $under_study = Invited::where('invitation_type', '1')->where('isPresence', 0)->count();

            // Send Invitations Confirm
            $sentConfirm = Invited::where('invitation_type', '2')->where('isPresence', 1)->count();
            $sentWaiting = Invited::where('invitation_type', '2')->where('isPresence', 0)->count();
        }

        return [
            'num_invited' => $num_invited,
            'inviteds' => $inviteds,
            'registered' => $registered,
            'confirmed' => $confirmed,
            'apology' => $apology,
            'under_study' => $under_study,
            'sentConfirm' => $sentConfirm,
            'sentWaiting' => $sentWaiting,
        ];
    }
}
