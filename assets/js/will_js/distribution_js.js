$('.real_estate_save_share').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var remain_assets_percent1 = $(this).closest('.distri-form').find('.remain_assets_percent').val();
  var distribution_percent1 = $(this).closest('.distri-form').find('.distribution_percent').val();
  var distribution_name = $(this).closest('.distri-form').find('.distribution_name').val();
  var remain_assets_percent = parseInt(remain_assets_percent1);
  var distribution_percent = parseInt(distribution_percent1);

  if(distribution_percent > remain_assets_percent){
    $(this).closest('.distri-form').closest('.share_div').find('.percent_error').show().delay(3000).fadeOut();
  }
  else{

    $(this).closest('.distri-form').find('.required').each(function(){
       var val = $(this).val();
       if(val == '' || val == '0'){
         $(this).addClass('required-input');
         $(this).attr("placeholder", "This field is required");
       }
       else{
         $(this).removeClass('required-input');
       }
    });
    if(distribution_name == '' || distribution_percent1 == ''){

    }
    else{
      $("#save_load_modal").modal("show");
      $(this).closest('.distri-form').submit();
    }
  }
  // var real_estate_id = $(this).closest('.distri-form').submit();
});

$('.delete_destribution').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#delete_destribution_modal').modal('show');

  var distribution_id = $(this).closest('tr').find('.distribution_id').val();
  var distribution_estate_type = $(this).closest('tr').find('.distribution_estate_type').val();
  var distribution_estate_details = $(this).closest('tr').find('.distribution_estate_details').val();
  var distribution_estate_person = $(this).closest('tr').find('.distribution_estate_person').val();
  var distribution_estate_percent1 = $(this).closest('tr').find('.distribution_estate_percent').val();
  var distribution_estate_percent = parseInt(distribution_estate_percent1);

  $('#delete_destribution_modal').find('.modal-info').html('<p> Type: '+distribution_estate_type+'</p><p>Details : '+distribution_estate_details+'</p><p>Name : '+distribution_estate_person+'</p><p>Ownership : '+distribution_estate_percent+'%<p>');
  $('#delete_destribution_modal').find('#modal_distribution_id').val(distribution_id);
  // alert(txt);
});

$('#btn_delete_destribution_confirm').click(function(){
  var distribution_id = $('#modal_distribution_id').val();
  // alert(distribution_id);
  $.ajax({
     data: {'distribution_id':distribution_id},
     type: "post",
     url: base_url+"Will_Controller/delete_destribution",
     success: function (data){
       window.location.href = base_url+"Distribution";
     }
  });
  $('#exampleModal').modal('hide');
});

$('.edit_destribution').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $('#edit_destribution_modal').modal('show');

  var distribution_id = $(this).closest('tr').find('.distribution_id').val();
  var distribution_estate_type = $(this).closest('tr').find('.distribution_estate_type').val();
  var distribution_name_title = $(this).closest('tr').find('.distribution_name_title').val();
  var distribution_estate_person = $(this).closest('tr').find('.distribution_estate_person').val();
  var distribution_estate_percent1 = $(this).closest('tr').find('.distribution_estate_percent').val();
  var distribution_remaining_per1 = $(this).closest('tr').find('.distribution_remaining_per').val();
  var distribution_flashdata = $(this).closest('tr').find('.distribution_flashdata').val();

  var distribution_estate_percent = parseInt(distribution_estate_percent1);
  var distribution_remaining_per = parseInt(distribution_remaining_per1);

  var remaining_percent = distribution_estate_percent + distribution_remaining_per;

  $('#edit_distribution_id').val(distribution_id);
  $('#edit_distribution_name_title').val(distribution_name_title);
  $('#edit_distribution_name').val(distribution_estate_person);
  $('#edit_distribution_percent').val(distribution_estate_percent);
  $('.edit_rem_per').text('*You can give maximum '+remaining_percent+'%');
  $('#rem_per').val(remaining_percent);
  $('#flashdata').val(distribution_flashdata);
});

$('#btn_update_destribution_confirm').click(function(){
  var distribution_percent1 = $('#edit_distribution_percent').val();
  var distribution_name = $('#edit_distribution_name').val();
  var rem_per1 = $('#rem_per').val();

  var distribution_percent = parseInt(distribution_percent1);
  var rem_per = parseInt(rem_per1);

  $('.distri_update_form').find('.required').each(function(){
     var val = $(this).val();
     if(val == '' || val == '0'){
       $(this).addClass('required-input');
       $(this).attr("placeholder", "This field is required");
     }
     else{
       $(this).removeClass('required-input');
     }
  });
  if(distribution_name == '' || distribution_percent1 == ''){

  }
  else if(distribution_percent > rem_per){
    $('.per_error').show().delay(3000).fadeOut();
  }
  else{
    $("#save_load_modal").modal("show");
    $('.distri_update_form').submit();
  }

});

$('#destribution_prev_btn').click(function(){
  window.location.href = base_url+"Assets-Information";
});
$('#destribution_next_btn').click(function(){
  window.location.href = base_url+"Other-Information";
});
