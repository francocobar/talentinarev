<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserDataController extends Controller
{
    public function submit(Request $request)
    {
	  if (!$request->session()->has('islogin')) {
        
      	return redirect('/#join');
      }
		
		$user = session('islogin');
		if(trim($request->input('name')) == "" || trim($request->input('shortdesc')) =="" || trim($request->input('shortdesc')) ==""  || trim($request->input('about')) == "" || trim($request->input('phone')) == "" || ($request->input('_action') == "complete" && !Input::hasFile('profilpict')))
		return "complete data";

		$user->name = $request->input('name');
		$user->shortdesc = $request->input('shortdesc');
		$user->about = $request->input('about');
		$user->phone = $request->input('phone');
		if(Input::hasFile('profilpict'))
		{
			$user->profilpict = time() . '.' . Input::file('profilpict')->getClientOriginalExtension();
			$path = 'pictures/user'.$user->id.'/';
	    	Input::file('profilpict')->move(public_path($path), $user->profilpict);
	    	if(!$user->iscompleted) 
		    { 
		    	$user->iscompleted= true; $user->completed_at = \Carbon\Carbon::now();
		    }
		}
		
		if($user->save()) {

          $request->session()->put('islogin', $user);
          //dd(session('islogin'));
         if($request->input('_action') == "complete")
		 	return redirect('/dashboard');

		 return redirect('/dashboard/update');
      }
      return "gagal";
    }

    public function dashboardaction(Request $request,$action) {
    	if (!$request->session()->has('islogin')) {
      		return redirect('/#join');
      	}
    	$user = session('islogin');
    	if($action !="update" && $action != "complete" && $action != "changepassword" && $action != "multipleupload" && $action != "uploadfileajax" && $action != "jsuploadformdata") return "404";
    	if($user->iscompleted && $action=="complete") 
		 	return redirect('/dashboard');

		 if($action == "changepassword") return view('changepassword', compact('user'));
		 if($action == "multipleupload") return view('multipleupload', compact('user'));
		 if($action == "uploadfileajax") return view('uploadfileajax', compact('user'));
		 if($action == "jsuploadformdata") return view('jsuploadformdata', compact('user'));

    	return view('complete',compact('user','action'));
    }

	public function getuserbyid(Request $request, $userid) {
		if($request->ajax()) {
			$user = User::find($userid);
			return $user; 
		}
	}
    public function changepassword(Request $request) {
    	if (!$request->session()->has('islogin')) {
      		return redirect('/#join');
      	}
    	$user = session('islogin');
    	if($request->ajax()) {

	      if($user -> password != $request->input('oldPassword'))
	      	return "password lama salah";
	      if(trim($request->input('newPassword')) == "") 
	      	{
	      		return "harap isi semua form";
			}
	      if($request->input('newPassword') != $request->input('reNewPassword'))
	      	return "password baru dan pengulangan gak match";

			$user->password = $request->input('newPassword');
			if($user->save()) {
          		$request->session()->put('islogin', $user);
				return "ganti password berhasil";
			}
			return "gagal ganti password";
	    }
    }
}
