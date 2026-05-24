@extends('layouts.app_painters')

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
<!-----  If Client is Painters         ---->
<div>
  <h4 class="mb-3">Become A Painter</h4>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-2">Address Details </h6>
        <p class="text-muted cborder-bottom">Change your address here.</p>
        <hr class="mt-2">
        <form action="{{url('dashboard/painters/business-profile/save-address/'.$id)}}" method="post" class="parsley-examples"
          id="address_form">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Address</label>
                <input name="map_address" id="map_address" type="text" class="form-control" placeholder="Enter Address"
                  value="{{$user->google_address}}">
              </div>
            </div><!-- Col -->
          </div>
          <button type="submit" class="btn btn-primary submit">Save</button>
          <button class="btn btn-light">Cancel</button>
        </form>

      </div> <!-- end card-body -->
    </div> <!-- end card-->
  </div><!-- end col -->
</div>
<script>
  var root_path = "{{URL::to('dashboard/painters')}}";
</script>

@endsection