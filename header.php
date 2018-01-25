<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package On_Spring
 */
global $wt_geotargeting;
?>
<?php remove_theme_support('html5', 'comment-form'); ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Chrome, Firefox OS and Opera-->
		<meta name="theme-color" content="#000">
		<!-- Windows Phone-->
		<meta name="msapplication-navbutton-color" content="#000">
		<!-- iOS Safari-->
		<meta name="apple-mobile-web-app-status-bar-style" content="#000">
		<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
		<?php wp_head() ?>
	</head>
	<body <?php body_class() ?>>
		<!-- Custom Jade-->
		<div class="page-content">
			<header class="header">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3">
							<div class="row">
								<div class="col-sm-12 col-xs-12 hidden-lg hidden-md">
									<div class="mobile-menu"><span>Меню</span><a href="#" class="toggle-mnu"><span></span></a></div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-4 col-xs-7 w100pr">
									<ul class="city">
										<li>Ваш регион: </li>
										<li class="dropdown">
											<?php if($wt_geotargeting->data['city'] == 'Новосибирск'){ ?>
												<a href="?wt_city_by_default=Новосибирск" data-toggle="dropdown" class="dropdown-toggle">Новосибирск<b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li><a href="?wt_city_by_default=Омск">Омск</a></li>
												</ul>
											<?php } else { ?>
												<a href="?wt_city_by_default=Омск" data-toggle="dropdown" class="dropdown-toggle">Омск<b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li><a href="?wt_city_by_default=Новосибирск">Новосибирск</a></li>
												</ul>				
											<?php } ?>
										</li>
									</ul>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-4 col-lg-push-7 col-md-push-5 col-sm-push-4 col-xs-5 w100pr">
									<div class="basket"><a href="<?php echo get_my_cart_link() ?>"><span class="basket__wrap"><i class="fa fa-shopping-cart"></i><span class="basket__count"><?php echo get_qtys() ?></span></span><span class="basket__title">в корзину</span></a></div>
								</div>
								<div class="col-lg-7 col-md-5 col-sm-4 col-lg-pull-2 col-md-pull-3 col-sm-pull-4 col-xs-12">
									<div class="logo"><a href="/" class="logo__link"><img src="<?php echo get_template_directory_uri() . '/' ?>img/logo.png" alt="Nest" class="img-responsive"></a><span class="slogon"><img src="<?php echo get_template_directory_uri() . '/' ?>img/slogon.png" alt="Nest" class="img-responsive"></span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>