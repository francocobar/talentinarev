<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function formcompleteorupdate($action) {
    	$user = session('islogin');
    	if($action !="update" && $action != "complete") return "404";
    	if($user->iscompleted && $action=="complete") 
		 return redirect('/dashboard');
		else if(!$user->iscompleted) 
		 return redirect('/dashboard/complete');
    	return view('complete',compact('user','action'));
    }
}
