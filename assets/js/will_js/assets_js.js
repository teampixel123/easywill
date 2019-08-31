// Assets JS...
$(document).ready(function(){
    $("input").attr("autocomplete", "off");
    $('input').on("cut copy paste",function(e) {
      e.preventDefault();
   });
});
// Save real estate... Datta...
$('#real_estate_save_btn').click(function(){
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

  var estate_type = $('#estate_type').val();
  var estate_number = $('#estate_number').val();
  var survey_number_type = $('#survey_number_type').val();
  var survey_number = $('#survey_number').val();
  var measurement_area = $('#measurement_area').val();
  var measurement_unit = $('#measurement_unit').val();
  var real_estate_address = $('#real_estate_address').val();
  var real_estate_city = $('#real_estate_city').val();
  var real_estate_pin = $('#real_estate_pin').val();
  var real_estate_state = $('#real_estate_state').val();
  var real_estate_country = $('#real_estate_country').val();
  var pin_format = /^[0-9]{6}$/;

  if(estate_type == '0' || estate_number == '' || survey_number_type == '' ||  survey_number_type == '' ||  survey_number == ''
 ||  measurement_area == '' ||  measurement_unit == '0' ||  real_estate_address == '' ||  real_estate_city == ''
 ||  real_estate_pin == '' ||  real_estate_state == '' ||  real_estate_country == '' || !pin_format.test(real_estate_pin)){

 }
 else{
   $('#form_real_estate').submit();
 }
});

// Get info for Edit Real Estate... Datta...
$(".real_estate_edit").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#real_estate_save_btn').hide();
  $('#real_estate_update_btn').show();
  var estate_type = $(this).closest('.edit-btn-div').closest('.info-div').find('.estate_type').text();
  var estate_number = $(this).closest('.edit-btn-div').closest('.info-div').find('.estate_number').text();
  var survey_number_type = $(this).closest('.edit-btn-div').closest('.info-div').find('.survey_number_type').text();
  var survey_number = $(this).closest('.edit-btn-div').closest('.info-div').find('.survey_number').text();
  var measurement_area = $(this).closest('.edit-btn-div').closest('.info-div').find('.measurement_area').text();
  var measurement_unit = $(this).closest('.edit-btn-div').closest('.info-div').find('.measurement_unit').text();
  var real_estate_address = $(this).closest('.edit-btn-div').closest('.info-div').find('.real_estate_address').text();
  var real_estate_city = $(this).closest('.edit-btn-div').closest('.info-div').find('.real_estate_city').text();
  var real_estate_pin = $(this).closest('.edit-btn-div').closest('.info-div').find('.real_estate_pin').text();
  var real_estate_state = $(this).closest('.edit-btn-div').closest('.info-div').find('.real_estate_state').text();
  var real_estate_country = $(this).closest('.edit-btn-div').closest('.info-div').find('.real_estate_country').text();
  var real_estate_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#real_estate_id').val();


  $('#estate_type').val(estate_type);
  $('#estate_number').val(estate_number);
  $('#survey_number_type').val(survey_number_type);
  $('#survey_number').val(survey_number);
  $('#measurement_area').val(measurement_area);
  $('#measurement_unit').val(measurement_unit);
  $('#real_estate_address').val(real_estate_address);
  $('#real_estate_city').val(real_estate_city);
  $('#real_estate_pin').val(real_estate_pin);
  $('#real_estate_state').val(real_estate_state);
  $('#real_estate_country').val(real_estate_country);
  $('#real_estate_id2').val(real_estate_id);

  // Active tab...
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#real_estate').addClass('active');
  $('#real_estate').addClass('show');
  $('#real_estate_tab').addClass('active');

  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});

