// Save Executor
$('#executor_save_btn').click(function(){
  var executor_name = $('#executor_name').val();
  var executor_address = $('#executor_address').val();
  $('#executor_name, #executor_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if(executor_name == '' || executor_address == ''){ // Blank
  }
  else{
    $('#form_save_executor').submit();
  }
});

// Get executor data for edit...
$('.edit_executor').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var executor_id = $(this).closest('.edit-btn-div').find('.id').val();
  var exec_name_title = $(this).closest('.edit-btn-div').find('.name_title').val();
  var exec_name = $(this).closest('.edit-btn-div').find('.name').val();
  var exec_addr = $(this).closest('.edit-btn-div').find('.addr').val();
  $('#executor_id').val(executor_id);
  $('#executor_name_title').val(exec_name_title);
  $('#executor_name').val(exec_name);
  $('#executor_address').val(exec_addr);
  $('#executor_save_btn').hide();
  $('#executor_update_btn').show();
  // Active tab...
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#executor').addClass('active');
  $('#executor').addClass('show');
  $('#executor_tab').addClass('active');
  // Scroll..
  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});
// Update executor...
$('#executor_update_btn').click(function(){
  var executor_name = $('#executor_name').val();
  var executor_address = $('#executor_address').val();
  $('#executor_name, #executor_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if(executor_name == '' || executor_address == ''){ // Blank
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_save_executor').attr('action', base_url+"Will_Controller/update_executor_info");
    $('#form_save_executor').submit();

    // $('#form_save_executor').submit();
  }
});



// Get Witness data for edit...
$('.edit_witness').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var witness_id = $(this).closest('.edit-btn-div').find('.id').val();
  var witness_name_title = $(this).closest('.edit-btn-div').find('.name_title').val();
  var witness_name = $(this).closest('.edit-btn-div').find('.name').val();
  var witness_address = $(this).closest('.edit-btn-div').find('.addr').val();
  $('#witness_id').val(witness_id);
  $('#witness_name_title').val(witness_name_title);
  $('#witness_name').val(witness_name);
  $('#witness_address').val(witness_address);
  $('#witness_save_btn').hide();
  $('#witness_update_btn').show();
  // Active tab...
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#witness').addClass('active');
  $('#witness').addClass('show');
  $('#witness_tab').addClass('active');
  // Scroll..
  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});
// Update Witness...
$('#witness_update_btn').click(function(){
  var witness_name = $('#witness_name').val();
  var witness_address = $('#witness_address').val();
  $('#witness_name, #witness_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if(witness_name == '' || witness_address == ''){ // Blank
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_save_witness').attr('action', base_url+"Will_Controller/update_witness_info");
    $('#form_save_witness').submit();
  }
});



// Get Adequate Provision data for edit...
$('.edit_adequate').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var adequate_provision_id = $(this).closest('.edit-btn-div').find('.id').val();
  var adequate_provision_name_title = $(this).closest('.edit-btn-div').find('.name_title').val();
  var adequate_provision_name = $(this).closest('.edit-btn-div').find('.name').val();
  var adequate_provision_address = $(this).closest('.edit-btn-div').find('.addr').val();
  $('#adequate_provision_id').val(adequate_provision_id);
  $('#adequate_provision_name_title').val(adequate_provision_name_title);
  $('#adequate_provision_name').val(adequate_provision_name);
  $('#adequate_provision_address').val(adequate_provision_address);
  $('#adequate_save_btn').hide();
  $('#adequate_update_btn').show();
  // Active tab...
  $('.rem_class').removeClass('show');
  $('.rem_class').removeClass('active');
  $('#adequate_provision').addClass('active');
  $('#adequate_provision').addClass('show');
  $('#adequate_provision_tab').addClass('active');
  // Scroll..
  $('html, body').animate({
      scrollTop: $(".input-box").offset().top
  }, 500);
});

// Update Adequate Provision...
$('#adequate_update_btn').click(function(){
  var adequate_provision_name = $('#adequate_provision_name').val();
  var adequate_provision_address = $('#adequate_provision_address').val();
  $('#adequate_provision_name, #adequate_provision_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if(adequate_provision_name == '' || adequate_provision_address == ''){ // Blank
  }
  else{
    $("#save_load_modal").modal("show");
    $('#form_save_adequate_provision').attr('action', base_url+"Will_Controller/update_adequate_provision_info");
    $('#form_save_adequate_provision').submit();
  }
});



// Get Delete Modal...
$('.delete_other_info').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#deleteModal').modal('show');

  var executor_id = $(this).closest('.edit-btn-div').find('.id').val();
  var exec_name_title = $(this).closest('.edit-btn-div').find('.name_title').val();
  var exec_name = $(this).closest('.edit-btn-div').find('.name').val();
  var exec_addr = $(this).closest('.edit-btn-div').find('.addr').val();
  var type = $(this).closest('.edit-btn-div').find('.type').val();

  $('#deleteModal').find('.modal-info').html('<p> Name: '+exec_name_title+' '+exec_name+'</p><p>Address : '+exec_addr+'');
  $('#deleteModal').find('.type').text(type);
  $('#deleteModal').find('#modal_delete_id').val(executor_id);
  $('#deleteModal').find('#modal_delete_type').val(type);
  // alert(type);
});
// Delete From DB...
$('#btn-delete-other-confirm').click(function(){
  var other_delete_id = $('#modal_delete_id').val();
  var other_delete_type = $('#modal_delete_type').val();
  $.ajax({
     data: {'other_delete_id':other_delete_id,
            'other_delete_type':other_delete_type},
     type: "post",
     url: base_url+"Will_controller/delete_other_info",
     success: function (data){
       window.location.href = base_url+"Other-Information";
     }
  });
  $('#deleteModal').modal('hide');
});

// Save Witness...
$('#witness_save_btn').click(function(){
  var witness_name = $('#witness_name').val();
  var witness_address = $('#witness_address').val();

  $('#witness_name, #witness_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(witness_name == '' || witness_address == ''){ // Blank
  }
  else{
    $('#form_save_witness').submit();
  }
});

// Save Adequate Provision...
$('#adequate_save_btn').click(function(){
  var adequate_provision_name = $('#adequate_provision_name').val();
  var adequate_provision_address = $('#adequate_provision_address').val();

  $('#adequate_provision_name, #adequate_provision_address').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(adequate_provision_name == '' || adequate_provision_address == ''){ // Blank
  }
  else{
    $('#form_save_adequate_provision').submit();
  }
});

// Save Date and Place... Update in tbl_will...
$('#date_place_save_btn').click(function(){
  var will_date = $('#will_date').val();
  var will_place = $('#will_place').val();

  $('#will_date, #will_place').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });

  if(will_date == '' || will_place == ''){ // Blank
  }
  else{
    $('#form_save_date_place').submit();
  }
});


$('#other_info_prev_btn').click(function(){
  window.location.href = base_url+"Distribution";
});



$('#create_pdf_btn').click(function(){
  $('#create_pdf_form').submit();
  window.location.replace(base_url+"Distribution");
  // window.location.href = base_url+"Distribution";
});






// $('#destribution_next_btn').click(function(){
//   window.location.href = base_url+"Other-Information";
// });
