(function ($) 
{
    
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