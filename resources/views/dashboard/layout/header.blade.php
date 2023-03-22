<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=0, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Dashboard | Miraculous-Tempor consequat Re </title>
    <link rel="shortcut icon" href="{{ url('frontend/images/sites/favicon.png') }}">
    <link href="{{ url('frontend/assets/icons/feather/css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('other_styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css"
        integrity="sha512-YoxvmIzlVlt4nYJ6QwBqDzFc+2aXL7yQwkAuscf2ZAg7daNQxlgQHV+LLRHnRXFWPHRvXhJuBBjQqHAqRFkcVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>


    </style>
</head>

<body class="vertical-layout">
    <div class="admin_loader_wrapper" style="display: none;">
        <img src="{{ url('frontend/assets/images/loader.svg') }}" class="img-fluid" alt="">
    </div>
    <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
            <h4>Settings</h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><img
                    src="{{ url('frontend/assets/images/svg/close.svg') }}" class="img-fluid menu-hamburger-close"
                    alt="close"></a>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
    <div id="containerbar">
        <div class="leftbar">
            <div class="sidebar">
                <div class="navigationbar">
                    <div class="vertical-menu-icon">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <div class="mb-5" >
                                <a href="{{url("/admin")}}" class="logo logo-small "><img
                                        src="{{ url('frontend/images/sites/logo.png') }}" class="img-fluid "
                                        alt="logo"></a>
                            </div>
                            <div class="vertical_center_dv mt-5">
                                <div class="midd_menu nav nav-pills">


                                    <a class="nav-link" id="Dashboard-tab" target="_blank"
                                        href="{{ url('/admin') }}">
                                        <span class="tooltip_bar">Dashboard</span>
                                        <img src="{{ url('frontend/assets/images/svg/dashboard.svg') }}"
                                            class="img-fluid" alt="Dashboard">
                                    </a>
                                    <a class="nav-link" id="Preview-tab" target="_blank"
                                        href="{{ url('/') }}">
                                        <span class="tooltip_bar">Live Preview</span>
                                        <img src="{{ url('frontend/assets/images/svg/frontend.svg') }}"
                                            class="img-fluid" alt="Setting">
                                    </a>
                                    <a class="nav-link " id="Setting-tab" data-toggle="pill" href="#Setting"
                                        role="tab" aria-controls="Setting" aria-selected="false">
                                        <span class="tooltip_bar">Setting</span>
                                        <img src="{{ url('frontend/assets/images/svg/settings.svg') }}"
                                            class="img-fluid" alt="Setting">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-menu-detail">
                        <div class="logobar">
                            <a href="{{url('/admin')}}" class="logo logo-large"><img
                                src="{{ url('frontend/images/sites/logo2.png') }}" class="img-fluid"
                                alt="logo"></a>
                        </div>

                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade active show" id="Dashboard" role="tabpanel"
                                aria-labelledby="Dashboard-tab">
                                <ul class="vertical-menu">
                                    <li class="active"><a href="{{ url('/admin') }}"><img
                                                src="{{ url('frontend/assets/images/svg/dashboard.svg') }}"
                                                class="img-fluid" alt="adminWords.dasnboard"> <span
                                                class="sub_menu_text">Dashboard</span></a></li>



                                    <li class=""><a href="{{ url('/userdb') }}"><img
                                                src="{{ url('frontend/assets/images/svg/customers.svg') }}"
                                                class="img-fluid" alt="Users"> <span class="sub_menu_text">
                                                Users</span></a></li>

                                    <li class="">
                                        <a href="{{ url('/artist/artistdb') }}">
                                            <img src="{{ url('frontend/assets/images/svg/artist.svg') }}"
                                                class="img-fluid" alt="Blog"><span class="sub_menu_text">
                                                Artist</span>
                                        </a>

                                    </li>

                                    <li class="">
                                        <a href="{{ url('/audio') }}">
                                            <img src="{{ url('frontend/assets/images/svg/audio.svg') }}"
                                                class="img-fluid" alt="Audio"><span class="sub_menu_text">
                                                Audio</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('/vedio') }}">
                                            <img src="{{ url('frontend/assets/images/svg/video.svg') }}"
                                                class="img-fluid" alt="Vedio"><span class="sub_menu_text">
                                                Vedio</span>
                                        </a>
                                    </li>
                                    <li><a href="/gnere"><img src="{{ url('frontend/assets/images/svg/gnere.svg') }}"
                                                alt="Gnere"><span class="sub_menu_text"> Genre</span></a></li>






                                    <li id="accordion" class="">


                                        <div class="link">
                                            <a href="#"><img src="{{ url('frontend/assets/images/svg/album.svg') }}"
                                                    class="img-fluid" alt="Album"><span class="sub_menu_text">
                                                    Album
                                                    <i class="fa fa-chevron-down"></i></span>
                                            </a>
                                        </div>
                                        <ul class="submenu">
                                            <li class=""><a href="{{ url('/album') }}">
                                                    Album Gnere</a></li>
                                            <li class=""><a href="{{ url('/audioalbum') }}">
                                                    Audio Albums </a></li>

                                            <li class=""><a href="{{ url('/vedioalbum') }}">
                                                    Vedio Albums</a></li>

                                        </ul>
                                    </li>




                                </ul>

                            </div>

                            <div class="tab-pane fade " id="Setting" role="tabpanel" aria-labelledby="Setting-tab">

                                <ul class="vertical-menu">

                                    <li class=""><a href="{{ url('/slider') }}"><span
                                                class="sub_menu_text">Slider Setting</span></a></li>

                                    <li class=""><a href="{{ url('/language') }}"><span
                                                class="sub_menu_text">Language</span></a></li>
                                </ul>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rightbar">
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="admin" class="mobile-logo">Sound</a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <img src="{{ url('frontend/assets/images/svg/horizontal.svg') }}"
                                                class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                            <img src="frontend/assets/images/svg/verticle.svg"
                                                class="img-fluid menu-hamburger-vertical" alt="verticle">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="frontend/assets/images/svg/menu.svg"
                                                class="img-fluid menu-hamburger-collapse" alt="collapse">
                                            <img src="{{ url('frontend/assets/images/svg/close.svg') }}"
                                                class="img-fluid menu-hamburger-close" alt="close"
                                                style="display: none;">
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="languagebar">
                                        <a class="btn btn-primary" href="{{ url('/') }}">Live Preview </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="topbar">
                <div class="row align-items-center">
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <img src="{{ url('frontend/assets/images/svg/menu.svg') }}"
                                                class="img-fluid menu-hamburger-collapse" alt="menu">
                                            <img src="{{ url('frontend/assets/images/svg/close.svg') }}"
                                                class="img-fluid menu-hamburger-close" alt="close"
                                                style="display: none;">
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="profilebar">

                                        <!-- Right Side Of Navbar -->
                                        <ul class="navbar-nav ms-auto">

                                            <!-- Authentication Links -->
                                            @guest
                                                @if (Route::has('login'))
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    </li>
                                                @endif

                                                @if (Route::has('register'))
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                                    </li>
                                                @endif
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" v-pre>
                                                        {{ Auth::user()->name }}<span
                                                            class="feather icon-chevron-down live-icon"></span>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="navbarDropdown">

                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                                                 document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>

                                            @endguest
                                        </ul>
                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
