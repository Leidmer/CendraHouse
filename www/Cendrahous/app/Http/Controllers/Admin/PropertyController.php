<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Type, App\Http\Models\Property;



use Validator, Str;

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

    public function postPropertyAdd(Request $request){
        $rules = [
            'name' => 'required',
            'n_rooms' => 'required',
            'n_baths' => 'required',
            'img' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'name.required' => 'El nom de la propietat és obligatori',
            'n_rooms.required' => 'El número d´habitacions és obligatori',
            'n_baths.required' => 'El número de banys és obligatori',
            'img.required' => 'La imatge és obligatòria',
            'img.image' => 'L´arxiu no és una imatge',
            'price.required' => 'El preu és obligatori',
            'content.required' => 'La descripció és obligatòria'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'S´ha produit un error')->with('typealert', 'danger')->withInput();
        else:
            $property = new Property;
            //Si la propietat està posada en 0 és un borrador i si es 1 està publicada
            $property->status = '0';
            $property->name = e($request->input('name'));
            $property->slug = Str::slug($request->input('name'));
            $property->n_rooms = $request->input('n_rooms');
            $property->n_baths = $request->input('n_baths');
            $property->type_id = $request->input('type');
            $property->image = "image.png";
            $property->price = $request->input('price');
            $property->in_discount = $request->input('indiscount');
            $property->discount = $request->input('discount');
            $property->content = e($request->input('content'));
            if($property->save()):
                return redirect('/admin/properties')->with('message', 'S´ha guardat correctament')->with('typealert', 'success');
            endif;
        endif;
    }
}
