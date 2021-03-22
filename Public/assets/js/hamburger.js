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

    // Si on clique partout sauf sur navLinks et hamburger, alors navLinks se ferme.
    $(document.body).click(function(e) {
        if(!$(e.target).is(navLinks) && !$.contains(navLinks[0],e.target) && !$(e.target).is(hamburger) && !$.contains(hamburger[0],e.target)) {
            navLinks.removeClass('is-active');
            hamburger.removeClass('is-active');
        }
    });

// JQUERY END
});