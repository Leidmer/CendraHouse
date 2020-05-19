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
            <div class="row">
                <div class="col-md-8">
                    <label for="name">Nom de la propietat:</label>
                    <div class="input-group">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection