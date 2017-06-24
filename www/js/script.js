var amountScrolled = 200;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
		$('a.back-to-top').css('display', 'block');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$(".back-to-top").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
});

$('a.back-to-history').click(function() {
	window.history.back();
});
