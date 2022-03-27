$(document).ready(setPage());


function setPage(){

  $('.add-item-wrapper button').click(function(){
    let columnWrapper = $(this).parents('.accordion-body').find('.column-wrapper');
    if (columnWrapper.length > 0) {
      let index = ($(columnWrapper).find('.row-wrapper').length + 1);
      let newNode = $(columnWrapper).find('.row-wrapper').first().clone();
      $(columnWrapper).append(newNode);
      $.each($(newNode).find('input'),function(){
        $(this).attr('id',$(this).attr('id').replace(/(\d+)/,index));
        $(this).prev().attr('for',$(this).prev().attr('for').replace(/(\d+)/,index))
        $(this).val('');
      }); 
    }
  });


}