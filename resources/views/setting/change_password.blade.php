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
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    </ol>
</nav>
{!! Form::open(array('route' => 'setting.password_submit','method'=>'POST', 'class'=>'cmxform','id'=>'company_change_password_form')) !!}
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Change Password</h4>
                  </div>
                </div>
                
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Old Password </label>
                                <input required="" type="password" class="form-control" name="old_password" id="exampleInputUsername1" autocomplete="off" placeholder="Old Password">
                            </div>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input required="" id="password" class="form-control" name="new_password" type="password" placeholder="Enter New Password">
                            </div>
                        </div>
                        <!-- Col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input required="" id="confirm_password" class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2 formsubmit"  type="submit" value="Submit">Save</button>
                    <button class="btn btn-light">Cancel</button>
                </fieldset>
            </div>
        </div>
    </div>
    
</div>
{!! Form::close() !!}

@endsection