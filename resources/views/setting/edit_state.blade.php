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
        <li class="breadcrumb-item active" aria-current="page">Country State</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Update State</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/setting/update_state/'.$id)}}" method="post"
                    class="parsley-examples" id="setting_state_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="country" class="control-label">Select Country</label>
                                    <select required="" name="country" class="form-control">
                                        <option>Select Country</option>
                                        @if(isset($countries))
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}" @if($state_data->country_id == $country->id) selected @endif </option>{{$country->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                
                                </div>
                                <label for="name" class="control-label">State Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="{{$state_data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="short_name" class="control-label">Short Name</label>
                                <input required="" name="short_name" id="short_name" type="text" class="form-control" placeholder="Enter Short Name" value="{{$state_data->short_name}}">
                            </div>
                            
                            
                        </div><!-- Col -->
                    </div>
                    <button type="submit" class="btn btn-primary theme-btn submit">Update</button>
                    <a href="#" class="btn deleteButton deleteState" data-id="{{$state_data->id}}">Delete</a>
                </form>
    
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
    
</div>
<script>
    var root_path = "{{URL::to('dashboard/setting')}}";
</script>

@endsection