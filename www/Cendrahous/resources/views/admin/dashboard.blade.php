@extends('admin.mestre')

@section('title', 'Propietats en Venda')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('/admin/dashboard') }}"><i class="fas fa-building"></i> Propietats en Venda</a>
</li>
@endsection
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-building"></i> Propietats</h2>
        </div>

        
        @foreach($properties as $p)
        <section class="sections random-product">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="http://www.mihanmedia.ir/userfile/736708307-580x567.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">ترازدستی 40 سانتی متر اسلوونی MTC</a>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">1900 تومان</a>
                                        <br>
                                        <small class="text-muted"><del>2000 تومان</del></small>
                                    </div>
                                </div>
                            </div>
                        </div><!--.col-->
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="http://www.mihanmedia.ir/userfile/736708307-580x567.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">ترازدستی 40 سانتی متر اسلوونی MTC</a>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">1900 تومان</a>
                                        <br>
                                        <small class="text-muted"><del>2000 تومان</del></small>
                                    </div>
                                </div>
                            </div>
                        </div><!--.col-->
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="http://www.mihanmedia.ir/userfile/736708307-580x567.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">ترازدستی 40 سانتی متر اسلوونی MTC</a>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">1900 تومان</a>
                                        <br>
                                        <small class="text-muted"><del>2000 تومان</del></small>
                                    </div>
                                </div>
                            </div>
                        </div><!--.col-->
                    </div><!--.row-->
                </div><!--.container-->
            </div><!--.container-fluid-->
        </section>
            @endforeach

        <div class="inside">

            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>ID</td>
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
                        <td width="50">
                            <div class="card">
                                <img class="card-img-top" src="http://www.mihanmedia.ir/userfile/736708307-580x567.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">{{ $p->id }}</a>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">1900 تومان</a>
                                        <br>
                                        <small class="text-muted"><del>2000 تومان</del></small>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td width="64">
                            <a href="{{ url('/uploads/'.$p->file_path.'/'.$p->image) }}" data-fancybox="gallery">
                                <img src="{{ url('/uploads/'.$p->file_path.'/t_'.$p->image) }}" width="64" >
                            </a>
                        </td>
                        <td>{{ $p->name }}</td>
                        <td width="200">{{ $p->n_rooms }}</td>
                        <td width="200">{{ $p->n_baths }}</td>
                        <td>{{ $p->cat->name }}</td>
                        <td>{!! html_entity_decode($p->content) !!}</td>
                        <td>{{ $p->price }} €</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="9">
                            {!! $properties->render() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection