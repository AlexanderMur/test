<?php get_header(); ?>
<div class="page__wrap news">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>				
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="news__wrap">
						<?php while(have_posts()){ 
							the_post();
							?>
							<div class="news__item">
								<a href="<?php echo get_the_permalink() ?>" class="news__link">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="alt" class="img-responsive">
									<h3 class="news__title"><?php the_title() ?></h3>
								</a>
								<div class="news__date"><?php the_date('d.m.Y') ?></div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
