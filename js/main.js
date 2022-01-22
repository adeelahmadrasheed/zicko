(function($) {
	"use strict";
	
	/* 
	** Add Click On Ipad 
	*/
	$(window).resize(function(){
		var $width = $(this).width();
		if( $width < 1199 ){
			$( '.primary-menu .nav .dropdown-toggle'  ).each(function(){
				$(this).attr('data-toggle', 'dropdown');
			});
		}
	});
	
	/*
	** Blog Masonry
	*/
	$(window).load(function() {
		$('body').find('.blog-content-grid').isotope({ 
			layoutMode : 'masonry'
		});
		
	});
	
	/*
	** Search on click
	*/

	$('.search-cate .search-tog').on('click', function(){
		$('.search-cate .furnihome_top').slideToggle();
		$('.search-cate .search-tog').toggleClass('open');
	});

	$('.main-menu .header-close').on('click', function(){
		$('.main-menu').removeClass("open");
	});
	$('.header-open').on('click', function(){
		$('.main-menu').toggleClass("open");
	});
	/*
	**  show menu mobile
	*/
	$('.header-menu-categories .open-menu').on('click', function(){
		$('.main-menu').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-search a').on('click', function(){
		$('.top-form.top-search').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-more a').on('click', function(){
		$('.menu-item-hidden').toggleClass("open");
	});
	
	/*
	** js mobile
	*/
	$('.single-product.mobile-layout .social-share .title-share').on('click', function(){
		$('.single-product.mobile-layout .social-share').toggleClass("open");
	});
	$('.single-post.mobile-layout .social-share .title-share').on('click', function(){
		$('.single-post.mobile-layout .social-share').toggleClass("open");
	});

	$('.single-post.mobile-layout .social-share.open .title-share').on('click', function(){
		$('.single-post.mobile-layout .social-share').removeClass("open");
	});
	
	$('.products-nav .filter-product').on('click', function(){
		$('.products-wrapper .filter-mobile').toggleClass("open");
		$('.products-wrapper').toggleClass('show-modal');
	});
	
	$('.products-nav .filter-product').on('click', function(){
		if( $( ".products-wrapper .products-nav .filter-product" ).not( ".filter-mobile" ) ){
			$('.products-wrapper').removeClass('show-modal');
		}	
	});
	
	$('.mobile-layout .vertical_megamenu .resmenu-container .navbar-toggle').on('click', function(){
		$('.mobile-layout .body-wrapper .container').toggleClass('open');
	});
	
	$('.mobile-layout .header-top-mobile .header-menu-categories .show_menu').on('click', function(){
		$('.mobile-layout .body-wrapper .container').toggleClass('open');
	});
	
	$('.header-mobile-style5 .header-top-mobile .header-right .search-mobile').on('click', function(){
		$('.header-mobile-style5 .header-top-mobile .mobile-search').toggleClass('open');
	});
	
	$('.header-mobile-style5 .header-top-mobile .header-menu-categories .show_menu ').on('click', function(){
		$('.header-mobile-style5 .header-top-mobile .header-menu-categories .vertical_megamenu').toggleClass('open');
	});
	
	$('.mobile-layout .back-history').on('click', function(){
		window.history.back();
	});
	
	$('.footer-mstyle2 .footer-container .footer-open').on('click', function(){
		$('.footer-mstyle2').toggleClass('open');
	});
	
	$('.footer-mstyle2 .mobile_menu2')
	.find('li:gt(7)') /*you want :gt(4) since index starts at 0 and H3 is not in LI */
	.hide()
	.end()
	.each(function(){
			if($(this).children('li').length > 8){ //iterates over each UL and if they have 5+ LIs then adds Show More...
				$(this).append(
					$('<li><a><span class="menu-title">See more</span><span class="menu-img"></span></a></li>')
					.addClass('showMore')
					.on('click',function(){
						if($(this).siblings(':hidden').length > 0){
							$(this).html('<a><span class="menu-title">See less</span><span class="menu-img"></span></a>').siblings(':hidden').show(400);
						}else{
							$(this).html('<a><span class="menu-title">See more</span><span class="menu-img"></span></a>').show().siblings('li:gt(7)').hide(400);
						}
					})
					);
			}
		});
	
	$('.header-style1 .header-mid .sticky-search .fa-search').on('click', function(){
		$('.header-style1 .header-mid .sticky-search').toggleClass("open");
	});
	
	
	$('.header-style2 .header-bottom .sticky-search .fa-search').on('click', function(){
		$('.header-style2 .header-bottom .sticky-search').toggleClass("open");
	});
	
	
	/*add title to button*/

	$("a.compare").attr('title', 'Add to Compare');
	$(".yith-wcwl-add-button a").attr('title', 'Add to wishlist');
	$("a.fancybox").attr('title', 'Quickview');
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
	/*
	** Product listing order hover
	*/
	$('ul.orderby.order-dropdown li ul').hide(); 
	$("ul.order-dropdown > li").each( function(){
		$(this).hover( function() {
			$('.products-wrapper').addClass('show-modal');
			$(this).find( '> ul' ).stop().fadeIn("fast");
		}, function() {
			$('.products-wrapper').removeClass('show-modal');
			$(this).find( '> ul' ).stop().fadeOut("fast");
		});
	});
	
	/*
	** Product listing select box
	*/
	$('.catalog-ordering .orderby .current-li a').html($('.catalog-ordering .orderby ul li.current a').html());
	$('.catalog-ordering .sort-count .current-li a').html($('.catalog-ordering .sort-count ul li.current a').html());
	
	/*
	** Quickview and single product slider
	*/
	$(document).ready(function(){
		if( $.isFunction( $.fancybox ) ){
			$('.fancybox').fancybox({
				'width'     : 850,
				'height'   : '500',
				'autoSize' : false,
				afterShow: function() {
					$( '.quickview-container .product-images' ).each(function(){
						var $id 					= this.id;
						var $rtl 					= $('body').hasClass( 'rtl' );
						var $img_slider 	= $(this).find('.product-responsive');
						var $thumb_slider = $(this).find('.product-responsive-thumbnail' )
						$img_slider.slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							fade: true,
							arrows: false,
							rtl: $rtl,
							asNavFor: $thumb_slider
						});
						$thumb_slider.slick({
							slidesToShow: 4,
							slidesToScroll: 1,
							asNavFor: $img_slider,
							arrows: true,
							focusOnSelect: true,
							rtl: $rtl,
							responsive: [				
							{
								breakpoint: 360,
								settings: {
									slidesToShow: 2    
								}
							}
							]
						});

						var el = $(this);
						setTimeout(function(){
							el.removeClass("loading");
							var height = el.find('.product-responsive').outerHeight();
							var target = el.find( '.item-video' );
							target.css({'height': height,'padding-top': (height - target.outerHeight())/2 });
							
							var thumb_height = el.find('.product-responsive-thumbnail' ).outerHeight();
							var thumb_target = el.find( '.item-video-thumb' );
							thumb_target.css( 'height', thumb_height );
						}, 1000);
					});
}
});
}
		/* 
		** Slider single product image
		*/
		$( '.product-images' ).each(function(){
			var $rtl 					= $('body').hasClass( 'rtl' );
			var $vertical			= $(this).data('vertical');
			var $img_slider 	= $(this).find('.product-responsive');
			var $thumb_slider = $(this).find('.product-responsive-thumbnail' );
			
			$img_slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				rtl: $rtl,
				asNavFor: $thumb_slider
			});
			$thumb_slider.slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				asNavFor: $img_slider,
				arrows: true,
				rtl: $rtl,
				vertical: $vertical,
				verticalSwiping: $vertical,
				focusOnSelect: true,
				responsive: [
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 4    
					}
				},
				{
					breakpoint: 360,
					settings: {
						slidesToShow: 2    
					}
				}
				]
			});

			var el = $(this);
			setTimeout(function(){
				el.removeClass("loading");
				var height = el.find('.product-responsive').outerHeight();
				var target = el.find( ' .item-video' );
				target.css({'height': height,'padding-top': (height - target.outerHeight())/2 });

				var thumb_height = el.find('.product-responsive-thumbnail' ).outerHeight();
				var thumb_target = el.find( '.item-video-thumb' );
				thumb_target.css({ height: thumb_height,'padding-top':( thumb_height - thumb_target.outerHeight() )/2 });
			}, 1000);
		});
});

	/*
	** Hover on mobile and tablet
	*/
	var mobileHover = function () {
		$('*').on('touchstart', function () {
			$(this).trigger('hover');
		}).on('touchend', function () {
			$(this).trigger('hover');
		});
	};
	mobileHover();
	
	/*
	** Menu hidden
	*/
	$('.product-categories').each(function(){
		var number	 = $(this).data( 'number' ) - 1;
		var lesstext = $(this).data( 'lesstext' );
		var moretext = $(this).data( 'moretext' );
		if( number > 0 ) {
			$(this).find( 'li:gt('+ number +')' ).hide().end();		
			if( $(this).children('li').length > number ){ 
				$(this).append(
					$('<li><a>'+ moretext +'   +</a></li>')
					.addClass('showMore')
					.on('click',function(){
						if($(this).siblings(':hidden').length > 0){
							$(this).html( '<a>'+ lesstext +'   -</a>' ).siblings(':hidden').show(400);
						}else{
							$(this).html( '<a>'+ moretext +'   +</a>' ).show().siblings( ':gt('+ number +')' ).hide(400);
						}
					})
					);
			}
		}
	});
	

	var w_width = $(window).width(); 
	if( w_width <= 480){
		jQuery('.mobile-layout .header-mobile-style5 .furnihome_resmenu')
		.find(' > li:gt(6) ') 
		.hide()
		.end()
		.each(function(){
			if($(this).children('li').length > 6){ 
				$(this).append(
					$('<li><a class="open-more-cat">More Categories</a></li>')
					.addClass('showMore')
					.on('click', function(){
						if($(this).siblings(':hidden').length > 0){
							$(this).html('<a class="close-more-cat">Close Categories</a>').siblings(':hidden').show(400);
						}else{
							$(this).html('<a class="open-more-cat">More Categories</a>').show().siblings('li:gt(6)').hide(400);
						}
					})
					);
			}
		});
	}
	/* 
	** Fix accordion heading state 
	*/
	$('.accordion-heading').each(function(){
		var $this = $(this), $body = $this.siblings('.accordion-body');
		if (!$body.hasClass('in')){
			$this.find('.accordion-toggle').addClass('collapsed');
		}
	});	

	
	/*
	** Cpanel
	*/
	$('#cpanel').collapse();

	$('#cpanel-reset').on('click', function(e) {

		if (document.cookie && document.cookie != '') {
			var split = document.cookie.split(';');
			for (var i = 0; i < split.length; i++) {
				var name_value = split[i].split("=");
				name_value[0] = name_value[0].replace(/^ /, '');

				if (name_value[0].indexOf(cpanel_name)===0) {
					$.cookie(name_value[0], 1, { path: '/', expires: -1 });
				}
			}
		}

		location.reload();
	});

	$('#cpanel-form').on('submit', function(e){
		var $this = $(this), data = $this.data(), values = $this.serializeArray();

		var checkbox = $this.find('input:checkbox');
		$.each(checkbox, function() {

			if( !$(this).is(':checked') ) {
				name = $(this).attr('name');
				name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');
				var date = new Date();
				date.setTime(date.getTime() + (30 * 1000));
				$.cookie( name , 0, { path: '/', expires: date });
			}

		})

		$.each(values, function(){
			var $nvp = this;
			var name = $nvp.name;
			var value = $nvp.value;

			if ( !(name.indexOf(cpanel_name + '[')===0) ) return ;

			name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

			$.cookie( name , value, { path: '/', expires: 7 });

		});

		location.reload();

		return false;

	});

	$('a[href="#cpanel-form"]').on( 'click', function(e) {
		var parent = $('#cpanel-form'), right = parent.css('right'), width = parent.width();

		if ( parseFloat(right) < -10 ) {
			parent.animate({
				right: '0px',
			}, "slow");
		} else {
			parent.animate({
				right: '-' + width ,
			}, "slow");
		}

		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
		} else $(this).addClass('active');

		e.preventDefault();
	});
	

	/*
	** Currency Selectbox
	*/
	$(document).ready(function(){
		$('.currency_switcher li a').on('click', function(){
			$current = $(this).attr('data-currencycode');
			$('.currency_w > li > a').html($current);
		});
		
		var currency_show = $( '.currency_switcher > li > a.active' ).html();
		$('.currency_w > li > a').html(currency_show);	
	});
	
	/*
	** Language
	*/
	var $current ='';
	$('#lang_sel ul > li > ul li a').on('click',function(){
	 $current = $(this).html();
	 $('#lang_sel ul > li > a.lang_sel_sel').html($current);
	 $a = $.cookie('lang_select_furnihome', $current, { expires: 1, path: '/'}); 
	});
	
	if( $.cookie('lang_select_furnihome') && $.cookie('lang_select_furnihome').length > 0 ) {
		$('#lang_sel ul > li > a.lang_sel_sel').html($.cookie('lang_select_furnihome'));
	}

	$('#lang_sel ul > li.icl-ar').click(function(){
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'furnihome_lang_en' , 1, { path: '/', expires: 1 });
	});
	
	$('#lang_sel ul > li.icl-en').click(function(){
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'furnihome_lang_en' , 0, { path: '/', expires: -1 });
	});
	
	var Furnihome_Lang = $.cookie( 'furnihome_lang_en' );
	if( Furnihome_Lang == null ){
		$('#lang_sel ul > li.icl-en').addClass( 'active' );
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
	}else{
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$('#lang_sel ul > li.icl-ar').addClass( 'active' );
	}
	
	/*
	** Clear header style 
	*/
	$( '.furnihome-logo' ).on('click', function(){
		$.cookie("furnihome_header_style", null, { path: '/' });
		$.cookie("furnihome_footer_style", null, { path: '/' });
	});
	
	/*
	** Footer accordion
	*/
	if ($(window).width() < 768) {	

		$('.footer .widget_nav_menu h2.widgettitle').append('<span class="icon-footer"></span>');
		$('.footer .wpb_content_element .info-footer h3').append('<span class="icon-footer"></span>');

		$(".footer .widget_nav_menu h2.widgettitle").each(function(){
			$(this).on('click', function(){
				$(this).parent().find("ul.menu").slideToggle();
			});
		});
		
		$(".footer .wpb_content_element .info-footer h3").each(function(){
			$(this).on('click', function(){
				$(this).parent().find("ul").slideToggle();
			});
		});	
		
	}
	
	
	/*
	** Back to top
	**/
	$("#furnihome-totop").hide();
	var wh = $(window).height();
	var whtml = $(document).height();
	$(window).scroll(function () {
		if ($(this).scrollTop() > whtml/10) {
			$('#furnihome-totop').fadeIn();
		} else {
			$('#furnihome-totop').fadeOut();
		}
	});
	
	$('#furnihome-totop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	/* end back to top */

 /*
 ** Fix js 
 */
 $('.wpb_map_wraper').on('click', function () {
 	$('.wpb_map_wraper iframe').css("pointer-events", "auto");
 });

 $( ".wpb_map_wraper" ).on('mouseleave', function() {
 	$('.wpb_map_wraper iframe').css("pointer-events", "none"); 
 });

	/*
	** Change Layout 
	*/
	$( window ).load(function() {	
		if( $( 'body' ).hasClass( 'tax-product_cat' ) || $( 'body' ).hasClass( 'post-type-archive-product' ) ) {
			$('.grid-view').on('click',function(){
				$('.list-view').removeClass('active');
				$('.grid-view').addClass('active');
				jQuery("ul.products-loop").fadeOut(300, function() {
					$(this).removeClass("list").fadeIn(300).addClass( 'grid' );			
				});
			});
			
			$('.list-view').on('click',function(){
				$( '.grid-view' ).removeClass('active');
				$( '.list-view' ).addClass('active');
				$("ul.products-loop").fadeOut(300, function() {
					jQuery(this).addClass("list").fadeIn(300).removeClass( 'grid' );
				});
			});
			/* End Change Layout */
		} 
	});
	$(window).scroll(function() {    
		var whtop = $(window).scrollTop(); 
		if (whtop > 0) {
			$(".header-style4").addClass("header-ontop");
		} else {
			$(".header-style4").removeClass("header-ontop");
		} 
	});
	
	/*remove loading*/
	$(".sw-woo-tab").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
	$(".responsive-slider").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
}(jQuery));

