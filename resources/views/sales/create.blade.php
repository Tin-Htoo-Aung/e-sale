<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> e-sale.com.mm </title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

            background-image: url("/images/admbg.jpg");
            background-repeat:repeat;
            background-size:cover;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        a:link { 
            color: white;
            text-decoration: none;
        }

        a:visited { 
            color: white;
            text-decoration: none;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .navbar{
            background-color: #696969 !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <font color="white" size="4"> <b> Welcome From Dashboard </b> | </font>

                <center>
                &nbsp <font color="white"> <a href="{{route('customers.index')}}"> Dashboard </a> | </font>
                &nbsp <font color="white"> <a href="{{route('sales.create')}}"> Create Sale Post </a> | </font>                
                </center>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <b> <a class="nav-link" href="{{ route('login') }}" style="color:white;"> {{ __('Login') }}</a> </b>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <b> <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Register') }}</a> </b>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row" style="padding-top:100px; padding-left:50px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="color:white; background-color:#696969;"> <b> Create A Sale Post </b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <input style="padding-left:50px;" id="photo" name="photo" type='file' onchange="readURL(this);">
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input style="height:200px;" id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="condition" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                                <select name="condition" id="condition" class="form-control" style="margin-left:15px; width:100px;">
                                    <option value="New"> New </option>
                                    <option value="Used"> Used </option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="calculate" class="col-md-4 col-form-label text-md-right"> You will only get 93% </label>
                                <div class="col-md-6">
                                    <input type="text" id="calculate" disabled>
                                    <input style="width:400px;" type="text" id="service" disabled>

                                    <input type="text" name="gmoney" id="gmoney" hidden>
                                    <input type="text" name="smoney" id="smoney" hidden>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="color:white; background-color:#696969;">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function pageLoad(){
        jQuery('#price').on('input propertychange paste', function() {        
            var input = $('#price').val();    
            var service = (7 * input) / 100;
            var gettingprice = (93 * input) / 100;

            setTimeout(calculatePrice, 1000);

            function calculatePrice(){
                document.getElementById("calculate").value = gettingprice + " Kyats";
                document.getElementById("service").value = "Services Charges:" + service + " Kyats is reduced.";
                document.getElementById("gmoney").value = gettingprice;
                document.getElementById("smoney").value = service;
            }
        });
    }

    window.onload = pageLoad;
    
    $(document).ready(function() {
      md.initDashboardPageCharts();
    });
</script>
</html>
