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

    <div class="profile-page tx-13">
        <!-- <div>
          <h4 class="mb-3">Profile</h4>
       </div> -->
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Profile</h4>
            </div>

        </div>
        <div class=" profile-body">
            <!-- left wrapper start -->
            <div class="row">
                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="profile-pic mb-2" src="{{ $user->image_thumb_path }}" alt="profile">
                                <br>
                                <span class="profile-name mt-2">{{ $user->name }}</span>
                                <p class="email text-muted"><span class="color-theme">Username-</span> {{ $user->username }}
                                <p class="email text-muted"><span class="color-theme">UserID-</span> {{ $user->user_id }}
                                <h6 class="text-muted font-weight-normal mt-2 mb-0">
                                    {{ ucfirst($user->public_name) }}
                                </h6>
                            </div>
                            <hr>
                            @if (!empty($user->biographical_info))
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="card-title mb-0">About</h6>
                                </div>
                                <p>{{ $user->biographical_info }}</p>
                            @endif
                            @if (!empty($user->dob))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Date Of Birth:</label>
                                    <p class="text-muted">{{ $user->dob }}</p>
                                </div>
                            @endif
                            @if (!empty($user->address))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Address:</label>
                                    <p class="text-muted">{{ $user->address . $user->city }}</p>
                                </div>
                            @endif
                            @if (!empty($user->email))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                    <p class="text-muted text-nowrap">{{ $user->email }}</p>
                                </div>
                            @endif
                            @if (!empty($user->phone))
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Phone:</label>
                                    <p class="text-muted">{{ $user->ccode }}-{{ $user->phone }}</p>
                                </div>
                            @endif
                            <div class="mt-3 d-flex social-links">
                                @if (!empty($user->facebook))
                                    <a href="{{ $user->facebook }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/facebook.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->instagram))
                                    <a href="{{ $user->instagram }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/instagram.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->website))
                                    <a href="{{ $user->website }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/google_plus.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->pinterest))
                                    <a href="{{ $user->pinterest }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/pinterest.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather" />
                                    </a>
                                @endif
                                @if (!empty($user->twitter))
                                    <a href="{{ $user->twitter }}"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter"
                                        target="_blank">
                                        <img src="{{ asset('admin/assets/images/icons/twitter.svg') }}" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter" />
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-9 middle-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="example">
                                        <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if ($page_title == 'personal-detail') active @endif"
                                                    id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                    aria-controls="home" aria-selected="true">Personal Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if ($page_title == 'social-detail') active @endif"
                                                    id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                                    aria-controls="profile" aria-selected="true">Social Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if ($page_title == 'update-password') active @endif"
                                                    id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                                    aria-controls="contact" aria-selected="false">Update Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3" id="myTabContent">
                                            <!---------   Profile               --->
                                            <div class="tab-pane fade @if ($page_title == 'personal-detail') active show @endif"
                                                id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <h6 class="card-title mb-2">Personal Details</h6>
                                                <p class="text-muted cborder-bottom">Change your personal details which are
                                                    related to your account </p>
                                                <hr class="mt-2">
                                                <form enctype="multipart/form-data"
                                                    action="{{ url('dashboard/photographers/my-profile/personal_submit/' . $id) }}"
                                                    method="post" id="photographer_personal_details_form">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">

                                                                    <img class="rounded profileImage"
                                                                        src="{{ $user->image_thumb_path }}"
                                                                        alt="profile" id="avatar_preview" width="150px"
                                                                        height="150px">

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 mt-20" style="margin-top: 20px;">
                                                                    <div class="form-group">
                                                                        <input type="file" id="avatar"
                                                                            name="avatar" class="file-upload-default"
                                                                            onchange="loadFile(event)">

                                                                        <div class="input-group col-xs-12">
                                                                            <input type="text"
                                                                                class="form-control file-upload-info"
                                                                                disabled="" placeholder="Upload Image">
                                                                            <span class="input-group-append">
                                                                                <button
                                                                                    class="file-upload-browse btn btn-primary"
                                                                                    type="button">Upload</button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">First Name</label>
                                                                <input name="first_name" value="{{ $user->first_name }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name</label>
                                                                <input name="last_name" value="{{ $user->last_name }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender</label>
                                                                <select name='gender' class="form-control">
                                                                    <option>Select Gender</option>
                                                                    <option
                                                                        @if ($user->gender == 'Male') selected @endif>
                                                                        Male</option>
                                                                    <option
                                                                        @if ($user->gender == 'Female') selected @endif>
                                                                        Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Date Of Birth</label>
                                                                <input value="{{ $user->dob }}" class="form-control"
                                                                    id="example-date" type="date" name="dob">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input value="{{ $user->email }}" type="email"
                                                                    name='email' class="form-control" required=""
                                                                    parsley-type="email" placeholder="example@email.com">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Aadhaar Card</label>
                                                                <div class="row">
                                                                    @if ($user->aadhar1 == '' || Auth::user()->role_id == '1')
                                                                        <div class="col-sm-3 pr-0">
                                                                            <input value="{{ $user->aadhar1 }}"
                                                                                data-parsley-type="number" type="text"
                                                                                class="form-control" maxlength="4"
                                                                                name='aadhar1' placeholder="XXXX" />
                                                                        </div>
                                                                        <div class="col-sm-1 pr-0 mt-2"> - </div>
                                                                        <div class="col-sm-3 pr-0 pl-0">
                                                                            <input value="{{ $user->aadhar2 }}"
                                                                                maxlength="4" data-parsley-type="number"
                                                                                type="text" class="form-control"
                                                                                name='aadhar2' placeholder="XXXX" />
                                                                        </div>
                                                                        <div class="col-sm-1 pr-0 mt-2"> - </div>
                                                                        <div class="col-sm-3 pl-0">
                                                                            <input value="{{ $user->aadhar3 }}"
                                                                                maxlength="4" data-parsley-type="number"
                                                                                type="text" class="form-control"
                                                                                name='aadhar3' placeholder="XXXX" />
                                                                        </div>
                                                                    @else
                                                                        <div class="col-sm-3 pr-0">
                                                                            <input value="{{ $user->aadhar1 }}"
                                                                                data-parsley-type="number" type="text"
                                                                                class="form-control" maxlength="4"
                                                                                name='aadhar1' placeholder="XXXX" readonly
                                                                                disabled />
                                                                        </div>
                                                                        <div class="col-sm-1 pr-0 mt-2"> - </div>
                                                                        <div class="col-sm-3 pr-0 pl-0">
                                                                            <input value="{{ $user->aadhar2 }}"
                                                                                maxlength="4" data-parsley-type="number"
                                                                                type="text" class="form-control"
                                                                                name='aadhar2' placeholder="XXXX" readonly
                                                                                disabled />
                                                                        </div>
                                                                        <div class="col-sm-1 pr-0 mt-2"> - </div>
                                                                        <div class="col-sm-3 pl-0">
                                                                            <input value="{{ $user->aadhar3 }}"
                                                                                maxlength="4" data-parsley-type="number"
                                                                                type="text" class="form-control"
                                                                                name='aadhar3' placeholder="XXXX" readonly
                                                                                disabled />
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone Number</label>
                                                                <div class="row">
                                                                    <div class="col-sm-3 pr-0">
                                                                        <select name="ccode" class="form-control pl-0">
                                                                            <option value="+91"
                                                                                @if ($user->ccode == '+91') selected @endif>
                                                                                +91</option>
                                                                            <option value="+61"
                                                                                @if ($user->ccode == '+61') selected @endif>
                                                                                +61</option>
                                                                            <option value="+86"
                                                                                @if ($user->ccode == '+86') selected @endif>
                                                                                +86</option>
                                                                            <option value="+60"
                                                                                @if ($user->ccode == '+60') selected @endif>
                                                                                +60</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <input id="phone"
                                                                            class="form-control isValidPhone"
                                                                            name="phone" type="text"
                                                                            placeholder="0123456789"
                                                                            value="{{ $user->phone }}">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="otp">OTP</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        {!! Form::text('otp', null, ['id' => 'otp', 'placeholder' => 'XXXXXX', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="col-md-4 pl-0 pr-0">
                                                                        <button type="button"
                                                                            class="btn btn-outline-dark mb-1 mb-md-0"
                                                                            style="width: 100%;">Send OTP</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select name="country"
                                                                    class="form-control country_dropdown">
                                                                    <option>Select Country</option>
                                                                    @if (isset($countries))
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                @if ($country->id == $user->country) selected @endif>
                                                                                {{ $country->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="state">State</label>
                                                                <select name="state" class="form-control state_dropdown"
                                                                    id="state_dropdown">
                                                                    <option>Select State</option>
                                                                    @if (isset($states))
                                                                        @foreach ($states as $state)
                                                                            <option value="{{ $state->id }}"
                                                                                @if ($state->id == $user->state) selected @endif>
                                                                                {{ $state->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="city">City</label>
                                                                <select name="city" class="form-control city_dropdown"
                                                                    id="city_dropdown">
                                                                    <option>Select City</option>
                                                                    @if (isset($cities))
                                                                        @foreach ($cities as $city)
                                                                            <option value="{{ $city->id }}"
                                                                                @if ($city->id == $user->city) selected @endif>
                                                                                {{ $city->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address</label>
                                                                <input name="address" value="{{ $user->address }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="Enter Address">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label class="control-label">Zip</label>
                                                                    <input value="{{ $user->zip_code }}" type="text"
                                                                        class="form-control" placeholder="Enter zip code"
                                                                        name="zip_code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Description</label>
                                                                <textarea name="biographical_info" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $user->biographical_info }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <button type="submit" class="btn btn-primary submit">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                </form>
                                            </div>
                                            <!--------------   Social Details        ------------------->
                                            <div class="tab-pane fade @if ($page_title == 'social-detail') active show @endif"
                                                id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <h6 class="card-title mb-2">Social Account Details</h6>
                                                <p class="text-muted cborder-bottom">
                                                    Change your social account details which are related to your account.
                                                </p>
                                                <hr class="mt-2">

                                                <form
                                                    action="{{ url('dashboard/photographers/my-profile/social_submit/' . $id) }}"
                                                    method="post" class="parsley-examples"
                                                    id="photographer_social_details_form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Facebook</label>
                                                                <input value="{{ $user->facebook }}" parsley-type="url"
                                                                    name="facebook" type="url"
                                                                    class="form-control isValidWebsite"
                                                                    placeholder="https://facebook.com/username">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Twitter</label>
                                                                <input value="{{ $user->twitter }}" parsley-type="url"
                                                                    name="twitter" type="url"
                                                                    class="form-control isValidWebsite"
                                                                    placeholder="https://twitter.com/username">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Website</label>
                                                                <input value="{{ $user->website }}" parsley-type="url"
                                                                    name="website" type="url"
                                                                    class="form-control isValidWebsite"
                                                                    placeholder="https://example.com">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Instagram</label>
                                                                <input value="{{ $user->instagram }}" parsley-type="url"
                                                                    name="instagram" type="url"
                                                                    class="form-control isValidWebsite"
                                                                    placeholder="https://instagram.com/username">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Pinterest</label>
                                                                <input value="{{ $user->pinterest }}" parsley-type="url"
                                                                    name="pinterest" type="url"
                                                                    class="form-control isValidWebsite"
                                                                    placeholder="https://pinterest.com/username">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <button type="submit" class="btn btn-primary submit">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                </form>

                                            </div>
                                            <!---------- Update Password    ------------>
                                            <div class="tab-pane fade @if ($page_title == 'update-password') show active @endif"
                                                id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <h6 class="card-title mb-2">Update Password</h6>
                                                <p class="text-muted cborder-bottom">
                                                    Here you can change your password.
                                                </p>
                                                <hr class="mt-2">
                                                <form id="signupForm" method="post"
                                                    action="{{ url('dashboard/photographers/my-profile/password_submit/' . $id) }}">
                                                    @csrf
                                                    @if (session('error') != '')
                                                        <div class="col-sm-6 alert form-control alert-danger mb-1"
                                                            role="alert">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                    @if (session('success') != '')
                                                        <div class="col-sm-6 form-control alert alert-success mb-1"
                                                            role="alert">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputUsername1">Old Password </label>
                                                                <input required="" type="password"
                                                                    class="form-control" name="old_password"
                                                                    id="exampleInputUsername1" autocomplete="off"
                                                                    placeholder="Old Password">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="password">New Password</label>
                                                                <input required="" id="password" class="form-control"
                                                                    name="new_password" type="password"
                                                                    placeholder="Enter New Password">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="confirm_password">Confirm password</label>
                                                                <input required="" id="confirm_password"
                                                                    class="form-control" name="confirm_password"
                                                                    type="password" placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper end -->
        </div>
    </div>
    <script>
        var root_path = "{{ URL::to('dashboard/users') }}";
        var csrf_token = "{{ csrf_token() }}";
        var loadFile = function(event) {
            var image = document.getElementById('avatar_preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


@endsection
