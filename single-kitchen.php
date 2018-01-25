<?php get_header() ?>
<?php the_post() ?>
<div class="page__wrap news">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">
				<?php get_template_part('content','single-project') ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>



