window.US = window.US || {};
window.US._submodules = window.US._submodules || {};

(function($) {

  $(function() {
    var bodyClassName = document.body.className.replace(/-/g, '_');
    var bodyClasses = bodyClassName.split(/\s+/);

    var getSubmodule = function(name) {
      return function() {
        window.US._submodules[name]($);
      };
    };

    $.each(['common'].concat(bodyClasses), function(i, module) {
      if ($.isFunction(window.US[module])) {
        window.US[module]($);
      }
    });
  });
}(jQuery));
