// Back to top

$(document).ready(function(){

	$(function(){
	 
	    $(document).on( 'scroll', function(){
	 
	    	if ($(window).scrollTop() > 200) {
				$('#top').addClass('show');
			} else {
				$('#top').removeClass('show');
			}
		});
	 
		$('#top').on('click', scrollToTop);
	});
	 
	function scrollToTop() {
		verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
		element = $('body');
		offset = element.offset();
		offsetTop = offset.top;
		$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
	}

});