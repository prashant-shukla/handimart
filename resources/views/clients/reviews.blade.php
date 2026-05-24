@extends('layouts.app_clients')

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
    <li class="breadcrumb-item"><a href="{{ url('dashboard/clients/jobs/'.$id) }}">Jobs</a></li>
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
                <!-- <li class="nav-item">
                  <a class="nav-link active" id="received-tab" data-toggle="tab" href="#received" role="tab"
                    aria-controls="received" aria-selected="true">Reviews Received </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link active" id="submitted-tab" data-toggle="tab" href="#submitted" role="tab"
                    aria-controls="submitted" aria-selected="true">Review Submitted </a>
                </li>
              </ul>
              <div class="tab-content p-top-3" id="myTabContent">
                <!---------   Review received               --->
                
                <!--------------   Review Submitted        ------------------->
                <div class="tab-pane fade active show" id="submitted" role="tabpanel" aria-labelledby="submitted-tab">
                  
                  <div class="row" >
                    @php
                    $count = 0;
                    @endphp
                    @foreach($sent_reviews as $submitted)
                    @php
                    $count++;
                    @endphp
                      <div class="col-md-6" id="reviewOuterDiv_{{$submitted->id}}"> 
                        <div class="card rounded">
                          <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="d-flex align-items-center">
                                <img class="img-xs rounded-circle" src="{{ $submitted->receiver_data->image_thumb_path }}" alt="">
                                <div class="ml-2">
                                  <p><a href="{{ url('dashboard/clients/my-profile/profile/'.$id.'/'.$submitted->receiver_id) }}" class=" userNameReview" style="display: inline-block;">{{$submitted->receiver_name}},
                                    <span>({{ $submitted->receiver_data->user_id }})</span></a></p>
                                  <p class="tx-11 text-muted">{{ ucfirst($submitted->receiver_data->public_name)}}</p>
                                </div>
                              </div>
                              <div class="dropdown" id="ratingSection_{{$submitted->id}}">
                                @for($i=1;$i<=$submitted->ratings;$i++)
                                  <!-- <i width='15' data-feather='star'></i> -->
                                  <i class="fa fa-star fa-yellow" ></i>
                                @endfor
                                @if($submitted->ratings < 5)
                                @php
                                $less_rating = 5 - $submitted->ratings;
                                @endphp
                                @for($i=1;$i<=$less_rating;$i++)
                                  <!-- <i width='15' data-feather='star'></i> -->
                                  <i class="fa fa-star fa-gray" ></i>
                                @endfor
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <h6 class="card-title mb-2 mt-2" id="titleSection_{{$submitted->id}}">{{$submitted->title}}</h6>
                            <p class="mb-3 tx-14" id="descriptionSection_{{$submitted->id}}">{{$submitted->description}}</p>
                            @if(isset($submitted->review_images))
                              <div class="row">

                              @foreach($submitted->review_images as $review_image)
                                <div class="col-md-3">
                                  <a href="{{$review_image->image_path }}" data-lightbox="image-1" >
                                    <img class=" custom_image_review" src="{{$review_image->image_thumb_path }}" alt="">
                                  </a>
                                </div>
                              @endforeach
                              </div>

                            @endif
                            <!-- <img class="img-fluid" src="https://via.placeholder.com/513x342" alt=""> -->
                            <label class="review-date">
                              <i class="dateicon" data-feather="calendar"></i> {{ date('F jS, Y',
                              strtotime($submitted->created_at)) }}
                            </label>

                            <!-- Reply Section -->
                            @if(isset($submitted->review_reply) && count($submitted->review_reply) > 0)
                            <h6 class="card-sub-title mb-2 mt-2">
                                Replies
                              </h6>
                              <a data-toggle="collapse" href="#collapseExample{{$submitted->id}}"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                See All Replies
                              </a>
                              <div class="collapse mt-1" id="collapseExample{{$submitted->id}}">

                              
                                @foreach($submitted->review_reply as $review_reply)
                                <div class="d-flex align-items-center justify-content-between">
                                  <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle" src="{{ $review_reply->user_image_thumb_path }}" alt="">
                                    <div class="ml-2">
                                      <p><a href="{{ url('dashboard/clients/my-profile/profile/'.$id.'/'.$review_reply->sender_id) }}" class=" userNameReview" style="display: inline-block;">{{$review_reply->name}},
                                        <span>({{ $review_reply->user_id }})</span></a></p>
                                      <p class="tx-11 text-muted">{{ ucfirst($review_reply->public_name) }}</p>
                                    </div>
                                  </div>
                                </div>
                                <p class=" tx-14 replytag">{{$review_reply->reply}}</p>
                                <label class="review-reply-date">
                                  <i class="dateicon" data-feather="calendar"></i> {{ date('F jS, Y', strtotime($review_reply->created_at)) }}
                                </label>
                                <hr class="mt-2">
                                @endforeach
                              </div>
                            @endif
                            <!-- Reply Section End -->

                          </div>
                          <div class="card-footer">
                            <div class="d-flex post-actions">
                              <a href="javascript:;" class="d-flex align-items-center text-muted mr-4 updateReview" data-review_id="{{$submitted->id}}" data-id="{{$submitted->sender_id}}">
                                <i class="icon-md" data-feather="edit"></i>
                                <p class="d-none d-md-block ml-2 mt-1">Edit</p>
                              </a>
                              <a href="javascript:;" class="d-flex align-items-center text-muted mr-4 deleteReview" data-review_id="{{$submitted->id}}" data-id="{{$submitted->sender_id}}">
                                <i class="icon-md" data-feather="trash"></i>
                                <p class="d-none d-md-block ml-2 mt-1">Delete </p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                    @if($count == 2)
                    @php
                    $count = 0;
                    @endphp
                    </div>
                    <div class="row mt-15" >
                    @endif
                    @endforeach
                  </div>

                  
                </div>
              </div>
            </div>
          </div>

        </div> <!-- end card-body -->
      </div>
    </div> <!-- end col-->
  </div>

</div>
<div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editReviewModalLabel">Edit Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="review_title" class="control-label">Title:</label>
            <input type="text" class="form-control" id="review_title" name="review_title">
            <input type="hidden" class="form-control" id="review_id" name="review_id">
          </div>
          <div class="form-group">
            <label for="review_title" class="control-label">Ratings:</label>
            <select class="form-control" id="review_ratings" name="review_ratings">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="review_description" class="control-label">Description:</label>
            <textarea class="form-control" id="review_description" name="review_description" rows="6"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary theme-btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary theme-btn" id="updateReviewNow">Update Now</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="replyModalLabel">Edit Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="review_reply" class="control-label">Reply:</label>
            <input type="hidden" class="form-control" id="review_id_for_reply" name="review_id_for_reply">
            <input type="hidden" class="form-control" id="id_for_reply" name="id_for_reply">
            <textarea class="form-control" id="review_reply" name="review_reply" rows="6"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary theme-btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary theme-btn" id="sendReplyNow">Reply Now</button>
      </div>
    </div>
  </div>
</div>
<script>
  var root_path = "{{URL::to('dashboard/clients/reviews')}}";
  var csrf_token = "{{ csrf_token() }}";
</script>
@endsection