<?php get_header() ?>
<div class="page__wrap works">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">				
				<div class="page__content">
					<div class="works__wrap">
						<?php while(have_posts()){
							the_post();
							?>
							
							<div class="works__item">

								<a href="<?php echo get_the_post_thumbnail_url() ?>" class="works__link"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" class="img-responsive">
									<span class="works__hover"><?php the_title() ?></span>
								</a>
								<?php if($imgs = rwmb_meta('gallery')){ 
									foreach ($imgs as $key => $img) {
										?>
										<a href="<?php echo $img['full_url'] ?>">
											<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" class="hidden">
										</a>
										<?php
									}
									?>
									
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