$('#real_estate_update_btn').click(function(){
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

  var estate_type = $('#estate_type').val();
  var estate_number = $('#estate_number').val();
  var survey_number_type = $('#survey_number_type').val();
  var survey_number = $('#survey_number').val();
  var measurement_area = $('#measurement_area').val();
  var measurement_unit = $('#measurement_unit').val();
  var real_estate_address = $('#real_estate_address').val();
  var real_estate_city = $('#real_estate_city').val();
  var real_estate_pin = $('#real_estate_pin').val();
  var real_estate_state = $('#real_estate_state').val();
  var real_estate_country = $('#real_estate_country').val();
  var pin_format = /^[0-9]{6}$/;

  if(estate_type == '0' || estate_number == '' || survey_number_type == '' ||  survey_number_type == '' ||  survey_number == ''
 ||  measurement_area == '' ||  measurement_unit == '0' ||  real_estate_address == '' ||  real_estate_city == ''
 ||  real_estate_pin == '' ||  real_estate_state == '' ||  real_estate_country == '' || !pin_format.test(real_estate_pin)){

 }
 else{
   // $('#form_real_estate').submit();
   $("#save_load_modal").modal("show");
   $('#form_real_estate').attr('action', base_url+"Will_Controller/update_real_estate_info");
   $('#form_real_estate').submit();
   // var form_data = $('#form_real_estate').serialize();
   // $.ajax({
   //    data: form_data,
   //    type: "post",
   //    url: base_url+"Will_controller/update_real_estate_info",
   //    success: function (data){
   //      window.location.href = base_url+"Assets-Information";
   //    }
   // });
 }
});

$(".real_estate_delete").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#exampleModal').modal('show');

  var real_estate_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#real_estate_id').val();
  var estate_type = $(this).closest('.edit-btn-div').closest('.info-div').find('.estate_type').text();
  var estate_number = $(this).closest('.edit-btn-div').closest('.info-div').find('.estate_number').text();
  $('#exampleModal').find('.modal-real-type').text(''+estate_type+' Number : '+estate_number);
  $('#exampleModal').find('#modal-real-id').val(real_estate_id);
});

$('#btn-delete-assets-confirm').click(function(){
  var real_estate_id = $('#modal-real-id').val();
  $.ajax({
     data: {'real_estate_id':real_estate_id},
     type: "post",
     url: base_url+"Will_controller/delete_real_estate",
     success: function (data){
       window.location.href = base_url+"Assets-Information";
     }
  });
  $('#exampleModal').modal('hide');
});

// Bank Assets ...
$('#account_type').change(function(){
  var assets_type = $(this).val();
  $('.bnk-name-hide').hide();
  $('#sum_ass_amt').hide();
  $('#fd_rec_no').hide();
  $('#key_num').hide();
  $('#est_state, #est_pin').show();

  // Display related lable..
  if(assets_type == 'Savings Account' || assets_type == 'Current Account' || assets_type == 'PPF'){
    $('.hide').hide();
    $('#lbl_acc_num').show();
    $('#lbl_bank_name').show();
  }
  else if(assets_type == 'Fixed Deposits'){
    $('.hide').hide();
    $('#lbl_cust_id').show();
    $('#lbl_bank_name').show();
    $('#fd_rec_no').show();
  }
  else if(assets_type == 'Bank Locker'){
    $('.hide').hide();
    $('#lbl_lock_num').show();
    $('#lbl_bank_name').show();
    $('#key_num').show();
  }
  else if(assets_type == 'Mutual Funds'){
    $('.hide').hide();
    $('#lbl_folio_num').show();
    $('#lbl_com_name').show();
    $('#est_state').hide();
  }
  else if(assets_type == 'Stock Equities'){
    $('.hide').hide();
    $('#lbl_isin_num').show();
    $('#lbl_com_name').show();
    $('#est_state').hide();
  }
  else if(assets_type == 'Insurance Policy'){
    $('.hide').hide();
    $('#lbl_policy_num').show();
    $('#lbl_inc_com_name').show();
    $('#sum_ass_amt').show();
    $('#est_state, #est_pin').hide();
  }
  else{
    $('#lbl_bank_name').show();
  }
  // Change Textbox...
  if(assets_type == 'Savings Account' || assets_type == 'Current Account' || assets_type == 'PPF' || assets_type == 'Bank Locker'){
    $('#acc_no_addr').hide().val('');
    $('#account_number').show().val('');
  }
  else if(assets_type == 'Fixed Deposits' || assets_type == 'Mutual Funds' || assets_type == 'Stock Equities' || assets_type == 'Insurance Policy'){
    $('#account_number').hide().val('');
    $('#acc_no_addr').show().val('');
  }
  else{
    $('#acc_no_addr').hide().val('');
    $('#account_number').show().val('');
  }

  if(assets_type == 'Savings Account' || assets_type == 'Current Account' || assets_type == 'PPF' || assets_type == 'Bank Locker'){
    $('#acc_no_addr').hide().val('');
    $('#account_number').show().val('');
  }
});

