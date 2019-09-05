// document.onreadystatechange = function () {
// var state = document.readyState
// if (state == 'interactive') {
//      document.getElementById('contents').style.visibility="hidden";
// } else if (state == 'complete') {
//     setTimeout(function(){
//        document.getElementById('interactive');
//        document.getElementById('load').style.visibility="hidden";
//        document.getElementById('contents').style.visibility="visible";
//     },300);
// }
// }
$(document).ready(function(){
    $("input").attr("autocomplete", "off");
    $('input').on("cut copy paste",function(e) {
      e.preventDefault();
   });
});
$('#marital_status').change(function(){
  var marital_status = $(this).val();
  if(marital_status != 'Unmarried'){
    $('.have_child_div').show();
    $('#child_no').prop("checked", true);
  }
  else{
    $('.have_child_div').hide();
    $('#child_no').prop("checked", true);
  }
});

$('.gender-radio').change(function(){
  var gender = $(this).val();
  if(gender == 'female'){
    $("#Widove").prop('disabled', false);
  }
  else{
    $("#Widove").prop('disabled', true);
  }
});


// Personal Info Page...
// birthdate change...
$('#birthdate').datepicker({ format: 'dd-mm-yyyy' }).on('changeDate', function(ev){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd;
  }
  if (mm < 10) {
    mm = '0' + mm;
  }
  var today2 = dd + '/' + mm + '/' + yyyy;
  // Get Today date end...
  var birthdate2 = $(this).val();
  var today = moment(today2,'DD/MM/YYYY');
  var birthdate = moment(birthdate2,'DD/MM/YYYY');

  var years = today.diff(birthdate, 'year');
  birthdate.add(years, 'years');
  if(years < 18 || years > 120){
    $(this).val('');
    $(this).attr("placeholder", "Invalid Date");
    $(this).addClass('invalide-input');
  }
  // alert(years);

  $('.datepicker').hide();
    // $(this).removeClass('required-input');
    // $(this).removeClass('invalide-input');
});


// Save start info... Datta...
$('#start_save_btn').click(function(){
  var full_name = $('#full_name').val();
  var marital_status = $('#marital_status').val();
  var is_have_child = $('#is_have_child').val();
  var mobile_no = $('#mobile_no').val();
  var email = $('#email').val();
  var text =  /^[a-zA-Z ]*$/;
  var mobile_format = /^[7-9][0-9]{9}$/;
  var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;

  $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
   });
   if(full_name == '' || marital_status == '0' || !text.test(full_name) || is_have_child == '-1' || !mobile_format.test(mobile_no) || mobile_no == '' ||
 !email_format.test(email) || email == ''){
   // Blank...
   }
   else{
     $("#save_load_modal").modal("show");
     $('#start_will_form').submit();
   }
});

// Add Personal Info... Update table... Datta...
$('#personal_save_btn').click(function(){
  var address = $('#address').val();
  var city = $('#city').val();
  var pincode = $('#pincode').val();
  var state = $('#state').val();
  var country = $('#country').val();
  var birthdate = $('#birthdate').val();
  var occupation = $('#occupation').val();
  var aadhar_no = $('#aadhar_no').val();
  var pan_no = $('#pan_no').val();
  var nationality = $('#nationality').val();
  var religion = $('#religion').val();

  var pin_code_format = /^[0-9]{6}$/;
  var aadhar_no_format = /^[0-9]{12}$/;
  var text =  /^[a-zA-Z ]*$/;
  // alert();
  $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(address == '' || city == '' || pincode == '' || state == '' || country == '' || birthdate == ''
  || occupation == '' || aadhar_no == '' || nationality == '' || religion == '' || !pin_code_format.test(pincode)
  || !aadhar_no_format.test(aadhar_no) || !text.test(city) || !text.test(state) || !text.test(country)
   || !text.test(nationality) || !text.test(religion) ){
  // Blank...
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_personal_info').submit();
  }
});

// Relationship Change..
$('#relationship').change(function(){
  $('#family_person_dob').val('');
  $('#family_person_name').val('');
  $('#guardian_name').val('');
  $('#major_age').val('');
  $('#guardian_div').hide();
  $(this).removeClass('required-input');
  $(this).removeClass('invalide-input');
});
// Date change...
$('#family_person_dob').datepicker({ format: 'dd-mm-yyyy' }).on('changeDate', function(ev){
  var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd;
    }
    if (mm < 10) {
      mm = '0' + mm;
    }
    var today2 = dd + '/' + mm + '/' + yyyy;
    // Get Today date end...
    var birthdate2 = $(this).val();
    var today = moment(today2,'DD/MM/YYYY');
    var birthdate = moment(birthdate2,'DD/MM/YYYY');

    var years = today.diff(birthdate, 'year');
    birthdate.add(years, 'years');
    // var months = today.diff(birthdate, 'months');
    // birthdate.add(months, 'months');
    // if(months == 0){ var months = 1;}
    // alert(years);
    $('#family_person_age').val(years);
    var relationship = $('#relationship').val();
    if(relationship == 'Spouse' && years < 18){
      $('#invalide_dob').show();
      $('#family_person_age').val('');
    }
    else{
      $('#invalide_dob').hide();
    }

    if((relationship == 'Son' || relationship == 'Daughter') && years < 18){
       $('#guardian_div').show();
    }
    else{
       $('#guardian_div').hide();
    }

    if(years > 18){
      $('#guardian_name').val('');
      $('#major_age').val('');
    }
        // if(years < 18){
    //   $('#guardian_div').show();
    // }

    $('.datepicker').hide();
    $(this).removeClass('required-input');
    $(this).removeClass('invalide-input');
});

