<?php

return [

	'title' => 'Lucky Jaya Motorindo',
	'title_prefix' => '',
	'title_postfix' => '',

	'use_ico_only' => false,
	'use_full_favicon' => false,

	'logo' => '<b>Admin</b>LTE',
	'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
	'logo_img_class' => 'brand-image img-circle elevation-3',
	'logo_img_xl' => null,
	'logo_img_xl_class' => 'brand-image-xs',
	'logo_img_alt' => 'AdminLTE',

	'usermenu_enabled' => true,
	'usermenu_header' => true,
	'usermenu_header_class' => 'bg-primary',
	'usermenu_image' => true,
	'usermenu_desc' => true,
	'usermenu_profile_url' => true,

	'layout_topnav' => null,
	'layout_boxed' => null,
	'layout_fixed_sidebar' => null,
	'layout_fixed_navbar' => null,
	'layout_fixed_footer' => null,

	'classes_auth_card' => 'card-outline card-primary',
	'classes_auth_header' => '',
	'classes_auth_body' => '',
	'classes_auth_footer' => '',
	'classes_auth_icon' => '',
	'classes_auth_btn' => 'btn-flat btn-primary',

	'classes_body' => '',
	'classes_brand' => '',
	'classes_brand_text' => '',
	'classes_content_wrapper' => '',
	'classes_content_header' => '',
	'classes_content' => '',
	'classes_sidebar' => 'sidebar-dark-primary elevation-4',
	'classes_sidebar_nav' => '',
	'classes_topnav' => 'navbar-white navbar-light',
	'classes_topnav_nav' => 'navbar-expand',
	'classes_topnav_container' => 'container',


	'sidebar_mini' => true,
	'sidebar_collapse' => true,
	'sidebar_collapse_auto_size' => false,
	'sidebar_collapse_remember' => true,
	'sidebar_collapse_remember_no_transition' => false,
	'sidebar_scrollbar_theme' => 'os-theme-light',
	'sidebar_scrollbar_auto_hide' => 'l',
	'sidebar_nav_accordion' => true,
	'sidebar_nav_animation_speed' => 300,


	'right_sidebar' => true,
	'right_sidebar_icon' => 'fas fa-cogs',
	'right_sidebar_theme' => 'dark',
	'right_sidebar_slide' => true,
	'right_sidebar_push' => true,
	'right_sidebar_scrollbar_theme' => 'os-theme-light',
	'right_sidebar_scrollbar_auto_hide' => 'l',


	'use_route_url' => false,

	'dashboard_url' => 'home',

	'logout_url' => 'logout',

	'login_url' => 'login',

	'register_url' => 'register',

	'password_reset_url' => 'password/reset',

	'password_email_url' => 'password/email',

	'profile_url' => false,
	'enabled_laravel_mix' => true,
	'laravel_mix_css_path' => 'css/app.css',
	'laravel_mix_js_path' => 'js/app.js',

	'menu' => [
		[
			'text' => 'search',
			'search' => true,
			'topnav' => true,
		],
		[
			'text' => 'blog',
			'url'  => 'admin/blog',
			'can'  => 'manage-blog',
		],
		[
			'text'  => 'Dashboard',
			'url'   => '/home',
			'icon'  => 'fas fa-fw fa-home',
		],
		['header' => 'Persediaan'],
		[
			'text' => 'Daftar Barang',
			'url'  => 'barang',
			'icon' => 'fas fa-fw fa-list-ul',
		],
		[
			'text' => 'Daftar Stok - Gudang',
			'url'  => 'stok',
			'icon' => 'fas fa-fw fa-cubes',
		],
		[
			'text' => 'Daftar Stok - Lokasi',
			'url'  => 'item/barang',
			'icon' => 'fas fa-fw fa-truck',
		],
		['header' => 'Pelanggan'],
		[
			'text' => 'Daftar Pelanggan',
			'url'  => 'kontak',
			'icon' => 'fas fa-fw fa-address-book',
		],
		[
			'text' => 'Daftar Tagihan',
			'url'  => 'admin/settings',
			'icon' => 'fas fa-fw fa-tasks',
		],
		[
			'text' => 'Daftar User',
			'url'  => 'user',
			'icon' => 'fas fa-fw fa-credit-card',
		],
		
	   
	],
	
	'filters' => [
		JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
		JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
	],

	/*
	|--------------------------------------------------------------------------
	| Plugins Initialization
	|--------------------------------------------------------------------------
	|
	| Here we can modify the plugins used inside the admin panel.
	|
	| For more detailed instructions you can look here:
	| https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
	|
	*/

	'plugins' => [
		'Datatables' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js',
				],
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js',
				],
				[
					'type' => 'css',
					'asset' => true,
					'location' => '//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css',
				],
			],
		],
		'Select2' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
				],
				[
					'type' => 'css',
					'asset' => true,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
				],
			],
		],
		'Chartjs' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
				],
			],
		],
		'Sweetalert2' => [
			'active' => true,
			'files' => [
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
				],
			],
		],
		'Pace' => [
			'active' => true,
			'files' => [
				[
					'type' => 'css',
					'asset' => true,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
				],
				[
					'type' => 'js',
					'asset' => true,
					'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
				],
			],
		],
	],
];
