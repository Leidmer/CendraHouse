@extends('admin.master')

@section('title', 'Afegir Propietat')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/properties') }}"><i class="fas fa-building"></i> Propietats</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ url('/admin/property/add') }}"><i class="fas fa-plus"></i> Afegir Propietat</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus"></i> Afegir Propietat</h2>
        </div>

        <div class="inside">
            {!! Form::open(['url' => '/admin/property/add']) !!}
            <!--Primera Fila-->
            <div class="row">

                <div class="col-md-3">
                    <label for="name">Nom de la propietat:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="n_rooms">Número d'habitacions:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                        {!! Form::number('n_rooms', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="n_baths">Número de banys:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                        {!! Form::number('n_baths', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="type">Tipus de propietat:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                          {!! Form::select('type', $cats, 0, ['class' => 'custom-select']) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="name">Imatge destacada:</label>
                    <div class="custom-file">
                        {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>

            <!--Segona Fila-->
            <div class="row mtop16">
                <div class="col-md-3">
                    <label for="price">Preu:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                          {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                    </div>
                    
                </div>
                <!--Descompte o "ha baixat de preu?"-->
                    <div class="col-md-3">
                        <label for="indiscount">Té descompte?:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                              </div>
                              {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'custom-select']) !!}
                        </div>
                        
                </div>

                <!--Per posar un descompte en el formulari s'haurà de posar 0.10 per exemple, això seria un 10% de descompte-->
                <div class="col-md-3">
                    <label for="discount">Descompte:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                          {!! Form::number('discount', 0.00, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                    </div>
                    
            </div>
            </div>

            <!--Tercera Fila-->
            <div class="row mtop16">
                <div class="col-md-12">
                    <label for="content">Descripció</label>
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                    {!! Form::submit('Guardar', ['class'=> 'btn btn-success']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection