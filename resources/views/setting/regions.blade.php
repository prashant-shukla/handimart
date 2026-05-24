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
        <li class="breadcrumb-item active" aria-current="page">Regions</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-20">Manage Regions</h4>
                <div class="example">
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#countryTab">Country</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#stateTab">State</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cityTab">City</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content">
                        <div id="countryTab" class="tab-pane fade in active show">
                            <h4 class="card-title mt=20" style="font-size: 16px; margin-top: 20px;">Add Country</h4>
                            <form action="{{url('dashboard/setting/store_country')}}" method="post" class="parsley-examples" id="setting_country_form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Country Name</label>
                                            <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_name" class="control-label">Short Name</label>
                                            <input required="" name="short_name" id="short_name" type="text" class="form-control" placeholder="Enter Short Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="country_code" class="control-label">Country Code</label>
                                            <input required="" name="country_code" id="country_code" type="text" class="form-control" placeholder="Country Code" value="">
                                        </div>
                                    </div><!-- Col -->
                                </div>
                                <button type="submit" class="btn btn-primary submit theme-btn">Save</button>
                            </form>
                        </div>
                        <div id="stateTab" class="tab-pane fade">
                            <h4 class="card-title mt=20" style="font-size: 16px; margin-top: 20px;">Add State</h4>
                            <form action="{{url('dashboard/setting/store_state')}}" method="post" class="parsley-examples" id="setting_state_form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="country" class="control-label">Select Country</label>
                                            <select required="" name="country" class="form-control">
                                                <option>Select Country</option>
                                                @if(isset($countries))
                                                    @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" >{{$country->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name" class="control-label">State Name</label>
                                            <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="short_name" class="control-label">Short Name</label>
                                            <input name="short_name" id="short_name" type="text" class="form-control" placeholder="Enter Short Name" value="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary submit theme-btn">Save</button>
                            </form>
                        </div>
                        <div id="cityTab" class="tab-pane fade">
                            <h4 class="card-title mt=20" style="font-size: 16px; margin-top: 20px;">Add City</h4>
                            <form action="{{url('dashboard/setting/store_city')}}" method="post" class="parsley-examples" id="setting_city_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country" class="control-label">Select Country</label>
                                            <select name="country" class="form-control country_dropdown" >
                                                <option>Select Country</option>
                                                @if(isset($countries))
                                                    @foreach ($countries as $country)
                                                    <option value="{{$country->id}}" >{{$country->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="state" class="control-label">Select State</label>
                                            <select name="state" class="form-control" id="state_dropdown">
                                                <option>Select State</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name" class="control-label">City Name</label>
                                            <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="background" class="control-label">Back Ground Image</label>
                                            <input name="background" id="background" type="file" class="form-control" placeholder="Select a Background file" value="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary submit theme-btn">Save</button>
                            </form>
                        </div>
                        
                    </div>


                </div>
                

            </div>
        </div>
    </div>

    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Regions <lls/h4>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div class="row" style="width: 100%;">
                        <div class="col-md-4">
                            <select class="" name="countryRight" id="countryDropReg">
                                <option value="0">Select Country</option>
                                @if(isset($countries))
                                    @foreach ($countries as $country_data)
                                        <option value="{{$country_data->id}}" @if($country_id == $country_data->id) selected @endif >{{$country_data->name}} ({{$country_data->short_name}})</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select class="" name="stateRIght" id="stateDropReg">
                                <option value="">Select State</option>
                                @if(isset($states))
                                    @foreach ($states as $state_data)
                                        <option value="{{$state_data->id}}" @if($state_id == $state_data->id) selected @endif >{{$state_data->name}} ({{$state_data->short_name}})</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ url('dashboard/setting/edit_country',$CountryData->id) }}"><i class="link-icon smallFeather" data-feather="edit"></i> </a></a>
                            <Label>{{$CountryData->name}} ({{$CountryData->short_name}})</Label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="" >
                        <thead>
                            <tr>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Zip Code</th>
                                <th>Craftmans</th>
                                <th>Manufacturers</th>
                                <th>Exporters</th>
                                <th>Designers</th>
                                <th>Photographers</th>
                                <th>Painters</th>
                                <th>Clients</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cities))
                            @foreach ($cities as $city_data)
                            <tr>
                                <td>
                                    @if(isset($StateData))
                                    <a href="{{ url('dashboard/setting/edit_state',$StateData->id) }}"><i class="link-icon smallFeather" data-feather="edit"></i> </a> {{$StateData->name}}
                                    @else 
                                     -- 
                                     @endif
                                </td>
                                <td><a href="{{ url('dashboard/setting/edit_city',$city_data->id) }}"><i class="link-icon smallFeather" data-feather="edit"></i> </a> {{ $city_data->name }}</td>
                                <td>{{ $city_data->zip_code }}</td>
                                <td>{{ $city_data->craftsman_count ?? 0 }}</td>
                                <td>{{ $city_data->manufacturer_count ?? 0 }}</td>
                                <td>{{ $city_data->exporters_count ?? 0 }}</td>
                                <td>{{ $city_data->designer_count ?? 0 }}</td>
                                <td>{{ $city_data->photographers_count ?? 0 }}</td>
                                <td>{{ $city_data->painter_count ?? 0 }}</td>
                                <td>{{ $city_data->clients_count ?? 0 }}</td>
                            </tr>
                                
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var root_path = "{{URL::to('dashboard/setting')}}";
    var csrf_token = "{{ csrf_token() }}";
  </script>
@endsection