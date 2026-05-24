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
            <li class="breadcrumb-item active" aria-current="page">Update User</li>
        </ol>
    </nav>
    {!! Form::open([
        'route' => ['users.update', $user->id],
        'method' => 'POST',
        'class' => 'cmxform',
        'id' => 'editProfileForm',
        'files' => true,
        'autocomplete' => 'off',
    ]) !!}
    <div class="row ">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                        <div>
                            <h4 class="mb-3 mb-md-0">Update User</h4>
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
                                    <label for="role">Role </label>
                                    <select id="roles" name="roles" class="js-example-basic-single w-100">
                                        <option {{ $user->role_id == '7' ? 'selected' : '' }} value="7">Clients
                                        </option>
                                        <option {{ $user->role_id == '2' ? 'selected' : '' }} value="2">Craftsman
                                        </option>
                                        <option {{ $user->role_id == '3' ? 'selected' : '' }} value="3">Manufacturer
                                        </option>
                                        <option {{ $user->role_id == '4' ? 'selected' : '' }} value="4">Exporters
                                        </option>
                                        <option {{ $user->role_id == '5' ? 'selected' : '' }} value="5">Designer
                                        </option>
                                        <option {{ $user->role_id == '6' ? 'selected' : '' }} value="6">Painter
                                        </option>
                                        <option {{ $user->role_id == '8' ? 'selected' : '' }} value="8">Photographers
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">UserID</label>
                                    <!-- <input id="username" class="form-control" name="username" placeholder="Username" type="text"> -->
                                    {!! Form::text('user_id', $user->user_id, [
                                        'id' => 'user_id',
                                        'placeholder' => 'user_id',
                                        'class' => 'form-control ',
                                        'disabled' => 'disabled',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <!-- <input id="first_name" class="form-control" name="first_name" placeholder="First Name" type="text"> -->
                                    {!! Form::text('first_name', $user->first_name, [
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
                                    {!! Form::text('last_name', $user->last_name, [
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
                                    {!! Form::text('username', $user->username, [
                                        'id' => 'username',
                                        'placeholder' => 'Username',
                                        'class' => 'form-control',
                                        'disabled' => 'disabled',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <!-- <input id="email" class="form-control" name="email" type="email" placeholder="example@email.com"> -->
                                    {!! Form::text('email', $user->email, [
                                        'id' => 'email',
                                        'placeholder' => 'example@email.com',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <div class="row">
                                        <div class="col-sm-3 pr-0">
                                            <select name="ccode" class="form-control pl-0">
                                                <option value="+91" @if ($user->ccode == '+91') selected @endif>+91
                                                </option>
                                                <option value="+61" @if ($user->ccode == '+61') selected @endif>+61
                                                </option>
                                                <option value="+86" @if ($user->ccode == '+86') selected @endif>+86
                                                </option>
                                                <option value="+60" @if ($user->ccode == '+60') selected @endif>+60
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-9">
                                            <input id="phone" class="form-control isValidPhone" name="phone"
                                                type="text" placeholder="0123456789" value="{{ $user->phone }}">
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
                                    <select name="country" class="form-control country_dropdown">
                                        <option>Select Country</option>
                                        @if (isset($countries))
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($country->id == $user->country_id) selected @endif>{{ $country->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select name="state" class="form-control state_dropdown" id="state_dropdown">
                                        <option>Select State</option>
                                        @if (isset($states))
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    @if ($state->id == $user->state_id) selected @endif>{{ $state->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city" class="form-control city_dropdown" id="city_dropdown">
                                        <option>Select City</option>
                                        @if (isset($cities))
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    @if ($city->id == $user->city_id) selected @endif>{{ $city->name }}
                                                </option>
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
                                    {!! Form::text('address', $user->address, [
                                        'id' => 'address',
                                        'placeholder' => 'Address',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">Zip</label>
                                    {!! Form::text('zip_code', $user->zip_code, [
                                        'id' => 'zip_code',
                                        'placeholder' => 'Zip',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">MemberShip</label>

                                    {!! Form::text('membership', $user->membership, [
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
                                    {!! Form::text('website', $user->website, [
                                        'id' => 'website',
                                        'placeholder' => 'https://webaddress.com',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <!-- <input id="facebook" class="form-control" name="facebook" type="text" placeholder="facebook.com/username"> -->
                                    {!! Form::text('facebook', $user->facebook, [
                                        'id' => 'facebook',
                                        'placeholder' => 'https://facebook.com/username',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <!-- <input id="twitter" class="form-control" name="twitter" type="text" placeholder="twitter.com/username"> -->
                                    {!! Form::text('twitter', $user->twitter, [
                                        'id' => 'twitter',
                                        'placeholder' => 'https://twitter.com/username',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <!-- <input id="instagram" class="form-control" name="instagram" type="text" placeholder="instagram.com/username"> -->
                                    {!! Form::text('instagram', $user->instagram, [
                                        'id' => 'instagram',
                                        'placeholder' => 'https://instagram.com/username',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pinterest">Pinterest</label>
                                    <!-- <input id="pinterest" class="form-control" name="pinterest" type="text" placeholder="pinterest.com/username"> -->
                                    {!! Form::text('pinterest', $user->pinterest, [
                                        'id' => 'pinterest',
                                        'placeholder' => 'https://pinterest.com/username',
                                        'class' => 'form-control',
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
                                    {{ Form::textarea('biographical_info', $value = $user->biographical_info, $attributes = ['id' => 'biographical_info', 'class' => 'form-control', 'rows' => '5', 'placeholder' => 'About the user']) }}
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
                                <label for="new_password">New Password</label>
                                <button type="button" class="btn btn-outline-dark mb-4  button_set_new_password"
                                    style="display: block;">Set New Password</button>
                            </div>
                            <div class="col-md-6">
                                <label for="reset_password">Reset Password</label>
                                <button type="button" class="btn btn-outline-dark mb-4  button_send_link"
                                    style="display: block;">Send Resend Link</button>
                            </div>
                        </div>
                        <div class="row password_section" style="display: none;">

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
                                <img class="rounded profileImage" src="{{ $user->image_thumb_path }}" alt="profile"
                                    id="avatar_preview" width="150px" height="150px">

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
