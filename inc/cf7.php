<?php 
add_filter( 'wpcf7_special_mail_tags', 'my_custom', 20, 3);

function my_custom( $output, $name, $html ) {
	$name = preg_replace( '/^wpcf7\./', '_', $name ); // for back-compat
	if ( 'cart' == $name ) {		
		ob_start();
		get_template_part( 'cart-email' );
		return ob_get_clean();

	}
	if('subtotal' == $name){
		return get_subtotal();
	}
	if('total' == $name){
		return get_total($_POST['deliver'],$_POST['lift'],$_POST['floor']);
	}
	if('deliver_text' == $name){
		return get_deliver_text($_POST['deliver']);
	}
	if('floor_text' == $name){
		return get_floor_text($_POST['lift']);
	}
	if('remove_client_cart_items' == $name){
		clear_cart();
		return ' ';
	}

	return $output;
}

wpcf7_add_form_tag('cart',function(){
    ob_start();
    get_template_part( 'cart-form' );
    return ob_get_clean();
});
wpcf7_add_form_tag('politics',function(){
    return get_theme_mod('politics');
});
?>