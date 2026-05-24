@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('painters') }}">painters</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('painters.skills') }}">Skills</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Update Painters Skill</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/painters/skill_update/'.$id)}}" method="post"
                    class="parsley-examples" id="painter_skill_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="{{$skill_data->name}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Enter description" rows="8">{{$skill_data->description}}</textarea>
                            </div>
                        </div><!-- Col -->
                    </div>
                    <button type="submit" class="btn btn-primary submit">Save</button>
                </form>
    
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
    
</div>
<script>
    var root_path = "{{URL::to('dashboard/painters')}}";
</script>

@endsection