$(document).ready(function(){
    // JQUERY START
    /* ─── VARIABLES ────────────────────────────────────────────── */
    var loader = $('#loader');
    var body = $('body');

    /* ─── CODE ────────────────────────────────────────────── */
    body.css('overflow', 'hidden');
    setTimeout(function() {
        loader.fadeOut(100);
        body.css('overflow', 'auto');
    }, 100/*1400*/);

    // JQUERY END
});