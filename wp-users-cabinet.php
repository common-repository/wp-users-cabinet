<?php
/**
 * @package WP USERS CABINET
 * @version 0.1
 */
/*
Plugin Name: WP User CABINET
Plugin URI: http://wordpress.org/plugins/wp-users-cabinet/
Description: Кабинет пользователя
Author: WProger.ru
Version: 0.1
Author URI: http://wproger.ru/
*/

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

require_once( 'includes/class-wp-users-cabinet-widget.php');
require_once( 'includes/adminpanel-none.php');
require_once( 'includes/widget-user-info.php');

/**
 * Let's get started!
 */

class WP_Users_Cabinet_Setup {

	function __construct(){
		show_admin_bar( false );
	}
}

/**
 * Initialize
 */
new WP_Users_Cabinet_Setup();