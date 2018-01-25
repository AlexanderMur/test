<form action="">
	<?php 
	$order = isset($wp_query->query['order']) ? $wp_query->query['order'] : 'ASC';
	$orderby = isset($wp_query->query['orderby']) ? $wp_query->query['orderby'] : 'title';

	?>
	<input type="hidden" value="1" name="goods_filter">
	<input type="hidden" value="<?php echo esc_attr($order) ?>" name="order">
	<input type="hidden" value="<?php echo esc_attr($orderby) ?>" name="orderby">
	<div class="cart__head">
		<h3> Фильтр:</h3>
	</div>
	<div class="shop__filter">
		<div class="shop__filter-item">
			<h4>Цена:</h4>
			<?php 
			$price_min = get_query_var( 'price_min', '0' );
			$price_max = get_query_var( 'price_max', '400000' );
			?>
			<div class="shop__filter-price"><span>От</span>
				<input type="text" name="price_min" value="<?php echo esc_attr($price_min) ?>" pattern="\d+"><span>До</span>
				<input type="text" name="price_max" value="<?php echo esc_attr($price_max) ?>" pattern="\d+">
			</div>
		</div>
		<div class="shop__filter-item">
			<?php 
			if(isset($taxonomy)){
				$term_id = get_queried_object()->term_id;
				$arr = get_term_meta($term_id,'filter_brand',true);
			} else {				
				$arr = get_tax_filter_options('filter_brand');
			}
			$selected = get_query_var( 'brand', '_none' );
			?>
			<h4>Производитель:</h4>
			<div class="shop__filter-select">
				<select name="brand">
					<option value="_none">Не важно</option>
					<?php foreach ($arr as $key => $brand) {
						?>
						<option value="<?php echo esc_attr($brand) ?>" <?php echo $selected == $brand ? 'selected' : '' ?>><?php echo $brand ?></option>
						<?php
					} ?>
				</select>
			</div>
		</div>
		<div class="shop__filter-item">
			<?php

			if(isset($taxonomy)){
				$term_id = get_queried_object()->term_id;
				$arr = get_term_meta($term_id,'filter_color',true);
			} else {				
				$arr = get_tax_filter_options('filter_color');
			}
			$selected = get_query_var( 'color', '_none' );
			?>
			<h4>Цвет:</h4>
			<div class="shop__filter-select">
				<select name="color">
					<option value="_none">Не важно</option>
					<?php foreach ($arr as $key => $brand) {
						?>
						<option value="<?php echo esc_attr($brand) ?>"  <?php echo $selected == $brand ? 'selected' : '' ?>><?php echo $brand ?></option>
						<?php
					} ?>
				</select>
			</div>
		</div>
		<?php 
		if(false && isset($taxonomy)){
			?>
			<div class="shop__filter-item">
				<h4>Тип:</h4>
				<div class="shop__filter-select">
					<select name="">
						<option value="1">Не важно</option>
						<option value="2">Не важно 2</option>
						<option value="3">Не важно 3</option>
						<option value="4">Не важно 4</option>
					</select>
				</div>
			</div>
			<div class="shop__filter-item">
				<h4>Количество комфорок:</h4>
				<div class="shop__filter-select">
					<select name="">
						<option value="1">Не важно</option>
						<option value="2">Не важно 2</option>
						<option value="3">Не важно 3</option>
						<option value="4">Не важно 4</option>
					</select>
				</div>
			</div>
			<div class="shop__filter-item">
				<h4>Двухконтурная конфорка:</h4>
				<div class="shop__filter-select">
					<select name="">
						<option value="1">Не важно</option>
						<option value="2">Не важно 2</option>
						<option value="3">Не важно 3</option>
						<option value="4">Не важно 4</option>
					</select>
				</div>
			</div>
			<div class="shop__filter-item">
				<h4>Овальная конфорка:</h4>
				<div class="shop__filter-select">
					<select name="">
						<option value="1">Не важно</option>
						<option value="2">Не важно 2</option>
						<option value="3">Не важно 3</option>
						<option value="4">Не важно 4</option>
					</select>
				</div>
			</div>
			<div class="shop__filter-item">
				<h4>Материал варочной поверхности:</h4>
				<div class="shop__filter-select">
					<select name="">
						<option value="1">Не важно</option>
						<option value="2">Не важно 2</option>
						<option value="3">Не важно 3</option>
						<option value="4">Не важно 4</option>
					</select>
				</div>
			</div>
			<?php
		}
		?>

		<div class="button_wrap">
			<input type="submit" class="button aLike" value="ПОКАЗАТЬ">
		</div>
	</div>
</form>