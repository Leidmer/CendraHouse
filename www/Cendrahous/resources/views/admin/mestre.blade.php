<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - CendraHouse</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ url('/static/css/dashboard.css?v='.time()) }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/34547ed440.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="col2">
            <nav class="navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <div class="logo" style="display: block; width: 2.5%;">
                        <img src="{{ url('static/images/logo_transparent.png') }}" class="img-fluid">
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/admin') }}" class="nav-link">
                                <i class="fas fa-home" style="margin-left: 16px;"></i> Inici
                            </a>
                        </li>
                    </ul>
                    <div class="user" style="margin-left:auto !important; margin-right:0 !important;">
                        <div class="name">
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            <a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top" title="Sortir">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                        <div class="email">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </nav>

            <div class="page">

                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow">
                        <ol class="breadcrumb">
                            @section('breadcrumb')
                            @show
                        </ol>
                    </nav>
                </div>

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

                @section('content')
                @show

            </div>
        </div>
    </div>
</body>
</html>