<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package On_Spring
 */


?>


<div class="page__nav">

	<?php 
	wp_nav_menu( array(
		'container' => false,
		'menu_class'      => 'nav navigation',
		'menu_id'      => 'menu',
	) ); 
	?>
</div>