@extends('layouts.app_photographers')

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
        <li class="breadcrumb-item"><a href="{{ url('dashboard/photographers/jobs/'.$id) }}">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Requirement</li>
    </ol>
</nav>

<form enctype="multipart/form-data" action="{{url('dashboard/photographers/job_store_a/'.$id)}}" method="post" id="job_create_form" enctype="multipart/form-data" >
    @csrf
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Create Requirement</h4>
                  </div>
                </div>
                
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection mt-0" >Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input id="email" class="form-control" name="email" type="text" placeholder="example@yopmail.com" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Job Title</label>
                                <input name="name" value="" type="text" class="form-control" placeholder="Job Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_category">Job Category</label>
                                
                                <select class="form-control" name="job_category">
                                    <option value="">Select Job Category</option>
                                    @if(count($job_categories) > 0)
                                    @foreach($job_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_type">Job Type</label>
                                
                                <select class="form-control" name="job_type">
                                    <option value="">Select Job Type</option>
                                    @if(count($job_types) > 0)
                                    @foreach($job_types as $job_type)
                                            <option value="{{ $job_type->id }}">{{ $job_type->name }}</option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Location <span class="color-light">(optional)</span></label>
                                <input name="address" value="" type="text" class="form-control" placeholder="Location">
                                <span class="color-light">Leave this blank if the location is not important</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tags">Job Tags <span class="color-light">(optional)</span></label>
                                <input name="tags" value="" type="text" class="form-control" placeholder="PHP, Social Media, Management">
                                <span>Comma separate tags.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <!-- <textarea name="description" class="form-control" placeholder="Job Description" rows="12"></textarea> -->
                                <textarea class="form-control" name="description" id="tinymceExample" rows="10" placeholder="Job Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="url_email">Application email / URL</label>
                                <input name="url_email" value="" type="text" class="form-control" placeholder="Enter an email address or website URL">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="closing_date">Closing Date</label>
                                <input name="closing_date"  id="example-date" value=""  class="form-control" placeholder="yyyy-mm-dd" type="date">
                                <span class="color-light">Deadline for new applicants.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="budget">Budget</label>
                                <input name="budget"  id="budget" value=""  class="form-control" placeholder="Enter your budget" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection mt-20" >Company Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input name="company_name" value="" type="text" class="form-control" placeholder="Enter the name of the company">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website <span class="color-light">(optional)</span></label>
                                <input name="website" value="" type="text" class="form-control" placeholder="http://example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tagline">Tagline <span class="color-light">(optional)</span></label>
                                <input name="tagline" value="" type="text" class="form-control" placeholder="Briefly describe your company">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_url">Video <span class="color-light">(optional)</span></label>
                                <input name="video_url" value="" type="text" class="form-control" placeholder="http://youtube.com?v=hjjsdfbjh">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection mt-20" >Images</h4>
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
                                  <input required="" name='photos[]' type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                  <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                              </div>
                        </div>
                    </div>

                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Preview">
                </fieldset>
                
            </div>
        </div>
    </div>
    
</div>
</form>
<script>
    var root_path = "{{URL::to('dashboard/photographers')}}";
    
  </script>
@endsection