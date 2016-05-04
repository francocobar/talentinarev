<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      if(!$user->iscompleted) 
      {
      		
      		return "not complete";
      }
      else
      {
      		return "complete";
      }
    }
}
