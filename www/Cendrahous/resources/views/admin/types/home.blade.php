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
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
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
                        {!! Form::text('icon', null, ['class' => 'form-control', 'id' => 'icon']) !!}
                    </div>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16', 'id' => 'save']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-folder-open"></i> Tipus de propietats</h2>
                </div>
        
                <div class="inside">
                    <nav class="nav nav-pills nav-fill">
                        @foreach(getModulesArray() as $m => $k)
                        <a class="nav-link" href="{{ url('/admin/types/'.$m) }}"><i class="fas fa-list"></i> {{ $k }}</a>
                        @endforeach
                    </nav>
                    <table class="table mtop16">
                        <thead>
                            <tr>
                                <td width="32px"></td>
                                <td>Nom</td>
                                <td width="140px"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cats as $cat)
                            <tr>
                                <!--Aquesta part la fem amb Laravel Collective perque mostri la icona correctament-->
                                <td>{!! htmlspecialchars_decode($cat->icona) !!}</td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                    <div class="opts">
                                        <a href="{{ url('/admin/type/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/type/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection