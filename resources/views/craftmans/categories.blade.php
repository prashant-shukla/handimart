@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('craftmans') }}">Craftmans</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Add New Craftman Categories</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/craftmans/category_store')}}" method="post"
                    class="parsley-examples" id="craftman_category_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="">
                            </div>

                            <div class="form-group">
                                <label for="slug" class="control-label">Slug</label>
                                <input required="" name="slug" id="slug" type="text" class="form-control" placeholder="Enter Slug" value="">
                            </div>
                            <div class="form-group">
                                <label for="parent_id" class="control-label">Parent Craftman Category</label>
                                <select class="form-control">
                                    <option value="0">None</option>
                                    @if(count($parent_categories) > 0)
                                    @foreach ($parent_categories as $parent_cat)
                                    <option value="{{$parent_cat->id}}" >{{$parent_cat->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                               
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Enter description" rows="8"></textarea>
                            </div>
                        </div><!-- Col -->
                    </div>
                    <button type="submit" class="btn btn-primary submit">Save</button>
                </form>
    
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Craftman Categories</h4>
                    </div>
                    
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories_list) > 0)
                            @foreach ($categories_list as $category_data)
                            <tr>
                                <td>
                                    {{$category_data->name}}

                                </td>
                                <td>{{ $category_data->description }}</td>
                                <td>{{ $category_data->slug }}</td>
                               
                                <td class="text-right">
                                    <a class="btn btn-secondary custom-btn-1"
                                        href="{{ url('dashboard/craftmans/category_edit',$category_data->id) }}">
                                        <i class="link-icon" data-feather="edit"></i> Edit</a>
                                </td>
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
    var root_path = "{{URL::to('dashboard/craftmans')}}";
</script>

@endsection