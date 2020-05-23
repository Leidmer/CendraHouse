<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Type, App\Http\Models\Property, App\Http\Models\PGallery;

class DashboardController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        //$this->middleware('isadmin');
    }

    public function getDashboard(){
                //Si canviem el numero de paginate podem mostrar que hi ha paginació
                $properties = Property::with(['cat'])->orderBy('id', 'desc')->paginate(25);
                $data = ['properties' => $properties];
                return view('admin.dashboard', $data);
    }
}
