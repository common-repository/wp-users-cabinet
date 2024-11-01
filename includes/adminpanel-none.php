<?php
/**
 * 
 *
 * @package Запрет входа в админ панель
 * @version 0.1
 */

	//убираем верх панель на сайте 
	// if ( ! current_user_can( 'manage_options' ) ) {
 //        show_admin_bar( false );
 //    }

//Запрет входа в админ панель
	add_action('admin_init','users_redirect');

    function users_redirect(){

        if(!is_site_admin()){
        	
            wp_redirect(site_url());
            die();
        }
    }
