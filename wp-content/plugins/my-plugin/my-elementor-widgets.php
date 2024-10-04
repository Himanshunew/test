<?php
/*
Plugin Name: My Elementor Widgets
Description: Custom Elementor widgets
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include the widget class
function register_custom_elementor_widget() {
    // Check if Elementor is loaded
    if (did_action('elementor/loaded')) {
        require_once(__DIR__ . '/widgets/testimonial-slider-widget.php');
    }
}





function my_elementor_testimonials_widget_scripts() {

    // Corrected the CSS file paths by adding the correct file extensions and directory slashes.
    wp_enqueue_style('slick-theme-css', plugins_url('/assets/css/slick-theme.css', __FILE__));
    wp_enqueue_style('slick-css', plugins_url('/assets/css/slick.css', __FILE__));
    wp_enqueue_style('my-testimonials-widget-style', plugins_url('/assets/css/style.css', __FILE__));

    // Corrected the JS file paths and ensured the correct directory structure for slick.min.js.
    wp_enqueue_script('slick-min-js', plugins_url('/assets/js/slick.min.js', __FILE__), ['jquery'], false, true);
    wp_enqueue_script('my-testimonials-widget-script', plugins_url('/assets/js/my-testimonials-widget.js', __FILE__), ['jquery'], false, true);
}
add_action('wp_enqueue_scripts', 'my_elementor_testimonials_widget_scripts');

// Register your custom Elementor widget.
add_action('elementor/widgets/widgets_registered', 'register_custom_elementor_widget');
