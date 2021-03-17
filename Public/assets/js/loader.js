$(document).ready(function(){
    // JQUERY START
    /* ─── VARIABLES ────────────────────────────────────────────── */
    var loader = $('#loader');
    var body = $('body');

    /* ─── CODE ────────────────────────────────────────────── */
    body.css('overflow', 'hidden');
    setTimeout(function() {
        loader.fadeOut(200);
        body.css('overflow', 'auto');
    }, 800/*800*/);

    // JQUERY END
});