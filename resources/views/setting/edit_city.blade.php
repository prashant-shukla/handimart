@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('setting') }}">Settings</a></li>
        <li class="breadcrumb-item " aria-current="page"><a href="{{ route('setting.regions') }}">Regions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update City</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Update City</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/setting/update_city/'.$id)}}" method="post"
                    class="parsley-examples" id="setting_city_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="country" class="control-label">Select Country</label>
                                <select name="country" class="form-control country_dropdown" >
                                    <option>Select Country</option>
                                    @if(isset($countries))
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}" @if($country->id == $city_data->country_id) selected @endif >{{$country->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="state" class="control-label">Select State</label>
                                <select name="state" class="form-control" id="state_dropdown">
                                    <option>Select State</option>
                                    @if(isset($states))
                                        @foreach ($states as $state)
                                        <option value="{{$state->id}}" @if($state->id == $city_data->state_id) selected @endif >{{$state->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">City Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="{{$city_data->name}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="background" class="control-label">Background Image</label>
                                <input name="background" id="background" type="file" class="form-control" placeholder="Select a Background file" value="">
                                <span>Leave blank if you dont want to update background image</span>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary submit theme-btn">Update</button>
                    <a href="#" class="btn deleteButton deleteCity" data-id="{{$city_data->id}}">Delete</a>
                </form>
    
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
    
</div>
<script>
    var root_path = "{{URL::to('dashboard/setting')}}";
    var csrf_token = "{{ csrf_token() }}";
</script>

@endsection