<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <title>{{ config('app.name', 'HandiMart') }} Connect with Skilled Craftsmen, Designers, Exporters, Manufacturers, Painters, and Photographers.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Craftsmen, Designers, Exporters, Manufacturers, Painters, Photographers, HandiMart, Artisans, Creative Professionals, Handmade Goods, Design Services, Export Services in India">
    <meta name="description" content=" HandiMart.in is a premier platform connecting you with skilled craftsmen, innovative designers, reliable exporters, versatile manufacturers, talented painters, and professional photographers. Discover top talent and quality services in one place in India.">
    <meta name="CreativeLayers" content="ATFN">
    <!-- Title -->



    <!-- Favicon -->
    <link href="{{ asset('images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />
    <!-- Apple Touch Icon -->
    <link href="{{ asset('images/apple-touch-icon-60x60.png') }}" sizes="60x60" rel="apple-touch-icon">
    <link href="{{ asset('images/apple-touch-icon-72x72.png') }}" sizes="72x72" rel="apple-touch-icon">
    <link href="{{ asset('images/apple-touch-icon-114x114.png') }}" sizes="114x114" rel="apple-touch-icon">
    <link href="{{ asset('images/apple-touch-icon-180x180.png') }}" sizes="180x180" rel="apple-touch-icon">



    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ace-responsive-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ud-custom-spacing.css') }}">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">

</head>

<body>
    <div class="wrapper ovh">
        <div class="preloader"></div>

        <!-- Main Header Nav -->
        @include('layouts.include.header')

        <div class="hiddenbar-body-ovelay"></div>
        <!-- Mobile Nav  -->
        <div id="page" class="mobilie_header_nav stylehome1">
            <div class="mobile-menu">
                <div class="header bdrb1">
                    <div class="menu_and_widgets">
                        <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                            <a class="mobile_logo" href="#"><img
                                    src="{{ ($content?->logo) ? asset('uploads/logo/' . $content->logo) : asset('images/logo-white-2.png') }}"
                                    alt=""></a>
                            <div class="right-side text-end">
                                <a class="" href="{{ route('login') }}">join</a>
                                <a class="menubar ml30" href="#menu"><img
                                        src="{{ asset('images/mobile-dark-nav-icon.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="posr">
                        <div class="mobile_menu_close_btn"><span class="far fa-times"></span></div>
                    </div>
                </div>
            </div>
            <!-- /.mobile-menu -->
            <nav id="menu" class="">
                <ul>
                    <li> <a class="list-item pe-0" href="{{ route('craftman') }}">Carftsmen</a></li>
                    <li> <a class="list-item pe-0" href="{{ route('manufacture_exporter') }}">Exporter &
                            Manufacture</a>
                    </li>
                    <li> <a class="list-item pe-0" href="#">Buyer Requirement</a></li>
                    <li> <a class="list-item pe-0" href="{{ route('contactus') }}">Contact</a></li>
                    <!-- Only for Mobile View -->
                </ul>
            </nav>
        </div>
        <div class="body_content">

            @yield('content')
            <!-- Our Footer -->
            @include('layouts.include.footer')

            {{-- <a class="scrollToHome at-home2" href="#"><i class="fas fa-angle-up"></i></a> --}}
        </div>
    </div>
    <!-- Wrapper End -->
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mmenu.all.js') }}"></script>
    <script src="{{ asset('js/ace-responsive-menu.js') }}"></script>
    <script src="{{ asset('js/jquery-scrolltofixed-min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/pricing-table.js') }}"></script>
    <!-- Custom script for all pages -->
    <script src="{{ asset('js/script.js') }}"></script>


    @yield('script')
</body>

</html>
