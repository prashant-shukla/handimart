@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('setting') }}">Contact Mails</a></li>
        <!-- <li class="breadcrumb-item " aria-current="page"><a href="{{ route('setting.regions') }}">All Mails</a></li> -->
        <li class="breadcrumb-item active" aria-current="page">All Mails</li>
    </ol>
</nav>


<div class="row inbox-wrapper">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 email-aside border-lg-right">
                        <div class="aside-content">
                            <div class="aside-header">
                                <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse"
                                    type="button"><span class="icon"><i
                                            data-feather="chevron-down"></i></span></button><span class="title">Mail
                                    Service</span>
                                <p class="description">amiahburton@gmail.com</p>
                            </div>
                            <div class="aside-compose"><a class="btn btn-primary btn-block"
                                    href="../../../demo_1/pages/email/compose.html">Compose Email</a></div>
                            <div class="aside-nav collapse">
                                <ul class="nav">
                                    <li class="active"><a href="{{ route('contact-us') }}"><span class="icon"><i
                                                    data-feather="inbox"></i></span>Inbox<span
                                                class="badge badge-danger-muted text-white font-weight-bold float-right">@if ( count($unread_count)!==0) {{count($unread_count)}} @else 0 @endif</span></a>
                                    </li>
                                    <li><a href="#"><span class="icon"><i data-feather="mail"></i></span>Sent Mail</a>
                                    </li>
                                    <li><a href="#"><span class="icon"><i
                                                    data-feather="briefcase"></i></span>Important<span
                                                class="badge badge-info-muted text-white font-weight-bold float-right">4</span></a>
                                    </li>
                                    <li><a href="#"><span class="icon"><i data-feather="file"></i></span>Drafts</a></li>
                                    <li><a href="#"><span class="icon"><i data-feather="star"></i></span>Tags</a></li>
                                    <li><a href="#"><span class="icon"><i data-feather="trash"></i></span>Trash</a></li>
                                </ul>
                                <!-- <span class="title">Labels</span>
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                        <a href="#"><i data-feather="tag" class="text-warning"></i> Important </a>
                                    </li>
                                    <li><a href="#">
                                            <i data-feather="tag" class="text-primary"></i> Business </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i data-feather="tag" class="text-info"></i> Inspiration </a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    @if( $status == 'read')
                    @include('contact.read_page')
                    @else
                    @include('contact.contact_main')  
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    var root_path = "{{URL::to('dashboard/contact-us')}}";
    var csrf_token = "{{ csrf_token() }}";
</script>

@endsection