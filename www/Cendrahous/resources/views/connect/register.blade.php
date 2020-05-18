@extends('connect.master')

@section('title', 'Registre')

@section('content')
<div class="box box_register shadow">
    <div class="header">
        <a href="{{ url ('/') }}">
            <img src="{{ url ('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
    <!--Fet amb HTML collective, més fàcil i ràpid que l'html normal-->
   {!! Form::open(['url' => '/register']) !!}

   <label for="name">Nom:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user"></i></div>
    </div>
        {!! Form::text('name', null, ['class'=> 'form-control'])!!}
   </div>

   <label for="lastname" class="mtop16">Cognom:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user-tag"></i></i></div>
    </div>
        {!! Form::text('lastname', null, ['class'=> 'form-control'])!!}
   </div>

   <label for="email" class="mtop16">Correu Electrònic:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
        {!! Form::email('email', null, ['class'=> 'form-control'])!!}
   </div>

   <label for="password" class="mtop16">Contrasenya:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-lock"></i></div>
    </div>
        {!! Form::password('password', ['class'=> 'form-control'])!!}
   </div>

   <label for="cpassword" class="mtop16">Confirmar contrasenya:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-lock"></i></div>
    </div>
        {!! Form::password('cpassword', ['class'=> 'form-control'])!!}
   </div>
   {!! Form::submit('Registrar-se', ['class' => 'btn btn-success mtop16'])!!}
   {!! Form::close() !!}
   <div class="footer mtop16">
    <a href="{{ url ('/login') }}">Ja tens un compte? Fes clic aqui</a>
</div>
</div>
</div>
@stop