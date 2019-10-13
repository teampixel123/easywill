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


$('#btn_owner_login').click(function(){
  alert();
  // var owner_username = $('#owner_username').val();
  // var owner_password = $('#owner_password').val();
  //
  // $('.required').each(function(){
  //    var val = $(this).val();
  //    if(val == '' || val == '0'){
  //      $(this).addClass('required-input');
  //      $(this).attr("placeholder", "This field is required");
  //    }
  //    else{
  //      $(this).removeClass('required-input');
  //    }
  //  });
  //
  //  if(owner_username == '' || owner_password == ''){
  //
  //  }
  //  else{
  //    $('#owner_loginform').submit();
  //  }
});
