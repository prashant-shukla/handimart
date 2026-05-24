@extends('layouts.app_craftmans')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
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
        <li class="breadcrumb-item"><a href="{{ url('dashboard/craftmans/jobs/'.$job_id) }}">Jobs</a></li>
        <li class="breadcrumb-item" aria-current="page">Job Preview</li>
        <li class="breadcrumb-item active" aria-current="page">{{$jobs->name}}</li>
    </ol>
</nav>

<div class="row ">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin pd-left-10" >
                  <div>
                    <h4 class="mb-3 mb-md-0">Job Preview</h4>
                  </div>
                </div>
                <div class="row pd-left-15" >
                    <div class="col-md-2 logo_section">
                        <img src="{{$jobs->image_thumb_path}}" alt="Job Logo" class="job_logo">
                    </div>
                    <div class="col-md-6 mt-15">
                        <label class="job_title">{{$jobs->name}}</label><br>
                        @if($jobs->website != '')
                        <label class="job_website">
                            <a href="{{$jobs->website}}" target="_blank"><i class="fa fa-link"></i> {{$jobs->website}}</a>
                        </label>
                        @endif
                        @if($jobs->url_email != '')
                        <label class="job_website">
                            <a href="{{$jobs->url_email}}" target="_blank"><i class="fa fa-link"></i> {{$jobs->url_email}}</a>
                        </label>
                        @endif
                        @if($jobs->twitter != '')
                        <label class="job_twitter">
                            <a href="http://twitter.com/{{$jobs->twitter}}">
                                <i class="fa fa-twitter"></i>
                                @ {{$jobs->twitter}}
                            </a>
                        </label>
                        @endif
                        <br>
                        <label class="job_type">
                            <span>Job Type :</span> {{$jobs->type_name}}
                        </label><br>
                        <label class="job_type">
                            <span>Job Category :</span> {{$jobs->category_name}}
                        </label>
                    </div>
                    <div class="col-md-4 text-right horizontal-center">
                        <div class="horizontal-center-inner" >
                            <a href="{{URL::to('dashboard/craftmans/jobs_a/edit/'.$job_id.'/'.$id)}}" class=" btn btn-outline-dark btn-custom-1" title="Edit"><i class="fa fa-pencil-square-o" ></i></a>
                            <a href="{{URL::to('dashboard/craftmans/jobs_a/post_now/'.$job_id.'/'.$id)}}" class="btn btn-success btn-custom-2" >Post Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card"> 
            <div class="card-body pd-custom-1" >
            
                <h6 class="mt-15 mb-20" >Job Description</h6>
                <div class="job_description">
                    {!! html_entity_decode($jobs->description) !!}
                </div>

                <div class="row mt-40" >
                    <div class="col-md-12" >

                        @if(count($job_images) > 0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    @foreach ($job_images as $image_data)
                                    <div class="col-lg-6 col-xl-3 pt-0 pl-0 pr-0 mb-4">
                                        <!-- Simple card -->
                                        <div class="container mb-4 mb-xl-0">
                                            <img class="img-heingh-120" src="{{$image_data->image_thumb_path}}" 
                                                class="image card-img-top" alt="...">
                                            <div class="middle">
                                                <div class="text">
                                                    <a href="{{url('dashboard/craftmans/jobs/image_delete/'.$image_data->id).'/'.$id}}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Delete Image">
                                                        <i data-feather="x-circle" class="icon-danger"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    @endforeach
                                </div>
                                <!-- end row -->
                                    
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card"> 
            <div class="card-body" >

                    
                        
                
                <div class="job-overview">
                    <h6 class="mb-15">Job Overview</h6>
                    <ul>
                        <li>
                            <i class="fa fa-calendar"></i>
                            <div>
                                <strong>Date Posted:</strong>
                                <span><time datetime="{{ date('Y-d-m', strtotime($jobs->created_at)) }}">{{ date('F jS, Y', strtotime($jobs->created_at)) }}</time></span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-calendar-check-o"></i>
                            <div>
                                <strong>Expiration date:</strong>
                                <span>{{ date('F jS, Y', strtotime($jobs->closing_date)) }}</span>
                            </div>
                        </li>


                        <li>
                            <i class="fa fa-map-marker"></i>
                            <div>
                                <strong>Location:</strong>
                                <span class="location"><a class="google_map_link"
                                        href="{{$jobs->map_location}}"
                                        target="_blank">{{$jobs->address}}</a></span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-briefcase"></i>
                            <div>
                                <strong>Job Title:</strong>
                                <span>{{$jobs->name}}</span>
                            </div>
                        </li>

                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <div>
                                <strong>Email:</strong>
                                <span>{{$jobs->email}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-tags"></i>
                            <div>
                                <strong>Tags:</strong>
                                <span>{{$jobs->tags}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-building-o"></i>
                            <div>
                                <strong>Company Name:</strong>
                                <span>{{$jobs->company_name}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-quote-left"></i>
                            <div>
                                <strong>Tagline:</strong>
                                <span>{{$jobs->tagline}}</span>
                            </div>
                        </li>
                        <li>
                            <i class="fa fa-money"></i>
                            <div>
                                <strong>Budget:</strong>
                                <span>{{$jobs->budget}}</span>
                            </div>
                        </li>
                        @if($jobs->video_url != '')
                        <li>
                            <i class="fa fa-play-circle"></i>
                            <div>
                                <strong>Video:</strong>
                                <span class="location"><a class="video_url"
                                    href="{{$jobs->video_url}}"
                                    target="_blank">Watch Now</a></span>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
</div>
</form>
<script>
    var root_path = "{{URL::to('dashboard/craftmans')}}";
</script>
@endsection