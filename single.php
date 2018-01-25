<?php get_header() ?>
<?php the_post() ?>
<div class="page__wrap new">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>

			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="new__item">
						<div class="new__img"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="alt" class="img-responsive"></div>
						<h3 class="news__title"><?php echo the_title() ?></h3>
						<div class="news__date"><?php echo the_date('d.m.Y') ?></div>
						<?php the_content() ?>
						<a href="<?php echo get_the_permalink(get_option('page_for_posts')) ?>" class="new__back">Вернуться назад </a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php get_footer() ?>
