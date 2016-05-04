window.SS = window.SS || {};

window.SS.common = function($) {
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
};
