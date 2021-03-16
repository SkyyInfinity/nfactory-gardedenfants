$(document).ready(function() {
// JQUERY START
// Variables
var hamburger = $('#js_hamburger');
var navLinks = $('#js_nav-links');
var body = $('#js_body');

hamburger.on('click', function() {
    hamburger.toggleClass('is-active');
    navLinks.toggleClass('is-active');
});

if(navLinks.hasClass('is-active')) {
    body.css('overflow', 'hidden');
} else {
    body.css('overflow', 'auto');
}

// JQUERY END
});