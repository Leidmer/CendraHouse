<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Property, App\User;

class ApiController extends Controller
{
    public function indexUsers(){
        return response()->json(User::all());
    }

    public function indexProperties(){
        return response()->json(Property::all());
    }
}
