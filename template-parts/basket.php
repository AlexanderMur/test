<div class="basket-wrapper">
	<ul class="basket-items">
		<?php
		foreach (WC()->cart->get_cart() as $key => $item) {
			$product = $item['data'];
			$image_id = $product->get_image_id();
			$image_url = wp_get_attachment_image_src($image_id,'thumbnail')[0];
			?>
			<li class="basket-item">
				<div class="basket-container">
					<div class="d-flex basket-item-inner">
						<div class="basket-item-img" style="background-image: url(<?php echo $image_url ?>)"></div>
						<a href="" class="basket-item-name"><?php echo $product->get_name() ?></a href="">
						<input type="number" class="basket-item-qty" value="<?php echo $item['quantity'] ?>" data-basket_item_id="<?php echo $key ?>">
						<span class="basket-item-price ml-auto">€<?php echo $product->get_price() ?></span>
						<a href="<?php echo WC()->cart->get_remove_url( $key ) ?>" class="fa fa-times fw basket-item-remove" data-basket_item_id="<?php echo $key ?>"></a>
					</div>
				</div>
			</li>
			<?php
		}
		?>
		
	</ul>
	<div class="basket-container basket-listitem d-flex">
		<div class="basket-subtotal">
			<b>Subtotal: </b>
			<span class="basket-subtotal-num">
				€<?php echo WC()->cart->total ?>
			</span>
		</div>
		<a href="#" class="btn-accent ml-auto">checkout</a>
	</div>
	<!-- <?php wp_nonce_field( 'woocommerce-cart' ); ?> -->
</div>