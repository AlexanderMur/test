<?php 
add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );
function prefix_register_meta_boxes( $meta_boxes ) {
    $prefix = 'field_prefix_';
    $meta_boxes[] = array(
        'id'         => 'personal',
        'title'      => 'Personal Information',
        'post_types' => ['kitchen','wardrobe'],
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(

            array(
                'type'                  => 'number',
                'id'                    => 'cost',
                'placeholder'           => 'Цена',
                'name'       => 'Цена ₽', 
            ),
            array(
                'type'                  => 'image_advanced',
                'id'                    => 'gallery',
                'name'                  => 'Галерея изображений',
                'image_size'            => 'full',
            ),
            array(
                'type'                  => 'text',
                'id'                    => 'youtube_video',
                'name'                  => 'YouTube Видео',
            ),
            array(
                'type'                  => 'post',
                'id'                    => 'recommended_posts',
                'placeholder'           => 'Рекоменуемая техника',
                'name'       => 'Рекоменуемая техника',
                'post_type'             => ['goods'],
                'query_args'            => array(
                    'post_status'       => 'publish',
                    'posts_per_page'    => - 1,
                ),
                'clone' => true,
                'sort_clone' => true
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'personal2',
        'title'      => 'Personal2 Information',
        'post_types' => ['goods'],
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(

            array(
                'type'                  => 'number',
                'id'                    => 'cost',
                'placeholder'           => 'Цена',
                'name'       => 'Цена ₽', 
            ),
            array(
                'type'                  => 'text',
                'id'                    => 'brand',
                'name'                  => 'Производитель',
                'image_size'            => 'full',
            ),
            array(
                'type'                  => 'text',
                'id'                    => 'color',
                'name'                  => 'Цвет',
            ),
            array(
                'type'                  => 'fieldset_text',
                'id'                    => 'custom_fields',
                'name'                  => 'Дополнительные характеристики',
                'std' => array(
                    array(
                        'name' => 'name1',
                        'value' => 'value1',
                    ),
                    array(
                        'name' => 'name2',
                        'value' => 'value2',
                    ),
                    array(
                        'name' => 'name3',
                        'value' => 'value3',
                    ),
                    array(
                        'name' => 'name4',
                        'value' => 'value4',
                    ),
                ),
                'options' => array(
                    'name'    => 'Название',
                    'value' => 'Значение',
                ),
                'clone' => true,
                'sort_clone' => true
            ),
            array(
                'type'                  => 'image_advanced',
                'id'                    => 'gallery',
                'name'                  => 'Галерея изображений',
                'image_size'            => 'full',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'personal2',
        'title'      => 'Personal2 Information',
        'post_types' => ['testimonial'],
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(

            array(
                'type'                  => 'text',
                'id'                    => 'author',
                'placeholder'           => 'Автор',
                'name'       => 'Автор', 
            ),
            array(
                'type'                  => 'date',
                'id'                    => 'date',
                'name'                  => 'Дата',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'personal3',
        'title'      => 'Personal3 Information',
        'post_types' => ['portfolio'],
        'context'    => 'normal',
        'priority'   => 'high',

        'fields' => array(

            array(
                'type'                  => 'image_advanced',
                'id'                    => 'gallery',
                'name'                  => 'Галлерея',
                'image_size'            => 'full',
            ),
        )
    );


    // Add more meta boxes if you want
    // $meta_boxes[] = ...
    return $meta_boxes;
}

add_action('rwmb_personal2_after_save_post',function($e){
    if(isset($_POST['brand']) && $_POST['brand'] != '' ){
        foreach (wp_get_post_terms( $e, 'goods_category' ) as $key => $term) {
            $colors = get_metas($term, 'brand');
            asort($colors);
            update_term_meta( $term->term_id, 'filter_brand', $colors );
        }
    }
    if(isset($_POST['color']) && $_POST['color'] != '' ){
        foreach (wp_get_post_terms( $e, 'goods_category' ) as $key => $term) {
            $colors = get_metas($term, 'color');
            asort($colors);
            update_term_meta( $term->term_id, 'filter_color', $colors );
        }
    }
});

function get_metas($term, $meta, $cb = '__return_true'){
    $query = new WP_Query(array(
        'tax_query' => array(
            array(
                'taxonomy' => 'goods_category',
                'field' => 'term_id',
                'terms' => $term->term_id
            )
        ),
        'posts_per_page' => -1
    ));
    $colors = [];
    while($query->have_posts()){
        $query->the_post();
        $color = rwmb_meta($meta);
        if(!in_array($color,$colors)){
            array_push($colors,$color);
        }
    }
    return $colors;
}

?>