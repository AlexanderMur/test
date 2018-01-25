<?php 
/**
 * Template Name: Contact
 **/ 
?>
<?php get_header() ?>
<div class="page__wrap partners shop">
	<div class="filters hidden-lg"><a href="#filters" class="filters-btn"><i class="fa fa-sliders"></i></a></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>			
			<div class="col-lg-9 col-md-9">
				<div class="page__content">
					<div class="contact__wrap">
						<div class="contact__item">
							<?php echo get_geo_mod('address' ) ?>
						</div>
						<div class="contact__item">
							<?php echo get_geo_mod('work_hours' ) ?>
						</div>
						<div class="contact__item">
							<ul>
								<li>Телефон: <a href="tel:<?php echo get_geo_mod('tel' ) ?>"><?php echo get_geo_mod('tel' ) ?></a></li>
								<li>E-mail: <a href="mailto:<?php echo get_geo_mod('email') ?>"><?php echo get_geo_mod('email') ?></a></li>
							</ul>
						</div>
					</div>
					<div class="contact__maps">
						<?php echo get_geo_mod('map') ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="hidden">
		<div id="filters" class="filters__modal my-mfp-zoom-in">
			<?php get_template_part('template-parts/filters') ?>				
		</div>
	</div>
</div>
<?php get_footer() ?>
