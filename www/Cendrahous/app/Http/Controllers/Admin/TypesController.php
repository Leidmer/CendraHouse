<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Str;

use App\Http\Models\Type;

class TypesController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.types.home');
    }

    public function postTypeAdd(Request $request){
        $rules = [
            'name' => 'required',
            'icon' => 'required',
        ];
        $messages = [
            'name.required' => 'El nom del tipus es obligatori',
            'icon.required' => 'La icona es obligatòria'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'S´ha produit un error')->with('typealert', 'danger');
        else:
            $t = new Type;
            $t->module = $request->input('module');
            //Aquesta e un altre cop, serveix perque guardi el que nosaltres posem sense executar-ho com a codi
            $t->name = e($request->input('name'));
            $t->slug = Str::slug($request->input('name'));
            $t->icona = e($request->input('icon'));
            if($t->save()):
                return back()->with('message', 'S´ha guardat correctament')->with('typealert', 'success');
            endif;
        endif;
    }
}
