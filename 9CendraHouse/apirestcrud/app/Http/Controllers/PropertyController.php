<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::get();
        echo json_encode($properties);
    }

    /**
     * Show the form for creating a new resource.
     * Comentat ja que no es fará servir, això és una API
     *
     * @return \Illuminate\Http\Response
     */
    /**public function create()
    {
        //
    }
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property();
        $property->name = $request->input('name');
        $property->description = $request->input('description');
        $property->location = $request->input('location');
        $property->postal_code = $request->input('postal_code');
        $property->n_rooms = $request->input('n_rooms');
        $property->n_baths = $request->input('n_baths');
        $property->property_type = $request->input('property_type');
        $property->save();
        echo json_encode($property);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    /**public function show(Property $property)
    {
        //
    }
    */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    /**public function edit(Property $property)
    {
        //
    }
    */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $property_id)
    {
        $property = Property::find($property_id);
        $property->name = $request->input('name');
        $property->description = $request->input('description');
        $property->location = $request->input('location');
        $property->postal_code = $request->input('postal_code');
        $property->n_rooms = $request->input('n_rooms');
        $property->n_baths = $request->input('n_baths');
        $property->property_type = $request->input('property_type');
        $property->save();
        echo json_encode($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_id)
    {
        $property = Property::find($property_id);
        $property->delete();
    }
}
