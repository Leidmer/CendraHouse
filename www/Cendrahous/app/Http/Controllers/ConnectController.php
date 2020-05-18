<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ConnectController extends Controller
{
    public function getLogin(){
        return view('connect.login');
    }
    public function getRegister(){
        return view('connect.register');
    }
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:\App\User,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'S´ha produit un error')->with('typealert', 'danger');
        else:
        endif;
    }
}
