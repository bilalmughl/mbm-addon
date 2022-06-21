;(function ($) {
    /*-----------------------------
        SLICK CAROUSEL HANDLER
    ------------------------------*/
    var Slick_Carousel_Script_Handle = function ($scope, $) {

        var carousel_elem = $scope.find( '.oscar-carousel-activation' ).eq(0);

        if ( carousel_elem.length > 0 ) {

            var settings               = carousel_elem.data('settings');
            var slideid                = settings['slideid'];
            var arrows                 = settings['arrows'];
            var arrow_prev_txt         = settings['arrow_prev_txt'];
            var arrow_next_txt         = settings['arrow_next_txt'];
            var dots                   = settings['dots'];
            var autoplay               = settings['autoplay'];
            var autoplay_speed         = parseInt(settings['autoplay_speed']) || 3000;
            var animation_speed        = parseInt(settings['animation_speed']) || 300;
            var pause_on_hover         = settings['pause_on_hover'];
            var center_mode            = settings['center_mode'];
            var center_padding         = settings['center_padding'] ? settings['center_padding']+'px' : '50px';
            var rows                   = settings['rows'] ? parseInt(settings['rows']) : 0;
            var fade                   = settings['fade'];
            var focusonselect          = settings['focusonselect'];
            var vertical               = settings['vertical'];
            var infinite               = settings['infinite'];
            var rtl                    = settings['rtl'];
            var display_columns        = parseInt(settings['display_columns']) || 1;
            var scroll_columns         = parseInt(settings['scroll_columns']) || 1;
            var tablet_width           = parseInt(settings['tablet_width']) || 800;
            var tablet_display_columns = parseInt(settings['tablet_display_columns']) || 1;
            var tablet_scroll_columns  = parseInt(settings['tablet_scroll_columns']) || 1;
            var mobile_width           = parseInt(settings['mobile_width']) || 480;
            var mobile_display_columns = parseInt(settings['mobile_display_columns']) || 1;
            var mobile_scroll_columns  = parseInt(settings['mobile_scroll_columns']) || 1;
            var carousel_style_ck      = parseInt( settings['carousel_style_ck'] ) || 1;

            if( carousel_style_ck == 4 ){
                carousel_elem.slick({
                    appendArrows: '.oscar-carousel-nav'+slideid,
                    appendDots  : '.oscar-carousel-dots'+slideid,
                    arrows      : arrows,
                    prevArrow   : '<div class="oscar-carosul-prev oscar-prev"><i class="'+arrow_prev_txt+'"></i></div>',
                    nextArrow   : '<div class="oscar-carosul-next oscar-next"><i class="'+arrow_next_txt+'"></i></div>',
                    dots        : dots,
                    customPaging: function( slick,index ) {
                        var data_title = slick.$slides.eq(index).find('.oscar-data-title').data('title');
                        return '<h6>'+data_title+'</h6>';
                    },
                    infinite      : infinite,
                    autoplay      : autoplay,
                    autoplaySpeed : autoplay_speed,
                    speed         : animation_speed,
                    rows          : rows,
                    fade          : fade,
                    focusOnSelect : focusonselect,
                    vertical      : vertical,
                    rtl           : rtl,
                    pauseOnHover  : pause_on_hover,
                    slidesToShow  : display_columns,
                    slidesToScroll: scroll_columns,
                    centerMode    : center_mode,
                    centerPadding : center_padding,
                    responsive    : [
                        {
                            breakpoint: tablet_width,
                            settings  : {
                                slidesToShow  : tablet_display_columns,
                                slidesToScroll: tablet_scroll_columns
                            }
                        },
                        {
                            breakpoint: mobile_width,
                            settings  : {
                                slidesToShow  : mobile_display_columns,
                                slidesToScroll: mobile_scroll_columns
                            }
                        }
                    ]
                });
            }else{
                carousel_elem.slick({
                    appendArrows  : '.oscar-carousel-nav'+slideid,
                    appendDots    : '.oscar-carousel-dots'+slideid,
                    arrows        : arrows,
                    prevArrow     : '<div class="oscar-carosul-prev oscar-prev"><i class="'+arrow_prev_txt+'"></i></div>',
                    nextArrow     : '<div class="oscar-carosul-next oscar-next"><i class="'+arrow_next_txt+'"></i></div>',
                    dots          : dots,
                    infinite      : infinite,
                    autoplay      : autoplay,
                    autoplaySpeed : autoplay_speed,
                    speed         : animation_speed,
                    rows          : rows,
                    fade          : fade,
                    focusOnSelect : focusonselect,
                    vertical      : vertical,
                    rtl           : rtl,
                    pauseOnHover  : pause_on_hover,
                    slidesToShow  : display_columns,
                    slidesToScroll: scroll_columns,
                    centerMode    : center_mode,
                    centerPadding : center_padding,
                    responsive    : [
                        {
                            breakpoint: tablet_width,
                            settings  : {
                                slidesToShow  : tablet_display_columns,
                                slidesToScroll: tablet_scroll_columns
                            }
                        },
                        {
                            breakpoint: mobile_width,
                            settings  : {
                                slidesToShow  : mobile_display_columns,
                                slidesToScroll: mobile_scroll_columns
                            }
                        }
                    ]
                    
                });
            }

        }
    }
    /*-----------------------------
        SLICK CAROUSEL ANIMATION HANDLER
    ------------------------------*/
    var Oscar_Slider_Animation_Script = function($scope, $){

        var $sliderArea = $('.oscar-carousel-activation');
        if ($sliderArea.length) {
            $sliderArea.each(function () {
                var $this            = $(this),
                    $singleSlideElem = $this.find('.slick-slide .elementor-widget-wrap .elementor-element');
                function $slideElemAnimation() {
                    $singleSlideElem.each(function () {
                        var $this           = $(this),
                            $thisSetting    = $this.data('settings') ? $this.data('settings') : '',
                            $animationName  = $thisSetting._animation,
                            $animationDelay = $thisSetting._animation_delay;
                        $this.removeClass('animated ' + $animationName).addClass('animated fadeOut');
                        if($this.closest('.slick-slide').hasClass('slick-current')) {
                            $this.removeClass('animated fadeOut').addClass('animated ' + $animationName).css({
                                'animation-delay': $animationDelay+'s'
                            });
                        }
                    });
                }
                $slideElemAnimation();
                $this.on('afterChange', function(slick, currentSlide){
                    $slideElemAnimation();
                });
                $this.on('beforeChange', function(slick, currentSlide){
                    $slideElemAnimation();
                });
                $this.on('init', function(slick){
                    $slideElemAnimation();
                });
            });
        }
    }

     /*-------------------------------
        SLIDER VIDEO POPUP HANDLER
    --------------------------------*/
    var Slider_Video_Popup_Button_Script_Handle = function ($scope, $) {
        var video_popup  = $scope.find('.video__popup__button').eq(0);
        if(video_popup.length){

            var settings     = video_popup.data('value');
            var random_id    = settings['random_id'] ? parseInt(settings['random_id']) : 4521;
            var channel_type = settings['channel_type'];
            var videoModal   = $("#video__popup__button" + random_id);
            $('.video__popup__button').modalVideo({
                channel: channel_type
            });
        }
    }
	$(window).on('elementor/frontend/init', function () {
        /*Main Banner*/
        elementorFrontend.hooks.addAction( 'frontend/element_ready/Oscar_Welcome_Slides_Widget.default', Slick_Carousel_Script_Handle );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/Oscar_Welcome_Slides_Widget.default', Slider_Video_Popup_Button_Script_Handle );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/Oscar_Welcome_Slides_Widget.default', Oscar_Slider_Animation_Script );
        /*Timeline Slider*/
        elementorFrontend.hooks.addAction( 'frontend/element_ready/Oscar_Timeline_Slides_Widget.default', Slick_Carousel_Script_Handle );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/Oscar_Post_Carousel.default', Slick_Carousel_Script_Handle );

    });

})(jQuery);