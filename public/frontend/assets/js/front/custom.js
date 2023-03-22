/*--------------------- Copyright (c) 2018 -----------------------
[Master Javascript]
Theme -miraculous - Multi-Vendor Music Streaming Laravel Script
Version: 1.0.0
Assigned to: Theme Forest
-------------------------------------------------------------------*/
(function($) {
    "use strict";
    var music = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function() {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
          
            this.RTL();
            this.Menu();
            this.Player_close();
            this.Popup();
            // this.Slider();
            this.More();
            this.Nice_select();
            this.showPlayList();
            this.volume();
        },
      
        RTL: function() {
            var rtl_attr = $("html").attr('dir');
            if (rtl_attr) {
                $('html').find('body').addClass("rtl");
            }
        },
        
        Menu: function() {
            $(".ms_nav_close").on('click', function() {
                $(".ms_sidemenu_wrapper").toggleClass('open_menu');
            });
            
            $(".play-left-arrow").on('click', function() {
                $(".player_left").toggleClass('open_list');
            });
            
            $(".ms_admin_name").on('click', function() {
                $(".pro_dropdown_menu").toggleClass("open_dropdown");
            });
            
            
            $(".btn_notification").on('click', function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: baseURL+'/readNotification',
                    success: function(response){
                    
                    }
                });
                $(".noti_dropdown_menu").toggleClass("open_dropdown");                
            });
            
        },
        
        Player_close: function() {
            $(".ms_player_close").on('click', function() {
                $(".ms_player_wrapper").toggleClass("close_player");
                $("body").toggleClass("main_class");
                $('.gotop').toggleClass('extr_top');
            })
        },
        
        Popup: function() {
            $('.clr_modal_btn a').on('click', function() {
                $('#clear_modal').hide();
                $('.modal-backdrop').hide();
                $('body').removeClass("modal-open").css("padding-right", "0px");
            })
            $('.hideCurrentModel').on('click', function() {
                $(this).closest('.modal-content').find('.form_close').trigger('click');
            });
           
            $('.lang_list').find("input[type=checkbox]").on('change', function() {
                if ($('.lang_list').find("input[type=checkbox]:checked").length) {
                    $('.ms_lang_popup .modal-content').addClass('add_lang');
                } else {
                    $('.ms_lang_popup .modal-content').removeClass('add_lang');
                }
            });
        },
        
        
        More: function() {
            $(".ms_more_icon").on('click', function(e) {
                
                e.stopImmediatePropagation();
                if (typeof $(this).attr('data-other') != 'undefined') {
                    var target = $(this).parent().parent();
                } else {
                    var target = $(this).parent();
                }
                if (target.find("ul.more_option").hasClass('open_option')) {
                    target.find("ul.more_option").removeClass('open_option');
                } else {
                    $("ul.more_option.open_option").removeClass('open_option');
                    target.find("ul.more_option").addClass('open_option');
                }
            });
            $(document).on("click", function(e) {
                $("ul.more_option.open_option").removeClass("open_option");
            })
            
            $(".ms_btn.play_btn").on('click', function() {
                $('.ms_btn.play_btn').toggleClass('btn_pause');
            });
            $(document).on('click', '#playlist-wrap ul li .action .que_more', function(e) {
				
                e.stopImmediatePropagation();
                $('#playlist-wrap ul li .action .que_more').not($(this)).closest('li').find('.more_option').removeClass('open_option');
                $(this).closest('li').find('.more_option').toggleClass('open_option');
            });
           
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#playlist-wrap').length && !$(e.target).closest('.jp_queue_wrapper').length && !$(e.target).closest('.player_left').length) {
                    $('#playlist-wrap').hide();
                }
                
                if (!$(e.target).closest('.more_option').length && !$(e.target).closest('.action').length) {
                    $('#playlist-wrap .more_option').removeClass('open_option');
                }
            });
            
            $('.jp_queue_cls').on('click', function(e) {
                $('#playlist-wrap').hide();
            });

        },
       
        Nice_select: function() {
            if ($('.custom_select').length > 0) {
                $('.custom_select select').niceSelect();
            }
        },
        showPlayList: function() {
            $(document).on('click', '#myPlaylistQueue', function() {
                $('#playlist-wrap').fadeToggle();
            });
            $('#playlist-wrap').on('click', '#myPlaylistQueue', function(event) {
                event.stopPropagation();
            });
        },

        
        volume: function() {
            $(".knob-mask .knob").css("transform", "rotateZ(270deg)");
            $(".knob-mask .handle").css("transform", "rotateZ(270deg)");

        }
    };
    $(document).ready(function() {
        music.init();
        if($('.ms_album_slider').length)
            swiperSlider({'previewCount' : 6, 'class':'ms_album_slider','breakPoint':4})

        if($('.ms_dashboard_slider').length){
            var dashboardSlider = new Swiper('.ms_dashboard_slider.swiper-container', { 
                autoHeight: true, //enable auto height
                navigation: {
                    nextEl: '.swiper-button-next3',
                    prevEl: '.swiper-button-prev3',
                },
            })
        }

        if($('.ms_release_slider').length)
            swiperSlider({'previewCount' : 4, 'class':'ms_release_slider', 'breakPoint':3})
        
        
        if($('.ms_testimonial_slider').length)
            swiperSlider1({'previewCount' : 2, 'class':'ms_testimonial_slider', 'breakPoint':1})

        
		
		$(".ms_nav_wrapper").mCustomScrollbar({
			theme:"minimal"
		});
		
		
		$(".jp_queue_list_inner").mCustomScrollbar({
			theme:"minimal",
			setHeight:345
        });
        
        $(".lyric_show").on('click', function() {
            $('.lyric_box').toggleClass('box_open_dv');
        });
        $(".close_lyric").on('click', function() {
            $(this).parent().removeClass('box_open_dv');
        });
    });

    function swiperSlider(param){
        var swiper = new Swiper('.'+param.class+'.swiper-container', {
            slidesPerView: param.previewCount,
            spaceBetween: 30,
            loop: false,
            speed: 1500,
            navigation: {
                nextEl: '.swiper-button-next1',
                prevEl: '.swiper-button-prev1',
            },
            breakpoints: {
                1800: {
                    slidesPerView: 4,
                },
                1400: {
                    
                    slidesPerView: param.breakPoint,
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                480: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                375: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                }
            },
        });
    }

    function swiperSlider1(param){
        var swiper = new Swiper('.'+param.class+'.swiper-container', {
            slidesPerView: param.previewCount,
            spaceBetween: 30,
            loop: false,
            speed: 1500,
            navigation: {
                nextEl: '.swiper-button-next1',
                prevEl: '.swiper-button-prev1',
            },
            breakpoints: {
                1800: {
                    slidesPerView: 2,
                },
                1400: {
                    
                    slidesPerView: param.breakPoint,
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                480: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                375: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                }
            },
        });
    }

    
    jQuery(window).on('load', function() {
        setTimeout(function() {
            $('body').addClass('loaded');
        }, 500);
       
        if ($('.jp-playlist ul li').length > 3) {
            $('.jp-playlist').addClass('find_li');
        }
    });
   
    $(window).scroll(function() {
        var wh = window.innerWidth;
        
        if ($(this).scrollTop() > 100) {
            $('.gotop').addClass('goto');
        } else {
            $('.gotop').removeClass('goto');
        }
    });
    $(".gotop").on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false
    });
})(jQuery);