<?php 
/*
Template Name: Home Page
*/
?>
<?php get_header() ?>
<div class="page__wrap page__main">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="slider">
						<?php 
						foreach (get_theme_mod('homepage_slider') as $key => $slide) {
							?>									
							<div style="background-image: url(<?php echo wp_get_attachment_image_src($slide['image'],'full')[0] ?>)" class="slider__img"></div>
							<?php
						}
						?>

					</div>
					<div class="page__text">
						<h1 class="h1"><?php echo get_theme_mod('homepage_title') ?></h1>
						<?php echo apply_filters('the_content',get_theme_mod('homepage_text')) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>