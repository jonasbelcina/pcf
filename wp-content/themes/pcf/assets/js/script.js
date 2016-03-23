;(function($){
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var xhr;

	$('.home-banner').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		animateOut: 'fadeOut',
		autoplay: true
	});

	$('.testimonial-items').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		autoplay: true,
		autoplayTimeout: 11000
	});

	$('.mobile-articles').owlCarousel({
		items: 1,
		nav: true,
		dots: true,
		// loop: true,
		navText: false,
		autoplay: true,
		autoplayTimeout: 8000
	});

	$(window).load(function () {
		$('.our-clients .owl-controls').css('display', 'block');
	});

	$('.brand-items').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		margin: 15,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    320:{
		        items:1
		    },
		    420:{
		        items:1
		    },
		    568:{
		        items:2
		    },
		    767:{
		        items:3
		    },
		    991:{
		        items:5
		    }
		}
	});

	$('.related-slides').owlCarousel({
		items: 3,
		nav: true,
		// loop: true,
		margin: 20,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    320:{
		        items:1
		    },
		    568:{
		        items:2
		    },
		    768:{
		        items:3
		    }
		}
	});

	$('.kitchen-details-gallery').owlCarousel({
		items: 1,
		nav: true,
		loop: true,
		navText: false,
		animateOut: 'fadeOut',
		autoplay: true
	});

	$('.mobile-cycle-slides').owlCarousel({
		items: 3,
		nav: true,
		loop: true,
		margin: 15,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    767:{
		        items:2
		    }
		}
	});

	$('.cert-slider').owlCarousel({
		items: 3,
		nav: true,
		// loop: true,
		margin: 15,
		navText: false,
		autoplay: true,
		responsive:{
		    0:{
		        items:1
		    },
		    420:{
		        items:2
		    },
		    568:{
		        items:3
		    },
		    767:{
		        items:2
		    }
		}
	});

	$('.footer-drop').on('click', function() {
		$(this).closest('.footer-col').toggleClass('opened');
		if($(this).find('span').hasClass('glyphicon-menu-down')) {
			$(this).find('span').removeClass('glyphicon-menu-down');
			$(this).find('span').addClass('glyphicon-menu-up');
		} else {
			$(this).find('span').removeClass('glyphicon-menu-up');
			$(this).find('span').addClass('glyphicon-menu-down');
		}
	});

	$('li.expand').on('click', function() {
		if($(this).hasClass('cat-active')) {
			$(this).removeClass('cat-active');
			$(this).next('ul').css('max-height', '1px');
			$(this).find('span').removeClass('glyphicon-minus');
			$(this).find('span').addClass('glyphicon-plus');
		} else {
			$(this).addClass('cat-active');
			$(this).next('ul').css('max-height', '500px');
			$(this).find('span').removeClass('glyphicon-plus');
			$(this).find('span').addClass('glyphicon-minus');
		}
		
	});

	$('span.expand').on('click', function() {
		if($(this).closest('li').hasClass('cat-active')) {
			$(this).closest('li').removeClass('cat-active');
			$(this).closest('li').next('ul').css('max-height', '1px');
			$(this).removeClass('glyphicon-minus');
			$(this).addClass('glyphicon-plus');
		} else {
			$(this).closest('li').addClass('cat-active');
			$(this).closest('li').next('ul').css('max-height', '500px');
			$(this).removeClass('glyphicon-plus');
			$(this).addClass('glyphicon-minus');
		}
		
	});

	var ww = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	if(ww > 768){
		$(window).scroll(function(e){

			var followHeight;

			if($('.product-listing').length) {
				followHeight = $('.product-listing');
			} else if($('.details-banner').length) {
				followHeight = $('.details-banner');
			}

			if(followHeight){
				var windowTop = $(window).scrollTop();
				var productTop = followHeight.offset().top;
				var sidebarHeight = $('.woo-sidebar').height();
				var totalheight = followHeight.height();

				if(windowTop > productTop && ( sidebarHeight + windowTop - productTop ) < totalheight )
					$('.woo-sidebar').css('margin-top' , windowTop - productTop -20 );
				else if(windowTop < productTop)
					$('.woo-sidebar').css('margin-top' , 0 );
			}

		});
	}

	$('.blog-posts .news-item:nth-child(3n)').addClass('news-item2');

	// posts filter
	$( function() {
		var str = document.URL;
		var category = str.indexOf('#');
	  	var criteria = str.substring(str.indexOf('#'));
	  	criteria = criteria.substr(1);

  		// init Isotope
	  	var $grid = $('.main-blog .blog-posts').isotope({
	    	itemSelector: '.news-item',
	    	layoutMode: 'masonry',
	    	masonry: {
	    	    columnWidth: '.news-item',
	    	    gutter: 15
    	  	},
	  	});

  		// bind filter button click
  		$('.posts-filter button').on( 'click', function() {
	  	  	var filterValue = $( this ).attr('data-filter');
	  	  	// use filterFn if matches value
	  	  	// filterValue = filterFns[ filterValue ] || filterValue;
	  	  	$grid.isotope({ filter: filterValue });
	  	  	$grid.isotope('shuffle');

	  	  	// display message box if no filtered items
	  	  	var noItems = $('<div class="no-results"><h1 class="page-title">No posts found.</h1></div>');
  	  	  	var yesItems = $('.no-results');
	  	  	if ( $grid.data('isotope').filteredItems.length < 1 ) {
	  	  		if ($grid.find(yesItems)) {
	  	  			yesItems.remove();
	  	  		}
	  	  	  	$grid.append(noItems).isotope( 'appended', noItems );
	  	  	  	$grid.css({"height": "300px"});
	  	  	} else {
	  	  		// $grid.isotope( 'remove', noItems);
	  	  		yesItems.remove();
	  	  	}

  		});

	  	$('.posts-filter button').each(function() {
	  		
  			if ($(this).data('filter').substr(1) == criteria) {
  				$(this).trigger('click');
  				$('.posts-filter button').removeClass('post-filter-active');
  				$(this).addClass('post-filter-active');
  			}

	  	});
  		
	  	// change is-checked class on buttons
	  	$('.button-group').each( function( i, buttonGroup ) {
	    	var $buttonGroup = $( buttonGroup );
	    	$buttonGroup.on( 'click', 'button', function() {
	      		$buttonGroup.find('.post-filter-active').removeClass('post-filter-active');
	      		$( this ).addClass('post-filter-active');
	    	});
	  	});
	  
	});

	$('.posts-filter.mobile-post-filter h2').on('click', function() {
		$('.posts-filter.mobile-post-filter .button-group').slideToggle(function() {
			$('.posts-filter.mobile-post-filter h2 span').toggle();
		});
	});

	$('.kitchen-enquiry, .catalogue form input[type="submit"]').on('click', function(){
		var product = $(this).data('product');
		var page = $(this).data('link');
		$(".product-hidden").val(product);
		$(".url-hidden").val(page);
	});

	$('.catalogue form input[type="submit"]').on('click', function(){
		var product = $('.kitchen-enquiry').data('product');
		var page = $('.kitchen-enquiry').data('link');
		$(".product-hidden").val(product);
		$(".url-hidden").val(page);
	});

	$('.site-continue').on('click', function(e){
		e.preventDefault();
		$('#thankyou_popup').modal('hide');
	});

	$(function() {
	  $('a.smooth[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
    	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    	offset_opacity = 1200,
    	//duration of the top scrolling animation (in ms)
    	scroll_top_duration = 700,
    	//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

	$('.download-brand').on('click', function() {
		$('.db-holder').removeClass('active-brochure');
		$(this).next('a').addClass('active-brochure');
	});

})(jQuery);
