<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User, App\Http\Models\Property;

class XMLController extends Controller
{
      public function download_user(){
        $users = User::all();
	    $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Usuaris');
            foreach($users as $user) {
                $xml->startElement('user');
                $xml->writeElement('id', $user->id);
                $xml->writeElement('name', $user->name);
                $xml->writeElement('lastname', $user->lastname);
                $xml->writeElement('email', $user->email);
                $xml->writeElement('role', $user->role);
                $xml->writeElement('password', $user->password);
                $xml->endElement();
            }
        $xml->endElement();
	    $xml->endDocument();
	    $filename = date('Y-m-d');
        header("Content-Type: text/html/force-download");
        header("Content-Disposition: attachment; filename=".$filename.'_User_'.$user->name.".xml");

    $content = $xml->outputMemory();
	$xml = null;

    return response($content)->header('Content-Type', 'text/xml');
    }

    public function download_property(){
        $properties = Property::all();
	    $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Propietats');
            foreach($properties as $property) {
                $xml->startElement('property');
                $xml->writeElement('id', $property->id);
                $xml->writeElement('status', $property->status);
                $xml->writeElement('name', $property->name);
                $xml->writeElement('slug', $property->slug);
                $xml->writeElement('n_rooms', $property->n_rooms);
                $xml->writeElement('n_baths', $property->n_baths);
                $xml->writeElement('type_id', $property->type_id);
                $xml->writeElement('price', $property->price);
                $xml->writeElement('content', $property->content);
                $xml->endElement();
            }
        $xml->endElement();
	    $xml->endDocument();
	    $filename = date('Y-m-d');
        header("Content-Type: text/html/force-download");
        header("Content-Disposition: attachment; filename=".$filename.'_Property_'.$property->slug.".xml");

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
    }

    public function download_type(){
        $types = Property::all();
	    $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('Types');
            foreach($types as $type) {
                $xml->startElement('type');
                $xml->writeElement('id', $type->id);
                $xml->writeElement('module', $type->module);
                $xml->writeElement('name', $type->name);
                $xml->writeElement('slug', $type->slug);
                $xml->writeElement('icon', $type->icona);
                $xml->endElement();
            }
        $xml->endElement();
	    $xml->endDocument();
	    $filename = date('Y-m-d');
        header("Content-Type: text/html/force-download");
        header("Content-Disposition: attachment; filename=".$filename.'_Type_'.$type->slug.".xml");

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
    }
}
