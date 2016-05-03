<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class TesterController extends Controller
{
    public function index(Request $request) {
      $email = $request->input('email');
      $message = "Anda Telah terdaftar!";
      if($email == "franco@talenta.co")
      {
        return redirect('/dashboard');
      }
      return view('dashboard')->with('data', $request);
    }

    public function store() {
      return "tes";
    }
}
