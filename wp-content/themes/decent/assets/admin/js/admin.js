(function($){
	$(document).ready(function(e){
		$('#customize-controls .preview-notice').append('<a class="decent-pro-link" href="http://www.mudthemes.com/showcase/decent-theme" title="Upgrade to Premium" target="_blank">Upgrade to Premium</a>');
		$('.decent-pro-link').click(function(e){
			e.stopPropagation();
		});
	});
})(jQuery);