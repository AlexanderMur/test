
<div class="page__content">
	<div class="products__wrap">
		<div class="products__img">
			<a href="<?php echo get_the_post_thumbnail_url() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" class="img-responsive"></a>
			<?php
			
			foreach (rwmb_meta('gallery') as $key => $img) {
				?>				
				<a href="<?php echo $img['full_url'] ?>"><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" class="hidden"></a>
				<?php
			}
			?>
		</div>
		<div class="products__features">
			<h1 class="products__title"><?php the_title() ?></h1>
			<div class="products__price">Цена:<span><?php echo get_the_price() ?><i class="fa fa-rub"></i></span></div><a href="?add_to_cart=<?php echo get_the_ID() ?>" class="button">В корзину</a>
			<div class="features">
				<h3>Характеристики:</h3>
				<ul>
					<li> <span>Производитель</span><span><?php echo rwmb_meta('brand') ?>     </span></li>
					<li> <span>Цвет    </span><span><?php echo rwmb_meta('color') ?> </span></li>
					<?php 
					$fields = rwmb_meta('custom_fields');
					$fields = is_array($fields) ? $fields : array();
					foreach ($fields as $key => $field) {
						?>						
						<li> <span><?php echo $field['name'] ?>    </span><span><?php echo $field['value'] ?> </span></li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="products__content">
		<?php the_content() ?>
	</div>
</div>