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
                        <td>Contacta</td>

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
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                M'interessa!
                              </button>

                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Formulari de contacte</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css">
                                            .box{
                                             width:400px;
                                             margin:0 auto;
                                             border:1px solid #ccc;
                                            }
                                            .has-error
                                            {
                                             border-color:#cc0000;
                                             background-color:#ffff99;
                                            }
                                           </style>
                                          </head>
                                          <body>
                                           <br />
                                           <br />
                                           <br />
                                           <div class="container box">
                                            <h3>Contacta</h3><br />
                                            @if (count($errors) > 0)
                                             <div class="alert alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">×</button>
                                              <ul>
                                               @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                               @endforeach
                                              </ul>
                                             </div>
                                            @endif
                                            @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                             <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                            </div>
                                            @endif
                                            <form method="post" action="{{url('sendemail/send')}}">
                                             {{ csrf_field() }}
                                             <div class="form-group">
                                              <label>Introdueix el teu nom</label>
                                              <input type="text" name="name" class="form-control" value="" />
                                             </div>
                                             <div class="form-group">
                                             <div class="form-group">
                                              <label>Introdueix el teu e-mail</label>
                                              <textarea name="message" class="form-control"></textarea>
                                             </div>
                                             <div class="form-group">
                                              <input type="submit" name="send" class="btn btn-info" value="Send" />
                                             </div>
                                            </form>
                                            
                                           </div>
                                          </body>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
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




