{{-- {{ dd(Route::currentRouteName()) }} --}}
@if (Route::currentRouteName() == 'about_us' ||
        Route::currentRouteName() == 'contact_us' ||
        Route::currentRouteName() == 'login' ||
        Route::currentRouteName() == 'frontregister' ||
        Route::currentRouteName() == 'craftman' ||
        Route::currentRouteName() == 'designer' ||
        Route::currentRouteName() == 'manufacture_exporter' ||
        Route::currentRouteName() == 'craftman_detail' ||
        Route::currentRouteName() == 'contactus' )
    <header class="header-nav nav-innerpage-style main-menu">
        <!-- Ace Responsive Menu -->
        <nav class="posr">
            <div class="container posr">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto px-0 px-xl-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="logos">
                                {{-- <a class="header-logo logo1" href="{{ url('/') }}"><img
                                        src="{{ ($content?->logo) ? asset('uploads/logo/' . $content->logo) : asset('images/logo-white-2.png') }}" alt="Header Logo"></a> --}}
                                <a class="header-logo logo2" href="{{ url('/') }}"><img
                                        src="{{ ($content?->dark_logo) ? asset('uploads/logo/' . $content->dark_logo) : asset('images/logo-white-2.png') }}"
                                        alt="Header Logo"></a>
                            </div>

                            <!-- Responsive Menu Structure-->
                            <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                                <li> <a class="list-item pe-0" href="{{ route('craftman') }}">Craftsmen</a></li>
                                <li> <a class="list-item pe-0" href="{{ route('designer') }}">Designer</a></li>
                                <li><a href="#">Photographer</a></li>
                                <li><a href="#">Painter</a></li>
                                <li> <a class="list-item pe-0" href="#">Exporter
                                            & Manufacture</a></li>
                                <li class="visible_list"> <a class="list-item" href="#"><span
                                            class="title">More</span></a>
                                    <ul>
                                        <li><a href="{{ route('about_us') }}">About Handimart</a></li>
                                        <li><a href="{{ route('contactus') }}">Contact</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto pe-0 pe-xl-3">
                        <div class="d-flex align-items-center">
                            <a class="login-info" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><span
                                    class="flaticon-loupe"></span></a>
                            <a class="login-info mx15-xl mx30" href=""><span
                                    class="d-none d-xl-inline-block">Become
                                    a</span> Member</a>
                            @if (Auth::check())
                                @if (Auth::user()->role_id != '7')
                                    <a href="{{ url('/') . '/' . get_dashboard_path() }}"
                                        class="login-infon login-info mr15-xl mr30">Dashboard</a>
                                @endif
                                <a href="{{ url('/') . '/' . get_profile_path() }}"
                                    class="login-info login-info mr15-xl mr30">
                                    <img class="userimg" src="{{ get_user_profile_pic(Auth::user()->id) }}"
                                        alt="usericon">
                                    My Profile</a>
                            @else
                                <a class="login-info mr15-xl mr30" href="{{ route('login') }}">Sign in</a>
                            @endif

                            @if (!Auth::check())
                                <a class="ud-btn add-joining bdrs50 text-thm2"
                                    href="{{ route('frontregister') }}">Join</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="search-modal">
            <div class="modal fade" id="exampleModalToggle" style="height: 1000px" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="fal fa-xmark"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="popup-search-field search_area">
                                <input type="text" class="form-control border-0"
                                    placeholder="What service are you looking for today?">
                                <label><span class="far fa-magnifying-glass"></span></label>
                                <button class="ud-btn btn-thm" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hiddenbar-body-ovelay"></div>



        <!-- Mobile Nav  -->
        <div id="page" class="mobilie_header_nav stylehome1">
            <div class="mobile-menu">
                <div class="header bdrb1">
                    <div class="menu_and_widgets">
                        <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                            <a class="mobile_logo" href="#"><img src="{{ asset('images/logo-white-2.png') }}"
                                    alt=""></a>
                            <div class="right-side text-end">
                                <a class="" href="page-login.html">join</a>
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
                    <li> <a class="list-item pe-0" href="{{ route('designer') }}">Designer</a></li>
                    <li> <a class="list-item pe-0" href="#">Buyer Requirement</a></li> 
                    <li><a href="#">Photographer</a></li>
                    <li><a href="#">Painter</a></li>
                    <li> <a class="list-item pe-0" href="#">Exporter & Manufacture</a></li>
                    {{-- <li><a href="{{ route('about_us') }}">About Handimart</a></li>
                    <li><a href="{{ route('contactus') }}">Contact</a></li>
                    <li><a href="{{ route('contactus') }}">Help</a></li> --}}
                    <!-- Only for Mobile View -->
                </ul>
            </nav>
        </div>
    </header>
