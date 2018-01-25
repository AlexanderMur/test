<?php get_header() ?>
<div class="page__wrap partners shop">
	
	<div class="filters hidden-lg"><a href="#filters" class="filters-btn"><i class="fa fa-sliders"></i></a></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">
				<?php 
				the_post();
				get_template_part('content','single-goods');
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
