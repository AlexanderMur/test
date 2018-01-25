<?php
function nest_scripts() {
	wp_enqueue_script( 'jquery');
	// wp_enqueue_style( 'nest-style', get_stylesheet_uri() );

	wp_enqueue_style( 'nest-style', get_template_directory_uri() . '/style.min.css' );

	// wp_enqueue_script( 'nest-scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'nest-scripts', get_template_directory_uri() . '/js/scripts4.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'nest-cart', get_template_directory_uri() . '/js/cart.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'mask-js', get_template_directory_uri() . '/js/jquery.mask.min.js', array('jquery'), '20151215', true );

	
	wp_localize_script( 'nest-scripts', 'nest', array(
		'wp_ajax_url' => admin_url('admin-ajax.php'),
		'subtotal' => get_subtotal()
	));
}
add_action( 'wp_enqueue_scripts', 'nest_scripts' );
?>