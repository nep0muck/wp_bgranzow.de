(function ($, root, undefined) {

	$(function () {

		'use strict';

    // Menu Toggle Script //
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Navbar shrinking
    $(window).scroll(function() {
      if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
        $('.sitebrand-header-portrait').addClass('shrink-logo');
      } else {
        $('nav').removeClass('shrink');
        $('.sitebrand-header-portrait').removeClass('shrink-logo');
      }
    });
    // Menu Toggle Script



    // $("#commentform").validate({
    //     rules: {
    //         author: {
    //             required: true
    //         },
    //         email: {
    //             required: true
    //         }
    //     }
    // });

	});

})(jQuery, this);
