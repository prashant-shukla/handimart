<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HandiMart') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/core/core.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jquery-steps/jquery.steps.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/costom.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ admin_favicon() }}" />
</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar">
                <div class="sidebar-header">
                    <a href="#" class="sidebar-brand">
                        <img src="{{ get_dark_logo() }}" style="width: 86%;">
                    </a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="nav">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="file-text"></i>
                                <span class="link-title">Post</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="image"></i>
                                <span class="link-title">Media</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#pages" role="button"
                                aria-expanded="false" aria-controls="pages">
                                <i class="link-icon" data-feather="file"></i>
                                <span class="link-title">Pages</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="pages">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">About</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item nav-category">Members</li>
                        <li class="nav-item {{ request()->is('dashboard/craftmans*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#craftmans" role="button"
                                aria-expanded="false" aria-controls="craftmans">
                                <i class="link-icon" data-feather="users"></i>
                                <span class="link-title">Craftmans</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/craftmans*') ? 'show' : '' }}"
                                id="craftmans">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('craftmans.new') }}"
                                            class="nav-link {{ request()->routeIs('craftmans.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('craftmans') }}"
                                            class="nav-link {{ request()->routeIs('craftmans') ? 'active' : '' }}">All
                                            Craftmans</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('craftmans.categories') }}"
                                            class="nav-link {{ request()->routeIs('craftmans.categories') ? 'active' : '' }} {{ request()->routeIs('craftmans.category_edit') ? 'active' : '' }}">Carftsman
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('craftmans.skills') }}"
                                            class="nav-link {{ request()->routeIs('craftmans.skills') ? 'active' : '' }} {{ request()->routeIs('craftmans.skill_edit') ? 'active' : '' }}">Carftsman
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item {{ request()->is('dashboard/manufacturers*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#manufacturers" role="button"
                                aria-expanded="false" aria-controls="manufacturers">
                                <i class="link-icon" data-feather="layers"></i>
                                <span class="link-title">Manufacturers</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/manufacturers*') ? 'show' : '' }}"
                                id="manufacturers">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('manufacturers.new') }}"
                                            class="nav-link {{ request()->routeIs('manufacturers.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manufacturers') }}"
                                            class="nav-link {{ request()->routeIs('manufacturers') ? 'active' : '' }}">All
                                            Manufacturers</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('manufacturers.categories') }}"
                                            class="nav-link {{ request()->routeIs('manufacturers.categories') ? 'active' : '' }} {{ request()->routeIs('manufacturers.category_edit') ? 'active' : '' }}">Manufacturers
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manufacturers.skills') }}"
                                            class="nav-link {{ request()->routeIs('manufacturers.skills') ? 'active' : '' }} {{ request()->routeIs('manufacturers.skill_edit') ? 'active' : '' }}">Manufacturers
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item {{ request()->is('dashboard/exporters*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#exporters" role="button"
                                aria-expanded="false" aria-controls="exporters">
                                <i class="link-icon" data-feather="truck"></i>
                                <span class="link-title">Exporters</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/exporters*') ? 'show' : '' }}"
                                id="exporters">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('exporters.new') }}"
                                            class="nav-link {{ request()->routeIs('exporters.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('exporters') }}"
                                            class="nav-link {{ request()->routeIs('exporters') ? 'active' : '' }}">All
                                            Exporters</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('exporters.categories') }}"
                                            class="nav-link {{ request()->routeIs('exporters.categories') ? 'active' : '' }} {{ request()->routeIs('exporters.category_edit') ? 'active' : '' }}">Exporter
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('exporters.skills') }}"
                                            class="nav-link {{ request()->routeIs('exporters.skills') ? 'active' : '' }} {{ request()->routeIs('exporters.skill_edit') ? 'active' : '' }}">Exporter
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item {{ request()->is('dashboard/designers*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#designers" role="button"
                                aria-expanded="false" aria-controls="designers">
                                <i class="link-icon" data-feather="git-merge"></i>
                                <span class="link-title">Designers</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/designers*') ? 'show' : '' }}"
                                id="designers">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('designers.new') }}"
                                            class="nav-link {{ request()->routeIs('designers.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('designers') }}"
                                            class="nav-link {{ request()->routeIs('designers') ? 'active' : '' }}">All
                                            Designers</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('designers.categories') }}"
                                            class="nav-link {{ request()->routeIs('designers.categories') ? 'active' : '' }} {{ request()->routeIs('designers.category_edit') ? 'active' : '' }}">Designers
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('designers.skills') }}"
                                            class="nav-link {{ request()->routeIs('designers.skills') ? 'active' : '' }} {{ request()->routeIs('designers.skill_edit') ? 'active' : '' }}">Designers
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item {{ request()->is('dashboard/photographers*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#photographers" role="button"
                                aria-expanded="false" aria-controls="photographers">
                                <i class="link-icon" data-feather="camera"></i>
                                <span class="link-title">Photographers</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/photographers*') ? 'show' : '' }}"
                                id="photographers">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('photographers.new') }}"
                                            class="nav-link {{ request()->routeIs('photographers.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('photographers') }}"
                                            class="nav-link {{ request()->routeIs('photographers') ? 'active' : '' }}">All
                                            Photographers</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('photographers.categories') }}"
                                            class="nav-link {{ request()->routeIs('photographers.categories') ? 'active' : '' }} {{ request()->routeIs('photographers.category_edit') ? 'active' : '' }}">Photographers
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('photographers.skills') }}"
                                            class="nav-link {{ request()->routeIs('photographers.skills') ? 'active' : '' }} {{ request()->routeIs('photographers.skill_edit') ? 'active' : '' }}">Photographers
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item {{ request()->is('dashboard/painters*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#painters" role="button"
                                aria-expanded="false" aria-controls="painters">
                                <i class="link-icon" data-feather="edit-3"></i>
                                <span class="link-title">Painters</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/painters*') ? 'show' : '' }}"
                                id="painters">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('painters.new') }}"
                                            class="nav-link {{ request()->routeIs('painters.new') ? 'active' : '' }}">New
                                            Added</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('painters') }}"
                                            class="nav-link {{ request()->routeIs('painters') ? 'active' : '' }}">All
                                            Painters</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('painters.categories') }}"
                                            class="nav-link {{ request()->routeIs('painters.categories') ? 'active' : '' }} {{ request()->routeIs('painters.category_edit') ? 'active' : '' }}">Painters
                                            Catrgories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('painters.skills') }}"
                                            class="nav-link {{ request()->routeIs('painters.skills') ? 'active' : '' }} {{ request()->routeIs('painters.skill_edit') ? 'active' : '' }}">Painters
                                            Skills</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item nav-category"></li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#products" role="button"
                                aria-expanded="false" aria-controls="products">
                                <i class="link-icon" data-feather="package"></i>
                                <span class="link-title">Products</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="products">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">All Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Product Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#jobs" role="button"
                                aria-expanded="false" aria-controls="jobs">
                                <i class="link-icon" data-feather="briefcase"></i>
                                <span class="link-title">Jobs</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="jobs">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">All Jobs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Jobs Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Jobs Regions</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#jobs" role="button"
                                aria-expanded="false" aria-controls="jobs">
                                <i class="link-icon" data-feather="clipboard"></i>
                                <span class="link-title">Job Application</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="jobs">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">All Job Application</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Add New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Export / Import Application</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact-us') }}" class="nav-link">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Contact</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('users') ? 'active' : '' }}">
                            <a href="{{ route('users') }}" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">User</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('dashboard/setting*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#settings" role="button"
                                aria-expanded="false" aria-controls="settings">
                                <i class="link-icon" data-feather="settings"></i>
                                <span class="link-title">Settings</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/setting*') ? 'show' : '' }}"
                                id="settings">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('setting') }}"
                                            class="nav-link {{ request()->routeIs('setting') ? 'active' : '' }}">Company
                                            Settings</a>
                                    </li>
                                    <!-- <li class="nav-item">
                      <a href="#" class="nav-link">Localization</a>
                    </li> -->
                                    <li class="nav-item">
                                        <a href="{{ route('setting.theme-setting') }}"
                                            class="nav-link {{ request()->routeIs('setting.theme-setting') ? 'active' : '' }}">Theme
                                            Settings</a>
                                    </li>
                                    <!-- <li class="nav-item">
                      <a href="#" class="nav-link">Roles & Permissions</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Email Settings</a>
                    </li> -->
                                    <li class="nav-item">
                                        <a href="{{ route('setting.change-password') }}"
                                            class="nav-link {{ request()->routeIs('setting.change-password') ? 'active' : '' }}">Change
                                            Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('setting.regions') }}"
                                            class="nav-link {{ request()->routeIs('setting.regions') ? 'active' : '' }}">Regions
                                            Manager</a>
                                    </li>
                                </ul>
                            </div>
                        </li>




                    </ul>
                </div>
            </nav>

            <!-- partial -->

            <div class="page-wrapper">

                <!-- partial:partials/_navbar.html -->
                <nav class="navbar">
                    <a href="#" class="sidebar-toggler">
                        <i data-feather="menu"></i>
                    </a>
                    <div class="navbar-content">
                        <form class="search-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i data-feather="search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="navbarForm"
                                    placeholder="Search here...">
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                                        class="font-weight-medium ml-1 mr-1">English</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <a href="javascript:;" class="dropdown-item py-2"><i
                                            class="flag-icon flag-icon-us" title="us" id="us"></i> <span
                                            class="ml-1"> English </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i
                                            class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span
                                            class="ml-1"> French </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i
                                            class="flag-icon flag-icon-de" title="de" id="de"></i> <span
                                            class="ml-1"> German </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i
                                            class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span
                                            class="ml-1"> Portuguese </span></a>
                                    <a href="javascript:;" class="dropdown-item py-2"><i
                                            class="flag-icon flag-icon-es" title="es" id="es"></i> <span
                                            class="ml-1"> Spanish </span></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-apps">
                                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="grid"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">Web Apps</p>
                                        <a href="javascript:;" class="text-muted">Edit</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <div class="d-flex align-items-center apps">
                                            <a href="pages/apps/chat.html"><i data-feather="message-square"
                                                    class="icon-lg"></i>
                                                <p>Chat</p>
                                            </a>
                                            <a href="pages/apps/calendar.html"><i data-feather="calendar"
                                                    class="icon-lg"></i>
                                                <p>Calendar</p>
                                            </a>
                                            <a href="pages/email/inbox.html"><i data-feather="mail"
                                                    class="icon-lg"></i>
                                                <p>Email</p>
                                            </a>
                                            <a href="pages/general/profile.html"><i data-feather="instagram"
                                                    class="icon-lg"></i>
                                                <p>Profile</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="javascript:;">View all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-messages">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="mail"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">9 New Messages</p>
                                        <a href="javascript:;" class="text-muted">Clear all</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Leonardo Payne</p>
                                                    <p class="sub-text text-muted">2 min ago</p>
                                                </div>
                                                <p class="sub-text text-muted">Project status</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Carl Henson</p>
                                                    <p class="sub-text text-muted">30 min ago</p>
                                                </div>
                                                <p class="sub-text text-muted">Client meeting</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Jensen Combs</p>
                                                    <p class="sub-text text-muted">1 hrs ago</p>
                                                </div>
                                                <p class="sub-text text-muted">Project updates</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Amiah Burton</p>
                                                    <p class="sub-text text-muted">2 hrs ago</p>
                                                </div>
                                                <p class="sub-text text-muted">Project deadline</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="figure">
                                                <img src="https://via.placeholder.com/30x30" alt="userr">
                                            </div>
                                            <div class="content">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p>Yaretzi Mayo</p>
                                                    <p class="sub-text text-muted">5 hr ago</p>
                                                </div>
                                                <p class="sub-text text-muted">New record</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="javascript:;">View all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-notifications">
                                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="bell"></i>
                                    <div class="indicator">
                                        <div class="circle"></div>
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                                        <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                        <a href="javascript:;" class="text-muted">Clear all</a>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="user-plus"></i>
                                            </div>
                                            <div class="content">
                                                <p>New customer registered</p>
                                                <p class="sub-text text-muted">2 sec ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="gift"></i>
                                            </div>
                                            <div class="content">
                                                <p>New Order Recieved</p>
                                                <p class="sub-text text-muted">30 min ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="alert-circle"></i>
                                            </div>
                                            <div class="content">
                                                <p>Server Limit Reached!</p>
                                                <p class="sub-text text-muted">1 hrs ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="layers"></i>
                                            </div>
                                            <div class="content">
                                                <p>Apps are ready for update</p>
                                                <p class="sub-text text-muted">5 hrs ago</p>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <div class="icon">
                                                <i data-feather="download"></i>
                                            </div>
                                            <div class="content">
                                                <p>Download completed</p>
                                                <p class="sub-text text-muted">6 hrs ago</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="javascript:;">View all</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown nav-profile">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="https://via.placeholder.com/30x30" alt="profile">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="https://via.placeholder.com/80x80" alt="">
                                        </div>
                                        <div class="info text-center">
                                            <p class="name font-weight-bold mb-0">Amiah Burton</p>
                                            <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="dropdown-body">
                                        <ul class="profile-nav p-0 pt-3">
                                            <li class="nav-item">
                                                <a href="pages/general/profile.html" class="nav-link">
                                                    <i data-feather="user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link">
                                                    <i data-feather="edit"></i>
                                                    <span>Edit Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link">
                                                    <i data-feather="repeat"></i>
                                                    <span>Switch User</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('logout') }}" class="nav-link">

                                                    <i data-feather="log-out"></i>
                                                    <span>Log Out</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- partial -->

                <div class="page-content">
                    @yield('content')
                </div>


                <!-- partial:partials/_footer.html -->
                <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <p class="text-muted text-center text-md-left">Copyright © 2021 <a href="#"
                            target="_blank">HandiMart</a>. All
                        rights reserved</p>

                </footer>
                <!-- partial -->

            </div>
        </div>



        <!-- core:js -->
        <script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
        <!-- end plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/template.js') }}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="{{ asset('admin/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/jquery-steps/jquery.steps.min.js') }}"></script>
        <!-- end plugin js for this page -->
        <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>



        <!-- custom js for this page -->
        <script src="{{ asset('admin/assets/js/form-validation.js') }}"></script>
        <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
        <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
        <script src="{{ asset('admin/assets/js/file-upload.js') }}"></script>
        <script src="{{ asset('admin/assets/js/wizard.js') }}"></script>
        <!-- end custom js for this page -->


    </div>
</body>

</html>