$('#family_save_btn').click(function(){
  $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  var relationship = $('#relationship').val();
  var family_person_name = $('#family_person_name').val();
  var family_person_dob = $('#family_person_dob').val();
  var guardian_name = $('#guardian_name').val();
  var major_age = $('#major_age').val();
  var family_person_age = $('#family_person_age').val();

  if(relationship == '0' || family_person_name == '' || family_person_dob == '' || family_person_age == '' || (major_age == '' && family_person_age < 18) || (guardian_name == '' && family_person_age < 18)){
    // Blank..
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_family_info').submit();
  }
});

// Get info for Edit family Member... Datta...
$(".edit_family_member").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#family_save_btn').hide();
  $('#family_update_btn').show();
  var relationship = $(this).closest('.edit-btn-div').closest('.info-div').find('.relationship').text();
  var family_person_name = $(this).closest('.edit-btn-div').closest('.info-div').find('.family_person_name').text();
  var family_person_dob = $(this).closest('.edit-btn-div').closest('.info-div').find('.family_person_dob').text();
  var family_person_age = $(this).closest('.edit-btn-div').closest('.info-div').find('#family_person_age2').val();
  var guardian_name_title = $(this).closest('.edit-btn-div').closest('.info-div').find('.guardian_name_title').text();
  var guardian_name = $(this).closest('.edit-btn-div').closest('.info-div').find('.guardian_name').text();
  var major_age = $(this).closest('.edit-btn-div').closest('.info-div').find('.major_age').text();
  var is_minar = $(this).closest('.edit-btn-div').closest('.info-div').find('#is_minar').val();
  var member_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#member_id2').val();

  $('#relationship').val(relationship);
  $('#family_person_name').val(family_person_name);
  $('#family_person_dob').val(family_person_dob);
  $('#family_person_age').val(family_person_age);
  $('#member_id').val(member_id);

  if(is_minar == 'yes'){
    $('#guardian_div').show();
    $('#guardian_name_title').val(guardian_name_title);
    $('#guardian_name').val(guardian_name);
    $('#major_age').val(major_age);
  }
  else{
    $('#guardian_div').hide();
    $('#guardian_name').val('');
    $('#major_age').val('');
  }
});

// Update Family Info... Datta...
$('#family_update_btn').click(function(){
  $('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  var relationship = $('#relationship').val();
  var family_person_name = $('#family_person_name').val();
  var family_person_dob = $('#family_person_dob').val();
  var guardian_name = $('#guardian_name').val();
  var major_age = $('#major_age').val();
  var family_person_age = $('#family_person_age').val();

  if(relationship == '0' || family_person_name == '' || family_person_dob == '' || family_person_age == '' || (major_age < 18 && family_person_age < 18) || (guardian_name == '' && family_person_age < 18)){
    // Blank..
  }
  else{
    $("#save_load_modal").modal("show");
    var form_data = $('#form_family_info').serialize();
    $.ajax({
       data: form_data,
       type: "post",
       url: base_url+"Will_controller/update_family_member",
       success: function (data){
         window.location.href = base_url+"Family-Information";
       }
    });
  }
});

$(".delete_family_member").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#exampleModal').modal('show');
  var member_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#member_id2').val();
  var relationship = $(this).closest('.edit-btn-div').closest('.info-div').find('.relationship').text();
  var family_person_name = $(this).closest('.edit-btn-div').closest('.info-div').find('.family_person_name').text();
  $('#exampleModal').find('.modal-member-relationship').text('Relationship : '+relationship);
  $('#exampleModal').find('.modal-member-name').text('Name : '+family_person_name);
  $('#exampleModal').find('#modal-member-id').val(member_id);
});

$('#btn-delete-member-confirm').click(function(){
  var member_id = $('#modal-member-id').val();
  $.ajax({
     data: {'member_id':member_id},
     type: "post",
     url: base_url+"Will_controller/delete_family_member",
     success: function (data){
       window.location.href = base_url+"Family-Information";
     }
  });
  // alert(member_id);
  $('#exampleModal').modal('hide');
});

$('#family_prev_btn').click(function(){
  window.location.href = base_url+"Personal-Information";
});
$('#family_next_btn').click(function(){
  window.location.href = base_url+"Assets-Information";
});
