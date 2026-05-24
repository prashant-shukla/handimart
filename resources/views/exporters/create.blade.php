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
        <li class="breadcrumb-item"><a href="{{ route('exporters') }}">Exporters</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ol>
</nav>
{!! Form::open(array('route' => 'exporters.store','method'=>'POST', 'class'=>'cmxform','id'=>'signupForm','files' => true)) !!}
<div class="row ">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Create New Exporters</h4>
                  </div>
                </div>
                
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection mt-0" >User Info</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="roles" name="roles" class="js-example-basic-single w-100">
                                    <option value="2">Craftsman</option>
                                    <option value="3">Manufacturer</option>
                                    <option value="4">Exporters</option>
                                    <option value="5">Designer</option>
                                    <option value="6">Painter</option>
                                    <option value="7">Clients</option>
                                    <option value="8">Photographers</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <!-- <input id="first_name" class="form-control" name="first_name" placeholder="First Name" type="text"> -->
                                {!! Form::text('first_name', null, array('id'=>'first_name', 'placeholder' => 'First Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <!-- <input id="last_name" class="form-control" name="last_name" placeholder="Last Name" type="text"> -->
                                {!! Form::text('last_name', null, array('id'=>'last_name', 'placeholder' => 'Last Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <!-- <input id="username" class="form-control" name="username" placeholder="Username" type="text"> -->
                                {!! Form::text('username', null, array('id'=>'username', 'placeholder' => 'Username','class' => 'form-control isValidUsername')) !!}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection">Contact Info</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <!-- <input id="email" class="form-control" name="email" type="email" placeholder="example@email.com"> -->
                                {!! Form::text('email', null, array('id'=>'email', 'placeholder' => 'example@email.com','class' => 'form-control')) !!}
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <!-- <input id="website" class="form-control" name="website" type="text" placeholder="www.website.com"> -->
                                {!! Form::text('website', null, array('id'=>'website', 'placeholder' => 'https://webaddress.com','class' => 'form-control isValidWebsite')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <!-- <input id="facebook" class="form-control" name="facebook" type="text" placeholder="facebook.com/username"> -->
                                {!! Form::text('facebook', null, array('id'=>'facebook', 'placeholder' => 'https://facebook.com/username','class' => 'form-control isValidWebsite')) !!}
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <!-- <input id="twitter" class="form-control" name="twitter" type="text" placeholder="twitter.com/username"> -->
                                {!! Form::text('twitter', null, array('id'=>'twitter', 'placeholder' => 'https://twitter.com/username','class' => 'form-control isValidWebsite')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="+910123456789" >
                                <!-- {!! Form::text('phone', null, array('id'=>'phone', 'placeholder' => '+91-1234567890','class' => 'form-control')) !!} -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="otp">OTP</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        {!! Form::text('otp', null, array('id'=>'otp', 'placeholder' => 'XXXXXX','class' => 'form-control')) !!}
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-outline-dark mb-1 mb-md-0">Send OTP</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title userSection">About the user</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="biographical_info">Biographical Info</label>
                                <!-- <textarea id="biographical_info" class="form-control" name="biographical_info" rows="4" placeholder="About the user"></textarea> -->
                                {{ Form::textarea('biographical_info', $value = null ,$attributes = ['id' => 'biographical_info' ,'class' => 'form-control', 'rows' => '5','placeholder'=>'About the user']) }}
                                <p class="card-description">Share a little biographical information to fill out user profile. This may be shown publicly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="biographical">Account Management</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name="password" type="password" placeholder="Password">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input id="confirm_password" class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin">
        <div class="card">
            <div class="card-body">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 class="card-title userSection mt-0" > Upload User Profile Picture</h4>
                                <img class="rounded profileImage" src="https://via.placeholder.com/150x150" alt="profile" id="avatar_preview" width="150px" height="150px">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-20" style="margin-top: 20px;">
                            <div class="form-group">
                                <input type="file" id="avatar" name="avatar" class="file-upload-default" onchange="loadFile(event)">
                                
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <fieldset>
                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
            </div>
        </div>
    </div> --> 
</div>
{!! Form::close() !!}

<script>
    var loadFile = function(event) {
        var image = document.getElementById('avatar_preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection