<?php get_header() ?>
<div class="page__wrap reviews">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="page__content">					
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="reviews__wrap">
								<div class="reviews__nav">
									<div class="prev"><i class="fa fa-angle-left"></i></div>
									<div class="next"><i class="fa fa-angle-right"></i></div>
								</div>
							</div>
							<div class="reviews__slider">
								<?php while(have_posts()) { 
									the_post();

									?>
									<div class="reviews__item">
										<div class="reviews__img"><img src="<?php echo get_the_post_thumbnail_url(null,'full') ?>" alt="alt" class="img-responsive"></div>
										<h3 class="reviews__title"><?php echo rwmb_meta('author') ?></h3>
										<div class="reviews__date"><?php echo rwmb_meta('date',array('fomat' => 'd.m.Y')) ?></div>
										<?php the_content() ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
