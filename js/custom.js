jQuery('html').removeClass('no-js').addClass('js');
jQuery(document).ready(function($){
    // =========== Main Menu ========= //
    jQuery(".menu-nav ul a").removeAttr('title');
    jQuery(".menu-nav ul ul").css({display: "none"}); // Opera Fix
    jQuery(".menu-nav ul li").each(function()
        {   
        var jQuerysubmeun = jQuery(this).find('ul:first');
        jQuery(this).hover(function()
        {   
           jQuerysubmeun.stop().css({overflow:"hidden", height:"auto", display:"none", paddingTop:0}).slideDown(250, function()
           {
                jQuery(this).css({overflow:"visible", height:"auto"});
           });  
        },
        function()
        {   
           jQuerysubmeun.stop().slideUp(250, function()
           {    
                jQuery(this).css({overflow:"hidden", display:"none"});
           });
        }); 
    });
    // =========== Footer Menu ========= //
    $('.footer-menu ul li:not(:last)').append('&nbsp;&nbsp;-&nbsp;');


    // ========= Feature slideshow ========= //
    $('#feature-slide').cycle({
            fx: 'scrollRight', 
            cleartype:  false,
            pause:    1,  // pause on hover
            easing: 'easeInOutCubic', //easeOutBounce
            randomizeEffects: 0,
            speed: 1500,
            delay: 3000,
            pagerEvent: 'mouseover',
            next: '#slide-next',
            prev: '#slide-prev'
    });

    // ========= Services Slide ========= //
    jQuery('#list-services').jcarousel({   wrap: 'circular'});

    // ========= Clients Slide ========= //
    jQuery('#list-clients').jcarousel({   wrap: 'circular'});


    // ========= MENU SLIDES ========= //
    $('.inner-menu').cycle({
                    fx: 'scrollRight', 
                    cleartype:  false,
                    pause:    1,  // pause on hover
                    easing: 'easeInOutBack',
                    randomizeEffects: 0,
                    height: 'auto',
                    speed: 1000,
                    pager: 'ul.slider-nav',
                    timeout: 8000,
                    slideExpr: '.slides',
                    next: '#top-next',
                    prev: '#top-prev',
                    pagerAnchorBuilder: function(idx, slide) { 
                    // return selector string for existing anchor 
                    return 'ul.slider-nav li:eq(' + idx + ') a'; 
                    },
                    after: onAfter

                   
            });
            
    function onAfter(curr, next, opts, fwd) {
      var $ht = $(this).height();
    
      //set the container's height to that of the current slide
      $(this).parent().animate({height: $ht});
    }       

})
    



