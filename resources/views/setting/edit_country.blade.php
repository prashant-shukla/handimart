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
        <li class="breadcrumb-item active" aria-current="page">Country Update</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Update Country</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/setting/update_country/'.$id)}}" method="post"
                    class="parsley-examples" id="setting_country_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Country Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="{{$country_data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="short_name" class="control-label">Short Name</label>
                                <input required="" name="short_name" id="short_name" type="text" class="form-control" placeholder="Enter Short Name" value="{{$country_data->short_name}}">
                            </div>
                            <div class="form-group">
                                <label for="country_code" class="control-label">Country Code</label>
                                <input required="" name="country_code" id="country_code" type="text" class="form-control" placeholder="Enter Country Code" value="{{$country_data->country_code}}">
                            </div>
                            
                        </div><!-- Col -->
                    </div>
                    <button type="submit" class="btn btn-primary  theme-btn submit">Update</button>
                </form>
    
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
    
</div>
<script>
    var root_path = "{{URL::to('dashboard/setting')}}";
</script>

@endsection