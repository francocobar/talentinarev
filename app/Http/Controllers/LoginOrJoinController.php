<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class LoginOrJoinController extends Controller
{
    public function LoginOrJoin(Request $request)
     {
      $user = new User;

      $user->name =  $request->input('name');
      $user->email =  $request->input('email');

      $user->save();
      return view('welcome');
     }
}
