@extends('layouts.app_craftmans')

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
    <li class="breadcrumb-item"><a href="{{ url('dashboard/craftmans/jobs/'.$id) }}">Jobs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reviews</li>
  </ol>
</nav>

<div class="container">
  <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <p class="text-muted cborder-bottom">Here you can find out all the ratings and reviews that you have received
          </p>

          <div class="row  mt-2">
            <div class="col-md-12">
              <ul class="col-md-12 nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="received-tab" data-toggle="tab" href="#received" role="tab"
                    aria-controls="received" aria-selected="true">Reviews Received </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="submitted-tab" data-toggle="tab" href="#submitted" role="tab"
                    aria-controls="submitted" aria-selected="true">Review Submitted </a>
                </li>
              </ul>
              <div class="tab-content p-3" id="myTabContent">
                <!---------   Review received               --->
                <div class="tab-pane fade active show" id="received" role="tabpanel" aria-labelledby="received-tab">
                  @foreach($received_reviews as $recevied)
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="card-title mb-2 mt-2">{{$recevied->title}}</h6>
                      <label class="color-theme">Rating:</label>
                      @for($i=1;$i<=$recevied->ratings;$i++)
                        <i width='15' data-feather='star'></i>
                        @endfor
                    </div>
                    <div class="col-md-6 text-right">
                      <p class="text-muted mt-2">


                      </p>
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col-md-6">
                      <p class="text-muted cborder-bottom">
                      <div class="user-avatar">
                        <label style="display: inline-block;">You posted a review on</label>
                        <a href="#" class="avatar" style="display: inline-block;"><img
                            src="{{ $recevied->sender_data->image_thumb_path }}" alt=""></a>
                        <a href="#" class=" userName" style="display: inline-block;">{{$recevied->sender_name}},
                          <span>({{ $recevied->sender_data->user_id }})</span></a>
                      </div>
                      </p>
                    </div>
                    <div class="col-md-6 text-right">
                      <div class="example">
                        <p>
                          <a class="font-weight-bold" data-toggle="collapse" href="#collapseExample{{$recevied->id}}"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            See Reviews
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="collapse mt-1" id="collapseExample{{$recevied->id}}">
                    <p>{{$recevied->description}}</p>
                    <label class="review-date">
                      <i class="dateicon" data-feather="calendar"></i> {{ date('F jS, Y',
                      strtotime($recevied->created_at)) }}
                    </label>
                    @if(Auth::user()->role_id == '1')
                    <label class="float_right"><a href="#" class="btn deleteButtonEnquiry deleteReview"
                        data-review_id="{{$recevied->id}}" data-id="{{$recevied->receiver_id}}">
                        <!-- <i class="link-icon" data-feather="trash-2"></i> --> Delete
                      </a></label>
                    @endif
                  </div>
                  <hr class="mt-2">
                  @endforeach

                </div>
                <!--------------   Review Submitted        ------------------->
                <div class="tab-pane fade" id="submitted" role="tabpanel" aria-labelledby="submitted-tab">
                  @foreach($sent_reviews as $submitted)
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="card-title mb-2 mt-2">{{$submitted->title}}</h6>
                      <label class="color-theme">Rating:</label>
                      @for($i=1;$i<=$submitted->ratings;$i++)
                        <i width='15' data-feather='star'></i>
                        @endfor
                    </div>
                    <div class="col-md-6 text-right">
                      <p class="text-muted mt-2">


                      </p>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <p class="text-muted cborder-bottom">
                      <div class="user-avatar">
                        <label style="display: inline-block;">You posted a review on</label>
                        <a href="#" class="avatar" style="display: inline-block;"><img
                            src="{{ $submitted->receiver_data->image_thumb_path }}" alt=""></a>
                        <a href="#" class=" userName" style="display: inline-block;">{{$submitted->receiver_name}},
                          <span>({{ $submitted->receiver_data->user_id }})</span></a>
                      </div>

                      </p>
                    </div>
                    <div class="col-md-6 text-right">
                      <div class="example">
                        <p>
                          <a class="font-weight-bold" data-toggle="collapse" href="#collapseExample{{$submitted->id}}"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            See Reviews
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="collapse mt-1" id="collapseExample{{$submitted->id}}">
                    <p>{{$submitted->description}}</p>
                    <label class="review-date">
                      <i class="dateicon" data-feather="calendar"></i> {{ date('F jS, Y',
                      strtotime($submitted->created_at)) }}
                    </label>
                    @if(Auth::user()->role_id == '1')
                    <label class="float_right"><a href="#" class="btn deleteButtonEnquiry deleteReview"
                        data-review_id="{{$submitted->id}}" data-id="{{$submitted->sender_id}}">
                        <!-- <i class="link-icon" data-feather="trash-2"></i> --> Delete
                      </a></label>
                    @endif
                  </div>
                  <hr class="mt-2">
                  @endforeach
                </div>
              </div>
            </div>
          </div>

        </div> <!-- end card-body -->
      </div>
    </div> <!-- end col-->
  </div>

</div>
<script>
  var root_path = "{{URL::to('dashboard/craftmans/reviews')}}";

</script>
@endsection