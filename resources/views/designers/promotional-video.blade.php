@extends('layouts.app_designers')

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

<div>
    <h4 class="mb-3">Business Settings</h4>
</div>

<div class="row mb-4">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-2">Promotional Video</h6>
          <p class="text-muted cborder-bottom">Change your promotional video details which are related to your account</p><hr class="mt-2">
                <form action="{{url('dashboard/designers/business-profile/promotional_submit/'.$id)}}" method="post" class="parsley-examples">
                  @csrf              
                  <div class="col-sm-6 pl-0">
                    <div class="form-group">
                      <label class="control-label">Video Url</label>
                      <input required="" value="" parsley-type="url" name="video_link" type="url" class="form-control" placeholder="Enter Video Url">
                    </div>
                  </div><!-- Col -->
                  <div class="col-sm-6 pl-0">
                    <div class="form-group">
                      <label class="control-label">Video Title</label>
                      <input required="" value="" parsley-type="text" name="title" type="text" class="form-control" placeholder="Enter Video Title">
                    </div>
                  </div><!-- Col -->
                  <div class="col-sm-6 pl-0">
                    <div class="form-group">
                      <label class="control-label">Video Description</label>
                      <textarea required="" class="form-control" maxlength="120" rows="3" name="description" placeholder="Enter Video Description"></textarea>
                      <p class="text-muted tx-10">Only 120 Letters.</p>
                    </div>
                  </div><!-- Col -->
               
                <button type="submit" class="btn btn-primary submit">Add</button>
                <button class="btn btn-light">Cancel</button>
              </form>
      </div> <!-- end card-body -->
    </div>
  </div> <!-- end col-->
</div>

@if(count($result) > 0)
<div class="row page-title align-items-center">
  <div class="col-md-3 col-xl-6">
    <h4 class="mb-3">Added Videos</h4>
  </div>
</div>
<div class="row">
  @foreach($result as $video)
  <div class="col-xl-4 col-lg-6 mt-4">
    <div class="card">
      <div class="card-body pl-0 pr-0 pt-0 pb-0">
        <iframe class='radius' width="333" height="280" src="https://www.youtube.com/embed/{{ $video->video_new_link }}"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 


       <!-- <video width="333" height="280" controls>
          <source src="$video->video_link" type="video/mp4">
              Your browser does not support the video tag.
        </video> -->

      </div>
      <div class="card-body">
       <h5 class="card-title font-size-16">{{$video->title}}</h5>
       <p style="height: 63px" class="card-text text-muted">{{$video->description}}</p>
     </div>
     <div class="card-body border-top">
      <div class="row align-items-center">
        <div class="col-sm-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item pr-2">
              <i width="15" height="15" class="link-icon" data-feather="calendar"></i>
              <span class="tooltiptext">{{ date('d-m-Y', strtotime($video->created_at))}}</span>
            </li>
          </ul>
        </div>
        <div class="col offset-sm-2 pl-0 pr-0">
          <div id="job-menu" class="text-right col-sm-auto pl-0 pr-0">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="{{url('dashboard/designers/business-profile/delete_promotional/'.$id.'/'.$video->id)}}" class="text-custom d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Video">
                  <i width="15" height="15" class="link-icon" style="color: red" data-feather='trash-2'></i>  
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end card -->
</div>
@endforeach
</div>
@endif

<script>
  var root_path = "{{URL::to('dashboard/designers')}}";
  
</script>


@endsection