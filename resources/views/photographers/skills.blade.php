@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('photographers') }}">Photographers</a></li>
        <li class="breadcrumb-item active" aria-current="page">Skills</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 mb-md-0">Add New Photographers Skills</h4>
                <hr class="mt-2">
                <form action="{{url('dashboard/photographers/skill_store')}}" method="post"
                    class="parsley-examples" id="photographers_skill_form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input required="" name="name" id="name" type="text" class="form-control" placeholder="Enter Name" value="">
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
                        <h4 class="mb-3 mb-md-0">Photographers Skills<lls/h4>
                    </div>
                    
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($skills_list) > 0)
                            @foreach ($skills_list as $skills_list)
                            <tr>
                                <td>
                                    {{$skills_list->name}}

                                </td>
                                <td>{{ $skills_list->description }}</td>
                               
                                <td class="text-right">
                                    <a class="btn btn-secondary custom-btn-1"
                                        href="{{ url('dashboard/photographers/skill_edit',$skills_list->id) }}">
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
    var root_path = "{{URL::to('dashboard/photographers')}}";
</script>

@endsection