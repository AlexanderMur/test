<?php
/**
 * On Spring functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package On_Spring
 */

require get_template_directory() . '/inc/theme-setup.php';




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() . '/inc/widget-areas.php';

require get_template_directory() . '/inc/ajax.php';

/**
 * Enqueue scripts and styles.
 */

require get_template_directory() . '/inc/enqueue-script-style.php';

require get_template_directory() . '/inc/tgm-list.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/register-tax-post.php';
require get_template_directory() . '/inc/cart.php';
// require get_template_directory() . '/inc/goods-metas.php';
if ( class_exists( 'Kirki' ) ) {
	require get_template_directory() . '/inc/kirki-options.php';
}
if ( class_exists( 'RW_Meta_Box' ) ) {
	require get_template_directory() . '/inc/meta-box-options.php';
}
if ( class_exists( 'WPCF7_ContactForm' ) ) {
	require get_template_directory() . '/inc/cf7.php';
}


function get_youtube_video_img($url){
	$videoURL = $url;
	$urlArr = explode("/",$videoURL);
	$urlArrNum = count($urlArr);

	$youtubeVideoId = $urlArr[$urlArrNum - 1];
	$youtubeVideoId = str_replace('watch?v=', '', $youtubeVideoId);
	$thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';
	return $thumbURL;
}
function get_the_price($format = true){
	global $post;
	$cost = rwmb_meta('cost');
	$cost = is_numeric($cost) ? +$cost : 0;
	if($cost){
		$cost = number_format($cost,0,'.',' ');
	}
	return $cost;
}
function goods_template( $template = '' ) {

	if (is_tax('goods_category') ) {
		$template = locate_template( 'archive-goods.php' );
	 }

	return $template;

}

add_filter( 'taxonomy_template', 'goods_template' );


function get_custom_keys(){
	return array(
    	'color',
    	'brand',
    );
}
add_filter('query_vars', function ( $qvars ){
    $qvars[] = 'order';
    $qvars[] = 'orderby';
    $qvars[] = 'price_min';
    $qvars[] = 'price_max';
    $qvars[] = 'goods_filter';
    $qvars[] = 'all_posts';
    $qvars[] = 'posts_per_page';

    $keys = get_custom_keys();
    $qvars = array_merge($qvars,$keys);
    return $qvars;
});
add_action( 'pre_get_posts', function ( $query ) {
    global $wp_query;
    if ( ! $query->is_main_query() )
        return $query;
    if ( !empty($wp_query->query['order'])) {
        $query->set('order',$wp_query->query['order']);
        if($wp_query->query['orderby'] == 'cost'){
	        $query->set('orderby','meta_value_num');
	        $query->set('meta_key',$wp_query->query['orderby']);
        } else {
		    $query->set( 'orderby', $wp_query->query['orderby'] );
        }
    }
    if(!empty($wp_query->query['goods_filter'])){

	    if ( is_numeric($wp_query->query['price_min']) && is_numeric($wp_query->query['price_max'])) {
    		$defaults = array(
    			array(
	    			'key'     => 'cost',
	    			'value'   => $wp_query->query['price_min'],
	    			'compare' => '>=',
					'type' => 'NUMERIC',
	    		),
	    		array(
	    			'key'     => 'cost',
	    			'value'   => $wp_query->query['price_max'],
	    			'compare' => '<=',
					'type' => 'NUMERIC',
	    			
	    		),
    		);
    		$custom = array();
    		foreach (get_custom_keys() as $key => $value) {
    			if(isset($wp_query->query[$value]) && $wp_query->query[$value] != '_none'){
    				array_push($custom, array(
    					'key' => $value,
    					'value' => $wp_query->query[$value],
    					'compare' => '='
    				));
    			}
    		}
    		$mquery = array_merge($defaults,$custom);
    		$args = array_merge(array('relation'=>'AND'),$mquery);
	        $query->set('meta_query', $args);
	    }

    }
	
    if($query->is_posts_page){
		$query->set('tax_query',array(
			'relation' => 'AND',
			array(
				'field' => 'name',
				'terms' => array(get_cur_city()),
				'taxonomy' => 'category'
			)

		));
    }
    if(!empty($wp_query->query['posts_per_page'])){
		$query->set('posts_per_page',$wp_query->query['posts_per_page']);
    }
    return $query;
});
function get_cur_city(){
	global $wt_geotargeting;
	if(isset($wt_geotargeting)){
		if(isset($wt_geotargeting->data['city'])){
			return $wt_geotargeting->data['city'];
		} else {
			return 'Новосибирск';
		}
	}
	return 'Новосибирск';
}

if(isset($wt_geotargeting)){
	if(isset($wt_geotargeting->data['city'])){
		if($wt_geotargeting->data['city'] != 'Омск' && $wt_geotargeting->data['city'] != 'Новосибирск'){
			$wt_geotargeting->data['city'] = 'Новосибирск';
		}
	} else {
		$wt_geotargeting->data['city'] = 'Новосибирск';
	}
}
add_action('init', 'start_session', 1);


function start_session() {
	if(!session_id()){
		session_start();
	}
}

function get_tax_filter_options($name ){
	$arr = [];
	foreach (get_terms('goods_category') as $key => $term) {
		$filter = get_term_meta($term->term_id,$name,true);
		if(!empty($filter)){
			if(is_array($filter)){
				$arr = array_merge($arr,$filter);
			}
		}
	}
	asort($arr);
	return $arr;
}

function get_geo_mod($mod){
	if(get_cur_city() == 'Омск'){
		return do_shortcode(get_theme_mod('omsk_'.$mod));
	} else {
		return do_shortcode(get_theme_mod('novosibirsk_'.$mod));
	}
}

function get_args(){
	global $wp_query;
	$args = $wp_query->query;
	unset($args['post_type']);
	return $args;
}

function get_pages_for_kirki(){
	$query = new WP_Query('post_type=page&posts_per_page=-1');
	$pages = array();
	foreach ($query->posts as $key => $page) {
		$pages[$page->ID] = $page->post_title;
	}
	return $pages;
}

add_action('nav_menu_css_class', function ($classes, $item) {
	global $post;
	if(!$post){
		return $classes;
	}
	if(!is_page()){
		if($item->object == $post->post_type){
			$classes[] = 'current-menu-item';
		}
	}
	return $classes;
},10,2);
?>