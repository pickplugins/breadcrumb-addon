<?php
/*
Plugin Name: Breadcrumb - Addon
Plugin URI: https://www.pickplugins.com/item/breadcrumb-awesome-breadcrumbs-style-navigation-for-wordpress/
Description: Awesome Breadcrumb for wordpress.
Version: 1.0.0
Author: PickPlugins
Author URI: http://pickplugins.com
Text Domain: breadcrumb
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class BreadcrumbAddon{
	
	public function __construct(){
		
		define('breadcrumbAddon_plugin_url', plugins_url('/', __FILE__)  );
		define('breadcrumbAddon_plugin_dir', plugin_dir_path( __FILE__ ) );
		define('breadcrumbAddon_plugin_name', 'Breadcrumb Addon' );
		define('breadcrumbAddon_plugin_version', '1.5.11' );


		require_once( breadcrumbAddon_plugin_dir . 'includes/functions.php');

		}
	
	public function breadcrumb_load_textdomain() {


		}
		
	
	public function _front_scripts(){


	
	}
	
	
	public function _admin_scripts(){


	}
	
	
	
	}

new BreadcrumbAddon();

