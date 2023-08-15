<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Errors;
use App\Http\Controllers\Controller;
use App\Models\day;
use App\Models\Invited;
use App\Models\User;
use App\Models\users_days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {//$this->middleware('permission:employees');
    }
    public function view_permission($id){
            if(1){
                $user = User::findOrFail($id);
                $permission = Permission::get();

                return view('admin.includes.permissions', compact('user', 'permission'));
        }
    }
    public function permission(){
            $user = User::findOrFail(request()->user_id);
            $user->syncPermissions(request()->permission);
            return response()->json(['success' => 'تم حفظ المعلومات بنجاح']);
        }


    public function view_days_user($id){
$user=User::where('id',$id)->first();
$user_days=users_days::where('user_id',$id)->get();
$days=day::all();

    return view('admin.Users.show_days',['user'=>$user,'user_days'=>$user_days,'days'=>$days]);
    }

    public function store_day_to_user(){
        try {


        $user=User::where('id',\request()->id)->first();
        $user_days=users_days::where('user_id',\request()->id)->delete();
        if(request()->days) {
            if (count(\request()->days) >= 1) {
                foreach (request()->days as $day)
                    users_days::create([
                        'user_id' => \request()->id,
                        'day_id' => $day,

                    ]);
            }
        }
            return response()->json(['success' => 'تمت بنجاح']);

        }catch(\Exception $e){
            return  response()->json(['errors'=>[$e->getMessage()]]);
        }

        return view('admin.Users.show_days',['user'=>$user,'user_days'=>$user_days,'days'=>$days]);
    }

    public function index()
    {$employees=User::all();
        if(request()->ajax()){
            return datatables()
                ->of($employees)
->addColumn('action', function($data){
                    $button = '<i data="'.$data->id.'" title="تعديل" class="icons_added edit bx bxs-edit font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<i data="'.$data->id.'" title="حذف" class="icons_added delete bx bx-x font-size-20 align-middle mr-1"></i>';
                    $button .= '&nbsp; &nbsp;';
                    $button .= '<i data="'.$data->id.'" title="تعديل الصلاحيات" style="color:#66c" class="font-size-20 align-middle mr-1 icons_added permission bx bx-user font-size-20 align-middle mr-1"></i>';
    $button .= '&nbsp; &nbsp;';
    if($data->isadmin==0)
    $button .= '<i data="'.$data->id.'" title="اضافة فعالية الى المستخدم"  class=" add_days font-size-20 align-middle mr-1 icons_added  bx bx-adjust font-size-20 align-middle mr-1"></i>';
    return $button;

                    return $button;


                })


                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Users.users',['days'=>day::all()]);
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
    {
        try {


        return DB::transaction(function () {
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'isadmin' => 'required',

            ];
            $form_data = [
                'name' => request()->name,
                'email' => request()->email,
                'isadmin' => request()->isadmin,
            ];

            //password
            if (!request()->password && request()->action == 'Edit') {
                $rules['password'] = '';
            } else {
                $rules['password'] = 'required|string|min:8|confirmed';
                $form_data['password'] = Hash::make(request()->password);
            }

            // email & username
            if (request()->action == 'Edit') {
                $user = User::whereId(request()->hidden_id)->first();
                if ($user->email != request()->email) {
                    $rules['email'] = 'required|string|email|max:255|unique:users';
                } else {
                    $rules['email'] = '';
                }

            }

            $error = Validator::make(request()->all(), $rules);
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            // Add Employee
            if (request()->action == 'Add')
$user=                User::create($form_data);
$id=$user->id;
            $user->givePermissionTo('inviteds');
            $user->givePermissionTo('employees');
            $user->givePermissionTo('days');
            $user->givePermissionTo('qrcode');
            $user->givePermissionTo('places');
            $user->givePermissionTo('conf');
            $user->givePermissionTo('presence');

            if(request()->days)
               {foreach (request()->days as $day )
                   users_days::create([
                      'user_id'=>$id,
                       'day_id'=>$day,

                   ]);
               }

            // Edit Employee
            else
                User::whereId(request()->hidden_id)->update($form_data);
            return response()->json(['success' => 'تم حفظ المعلومات بنجاح']);
        });
    }
catch (\Exception $ex){
             return response()->json(['errors' => $ex->getMessage()]);

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
    public function addper()
    {
        $permission = Permission::create(['name' => 'presence']);

    }
    public function edit(string $id)
    {
        $item=User::findorfail($id);
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
users_days::where('user_id',$id)->delete();
User::findorfail($id)->delete();
return response()->json(['success'=>'تمت']);
    }
}
