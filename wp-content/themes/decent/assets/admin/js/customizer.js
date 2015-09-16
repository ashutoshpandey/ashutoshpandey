(function($){

	wp.customize('decent_theme_lite[color_site_title]', function(value){
		value.bind(function(newval){			
			$('#wrapper .site-title a').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_site_desc]', function(value){
		value.bind(function(newval){			
			$('#wrapper .site-description').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_blog_p_title]', function(value){
		value.bind(function(newval){			
			$('#wrapper .loop-post-title h1 a').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_blog_p_meta]', function(value){
		value.bind(function(newval){			
			$('#wrapper .loop-post-meta, #wrapper .loop-post-meta .loop-meta-comments a').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_blog_p_content]', function(value){
		value.bind(function(newval){			
			$('#wrapper .loop-post-excerpt').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_p_title]', function(value){
		value.bind(function(newval){			
			$('#wrapper .post-title h1').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_p_meta]', function(value){
		value.bind(function(newval){			
			$('#wrapper .post-meta').css('color', newval);
		})
	});
	wp.customize('decent_theme_lite[color_p_content]', function(value){
		value.bind(function(newval){			
			$('#wrapper .post-content').css('color', newval);
		})
	});

/*
	if (typeof (sessionStorage) != 'undefined') {
		sessionStorage.setItem('decentSiteTitle', $('#wrapper .site-title a').html());
	}

	wp.customize('decent_theme_lite[site_logo]', function(value){
		value.bind(function(newval){
			if(newval){
				$('#wrapper .site-title a').html('<img src="'+newval+'"/>');
				$('#wrapper .site-description').hide();
			}else{
				$('#wrapper .site-title a').html(sessionStorage.getItem('decentSiteTitle'));
				$('#wrapper .site-description').show();
			}

		})
	});
*/

})(jQuery);