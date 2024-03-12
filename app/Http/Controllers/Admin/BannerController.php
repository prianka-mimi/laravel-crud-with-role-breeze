<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class BannerController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("admin");
    }
    public function index(){
        $allUser=Banner::where('ban_status',1)->orderBy('ban_id','desc')->get();
        return view('admin.banner.all-user',compact('allUser'));
    }
    public function add(){
        return view('admin.banner.add-user');
    }
    public function edit($slug){
        $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.edit-user',compact('data'));
    }
    public function view($slug){
        $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.view-user',compact('data'));
    }
    public function insert(Request $request){

        $this->validate($request,[
            'title'=> 'required',
            'subtitle'=> 'required',
            'button'=> 'required',
            'pic'=> 'required',
        ],[
            'title.required'=> 'Please enter banner title',
            'subtitle.required'=> 'Please enter banner subtitle',
            'button.required'=> 'Please enter banner button',
            'pic.required'=> 'Please enter banner Image',
        ]);

        $slug='A'.uniqid(20);
        $creator=Auth::user()->id;

        $insert=Banner::insertGetId([
            'ban_title'=>$request['title'],
            'ban_subtitle'=>$request['subtitle'],
            'ban_button'=>$request['button'],
            'ban_url'=>$request['url'],
            'ban_creator'=>$creator,
            'ban_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName=$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            'Image'::make($image)->save('uploaded_images/banners/'.$imageName);

            Banner::where('ban_id', $insert)->update([
                'ban_image'=> $imageName,
            ]);
        }

        if($insert){
            Session::flash('success','Successfully uploded Banner Information');
            return redirect('dashboard/banner');
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/banner/add');
        }
    }
    public function update(Request $request){

         $this->validate($request,[
            'title'=> 'required',
            'subtitle'=> 'required',
            'button'=> 'required',
        ],[
            'title.required'=> 'Please enter banner title',
            'subtitle.required'=> 'Please enter banner subtitle',
            'button.required'=> 'Please enter banner button',
        ]);

        $slug=$request['slug'];
        $id=$request['id'];
        $editor=Auth::user()->id;

        $update=Banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_title'=>$request['title'],
            'ban_subtitle'=>$request['subtitle'],
            'ban_button'=>$request['button'],
            'ban_url'=>$request['url'],
            'ban_editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName=$id.'-'.time().'.'.$image->getClientOriginalExtension();
            'Image'::make($image)->save('uploaded_images/banners/'.$imageName);

            Banner::where('ban_id', $id)->update([
                'ban_image'=> $imageName,
            ]);
        }

        if($update){
            Session::flash('success','Successfully update Banner Information');
            return redirect('dashboard/banner/view/'.$slug);
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/banner/edit/'.$slug);
        }
    }
    public function softdelete(){

        $id=$_POST['modal_id'];
        $softdelete=Banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_status'=> 0,
        ]);

        if($softdelete){
            Session::flash('success','Successfully delete Banner Information');
            return redirect('dashboard/banner');
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/banner');
        }
    }
    public function restore(){

        $id=$_POST['modal_id'];
        $restore=Banner::where('ban_status',0)->where('ban_id',$id)->update([
            'ban_status'=> 1,
        ]);

        if($restore){
            Session::flash('success','Successfully restore Banner Information');
            return redirect('dashboard/recycle/banner');
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/recycle/banner');
        }
    }
    public function delete(){

        $id=$_POST['modal_id'];
        $delete=Banner::where('ban_status',0)->where('ban_id',$id)->delete();

        if($delete){
            Session::flash('success','Successfully delete Banner Information');
            return redirect('dashboard/recycle/banner');
        }
        else{
            Session::flash('error','Opps ! Someting Wrong. Please try again');
            return redirect('dashboard/recycle/banner');
        }

    }
}