$("#account_number").keyup(function(event){
  var inputValue = $("#account_number").val();
  $("#acc_no_addr").val(inputValue);
});

$('#bank_save_btn').click(function(){
  var account_type = $('#account_type').val();
  var acc_no_addr = $('#acc_no_addr').val();
  var bank_name = $('#bank_name').val();
  var bank_branch = $('#bank_branch').val();
  var bank_state = $('#bank_state').val();
  var bank_pin_code = $('#bank_pin_code').val();
  var fd_recipt_no = $('#fd_recipt_no').val();
  var sum_assurance_amount = $('#sum_assurance_amount').val();
  var key_number = $('#key_number').val();
  var pin_format = /^[0-9]{6}$/;

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

  if(account_type == '0' || bank_name == '' || acc_no_addr == '' || bank_branch == ''
  || (account_type == 'Insurance Policy' && sum_assurance_amount == '')
  || (account_type == 'PPF' && fd_recipt_no == '')
  || (account_type == 'Bank Locker' && key_number == '')
  || (account_type != 'Insurance Policy' && !pin_format.test(bank_pin_code))){
    // Blank...
  }
  else{
    $('#form_bank_assets').submit();
  }
});

// Get info for Edit Real Estate... Datta...
$(".bank_assets_edit").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#bank_save_btn').hide();
  $('#bank_update_btn').show();
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#bank_assets').addClass('active');
  $('#bank_assets').addClass('show');
  $('#bank_assets_tab').addClass('active');

  var bank_assets_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#bank_assets_id').val();
  var acc_type = $(this).closest('.edit-btn-div').closest('.info-div').find('#acc_type').val();
  var acc_number = $(this).closest('.edit-btn-div').closest('.info-div').find('#acc_number').val();
  var bnk_name = $(this).closest('.edit-btn-div').closest('.info-div').find('#bnk_name').val();
  var bnk_branch = $(this).closest('.edit-btn-div').closest('.info-div').find('#bnk_branch').val();
  var bnk_state = $(this).closest('.edit-btn-div').closest('.info-div').find('#bnk_state').val();
  var bnk_pin = $(this).closest('.edit-btn-div').closest('.info-div').find('#bnk_pin').val();
  var fd_re_no = $(this).closest('.edit-btn-div').closest('.info-div').find('#fd_re_no').val();
  var sum_assu_amt = $(this).closest('.edit-btn-div').closest('.info-div').find('#sum_assu_amt').val();
  var key_nmbr = $(this).closest('.edit-btn-div').closest('.info-div').find('#key_nmbr').val();

  $('#assets_id').val(bank_assets_id);
  $('#account_type').val(acc_type);
  $('#acc_no_addr').val(acc_number);
  $('#account_number').val(acc_number);
  $('#bank_name').val(bnk_name);
  $('#bank_branch').val(bnk_branch);
  $('#bank_state').val(bnk_state);
  $('#bank_pin_code').val(bnk_pin);
  $('#fd_recipt_no').val(fd_re_no);
  $('#sum_assurance_amount').val(sum_assu_amt);
  $('#key_number').val(key_nmbr);

  $('.bnk-name-hide').hide();
  $('#sum_ass_amt').hide();
  $('#fd_rec_no').hide();
  $('#key_num').hide();
  $('#est_state, #est_pin').show();

  // Display related lable..
  if(acc_type == 'Savings Account' || acc_type == 'Current Account' || acc_type == 'PPF'){
    $('.hide').hide();
    $('#lbl_acc_num').show();
    $('#lbl_bank_name').show();
  }
  else if(acc_type == 'Fixed Deposits'){
    $('.hide').hide();
    $('#lbl_cust_id').show();
    $('#lbl_bank_name').show();
    $('#fd_rec_no').show();
  }
  else if(acc_type == 'Bank Locker'){
    $('.hide').hide();
    $('#lbl_lock_num').show();
    $('#lbl_bank_name').show();
    $('#key_num').show();
  }
  else if(acc_type == 'Mutual Funds'){
    $('.hide').hide();
    $('#lbl_folio_num').show();
    $('#lbl_com_name').show();
    $('#est_state').hide();
  }
  else if(acc_type == 'Stock Equities'){
    $('.hide').hide();
    $('#lbl_isin_num').show();
    $('#lbl_com_name').show();
    $('#est_state').hide();
  }
  else if(acc_type == 'Insurance Policy'){
    $('.hide').hide();
    $('#lbl_policy_num').show();
    $('#lbl_inc_com_name').show();
    $('#sum_ass_amt').show();
    $('#est_state, #est_pin').hide();
  }
  else{
    $('#lbl_bank_name').show();
  }
  // Change Textbox...
  if(acc_type == 'Savings Account' || acc_type == 'Current Account' || acc_type == 'PPF' || acc_type == 'Bank Locker'){
    $('#acc_no_addr').hide();
    $('#account_number').show();
  }
  else if(acc_type == 'Fixed Deposits' || acc_type == 'Mutual Funds' || acc_type == 'Stock Equities' || acc_type == 'Insurance Policy'){
    $('#account_number').hide();
    $('#acc_no_addr').show();
  }
  else{
    $('#acc_no_addr').hide();
    $('#account_number').show();
  }

  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});

