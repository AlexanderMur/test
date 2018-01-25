<?php 
function nest_create_post_type() {
	register_post_type( 'wardrobe',
		array(
			'labels' => array(
				'name' => esc_html__( 'Шкафы','nest' ),
				'singular_name' => __( 'Шкаф' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'kitchen',
		array(
			'labels' => array(
				'name' => esc_html__( 'Кухни','nest' ),
				'singular_name' => __( 'Кухня' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'goods',
		array(
			'labels' => array(
				'name' => esc_html__( 'Товары','nest' ),
				'singular_name' => __( 'Товар' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => esc_html__( 'Фото работ','nest' ),
				'singular_name' => __( 'Фото работы' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'testimonial',
		array(
			'labels' => array(
				'name' => esc_html__( 'Отзывы','nest' ),
				'singular_name' => __( 'Отзыв' ),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
}
add_action( 'init', 'nest_create_post_type' );

add_action( 'init', 'nest_tax' );
function nest_tax() {
	register_taxonomy(
		'wardrobe_cat',
		['wardrobe'],
		array(
			'label' => __( 'Категория шкафы' ),
			'rewrite' => array( 'slug' => 'wardrobe-category' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy(
		'kitchen_cat',
		'kitchen',
		array(
			'label' => __( 'Категория кухни' ),
			'rewrite' => array( 'slug' => 'kitchen-category' ),
			'hierarchical' => true,
		)
	);
	register_taxonomy(
		'goods_category',
		'goods',
		array(
			'label' => __( 'Категория товары' ),
			'rewrite' => array( 'slug' => 'product-category' ),
			'hierarchical' => true,
		)
	);
}

?>