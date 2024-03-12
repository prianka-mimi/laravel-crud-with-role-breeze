<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use carbon\Carbon;
use Session;
use Auth;
use Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("superadmin");
    }
    public function index(){
        $allUser=User::orderBy('id','desc')->get();
        return view('admin.user.all-user',compact('allUser'));
    }
    public function add(){
        return view('admin.user.add-user');
    }
    public function edit(){
        return view('admin.user.edit-user');
    }
    public function view($id){
        $data=User::where('id',$id)->firstOrFail();
        return view('admin.user.view-user',compact('data'));
    }
    public function insert(Request $request){

        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|email|unique:users|max:50',
            'username'=> 'required',
            'password'=> 'required',
            'confirmPassword'=> 'required|same:password',
            'role'=> 'required',
        ],[
            'name.required'=> 'Please enter user name',
            'email.required'=> 'Please enter user email',
            'username.required'=> 'Please enter user username',
            'password.required'=> 'Please enter user password',
            'confirmPassword.required'=> 'Please enter user confirm password',
            'role.required'=> 'Please enter user role',
        ]);

        $insert=User::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'username'=>$request['username'],
            'password'=>Hash::make($request['password']),
            'role'=>$request['role'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName=$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            'Image'::make($image)->save('uploaded_images/users/'.$imageName);

            User::where('id', $insert)->update([
                'photo'=> $imageName,
            ]);
        }

        if($insert){
            Session::flash('success','Successfully registered User Information');
            return redirect('dashboard/user');
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/user/add');
        }

    }
}
