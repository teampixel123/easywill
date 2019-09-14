$('.btn_will_edit').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var will_id = $(this).closest('.action-td').find('.will_id').val();
  var will_rem_updations = $(this).closest('.action-td').find('.will_rem_updations').val();
  $('#will_id').val(will_id);
  $('#will_rem_updations').val(will_rem_updations);
  $('#modal_p').text('Only '+will_rem_updations+' time you can edit this will.')
  $('#editModal').modal('show');
});

$('#edit_will_confirm').click(function(){

  $('.edit_will_form').submit();
});

$('.btn_blur_edit').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $(this).closest('.action-td').find('.edit_blur_form').submit();
  // alert();
});

$('.btn_pdf').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  $(this).closest('.action-td').find('.pdf_form').submit();
  window.location.replace(base_url+"User-Dashboard");
});


// Profile....
// Update Profile Info...
$('#btn_profile_update').click(function(){
  var user_fullname = $('#user_fullname').val();
  var user_mobile_number = $('#user_mobile_number').val();
  var user_email_id = $('#user_email_id').val();
  var mobile_format = /^[7-9][0-9]{9}$/;
  var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

  $('#user_fullname, #user_mobile_number, #user_email_id').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(user_fullname == '' || user_mobile_number == '' || user_email_id == '' || !mobile_format.test(user_mobile_number) || !email_format.test(user_email_id)){

  }
  else{
    $('#form_update_profile').submit();
  }
});

$('#btn_update_password').click(function(){
  var old_password = $('#old_password').val();
  var new_password = $('#new_password').val();
  var confirm_password = $('#confirm_password').val();

  $('#old_password, #new_password, #confirm_password').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(old_password == '' || new_password == '' || confirm_password == ''){

  }
  else if(new_password != confirm_password){
    $('.confirm_pwd_error').show().delay(3000).fadeOut();
  }
  else{
    $('#form_update_password').submit();
  }
});


// Active Menu...
$(document).ready(function() {
    var url = window.location.href;
    var activePage = url;
    $('.sidebar-link').removeClass('active');
    // alert(activePage);
    $('.sidebar a').each(function () {
        var linkPage = this.href;
        if (activePage == linkPage) {
            $(this).closest(".sidebar-link").addClass("active");
        }
    });
});
