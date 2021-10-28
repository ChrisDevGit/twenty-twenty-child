<?php

function twenty_twenty_enqueue_styles() {

  $load_style = 'twenty_twenty';

  wp_enqueue_style( $load_style, get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $load_style ),
    wp_get_theme()->get('Version')
  );
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_enqueue_styles' );

function twenty_twenty_add_read_more( $more ) {
  return '... <a href="' . get_permalink( get_the_ID() ) . '"> Read more <span class="screen-reader-text">“' . get_the_title( get_the_ID() ) . '”</span></a>';
}
add_filter('excerpt_more', 'twenty_twenty_add_read_more' );
