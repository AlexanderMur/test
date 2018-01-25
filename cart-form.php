
<div class="cart__wrap">
	<div class="cart__head">
		<?php 
		$back = isset($_SESSION['back']) ? $_SESSION['back'] : get_post_type_archive_link( 'goods' ); 
		?>
		<h3>Корзина</h3><a href="<?php echo esc_url($back) ?>" class="cart__mag">Продолжить покупки   </a>
	</div>
	<?php get_template_part('cart-table') ?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-6">
			<div class="cart__total">
				<table class="table">
					<tbody>
						<tr>
							<td>Товаров:   </td>
							<td><span class="qtys"><?php echo get_qtys() ?></span></td>
						</tr>
						<tr>
							<td>Стоимость  <br>без учета доставки:</td>
							<td><span class="cart__price"><span class="subtotal"><?php echo number_format(get_subtotal(),0,'.',' ') ?></span> <i class="fa fa-rub"></i></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="cart__bottom">
		<div class="cart__item">
			<h3>Доставка:</h3>
			<ul>
				<li>
					<input type="radio" name="deliver" id="radio0" value="0" class="radio" checked>
					<label for="radio0">Самовывоз</label>
				</li>
				<li>
					<input type="radio" name="deliver" id="radio1" value="1" class="radio" >
					<label for="radio1">Доставка по городу (600 руб.) </label>
				</li>
				<li>
					<input type="radio" name="deliver" id="radio2" value="2" class="radio">
					<label for="radio2">Доставка до траспортной компании  (600 руб.) </label>
				</li>
				<li>
					<input type="radio" name="deliver" id="radio3" value="3" class="radio">
					<label for="radio3">Межгород  (цена рассчитывается индивидуально) </label>
				</li>
			</ul>
		</div>
		<div class="cart__item">
			<h3>Подъем на этаж:</h3>
			<ul>
				<li>
					<input type="radio" name="lift" id="radio4" value="1" class="radio" checked>
					<label for="radio4">Без подъема на этаж </label>
				</li>
				<li>
					<input type="radio" name="lift" id="radio5" value="2" class="radio">
					<label for="radio5">Подъем на этаж  на лифте (300 руб.) </label>
				</li>
				<li>
					<input type="radio" name="lift" id="radio6" value="3" class="radio">
					<label for="radio6">Подъем на этаж без лифта (100 руб./ этаж) </label><span>Укажите Ваш этаж: 
						<input type="text" value="1" name="floor" class="floor"></span>
				</li>
			</ul>
		</div>
		<div class="cart__item">
			<h3>Покупатель:</h3>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" placeholder="Имя" class="form-control" name="name" required>
				</div>
				<div class="col-sm-4">
					<input type="text" id="phone-cart" placeholder="Телефон" class="form-control" name="tel" required>
				</div>
				<div class="col-sm-4">
					<input type="text" placeholder="email" class="form-control" name="email" required>
				</div>
			</div>								
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9 col-lg-offset-3 col-md-12">
			<div class="cart__total cart__totals">
				<table class="table">
					<tbody>
						<tr>
							<td>Стоимость с учетом доставки:   </td>
							<td><span class="total"><?php echo number_format(get_subtotal(),0,'.',' ') ?></span><i class="fa fa-rub"></i></td>
							<td>
								<button type="submit" class="button">Оформить заказ</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>