$('#bank_update_btn').click(function(){
  var account_type = $('#account_type').val();
  var acc_no_addr = $('#acc_no_addr').val();
  var bank_name = $('#bank_name').val();
  var bank_branch = $('#bank_branch').val();
  var bank_state = $('#bank_state').val();
  var bank_pin_code = $('#bank_pin_code').val();
  var fd_recipt_no = $('#fd_recipt_no').val();
  var sum_assurance_amount = $('#sum_assurance_amount').val();
  var key_number = $('#key_number').val();
  var pin_format = /^[0-9]{6}$/;

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

  if(account_type == '0' || bank_name == '' || acc_no_addr == '' || bank_branch == ''
  || (account_type == 'Insurance Policy' && sum_assurance_amount == '')
  || (account_type == 'PPF' && fd_recipt_no == '')
  || (account_type == 'Bank Locker' && key_number == '')
  || (account_type != 'Insurance Policy' && !pin_format.test(bank_pin_code))){
    // Blank...
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_bank_assets').attr('action', base_url+"Will_Controller/update_bank_assets_info");
    $('#form_bank_assets').submit();
    // var form_data = $('#form_bank_assets').serialize();
    // $.ajax({
    //    data: form_data,
    //    type: "post",
    //    url: base_url+"Will_controller/update_bank_assets_info",
    //    success: function (data){
    //      window.location.href = base_url+"Assets-Information";
    //    }
    // });
  }
});

