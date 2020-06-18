/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    //header title and subttile
    wp.customize('header_title', function(value) {
        value.bind(function(to) {
            $('.header-text h2').text(to);
        });
    });
    wp.customize('header_subtitle', function(value) {
        value.bind(function(to) {
            $('.header-text p').text(to);
        });
    });

    //blog title 
    wp.customize('blog_title', function(value) {
        value.bind(function(to) {
            $('h2.list_title').text(to);
        });
    });

    // site branding text color.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });

            }
        });
    });

    // Header text color.
    wp.customize('header_text_color', function(value) {
        value.bind(function(to) {
            $('.header-text h2, .header-text h3').css({
                'color': to
            });
        });
    });

})(jQuery);