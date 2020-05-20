<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Models\Type, App\Http\Models\Property;



use Validator, Str, Config, Image;

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
            $path = '/'.date('Y-m-d'); // 2020-05-20 Per exemple
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            //Amb slug eliminem els espais i caracters especials del nom de l'arxiu
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            //amb aquesta linia fem que si pujo un altre arxiu amb el mateix nom no el substitueix ja que li posa un nom aleatori, com a més es guarda en una carpeta diferent
            //per cada dia hi han menys probabilitats de que falli
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;
            $file_file = $upload_path.'/'.$path.'/'.$filename;

            $property = new Property;
            //Si la propietat està posada en 0 és un borrador i si es 1 està publicada
            $property->status = '0';
            $property->name = e($request->input('name'));
            $property->slug = Str::slug($request->input('name'));
            $property->n_rooms = $request->input('n_rooms');
            $property->n_baths = $request->input('n_baths');
            $property->type_id = $request->input('type');
            $property->file_path = date('Y-m-d');
            $property->image = $filename;
            $property->price = $request->input('price');
            $property->in_discount = $request->input('indiscount');
            $property->discount = $request->input('discount');
            $property->content = e($request->input('content'));
            //Guardem la imatge
            if($property->save()):
                if($request->hasFile('img')):
                    //Uploads està creat a filesystems.php
                    $fl = $request->img->storeAs($path, $filename, 'uploads');
                    $img = Image::make($file_file);
                    //Part per si s'ha de modificar la mida
                    $img->fit(256, 256, function($constraint){
                        //t_ = thumbnail
                        $constraint->upsize();
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/properties')->with('message', 'S´ha guardat correctament')->with('typealert', 'success');
            endif;
        endif;
    }
}
