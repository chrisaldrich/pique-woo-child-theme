<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//
add_action( 'wp_enqueue_scripts', 'pique_child_enqueue_styles' );
function pique_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('parent-style')
	);
}


// Declare WooCommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Change number or products per row to 3 on archive pages
add_filter( 'loop_shop_columns', 'pique_child_loop_columns', 99 );
function pique_child_loop_columns() {
	return 3; // 3 products per row
}

// Change number or related products to 3
function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 3;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'pique_child_related_products_args' );
function pique_child_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}
