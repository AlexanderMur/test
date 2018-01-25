<?php 
function my_taxonomy_add_meta_fields( $taxonomy ) {
    ?>
    <div class="form-field term-group">
        <label for="my_field"><?php _e( 'My Field', 'my-plugin' ); ?></label>
        <input type="text" id="my_field" name="my_field[]" />
        <input type="submit" name="submit" id="submit" class="button button-secondary button-adder" value="Добавить хар-ку">
    </div>
    <?php
}
function ___save_term_meta_text( $term_id ) {



    var_dump($_POST['my_field']);
    die();
    update_term_meta( $term_id, '__term_meta_text', $_);
}
function ___admin_enqueue_scripts( $hook_suffix ) {

    

    add_action( 'admin_footer', '___meta_term_text_print_scripts' );
}
function ___meta_term_text_print_scripts() { ?>

    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
             $('.button-adder').on('click',function(){
                $(this).before('<input type="text" id="my_field" name="my_field[]" />');
                
             })
        } );
    </script>
<?php }
add_action( 'goods_category_add_form_fields', 'my_taxonomy_add_meta_fields', 10, 2 );
add_action( 'goods_category_edit_form_fields', 'my_taxonomy_add_meta_fields', 10, 2 );
add_action( 'edit_goods_category',   '___save_term_meta_text' );
add_action( 'create_goods_category', '___save_term_meta_text' );
add_action( 'admin_enqueue_scripts', '___admin_enqueue_scripts' );

?>