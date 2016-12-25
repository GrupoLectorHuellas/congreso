$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('a.scroll-top').fadeIn();
        } else {
            $('a.scroll-top').fadeOut();
        }
    });
    
    $('a.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, 300);
        return false;
    });
});