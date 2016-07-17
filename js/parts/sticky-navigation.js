jQuery(document).ready(function($) {

	var navbar = $('#navbar'),
	distance = navbar.offset().top,
	$window = $(window);

	if ($("body").hasClass("admin-bar")) {
		var loggedIn = true;
	}
	else {
		var loggedIn = false;
	}

	$window.scroll(function() {
		if ($window.width() >= 992) {
			if ($window.scrollTop() >= distance) {
				navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
				if (loggedIn) {
					navbar.css("margin-top", "32px");
				}
			} else {
				navbar.removeClass('navbar-fixed-top');
				$("body").css("padding-top", "0");
				navbar.css("margin-top", "0");
			}
		}
	});
});
// Thanks to: http://codepen.io/adammacias/pen/WvxVRP
