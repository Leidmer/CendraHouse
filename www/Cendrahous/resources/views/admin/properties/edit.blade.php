@extends('admin.master')

@section('title', 'Editar Propietat')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/properties') }}"><i class="fas fa-building"></i> Propietats</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-edit"></i> Editar Propietat</h2>
                </div>

                <div class="inside">
                    {!! Form::open(['url' => '/admin/property/add', 'files' => true]) !!}
                    <!--Primera Fila-->
                    <div class="row">

                        <div class="col-md-3">
                            <label for="name">Nom de la propietat:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::text('name', $p->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="n_rooms">Número d'habitacions:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::number('n_rooms', $p->n_rooms, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="n_baths">Número de banys:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::number('n_baths', $p->n_baths, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="type">Tipus de propietat:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::select('type', $cats, $p->type_id, ['class' => 'custom-select']) !!}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="img">Imatge destacada:</label>
                            <div class="custom-file">
                                <!---La part de accept fa que només accepti imatges tot i que ho fa a la part client-->
                                {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile', 'accept'=> 'image/*']) !!}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <!--Segona Fila-->
                    <div class="row mtop16">
                        <div class="col-md-3">
                            <label for="price">Preu:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::number('price', $p->price, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                            </div>
                            
                        </div>
                        <!--Descompte o "ha baixat de preu?"-->
                            <div class="col-md-3">
                                <label for="indiscount">Té descompte?:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-keyboard"></i>
                                        </span>
                                    </div>
                                    {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], $p->in_discount, ['class' => 'custom-select']) !!}
                                </div>
                                
                        </div>

                        <!--Per posar un descompte en el formulari s'haurà de posar 0.10 per exemple, això seria un 10% de descompte-->
                        <div class="col-md-3">
                            <label for="discount">Descompte:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::number('discount', $p->discount, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                            </div>
                            
                    </div>
                    </div>

                    <!--Tercera Fila-->
                    <div class="row mtop16">
                        <div class="col-md-12">
                            <label for="content">Descripció</label>
                            {!! Form::textarea('content', $p->content, ['class' => 'form-control', 'id' => 'editor']) !!}
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-12">
                            {!! Form::submit('Guardar', ['class'=> 'btn btn-success']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel shadow">
                <div class="header">
                    <h2 class="title"><i class="far fa-image"></i> Imatge Destacada</h2>
                    <div class="inside">
                        <img src="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" class="img-fluid" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection