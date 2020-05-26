@extends('connect.master')

@section('title', 'Recuperar Contrasenya')

@section('content')
<div class="box box_login shadow">
    <div class="header">
        <a href="{{ url ('/admin') }}">
            <img src="{{ url ('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
    <!--Fet amb HTML collective, més fàcil i ràpid que l'html normal-->
   {!! Form::open(['url' => '/recover']) !!}
   <label for="email">Correu Electrònic:</label>
   <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
    </div>
        {!! Form::email('email', null, ['class'=> 'form-control', 'id' => 'email', 'required'])!!}
   </div>

   {!! Form::submit('Recuperar Contrasenya', ['class' => 'btn btn-success mtop16', 'id' => 'login'])!!}
   {!! Form::close() !!}

   @if(Session::has('message'))
   <div class="container">
   <div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display:none;">
       {{ Session::get('message') }}
       @if ($errors->any())
       <ul>
               @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
       </ul>
       @endif
       <script>
           $('.alert').slideDown();
           setTimeout(function(){ $('.alert').slideUp(); },10000);
       </script>
       </div>
   </div>
@endif

   <div class="footer mtop16">
    <a href="{{ url ('/register') }}">No tens un compte? Registra't</a>
    <a href="{{ url ('/login') }}">Iniciar Sessió</a>
    <a href="{{ url ('/terms') }}">Condicions d'ús</a>
</div>
</div>
</div>
@stop