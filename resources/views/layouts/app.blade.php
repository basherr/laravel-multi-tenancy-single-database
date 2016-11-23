<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Multi Tenant</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{!! URL::asset('assets/css/font-awesome.min.css') !!}" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{!! URL::asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/css/style.css') !!}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    
    @include('layouts.nav')

    @if(Session::has('success_message'))
        <div class="container container-success-message">
            <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <div class="alert alert-success success-msg">{!! Session::get('success_message') !!}</div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script type="text/javascript" src="{!! URL::asset('assets/js/jquery.min.js') !!}" ></script>
    <script type="text/javascript" src="{!! URL::asset('assets/js/bootstrap.min.js') !!}" ></script>
    @yield('javascript')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
