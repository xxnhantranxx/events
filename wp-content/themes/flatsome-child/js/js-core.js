jQuery(document).ready(function($){
	$(document).ready(function(){
		var timeout;
        jQuery( function( $ ) {
            $('.woocommerce').on('change', 'input.qty', function(){
         
                if ( timeout !== undefined ) {
                    clearTimeout( timeout );
                }
         
                timeout = setTimeout(function() {
                    $("[name='update_cart']").trigger("click");
                }, 1000 ); // 1 second delay, half a second (500) seems comfortable too
         
            });
        } );
		if($(window).width() < 850){
			$(".mobile-sidebar").prepend('<button title="Close (Esc)" type="button" class="mfp-close">×</button>');
		}
        $('<p class="sale-off-text">Giảm</p>').insertBefore('span.onsale');
        $("<span>Thương Hiệu: </span>").insertBefore('.pwb-single-product-brands a');
        $("<span>Chia sẻ:  </span>").insertBefore('.social-icons.share-icons a:first-child'); 
        // $('iframe').parent('p').addClass('wapper_video_yt');

        $('.wpaperProduct > .item_box_web .box_image_web>a>img').each(function() {
            var $this = $(this);
            var sectionInnerHeight = -($this.innerHeight() - 320);
            $this.parent('a').parent('.box_image_web').hover(function(){
                $(this).children('a').children('img').css('top', sectionInnerHeight);
            },
            function(){
                $(this).children('a').children('img').css('top', 0);
            });
            // $this.css('top', sectionInnerHeight);
        });

        $('.main-show-detail-website .box_image_web .inner-screen > img').each(function() {
            var $this = $(this);
            var sectionInnerHeight = -($this.innerHeight() - 570);
            $this.hover(function(){
                $(this).css('top', sectionInnerHeight);
            },
            function(){
                $(this).css('top', 0);
            });
            // $this.css('top', sectionInnerHeight);
        });

        $('.main-show-detail-website .image-mobile .inner-screen > img').each(function() {
            var $this = $(this);
            var sectionInnerHeight = -($this.innerHeight() - 570);
            $this.hover(function(){
                $(this).css('top', sectionInnerHeight);
            },
            function(){
                $(this).css('top', 0);
            });
            // $this.css('top', sectionInnerHeight);
        });

        // fixed widget website
         
        var headerHeight = $('#header').innerHeight();
        var themeIntro = $('.theme-intro').innerHeight();
        var themeDetailSlider = $('.theme-detail .container .show-slider').innerHeight(); + 50;
        var totalStickHead = headerHeight + themeIntro + themeDetailSlider;
        var showContent= $('.show-content').innerHeight();
        var topToContents = totalStickHead + $('.show-content').innerHeight();
        var heightStop = topToContents - $('.widget_lv').innerHeight();
        if($(window).width() > 1200 && showContent > 1000){
            $(window).scroll(function () {
                var sticky = $('.widget_lv'),
                    scroll = $(window).scrollTop();
    
                if (scroll >= totalStickHead && scroll < heightStop){
                    sticky.addClass('sticky');
                    sticky.removeClass('stopBottom');
                }else if(scroll >= heightStop && scroll >  heightStop){
                    sticky.addClass('stopBottom');
                    sticky.removeClass('sticky');
                }else{
                    sticky.removeClass('sticky');
                    sticky.removeClass('stopBottom');
                }
            });
        }
    });	
});