$(".bank_assets_delete").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#bank_delete_modal').modal('show');

  var bank_assets_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#bank_assets_id').val();
  var acc_type = $(this).closest('.edit-btn-div').closest('.info-div').find('#acc_type').val();
  var acc_number = $(this).closest('.edit-btn-div').closest('.info-div').find('#acc_number').val();
  var bnk_name = $(this).closest('.edit-btn-div').closest('.info-div').find('#bnk_name').val();

  $('#bank_delete_modal').find('.modal-bank-type').text('Type : '+acc_type);
  $('#bank_delete_modal').find('.modal-bank-name').text('Name : '+bnk_name);
  $('#bank_delete_modal').find('.modal-bank-num').text('Number : '+acc_number);
  $('#bank_delete_modal').find('#modal-bank-id').val(bank_assets_id);
});

$('#btn-delete-bank-confirm').click(function(){
  var bank_assets_id = $('#modal-bank-id').val();
  $.ajax({
     data: {'bank_assets_id':bank_assets_id},
     type: "post",
     url: base_url+"Will_controller/delete_bank_assets",
     success: function (data){
       window.location.href = base_url+"Assets-Information";
     }
  });
  $('#exampleModal').modal('hide');
});

// Vehicle JS...
$(document).ready(function(){
  // Vehicle Make Year Validation...
  $('#vehicle_make_year').blur(function(){
    var cur_year = new Date().getFullYear();
    var min_year = cur_year - 100;
    var vehicle_make_year = $(this).val();
    if(vehicle_make_year < min_year || vehicle_make_year > cur_year){
      $(this).addClass('invalide-input');
    }
    else{
      $(this).removeClass('invalide-input');
    }
  });
});

$('#vehicle_save_btn').click(function(){
  var vehicle_registration_no = $('#vehicle_registration_no').val();
  var vehicle_make_year = $('#vehicle_make_year').val();
  var vehicle_model_name = $('#vehicle_model_name').val();
  var cur_year = new Date().getFullYear();
  var min_year = cur_year - 100;

  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
    else{
      $(this).removeClass('required-input');
    }
  });

  if(vehicle_registration_no == '' || vehicle_make_year == '' || vehicle_model_name == '' || vehicle_make_year < min_year || vehicle_make_year > cur_year){
    // Blank...
  }
  else {
    $('#form_vehicle').submit();
  }
});

$(".vehicle_edit").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#vehicle_save_btn').hide();
  $('#vehicle_update_btn').show();
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#vehicle').addClass('active');
  $('#vehicle').addClass('show');
  $('#vehicle_tab').addClass('active');

  var vehicle_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_ass_id').val();
  var vehicle_model = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_model').val();
  var vehicle_registration = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_registration').val();
  var vehicle_make = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_make').val();

  $('#vehicle_id').val(vehicle_id);
  $('#vehicle_model_name').val(vehicle_model);
  $('#vehicle_registration_no').val(vehicle_registration);
  $('#vehicle_make_year').val(vehicle_make);

  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});

$('#vehicle_update_btn').click(function(){
  var vehicle_registration_no = $('#vehicle_registration_no').val();
  var vehicle_make_year = $('#vehicle_make_year').val();
  var vehicle_model_name = $('#vehicle_model_name').val();
  var cur_year = new Date().getFullYear();
  var min_year = cur_year - 100;

  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
    else{
      $(this).removeClass('required-input');
    }
  });

  if(vehicle_registration_no == '' || vehicle_make_year == '' || vehicle_model_name == '' || vehicle_make_year < min_year || vehicle_make_year > cur_year){
    // Blank...
  }
  else {
    $("#save_load_modal").modal("show");
    $('#form_vehicle').attr('action', base_url+"Will_Controller/update_vehicle_assets_info");
    $('#form_vehicle').submit();
  }
});

$('.vehicle_delete').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#vehicle').addClass('active');
  $('#vehicle').addClass('show');
  $('#vehicle_tab').addClass('active');

  $('#vehicle_delete_modal').modal('show');

  var vehicle_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_ass_id').val();
  var vehicle_model = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_model').val();
  var vehicle_registration = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_registration').val();
  var vehicle_make = $(this).closest('.edit-btn-div').closest('.info-div').find('#vehicle_make').val();

  $('#vehicle_delete_modal').find('.modal-vehicle-model').text('Model : '+vehicle_model);
  $('#vehicle_delete_modal').find('.modal-vehicle-reg').text('Registration No : '+vehicle_registration);
  $('#vehicle_delete_modal').find('.modal-vehicle-make').text('Make Year : '+vehicle_make);
  $('#vehicle_delete_modal').find('#modal-vehicle-id').val(vehicle_id);
});

