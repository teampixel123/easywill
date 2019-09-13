
$(function () {
    // var count = 0;
    // $('.owl-carousel').each(function () {
        // $(this).attr('id', 'owl-demo' + count);
        $('#owl-demo').owlCarousel({
            navigation: true,
            slideSpeed: 300,
            pagination: true,
            singleItem: true,
            autoPlay: 5000,
            // loop:true,
            autoHeight: true
        });
        // count++;
    // });
});



// Registration...
$('#btn_register').click(function(){
    var reg_name = $('#reg_name').val();
    var reg_mob_email = $('#reg_mob_email').val();
    var reg_name_format =  /^[a-zA-Z ]*$/;
		var reg_mobile_format = /^[6-9][0-9]{9}$/;
		var reg_email_format = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // alert(reg_mob_email);
    $('#reg_name, #reg_mob_email').each(function(){
       var val = $(this).val();
       if(val == '' || val == '0'){
         $(this).addClass('required-input');
         $(this).attr("placeholder", "This field is required");
       }
       else{
         $(this).removeClass('required-input');
       }
     });

     if(reg_mob_email == ''){
 			$('#reg_error_invalide').show();
 		}
     else if(reg_mobile_format.test(reg_mob_email)) {
       var validate = 'mobile_number';
       $('.invalide').hide();
       $('#contact_type').val(validate);
     }
     else if(reg_email_format.test(reg_mob_email)){
       var validate = 'email';
       $('.invalide').hide();
       $('#contact_type').val(validate);
     }

     else {
         $('.invalide').show();
     }

    if (!reg_name_format.test(reg_name) || reg_name == '' || validate == '') {
    }
    else {
      var data=$('#register_form').serialize();
      $.ajax({
        data: data,
        type: "post",
        url: base_url+"Login_Controller/send_security_code",
        success: function(data){
          var info = JSON.parse(data);

          if(info == 'Mobile_Exist'){
          $('#error_mobile_exist').show();
          }
          else {
            $('#otp_div').show();
            $('#btn_register').hide();
            $('#error_mobile_exist').hide();
          }

        }
      });
    }
  });

  $('#btn_submit').click(function(){
    var security_code = $('#security_code').val();
    var user_password = $('#user_password').val();
    var contact_type = $('#contact_type').val();

    $('#security_code, #user_password').each(function(){
       var val = $(this).val();
       if(val == '' || val == '0'){
         $(this).addClass('required-input');
         $(this).attr("placeholder", "This field is required");
       }
       else{
         $(this).removeClass('required-input');
       }
     });

    if(security_code == '' || user_password == '' ){

    }
    else{
      $.ajax({
        data: {
        'user_password': user_password,
        'security_code': security_code,
        'contact_type': contact_type },
        type: "post",
        url: base_url+"Login_Controller/user_register",
        success: function(data){
          var responce = JSON.parse(data);
          if (responce['responce'] == 'Valide') {
            // window.location.href = "<?php echo base_url() ?>User_controller/user_dashboard";
              window.location.href = base_url+"Login";
          }
          else{
            $('#error_invalide_otp').show();
          }
        }
      });
    }
   });

   $('#btn_login').click(function(){
      submit_login();
	 });
   $('#user_password').keypress(function(e) {
      var code = e.keyCode || e.which;
      if(code==13){
          submit_login();
      }
    });

   function submit_login(){
     var mob_email = $('#mob_email').val();
     var user_password = $('#user_password').val();
   // var mob_email = $('#mob_email').val();
     var mobile_format = /^[6-9][0-9]{9}$/;
     var email_format = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     // alert();
     $('#mob_email, #user_password').each(function(){
        var val = $(this).val();
        if(val == '' || val == '0'){
          $(this).addClass('required-input');
          $(this).attr("placeholder", "This field is required");
        }
        else{
          $(this).removeClass('required-input');
        }
      });

      if(mobile_format.test(mob_email)){
        var validate = 'mobile_number';
      }
      else if (email_format.test(mob_email)) {
        var validate = 'email';
      }
      else{
        $('#mob_email').addClass('required-input');
      }
      if(mob_email == '' || user_password == ''){
        // blank...
      }
      else{
        $.ajax({
          data:{
            'mob_email' : mob_email,
            'user_password' : user_password,
           },
          type: 'post',
          url: base_url+"Login_Controller/login_user",
          success: function(data){
            var responce = JSON.parse(data);
            if(responce['responce'] == 'Success'){
              window.location.href = base_url+"User-Dashboard";
            }
            else if (responce['responce'] == 'Invalide_Password') {
              $('#error_invalide_login').show();
            }
          }
        });
      }
  }
