@extends('layouts.app_exporters')

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
<!-----  If Client is exporters         ---->
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Become A Exporter</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
  @if(empty($business_detail) || Auth::user()->role_id == '1')
    <a class="btn btn-primary " href="{{ route('clients.business-detail',$id) }}"><i class="btn-icon-prepend" data-feather="briefcase"></i> &nbsp; Change Serive Type</a>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-2">Business Details </h6>

        @if(empty($business_detail))

        <p class="text-muted cborder-bottom">Add your business details which are related to your account</p><hr class="mt-2">
        <form action="{{url('dashboard/exporters/business-profile/business_submit/'.$id)}}" method="post" class="parsley-examples" id="business_details_form" enctype="multipart/form-data">
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
                <input name="website"  type="text" class="form-control isValidWebsite" placeholder="Enter Website ">
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
                  @if(count($exporter_categories) > 0)
                    @foreach ($exporter_categories as $exporter_cat)
                      <option value="{{$exporter_cat->id}}" >{{$exporter_cat->name}}</option>
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
                <input required="required"  name="job_done" type="text" class="form-control" placeholder="Enter All Over Job Done">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="number_employee" class="control-label">Number Of Employees</label>
                <select required="required"  class="form-control" name="number_employee">
                  <option value="">Select Employees</option>
                  <option value="5-10">5-10</option>
                  <option value="10-20">10-20</option>
                  <option value="20-35">20-35</option>
                  <option value="35-50">35-50</option>
                  <option value="50-75">50-75</option>
                  <option value="75-100">75-100</option>
                  <option value="100+">100+</option>
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Per Day Fee</label>
                <input required="required"  name="per_day_fee" type="text" class="form-control" placeholder="Enter Per Day Fee">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="establisment_year" class="control-label">Establisment year</label>
                <select required="required"  class="form-control" name="establisment_year">
                  <option value="">Select Year</option>
                  <option value="before_1980">Before 1980</option>
                  @php
                  $current_year = date("Y");
                  @endphp
                  @for($i=1980;$i<=$current_year;$i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Logo</label>
                <input name="logo" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gts_number" class="control-label">GST Number</label>
                <input required="required"  name="gts_number" type="text" class="form-control" placeholder="Enter GTS Number">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gst_document" class="control-label">GST Document</label>
                <input name="gst_document" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="export_certificate_no" class="control-label">Export Certificate No</label>
                <input required="required"  name="export_certificate_no" type="text" class="form-control" placeholder="Enter Export Certificate No">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="export_certificate_document" class="control-label">Export Certificate Document</label>
                <input name="export_certificate_document" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="about_company" class="control-label">About Company</label>
                <textarea name="about_company" class="form-control" placeholder="Write something about your company" rows="12"></textarea>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group mb-0">
                <label class="control-label">Skills</label>
                <div class="row">
                  
                    @if(count($exporter_skills) > 0) 
                    @php $indexVal = 1; @endphp
                    @foreach ($exporter_skills as $exporter_skill)
                    <div class="col-sm-4">
                    <div class="custom-control custom-checkbox mb-2">
                      <input name='skills[]' value='{{$exporter_skill->name}}' type="checkbox" class="custom-control-input" id="customCheck{{$indexVal}}">
                      <label class="custom-control-label" for="customCheck{{$indexVal}}">{{$exporter_skill->name}}</label>
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
        <form action="{{url('dashboard/exporters/business-profile/business_submit/'.$id)}}" method="post" class="parsley-examples" id="business_details_form" enctype="multipart/form-data">
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
                <input name="website"  type="text" class="form-control isValidWebsite" placeholder="Enter Website "  value="{{ $business_detail->website }}">
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
                  @if(count($exporter_categories) > 0)
                    @foreach ($exporter_categories as $exporter_cat)
                      <option value="{{$exporter_cat->id}}" @if($exporter_cat->id==$business_detail->category ) selected @endif >{{$exporter_cat->name}}</option>
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
                <input required="required"  name="experience" type="number" class="form-control" placeholder="Enter Experience" value="{{ $business_detail->experience }}" >
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">All Over Job Done</label>
                <input required="required"  name="job_done" type="text" class="form-control" placeholder="Enter All Over Job Done" value="{{ $business_detail->job_done }}">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="number_employee" class="control-label">Number Of Employees</label>
                <select required="required" class="form-control" name="number_employee">
                  <option value="">Select Employees</option>
                  <option value="5-10" @if($business_detail->number_employee=='5-10') selected @endif >5-10</option>
                  <option value="10-20" @if($business_detail->number_employee=='10-20') selected @endif>10-20</option>
                  <option value="20-35" @if($business_detail->number_employee=='20-35') selected @endif>20-35</option>
                  <option value="35-50" @if($business_detail->number_employee=='35-50') selected @endif>35-50</option>
                  <option value="50-75" @if($business_detail->number_employee=='50-75') selected @endif>50-75</option>
                  <option value="75-100" @if($business_detail->number_employee=='75-100') selected @endif>75-100</option>
                  <option value="100+" @if($business_detail->number_employee=='100+') selected @endif>100+</option>
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Per Day Fee</label>
                <input required="required"  name="per_day_fee" type="text" class="form-control" placeholder="Enter Per Day Fee" value="{{$business_detail->per_day_fee}}">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="establisment_year" class="control-label">Establisment year</label>
                <select required="required"  class="form-control" name="establisment_year">
                  <option value="">Select Year</option>
                  <option value="before_1980">Before 1980</option>
                  @php
                  $current_year = date("Y");
                  @endphp
                  @for($i=1980;$i<=$current_year;$i++)
                  <option value="{{$i}}" @if($business_detail->establisment_year==$i) selected @endif >{{$i}}</option>
                  @endfor
                </select>
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label">Logo</label>
                <input name="logo" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gts_number" class="control-label">GST Number</label>
                <input required="required"  name="gts_number" type="text" class="form-control" placeholder="Enter GTS Number" value="{{$business_detail->gts_number}}">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gst_document" class="control-label">GST Document</label>
                <input name="gst_document" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="export_certificate_no" class="control-label">Export Certificate No</label>
                <input required="required"  name="export_certificate_no" type="text" class="form-control" placeholder="Enter Export Certificate No" value="{{$business_detail->export_certificate_no}}">
              </div>
            </div><!-- Col -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="export_certificate_document" class="control-label">Export Certificate Document</label>
                <input name="export_certificate_document" value="" type="file" class="form-control" placeholder="">
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="about_company" class="control-label">About Company</label>
                <textarea name="about_company" class="form-control" placeholder="Write something about your company" rows="12">{{$business_detail->about_company}}</textarea>
              </div>
            </div><!-- Col -->
          </div><!-- Row -->
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group mb-0">
                <label class="control-label">Skills</label>
                <div class="row">
                  
                    @if(count($exporter_skills) > 0) 
                    @php $indexVal = 1; @endphp
                    @foreach ($exporter_skills as $exporter_skill)
                    <div class="col-sm-4">
                    <div class="custom-control custom-checkbox mb-2">
                      <input name='skills[]' value='{{$exporter_skill->name}}' type="checkbox" class="custom-control-input" id="customCheck{{$indexVal}}" @if (strpos($business_detail->skills, $exporter_skill->name) !== false) checked @endif>
                      <label class="custom-control-label" for="customCheck{{$indexVal}}">{{$exporter_skill->name}}</label>
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
<script>
  var root_path = "{{URL::to('dashboard/exporters')}}";
</script>

@endsection