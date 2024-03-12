<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;

class RecycleBinController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        $this->middleware("superadmin");
    }
    public function index(){
        return view("admin.recycle.recycle");
    }
    public function user(){
        $allUser=User::where('ban_status',0)->orderBy('ban_id','desc')->get();
        return view("admin.recycle.user-recycle",compact('allUser'));
    }
    public function banner(){
        $allUser=Banner::where('ban_status',0)->orderBy('ban_id','desc')->get();
        return view("admin.recycle.banner-recycle",compact('allUser'));
    }
}
