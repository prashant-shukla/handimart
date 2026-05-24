@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('designers') }}">Designers</a></li>
						<li class="breadcrumb-item active" aria-current="page">Listing</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                  <div>
                    <h4 class="mb-3 mb-md-0">Designers</h4>
                  </div>
                  <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <a class="btn btn-primary add-new-button" href="{{ route('users.create') }}"><i class="btn-icon-prepend" data-feather="plus-circle"></i>  Add User</a>
                  </div>
                </div>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($user_list) > 0)
                        @foreach ($user_list as $user_data)
                          <tr>
                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar"><img src="{{ $user_data->image_thumb_path }}" alt=""></a>
                                <a href="#">{{ $user_data->name }} <span>{{ $user_data->user_id }}</span></a>
                              </h2>  
                            
                            </td>
                            <td>{{ $user_data->email }}</td>
                            <td>{{ $user_data->phone }}</td>
                            <td>{{ date('d-m-Y', strtotime($user_data->created_at)) }}</td>
                            <td class="text-right">
                              <a class="btn btn-secondary custom-btn-1" href="{{ url('dashboard/designers/my-profile/personal-detail',$user_data->id) }}">
                              <i class="link-icon" data-feather="edit"></i> Edit</a>
                              @if ($user_data->is_approved != 1)
                                <a class="btn btn-success custom-btn-2" href="{{ url('dashboard/designers/approve-account',$user_data->id) }}"><i class="link-icon" data-feather="check-circle"></i> Approve</a>
                              @endif
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
  var root_path = "{{URL::to('dashboard/designers')}}";
</script>

@endsection