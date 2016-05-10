<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\FileServices;

class HomeController extends Controller
{
    public function index(Request $request) {
    	$ofs = new FileServices();
    	$allusers = User::where('iscompleted',1)->skip(0)->take(6)->orderBy('completed_at','desc')->get();
    	return view('welcome',compact('allusers','ofs'));
    }

    public function getmoreuser(Request $request, $skip) {
    	$allusers = User::where('iscompleted',1)->skip($skip)->take(6)->orderBy('completed_at','desc')->get();
    	return response()->json($allusers);
    }

    //$users = DB::table('users')->skip(10)->take(5)->get();
}
