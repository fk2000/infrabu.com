jQuery(function($){
    var midTimeout = null;
    $('#slider .nivoSlider').nivoSlider({
        directionNav: false,
        effect : window.pitch.sliderEffect,
        animSpeed : window.pitch.sliderAnimationSpeed,
        pauseTime : window.pitch.sliderSpeed,
        captionOpacity : 0,
        beforeChange: function(x){
            // Change the indicator mid way
            setTimeout(function(){
                var data = $('#slider .nivoSlider').data('nivo:vars');
                $('#slider .indicators .indicator')
                    .removeClass('active').eq(data.currentSlide).addClass('active');
            }, 50);
        }
    });
    
    // Tie the custom indicators to the slider
    $('#slider .indicators .indicator').each(function(i, el){
        $(el).click(function(){
            $('#slider .nivoSlider .nivo-controlNav a').eq(i).click();
            return false;
        });
    });
    
    // Initialize any home page post lists
    $('.home-loop').each(function(){
        var $$ = $(this);
        var i = 0;
        $$.find('.nav .next').click(function(){
            if(i >= $$.find('.post').length - 4 ) return false;
            
            $(this).animate({opacity: 0.6}, 100).animate({opacity: 1}, 100);
            $$.find('.post-list').animate({'margin-left': -((++i)*245)}, 'fast');
            
            return false;
        });
        $$.find('.nav .prev').click(function(){
            if(i == 0) return false;
            
            $(this).animate({opacity: 0.6}, 100).animate({opacity: 1}, 100);
            $$.find('.post-list').animate({'margin-left': -((--i)*245)}, 'fast');
            
            return false;
        });
    });
    
    // Move the avatar image into the container
    $('.comment .avatar-container .avatar').each(function(){
        var $$ = $(this);
        $$.closest('.avatar-container').css('background-image', 'url(' + $$.attr('src') + ')');
        $$.remove();
    });
    
    // Handle the reply link hover
    var resetHover = function(){
        $('.comment-reply-link').hide();
        $('.comment').each(function(){
            var $$ = $(this);
            if($$.is(':hover')  && (!$$.has('.children') || !$$.find('.children').eq(0).is(':hover'))){
                $$.find('.comment-reply-link').eq(0).show();
            }
        });
    }
    $('.comment .comment-reply-link')
        .hide()
        .closest('.comment')
        .mouseleave(resetHover)
        .mouseenter(resetHover);
    
    // Preload images
    $('img.preload').each(function(){
        var $$ = $(this).css('visibility', 'hidden');
        $.preload($(this), {
            onComplete: function(a){
                $$.css('visibility', 'visible').hide().fadeIn();
            }
        });
    });
    
    // Set up flex slider
    $('.flexslider').flexslider({
        
    });
});