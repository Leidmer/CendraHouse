@extends('admin.mestre')

@section('title', 'Propietats en Venda')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin') }}"><i class="fas fa-building"></i> Propietats en Venda</a>
</li>
@endsection


@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-building"></i> Propietats</h2>
        </div>

            <!-- Prova amb card
            @foreach($properties as $p)
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                            <img src="{{ url('/uploads/'.$p->file_path.'/t_'.$p->image) }}" width="64" >
                        </a>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                  </div>
                </div>
              </div>
              
            @endforeach
            -->

        <div class="inside">

            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td></td>
                        <td>Nom</td>
                        <td>Número d'habitacions</td>
                        <td>Número de banys</td>
                        <td>Tipus</td>
                        <td>Descripció</td>
                        <td>Preu</td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $p)
                    <tr @if($p->status == '0') class="table-danger" @endif>
                        <td width="128"><a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery"><img src="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" width="256" ></a></td>
                        <td>{{ $p->name }}</td>
                        <td width="200">{{ $p->n_rooms }}</td>
                        <td width="200">{{ $p->n_baths }}</td>
                        <td>{{ $p->cat->name }}</td>
                        <td>{!! html_entity_decode($p->content) !!}</td>
                        <td>{{ $p->price }} €</td>
                        <td></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="8">
                            {!! $properties->render() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection