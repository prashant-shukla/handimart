@extends('layouts.app_photographers')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard/photographers/jobs/' . $id) }}">Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
        </ol>
    </nav>

    <div class="container">
        <div class="row">
            @if (count($job_listing) > 0)
                @php $counts = 0; @endphp
                @foreach ($job_listing as $job_data)
                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <div class="owl-carousel owl-theme owl-fadeout">
                                    @if (count($job_data->images) > 0)
                                        @foreach ($job_data->images as $image_data)
                                            <div class="item">
                                                <img src="{{ $image_data->image_thumb_path }}" alt="job-image"
                                                    style="height: 150px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('uploads/jobs/') . '/' . 'no-image.jpg' }}" alt="no-image"
                                            style="height: 150px; object-fit: cover;">
                                    @endif

                                </div>


                                <div class="d-flex align-items-center mb-2">
                                    <p class="text-muted title" style="font-weight: 700;">{{ $job_data->name }}</p>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <p class="text-muted">{{ $job_data->description }}</p>
                                </div>


                            </div>
                            <div class="row">
                                <div class="datesection col-md-6">
                                    {{ date('F jS, Y', strtotime($job_data->created_at)) }}
                                </div>
                                <div class="actionset col-md-6">
                                    <!-- <a href="#" class=" view" data-id="{{ $job_data->id }}" data-userid="{{ $id }}">
                                <i class="link-icon" data-feather="eye" style="font-size: 12px;"></i>
                            </a> -->
                                    <a href="{{ url('dashboard/photographers/jobs/edit/' . $job_data->id . '/' . $id) }}"
                                        class="  edit" data-id="{{ $job_data->id }}" data-userid="{{ $id }}">
                                        <i class="actionicon" data-feather="edit" style="font-size: 12px;"></i>
                                    </a>
                                    <a href="#" class=" deleteJob" data-id="{{ $job_data->id }}"
                                        data-userid="{{ $id }}">
                                        <i class="actionicon" data-feather="trash-2" style="font-size: 12px;"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                    @php $counts = $counts + 1; @endphp

                    @if ($counts >= 3)
                        @php $counts = 0; @endphp
        </div>
        <div class="row" style="margin-top: 20px;">
            @endif
            @endforeach
            @endif


        </div>
    </div>
    <script>
        var root_path = "{{ URL::to('dashboard/photographers/jobs') }}";
    </script>
@endsection
