<div class="product__item">
	<div class="product__text"><a href="shop.html" class="product__name"><?php echo get_the_terms($post->ID,'goods_category')[0]->name ?></a>
		<h3 class="product__link"> <a href="<?php echo get_the_permalink() ?>"><?php the_title() ?></a></h3>
		<ul class="product__list">
			<li>Производитель: <?php echo rwmb_meta('brand') ?></li>
			<li>Цвет: <?php echo rwmb_meta('color') ?></li>
			<?php 
			$fields = rwmb_meta('custom_fields');
			$fields = is_array($fields) ? $fields : array();
			foreach ($fields as $key => $field) {
				?>						
				<li><?php echo $field['name'] ?>: <?php echo $field['value'] ?></li>
				<?php
			}
			?>
		</ul><span class="product__price"><?php echo get_the_price() ?> <i class="fa fa-rub"></i></span><a href="?add_to_cart=<?php echo get_the_ID() ?>" class="product__add">купить
			<div class="fa fa-shopping-cart"></div></a>
	</div>
	<div class="product__img"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Варочные поверхности" class="img-responsive"></a></div>
</div>