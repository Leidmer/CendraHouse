<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\User;

class ConnectController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
        return view('connect.login');
    }
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages= [
            'email.required' => 'El correo electrònic és obligatori',
            'email.email' => 'Introdueix un format de correu vàlid',
            'password.required' => 'La contrasenya és obligatòria',
            'password.min' => 'La contrasenya ha de tenir un mínim de 8 caràcters'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Correu electrònic o contrasenya erronis')->with('typealert', 'danger');
        else:

            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                return redirect('/admin');
            else:
                return back()->with('message', 'Correu electrònic o contrasenya erronis')->with('typealert', 'danger');
            endif;

        endif;

    }
    public function getRegister(){
        return view('connect.register');
    }
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'lastname' => 'required',
            //Si peta canviar \App\User per users
            'email' => 'required|email|unique:\App\User,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password'
        ];

        $messages = [
            'name.required' => 'El nom és obligatori',
            'lastname.required' => 'El cognom és obligatori',
            'email.required' => 'El correo electrònic és obligatori',
            'email.email' => 'Introdueix un format de correu vàlid',
            'email.unique' => 'Ja existeix un usuari amb aquest correu',
            'password.required' => 'La contrasenya és obligatòria',
            'password.min' => 'La contrasenya ha de tenir un mínim de 8 caràcters',
            'cpassword.required' => 'La confirmació de de la contrasenya és obligatòria',
            'cpassword.min' => 'La confirmació de contrasenya ha de tenir un mínim de 8 caràcters' ,
            'cpassword.same' => 'Les contrasenyes no coincideixen'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'S´ha produit un error')->with('typealert', 'danger');
        else:
            $user = new User;
            //Amb la e fem que faci un "encode" i d'aquesta forma no poden fer servir sql injection
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            //encriptem la contrasenya amb hash
            $user->password = Hash::make($request->input('password'));

            if($user->save()):
                return redirect('/login')->with('message', 'L´usuari s´ha creat correctament')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
