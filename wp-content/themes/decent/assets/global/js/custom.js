jQuery(document).ready(function($) {
    
    /* Superfish Menu Call */
    $('#decent_menu').superfish({});
    
    /* Responsive Menu */
    $('.primarymenu-resp').toggle(function(){
        $('.primarymenu-section').addClass('menuClicked');
        $('.menuClicked').fadeIn();
        $('.menuClicked ul.sub-menu').show().css('visibility', 'visible');
        $('.menuClicked ul.children').show().css('visibility', 'visible');
        $('.menuClicked ul.sf-menu').removeClass('sf-js-enabled');
    }, function(){
        $('.menuClicked').hide();
        $('.menuClicked ul.sf-menu').addClass('sf-js-enabled');
        $('.menuClicked ul.sub-menu').hide().css('visibility', 'hidden');
        $('.menuClicked ul.children').hide().css('visibility', 'hidden');
        $('.primarymenu-section').removeClass('menuClicked');
    });
    
    $(window).resize(function(){
       if( $('.primarymenu-resp').css('display') == 'none'){
           
           $('.primarymenu-section').removeClass('menuClicked');
           $('.primarymenu-section ul.sf-menu').addClass('sf-js-enabled');
           $('.primarymenu-section ul.sub-menu').hide().css('visibility', 'hidden');
           $('.primarymenu-section ul.children').hide().css('visibility', 'hidden');
       } else {
           $('.primarymenu-section').addClass('menuClicked');
           $('.primarymenu-section ul.sf-menu').removeClass('sf-js-enabled');
           $('.primarymenu-section ul.sub-menu').show().css('visibility', 'visible');
           $('.primarymenu-section ul.children').show().css('visibility', 'visible');
       }
    });
    
    /* Service Section */
    var serviceAnchorColor = $('.mudpack-service-text a').css('color');
    $('.mudpack-service-text').hover(
        function(){
            $(this).children('a').stop().animate({
                color: '#DDDDDD'
            });
            $(this).children('a').children('i').stop().fadeIn();
        },
        function(){
            $(this).children('a').children('i').stop().fadeOut(100);
            $(this).children('a').stop().animate({
                color: serviceAnchorColor
            }, 800);
        });
});