<?php

/**
 * Initialise
 */
function oa_social_login_init ()
{
	//Localization
	if (function_exists ('load_plugin_textdomain'))
	{
		load_plugin_textdomain ('oa_social_login', false, OA_SOCIAL_LOGIN_BASE_PATH . '/languages/');
	}

	//Callback Handler
	oa_social_login_callback ();
}


/**
 * Get the user details for a specific token
 */
function oa_social_login_get_user_by_token ($user_token)
{
	global $wpdb;
	$sql = "SELECT u.ID FROM $wpdb->usermeta AS um	INNER JOIN  $wpdb->users AS u ON (um.user_id=u.ID)	WHERE um.meta_key = 'oa_social_login_user_token' AND um.meta_value = '%s'";
	return $wpdb->get_var ($wpdb->prepare ($sql, $user_token));
}


/**
 * Create a random email
 */
function oa_social_login_create_rand_email ()
{
	do
	{
		$email = md5 (uniqid (wp_rand (10000, 99000))) . "@example.com";
	}
	while (email_exists ($email));

	return $email;
}



