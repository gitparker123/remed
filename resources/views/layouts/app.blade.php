<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- libs -->
    <!-- datatable -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- datepicker -->
    <!-- <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <!-- theme -->
    <link href="{{ asset('theme/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/nivo-slider-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/responsive.css') }}" rel="stylesheet">
    <!-- custom -->
    <script src="{{ asset('css/main.css') }}" defer></script>

</head>
<body data-spy="scroll" data-target="#navbar-example">
    <div id="preloader"></div>

    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- Navigation -->
                <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Brand -->
                    <a class="navbar-brand page-scroll sticky-logo" href="{{ url('/') }}">
                    <h1><span>Re</span>med Clinic</h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <img src="img/logo.png" alt="" title=""> -->
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                    <ul class="nav navbar-nav navbar-right" id="top_menu">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class=" class="page-scroll"" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class=" class="page-scroll"" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a class="page-scroll" href="{{ url('/home') }}">Doctor Info</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ url('/service') }}">Service</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ url('/appointment') }}">Appointment</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ url('/about') }}">About Us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ url('/contact') }}">Contact Us</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    </ul>
                </div>
                <!-- navbar-collapse -->
                </nav>
                <!-- END: Navigation -->
            </div>
            </div>
        </div>
        </div>
        <!-- header-area end -->
    </header>
    <!-- header end --> 
    <main>
        @yield('content')
    </main>
    <!-- libs -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <!-- datepicker -->
    <!-- <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script> -->
    <script src="{{ asset('bootstrap-datetimepicker/js/datepicker.js') }}" defer></script>
    <!-- theme -->
    <script src="{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('theme/lib/venobox/venobox.min.js') }}" defer></script>
    <script src="{{ asset('theme/lib/knob/jquery.knob.js') }}" defer></script>
    <script src="{{ asset('theme/lib/wow/wow.min.js') }}" defer></script>
    <script src="{{ asset('theme/lib/parallax/parallax.js') }}" defer></script>
    <script src="{{ asset('theme/lib/easing/easing.min.js') }}" defer></script>
    <script src="{{ asset('theme/lib/nivo-slider/js/jquery.nivo.slider.js') }}" defer></script>
    <script src="{{ asset('theme/lib/appear/jquery.appear.js') }}" defer></script>
    <script src="{{ asset('theme/lib/isotope/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('theme/js/main.js') }}" defer></script>
    <!-- custom -->
    <script src="{{ asset('js/main.js') }}" defer></script>



</body>
</html>
