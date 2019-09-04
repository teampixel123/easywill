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
     url: base_url+"Will_controller/delete_destribution",
     success: function (data){
       window.location.href = base_url+"Distribution";
     }
  });
  $('#exampleModal').modal('hide');
});

$('#destribution_prev_btn').click(function(){
  window.location.href = base_url+"Assets-Information";
});
$('#destribution_next_btn').click(function(){
  window.location.href = base_url+"Other-Information";
});
