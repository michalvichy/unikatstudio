const MAP_KEY = 'AIzaSyC4mLQ31-FT-AmiEe2SzT-9F_ljg3bjXmQ';
const MAP_STYLES = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-77}]},{"featureType":"road"}];
const MAP_MARKER = 'https://mapkit.io/images/legacy/solid-pin-black.png';

window.US = window.US || {};

window.US.common = function($) {
  function smoothScrolling(time = 1000) {
    $('a[href*="#"]:not([href="#"]').click(function () {
      if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname ) {
        let target = $(this.hash);

        target = target.length ? target : $(`[name=${this.hash.slice(1)}]`);

        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, time);

          return false;
        }
      }
    });
  }

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
        nav: false,
        dots: false,
        autoplay: true,
        loop: true,
        autoplaySpeed: 600,
        animateOut: 'fadeOut',
    });

    $('.js-certificates').owlCarousel({
        items: 4,
        nav: false,
        dots: true,
        margin: 15,
        lazyLoad: true,
        itemElement: 'a',
        stageClass: 'owl-stage js-lightgallery',
        onInitialized: () => {
          const $certificates = $('.js-certificate-img');
          var $imgLinks = $('.js-lightgallery > .owl-item');

          $imgLinks.each(function(index, link) {
            $(link).attr('href', $($certificates[index]).data('src'));
          });
        }
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

  function initMap() {
    const center = {
      lat : 50.2778469,
      lng : 19.00745
    };

    const map = new google.maps.Map(document.getElementById('map'), {
      disableDefaultUI: true,
      center: center,
      styles: MAP_STYLES,
      zoom: 17
    });

    const marker = new google.maps.Marker({
      map,
      position: center,
      icon: MAP_MARKER
    });
  }


  $(document).ready(function() {
    tabs();
    galleries();
    lightgalleryInit();
    smoothScrolling();
    $.getScript(`https://maps.googleapis.com/maps/api/js?key=${MAP_KEY}`, initMap);
  });
};
