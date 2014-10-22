$=jQuery;

jQuery(document).ready(function($) {
    jQuery('.footer .widget_nav_menu').addClass('widget_pages').removeClass('widget_nav_menu');
    
	// custom select and inputs
	var params = {
        changedEl: ".select_styled",
        visRows: 10,
        scrollArrows: true
    }
    cuSel(params);
	if ($("div,p").hasClass("input_styled")) {
		$('.input_styled input').customInput();
	}	
	// show search form with fadein
	$(".form_search").animate({opacity:1}, 1500);
	
	// Topmenu <ul> replace to <select>, only for Mobiles
	var screenRes = $(window).width(); 
	   if (screenRes < 700) {
		  
		  var mainNavigation = $('.topmenu').clone();
		  /* Replace unordered list with a "select" element to be populated with options, and create a variable to select our new empty option menu */
		  $('.topmenu').html('<select class="select_styled" id="topm-select"></select>');
		  var selectMenu = $('#topm-select');

		  /* Navigate our nav clone for information needed to populate options */
		  $(mainNavigation).children('ul').children('li').each(function() {
			 /* Get top-level link and text */
			 var href = $(this).children('a').attr('href');
			 var text = $(this).children('a').text();
			 
			 /* Append this option to our "select" */
			if ($(this).is(".current-menu-item") && href != '#') {				 
				$(selectMenu).append('<option value="'+href+'" selected>'+text+'</option>');			
			} else if ( href == '#' ) {				 
				$(selectMenu).append('<option value="'+href+'" disabled="disabled">'+text+'</option>');
			} else {
				$(selectMenu).append('<option value="'+href+'">'+text+'</option>');
			}

			 /* Check for "children" and navigate for more options if they exist */
			 if ($(this).children('ul').length > 0) {
				$(this).children('ul').children('li').each(function() {
				
				   var href2 = $(this).children('a').attr('href');
				   var text2 = $(this).children('a').text();

					/* Append this option to our "select" */
					if ($(this).is(".current-menu-item") && href2 != '#') {				 
						$(selectMenu).append('<option value="'+href2+'" selected> - '+text2+'</option>');
					} else if ( href2 == '#' ) {				 
						$(selectMenu).append('<option value="'+href2+'" disabled="disabled"># '+text2+'</option>');
					} else {
						$(selectMenu).append('<option value="'+href2+'"> - '+text2+'</option>');
					}
					
					/* Check for "children" and navigate for more options if they exist */
					 if ($(this).children('ul').length > 0) {
						$(this).children('ul').children('li').each(function() {
						
						   var href3 = $(this).children('a').attr('href');
						   var text3 = $(this).children('a').text();

						   /* Append this option to our "select" */
						   if ($(this).is(".current-menu-item")) {				 
								$(selectMenu).append('<option value="'+href3+'" class="select-current" selected> -- '+text3+'</option>');
							} else {
								$(selectMenu).append('<option value="'+href3+'"> -- '+text3+'</option>');
							}											   
						});
					 }									   
				});
			 }			
		  });
	   }
	   /* When our select menu is changed, change the window location to match the value of the selected option. */
	   $(selectMenu).change(function() {
		  location = this.options[this.selectedIndex].value;
	   });
	   
		// Search Advanced
		$(".search_main").css({'overflow':'inherit'});
		if (!$(".search_main").hasClass("search_open")) {
			$(".search_main .rowHide").hide(); // fix for range-slider
		}
		if( !parseInt($('input[name=search_advanced]').val()) ){							
			$(".search_main .rowHide").css('opacity','0').slideUp(function(){ $(this).css('opacity','1'); });							
		}
		$("#search_advanced").click(function(){
			if ($(this).closest(".search_main").hasClass("search_open")) {
				if (screenRes < 480) {
					$(".search_main").stop().animate({height:'315px'},{queue:false, duration:350});
				} else if (screenRes < 750) {
					$(".search_main").stop().animate({height:'370px'},{queue:false, duration:350});
				} else {
					$(".search_main, .search_col_1, .search_col_2, .search_col_3").stop().animate({height:'155px'},{queue:false, duration:350});
				}								
				$(".search_main .rowHide").slideUp(200);
				$('input[name=search_advanced]').val('0')
			} else {
				if (screenRes < 480) {
					$(".search_main").stop().animate({height:'438px'},{queue:false, duration:350});
				} else if (screenRes < 750) {
					$(".search_main").stop().animate({height:'356px'},{queue:false, duration:250});
				} else {
					$(".search_main, .search_col_1, .search_col_2, .search_col_3").stop().animate({height:'500px'},{queue:false, duration:350});
				}								
				$(".search_main .rowHide").slideDown(300);
				$('input[name=search_advanced]').val('1');


			}
			$(this).closest(".search_main").toggleClass("search_open");
			$("#square_range").slider({ 
                                from: 0,
                                to: 10000,
                                scale: ['0','1000','2000','3000','5000','7500','>10000'],
                                heterogeneity: ['50/3000'],
                                limits: false, 
                                step: 100,
                                smooth: true,                               
                                skin: "round_gold"
                        }); 
		});	
		

  	$("a").each(function() {
		$(this).attr("hideFocus", "true").css("outline", "none");
	});
	
// Dropdown menu
	$(".dropdown ul").parent("li").addClass("parent");
	$(".dropdown li:first-child, .pricing_box li:first-child").addClass("first");
	$(".dropdown li:last-child, .pricing_box li:last-child").addClass("last");
	$(".dropdown li:only-child").removeClass("last").addClass("only");	
	$(".dropdown .current-menu-item, .dropdown .current-menu-ancestor").prev().addClass("current-prev");		

	$("ul.tabs").tabs("> .tabcontent", {
		tabs: 'li', 
		effect: 'fade'
	});

// odd and even elements	
	$(".recent_posts li:odd, .popular_posts li:odd").addClass("odd");
	$(".widget_recent_comments li:even, .widget_recent_entries li:even, .widget_twitter .tweet_item:even, .widget_archive li:even, .table-pricing tr:even").addClass("even");
	
// cols
	$(".row .col:first-child").addClass("alpha");
	$(".row .col:last-child").addClass("omega"); 	

// toggle content
	$(".toggle_content").hide();
	$(".toggle").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});	
	$(".toggle").click(function(){
		$(this).next(".toggle_content").slideToggle(300,'easeInQuad');
	});

