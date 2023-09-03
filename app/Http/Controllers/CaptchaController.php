<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function index(){
        return view ('index');
    }
    public function post(Request $request){
        $request->validate([
            'email'  => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);
        return view('Cert_type.index');
    }
}
