<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class TesterController extends Controller
{
    public function index(Request $request) {
      $user = User::where('email', $request->input('email'))->first();

      if(is_null($user))
      {
          $newUser = new User;
          $newUser->email = $request->input('email');
          $newUser->password = $request->input('password');
          $newUser->save();
          $request->session()->put('islogin', $newUser);
          return redirect('/complete');
      }
      else if($user->password == $request->input('password'))
      {
          $request->session()->put('islogin', $user);
          if(!$-user->iscompleted) return redirect('/complete');
          return redirect('/dashboard');
      }

      return "salah password";
    }

    public function loginflag(Request $request) {
      if ($request->session()->has('islogin')) {
        if(!$-user->iscompleted) return redirect('/complete');
      }
      return redirect('/');
    }
}
