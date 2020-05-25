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
                <a href="{{ url('/admin/property/add') }}" class="btn btn-primary" id="Afegir">
                    <i class="fas fa-plus"></i> Afegir Propietat
                </a>
                <a class="btn btn-primary" href="{{ route('api_properties') }}" style="float: left; display: inline-block; margin-right: 16px;">{ } API Json Propietats</a>
            </div>

            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td></td>
                        <td>Nom</td>
                        <td>Número d'habitacions</td>
                        <td>Número de banys</td>
                        <td>Tipus</td>
                        <td>Preu</td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $p)
                    <tr @if($p->status == '0') class="table-danger" @endif>
                        <td width="50">{{ $p->id }}</td>
                        <td width="64">
                            <a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                                <img src="{{ url('/uploads/'.$p->file_path.'/t_'.$p->image) }}" width="64" >
                            </a>
                        </td>
                        <td>{{ $p->name }}</td>
                        <td width="200">{{ $p->n_rooms }}</td>
                        <td width="200">{{ $p->n_baths }}</td>
                        <td>{{ $p->cat->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td><div class="opts">
                            <a href="{{ url('/admin/property/'.$p->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('/admin/property/'.$p->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        </td>
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