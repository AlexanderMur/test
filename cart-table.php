<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th> </th>
				<th>Товары</th>
				<th>Кол-во    </th>
				<th>Цена</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$cart = get_cart_items();
			if(!empty($cart)){
				$posts = array_map(function($item){
					return $item['id'];
				}, $cart);
				$query = new WP_Query(array(
					'post__in' => $posts,
					'post_type' => 'any',
				));
				while($query->have_posts()){
					$query->the_post();
					?>
					<tr>
						<td> 
							<button class="del-item" data-id="<?php echo $post->ID ?>" > <span class="del-close"></span></button>
						</td>
						<td> <a href="<?php echo get_the_permalink() ?>" class="cart__link"><?php the_title() ?></a></td>
						<td> <span class="cart__input">
								<input type="text" value="<?php echo $cart[$post->ID]['qty'] ?>" data-id="<?php echo $post->ID ?>"><span class="plus">+</span><span class="minus">-</span></span></td>
						<td><span class="cart__price"><?php echo rwmb_meta('cost') * $cart[$post->ID]['qty'] ?> <i class="fa fa-rub"></i></span></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr><td></td><td>Товаров нет</td></tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>