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

$(document.body).click(function(e) {

    // Si ce n'est pas #ma_div ni un de ses enfants
    if( !$(e.target).is(navLinks) && !$.contains(navLinks[0],e.target) && !$(e.target).is(hamburger) ) {
        navLinks.removeClass('is-active');
        hamburger.removeClass('is-active');
    } else {
        navLinks.addClass('is-active');
        hamburger.addClass('is-active');
    }
  
});

// JQUERY END
});