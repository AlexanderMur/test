<?php get_header() ?>
<div class="page__wrap news">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="wardrobe__wrap">
					    <?php

					    while(have_posts()){
					    	the_post();
					    	get_template_part('content','archive-project');
					    }
					    ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>