$('#btn-delete-vehicle-confirm').click(function(){
  var vehicle_id = $('#modal-vehicle-id').val();
  $.ajax({
     data: {'vehicle_id':vehicle_id},
     type: "post",
     url: base_url+"Will_controller/delete_vehicle",
     success: function (data){
       window.location.href = base_url+"Assets-Information";
     }
  });
  $('#vehicle_delete_modal').modal('hide');
});

// Other Gift JS...
$('#gift_save_btn').click(function(){
  var gift_type = $('#gift_type').val();
  var gift_description = $('#gift_description').val();

  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
    else{
      $(this).removeClass('required-input');
    }
  });

  if(gift_type == '0' || gift_description == ''){
    // Blank...
  }
  else {
    $('#form_other_gifts').submit();
  }
});

$(".other_gifts_edit").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#gift_save_btn').hide();
  $('#gift_update_btn').show();
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#other_gifts').addClass('active');
  $('#other_gifts').addClass('show');
  $('#other_gifts_tab').addClass('active');

  var other_gift_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#other_gift_id').val();
  var gift_type = $(this).closest('.edit-btn-div').closest('.info-div').find('#gift_typ').val();
  var gift_description = $(this).closest('.edit-btn-div').closest('.info-div').find('#gift_desc').val();

  $('#gift_id').val(other_gift_id);
  $('#gift_type').val(gift_type);
  $('#gift_description').val(gift_description);

  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});
// Other Gift Update...
$('#gift_update_btn').click(function(){
  var gift_type = $('#gift_type').val();
  var gift_description = $('#gift_description').val();

  $('.required').each(function(){
    var val = $(this).val();
    if(val == ''){
      $(this).addClass('required-input');
    }
    else{
      $(this).removeClass('required-input');
    }
  });

  if(gift_type == '0' || gift_description == ''){
    // Blank...
  }
  else {
    $("#save_load_modal").modal("show");
    $('#form_other_gifts').attr('action', base_url+"Will_Controller/update_other_gift_info");
    $('#form_other_gifts').submit();
  }
});

$('.other_gifts_delete').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#other_gifts').addClass('active');
  $('#other_gifts').addClass('show');
  $('#other_gifts_tab').addClass('active');

  $('#other_gifts_delete_modal').modal('show');

  var other_gift_id = $(this).closest('.edit-btn-div').closest('.info-div').find('#other_gift_id').val();
  var gift_type = $(this).closest('.edit-btn-div').closest('.info-div').find('#gift_typ').val();
  var gift_description = $(this).closest('.edit-btn-div').closest('.info-div').find('#gift_desc').val();

  $('#other_gifts_delete_modal').find('.modal-gift-type').text('Type : '+gift_type);
  $('#other_gifts_delete_modal').find('.modal-gift-description').text('Description : '+gift_description);
  $('#other_gifts_delete_modal').find('#modal-other-gift-id').val(other_gift_id);
});

$('#btn-delete-other-gift-confirm').click(function(){
  var gift_id = $('#modal-other-gift-id').val();
  $.ajax({
     data: {'gift_id':gift_id},
     type: "post",
     url: base_url+"Will_controller/delete_other_gift",
     success: function (data){
       window.location.href = base_url+"Assets-Information";
     }
  });
  $('#other_gifts_delete_modal').modal('hide');
});



$('#assets_prev_btn').click(function(){
  window.location.href = base_url+"Family-Information";
});
$('#assets_next_btn').click(function(){
  window.location.href = base_url+"Distribution";
});