/*
** Check comment form
*/
function submitform(){
	if(document.commentform.comment.value=='' || document.commentform.author.value=='' || document.commentform.email.value==''){
		alert('Please fill the required field.');
		return false;
	} else return true;
}
(function($){		
	/*Verticle Menu*/
	if( !( $('#header').hasClass( 'header-style7' ) ) ) {
		$('.vertical-megamenu').each(function(){
			var number	 = $(this).parent().data( 'number' ) - 1;
			var lesstext = $(this).parent().data( 'lesstext' );
			var moretext = $(this).parent().data( 'moretext' );
			$(this).find(	' > li:gt('+ number +')' ).hide().end();		
			if($(this).children('li').length > number ){ 
				$(this).append(
					$('<li><a class="open-more-cat">'+ moretext +'</a></li>')
					.addClass('showMore')
					.on('click', function(){
						if($(this).siblings(':hidden').length > 0){
							$(this).html('<a class="close-more-cat">'+ lesstext +'</a>').siblings(':hidden').show(400);
						}else{
							$(this).html('<a class="open-more-cat">'+ moretext +'</a>').show().siblings( ':gt('+ number +')' ).hide(400);
						}
					})
					);
			}
		});
	}
	$(".widget_nav_menu li.menu-compare a").hover(function() {
		$(this).css('cursor','pointer').attr('title', 'Compare');
	}, function() {
		$(this).css('cursor','auto');
	});
	$(".widget_nav_menu li.menu-wishlist a").hover(function() {
		$(this).css('cursor','pointer').attr('title', 'My Wishlist');
	}, function() {
		$(this).css('cursor','auto');
	});
	
	$(window).scroll(function() {   
		if( $( 'body' ).hasClass( 'mobile-layout' ) ) {
			var target = $( '.mobile-layout #header-page' );
			var sticky_nav_mobile_offset = $(".mobile-layout #header-page").offset();
			if( sticky_nav_mobile_offset != null ){
				var sticky_nav_mobile_offset_top = sticky_nav_mobile_offset.top;
				var scroll_top = $(window).scrollTop();
				if ( scroll_top > sticky_nav_mobile_offset_top ) {
					$(".mobile-layout #header-page").addClass('sticky-mobile');
				}else{
					$(".mobile-layout #header-page").removeClass('sticky-mobile');
				}
			}
		}
	});

})(jQuery);	