@else
    <header class="header-nav nav-homepage-style stricky main-menu border-0">
        <!-- Ace Responsive Menu -->
        <nav class="posr">
            <div class="container posr">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto px-0 px-xl-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="logos">
                                <a class="header-logo logo1" href="{{ url('/') }}"><img
                                        src="{{ ($content?->logo) ? asset('uploads/logo/' . $content->logo) : asset('images/logo-white-2.png') }}"
                                        alt="Header Logo"></a>
                                <a class="header-logo logo2" href="{{ url('/') }}"><img
                                        src="{{ ($content?->dark_logo) ? asset('uploads/logo/' . $content->dark_logo) : asset('images/logo-white-2.png') }}"
                                        alt="Header Logo"></a>
                            </div>

                            <!-- Responsive Menu Structure-->
                            <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                                <li> <a class="list-item pe-0" href="{{ route('craftman') }}">Craftsmen</a></li>
                                <li> <a class="list-item pe-0" href="{{ route('designer') }}">Designer</a></li>
                                <li><a href="#">Photographer</a></li>
                                <li><a href="#">Painter</a></li>
                                <li> <a class="list-item pe-0" href="#">Exporter
                                            & Manufacture</a></li>
                                {{-- <li> <a class="list-item pe-0" href="#">Buyer Requirement</a></li> --}}

                                <li class="visible_list"> <a class="list-item" href="#"><span
                                            class="title">More</span></a>
                                    <ul>
                                        <li><a href="#">Photographer</a></li>
                                        <li><a href="{{ route('about_us') }}">About Handimart</a></li>
                                        <li><a href="{{ route('contactus') }}">Contact</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto pe-0 pe-xl-3">
                        <div class="d-flex align-items-center">
                            <a class="login-info" data-bs-toggle="modal" href="#exampleModalToggle"
                                role="button"><span class="flaticon-loupe"></span></a>
                            <a class="login-info mx15-xl mx30" href=""><span
                                    class="d-none d-xl-inline-block">Become
                                    a</span> Member</a>
                            @if (Auth::check())
                                @if (Auth::user()->role_id != '7')
                                    <a href="{{ url('/') . '/' . get_dashboard_path() }}"
                                        class="login-infon login-info mr15-xl mr30">Dashboard</a>
                                @endif
                                <a href="{{ url('/') . '/' . get_profile_path() }}"
                                    class="login-info login-info mr15-xl mr30">
                                    <img class="userimg" src="{{ get_user_profile_pic(Auth::user()->id) }}"
                                        alt="usericon">
                                    My Profile</a>
                            @else
                                <a class="login-info mr15-xl mr30" href="{{ route('login') }}">Sign in</a>
                            @endif

                            @if (!Auth::check())
                                <a class="ud-btn add-joining bdrs50 text-thm2"
                                    href="{{ route('frontregister') }}">Join</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="search-modal">
            <div class="modal fade" id="exampleModalToggle" style="height: 1000px" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="fal fa-xmark"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="popup-search-field search_area">
                                <input type="text" class="form-control border-0"
                                    placeholder="What service are you looking for today?">
                                <label><span class="far fa-magnifying-glass"></span></label>
                                <button class="ud-btn btn-thm" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hiddenbar-body-ovelay"></div>



        <!-- Mobile Nav  -->
        <div id="page" class="mobilie_header_nav stylehome1">
            <div class="mobile-menu">
                <div class="header bdrb1">
                    <div class="menu_and_widgets">
                        <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                            <a class="mobile_logo" href="#"><img src="{{ asset('images/logo-white-2.png') }}"
                                    alt=""></a>
                            <div class="right-side text-end">
                                <a class="" href="#">join</a>
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
                    <li> <a class="list-item pe-0" href="{{ route('designer') }}">Designer</a></li>
                    <li> <a class="list-item pe-0" href="#">Exporter & Manufacture</a></li>
                     <li><a href="#">Photographer</a></li>
                    <li><a href="#">Painter</a></li>
                    <li><a href="{{ route('about_us') }}">About Handimart</a></li>
                    <li><a href="{{ route('contactus') }}">Contact</a></li>
                    <li><a href="#">Help</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>
@endif
