window.SS = window.SS || {};
window.SS._submodules = window.SS._submodules || {};

(function($) {

    $(function() {
        var bodyClassName = document.body.className.replace(/-/g, '_');
        var bodyClasses = bodyClassName.split(/\s+/);

        var getSubmodule = function(name) {
            return function() {
                window.SS._submodules[name]($);
            };
        };

        $.each(['common'].concat(bodyClasses), function(i, module) {
            if ($.isFunction(window.SS[module])) {
                window.SS[module]($);
            }
        });
    });
}(jQuery));
