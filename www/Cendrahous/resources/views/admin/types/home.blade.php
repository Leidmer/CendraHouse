@extends('admin.master')

@section('title', 'Tipus de Propietat')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/types') }}"><i class="far fa-folder-open"></i> Tipus de propietats</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="fas fa-plus"></i> Afegir Tipus de Propietat</h2>
                </div>
        
                <div class="inside">
                    {!! Form::open(['url' => '/admin/type/add']) !!}
                    <label for="name">Nom del tipus de propietat:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <label for="module" class="mtop16">Mòdul:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                          {!! Form::select('module', getModulesArray(), 0, ['class' => 'custom-select']) !!}
                    </div>

                    <!--Aquest es per poder guardar els html de fontawesome-->
                    <label for="icon" class="mtop16">Icona:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-keyboard"></i>
                            </span>
                          </div>
                        {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection