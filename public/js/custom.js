/*
 *	Name:		theLAW | HTML5 Template
 *	Version:	1.0
 *	Authors:	ThemeTor
 *	websites:	http://ThemeTor.com
 *
 *	Copyright (c) 2015 ThemeTor
 *	All rights reserved
 */
jQuery.fn.liScroll = function(settings) {
    settings = jQuery.extend({
        travelocity: 0.07
    }, settings);
    return this.each(function() {
        var $strip = jQuery(this);
        $strip.addClass("newsticker")
        var stripWidth = 1;
        $strip.find("li").each(function(i) {
            stripWidth += jQuery(this, i).outerWidth(true); // thanks to Michael Haszprunar and Fabien Volpi
        });
        var $mask = $strip.wrap("<div class='mask'></div>");
        var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");
        var containerWidth = $strip.parent().parent().width();	//a.k.a. 'mask' width
        $strip.width(stripWidth);
        var totalTravel = stripWidth + containerWidth;
        var defTiming = totalTravel / settings.travelocity;	// thanks to Scott Waye
        function scrollnews(spazio, tempo) {
            $strip.animate({left: '-=' + spazio}, tempo, "linear", function() {
                $strip.css("left", containerWidth);
                scrollnews(totalTravel, defTiming);
            });
        }
        scrollnews(totalTravel, defTiming);
        $strip.hover(function() {
            jQuery(this).stop();
        },
                function() {
                    var offset = jQuery(this).offset();
                    var residualSpace = offset.left + stripWidth;
                    var residualTime = residualSpace / settings.travelocity;
                    scrollnews(residualSpace, residualTime);
                });
    });
};
jQuery(document).ready(function($) {

    function mycarousel4_initCallback(e) {
        e.buttonNext.hover(function() {
            e.stopAuto()
        }, function() {
            e.startAuto()
        });
        e.buttonPrev.hover(function() {
            e.stopAuto()
        }, function() {
            e.startAuto()
        });
        e.clip.hover(function() {
            e.stopAuto()
        }, function() {
            e.startAuto()
        })
    }
    ;
    "use strict";
    jQuery.browser = {};
    (function() {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();

    $('.sf-menu').find('.current-menu-item,.current-menu-parent,.current-menu-ancestor').addClass('selectedLava');

    // Superfish
    if ($(".sf-menu")[0]) {
        $('.sf-menu').superfish({
            delay: 100,
            animation: {
                opacity: 'show', height: 'show'
            },
            speed: 300
        }).lavaLamp({
            fx: "easeOutExpo",
            speed: 600
        });
    }
    // ExtraInfo
    if ($(".extrabox")[0]) {
        (function($) {
            $.fn.clickToggle = function(func1, func2) {
                var funcs = [func1, func2];
                this.data('toggleclicked', 0);
                this.click(function() {
                    var data = $(this).data();
                    var tc = data.toggleclicked;
                    $.proxy(funcs[tc], this)();
                    data.toggleclicked = (tc + 1) % 2;
                });
                return this;
            };
        }(jQuery));

        var DropHeight = jQuery('.extrabox').height();
        jQuery('.extrabox').css("top", "-" + DropHeight + "px");
        jQuery('.arrow-down').clickToggle(function() {
            var DropHeight = jQuery('.extrabox').height();
            jQuery(this).addClass('opened');
            jQuery('.extrabox').animate({'top': 0}, {duration: '800', easing: 'easeInOutExpo'});
            jQuery('.arrow-down i').removeClass('icon-angle-down').addClass('icon-angle-up');
            jQuery('.page-content, .sliderr, .headdown, .head, .breadcrumb, footer').animate({'opacity': 0.5}, {duration: '2000', easing: 'easeInOutExpo'});
        }, function() {
            var DropHeight = jQuery('.extrabox').height();
            jQuery(this).removeClass('opened');
            jQuery('.extrabox').animate({'top': -DropHeight}, {duration: '800', easing: 'easeInOutExpo'});
            jQuery('.arrow-down i').addClass('icon-angle-down').removeClass('icon-angle-up');
            jQuery('.page-content, .sliderr, .headdown, .head, .breadcrumb, footer').animate({'opacity': 1}, {duration: '2000', easing: 'easeInOutExpo'});
        });
    }



    // Tipsy
    $('.toptip').tipsy({fade: true, gravity: 's', opacity: 1});
    $('.bottomtip').tipsy({fade: true, gravity: 'n', opacity: 1});
    $('.righttip').tipsy({fade: true, gravity: 'w', opacity: 1});
    $('.lefttip').tipsy({fade: true, gravity: 'e', opacity: 1});
    $('#wrap_flickr img').tipsy({fade: true, gravity: 's', opacity: 1});

    // Blog Gallery Slider
    if ($(".projectslider")[0]) {
        jQuery('.projectslider').flexslider({
            animation: "fade",
            direction: "horizontal",
            slideshowSpeed: 8000,
            animationSpeed: 1000,
            directionNav: true,
            controlNav: false,
            pauseOnHover: true,
            initDelay: 0,
            randomize: false,
            smoothHeight: true,
            keyboardNav: false
        });
    }


    // Tabs
    var tabs = jQuery('ul.tabs');
    tabs.each(function(i) {
        // get tabs
        var tab = jQuery(this).find('> li > a');
        tab.click(function(e) {
            // get tab's location
            var contentLocation = jQuery(this).attr('href');
            // Let go if not a hashed one
            if (contentLocation.charAt(0) === "#") {
                e.preventDefault();
                // add class active
                tab.removeClass('active');
                jQuery(this).addClass('active');
                // show tab content & add active class
                jQuery(contentLocation).fadeIn(500).addClass('active').siblings().hide().removeClass('active');
            }
        });
    });


    // Accordion
    jQuery("ul.tt-accordion li").each(function() {
        if (jQuery(this).index() > 0) {
            jQuery(this).children(".accordion-content").css('display', 'none');
        } else {

            jQuery(this).addClass('active').find(".accordion-head-sign").append("<i class='icon-minus-sign'></i>");
            jQuery(this).siblings("li").find(".accordion-head-sign").append("<i class='icon-plus-sign'></i>");

        }
        jQuery(this).children(".accordion-head").bind("click", function() {
            jQuery(this).parent().addClass(function() {
                if (jQuery(this).hasClass("active")) {
                    return;
                }
                {
                    return "active";
                }
            });

            jQuery(this).siblings(".accordion-content").slideDown();
            jQuery(this).parent().find(".accordion-head-sign i").addClass("icon-minus-sign").removeClass("icon-plus-sign");
            jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
            jQuery(this).parent().siblings("li").removeClass("active");
            jQuery(this).parent().siblings("li").find(".accordion-head-sign i").removeClass("icon-minus-sign").addClass("icon-plus-sign");

        });
    });


    // Toggle
    jQuery("ul.tt-toggle li").each(function() {
        jQuery(this).children(".toggle-content:not(.open)").css('display', 'none');
        jQuery(this).find(".toggle-head-sign:not(.open)").html("&#43;");
        jQuery(this).children(".toggle-head").bind("click", function() {
            if (jQuery(this).parent().hasClass("active")) {
                jQuery(this).parent().removeClass("active");
            } else {
                jQuery(this).parent().addClass("active");
            }
            jQuery(this).find(".toggle-head-sign").html(function() {
                if (jQuery(this).parent().parent().hasClass("active")) {
                    return "&minus;";
                } else {
                    return "&#43;";
                }
            });
            jQuery(this).siblings(".toggle-content").slideToggle();
        });
    });


    jQuery("ul.tt-toggle").find(".toggle-content.active").siblings(".toggle-head").trigger('click');


    // 4Mob
    $("#header nav").before('<div id="mobilepro"><i class="icon-reorder icon-remove"></i></div>');
    if ($("body.isrtl")[0]) {
        $("#header .sf-menu a.sf-with-ul").before('<div class="subarrow"><i class="icon-angle-left"></i></div>');
    } else {
        $(".sf-menu a.sf-with-ul").before('<div class="subarrow"><i class="icon-angle-right"></i></div>');
    }
    $('.subarrow').click(function() {
        $(this).parent().toggleClass("xpopdrop");
    });
    $('#mobilepro').click(function() {
        $('#header .sf-menu').slideToggle('slow', 'easeInOutExpo').toggleClass("xactive");
        $("#mobilepro i").toggleClass("icon-reorder");
    });
    $("body").click(function() {
        $('#header .xactive').slideUp('slow', 'easeInOutExpo').removeClass("xactive");
        $("#mobilepro i").addClass("icon-reorder");
    });
    $('#mobilepro, .sf-menu').click(function(e) {
        e.stopPropagation();
    });
    function checkWindowSize() {
        if ($(window).width() >= 960) {
            $('#header .sf-menu').css('display', 'block').removeClass("xactive");
        } else {
            $('#header .sf-menu').css('display', 'none');
        }
    }
    $(window).load(checkWindowSize);
    $(window).resize(checkWindowSize);
    // ToTop
    jQuery('#toTop').click(function() {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 1000);
    });
    jQuery("#toTop").addClass("hidett");
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() < 400) {
            jQuery("#toTop").addClass("hidett").removeClass("showtt");
        } else {
            jQuery("#toTop").removeClass("hidett").addClass("showtt");
        }
    });

    // Notification
    $(".notification-close").click(function() {
        $(this).parent().slideUp("slow");
        return false;
    });

    // quicksand
    if ($(".filter")[0]) {
        var $portfolioClone = $(".portfolio").clone();
        $(".filter a").click(function(e) {
            $(".filter li").removeClass("current");
            var $filterClass = $(this).parent().attr("class");
            if ($filterClass == "all") {
                var $filteredPortfolio = $portfolioClone.find("li");
            } else {
                var $filteredPortfolio = $portfolioClone.find("li[data-type~=" + $filterClass + "]");
            }

            // Call quicksand
            $(".portfolio").quicksand($filteredPortfolio, {
                duration: 800,
                useScaling: 'true',
                easing: 'easeInOutCubic',
                adjustHeight: 'dynamic'
            }, function() {
                _lightbox();
                _hoverFX();
                _portfolioHeight();
                if ($(".portfolio.msnry")[0]) {
                    var msnry = $(".portfolio.msnry");
                    _msnry(msnry);
                }
            });
            $(this).parent().addClass("current");
            e.preventDefault();
        });

    }


    var isDesktop = (function() {
        return !('ontouchstart' in window) // works on most browsers
                || !('onmsgesturechange' in window); // works on ie10
    })();
    window.isDesktop = isDesktop;
    if (isDesktop) {
        if ($(".animated")[0]) {
            jQuery('.animated').css('opacity', '0');
        }
        jQuery('.animt').each(function() {
            var $curr = jQuery(this);
            var $currOffset = $curr.attr('data-gen-offset');
            if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
                $currOffset = 'bottom-in-view';
            }
            $curr.waypoint(function() {
                $curr.trigger('animt');
            }, {
                triggerOnce: true,
                offset: $currOffset
            });
        });
        jQuery('.animated').each(function() {
            var $curr = jQuery(this);
            $curr.bind('animt', function() {
                $curr.css('opacity', '');
                $curr.addClass($curr.data('gen'));
            });
        });
        jQuery('.animated').each(function() {
            var $curr = jQuery(this);
            var $currOffset = $curr.attr('data-gen-offset');
            if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
                $currOffset = 'bottom-in-view';
            }
            $curr.waypoint(function() {
                $curr.trigger('animt');
            }, {
                triggerOnce: true,
                offset: $currOffset
            });
        });
    }
    // Progress Load
    if ($(".progress-bar > span")[0]) {
        $('.progress-bar > span').waypoint(function() {
            $(this).each(function() {
                $(this).animate({
                    width: $(this).attr('rel') + "%"
                }, 800);
            });
        }, {
            triggerOnce: true,
            offset: 'bottom-in-view'
        });
    }


    if (isDesktop) {
        $.stellar({
            horizontalScrolling: false,
            verticalOffset: 0
        });
    }



    // Sticky
    if ($(".my_sticky")[0]) {
        $('.my_sticky').before('<div class="Corpse_Sticky"></div>');
        var isAdmin = $('#wpadminbar').height();
        $(window).scroll(function() {
            var offset = $(window).scrollTop();
            var window_width = $(window).width();
            var head_w = $('.my_sticky').height();
            if (window_width >= 959) {
                if (offset < 200) {
                    if ($('.my_sticky').data('sticky') === true) {
                        $('.my_sticky').data('sticky', false);
                        $('.my_sticky').stop(true).animate({opacity: 0}, 300, function() {
                            $('.my_sticky').removeClass('sticky').css('padding-top', '');
                            $('.my_sticky').stop(true).animate({opacity: 1}, 300);
                            $('.Corpse_Sticky').css('padding-top', '');
                        });
                    }
                } else {
                    if ($('.my_sticky').data('sticky') === false || typeof $('.my_sticky').data('sticky') === 'undefined') {
                        $('.my_sticky').data('sticky', true);
                        $('.my_sticky').stop(true).animate({opacity: 0}, 300, function() {
                            $('.my_sticky').addClass('sticky').css('padding-top', isAdmin + 'px');
                            $('.my_sticky.sticky').stop(true).animate({opacity: 1}, 300);
                            $('.Corpse_Sticky').css('padding-top', head_w + 'px');
                        });
                    }
                }
            }
        });

        $(window).resize(function() {
            var window_width = $(window).width();
            if (window_width <= 959) {
                if ($('.my_sticky').hasClass('sticky')) {
                    $('.my_sticky').removeClass('sticky');
                    $('.my_sticky').stop(true).animate({opacity: 0}, 300, function() {
                        $('.my_sticky').removeClass('sticky');
                        $('.my_sticky').stop(true).animate({opacity: 1}, 300);
                        $('.Corpse_Sticky').css('padding-top', '');
                    });
                }
            }
        });
    }

    //Set Portfolio Height
    try {
        $('ul.portfolio').each(function() {
            var pr = $(this);
            pr.imagesLoaded(function() {

                var mh = 0;
                pr.find('li').each(function() {
                    var h = jQuery(this).height();
                    if (h >= mh) {
                        mh = h;
                    }
                });
                pr.not('.msnry').find('li').height(mh);
            });
        });

    } catch (e) {
    }


    //Set shop items Height
    try {

        $('ul.products').each(function() {
            var pr = $(this);
            pr.imagesLoaded(function() {
                var mh = 0;
                pr.find('li.product').each(function() {
                    var h = $(this).height();
                    if (h >= mh) {
                        mh = h;
                    }
                });

                pr.find('li.product').height(mh);

            });
        });
    } catch (e) {
    }

    //Set shop items Height
    try {
        $('.owl-carousel').each(function() {
            var owl = $(this);
            owl.imagesLoaded(function() {
                var mh = 0;
                owl.find('.uowl').each(function() {
                    ;
                    var h = $(this).height();
                    if (h >= mh) {
                        mh = h;
                    }
                });
                owl.find('.uowl').height(mh - 5);
            });
        });
    } catch (e) {
    }

    //Set Min-Height for Tour Tabs
    try {
        var th = jQuery('.tt_tour .tt_tabs_nav').height();
        th++;
        jQuery('.tt_tour .tt_tab').each(function() {
            jQuery(this).css('min-height', th);
        });
    } catch (e) {
    }


    // Progress Bar
    try {
        jQuery('.tt_progress_bar').waypoint(function() {
            jQuery(this).find('.tt_single_bar').each(function(index) {
                var $this = jQuery(this),
                        bar = $this.find('.tt_bar'),
                        val = bar.data('percentage-value');

                setTimeout(function() {
                    bar.css({"width": val + '%'});
                }, index * 200);
            });
        }, {offset: '85%'});
    } catch (e) {
    }



    _hoverFX();
    _lightbox();


});


function _hoverFX() {
    jQuery('.hover-fx').each(function() {
        var u = jQuery(this);
        u.hover(
                function() {
                    var w = u.width();
                    var h = u.height();
                    u.children('.fLeft').css('top', (h / 2 - 20) + 'px').css('left', (w / 2 - 42) + 'px');
                    u.children('.fLeft.cntr').css('left', (w / 2 - 20) + 'px');
                    u.children('.fRight').css('bottom', (h / 2 - 20) + 'px').css('left', (w / 2 + 2) + 'px');
                }, function() {
            u.children('.fLeft').css('top', '').css('left', '');
            u.children('.fRight').css('bottom', '').css('left', '');
        }
        );
    });

}

function _portfolioHeight() {
    jQuery('ul.portfolio').each(function() {
        var pr = jQuery(this);
        var mh = 0;
        pr.find('li').each(function() {
            var h = jQuery(this).height();
            if (h >= mh) {
                mh = h;
            }
        });
        pr.not('.msnry').find('li').height(mh);
    });
}

/* jPlayer */
function js_audioPlayer(l, f) {
    jQuery("#" + l).jPlayer({
        ready: function() {
            jQuery(this).jPlayer("setMedia", {
                mp3: f
            });
        },
        swfPath: "js",
        supplied: "mp3",
        wmode: "window",
        smoothPlayBar: true,
        cssSelectorAncestor: "#int" + l,
        keyEnabled: true
    });
    return;
}


