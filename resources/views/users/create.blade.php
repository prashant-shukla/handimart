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
            <li class="breadcrumb-item"><a href="{{ route('users') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New</li>
        </ol>
    </nav>
    {!! Form::open([
        'route' => 'users.store',
        'method' => 'POST',
        'class' => 'cmxform',
        'id' => 'signupForm',
        'files' => true,
    ]) !!}
    <div class="row ">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                        <div>
                            <h4 class="mb-3 mb-md-0">Create New User</h4>
                        </div>
                        <!-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                            <a class="btn btn-primary" href="{{ route('users') }}"><i class="btn-icon-prepend" data-feather="chevron-left"></i>  Back</a>
                        </div> -->
                    </div>

                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title userSection mt-0">User Info</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="roles" name="roles" class="js-example-basic-single w-100">
                                        <option value="7">Clients</option>
                                        <option value="2">Craftsman</option>
                                        <option value="3">Manufacturer</option>
                                        <option value="4">Exporters</option>
                                        <option value="5">Designer</option>
                                        <option value="6">Painter</option>
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
                                    {!! Form::text('first_name', null, [
                                        'id' => 'first_name',
                                        'placeholder' => 'First Name',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <!-- <input id="last_name" class="form-control" name="last_name" placeholder="Last Name" type="text"> -->
                                    {!! Form::text('last_name', null, [
                                        'id' => 'last_name',
                                        'placeholder' => 'Last Name',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <!-- <input id="username" class="form-control" name="username" placeholder="Username" type="text"> -->
                                    {!! Form::text('username', null, ['id' => 'username', 'placeholder' => 'Username', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <!-- <input id="email" class="form-control" name="email" type="email" placeholder="example@email.com"> -->
                                    {!! Form::text('email', null, [
                                        'id' => 'email',
                                        'placeholder' => 'example@email.com',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
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
                                            <input id="phone" class="form-control isValidPhone" name="phone"
                                                type="text" placeholder="0123456789" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="otp">OTP</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            {!! Form::text('otp', null, ['id' => 'otp', 'placeholder' => 'XXXXXX', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-outline-dark mb-1 mb-md-0">Send
                                                OTP</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country_id" class="form-control country_dropdown">
                                        <option>Select Country</option>
                                        @if (isset($countries))
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state_id" class="form-control state_dropdown" id="state_dropdown">
                                        <option>Select State</option>
                                        @if (isset($states))
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city_id" class="form-control city_dropdown" id="city_dropdown">
                                        <option>Select City</option>
                                        @if (isset($cities))
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    {!! Form::text('address', null, ['id' => 'address', 'placeholder' => 'Address', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">Zip</label>
                                    {!! Form::text('zip_code', null, ['id' => 'zip_code', 'placeholder' => 'Zip', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Date Of Birth</label>
                                    <input value="" class="form-control" id="example-date" type="date"
                                        name="dob">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">MemberShip</label>
                                    {!! Form::text('membership', $user->membership ?? '', [
                                        'id' => 'membership',
                                        'placeholder' => 'Membership',
                                        'class' => 'form-control',
                                        'name' => 'membership',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title userSection">Social Details</h4>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <!-- <input id="website" class="form-control" name="website" type="text" placeholder="www.website.com"> -->
                                    {!! Form::text('website', 'https://', [
                                        'id' => 'website',
                                        'placeholder' => 'https://webaddress.com',
                                        'class' => 'form-control ',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <!-- <input id="facebook" class="form-control" name="facebook" type="text" placeholder="facebook.com/username"> -->
                                    {!! Form::text('facebook', 'https://', [
                                        'id' => 'facebook',
                                        'placeholder' => 'https://facebook.com/username',
                                        'class' => 'form-control ',
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <!-- <input id="twitter" class="form-control" name="twitter" type="text" placeholder="twitter.com/username"> -->
                                    {!! Form::text('twitter', 'https://', [
                                        'id' => 'twitter',
                                        'placeholder' => 'https://twitter.com/username',
                                        'class' => 'form-control ',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    {!! Form::text('instagram', 'https://', [
                                        'id' => 'instagram',
                                        'placeholder' => 'https://instagram.com/username',
                                        'class' => 'form-control ',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pinterest">Pinterest</label>
                                    <!-- <input id="pinterest" class="form-control" name="pinterest" type="text" placeholder="pinterest.com/username"> -->
                                    {!! Form::text('pinterest', 'https://', [
                                        'id' => 'pinterest',
                                        'placeholder' => 'https://pinterest.com/username',
                                        'class' => 'form-control ',
                                    ]) !!}
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
                                    <!-- <textarea id="biographical_info" class="form-control" name="biographical_info" rows="4"
                                        placeholder="About the user"></textarea> -->
                                    {{ Form::textarea(
                                        'biographical_info',
                                        $value = null,
                                        $attributes = [
                                            'id' => 'biographical_info',
                                            'class' => 'form-control',
                                            'rows' => '5',
                                            'placeholder' => 'About the user',
                                        ],
                                    ) }}
                                    <p class="card-description">Share a little biographical information to fill out user
                                        profile. This may be shown publicly.</p>
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
                                    <input id="password" class="form-control" name="password" type="password"
                                        placeholder="Password">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm password</label>
                                    <input id="confirm_password" class="form-control" name="confirm_password"
                                        type="password" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit"
                            value="Submit">
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
                                <h4 class="card-title userSection mt-0"> Upload User Profile Picture</h4>
                                <img class="rounded profileImage" src="https://via.placeholder.com/150x150"
                                    alt="profile" id="avatar_preview" width="150px" height="150px">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-20" style="margin-top: 20px;">
                                <div class="form-group">
                                    <input type="file" id="avatar" name="avatar" class="file-upload-default"
                                        onchange="loadFile(event)">

                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
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
        var root_path = "{{ URL::to('dashboard/users') }}";
        var csrf_token = "{{ csrf_token() }}";
        var loadFile = function(event) {
            var image = document.getElementById('avatar_preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
