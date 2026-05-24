@extends('layouts.app_clients')

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
<!-----  If Client is Craftman         ---->
<div class="row justify-content-md-center mt-80">
<div col-md-4 col-md-offset-4>
  <h4 class="mb-3">Become A Service Provider</h4>
</div>
</div>
<div class="row justify-content-md-center">
  <div class=" col-md-4 col-md-offset-4">
    <div class="card">
      <div class="card-body">
        
        <form action="{{url('dashboard/clients/business-profile/service_submit/'.$id)}}" method="post" class="parsley-examples" id="business_details_form">
          @csrf
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label">Select Service Provider Type</label>
                <select name='service_type' class="form-control">   
                  <option>Select</option>    
                    @foreach ($roles as $role)
                      <option value="{{$role->id}}" >{{ ucfirst($role->name) }}</option>
                    @endforeach      
                </select>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <button type="submit" class="btn btn-primary submit add-new-button">Submit</button>
        </form>

      </div> <!-- end card-body -->
    </div> <!-- end card-->
  </div><!-- end col -->
</div>
<script>
  var root_path = "{{URL::to('dashboard/clients')}}";
</script>

@endsection