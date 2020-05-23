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
        //$this->middleware('isadmin');
    }

    public function getHome($module){
        $cats = Type::where('module', $module)->orderBy('name', 'Asc')->get();
        $data = ['cats' => $cats];
        return view('admin.types.home', $data);
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

    public function getTypeEdit($id){
        $cat = Type::find($id);
        $data = ['cat' => $cat];
        return view('admin.types.edit', $data);
    }

    public function postTypeEdit(Request $request, $id){
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
            $t = Type::find($id);
            $t->module = $request->input('module');
            //Aquesta e un altre cop, serveix perque guardi el que nosaltres posem sense executar-ho com a codi
            $t->name = e($request->input('name'));
            //Aquest slug en la part d'editar el podem eliminar si dona problemes més endavant ja que ja el fem al afegir
            $t->slug = Str::slug($request->input('name'));
            $t->icona = e($request->input('icon'));
            if($t->save()):
                return back()->with('message', 'S´ha guardat correctament')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getTypeDelete($id){
        $t = Type::find($id);
        if($t->delete()):
            return back()->with('message', 'S´ha eliminat correctament')->with('typealert', 'success');
        endif;
    }
}
