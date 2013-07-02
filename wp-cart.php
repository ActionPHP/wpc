<?php
/*
Plugin Name: Shopping Cart
Plugin URI: http://WPCart.net
Description: A simple shopping cart for your Wordpress blog
Version: 1.0
Author: Jean Paul
Author URI: http://ActionPHP.com
License: GPL2
*/
?>
<?php
	
	$path = plugin_dir_path(__FILE__);
	define('WPCART_PATH', $path);

	require_once(WPCART_PATH . 'includes/class-activate.php');

	//These are the scripts that need to be included.
	//We should probably find a way to load them more elegantly.
	
	require_once(WPCART_PATH . 'includes/class-table.php');
	require_once(WPCART_PATH . 'includes/class-property-table.php');
	require_once(WPCART_PATH . 'includes/class-family.php');

	$activator = new WPCartActivate();

	register_activation_hook(__FILE__, array($activator, 'activate'));

	
	

?>