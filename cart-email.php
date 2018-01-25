<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Товары</th>
				<th>Кол-во    </th>
				<th>Цена</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$cart = get_cart_items();
            $posts = array_map(function($item){
				return $item['id'];
			}, $cart);
            $query = new WP_Query(array(
				'post__in' => $posts,
				'post_type' => 'any',
			));
            if(!empty($posts)){
                while($query->have_posts()){
                    $query->the_post();
                    ?>
                    <tr>
                        <td> <a href="<?php echo get_the_permalink() ?>" class="cart__link"><?php the_title() ?></a></td>
                        <td> <span> <?php echo $cart[$post->ID]['qty'] ?> </span>
                        <td><span class="cart__price"><?php echo rwmb_meta('cost') ?> <i class="fa fa-rub"></i></span></td>
                    </tr>
                    <?php
                }
            }
            ?>

		</tbody>
	</table>
</div>