<?php
/*
Plugin Name: Shopping Cart
Plugin URI: http://WPCart.net
Description: A simple shopping cart for your Wordpress blog
Version: 1.0
Author: http://ActionPHP.com
Author URI: 
License: GPL2
*/
?>
<?php
	
	$path = plugin_dir_path(__FILE__);
	define('WPCART_PATH', $path);

	require_once(WPCART_PATH . 'includes/class-activate.php');
	$activate = new WPCartActivate;

	register_activation_hook(__FILE__, array($activate, 'activate'));

	
	add_action('admin_menu', 'wpcart_menu');

	function wpcart_menu(){
		$page_title = 'Tests';
		$menu_title = 'WPCart Tests';
		$capability = 'manage_options';
		$menu_slug  = 'actionphp-wp-cart';
		$function   = 'wp_cart_tests';

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

	}

	
	function wp_cart_tests()
	{	

		$files = glob(WPCART_PATH . 'tests/*');

		foreach($files as $file){

		$output = require_once($file);


		}
		die();
			return $output;
	}

	function pre($data)
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';

	}

?>