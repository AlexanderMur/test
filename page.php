<?php get_header() ?>
<?php the_post() ?>
<div class="page__wrap cart partners">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>

			</div>			
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
