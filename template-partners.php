<?php 
/**
 * Template Name: Партнеры
 **/ 
?>
<?php get_header() ?>
<div class="page__wrap partners">
	<div class="filters hidden-lg"><a href="#filters" class="filters-btn"><i class="fa fa-sliders"></i></a></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>			
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="partners__wrap">
						<div class="partners__item">
							<?php echo apply_filters('the_content',get_theme_mod('partners_left')) ?><a href="#callback" class="button phone-popup">Связаться с нами</a>
						</div>
						<div class="partners__item">
							<?php echo apply_filters('the_content',get_theme_mod('partners_right')) ?><a href="#callback" class="button phone-popup">Связаться с нами</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php get_footer() ?>
