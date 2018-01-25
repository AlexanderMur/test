<?php get_header() ?>
<?php 

?>

<div class="page__wrap partners shop">
	<div class="filters hidden-lg"><a href="#filters" class="filters-btn"><i class="fa fa-sliders"></i></a></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
				<?php get_sidebar() ?>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="page__content">			
					<div class="shop__wrap">
						<div class="cart__head">
							<?php
							$obj = get_queried_object();
							if(is_tax()){
								$name = $obj->name;
							} else {
								$name = 'Наш Магазин';
							}
							?>
							<h3><?php echo $name ?></h3>
						</div>
						<div class="sortby">
							<span class="sortby__title">
								<?php 
								$args = get_args();

								$titleDESC = add_query_arg(array_merge($args,array(
									'order' => 'DESC',
									'orderby' => 'title'
								)));
								$costDESC = add_query_arg(array_merge($args,array(
									'order' => 'DESC',
									'orderby' => 'cost'
								)));

								$titleASC = add_query_arg(array_merge($args,array(
									'order' => 'ASC',
									'orderby' => 'title'
								)));
								$costASC = add_query_arg(array_merge($args,array(
									'order' => 'ASC',
									'orderby' => 'cost'
								)));

								?>
								<span class="sortby__name">Сортировать по:</span>
								<span>Наименованию:<a href="<?php echo esc_url($titleDESC)?>">Возраст. </a><span class="diver">/ </span><a href="<?php echo esc_url($titleASC) ?>">Убыванию</a></span>
								<span>Цене: <a href="<?php echo esc_url($costASC) ?>">Возраст. </a><span class="diver">/ </span><a href="<?php echo esc_url($costDESC) ?>">Убыванию</a></span>
							</span>
						</div>
						<div class="row">
							<div class="col-lg-3 hidden-xs hidden-sm hidden-md">
								<?php get_template_part('template-parts/filters') ?>
							</div>
							<div class="col-lg-9 col-md-12">
								<div class="product__wrap">
									<?php
									if(have_posts()){
										while(have_posts()){
											the_post();
											get_template_part('content','archive-goods');
										}
									}
									?>
								</div>
								<div class="pagination">
									<?php 
									$big = 999999999; // need an unlikely integer

									echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $wp_query->max_num_pages,
										'next_text'          => __('след >> '),
										'prev_text'          => __('<< пред '),
									) );
									?>
									<span class="diver">|  </span><a href="?posts_per_page=-1">показать все</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="hidden">
		<div id="filters" class="filters__modal zoom-modal">
			<?php get_template_part('template-parts/filters') ?>				
		</div>
	</div>
</div>
<?php get_footer() ?>
