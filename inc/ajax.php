<?php
add_action( 'wp_ajax_remove_item', 'ajax_remove_item'  );
add_action( 'wp_ajax_nopriv_remove_item', 'ajax_remove_item'  );
function ajax_remove_item(){
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$d = isset($_GET['d']) ? $_GET['d'] : 0;
	$floor = isset($_GET['floor']) ? $_GET['floor'] : 0;
	$lift = isset($_GET['lift']) ? $_GET['lift'] : 0;
	remove_from_cart( $id );
    ob_start();
    get_template_part( 'cart-table' );
    $table = ob_get_contents();
    ob_get_clean();

	die(json_encode(array(
		'table_html'=>$table,
		'qtys' => get_qtys(),
		'subtotal' => get_subtotal(),
		'total' => get_total($d,$lift, $floor),
	)));
}
add_action( 'wp_ajax_add_to_cart', 'ajax_add_to_cart'  );
add_action( 'wp_ajax_nopriv_add_to_cart', 'ajax_add_to_cart'  );
function ajax_add_to_cart(){
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$d = isset($_GET['d']) ? $_GET['d'] : 0;
	$floor = isset($_GET['floor']) ? $_GET['floor'] : 0;
	$lift = isset($_GET['lift']) ? $_GET['lift'] : 0;
	add_to_cart( $id );

    ob_start();
    get_template_part( 'cart-table' );
    $table = ob_get_contents();
    ob_get_clean();

	die(json_encode(array(
		'table_html'=>$table,
		'qtys' => get_qtys(),
		'subtotal' => get_subtotal(),
		'total' => get_total($d,$lift, $floor),
	)));
}
add_action( 'wp_ajax_set_qty', 'ajax_set_qty'  );
add_action( 'wp_ajax_nopriv_set_qty', 'ajax_set_qty'  );
function ajax_set_qty(){
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$qty = isset($_GET['qty']) ? $_GET['qty'] : 0;
	$d = isset($_GET['d']) ? $_GET['d'] : 0;
	$floor = isset($_GET['floor']) ? $_GET['floor'] : 0;
	$lift = isset($_GET['lift']) ? $_GET['lift'] : 0;
	if($id && $qty){
		set_qty( $id, $qty );
	}
    ob_start();
    get_template_part( 'cart-table' );
    $table = ob_get_contents();
    ob_get_clean();

	die(json_encode(array(
		'table_html'=>$table,
		'qtys' => get_qtys(),
		'subtotal' => get_subtotal(),
		'total' => get_total($d,$lift, $floor),
	)));

}
?>