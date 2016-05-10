<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
class LoginOrJoinController extends Controller
{
    public function index(Request $request) {
      $messages = [
          'required' => ':attribute harus diisi',
          'email' => 'isi email yang valid'
      ];
      $v = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required',
      ],$messages);
      if ($v->fails()) {
            return redirect('/#join')
                        ->withErrors($v)
                        ->withInput();
        }
      $user = User::where('email', $request->input('email'))->first();

      if(is_null($user))
      {
          $newUser = new User;
          $newUser->email = $request->input('email');
          $newUser->password = $request->input('password');
          $newUser->save();
          $request->session()->put('islogin', $newUser);
          return redirect('/dashboard/complete');
      }
      else if($user->password == $request->input('password'))
      {
          $request->session()->put('islogin', $user);
          if(!$user->iscompleted) return redirect('/dashboard/complete');
          return redirect('/dashboard');
      }

      return view('login')->with([
  		'email' => $request->input('email'),
  		'message' => 'salah password'
  		]);
    }

    public function loginflag(Request $request) {
      if ($request->session()->has('islogin')) {

        $user = session('islogin');
        if(!$user->iscompleted) return redirect('/dashboard/complete');
          return view('dashboard') ->with('user', $user);  
      }
      return redirect('/#join');
    }
}
