<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    //Per mostrar els usuaris ordenats per ID amb un maxim de 25, si hi han 26 surt per poder canviar de pagina
    public function getUsers($status){
        if($status == 'all'):
            $users = User::orderBy('id', 'Desc')->paginate(5);
        else:
            $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(25);
        endif;
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    //Per editar l'usuari
    public function getUserEdit($id){
        $u = User::findOrFail($id);
        $data = ['u' => $u];
        return view('admin.users.user_edit', $data);
    }

    //Si l'status de l'usuari es 1 está confirmat i activat, per tant es pot fer servir, però si és 100 està banejat i no pot fer login
    public function getUserBanned($id){
        $u = User::findOrFail($id);
        if($u->status == "100"):
            $u->status = "1";
            $msg ="L'usuari ha estat activat";
        else:
            $u->status = "100";
            $msg ="L'usuari ha estat suspès correctament";
        endif;

        if($u->save()):
            return back()->with('message', $msg)->with('typealert', 'success');
        endif;
    }
}
