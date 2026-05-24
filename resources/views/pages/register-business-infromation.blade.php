@extends('layouts.front')

@section('content')


<div class="main_banner inner_main_banner register_inner_banner">
   <h1 class="text-center">Register Here</h1>
   <p class="text-center">Become valuable member of Craftsman directory</p>
</div>
<section class="registerhere_section pt-0">
   <div class="container">
      <div class="row">
         <div class="col-sm-1"></div>
         <div class="col-sm-10">
            <form>
               <div class="steps_div">
                  <ul class="mb-0">
                     <li>
                        <a href="#">
                           <p>1</p>
                           Personal Information
                        </a>
                     </li>
                     <li>
                        <a href="#" class="active_box">
                           <p>2</p>
                           Business Info
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <p>3</p>
                           Confirmation
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- Mobile Steps  Start-->
               <div class="mobile_step_div">
                  <ul>
                     <li>
                        <a href="#">
                        <p class="mb-0">1</p>
                           <b>Personal<br> Information</b>
                        </a>
                     </li>
                     <li>
                        <div class="step_line"></div>
                     </li>
                     <li>
                        <a href="#" class="active">
                        <p class="mb-0">2</p>
                        <b>Business <br> Info</b>
                        </a>
                     </li>
                     <li>
                        <div class="step_line"></div>
                     </li>
                     <li>
                        <a href="#">
                        <p class="mb-0">3</p>
                        <b>Confirmation <br> &nbsp;</b>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- Mobile Steps End -->
               <div class="step_inner_content">
                  <div class="step_heading">
                     <h2 class="text-center">Business Infromation</h2>
                  </div>
                  <div class="step_pra busi_pra">
                     <p class="text-center">Business details are details connected to your business, some of those details you can change later in
                        your profile, like images, video, categories and so on.
                     </p>
                  </div>
                  <hr>
                  <div class="first_step_foem">
                     <div class="business_box">
                        <ul class="nav nav-tabs business_options" id="myTab">
                            <!-- <div class="ver_line"></div> -->
                           <li class="nav-item opion_one">
                              <a class="nav-link activeb text-center" data-toggle="tab" href="#tabOne">
                                 <h5 class="mb-0">Mandatory Fields</h5>
                                 <p class="mb-0">Those fields must be filled now</p>
                                 <div class="active_line"></div>
                              </a>
                              
                           </li>
                           <li class="ver_line"></li>
                           <li class="nav-item opion_one">
                              <a class="nav-link active text-center" data-toggle="tab" href="#tabTwo">
                                 <h5 class="mb-0">Optional Fields</h5>
                                 <p class="mb-0">Those fields can be filled later</p>
                                 <div class="active_line"></div>
                              </a>
                              
                           </li>
                        </ul>
                        <div class="tab-content pt-3" id="myTabContent">
                           <div class="tab-pane fade active show" id="tabOne">
                              <div class="mandatory_div">
                                 <p><span>*</span> Marked feilds are mandatory!</p>
                              </div>
                              <div class="mandatory_form">
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="inputEmail4">Company Name</label>
                                       <input type="text" class="form-control" id="inputEmail4" placeholder="Company Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputPassword4">Work In (Wooden, Iron, Stone, Others)<b>*</b></label>
                                       <select>
                                          <option>Wooden</option>
                                          <option>Iron</option>
                                          <option>Stone</option>
                                          <option>Others</option>
                                          <option>Wooden</option>
                                       </select>
                                       <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4 experience_feild">
                                       <label for="inputPassword4">Experience<b>*</b></label>
                                       <select>
                                          <option>Working Since</option>
                                          <option>Working Since</option>
                                          <option>Working Since</option>
                                          <option>Working Since</option>
                                          <option>Working Since</option>
                                       </select>
                                       <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                                    </div>
                                    <div class="form-group col-md-4 day_feild">
                                       <label for="inputEmail4">Per Day Fee<b>*</b></label>
                                       <input type="text" class="form-control" id="inputEmail4" placeholder="Enter per day fee">
                                    </div>
                                    <div class="form-group col-md-4 team_field">
                                       <label for="inputPassword4">Team<b>*</b></label>
                                       <select>
                                          <option>Enter your address 1</option>
                                          <option>Enter your address 2</option>
                                          <option>Enter your address 3</option>
                                          <option>Enter your address 4</option>
                                          <option>Enter your address 5</option>
                                       </select>
                                       <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-4 experience_feild">
                                       <label for="inputPassword4">Overall Jobs Done<b>*</b></label>
                                       <select>
                                          <option>Enter overall jobs done</option>
                                          <option>Enter overall jobs done</option>
                                       </select>
                                       <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                                    </div>
                                 </div>
                                 <div class="select_design_box">
                                    <h3>What Do You Design<b>*</b></h3>
                                    <div class="desing_list row">
                                       <div class="col-md-4">
                                          <ul class="mb-0">
                                             <li><input id="checkbox1" name="checkbox" type="checkbox"> <label for="checkbox1">Select All</label></li>
                                             <li><input id="checkbox2" name="checkbox" type="checkbox"> <label for="checkbox2">Wooden Bed</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Wooden Almirah</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Dining Table</label></li>
                                          </ul>
                                       </div>
                                       <div class="col-md-4">
                                          <ul class="mb-0">
                                             <li><input id="checkbox1" name="checkbox" type="checkbox"> <label for="checkbox1">Wooden Chair</label></li>
                                             <li><input id="checkbox2" name="checkbox" type="checkbox"> <label for="checkbox2">Dressing Table</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Wooden Sofa Set</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Antique Items</label></li>
                                          </ul>
                                       </div>
                                       <div class="col-md-4">
                                          <ul class="mb-0">
                                             <li><input id="checkbox1" name="checkbox" type="checkbox"> <label for="checkbox1">Gift Item</label></li>
                                             <li><input id="checkbox2" name="checkbox" type="checkbox"> <label for="checkbox2">Antique Items</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Wooden Sofa Set</label></li>
                                             <li><input id="checkbox3" name="checkbox" type="checkbox"> <label for="checkbox3">Antique Items</label></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                           <div class="tab-pane fade" id="tabTwo">
                              <div class="mandatory_div">
                                 <p><span>*</span> Marked feilds are mandatory!</p>
                              </div>
                              <div class="mandatory_form">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="profile_box">
                                          <h5>Profile Image</h5>
                                          <div class="file-upload">
                                            <div class="image-upload-wrap">
                                              <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                              <div class="drag-text">
                                                <img src="images/img-upload.png" alt="">
                                                <h3 class="mb-0">Click to upload</h3>
                                              </div>
                                            </div>
                                            <div class="file-upload-content">
                                              <img class="file-upload-image" src="#" alt="your image" />
                                            </div>
                                          </div>
                                          <p>This image will appear on search page so it is very important. We highly recommend your real image, image of your team or business logo</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="profile_box">
                                          <h5>Your Work Images</h5>
                                          <div class="file-upload">
                                            <div class="image-upload-wrap">
                                              <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                              <div class="drag-text">
                                                <img src="images/img-upload.png" alt="">
                                                <h3 class="mb-0">Drop images or click to upload</h3>
                                              </div>
                                            </div>
                                            <div class="file-upload-content">
                                              <img class="file-upload-image" src="#" alt="your image" />
                                            </div>
                                          </div>
                                          <p>Images of your finished work, your team, or simple promo images which will be visible on your profile page. Images that are too big are colored in red.</p>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 
                                 
                                 
                                
                              </div>
                           </div>
                        </div>
                         <hr>
                                 
                        <div class="accept_box">
                                    <input id="checkbox1" name="checkbox" type="checkbox"> 
                                    <label for="checkbox1" class="mb-0 ">I Accept declare that the details furnished above </label>
                                 </div>
                                 <div class="last_pra_box">
                                    <p>
                                       Declaration: I hereby declare that the details furnished above are true and correct to the best of my knowledge/belief and I undertake to inform you of any changes therein, immediately. In case any of the above information is found to be false or untrue or misleading or misrepresenting, I am aware that I may be held liable for it. </p>

                                    <p> 
                                       I hereby authorize sharing of the information furnished on this form with the Handimarts Compnay. 
                                    </p>
                                 </div>
                     </div>
                     <div class="account_info">
                        <div class="bottom_line2">
                           <hr>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 col-6">
                              <button class="pre_btn">Previous</button>
                           </div>
                           <div class="col-md-6 col-6 text-right">
                              <button class="next_btn">Next</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-sm-1"></div>
      </div>
   </div>
</section>
@endsection