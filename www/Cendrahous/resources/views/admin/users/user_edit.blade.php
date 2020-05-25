@extends('admin.master')

@section('title', 'Editar Usuari')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/users') }}"><i class="fas fa-user"></i> Usuaris</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="page_user">
        <div class="row">

            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user"></i> Informació</h2>
                    </div>
            
                    <div class="inside">
                        <div class="mini_profile">
                            @if(is_null($u->avatar))
                            <img src="{{ url('/static/images/default-avatar.png') }}" class="avatar">
                            @else
                            <img src="{{ url('/uploads/users/'.$u->id.'/'.$user->avatar)}}" class="avatar">    
                            @endif
                            <div class="info">
                                <span class="title"><i class="far fa-address-card"></i> Nom:</span>
                                <span class="text">{{ $u->name }} {{ $u->lastname }}</span>
                                <span class="title"><i class="fas fa-user-tie"></i> Estat de l'usuari:</span>
                                <span class="text">{{ getUserStatusArray(null,$u->status) }}</span>
                                <span class="title"><i class="far fa-envelope"></i> Correu electrònic:</span>
                                <span class="text">{{ $u->email }}</span>
                                <span class="title"><i class="far fa-calendar-alt"></i> Data de Registre:</span>
                                <span class="text">{{ $u->created_at }}</span>
                                <span class="title"><i class="fas fa-user-shield"></i> Rol de l'usuari:</span>
                                <span class="text">{{ getRoleUserArray(null,$u->role) }}</span>
                            </div>
                            @if($u->status == "100")
                            <a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-success mtop16">Activar Usuari</a>
                            @else
                            <a href="{{ url('/admin/user/'.$u->id.'/banned') }}" class="btn btn-danger mtop16">Suspendre Usuari</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!--Formulari editar usuari
            <div class="col-md-8">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-user-edit"></i> Editar informació</h2>
                    </div>
            
                    <div class="inside">
            
                    </div>
                </div>
            </div>
            -->
        </div>
</div>
    
</div>
@endsection