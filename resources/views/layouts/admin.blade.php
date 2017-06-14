<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/admin/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/admin/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/admin/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

    @yield('import_styles')
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
    @yield('custom_styles')

    @yield('head_scripts')

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('/images/sidebar-5.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/') }}" class="simple-text">
                    Add Launcher - Metro
                </a>
            </div>

            <ul class="nav">
                <li class="@yield('dashboard_active')">
                    <a href="{{ url('admin/') }}">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="@yield('user_active')">
                    <a href="{{ url('admin/users') }}">
                        <i class="fa fa-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="@yield('metro_line_list_active')">
                    <a href="{{ url('admin/metro_line_list') }}">
                        <i class="fa fa-minus"></i>
                        <p>Metro Lines</p>
                    </a>
                </li>
                <li class="@yield('station_active')">
                    <a href="{{ url('admin/city') }}">
                        <i class="fa fa-subway"></i>
                        <p>Station List</p>
                    </a>
                </li>
                <li class="@yield('media_list_active')">
                    <a href="{{ url('admin/media_list') }}">
                        <i class="fa fa-tasks"></i>
                        <p>Media List</p>
                    </a>
                </li>
                <li class="@yield('panel_type_active')">
                    <a href="{{ url('admin/panel_list') }}">
                        <i class="fa fa-tasks"></i>
                        <p>Panel Types</p>
                    </a>
                </li>
                <li class="@yield('order_active')">
                    <a href="{{ url('admin/orders') }}">
                        <i class="fa fa-list"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="@yield('notification_active')">
                    <a href="{{ url('admin/notifications') }}">
                        <i class="fa fa-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        Dashboard
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <span class="fa fa-sign-out"></span> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <!--   Core JS Files   -->
    <script src="{{ asset('js/admin/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    {{-- <script src="{{ asset('js/admin/bootstrap-checkbox-radio-switch.js') }}"></script> --}}

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/admin/light-bootstrap-dashboard.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>

    @yield('import_scripts')
        <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
        @if(session('message'))
            <?php $message = Session::get('message'); ?>
            <script>
                iziToast.{{ $message['type'] }}({
                    title: "{{ $message['title'] }}",
                    message: "{{ $message['message'] }}",
                    position: "{{ $message['position'] }}"
                });
            </script>
        @endif
    @yield('custom_scripts')
    
</body>
</html>
