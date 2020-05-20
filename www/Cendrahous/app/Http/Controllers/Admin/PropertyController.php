<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Type;

class PropertyController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        //Aquesta part la comentem perque els usuaris puguin accedir també a crear propietats i no només l'admin, descomentar per restringir accés
        //$this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.properties.home');
    }

    public function getPropertyAdd(){
        $cats = Type::where('module', '0')->pluck('name', 'id');
        $data = ['cats' => $cats];
        return view('admin.properties.add', $data);
    }
}
