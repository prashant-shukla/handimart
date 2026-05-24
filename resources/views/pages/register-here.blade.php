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
                        <a href="#" class="active_box">
                           <p>1</p>
                           Personal Information
                        </a>
                     </li>
                     <li>
                        <a href="#">
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
                     <h2 class="text-center">Basic Information</h2>
                  </div>
                  <div class="step_pra">
                     <p class="text-center">Personal details used by website to recognize you like craftsman later.</p>
                  </div>
                  <hr>
                  <div class="mandatory_div">
                     <p><span>*</span> Marked feilds are mandatory!</p>
                  </div>
                  <div class="first_step_foem">
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputEmail4">First Name<b>*</b></label>
                           <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your first name">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">Last Name<b>*</b></label>
                           <input type="text" class="form-control" id="inputPassword4" placeholder="Enter your last name">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-12 address_box">
                           <label for="inputEmail4">Address 1<b>*</b></label>
                           <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your address 1">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputEmail4">Address 2<b>*</b></label>
                           <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your address 2">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">Landmark<b>*</b></label>
                           <input type="text" class="form-control" id="inputPassword4" placeholder="Enter nearest landmark">
                        </div>
                     </div>
                     <div class="form-row">
                         <div class="form-group col-md-6">
                           <label for="inputPassword4">City<b>*</b></label>
                           <select>
                              <option>Select your City</option>
                              <option>jodhpur</option>
                              <option>jodhpur</option>
                              <option>jodhpur</option>
                           </select>
                           <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">State<b>*</b></label>
                           <select>
                              <option>Select your state</option>
                              <option>jodhpur</option>
                              <option>jodhpur</option>
                              <option>jodhpur</option>
                           </select>
                           <div class="arrow_img"><img src="images/arrow.png" alt=""></div>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputEmail4">Area Pin Code<b>*</b></label>
                           <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your area pin code">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputPassword4">Mobile Number<b>*</b></label>
                           <input type="text" class="form-control" id="inputPassword4" placeholder="+91-12345 67890">
                        </div>
                     </div>
                     <div class="bottom_line">
                        <hr>
                     </div>
                     <div class="account_info">
                        <h2>Account Information</h2>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your Email">
                           </div>
                           <div class="form-group email_acc col-md-6">
                              <p><a href="#">Don’t have Email Account?</a></p>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">User Name<b>*</b></label>
                              <input type="text" class="form-control" id="inputEmail4" placeholder="Ex. username, phone number">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Password<b>*</b></label>
                              <input type="pasword" class="form-control" id="inputEmail4" placeholder="Enter your password">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputPassword4">Repeat Password<b>*</b></label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Re enter your password">
                           </div>
                        </div>
                        <div class="mandatory_div">
                           <p><span>*</span> Marked feilds are mandatory!</p>
                        </div>
                        <div class="bottom_line2">
                           <hr>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 col-6">
                              <button class="pre_btn">Previous</button>
                           </div>
                           <div class="col-md-6  col-6 text-right">
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