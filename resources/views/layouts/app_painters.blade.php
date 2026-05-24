<!DOCTYPE HTML>
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

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/animate.css/animate.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/simplemde/simplemde.min.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/costom.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ admin_favicon() }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/file-upload/file-upload-with-preview.min.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar">
                <div class="sidebar-header">
                    <a href="{{ url('') }}" class="sidebar-brand">
                        <img src="{{ get_dark_logo() }}" style="width: 86%;">
                    </a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="nav bg">
                        <!--  <li class="nav-item nav-category">Pages </li> -->
                        @if (Auth::user()->role_id == '1')
                            <li class="nav-item {{ active_class(['dashboard']) }}">
                                <a href="{{ url('dashboard/painters') }}" class="nav-link back-link">
                                    <i class="link-icon" data-feather="arrow-left-circle"></i>
                                    <span class="link-title">Back</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item {{ Route::is('painters.my-profile') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/my-profile/' . $id) }}" class="nav-link ">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item nav-category">Profile</li>
                        <li class="nav-item {{ Route::is('painters.profile') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/my-profile/profile/' . $id) }}"
                                class="bg nav-link {{ active_class(['my-profile/profile']) }}">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::is('painters.personal-detail') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/my-profile/personal-detail/' . $id) }}"
                                class="bg nav-link {{ active_class(['my-profile/personal-detail']) }}">
                                <i class="link-icon" data-feather="edit"></i>
                                <span class="link-title">Edit Profile</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Route::is('painters.social-detail') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/my-profile/social-detail/' . $id) }}"
                                class="nav-link {{ active_class(['my-profile/social-detail']) }}">
                                <i class="link-icon" data-feather="users"></i>
                                <span class="link-title">Social-Details</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::is('painters.update-password') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/my-profile/update-password/' . $id) }}"
                                class="nav-link {{ active_class(['my-profile/update-password']) }}">
                                <i class="link-icon" data-feather="lock"></i>
                                <span class="link-title">Account Detail</span>
                            </a>
                        </li>

                        <li class="nav-item nav-category">Start Service</li>
                        <li class="nav-item {{ request()->routeIs('painters.business-detail') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/business-profile/business-detail/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.business-detail') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="briefcase"></i>
                                <span class="link-title"> Business Detail </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('painters.image-gallery') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/business-profile/image-gallery/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.image-gallery') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="image"></i>
                                <span class="link-title"> Image Gallery </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('painters.promotional-video') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/business-profile/promotional-video/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.promotional-video') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="video"></i>
                                <span class="link-title"> Promotional Video </span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('painters.address') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/business-profile/address/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.address') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="map-pin"></i>
                                <span class="link-title"> Address </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('dashboard/painters/jobs_a*') ? 'active' : '' }}">
                            <a class="nav-link" data-toggle="collapse" href="#jobs_a" role="button"
                                aria-expanded="false" aria-controls="jobs_a">
                                <i class="link-icon" data-feather="briefcase"></i>
                                <span class="link-title">Post Your Requirement</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse {{ request()->is('dashboard/painters/jobs_a*') ? 'show' : '' }}"
                                id="jobs_a">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ url('dashboard/painters/jobs_a/create/' . $id) }}"
                                            class="nav-link  {{ request()->routeIs('painters.job_a_create') ? 'active' : '' }}">Add
                                            Requirement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('dashboard/painters/jobs_a/' . $id) }}"
                                            class="nav-link {{ request()->routeIs('painters.jobs_a') ? 'active' : '' }}">Manage
                                            Requirement</a>
                                    </li>
                                    <!-- <li class="nav-item ">
                      <a href="{{ url('dashboard/painters/jobs_application/' . $id) }}" class="nav-link {{ request()->is('/painters/jobs_application/*') ? 'active' : '' }}">Received Enquiry</a>
                    </li> -->
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item nav-category">Enquiries</li>
                        <li class="nav-item {{ request()->routeIs('painters.enquiries') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/enquiries/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.enquiries') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Enquiries</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Reviews</li>
                        <li class="nav-item {{ request()->routeIs('painters.reviews') ? 'active' : '' }}">
                            <a href="{{ url('dashboard/painters/reviews/' . $id) }}"
                                class="nav-link {{ request()->routeIs('painters.reviews') ? 'active' : '' }}">
                                <i class="link-icon" data-feather="star"></i>
                                <span class="link-title">Reviews & Ratings</span>
                            </a>
                        </li>

                        @if (Auth::user()->role_id == '1')
                            <li class="nav-item nav-category">Delete Account</li>
                            <li class="nav-item ">
                                <a class="nav-link deleteuser" data-id="{{ $id }}" href="#">
                                    <i class="link-icon" data-feather="trash-2"></i>
                                    <span class="link-title">Delete Now</span>
                                </a>
                            </li>
                        @endif

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
                        <!-- <form class="search-form">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="search"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div>
                    </form> -->
                        <ul class="navbar-nav">
                            <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                            </div>
            </li>
                        <li class="nav-item dropdown nav-apps">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">Web Apps</p>
                                    <a href="javascript:;" class="text-muted">Edit</a>
                                </div>
                                <div class="dropdown-body">
                                    <div class="d-flex align-items-center apps">
                                        <a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                                        <a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                                        <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                                        <a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                                    </div>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li> -->
                            <li class="nav-item dropdown nav-messages">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="mail"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                    <!-- <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">9 New Messages</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div> -->
                                    <div class="dropdown-body">
                                        @php
                                            $user_recent_chat = get_user_recent_chat($id);
                                        @endphp
                                        @if (isset($user_recent_chat) && count($user_recent_chat) > 0)
                                            @foreach ($user_recent_chat as $message_data)
                                                <a href="{{ url('dashboard/painters/enquiries/' . $id . '/' . $message_data->contact_id) }}"
                                                    class="dropdown-item">
                                                    <div class="figure">
                                                        <img src="{{ $message_data->messages_user_data->image_thumb_path }}"
                                                            alt="userr">
                                                    </div>
                                                    <div class="content">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p>{{ ucfirst($message_data->messages_user_data->name) }}
                                                            </p>
                                                            <p class="sub-text text-muted">
                                                                {{ $message_data->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        @if ($message_data->message == '' && $message_data->file != '')
                                                            <p class="sub-text text-muted">Photo shared</p>
                                                        @else
                                                            <p class="sub-text text-muted">
                                                                {{ \Illuminate\Support\Str::limit($message_data->message, $limit = 18, $end = '...') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                        <a href="{{ url('dashboard/painters/enquiries/' . $id) }}">View all</a>
                                    </div>
                                </div>
                            </li>
                            <!-- <li class="nav-item dropdown nav-notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        </li> -->
                            <li class="nav-item dropdown nav-profile">
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="{{ get_user_profile_pic($id) }}" alt="profile">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <div class="dropdown-header d-flex flex-column align-items-center">
                                        <div class="figure mb-3">
                                            <img src="{{ get_user_profile_pic($id) }}" alt="">
                                        </div>
                                        <div class="info text-center">
                                            <p class="name font-weight-bold mb-0">{{ get_user_name($id) }}</p>
                                            <p class="email text-muted mb-3">{{ get_user_id($id) }}</p>
                                        </div>
                                    </div>
                                    <div class="dropdown-body">
                                        <ul class="profile-nav p-0 pt-3">
                                            <li class="nav-item">
                                                <a href="{{ url('dashboard/painters/my-profile/profile/' . $id) }}"
                                                    class="nav-link">
                                                    <i data-feather="user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('dashboard/painters/my-profile/personal-detail/' . $id) }}"
                                                    class="nav-link">
                                                    <i data-feather="edit"></i>
                                                    <span>Edit Profile</span>
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
                            target="_blank">HandiMart</a>. All rights reserved</p>

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
        <!-- end plugin js for this page -->
        <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>



        <!-- custom js for this page -->
        <script src="{{ asset('admin/assets/js/form-validation.js') }}"></script>
        <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
        <script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>
        <script src="{{ asset('admin/assets/js/file-upload.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/file-upload/file-upload-with-preview.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/carousel.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/simplemde/simplemde.min.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/simplemde.js') }}"></script>
        <script src="{{ asset('admin/assets/js/tinymce.js') }}"></script>
        <script src="{{ asset('admin/assets/js/chat.js') }}"></script>
        <!-- end custom js for this page -->

        <script>
            //First upload
            var firstUpload = new FileUploadWithPreview('myFirstImage')
            //Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage')
        </script>

    </div>
</body>

</html>
