window.US = window.US || {};

window.US.common = function($) {
  function goToTopButton() {
    var $button = $('.js-to-top');

    $(window).on('scroll', function() {
      if ($(this).scrollTop() >= 150) {
        $button.addClass('is-visible');
      } else {
        $button.removeClass('is-visible');
      }
    });

    $button.on('click', function() {
      $('html, body').stop().animate({ scrollTop: 0 }, 'slow');
    });
  }

  function setCookie(cookieName, value, daysLeft) {
    var expireDate = new Date();

    expireDate.setDate(expireDate.getDate() + daysLeft);

    var cookieValue = escape(value) + ((daysLeft === null) ? '' : '; expires=' + expireDate.toUTCString());

    document.cookie = cookieName + '=' + cookieValue;
  }

  function getCookie(cookieName) {
    var cookie = document.cookie;
    var cookieStart = cookie.indexOf(' ' + cookieName + '=');

    if (cookieStart === -1) {
      cookieStart = cookie.indexOf(cookieName + '=');
    }

    if (cookieStart === -1) {
      cookie = null;
    } else {
      cookieStart = cookie.indexOf('=', cookieStart) + 1;

      var cookieEnd = cookie.indexOf(';', cookieStart);

      if (cookieEnd === -1) {
        cookieEnd = cookie.length;
      }

      cookie = unescape(cookie.substring(cookieStart, cookieEnd));
    }

    return cookie;
  }

  function cookiesInfo($elem) {
    var cookie = getCookie(cookieUser);

    if (cookie === null) {
      $elem.show();
    }

    $elem.on('click', function(e) {
      var target  = $(e.target);
      if (target.is('a')) {
        return true;
      } else {
        e.preventDefault();
        setCookie(cookieUser, 1, 500);
        $elem.fadeOut('slow');
      }
    });
  }

  function tabs() {
    var $tabs = $('.js-tab');

    $tabs.each(function(index, tab) {
      var $tabItems = $(tab).find('.js-tab-item');
      var $tabTargets = $(tab).find('.js-tab-target');

      $tabItems.on('click', function() {
        var $this = $(this);
        var $target = $($this.data('target'));

        $tabItems.removeClass('active');
        $tabTargets.removeClass('active');
        $this.addClass('active');
        $target.addClass('active');
      });
    });
  }

  function galleries() {
    $('.js-gallery').owlCarousel({
        dots: true,
        margin: 20,
        mouseDrag: false,
        nav: true,
    });

    $('.js-inspirations').owlCarousel({
        items: 1,
        nav: true,
        dots: true,
    });
  }

    function lightgalleryInit() {
        $('.js-lightgallery').lightGallery({
            mode: 'lg-fade',
            cssEasing: 'ease-out',
            thumbnail: true,
            toogleThumb: false,
            thumbMargin: 15,
        });
    }


  $(document).ready(function() {
    tabs();
    galleries();
    lightgalleryInit();
  });
};
