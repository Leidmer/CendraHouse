<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Property, App\User;

class ApiController extends Controller
{

    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }
    
    public function indexUsers(){
        return response()->json(User::all());
    }

    public function indexProperties(){
        return response()->json(Property::all());
    }
}
