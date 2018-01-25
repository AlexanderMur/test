<?php 
$cost = get_the_price();
$imgs = rwmb_meta('gallery');
?>
<div class="page__content">
	<div class="wardrobes__wrap">
		<div class="wardrobes__slider">
			<ul id="imageGallery">
				<li data-thumb="<?php echo get_the_post_thumbnail_url()?>" data-src="<?php echo get_the_post_thumbnail_url()?>">
					<img src="<?php echo get_the_post_thumbnail_url()?>" alt="Шкаф “ПРИМЕР”" class="img-responsive">
				</li>
				<?php 
				foreach ($imgs as $key => $img) {
					?>
					<li data-thumb="<?php echo $img['full_url'] ?>" data-src="<?php echo $img['full_url'] ?>">
						<img src="<?php echo $img['full_url'] ?>" alt="Шкаф “ПРИМЕР”" class="img-responsive">
					</li>
					<?php
				}
				?>
			</ul>
		</div>
		<div class="wardrobes__content">
			<h1 class="products__title"><?php echo the_title() ?></h1>			
			<?php the_content() ?>
			<?php 
			if($cost){
				?>
				<div class="products__price">Цена:<span><?php echo $cost ?><i class="fa fa-rub"> </i>  за м/п</span></div><a href="#callback" class="button phone-popup">ЗАКАЗАТЬ РАСЧЕТ</a>
				<?php
			} else {
				?>
				<a href="#callback" class="button phone-popup">Узнать цену</a>
				<?php
			}
			?>
		</div>
	</div>
	<?php if($video = rwmb_meta('youtube_video')){ ?>
		<div class="row">
			<div class="col-sm-12">			
				<div class="accessory__wrap">
					<div class="accessory__video"><a href="<?php echo $video ?>" style="background-image: url(<?php echo get_youtube_video_img($video) ?>)"></a></div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php
	if($posts = rwmb_meta('recommended_posts')){
		$query = new WP_Query(array(
			'post__in' => $posts,
			'post_type' => 'any'
		));
		?>
		<div class="row">
			<div class="col-sm-12">
				<div class="products__price">Рекомендуемая техника:</div>
			</div>
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
				<div class="recommend">
					<div class="recommend__nav">
						<div class="prev"><i class="fa fa-angle-left"></i></div>
						<div class="next"><i class="fa fa-angle-right"></i></div>
					</div>
					<div class="recommend__slider">
						<?php 
						while ($query->have_posts()) {
							$query->the_post();
							$cost = get_the_price();
							?>							
							<div>
								<a href="<?php echo get_the_permalink() ?>" class="recommend__img">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Варочная поверхность Maunfeld MGHG.32.15B">
								</a>
								<h2 class="recommend__title"> <a href="shop.html"><?php the_title() ?></a></h2>
								<?php if($cost) {?>
									<div class="recommend__price"><?php echo $cost ?> <i class="fa fa-rub"></i></div>
								<?php } ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>
