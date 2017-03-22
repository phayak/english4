<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>english4speak</title>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
     

    <style type="text/css">
        .selectpass {
            background: #ddd;
        }
        @media screen and (min-width: 991px) {
           .side-menu {
                display: block;
           }
        }
        @media screen and (min-width: 991px) {
           .side-menu {
                display: none;
           }
        }
    </style>

    @yield('style')
    <link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout" class="with-side-menu">
    <!-- <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
             
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

           
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
               
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav> -->

     <header class="site-header">
        <div class="container-fluid">
            <div class="container">
                <div class="col-md-12">
                <a href="#" class="site-logo">
                    <img class="hidden-md-down" src="{{asset('assets/img/eng200.png')}}" alt="">
                    <img class="hidden-lg-up" src="{{asset('assets/img/logo-2-mob.png')}}" alt="">
                </a>
                <button class="hamburger hamburger--htla">
                    <span>toggle menu</span>
                </button>
                <div class="site-header-content">
                    <div class="site-header-content-in">
                        <div class="">
                            <a class="" data-target="#" href="{{url('/')}}" >
                                <span class="">Sales</span>
                            </a>
                        </div>
                        <div class="site-header-shown">
                           
                            <div class="dropdown user-menu">
                                <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset('assets/img/avatar-2-64.png')}}" alt="">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                                    <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                                    <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('logout')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                                </div>
                            </div>


                            <button type="button" class="burger-right">
                                <i class="font-icon-menu-addl"></i>
                            </button>
                        </div><!--.site-header-shown-->

                        
                        
                    </div><!--site-header-content-in-->
                </div><!--.site-header-content-->
                </div><!--.col-md-12-->
            </div><!--.container-->
        </div><!--.container-fluid-->
    </header><!--.site-header-->
    <br>
<br>
<br><br>
    @yield('content')

    <!-- JavaScripts -->
    <!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
    @include('layouts.slide-menu', ['some' => 'data'])
    @yield('script')
    <script src="{{asset('assets/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/tether/tether.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
