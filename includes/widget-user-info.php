<?php
/**
 * @package WP Widget User Info
 * @version 0.1
 */


	// Регистрация виджета консоли
	add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


	// Используется в хуке
	function add_dashboard_widgets() {
		wp_add_dashboard_widget('dashboard_widget', 'Ваши данные', 'widget_user_info');
	}
 	
 	function widget_user_info(){

        $current_user = wp_get_current_user();
        if ( 0 == $current_user->ID ) {
            echo"Не авторизован.";
        } else {
            $current_user = wp_get_current_user();
            echo 'Имя пользователя: <b>' . $current_user->user_login . '</b><br />';
            echo 'email: <b>' . $current_user->user_email . '</b><br />';
            echo 'Имя: <b>' . $current_user->user_firstname . '</b><br />';
            echo 'Фамилия: <b>' . $current_user->user_lastname . '</b><br />';
            echo 'Отображаемое имя: <b>' . $current_user->display_name . '</b><br />';
            echo 'ID: <b>' . $current_user->ID . '</b><br />';
        }
    }
