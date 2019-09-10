$('.btn_will_edit').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  var will_id = $(this).closest('.action-td').find('.will_id').val();
  var will_rem_updations = $(this).closest('.action-td').find('.will_rem_updations').val();
  $('#will_id').val(will_id);
  $('#will_rem_updations').val(will_rem_updations);
  $('#editModal').modal('show');
});

$('#edit_will_confirm').click(function(){
  $('.edit_will_form').submit();
});

$('.btn_blur_edit').click(function(){
  $('.edit_blur_form').submit();
});

$('.btn_pdf').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  $(this).closest('.action-td').find('.pdf_form').submit();
  window.location.replace(base_url+"User-Dashboard");
});
