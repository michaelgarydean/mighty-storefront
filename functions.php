<?php

add_action( 'wp_enqueue_scripts', 'mighty_sf_enqueue_styles' );

function mighty_sf_enqueue_styles() {
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mighty-storefront-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'storefront-style' )
    );

}

/* 
 * Remove Woocommerce Checkout Fields 
 */

function mighty_sf_override_checkout_fields( $fields ) {

	unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_email']);
	unset($fields['account']['account_username']);
	unset($fields['account']['account_password']);
	unset($fields['account']['account_password-2']);

	return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'mighty_sf_override_checkout_fields' );