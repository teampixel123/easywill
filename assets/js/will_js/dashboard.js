$('.btn_will_edit').click(function(){
  event.stopPropagation();
  event.stopImmediatePropagation();

  $(this).closest('.action-td').find('.edit_will_form').submit();
  // alert();
});
