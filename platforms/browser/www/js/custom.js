(function ($) 
{


$(".radios").buttonset();

function sem_Conexao(e){
$("<div title='Sem conexão'></div>").dialog({
   open: function(event, ui) { $(this).html('<span style="text-align:"center;">Conecte-se para utilizar esta função.</span>'); $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    show: { effect: "fade", duration: 300 },
    buttons: [
    {
      text: "Voltar",
      click: function() {
        $( this ).dialog("close");
        abre_Home();
      }
    }
  ]
}); 
}


    
$(document).ready(function() {

    $('#id_menu').load('menu.html');

    var snapper = new Snap({
      element: document.getElementById('content')
    });

    
    $('.open-menu').click(function() 
    {
      
        if(snapper.state().state == "left"){
            snapper.close();
        }else{
             snapper.open('left');  
        } 
    });






	$('.snapjs-left, .all-elements').click(function() {
        $('.header, .menu-wrapper').removeClass('hide-header-left');
        $('.header, .menu-wrapper').removeClass('hide-header-right');
        $('.menu-wrapper').addClass('hide-menu-wrapper');
        $('.open-slide').removeClass('active-slide');
		snapper.close();
	});


  });  
}(jQuery));