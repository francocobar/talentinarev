<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginOrJoinController extends Controller
{
    public function LoginOrJoin(Request $request)
     {
         $email = $request->input('email');

         return ($email);
     }
}
