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
        <li class="breadcrumb-item active" aria-current="page">Company Setting</li>
    </ol>
</nav>
{!! Form::open(array('route' => 'setting.store','method'=>'POST', 'class'=>'cmxform','id'=>'company_setting_form')) !!}
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Company Setting</h4>
                  </div>
                </div>
                @if(!isset($company_setting))
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                {!! Form::text('company_name', null, array('id'=>'company_name', 'placeholder' => 'Company Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                {!! Form::text('contact_person', null, array('id'=>'contact_person', 'placeholder' => 'Contact Person','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Office Address</label>
                                {!! Form::text('address', null, array('id'=>'address', 'placeholder' => 'Office Addres','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country">Country</label>
                                {!! Form::text('country', null, array('id'=>'country', 'placeholder' => 'Country','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                {!! Form::text('city', null, array('id'=>'city', 'placeholder' => 'city','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state">State/Province</label>
                                {!! Form::text('state', null, array('id'=>'state', 'placeholder' => 'State/Province','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                {!! Form::text('zip_code', null, array('id'=>'zip_code', 'placeholder' => 'Postal Code','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', null, array('id'=>'email', 'placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0"> 

                                        <input id="ccode" class="form-control" name="ccode" type="text" disabled  value="+91">
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile Number 1</label>
                                <input id="mobile" class="form-control isValidPhone" name="mobile" type="text" placeholder="0123456789" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_2">Mobile Number 2</label>
                                <input id="mobile_2" class="form-control isValidPhone1" name="mobile_2" type="text" placeholder="0123456789" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website_link">Website Url</label>
                                <input id="website_link" class="form-control isValidWebsite" name="website_link" type="text" placeholder="Website Url" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="career_email">Career Email</label>
                                {!! Form::text('career_email', null, array('id'=>'career_email', 'placeholder' => 'Career Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_plus">Google+</label>
                                <input id="google_plus" class="form-control isValidWebsite" name="google_plus" type="text" placeholder="Google+" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube">YouTube</label>
                                <input id="youtube" class="form-control isValidWebsite" name="youtube" type="text" placeholder="YouTube Url" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input id="twitter" class="form-control isValidWebsite" name="twitter" type="text" placeholder="Twitter Url" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input id="linkedin" class="form-control isValidWebsite" name="linkedin" type="text" placeholder="linkedin Url" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input id="facebook" class="form-control isValidWebsite" name="facebook" type="text" placeholder="Facebook Url" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input id="instagram" class="form-control isValidWebsite" name="instagram" type="text" placeholder="Instagram Url" value="">
                            </div>
                        </div>
                    </div>

                    


                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
                @else
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                {!! Form::text('company_name', $company_setting->company_name, array('id'=>'company_name', 'placeholder' => 'Company Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                {!! Form::text('contact_person', $company_setting->contact_person, array('id'=>'contact_person', 'placeholder' => 'Contact Person','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Office Address</label>
                                {!! Form::text('address', $company_setting->address, array('id'=>'address', 'placeholder' => 'Office Addres','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country">Country</label>
                                {!! Form::text('country', $company_setting->country, array('id'=>'country', 'placeholder' => 'Country','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                {!! Form::text('city', $company_setting->city, array('id'=>'city', 'placeholder' => 'city','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state">State/Province</label>
                                {!! Form::text('state', $company_setting->state, array('id'=>'state', 'placeholder' => 'State/Province','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                {!! Form::text('zip_code', $company_setting->zip_code, array('id'=>'zip_code', 'placeholder' => 'Postal Code','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                {!! Form::text('email', $company_setting->email, array('id'=>'email', 'placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <div class="row">
                                    <div class="col-sm-3 pr-0"> 

                                        <input id="ccode" class="form-control" name="ccode" type="text" disabled  value="+91">
                                    </div>
                                    <div class="col-sm-9">
                                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="{{$company_setting->phone}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile Number 1</label>
                                <input id="mobile" class="form-control isValidPhone" name="mobile" type="text" placeholder="0123456789" value="{{$company_setting->mobile}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_2">Mobile Number 2</label>
                                <input id="mobile_2" class="form-control isValidPhone1" name="mobile_2" type="text" placeholder="0123456789" value="{{$company_setting->mobile_2}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website_link">Website Url</label>
                                <input id="website_link" class="form-control isValidWebsite" name="website_link" type="text" placeholder="Website Url" value="{{$company_setting->website_link}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="career_email">Career Email</label>
                                <input id="career_email" class="form-control isValidWebsite" name="career_email" type="text" placeholder="Career Email" value="{{$company_setting->career_email}}">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="google_plus">Google+</label>
                                <input id="google_plus" class="form-control isValidWebsite" name="google_plus" type="text" placeholder="Google+" value="{{$company_setting->google_plus}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube">YouTube</label>
                                <input id="youtube" class="form-control isValidWebsite" name="youtube" type="text" placeholder="YouTube " value="{{$company_setting->youtube}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input id="twitter" class="form-control isValidWebsite" name="twitter" type="text" placeholder="Twitter " value="{{$company_setting->twitter}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input id="linkedin" class="form-control isValidWebsite" name="linkedin" type="text" placeholder="linkedin " value="{{$company_setting->linkedin}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input id="facebook" class="form-control isValidWebsite" name="facebook" type="text" placeholder="Facebook " value="{{$company_setting->facebook}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input id="instagram" class="form-control isValidWebsite" name="instagram" type="text" placeholder="Instagram " value="{{$company_setting->instagram}}">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
                @endif
            </div>
        </div>
    </div>
    
</div>
{!! Form::close() !!}

@endsection