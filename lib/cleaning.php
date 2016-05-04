<?php

namespace Roots\Sage\Cleaner;

/**
 * Clean up WP head
 */
function clean_up_wp_head() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
}

add_action('init', __NAMESPACE__ . '\\clean_up_wp_head');

/**
 * Remove WP version from RSS feeds
 */
add_filter('the_generator', '__return_false');


/**
 * Remove scripts from WP head to the footer
 */
function remove_js_from_header() {
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\remove_js_from_header');


function customize_menu_item_class($classes, $item) {
    $classes = ['Nav-item', 'List-item', 'Item--' . $item -> ID, 'Item--' . sanitize_title($item -> title)];

    if($item -> current) {
        $classes[] = 'is-current';
    }

    return $classes;
}
add_filter('nav_menu_css_class', __NAMESPACE__ . '\\customize_menu_item_class', 10, 2);
