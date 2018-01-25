<?php

Kirki::add_config( 'nest', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
));

Kirki::add_panel( 'nest_panel', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'NEST', 'textdomain' ),
    'description' => esc_attr__( 'NEST description', 'textdomain' ),
) );

	Kirki::add_section( 'homepage', array(
	    'title'          => esc_attr__( 'Настройки главной страницы', 'textdomain' ),
	    'panel'          => 'nest_panel',
	    'priority'       => 160,
	) );

		Kirki::add_field('nest',array(
			'type' => 'repeater',
			'settings' => 'homepage_slider',
			'section' => 'homepage',
			'label' => 'Слайдер',
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__('slide', 'my_textdomain' ),
				'field' => 'text',
			),
			'fields' => array(
				'image' => array(
					'type'        => 'image',
					'label'       => 'Картинка',
					'description' => 'image',
				)
			)
		));

		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'homepage_title',
			'section' => 'homepage',
			'label' => 'Заголовок',
		));
		Kirki::add_field( 'nest', array(
			'type'        => 'select',
			'settings'    => 'cart_page',
			'label'       => __( 'Страница для корзины', 'textdomain' ),
			'section'     => 'homepage',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => get_pages_for_kirki(),
		) );
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'homepage_text',
			'section' => 'homepage',
			'label' => 'Текст на главной странице',
		));

	Kirki::add_section( 'omsk_contact', array(
	    'title'          => esc_attr__( 'Контакты Омск', 'textdomain' ),
	    'description'    => esc_attr__( 'Nest description.', 'textdomain' ),
	    'panel'          => 'nest_panel',
	    'priority'       => 160,
	) );
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'omsk_tel',
			'section' => 'omsk_contact',
			'label' => 'Номер телефона',
		));
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'omsk_address_footer',
			'section' => 'omsk_contact',
			'label' => 'Адрес в футере',
		));
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'omsk_address',
			'section' => 'omsk_contact',
			'label' => 'Адрес на контактной странице',
		));
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'omsk_work_hours',
			'section' => 'omsk_contact',
			'label' => 'Режим работы',
		));
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'omsk_email',
			'section' => 'omsk_contact',
			'label' => 'Емаил',
		));

	Kirki::add_section( 'novosibirsk_contact', array(
	    'title'          => esc_attr__( 'Контакты Новосибирск', 'textdomain' ),
	    'description'    => esc_attr__( 'Nest description.', 'textdomain' ),
	    'panel'          => 'nest_panel',
	    'priority'       => 160,
	) );
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'novosibirsk_tel',
			'section' => 'novosibirsk_contact',
			'label' => 'Номер телефона',
		));
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'novosibirsk_address_footer',
			'section' => 'novosibirsk_contact',
			'label' => 'Адрес в футере',
		));
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'novosibirsk_address',
			'section' => 'novosibirsk_contact',
			'label' => 'Адрес на контактной странице',
		));
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'novosibirsk_work_hours',
			'section' => 'novosibirsk_contact',
			'label' => 'Режим работы',
		));
		Kirki::add_field('nest',array(
			'type' => 'text',
			'settings' => 'novosibirsk_email',
			'section' => 'novosibirsk_contact',
			'label' => 'Емаил',
		));

	Kirki::add_section( 'partners', array(
	    'title'          => esc_attr__( 'Страница партнеры', 'textdomain' ),
	    'description'    => esc_attr__( 'Nest description.', 'textdomain' ),
	    'panel'          => 'nest_panel',
	    'priority'       => 160,
	) );
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'partners_left',
			'section' => 'partners',
			'label' => 'Левая Колонка',
		));
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'partners_right',
			'section' => 'partners',
			'label' => 'Правая колонка',
		));

	Kirki::add_section( 'other', array(
	    'title'          => esc_attr__( 'Другие настройки', 'textdomain' ),
	    'description'    => esc_attr__( 'Nest description.', 'textdomain' ),
	    'panel'          => 'nest_panel',
	    'priority'       => 160,
	) );
		Kirki::add_field('nest',array(
			'type' => 'editor',
			'settings' => 'politics',
			'section' => 'other',
			'label' => 'Политика конфидециальности',
		));
		Kirki::add_field( 'nest', array(
			'type'        => 'select',
			'settings'    => 'cart_page',
			'label'       => __( 'Страница для корзины', 'textdomain' ),
			'section'     => 'other',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => get_pages_for_kirki(),
		) );

add_action('customize_register',function($wp_customize){

	$wp_customize->add_setting( 'omsk_map' , array(
		'transport'  => 'refresh',
	));
	$wp_customize->add_control('omsk_map', array(
		'label'      => 'Карта',
		'section'    => 'omsk_contact',
		'type'       => 'textarea',
		'description' => '<a href="https://yandex.ru/map-constructor/" target="_blank">https://yandex.ru/map-constructor/</a>'
	));
	$wp_customize->add_setting( 'novosibirsk_map' , array(
		'transport'  => 'refresh',
	));
	$wp_customize->add_control('novosibirsk_map', array(
		'label'      => 'Карта',
		'section'    => 'novosibirsk_contact',
		'type'       => 'textarea',
		'description' => '<a href="https://yandex.ru/map-constructor/" target="_blank">https://yandex.ru/map-constructor/</a>'
	));

});


?>