@extends('emails.master')
@section('content')
<p>Hola: <strong>{{ $name }}</strong></p>
<p>Aquest és un correu electrònic que l'ajudará a restablir la contrasenya del seu compte en la nostra plataforma</p>
<p>Per continuar faci clic en el botó i introdueixi el següent codi: <h2> {{ $code }}</h2></p>
<p><a href="{{ url('/reset?email='.$email) }}" style="margin-bottom: 16px; display: inline-black; background-color: #b6e4fc; padding: 12px; color: #5068a9; border-radius: 4px; text-decoration: none;">Restablir la meva contrasenya</a></p>
<p>Si el botó no funciona, copia la següent URL en el seu navegador: </p>
<p>{{ url('/reset?email='.$email) }}</p>
@stop