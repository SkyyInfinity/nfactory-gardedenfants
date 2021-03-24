$(document).ready(function(){
    // JQUERY START
    /* ─── VARIABLES ────────────────────────────────────────────── */
    var loader = $('#loader');
    var body = $('body');

    /* ─── CODE ────────────────────────────────────────────── */
    body.css('overflow', 'hidden');
    setTimeout(function() {
        loader.fadeOut(100, function(){
            body.css('overflow', 'initial');
        });
    }, 800/*800*/);

    // JQUERY END
});