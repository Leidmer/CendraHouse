@extends('admin.master')

@section('title', 'Propietats')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/properties') }}"><i class="fas fa-building"></i> Propietats</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-building"></i> Propietats</h2>
        </div>

        <div class="inside">

            <div class="btns">
                <a href="{{ url('/admin/property/add') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Afegir Propietat
                </a>    
            </div>

            <table class="table">

            </table>
        </div>
    </div>
</div>
@endsection