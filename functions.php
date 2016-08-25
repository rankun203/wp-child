<?php


//***** Configure the DEFAULT Style
function my_wp_default_styles( $styles ) {
	// use release date for version
	$styles->default_version = filemtime( get_template_directory() );
}

add_action( "wp_default_styles", "my_wp_default_styles" );

function enqueue_child_theme_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', filemtime( get_template_directory() ) );

	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ), filemtime( get_stylesheet_directory() . '/style.css' ) );

	wp_enqueue_script( 'yd-js', get_stylesheet_directory_uri() . '/script.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', 20 );
