<?php 
   include('head.php');
   ?>
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
                        <a href="#">
                           <p>2</p>
                           Business Info
                        </a>
                     </li>
                     <li>
                        <a href="#" class="active_box">
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
                     <h2 class="text-center">Confirmation</h2>
                  </div>
                  <div class="step_pra confirm_pra">
                     <p class="text-center">After clicking finish you will receive notification email with confirmation link,
                        please click on it to activate your profile.
                     </p>
                  </div>
                  <div class="first_step_foem">
                     <div class="business_info_box"></div>
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
<?php include 'footer.php';?>