/* Lightbox */
function _lightbox() {
    var lbarray = {
        animation_speed: 'fast',
        overlay_gallery: true,
        autoplay_slideshow: false,
        slideshow: 5000,
        theme: 'pp_default',
        opacity: 0.8,
        show_title: false,
        allow_resize: true,
        counter_separator_label: ' of ',
        deeplinking: false,
        default_width: 900,
        default_height: 500,
    };

    var slctr = 'a[data-gal^="photo"],a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img), a[class^="prettyPhoto"]';
    jQuery(slctr).prettyPhoto();

    var windowWidth = window.screen.width < window.outerWidth ? window.screen.width : window.outerWidth;
    var issmall = windowWidth < 500;
    if (issmall) {
        jQuery(slctr).unbind('click.prettyphoto');
    }

}



/* Extra Panel Google Map */

jQuery(function($) {

    if (!$(".ajax-loader")[0]) {
        var str = '<img class="ajax-loader hide" src="images/ajax-loader.gif" alt="Sending ..." /><div class="message hide"></div>';
        if ($("#contactform")[0]) {
            $('#contactform').append(str);
        }
        if ($("#quickcontact")[0]) {
            $('#quickcontact').append(str);
        }
        if ($("#faqform")[0]) {
            $('#faqform').append(str);
        }
        if ($("#freeform")[0]) {
            $('#freeform').append(str);
        }

    }

    // Ajax Contact Form in contact.html and contact2.html
    $('#contactform').submit(function() {
        var action = $(this).attr('action');
        $('#contactform #submit').attr('disabled', 'disabled');
        $('#contactform .ajax-loader').show();

        $.post(action, {
            yourname: $('#contactform #your-name').val(),
            youremail: $('#contactform #your-email').val(),
            yoursubject: $('#contactform #your-subject').val(),
            yourmessage: $('#contactform #your-message').val()
        },
                function(data) {
                    $('#contactform .message').html(data).show();
                    $('#contactform .ajax-loader').fadeOut(300);
                    $('#contactform #submit').removeAttr('disabled');
                    if (data.match('success') != null) {
                        $('#contactform').trigger("reset").find('p').slideUp();
                    }
                    ;
                });

        return false;
    });


    // Ajax Quick Contact Form in Top Extra Panel
    $('#quickcontact').submit(function() {
        var action = $(this).attr('action');
        $('#quickcontact .ttcf7-submit').attr('disabled', 'disabled');
        $('#quickcontact .ajax-loader').show();

        $.post(action, {
            youremail: $('#quickcontact #your-email').val(),
            yourmessage: $('#quickcontact #your-message').val()
        },
                function(data) {
                    $('#quickcontact .message').html(data).show();
                    $('#quickcontact .ajax-loader').fadeOut(300);
                    $('#quickcontact .ttcf7-submit').removeAttr('disabled');
                    if (data.match('success') != null) {
                        $('#quickcontact').trigger("reset").find('p').slideUp();
                    }
                    ;
                });

        return false;
    });



    // Ajax FAQ Form
    $('#faqform').submit(function() {
        var action = $(this).attr('action');
        $('#faqform .ttcf7-submit').attr('disabled', 'disabled');
        $('#faqform .ajax-loader').show();

        $.post(action, {
            yourname: $('#faqform #your-name').val(),
            youremail: $('#faqform #your-email').val(),
            department: $('#faqform #department').val(),
            yourmessage: $('#faqform #your-message').val()
        },
                function(data) {
                    $('#faqform .message').html(data).show();
                    $('#faqform .ajax-loader').fadeOut(300);
                    $('#faqform .ttcf7-submit').removeAttr('disabled');
                    if (data.match('success') != null) {
                        $('#faqform').trigger("reset").find('p').slideUp();
                    }
                    ;
                });

        return false;
    });

    // Ajax Free Consultation Form
    $('#freeform').submit(function() {
        var action = $(this).attr('action');
        $('#freeform .ttcf7-submit').attr('disabled', 'disabled');
        $('#freeform .ajax-loader').show();

        $.post(action, {
            yourname: $('#freeform #your-name').val(),
            youremail: $('#freeform #your-email').val(),
            department: $('#freeform #department').val(),
            yourmessage: $('#freeform #your-message').val()
        },
                function(data) {
                    $('#freeform .message').html(data).show();
                    $('#freeform .ajax-loader').fadeOut(300);
                    $('#freeform .ttcf7-submit').removeAttr('disabled');
                    if (data.match('success') != null) {
                        $('#freeform').trigger("reset").find('p').slideUp();
                    }
                    ;
                });

        return false;
    });

});
