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
      let removeBtn = $(this).parents('.accordion-body').find('.row-wrapper').last().find('.remove-btn'); 
      $(removeBtn).click(function(){
        removeListeners(removeBtn)
      })
    }
  });

//   $('#generate-pdf').click(function(){

//     let table = $('.table-wrapper');

//     console.info($(table).html())

//     $.ajax({
//       url: "./pdfOutput.php",
//       data: {'data': $(table).html()},
//       type: "POST",
//     })
//     .done(function( data ) {
//       let blob = new Blob([data], {
//         type: 'application/pdf'
//       });
//       var link=document.createElement('a');
//       link.href=window.URL.createObjectURL(blob);
//       link.download="<FILENAME_TO_SAVE_WITH_EXTENSION>";
//       link.click();
//     });
//   });

}

function removeListeners(target){
  let wrapper = $(target).parents('.row-wrapper');
  if($(wrapper).index() != 0){
    $(wrapper).remove();
  }
}