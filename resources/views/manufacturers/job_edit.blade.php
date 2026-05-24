@extends('layouts.app_manufacturers')

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
        <li class="breadcrumb-item"><a href="{{ url('dashboard/manufacturers/jobs/'.$id) }}">Jobs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Job Create</li>
    </ol>
</nav>

<form enctype="multipart/form-data" action="{{url('dashboard/manufacturers/jobs/job_update/'.$id.'/'.$user_id)}}" method="post" id="job_create_form" enctype="multipart/form-data" >
    @csrf
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Job Create</h4>
                  </div>
                </div>
                
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Job Name</label>
                                <input name="name" value="{{$job_data->name}}" type="text" class="form-control" placeholder="Job Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea name="description" class="form-control" placeholder="Job Description" rows="4">{{$job_data->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" placeholder="example@yopmail.com" value="{{$job_data->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0"> 
                                        <select name="ccode" class="form-control pl-0">
                                            <option value="+91" @if($job_data->ccode == '+91') selected @endif >+91</option>
                                            <option value="+61" @if($job_data->ccode == '+61') selected @endif >+61</option>
                                            <option value="+86" @if($job_data->ccode == '+86') selected @endif >+86</option>
                                            <option value="+60" @if($job_data->ccode == '+60') selected @endif >+60</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="{{$job_data->phone}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website">Website Link</label>
                                <input name="website" value="{{$job_data->website}}" type="text" class="form-control" placeholder="Website Link">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address" value="{{$job_data->address}}" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input name="country" value="{{$job_data->country}}" type="text" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input name="state" value="{{$job_data->state}}" type="text" class="form-control" placeholder="State">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input name="city" value="{{$job_data->city}}" type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input name="zip_code" value="{{$job_data->zip_code}}" type="text" class="form-control" placeholder="Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_category">Job Category</label>
                                
                                <select class="form-control" name="job_category">
                                    <option value="">Select Job Category</option>
                                    @if(count($job_categories) > 0)
                                    @foreach($job_categories as $category)
                                            <option value="{{ $category->id }}" @if($job_data->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label class="color-theme">Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                @error('photos')
                              <div style="padding: .5em!important;margin-bottom: .5em!important;" class="alert alert-danger col-lg-6" role="alert">
                                {{$message}}
                              </div>
                            @enderror
                               <!--  <p class="meta-date-time">(Image Size should be 400*500)</p> -->
                                <label class="custom-file-container__custom-file" >
                                  <input name='photos[]' type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                  <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                              </div>
                        </div>
                    </div>

                    
                    @if(count($job_images) > 0)
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body">
                            <h6 class="card-title mb-2">Job Images</h6>
                            <div class="row">
                            @foreach($job_images as $images)
                                <div class="col-lg-6 col-xl-4 pt-0 pl-0 pr-0 mb-4">
                                <!-- Simple card -->
                                <div class="container mb-4 mb-xl-0">
                                <img src="{{ $images->image_thumb_path }}" style="height: 140px" class="image card-img-top" alt="...">
                                    <div class="middle">
                                    <div class="text">
                                        <a href="{{url('dashboard/manufacturers/jobs/image_delete/'.$images->id.'/'.$user_id)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Image">
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
                        <!-- end card -->
                    </div>
                    </div>
                    @endif

                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
                
            </div>
        </div>
    </div>
    
</div>
</form>
<script>
    var root_path = "{{URL::to('dashboard/manufacturers')}}";
    
  </script>
@endsection