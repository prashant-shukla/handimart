@extends('layouts.app_designers')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
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
        <li class="breadcrumb-item"><a href="{{ url('dashboard/designers/jobs/'.$id) }}">Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Requirement</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Requirements</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <a class="btn btn-primary add-new-button" href="{{ url('dashboard/designers/jobs_a/create/'.$id) }}"><i class="btn-icon-prepend"
                                data-feather="plus-circle"></i> Add Requirement</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Posted</th>
                                <th>Date Expire</th>
                                <th>Applications</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($job_listing) > 0)
                            @foreach ($job_listing as $job_data)
                            <tr>
                                <td>
                                    {{ $job_data->name }}
                                </td>
                                <td>{{ date('F jS, Y', strtotime($job_data->created_at)) }}</td>
                                <td>{{  date('F jS, Y', strtotime($job_data->closing_date)) }}</td>
                                <td>{{ $job_data->applications ?? '0' }}</td>
                                <td><a href="#" class="badge badge-success">{{ $job_data->status ?? 'New Posted' }}<a></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu dmenucustom" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ url('dashboard/designers/jobs_a/job_preview',[$job_data->id,$id]) }}"><i
                                                    class="link-icon" data-feather="eye"></i>View Preview</a>
                                            <a class="dropdown-item"
                                                href="{{ url('dashboard/designers/jobs_a/edit',[$job_data->id,$id]) }}"><i
                                                    class="link-icon" data-feather="edit"></i>Edit</a>
                                            <a class="dropdown-item deleteJob" data-id="{{$job_data->id}}" data-userid="{{$id}}" href="#">
                                                <i class="link-icon" data-feather="trash-2"></i>Delete</a>


                                        </div>
                                    </div>
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
    var root_path = "{{URL::to('dashboard/designers/jobs_a')}}";
    
  </script>
@endsection