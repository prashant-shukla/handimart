@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('photographers') }}">Photographer</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('photographers.categories') }}">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Update Photographer Categories</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/photographers/category_update/'.$id)}}" method="post"
                    class="parsley-examples" id="photographer_category_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="{{$caegories_data->name}}">
                            </div>

                            <div class="form-group">
                                <label for="slug" class="control-label">Slug</label>
                                <input required="" name="slug" id="slug" type="text" class="form-control" placeholder="Enter Slug" value="{{$caegories_data->slug}}">
                            </div>

                            <div class="form-group">
                                <label for="parent_id" class="control-label">Parent Photographer Category</label>
                                <select class="form-control">
                                    <option value="0">None</option>
                                    @if(count($parent_categories) > 0)
                                    @foreach ($parent_categories as $parent_cat)
                                    <option value="{{$parent_cat->id}}" @if($parent_cat->id == $caegories_data->parent_id) selected @endif >{{$parent_cat->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                               
                            </div>
                            
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Enter description" rows="8">{{$caegories_data->description}}</textarea>
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
    var root_path = "{{URL::to('dashboard/photographers')}}";
</script>

@endsection