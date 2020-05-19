<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.properties.add');
    }
}
