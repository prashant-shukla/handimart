@extends('layouts.app')

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
        <li class="breadcrumb-item"><a href="{{ route('setting') }}">Setting</a></li>
        <li class="breadcrumb-item active" aria-current="page">Theme Setting</li>
    </ol>
</nav>
{!! Form::open(array('route' => 'setting.theme_submit','method'=>'POST', 'class'=>'cmxform','id'=>'theme_setting_form','files' => true)) !!}
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Theme Setting</h4>
                  </div>
                </div>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6 mt-20" >
                            <div class="form-group">
                                <label for="logo_file">Logo</label>
                                <input type="file" id="logo_file" name="logo_file" class="file-upload-default" onchange="loadLogo(event)">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Logo">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" style="margin-top: 20px;">
                            <img class="rounded profileImage updateLogo" src="{{$company_setting->logo_thumb_path}}" alt="profile" id="logo_preview" >
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-6 mt-20" >
                            <div class="form-group">
                                <label for="dark_logo_file">Dark Logo</label>
                                <input type="file" id="dark_logo_file" name="dark_logo_file" class="file-upload-default" onchange="loadDLogo(event)">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Logo">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" style="margin-top: 20px;">
                            <img class="rounded profileImage updateLogo" src="{{$company_setting->dark_logo_thumb_path}}" alt="profile" id="dark_logo_preview" >
                        </div>
                    </div>

                    <hr>
                    <div class="row " style="margin-top: 20px;">
                        <div class="col-md-6 " >
                            <div class="form-group">
                                <label for="favicon_file">Favicon</label>
                                <input type="file" id="favicon_file" name="favicon_file" class="file-upload-default" onchange="loadFavicon(event)">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Favicon">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center " style="margin-top: 20px;">
                            <img class="rounded profileImage updateFavicon" src="{{$company_setting->favicon_thumb_path}}" alt="profile" id="favicon_preview" >
                        </div>
                    </div>
                    <hr>
                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
            </div>
        </div>
    </div>
    
</div>
{!! Form::close() !!}
<script>
    var loadLogo = function(event) {
        var image = document.getElementById('logo_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadDLogo = function(event) {
        var image = document.getElementById('dark_logo_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFavicon = function(event) {
        var image = document.getElementById('favicon_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection