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
    <!-----  If Client is Manufacturer  ---->
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Become A Exporter</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            @if (empty($business_detail) || Auth::user()->role_id == '1')
                <a class="btn btn-primary " href="{{ route('clients.business-detail', $id) }}"><i class="btn-icon-prepend"
                        data-feather="briefcase"></i> &nbsp; Change Service Type</a>
            @endif
        </div>
    </div>



    <div class=" profile-body">
        <!-- left wrapper start -->
        <div class="row">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card rounded">
                            <div class="card-body">
                                <p class="text-muted cborder-bottom text-center mb-4" style="font-size:1.3em;">Complete your
                                    Profile to attract genuine buyers</p>
                                <div class="example">
                                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <!-- <a class="nav-link @if ($page_title == 'personal-detail') active @endif" id="home-tab" data-toggle="tab" href="#home"  role="tab" aria-controls="home" aria-selected="true">Personal Details</a> -->
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Business
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if ($page_title == 'social-detail') active @endif"
                                                id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                                aria-controls="profile" aria-selected="true">Additional Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if ($page_title == 'update-password') active @endif"
                                                id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                                aria-controls="contact" aria-selected="false">EIC & GSTIN Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if ($page_title == 'certification-award') active @endif"
                                                id="certification-tab" data-toggle="tab" href="#certification"
                                                role="tab" aria-controls="certification"
                                                aria-selected="false">Certification & Award</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content p-3" id="myTabContent">
                                        <!---------   Profile               --->
                                        <!-- <div class="tab-pane fade @if ($page_title == 'personal-detail') active show @endif" id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                                        <div class="tab-pane fade active show " id="home" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <p class="text-muted cborder-bottom text-center mb-4" style="font-size:0.9em;">
                                                Keep your profile updated & get contacted by potential customers for your
                                                products. </p>
                                            <hr class="mt-2 mb-5">
                                            <div class="col-md-8" style="margin:0 auto;">
                                                <form enctype="multipart/form-data"
                                                    action="{{ url('dashboard/exporters/business-profile/business_submit/' . $id) }}"
                                                    method="post" id="business_details_form">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Company Name</label>
                                                                <input required name="company_name"
                                                                    value="{{ isset($business_detail->company_name) ? $business_detail->company_name : '' }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="Enter Company Name">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Website</label>
                                                                <input required type="url" name="website"
                                                                    value="{{ isset($business_detail->website) ? $business_detail->website : '' }}"
                                                                    class="form-control" placeholder="Enter Website">
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
                                                                        <input required id="phone"
                                                                            class="form-control isValidPhone"
                                                                            name="phone" type="text"
                                                                            placeholder="0123456789"
                                                                            value="{{ $business_detail->phone ?? '' }}">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input required
                                                                    value="{{ isset($business_detail->email) ? $business_detail->email : '' }}"
                                                                    class="form-control" id="email" type="email"
                                                                    name="email" placeholder="Enter email">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Address</label>
                                                                <input required value="{{ $user->address }}"
                                                                    class="form-control" name="address" type="text"
                                                                    placeholder="address">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Zip Code</label>
                                                                <input required class="form-control" id="zip"
                                                                    type="text" name="zip" placeholder="">
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select required name="country"
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
                                                                <select required name="state"
                                                                    class="form-control state_dropdown"
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
                                                                <select required name="city"
                                                                    class="form-control city_dropdown" id="city_dropdown">
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
                                                                <label for="establisment_year"
                                                                    class="control-label">Establisment year</label>
                                                                <select required="required" class="form-control"
                                                                    name="establisment_year">
                                                                    <option value="">Select Year</option>
                                                                    <option value="before_1980">Before 1980</option>
                                                                    @php
                                                                        $current_year = date('Y');
                                                                    @endphp
                                                                    @for ($i = 1980; $i <= $current_year; $i++)
                                                                        <option value="{{ $i }}"
                                                                            @if (isset($business_detail->establisment_year) && $business_detail->establisment_year == $i) selected @endif>
                                                                            {{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="number_employee" class="control-label">Number
                                                                    Of Employees</label>
                                                                <select required="required" class="form-control"
                                                                    name="number_employee" id="number_employee">
                                                                    <option value="">Select Employees</option>
                                                                    <option value="5-10"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '5-10') selected @endif>
                                                                        5-10</option>
                                                                    <option value="10-20"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '10-20') selected @endif>
                                                                        10-20</option>
                                                                    <option value="20-35"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '20-35') selected @endif>
                                                                        20-35</option>
                                                                    <option value="35-50"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '35-50') selected @endif>
                                                                        35-50</option>
                                                                    <option value="50-75"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '50-75') selected @endif>
                                                                        50-75</option>
                                                                    <option value="75-100"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '75-100') selected @endif>
                                                                        75-100</option>
                                                                    <option value="100+"
                                                                        @if (isset($business_detail->number_employee) && $business_detail->number_employee == '100+') selected @endif>
                                                                        100+</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- Row -->
                                                    <div class="row">

                                                        <!-- Col -->
                                                        <!-- <div class="col-sm-6">
                                                 <div class="form-group">
                                                   <label for="ownership_type" class="control-label">Ownership type</label>
                                                   <select required="required" class="form-control" name="ownership_type" id="ownership_type">
                                                     <option value="">Select Ownership</option>
                                                     <option value="public limited company" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'public limited company') selected @endif>Public Limited Company</option>
                                                     <option value="private limited company" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'private limited company') selected @endif>Private Limited Company</option>
                                                     <option value="partnership" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'partnership') selected @endif>Partnership</option>
                                                     <option value="proprietorship" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'proprietorship') selected @endif>Proprietorship</option>
                                                     <option value="professional associations" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'professional associations') selected @endif>Professional Associations</option>
                                                     <option value="limited liability partnership" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'limited liability partnership') selected @endif>Limited Liability Partnership (LLP)</option>
                                                     <option value="other" @if (isset($business_detail->ownership_type) && $business_detail->ownership_type == 'other') selected @endif>Other</option>
                                                    </select>
                                                  </div>
                                                </div> -->
                                                    </div>
                                                    <!-- Row -->
                                                    <button type="submit" class="btn btn-primary submit">Update</button>
                                                    <button class="btn btn-light">Cancel</button>
                                                    <!-- </form> -->
                                            </div>
                                        </div>
                                        <!--------------   Social Details        ------------------->
                                        <div class="tab-pane fade @if ($page_title == 'social-detail') active show @endif"
                                            id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                            <p class="text-muted cborder-bottom text-center mb-4"
                                                style="font-size:0.9em;">Keep your profile updated & get contacted by
                                                potential customers for your products. </p>

                                            <hr class="mt-2 mb-5">
                                            <div class="col-md-8" style="margin:0 auto;">
                                                <!-- <form action="{{ url('dashboard/manufacturers/my-profile/social_submit/' . $id) }}" method="post" class="parsley-examples" id="manufacturer_social_details_form"> -->
                                                <!-- @csrf -->
                                                <label class="control-label">Company Logo</label>
                                                <div class="row">
                                                    <div class="col-sm-6 text-center">
                                                        <div class="form-group">
                                                            @if ($business_detail)
                                                                <img class="rounded profileImage"
                                                                    src="{{ asset('uploads/business/' . $business_detail->logo) }}"
                                                                    alt="profile" id="avatar_preview" width="150px"
                                                                    height="150px">
                                                            @else
                                                                <img class="rounded profileImage"
                                                                    src="{{ asset('front/images/my-account-icon.png') }}"
                                                                    alt="profile" id="avatar_preview" width="150px"
                                                                    height="150px">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- Col -->
                                                    <div class="col-sm-6 text-center" style="padding-top:50px">
                                                        <div class="form-group">
                                                            <label for="logo" class="btn btn-outline-dark"
                                                                style="padding:15px 30px;">Upload Logo</label>
                                                            <input type="file" style="visibility:hidden;"
                                                                id="logo" name="logo"
                                                                class="btn btn-outline-dark" onchange="loadFile(event)" />
                                                            <p class="text-muted cborder-bottom text-center mb-4 mt-4"
                                                                style="font-size:0.9em;">200KB max. JPEG, PNG format only.
                                                                Suggested photo</br> width and height: 200*200px.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-5">

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Working Days</label>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <select name="wd_start_day" class="formControl">
                                                                        <option value="Sunday">Sunday</option>
                                                                        <option value="Monday" selected="">Monday
                                                                        </option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                    </select>
                                                                </div>
                                                                <!-- <div class="col-md-2"><span>TO</span></div> -->
                                                                <div class="col-md-3">
                                                                    <select name="wd_start_day" class="formControl">
                                                                        <option value="Sunday">Sunday</option>
                                                                        <option value="Monday" selected="">Monday
                                                                        </option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select name="wd_start_day" class="formControl">
                                                                        <option value="Sunday">Sunday</option>
                                                                        <option value="Monday" selected="">Monday
                                                                        </option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                    </select>
                                                                </div>
                                                                <!-- <div class="col-md-2"><span>TO</span></div> -->
                                                                <div class="col-md-3">
                                                                    <select name="wd_start_day" class="formControl">
                                                                        <option value="Sunday">Sunday</option>
                                                                        <option value="Monday" selected="">Monday
                                                                        </option>
                                                                        <option value="Tuesday">Tuesday</option>
                                                                        <option value="Wednesday">Wednesday</option>
                                                                        <option value="Thursday">Thursday</option>
                                                                        <option value="Friday">Friday</option>
                                                                        <option value="Saturday">Saturday</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Row -->

                                                <div>
                                                    <div>
                                                        <h5 class="card-title mb-2 mt-5" style="font-size:1.3em;">Company
                                                            Social Details</h5>
                                                        <p class="card-description mb-4">Change your social account details
                                                            which are related to your company.</p>
                                                        <!-- <input type="file" id="myDropify" class="border"/> -->
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Facebook</label>
                                                            <input value="{{ $user->facebook }}" parsley-type="url"
                                                                name="facebook" type="url" class="form-control"
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
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">LinkedIn</label>
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
                                                            <label class="control-label">Twitter</label>
                                                            <input value="{{ $user->pinterest }}" parsley-type="url"
                                                                name="pinterest" type="url"
                                                                class="form-control isValidWebsite"
                                                                placeholder="https://pinterest.com/username">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Google+</label>
                                                            <input value="{{ $user->instagram }}" parsley-type="url"
                                                                name="instagram" type="url"
                                                                class="form-control isValidWebsite"
                                                                placeholder="https://instagram.com/username">
                                                        </div>
                                                    </div>
                                                    <!-- Col -->
                                                </div>
                                                <button type="submit" class="btn btn-primary submit">Save</button>
                                                <!-- <button class="btn btn-light">Cancel</button> -->
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                        <!---------- Update Password    ------------>
                                        <div class="tab-pane fade @if ($page_title == 'update-password') show active @endif"
                                            id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <p class="text-muted cborder-bottom text-center mb-4"
                                                style="font-size:0.9em;">Keep your profile updated & get contacted by
                                                potential customers for your products. </p>
                                            <hr class="mt-2 mb-5">
                                            <div class="col-md-8" style="margin:0 auto;">
                                                <!-- <form id="signupForm" method="post" action="{{ url('dashboard/manufacturers/my-profile/password_submit/' . $id) }}"> -->
                                                <!-- @csrf -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gts_number" class="control-label">GST
                                                                Number</label>
                                                            <input name="gts_number" id="gts_number" type="text"
                                                                class="form-control" placeholder="Enter GTS Number"
                                                                value="{{ isset($business_detail) ? $business_detail->gts_number : '' }}">
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gst_document" class="control-label">Export License
                                                                And GST Detail Document</label>
                                                            <input name="gst_document" id="gst_document"
                                                                value="{{ isset($business_detail) ? $business_detail->gst_document : '' }}"
                                                                type="file" class="form-control" placeholder="">
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="export_certificate_no"
                                                                class="control-label">Import/Export Certificate
                                                                Number</label>
                                                            <input name="export_certificate_no" id="export_certificate_no"
                                                                value="{{ isset($business_detail) ? $business_detail->export_certificate_no : '' }}"
                                                                type="text" class="form-control"
                                                                placeholder="Enter Export/Import Cerificate Number">
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="export_document" class="control-label">Export
                                                                Certificate Document</label>
                                                            <input name="export_document" value="" type="file"
                                                                class="form-control" placeholder="">
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="pan_number" class="control-label">PAN
                                                                Number</label>
                                                            <input required="required"
                                                                value="{{ isset($business_detail) ? $business_detail->pan_number : '' }}"
                                                                name="pan_number" id="pan_number" type="text"
                                                                class="form-control" placeholder="Enter PAN Number">
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="pan_document" class="control-label">PAN
                                                                Document</label>
                                                            <input name="pan_document" value="" type="file"
                                                                class="form-control" placeholder="">
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tan_number" class="control-label">TAN
                                                                Number</label>
                                                            <input required="required"
                                                                value="{{ isset($business_detail) ? $business_detail->tan_number : '' }}"
                                                                name="tan_number" id="tan_number" type="text"
                                                                class="form-control" placeholder="Enter TAN Number">
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tan_document" class="control-label">TAN
                                                                Document</label>
                                                            <input name="tan_document" value="" type="file"
                                                                class="form-control" placeholder="">
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                                <button class="btn btn-light">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!---------- certification & award    ------------>
                                        <div class="tab-pane fade @if ($page_title == 'certification-award') show active @endif"
                                            id="certification" role="tabpanel" aria-labelledby="certification-tab">
                                            <!-- <h6 class="card-title mb-2">Certification</h6>
                                         <p class="text-muted cborder-bottom">
                                            Here you can change your password.
                                         </p>
                                         <hr class="mt-2">
                                         <form id="signupForm" method="post" action="{{ url('dashboard/manufacturers/my-profile/password_submit/' . $id) }}">
                                            @csrf
                                            @if (session('error') != '')
    <div class="col-sm-6 alert form-control alert-danger mb-1" role="alert">
                                               {{ session('error') }}
                                            </div>
    @endif
                                            @if (session('success') != '')
    <div class="col-sm-6 form-control alert alert-success mb-1" role="alert">
                                               {{ session('success') }}
                                            </div>
    @endif
                                            <div class="row">
                                               <div class="col-sm-6">
                                                  <div class="form-group">
                                                     <label for="exampleInputUsername1">Old Password </label>
                                                     <input required="" type="password" class="form-control" name="old_password" id="exampleInputUsername1" autocomplete="off" placeholder="Old Password">
                                                  </div>
                                               </div>
                                               <!-- Col
                                            </div>
                                            <!-- Row
                                            <div class="row">
                                               <div class="col-sm-6">
                                                  <div class="form-group">
                                                     <label for="password">New Password</label>
                                                     <input required="" id="password" class="form-control" name="new_password" type="password" placeholder="Enter New Password">
                                                  </div>
                                               </div>
                                               <!-- Col
                                            </div>
                                            <div class="row">
                                               <div class="col-sm-6">
                                                  <div class="form-group">
                                                     <label for="confirm_password">Confirm password</label>
                                                     <input required="" id="confirm_password" class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
                                                  </div>
                                               </div>
                                               <!-- Col
                                            </div>
                                            <!-- Row
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                                            <button class="btn btn-light">Cancel</button>
                                         </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var root_path = "{{ URL::to('dashboard/exporters') }}";
    </script>
    <script>
        var csrf_token = "{{ csrf_token() }}";
        var loadFile = function(event) {
            var image = document.getElementById('avatar_preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
