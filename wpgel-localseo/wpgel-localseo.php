<?php/*Plugin Name: Local SEO and Business ListingsPlugin URI: http://www.wpgel.comDescription: The WP Gel Local SEO Plugin helps businesses optimize their website to improve their rankings in organic search.  This plugin will also help you to identify missing or incorrect business listings on the top citation sites across the web.Version: 1.0.1Author: Rob GelhausenAuthor URI: http://www.wpgel.com/rob-gelhausenLicense: GPL2*//* * Assign Global Variable*/$wpgel_plugin_url = WP_PLUGIN_URL . '/wpgel-localseo';$options = array();/* * Adds a link to the Admin Menu for the Plugin settings. * This link is located at 'Settings > Local SEO' */function wpgel_localseo_menu() {		add_menu_page(		'Local SEO Dashboard',				/* Page Name */		'Local SEO',						/* Menu Link */		'manage_options',					/* Required User Role */		'wpgel-localseo',					/* Menu Slug */		'wpgel_localseo_options_page'		/* Function Name */	);			}add_action( 'admin_menu', 'wpgel_localseo_menu' );/* * Menu Page Content*/function wpgel_localseo_options_page() {		if( !current_user_can( 'manage_options' ) ) {		wp_die( 'You do not have sufficient permissions to access this page.' );	}		global $wpgel_plugin_url;	global $options;		if( isset( $_POST['wpgel_localseo_form_submitted'] ) ) {		$hidden_field = esc_html( $_POST['wpgel_localseo_form_submitted'] );		if( $hidden_field == 'Y' ) {			$wpgel_localseo_name 			= esc_html( $_POST['wpgel_localseo_name'] );			$wpgel_localseo_address 		= esc_html( $_POST['wpgel_localseo_address'] );			$wpgel_localseo_city 			= esc_html( $_POST['wpgel_localseo_city'] );			$wpgel_localseo_state 			= esc_html( $_POST['wpgel_localseo_state'] );			$wpgel_localseo_zip 			= esc_html( $_POST['wpgel_localseo_zip'] );			$wpgel_localseo_phone 			= esc_html( $_POST['wpgel_localseo_phone'] );			$wpgel_localseo_website 		= esc_html( $_POST['wpgel_localseo_website'] );			$wpgel_localseo_googleplus 		= esc_html( $_POST['wpgel_localseo_googleplus'] );			$wpgel_localseo_youtube 		= esc_html( $_POST['wpgel_localseo_youtube'] );						$options['wpgel_localseo_name']			= $wpgel_localseo_name;			$options['wpgel_localseo_address']		= $wpgel_localseo_address;			$options['wpgel_localseo_city']			= $wpgel_localseo_city;			$options['wpgel_localseo_state']		= $wpgel_localseo_state;			$options['wpgel_localseo_zip']			= $wpgel_localseo_zip;			$options['wpgel_localseo_phone']		= $wpgel_localseo_phone;			$options['wpgel_localseo_website']		= $wpgel_localseo_website;			$options['wpgel_localseo_googleplus']	= $wpgel_localseo_googleplus;			$options['wpgel_localseo_youtube']		= $wpgel_localseo_youtube;			$options['last_updated']				= time();						update_option( 'wpgel_localseo_options', $options );					}	}		$options = get_option( 'wpgel_localseo_options' );	if( $options != '' ) {				$wpgel_localseo_name = $options['wpgel_localseo_name'];		$wpgel_localseo_address = $options['wpgel_localseo_address'];		$wpgel_localseo_city = $options['wpgel_localseo_city'];		$wpgel_localseo_state = $options['wpgel_localseo_state'];		$wpgel_localseo_zip = $options['wpgel_localseo_zip'];		$wpgel_localseo_phone = $options['wpgel_localseo_phone'];		$wpgel_localseo_website = $options['wpgel_localseo_website'];		$wpgel_localseo_googleplus = $options['wpgel_localseo_googleplus'];		$wpgel_localseo_youtube = $options['wpgel_localseo_youtube'];	}		require( 'inc/options-page-wrapper.php' );	}function wpgel_localseo_styles() {		wp_enqueue_style( 'wpgel_localseo_styles', plugins_url( 'wpgel-localseo/css/wpgel-localseo.css' ) );	}add_action( 'admin_head', 'wpgel_localseo_styles' );?>