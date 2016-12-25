'use strict';

var demoHome = function () {

  function bindEvents() {
    $(window).on('load', renderBxSLider);
  }

  function renderBxSLider() {
    if ($.fn.bxSlider) {
      $('.hero-slider .bxslider').bxSlider({
        mode: 'fade',
        auto: true,
        speed: 5000,
        pause: 10000,
        pager: true,
        controls: false,
        easing: 'ease-in-out'
      });
    }
  }

  function renderReviews(data) {
    var content = '';

    jQuery.each(data.items, function (i, val) {
      content += '<div class="player-profile">' + val.quote + '</blockquote>' + '<div class="reviews-avatar mr15"><img src="' + val.img + '" alt="' + val.alt + '" class="img-circle"></div>' + '<div class="reviews-meta"><h5 class="reviews-name"><a href="javascript:;">' + val.name + '</a></h5>' + '<small>' + val.title + '</small></div></div>';
    });

    $('.reviews-carousel').html(content);
  }

  function initCarousel() {
    if ($.fn.owlCarousel) {
      $('.reviews-carousel').owlCarousel({
        autoPlay: 10000,
        pagination: false,
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [768, 1],
        itemsTablet: false,
        itemsMobile: false,
        jsonPath: 'data/reviews.json',
        jsonSuccess: renderReviews
      });
    }
  }

  function initMagnificPopUp() {
    if ($.fn.magnificPopup) {
      $('.popup-video').magnificPopup({
        type: 'iframe'
      });
    }
  }

  return {
    init: function () {
      bindEvents();
      initCarousel();
      initMagnificPopUp();
    }
  };
}();

$(function () {
  demoHome.init();
});
