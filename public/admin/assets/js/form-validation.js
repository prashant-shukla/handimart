$(function() {
  'use strict';

  $.validator.setDefaults({
    submitHandler: function() {
      $(".formsubmit").attr("disabled", true);
      form.submit();
    }
  });
  $.validator.addMethod("isValidWebsite", function(value, element) {
    return isValidWebsite(value);
  }, 'Please add a valid website.');
  $.validator.addMethod("isValidPhone", function(value, element) {
    return isValidPhone(value);
  }, 'Please add a valid phone number.');
  $.validator.addMethod("isValidUsername", function(value, element) {
    return isValidUsername(value);
  }, 'Please add a valid username.');

  $(function() {
    $('input').attr('autocomplete','off');
    $('#password').val('');
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        password: {
          required: true,
          minlength: 5
        },
        confirm_password: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
        email: {
          required : true,
          email: true
        },
        roles: {
          required: true,
        },
        phone: {
          // matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
          required: true,
          // minlength: 10,
          // maxlength: 13,

        },
        otp :{
          required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        username: {
          required: "Please enter a username",
          minlength: "Please add a valid username.",
          maxlength: "Please add a valid username.",
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
          // minlength: "please enter valid phone number",
          // maxlength: "please enter valid phone number"
        },
        otp: {
          required: "Please provide a otp",
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    $("#editProfileForm").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        // password: {
        //   required: true,
        //   minlength: 5
        // },
        // confirm_password: {
        //   required: true,
        //   minlength: 5,
        //   equalTo: "#password"
        // },
        email: {
          email: true
        },
        roles: {
          required: true,
        },
        phone: {
          // matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
          required: true,
          // minlength: 10,
          // maxlength: 13,

        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        username: {
          required: "Please enter a username",
          minlength: "Please add a valid username.",
          maxlength: "Please add a valid username.",
        },
        // password: {
        //   required: "Please provide a password",
        //   minlength: "Your password must be at least 5 characters long"
        // },
        // confirm_password: {
        //   required: "Please provide a password",
        //   minlength: "Your password must be at least 5 characters long",
        //   equalTo: "Please enter the same password as above"
        // },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
          // minlength: "please enter valid phone number",
          // maxlength: "please enter valid phone number"
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    $("#craftman_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#painter_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#manufacturer_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#designer_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#exporter_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#photographer_personal_details_form").validate({
      rules: {
        first_name: {
          required: true,
          minlength: 3
        },
        last_name: {
          required: true,
          minlength: 3
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        gender: {
          required: true,
        },
        dob: {
          required: true,
        },
        aadhar1: {
          required: true,
        },
        aadhar2: {
          required: true,
        },
        aadhar3: {
          required: true,
        },
        country: {
          required: true,
        },
        state: {
          required: true,
        },
        city: {
          required: true,
        },
        address: {
          required: true,
        },
        zip_code: {
          required: true,
        },
        
        email: {
          email: true
        },
        
        phone: {
          required: true,
        },
        otp :{
          // required: true,
          minlength: 6,
          maxlength: 6,
        },
        
      },
      messages: {
        first_name: {
          required: "Please enter a first name",
          minlength: "Name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please enter a last name",
          minlength: "Name must consist of at least 3 characters"
        },
        gender: {
          required: "Please enter gender",
        },
        dob: {
          required: "Please enter date of birth",
        },
        aadhar1: {
          required: "Please enter aadhar",
        },
        aadhar2: {
          required: "Please enter aadhar",
        },
        aadhar3: {
          required: "Please enter aadhar",
        },
        country: {
          required: "Please enter county",
        },
        state: {
          required: "Please enter state",
        },
        city: {
          required: "Please enter city",
        },
        address: {
          required: "Please enter address",
        },
        zip_code: {
          required: "Please enter a zip Code",
        },
        email: "Please enter a valid email address",
        phone: {
          required: "Please provide a phone",
        },
        otp: {
          // required: "Please provide a otp",  
          minlength: "please enter valid otp number",
          maxlength: "please enter valid otp number"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    $("#business_details_form").validate({
      rules: {
        phone: {
          required: true,
        },
        email: {
          email: true
        },
        terms_conditions: {
          required: true,
        },
        category: {
          required: true,
        },
        experience: {
          required: true,
        },
        job_done: {
          required: true,
        },
        // team_size: {
        //   required: true,
        // },
        per_day_fee: {
          required: true,
        },
      },
      messages: {
        phone: {
          required: true,
        },
        email: {
          email: "Please enter a valid email address",
        },
        category: {
          required: "Please select category",
        },
        experience: {
          required: "Please enter experience",
        },
        job_done: {
          required: "Please enter Done Job",
        },
        // team_size: {
        //   required: "Please enter Team Size",
        // },
        per_day_fee: {
          required: "Please enter Fee",
        },
        terms_conditions: {
          required: "Please select Terms & Conditions",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        if (element.attr("type") == "checkbox") {
          label.insertAfter($(element).parents('label.form-check-label'));
        } else {
          label.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    
  });
  var isValidWebsite = function(value) {
    
    var url_validate = /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
    
    if(value != ''){

      if(!url_validate.test(value)){
        return false;
      }
      else{
        return true;
      }
    } else {
      return true;
    }
  }
  var isValidPhone = function(value) {
    // var phone_validate = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
    var phone_validate = /^[0-9]{10}$/;
    if(!phone_validate.test(value)){
      return false;
    }
    else{
      return true;
    }
  }
  var isValidUsername = function(value) {
    var username_validate = /^[a-zA-Z0-9]*$/;
    if(!username_validate.test(value)){
      return false;
    }
    else{
      return true;
    }
  }
  $('.button_set_new_password').on('click', function (){
    var password_html = '<div class="col-md-6"><div class="form-group"><label for="password">Password</label><input id="password" class="form-control" name="password" type="password" placeholder="Password" autocomplete="new-password"></div></div><div class="col-md-6"><div class="form-group"><label for="confirm_password">Confirm password</label><input id="confirm_password" class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" autocomplete="false"></div></div>';
    $('.password_section').html(password_html);
    
    $('.password_section').css('display','flex');
  });
  $('.button_send_link').on('click', function (){
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Reset Password link sent.',
      showConfirmButton: false,
      timer: 1500
    });
  });

  // delete user feature
  $('.deleteuser').on('click', function (){
    var dataId = $(this).attr('data-id');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        
        window.location.href = root_path+"/destroy/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'User data is safe :)',
          'error'
        )
      }
    })
  });

  // delete city feature
  $('.deleteCity').on('click', function (){
    var dataId = $(this).attr('data-id');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        
        window.location.href = root_path+"/delete_city/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'City data is safe :)',
          'error'
        )
      }
    })
  });

  // delete state feature
  $('.deleteState').on('click', function (){
    var dataId = $(this).attr('data-id');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        
        window.location.href = root_path+"/delete_state/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'State data is safe :)',
          'error'
        )
      }
    })
  });
  // delete Enquiry feature
  $('.deleteEnquiry').on('click', function (){
    var dataId = $(this).attr('data-id');
    var dataEnquiryId = $(this).attr('data-enquiry_id');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        
        window.location.href = root_path+"/delete_enquiry/"+dataEnquiryId+"/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Enquiry data is safe :)',
          'error'
        )
      }
    })
  });


  $('.updateDescription').on('click', function (){
    var dataId = $(this).attr('data-id');
    var dataImageId = $(this).attr('data-image_id');
    // get here review details
    $.ajax({
      type: "POST",
      url: root_path+'/business-profile/get_image_details', // This is what I have updated
      data: { image_id: dataImageId ,_token: csrf_token}
    }).done(function( response ) {
        if(response.status == 'success') {
          $('#image_id').val(response.data.id);
          $('#image_description').val(response.data.description);
          
          $('#editImageDescriptionModal').modal('toggle');
        }
    });
  });

  $('#updateImageDescriptionNow').on('click', function (){
    var image_id = $('#image_id').val();
    var image_description = $('#image_description').val();
    // update here review details
    $.ajax({
      type: "POST",
      url: root_path+'/business-profile/image_update', // This is what I have updated
      data: { image_id: image_id, image_description:image_description,  _token: csrf_token}
    }).done(function( response ) {
        if(response.status == 'success') {
          
          $('#editReviewModal').modal('hide');
          location.reload();
        }
    });
  });

  
  
  $('.updateReview').on('click', function (){
    var dataId = $(this).attr('data-id');
    var dataReviewId = $(this).attr('data-review_id');
    // get here review details
    $.ajax({
      type: "POST",
      url: root_path+'/get_review_details', // This is what I have updated
      data: { review_id: dataReviewId ,_token: csrf_token}
    }).done(function( response ) {
        if(response.status == 'success') {
          $('#review_id').val(response.data.id);
          $('#review_description').val(response.data.description);
          $('#review_title').val(response.data.title);
          
          $('#review_ratings').val(response.data.ratings);
          $('#editReviewModal').modal('toggle');
        }
    });
  });

  // edit review 

  $('#updateReviewNow').on('click', function (){
    var review_id = $('#review_id').val();
    var review_title = $('#review_title').val();
    var review_description = $('#review_description').val();
    var review_ratings = $('#review_ratings').val();
    // update here review details
    $.ajax({
      type: "POST",
      url: root_path+'/update_review_details', // This is what I have updated
      data: { review_id: review_id, review_title:review_title, review_description:review_description, review_ratings:review_ratings, _token: csrf_token}
    }).done(function( response ) {
        if(response.status == 'success') {
          console.log(response);
          $('#descriptionSection_'+review_id).html(response.data.description);
          $('#titleSection_'+review_id).html(response.data.title);
          $('#ratingSection_'+review_id).html(response.rating_html);
          // location.reload();
          $('#editReviewModal').modal('hide');
        }
    });
  });
  


  $('.ReplyReview').on('click', function (){
    var dataId = $(this).attr('data-id');
    var dataReviewId = $(this).attr('data-review_id');
    $('#review_id_for_reply').val(dataReviewId);
    $('#id_for_reply').val(dataId);
    $('#replyModal').modal('toggle');   
  });

  $('#sendReplyNow').on('click', function (){
    var review_id = $('#review_id_for_reply').val();
    var review_reply = $('#review_reply').val();
    var id_for_reply = $('#id_for_reply').val();
    // update here review details
    $.ajax({
      type: "POST",
      url: root_path+'/review_reply', // This is what I Reply
      data: { review_id: review_id, review_reply:review_reply, id_for_reply:id_for_reply, _token: csrf_token}
    }).done(function( response ) {
        if(response.status == 'success') {
          $('#review_reply').val('');
          var $myDiv = $('#collapseExample'+review_id);

          if ( $myDiv.length){ 
            $('#collapseExample'+review_id).collapse('show');
            $('#collapseExample'+review_id).append(response.reply_html);
          } else {
            location.reload();

          }
          $('#replyModal').modal('hide');
        }
    });
  });

  // delete review feature
  $('.deleteReview').on('click', function (){
    var dataId = $(this).attr('data-id');
    var dataReviewId = $(this).attr('data-review_id');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.get(root_path+"/delete_review/"+dataReviewId+"/"+dataId, function(response){
          $('#reviewOuterDiv_'+dataReviewId).remove();
        });


        // window.location.href = root_path+"/delete_review/"+dataReviewId+"/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Review data is safe :)',
          'error'
        )
      }
    })
  });


  // $('.country_dropdown').change(function() {    
  $(document.body).on('change',".country_dropdown",function (e) {
    var country_id= $(".country_dropdown option:selected").val();

    $.ajax({
      type: "POST",
      url: root_path+'/get_states', // This is what I have updated
      data: { id: country_id ,_token: csrf_token}
    }).done(function( response ) {
        if(response.state_html != '') {
          $("#state_dropdown").empty().append(response.state_html);
          $("#city_dropdown").empty().append('<option>Select City</option>');
        }
    });
  });

  $(document.body).on('change',".state_dropdown",function (e) {
    var state_id= $(".state_dropdown option:selected").val();
    $.ajax({
      type: "POST",
      url: root_path+'/get_cities', // This is what I have updated
      data: { id: state_id ,_token: csrf_token}
    }).done(function( response ) {
        if(response.city_html != '') {
          $("#city_dropdown").empty().append(response.city_html);
        }
    });
  });


  // delete job feature
  $('.deleteJob').on('click', function (){
    var dataId = $(this).attr('data-id');
    var user_id = $(this).attr('data-userid');
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
      },
      buttonsStyling: false,
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonClass: 'mr-2',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        
        window.location.href = root_path+"/destroy/"+user_id+"/"+dataId;
        // swalWithBootstrapButtons.fire(
        //   'Deleted!',
        //   'User has been deleted.',
        //   'success'
        // )
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Job data is safe :)',
          'error'
        )
      }
    })
  });

  $("#countryDropReg").on("change", function (e) {
    let country_id = $(this).val();
    window.location.href = root_path + '/regions?country='+country_id;
  });
  $("#stateDropReg").on("change", function (e) {
    let country_id = $('#countryDropReg option:selected').val();
    let state_id = $(this).val();
    window.location.href = root_path + '/regions?country='+country_id+'&state='+state_id;
  });

  
});