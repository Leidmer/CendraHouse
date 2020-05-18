@extends('connect.master')

@section('title', 'Login')

@section('content')
<div class="box box_login shadow">
    <div class="header">
        <a href="{{ url ('/') }}">
            <img src="{{ url ('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
    <!--Fet amb HTML collective, més fàcil i ràpid que l'html normal-->
   {!! Form::open(['url' => '/login']) !!}
   <label for="email">Correu Electrònic:</label>
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
   {!! Form::submit('Entrar', ['class' => 'btn btn-success mtop16'])!!}
   {!! Form::close() !!}
   <div class="footer mtop16">
    <a href="{{ url ('/register') }}">No tens un compte? Registra't</a>
    <a href="{{ url ('/recover') }}">Recuperar Contrasenya</a>
</div>
</div>
</div>
@stop