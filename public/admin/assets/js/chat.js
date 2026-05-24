$(function() {
  'use strict';

  // Applying perfect-scrollbar 
  if ($('.chat-aside .tab-content').length) {
    const sidebarBodyScroll = new PerfectScrollbar('.chat-aside .tab-content');
  }
  if ($('.chat-content .chat-body').length) {
    const sidebarBodyScroll = new PerfectScrollbar('.chat-content .chat-body');
  }

  $( '.chat-list .chat-item' ).each(function(index) {
    $(this).on('click', function(){
        $('.chat-content').toggleClass('show');
    });
  });

  $('#backToChatList').on('click', function(index) {
    $('.chat-content').toggleClass('show');
  });
  $('.chatSendNow').on('click', function(e) {
    var message = $('#chatForm').val();
    if(message == '') {
      alert('Please enter message.');
      
    } else {
      var receiver_id = $('#receiver_id').val();
      var sender_id = $('#sender_id').val();
      var contact_id = $('#contact_id').val();

      $.ajax({
        type: "POST",
        url: root_path+'/save_chat', // This is what I have updated
        data: { _token: csrf_token, message: message, receiver_id:receiver_id, sender_id:sender_id, contact_id:contact_id}
      }).done(function( response ) {
          location.reload();
      });
      // code here for send a message
      // alert(message);
    }
  });
  $('#searchFormChat').submit (function(e) {
    e.preventDefault();
    var search_val = $('#searchFormInput').val()
    var enq_id = $('#contact_id').val()
    var id = $('#sender_id').val()
    if(search_val != '') {
      // alert(search_val);
      $.ajax({
        type: "POST",
        url: root_path+'/search_users', // This is what I have updated
        data: { _token: csrf_token, search_val: search_val,enq_id:enq_id,id:id}
      }).done(function( response ) {
        console.log('response : ', response);
        if(response.response_html != '') {
          $('.chatSearchBody').html(response.response_html);
          $('.chatSearchBody').css('display','block');
          $('.chatNavBody').css('display','none');
        } else {
          $('.chatSearchBody').css('display','none');
          $('.chatNavBody').css('display','block');
        }
      });
    } else {
      $('.chatSearchBody').css('display','none');
      $('.chatNavBody').css('display','block');
      // location.reload();
    }
    return false;
  });

  // code for file upload
  $('#imguploadBtn').click(function(){ $('#imgupload').trigger('click'); });

  $('#imgupload').change(function() {
    var ext =$('#imgupload').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
      alert('Invalid file, Please select only image');
    } else {
      var receiver_id = $('#receiver_id').val();
      var sender_id = $('#sender_id').val();
      var contact_id = $('#contact_id').val();
      var fd = new FormData();
      var files = $('#imgupload')[0].files[0];
      fd.append('file', files);
      fd.append('_token', csrf_token);
      fd.append('receiver_id', receiver_id);
      fd.append('sender_id', sender_id);
      fd.append('contact_id', contact_id);

      $.ajax({
          url:  root_path+'/send_file_chat',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
              console.log('response',response);
              location.reload();
          },
      });
    }
  });

  $('.chat-body').animate({
    scrollTop: $('.chat-body').get(0).scrollHeight
  }, 2000);
  
});