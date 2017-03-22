<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>English4speak Admin</title>
    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="{{asset('assets/img/engog.png')}}" type="image/png" sizes="16x16" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    @yield('style')
    <link rel="stylesheet" href="{{asset('assets/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .menu-active {
            background-color: #ddd;
        }
        .menu-active a {
            color: #000 !important;
        }
        .pagenate {
            position: absolute;
            margin-top: -45px;
            margin-left: 180px;
        }
        .fw300 {
            font-weight: 300 !important;
        }
    </style>
    
 
</head>
<body class="with-side-menu">
    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                <img class="hidden-md-down logo-menu-bar" src="{{asset('assets/img/eng200.png')}}" alt="">
                <img class="hidden-lg-up" src="{{asset('assets/img/logofooter.png')}}" height="35" width="auto" alt="">
            </a>
            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
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
        </div><!--.container-fluid-->
    </header><!--.site-header-->

    @include('layouts.slide-menu', ['some' => 'data'])
    @yield('content')
    
    <!-- JavaScripts -->
    <script src="{{asset('assets/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/tether/tether.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    @yield('script')
</body>
</html>
