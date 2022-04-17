
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

  $('#generate-pdf').click(function(){
    var doc = new jspdf.jsPDF()
    doc.setFont("helvetica");
    doc.setFontSize(12);

    // Simple data example
    var head = [['Nombre', 'Precio']]
    var fruitsBody = []
  
    
    $.each($('.fruits-wrapper .row-wrapper'),function(){
      fruitsBody.push([$(this).find('.fruit-info-wrapper input').val(), $(this).find('.fruit-price-wrapper input').val() + '€'])
    })
    
    doc.text('Nombre: ' + $('#user-name').val(), 10, 10);
    doc.text('Dni: ' + $('#user-nif').val(), 10, 16);
    doc.text('Teléfono: ' + $('#user-phone').val(), 10, 22);

    doc.text('Frutas', 15, 30);
    
    doc.autoTable({ head: head, body: fruitsBody, startY: 35 ,columnStyles: {
      0: {cellWidth: 100},
      1: {cellWidth: 50},
      // etc
    } })
    
    var vegetablesBody = []
    
    $.each($('.vegetable-wrapper .row-wrapper'),function(){
      vegetablesBody.push([$(this).find('.vegetable-info-wrapper input').val(), $(this).find('.vegetable-price-wrapper input').val() + '€'])
    })
    doc.text('Verduras', 15 , (doc.lastAutoTable.finalY + 20));
    
    doc.autoTable({ head: head, body: vegetablesBody, startY: (doc.lastAutoTable.finalY + 25), columnStyles: {
      0: {cellWidth: 100},
      1: {cellWidth: 50},
      // etc
    } })
    
    doc.save('delivery-note.pdf');
  });

}

function removeListeners(target){
  let wrapper = $(target).parents('.row-wrapper');
  if($(wrapper).index() != 0){
    $(wrapper).remove();
  }
}