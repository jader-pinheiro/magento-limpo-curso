/*
 Double Tap to Go
 Author: Graffino (http://www.graffino.com)
 Version: 0.3
 Originally by Osvaldas Valutis, www.osvaldas.info
 Available for use under the MIT License
 */
;(function($, window, document, undefined) {
    $.fn.doubleTapToGo = function(action) {
        if (!('ontouchstart' in window) &&
            !navigator.msMaxTouchPoints &&
            !navigator.userAgent.toLowerCase().match(/windows phone os 7/i)) return false;
        if (action === 'unbind') {
            this.each(function() {
                $(this).off();
                $(document).off('click touchstart MSPointerDown', handleTouch);
            });
        } else {
            this.each(function() {
                $(this).on('click', function(e) {
                    if ($(this).children('.submenu').attr('aria-expanded') === 'false') {
                        e.preventDefault();
                    }
                });
            });
        }
        return this;
    };
})(jQuery, window, document);