// pricing
	$(".pricing_box li.price_col").css('width',$(".pricing_box ul").width() / $(".pricing_box li.price_col").size());

// buttons	
	if (!$.browser.msie) {
		$(".button_link, .button_styled, .btn-share, .tf_pagination .page_prev, .tf_pagination .page_next").hover(function(){
			$(this).stop().animate({"opacity": 0.85});
		},function(){
			$(this).stop().animate({"opacity": 1});
		});
	}
	
// preload images
	var cache_i = [];
	$.preLoadImages = function() {
		var args_len = arguments.length;
		for (var i = args_len; i--;) {
		  var cacheImage = document.createElement('img');
		  cacheImage.src = arguments[i];
		  cache_i.push(cacheImage);
		}	
	}
	$.preLoadImages(
	"images/dropdown_sprite.png",
	"images/dropdown_sprite2.png",
	"images/opacity_gray_90.png");

// tooltips
	if ($("a,span,div").hasClass("tooltip")) {
		$('.tooltip[title]').qtip({
			position: {
				my: 'bottom center',
				at: 'top center',
				adjust: {y: -1 }
			},
			style: {
				classes: 'ui-tooltip-dark ui-tooltip-rounded'
			}
		});
	}	
// prettyPhoto runs only when <a> has "data-rel" and hide for Mobiles
	if($('a').is('[data-rel]') && screenRes > 600) {
        $('a[data-rel]').each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});
		$("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});	
    }

});

function hide_slider_arrows() {
    jQuery('.jcarousel-prev-vertical, .jcarousel-next').css("display","none;");
    console.log("wwww");
}