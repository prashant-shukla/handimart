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
        <li class="breadcrumb-item"><a href="{{ route('pages') }}">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us Contents</li>
    </ol>
</nav>
{!! Form::open(array('route' => 'pages.contact_submit','method'=>'POST', 'class'=>'cmxform','id'=>'contact_contents_form')) !!}
<div class="row ">
    <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Contact Us Contents</h4>
                  </div>
                </div>
                @if(!isset($contact_us_contents))
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="heading_line">Heading Line</label>
                                {!! Form::textarea('heading_line', null, array('id'=>'heading_line', 'placeholder' => 'Heading Line','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Contact Heading</label>
                                {!! Form::text('contact_heading', null, array('id'=>'contact_heading', 'placeholder' => 'Contact Heading','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address Heading</label>
                                {!! Form::text('address_heading', null, array('id'=>'address_heading', 'placeholder' => 'Addres Heading','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Work With us Heading</label>
                                {!! Form::text('work_with_us_heading', null, array('id'=>'work_with_us_heading', 'placeholder' => 'Work With us Heading','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Form Heading</label>
                                {!! Form::text('form_heading', null, array('id'=>'form_heading', 'placeholder' => 'Form Heading','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>


                    <input class="btn btn-primary formsubmit" style="width: 140px; height: 40px;" type="submit" value="Submit">
                </fieldset>
                @else
                <fieldset>
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="heading_line">Heading Line</label>
                                {!! Form::textarea('heading_line', $contact_us_contents->heading_line, array('id'=>'heading_line', 'placeholder' => 'Heading Line','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Contact Heading</label>
                                {!! Form::text('contact_heading', $contact_us_contents->contact_heading, array('id'=>'contact_heading', 'placeholder' => 'Contact Heading','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address Heading</label>
                                {!! Form::text('address_heading', $contact_us_contents->address_heading, array('id'=>'address_heading', 'placeholder' => 'Addres Heading','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Work With us Heading</label>
                                {!! Form::text('work_with_us_heading', $contact_us_contents->work_with_us_heading, array('id'=>'work_with_us_heading', 'placeholder' => 'Work With us Heading','class' => 'form-control','required'=>'required')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Form Heading</label>
                                {!! Form::text('form_heading', $contact_us_contents->form_heading, array('id'=>'form_heading', 'placeholder' => 'Form Heading','class' => 'form-control')) !!}
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