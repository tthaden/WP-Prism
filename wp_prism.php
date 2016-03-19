<?php
/*
Plugin Name: WP-Prism
Plugin URI: https://github.com/tthaden/WP-Prism.git
Description: Simple Syntax-Highlighting in your Blogposts
Version: 1.0
Author: Tobias Thaden
Author URI: http://tobiasthaden.com/
*/

function wp_prism_css() {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/themes/prism.min.css">';
}
add_action('wp_head','wp_prism_css');

function wp_prism_js() {
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.4.1/prism.min.js"></script>';
}
add_action( 'wp_footer', 'wp_prism_js' );

function wp_prism_sc( $atts, $content = null ) {
    $a = shortcode_atts(['lang' => 'js'],$atts );
    return '<code class="language-' . esc_attr($a['lang']) . '">' . $content . '</code>';
}
add_shortcode( 'code', 'wp_prism_sc' );