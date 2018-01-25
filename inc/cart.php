<?php
function add_to_cart($id){

	$item = get_cart_item($id);
	if($item){
		set_qty($id,$item['qty'] + 1);
	} else {
		$_SESSION['cart'][$id] = array(
			'id' => $id,
			'qty' => 1,
		);
	}
}
function remove_from_cart($id){

	$item = get_cart_item($id);
	if($item){
		unset($_SESSION['cart'][$id]);
	}
}
function set_qty($id, $qty){
	$item = get_cart_item($id);
	if($qty <= 0){
		remove_from_cart($id);
		return;
	}
	if($item){
		$_SESSION['cart'][$id]['qty'] = $qty;
	}
}
function get_cart_items(){
	if(!empty($_SESSION['cart'])){
		//Проверка на удаленные товары
		$arr = array();
		foreach ($_SESSION['cart'] as $key => $item) {
			array_push($arr,$item['id']);
		}
		$query = new WP_Query(array(
			'post__in' => $arr,
			'post_type' => 'any'
		));
		$arr = array();
		foreach ($query->posts as $key => $post) {
			$arr[$post->ID] = array(
				'id' => $post->ID,
				'qty' => $_SESSION['cart'][$post->ID]['qty']
			);
		}
		return $arr;
	} else {
		return __return_empty_array();
	}
}
function get_cart_item($id){
	$items = get_cart_items();
	if(isset($items[$id])){
		return $items[$id];
	} else {
		return __return_empty_array();
	}
}
function clear_cart(){
	$_SESSION['cart'] = array();
}
function get_subtotal(){
	$items = get_cart_items();
	if($items){
		$sum = 0;
		foreach ($items as $key => $item) {
			$item_price = get_post_meta((int) $item['id'],'cost',true);
			if($item_price == ''){
				continue;
			}
			$qty = $item['qty'];
			$sum += +$qty * +$item_price;
		}
		return $sum;
	}
	return 0;	
}

function get_qtys(){
	$items = get_cart_items();
	$qty = 0;
	foreach ($items as $key => $item) {
		$qty += $item['qty'];
	}
	return $qty;
}
function get_total($d,$lift,$floor = 1){
	$subtotal = get_subtotal();
	if($d == '1'){
		$subtotal = $subtotal + 600;
	}
	if($d == '2'){
		$subtotal = $subtotal + 600;
	}

	if($lift == '2'){
		$subtotal = $subtotal + 300;
	}

	if($lift == '3'){
		$subtotal = $subtotal + $floor * 100;
	}
	return $subtotal;

}

function get_deliver_text($d){

	switch ($d) {
		case '0':
			return 'Самовывоз';
		case '1':
			return 'Доставка по городу (600 руб.)';
		case '2':
			return 'Доставка до траспортной компании (600 руб.)';
		case '3':
			return 'Межгород (цена рассчитывается индивидуально)';
		default:
			return 'не указано';
			break;
	}
};
function get_floor_text($d){

	switch ($d) {
		case '1':
			return 'Без подъема на этаж ';
		case '2':
			return 'Подъем на этаж  на лифте (300 руб.)';
		case '3':
			return 'Подъем на этаж без лифта (100 руб./ этаж) ';
		default:
			return 'не указано';
			break;
	}
};

function get_my_cart_link(){
	$id = get_theme_mod('cart_page');
	if($id){
		return get_permalink($id);
	}
	return '';
}
add_action('init',function(){
	if(isset($_GET['add_to_cart'])){
		add_to_cart($_GET['add_to_cart']);
		wp_redirect('?');
		exit();
	}

	if(isset($_GET['remove_from_cart'])){
		remove_from_cart($_GET['remove_from_cart']);
	}

	if(isset($_GET['set_qty'])){
		set_qty($_GET['set_qty'],$_GET['num']);
	}	
});

add_action('wp_head',function(){
	global $post;
	global $wp;
	if($post){
		if($post->ID != get_theme_mod('cart_page')){
			$_SESSION['back'] = home_url($wp->request);
		}
	}
})
?>