@extends('layouts.app_exporters')

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
        <li class="breadcrumb-item"><a href="{{ url('dashboard/exporters/jobs/'.$id) }}">Jobs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Job Create</li>
    </ol>
</nav>

<form enctype="multipart/form-data" action="{{url('dashboard/exporters/job_store/'.$id)}}" method="post" id="job_create_form" enctype="multipart/form-data" >
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
                                <input name="name" value="" type="text" class="form-control" placeholder="Job Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea name="description" class="form-control" placeholder="Job Description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="text" placeholder="example@yopmail.com" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0"> 
                                        <select name="ccode" class="form-control pl-0">
                                            <option value="+91">+91</option>
                                            <option value="+61">+61</option>
                                            <option value="+86">+86</option>
                                            <option value="+60">+60</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website">Website Link</label>
                                <input name="website" value="" type="text" class="form-control" placeholder="Website Link">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address" value="" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input name="country" value="" type="text" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input name="state" value="" type="text" class="form-control" placeholder="State">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input name="city" value="" type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input name="zip_code" value="" type="text" class="form-control" placeholder="Postal Code">
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                  <input required="" name='photos[]' type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                  <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                              </div>
                        </div>
                    </div>

                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
                
            </div>
        </div>
    </div>
    
</div>
</form>
<script>
    var root_path = "{{URL::to('dashboard/exporters')}}";
    
  </script>
@endsection