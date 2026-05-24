@extends('layouts.app_craftmans')

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

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Become A Craftman</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    @if(empty($business_detail) || Auth::user()->role_id == '1')
    <a class="btn btn-primary " href="{{ route('clients.business-detail',$id) }}"><i class="btn-icon-prepend" data-feather="briefcase"></i> &nbsp; Change Serive Type</a>
    @endif
  </div>
</div>

<div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
               <div class="col-md-12">
                 <div class="card rounded card-body py-3">
                   <h6 class="card-title mb-2">Business Details </h6>
                   <p class="text-muted cborder-bottom">Add your business details which are related to your account</p><hr class="mt-2 pb-4">
            <div class="col-md-8" style="margin:0 auto;">

        
        @if(empty($business_detail))

        <form action="{{url('dashboard/craftmans/business-profile/business_submit/'.$id)}}" method="post" class="parsley-examples" id="business_details_form"  enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Company Name</label>
                <input name="company_name"  type="text" class="form-control" placeholder="Enter Company Name">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                 <label class="control-label">Phone Number</label>
                 <div class="row">
                    <div class="col-sm-3 pr-0"> 
                        <select name="ccode" class="form-control pl-0">
                        <option value="+91" >+91</option>
                        <option value="+61" >+61</option>
                        <option value="+86" >+86</option>
                        <option value="+60" >+60</option>
                        </select>
                     </div>
                    <div class="col-sm-9">
                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="">
                    </div>
                    
                 </div>
              </div>
           </div>
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Website</label>
                <input name="website"  type="url" class="form-control isValidWebsite" placeholder="Enter Website ">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email"  type="email" class="form-control" placeholder="Enter Email">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Work In</label>
                <select name='work_in' class="form-control">                         
                  <option value="wooden">Wooden</option>
                  <option value="iron">Iron</option>
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Category</label>
                <select name='category' class="form-control">     
                  <option value="">Select Category</option>
                  @if(count($craftman_categories) > 0)
                    @foreach ($craftman_categories as $craftman_cat)
                      <option value="{{$craftman_cat->id}}" >{{$craftman_cat->name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Experience</label>
                <input name="experience" type="number" class="form-control" placeholder="Enter Experience">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">All Over Job Done</label>
                <input name="job_done" type="text" class="form-control" placeholder="Enter All Over Job Done">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Number Of Team Member</label>
                <input required="required" name="team_size" type="number" class="form-control" placeholder="Enter Number Of Team Member">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Per Day Fee</label>
                <input name="per_day_fee"  type="text" class="form-control" placeholder="Enter Per Day Fee">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Logo</label>
                <input name="logo" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group mb-0">
                <label class="control-label">Skills</label>
                <div class="row">
                  
                    
                    @if(count($craftman_skills) > 0) 
                    @php $indexVal = 1; @endphp
                    @foreach ($craftman_skills as $craftman_skill)
                    <div class="col-sm-4">
                    <div class="custom-control custom-checkbox mb-2">
                      <input name='skills[]' value='{{$craftman_skill->name}}' type="checkbox" class="custom-control-input" id="customCheck{{$indexVal}}">
                      <label class="custom-control-label" for="customCheck{{$indexVal}}">{{$craftman_skill->name}}</label>
                    </div>
                  </div>
                      @php $indexVal++; @endphp
                    @endforeach
                    @endif
                  
                </div>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="form-check form-check-flat form-check-primary mt-2 mb-2">
            <label class="form-check-label">
              <input type="checkbox" name="terms_conditions" class="form-check-input">
              Terms & Conditions
              <i class="input-frame"></i>
            </label>
            <label for="terms_conditions"></label>
          </div>
          <button type="submit" class="btn btn-primary submit">Add</button>
          <button class="btn btn-light">Cancel</button>
        </form>

        @else 
        <p class="text-muted cborder-bottom">Update your business details which are related to your account</p><hr class="mt-2">
        <form action="{{url('dashboard/craftmans/business-profile/business_submit/'.$id)}}" method="post" class="parsley-examples" id="business_details_form"  enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Company Name</label>
                <input name="company_name"  type="text" class="form-control" placeholder="Enter Company Name" value="{{ $business_detail->company_name }}">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                 <label class="control-label">Phone Number</label>
                 <div class="row">
                    <div class="col-sm-3 pr-0"> 
                        <select name="ccode" class="form-control pl-0">
                        <option value="+91" @if($business_detail->ccode=='+91') selected  @endif >+91</option>
                        <option value="+61" @if($business_detail->ccode=='+61') selected  @endif >+61</option>
                        <option value="+86" @if($business_detail->ccode=='+86') selected  @endif >+86</option>
                        <option value="+60" @if($business_detail->ccode=='+60') selected  @endif >+60</option>
                        </select>
                     </div>
                    <div class="col-sm-9">
                        <input id="phone" class="form-control isValidPhone" name="phone" type="text" placeholder="0123456789" value="{{ $business_detail->phone }}">
                    </div>
                    
                 </div>
              </div>
           </div>
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Website</label>
                <input name="website"  type="url" class="form-control isValidWebsite" placeholder="Enter Website "  value="{{ $business_detail->website }}">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email"  type="email" class="form-control" placeholder="Enter Email" value="{{ $business_detail->email }}" >
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Work In</label>
                <select name='work_in' class="form-control">                         
                  <option value="wooden" @if($business_detail->work_in=='wooden') selected  @endif >Wooden</option>
                  <option value="iron" @if($business_detail->work_in=='iron') selected  @endif >Iron</option>
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Category</label>
                <select name='category' class="form-control">     
                  <option value="">Select Category</option>
                  @if(count($craftman_categories) > 0)
                    @foreach ($craftman_categories as $craftman_cat)
                      <option value="{{$craftman_cat->id}}" @if($craftman_cat->id==$business_detail->category ) selected @endif >{{$craftman_cat->name}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Experience</label>
                <input name="experience" type="number" class="form-control" placeholder="Enter Experience" value="{{ $business_detail->experience }}" >
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">All Over Job Done</label>
                <input name="job_done" type="text" class="form-control" placeholder="Enter All Over Job Done" value="{{ $business_detail->job_done }}">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Number Of Team Member</label>
                <input required="required" name="team_size" type="number" class="form-control" placeholder="Enter Number Of Team Member" value="{{ $business_detail->team_size }}">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Per Day Fee</label>
                <input required="required" name="per_day_fee" type="text" class="form-control" placeholder="Enter Per Day Fee" value="{{ $business_detail->per_day_fee }}">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Logo</label>
                <input name="logo" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group mb-0">
                <label class="control-label">Skills</label>
                <div class="row">
                  
                    @if(count($craftman_skills) > 0) 
                    @php $indexVal = 1; @endphp
                    @foreach ($craftman_skills as $craftman_skill)
                    <div class="col-sm-4">
                    <div class="custom-control custom-checkbox mb-2">
                      <input name='skills[]' value='{{$craftman_skill->name}}' type="checkbox" class="custom-control-input" id="customCheck{{$indexVal}}" @if (strpos($business_detail->skills, $craftman_skill->name) !== false) checked @endif>
                      <label class="custom-control-label" for="customCheck{{$indexVal}}">{{$craftman_skill->name}}</label>
                    </div>
                  </div>
                      @php $indexVal++; @endphp
                    @endforeach
                    @endif
                </div>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="form-check form-check-flat form-check-primary mt-2 mb-2">
            <label class="form-check-label">
              <input type="checkbox" name="terms_conditions" class="form-check-input">
              Terms & Conditions
              <i class="input-frame"></i>
            </label>
            <label for="terms_conditions"></label>
          </div>
          <button type="submit" class="btn btn-primary submit">Add</button>
          <button class="btn btn-light">Cancel</button>
        </form>
         @endif

      </div> <!-- end card-body -->
    </div> <!-- end card-->
  </div><!-- end col -->
</div>
</div>

<script>
  var root_path = "{{URL::to('dashboard/craftmans')}}";
</script>

@endsection