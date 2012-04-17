<?php

/**
 * Add Settings Tab
 **/
function oa_social_login_admin_menu ()
{
	$page = add_options_page ('Social Login', 'Social Login', 'manage_options', 'oa_social_login', 'oa_display_social_login_settings');
	add_action ('admin_print_styles-' . $page, 'oa_social_login_admin_css');
	add_action ('admin_enqueue_scripts', 'oa_social_login_admin_js');
	add_action ('admin_init', 'oa_register_social_login_settings');
	add_action ('admin_notices', 'oa_social_login_admin_message');
}
add_action ('admin_menu', 'oa_social_login_admin_menu');


/**
 * Automatically approve comments if set to do so
 **/
function oa_social_login_admin_pre_comment_approved($approved)
{
	// No need to do the check if the comment is already approved
	if (empty($approved))
	{
		//Read settings
		$settings = get_option ('oa_social_login_settings');

		//Check if enabled
		if (!empty ($settings ['plugin_comment_auto_approve']))
		{
			$user_id = get_current_user_id();
			if ( is_numeric ($user_id))
			{
				if (get_user_meta ($user_id, 'oa_social_login_user_token', true) !== false)
				{
					$approved = 1;
				}
			}
		}
	}
	return $approved;
}
add_action('pre_comment_approved', 'oa_social_login_admin_pre_comment_approved');


/**
 * Add an activation message to be displayed once
 */
function oa_social_login_admin_message ()
{
	if (get_option ('oa_social_login_activation_message') !== '1')
	{
		echo '<div class="updated"><p><strong>' . __ ('Thank you for using the Social Login Plugin!', 'oa_social_login') . '</strong> ' . sprintf (__ ('Please go to the <strong><a href="%s">Settings\Social Login</a></strong> page to setup the plugin.', 'oa_social_login'), 'options-general.php?page=oa_social_login') . '</p></div>';
		update_option ('oa_social_login_activation_message', '1');
	}
}

/**
 * Autodetect API Connection Handler
 */
function oa_social_login_admin_autodetect_api_connection_handler ()
{
	//Check AJAX Nonce
	check_ajax_referer ('oa_social_login_ajax_nonce');

	//CURL Works
	if (oa_social_login_check_curl () === true)
	{
		echo 'success_autodetect_api_curl';
		die ();
	}
	//CURL does not work
	else
	{
		// FSOCKOPEN works
		if (oa_social_login_check_fsockopen () == true)
		{
			echo 'success_autodetect_api_fsockopen';
			die ();
		}
	}

	//No working handler found
	echo 'error_autodetect_api_no_handler';
	die ();
}
add_action ('wp_ajax_autodetect_api_connection_handler', 'oa_social_login_admin_autodetect_api_connection_handler');



/**
 * Check API Settings through an Ajax Call
 */
function oa_social_login_admin_check_api_settings ()
{
	check_ajax_referer ('oa_social_login_ajax_nonce');

	//Check if all fields have been filled out
	if (empty ($_POST ['api_subdomain']) OR empty ($_POST ['api_key']) OR empty ($_POST ['api_secret']))
	{
		echo 'error_not_all_fields_filled_out';
		delete_option ('oa_social_login_api_settings_verified');
		die ();
	}

	//Sanitize data
	$api_connection_handler = ((!empty ($_POST ['api_connection_handler']) AND $_POST ['api_connection_handler'] == 'fsockopen') ? 'fsockopen' : 'curl');
	$api_subdomain = trim (strtolower ($_POST ['api_subdomain']));
	$api_key = trim($_POST ['api_key']);
	$api_secret = trim($_POST ['api_secret']);

	//Full domain entered
	if (preg_match ("/([a-z0-9\-]+)\.api\.oneall\.com/i", $api_subdomain, $matches))
	{
		$api_subdomain = $matches [1];
	}

	//Check subdomain format
	if (!preg_match ("/^[a-z0-9\-]+$/i", $api_subdomain))
	{
		echo 'error_subdomain_wrong_syntax';
		delete_option ('oa_social_login_api_settings_verified');
		die ();
	}

	//Domain
	$api_domain = $api_subdomain . '.api.oneall.com';

	//Connection to
	$api_resource_url = 'https://' . $api_domain . '/tools/ping.json';

	//Get connection details
	$result = oa_social_login_do_api_request ($api_connection_handler, $api_resource_url, array ('api_key' => $api_key, 'api_secret' => $api_secret), 15);

	//Parse result
	if (is_object ($result) AND property_exists ($result, 'http_code') AND property_exists ($result, 'http_data'))
	{
		switch ($result->http_code)
		{
			//Success
			case 200:
				echo 'success';
				update_option ('oa_social_login_api_settings_verified', '1');
			break;

			//Authentication Error
			case 401:
				echo 'error_authentication_credentials_wrong';
				delete_option ('oa_social_login_api_settings_verified');
			break;

			//Wrong Subdomain
			case 404:
				echo 'error_subdomain_wrong';
				delete_option ('oa_social_login_api_settings_verified');
			break;

			//Other error
			default:
				echo 'error_communication';
				delete_option ('oa_social_login_api_settings_verified');
			break;
		}
	}
	else
	{
		echo 'error_communication';
		delete_option ('oa_social_login_api_settings_verified');
	}
	die();
}
add_action ('wp_ajax_check_api_settings', 'oa_social_login_admin_check_api_settings');


/**
 * Add Settings JS
 **/
function oa_social_login_admin_js ($hook)
{
	if ($hook == 'settings_page_oa_social_login')
	{
		if (!wp_script_is ('oa_social_login_admin_js', 'registered'))
		{
			wp_register_script ('oa_social_login_admin_js', OA_SOCIAL_LOGIN_PLUGIN_URL . "/assets/js/admin.js");
		}

		$oa_social_login_ajax_nonce = wp_create_nonce ('oa_social_login_ajax_nonce');

		wp_enqueue_script ('oa_social_login_admin_js');
		wp_enqueue_script ('jquery');

		wp_localize_script ('oa_social_login_admin_js', 'objectL10n', array (
			'oa_social_login_ajax_nonce' => $oa_social_login_ajax_nonce,
			'oa_admin_js_1' => __ ('Contacting API - please wait ...', 'oa_social_login'),
			'oa_admin_js_101' => __ ('The settings are correct - do not forget to save your changes!', 'oa_social_login'),
			'oa_admin_js_111' => __ ('Please fill out each of the fields above.', 'oa_social_login'),
			'oa_admin_js_112' => __ ('The subdomain does not exist. Have you filled it out correctly?', 'oa_social_login'),
			'oa_admin_js_113' => __ ('The subdomain has a wrong syntax!', 'oa_social_login'),
			'oa_admin_js_114' => __ ('Could not contact API. Are outoing CURL requests allowed?', 'oa_social_login'),
			'oa_admin_js_115' => __ ('The API credentials are wrong', 'oa_social_login'),
			'oa_admin_js_201' => __ ('Autodetected PHP CURL - do not forget to save your changes!', 'oa_social_login'),
			'oa_admin_js_202' => __ ('Autodetected PHP FSOCKOPEN - do not forget to save your changes!', 'oa_social_login'),
			'oa_admin_js_211' => sprintf(__ ('Autodetection Error - our <a href="%s" target="_blank">documentation</a> helps you fix this issue.', 'oa_social_login'), 'http://docs.oneall.com/plugins/guide/social-login-wordpress/#help')
		));
	}
}


/**
 * Add Settings CSS
 **/
function oa_social_login_admin_css ($hook)
{
	if (!wp_style_is ('oa_social_login_admin_css', 'registered'))
	{
		wp_register_style ('oa_social_login_admin_css', OA_SOCIAL_LOGIN_PLUGIN_URL . "/assets/css/admin.css");
	}

	if (did_action ('wp_print_styles'))
	{
		wp_print_styles ('oa_social_login_admin_css');
	}
	else
	{
		wp_enqueue_style ('oa_social_login_admin_css');
	}
}


/**
 * Register plugin settings and their sanitization callback
 */
function oa_register_social_login_settings ()
{
	register_setting ('oa_social_login_settings_group', 'oa_social_login_settings', 'oa_social_login_settings_validate');
}


/**
 *  Plugin settings sanitization callback
 */
function oa_social_login_settings_validate ($settings)
{
	//Import providers
	GLOBAL $oa_social_login_providers;

	//Sanitzed Settings
	$sanitzed_settings = array ();

	//Base Settings
	foreach (array (
		'api_connection_handler',
		'api_subdomain',
		'api_key',
		'api_secret',
		'plugin_caption',
		'plugin_link_verified_accounts',
		'plugin_show_avatars_in_comments',
		'plugin_use_small_buttons',
		'plugin_display_in_login_form',
		'plugin_login_form_redirect',
		'plugin_login_form_redirect_custom_url',
		'plugin_display_in_registration_form',
		'plugin_registration_form_redirect',
		'plugin_registration_form_redirect_custom_url',
		'plugin_comment_show_if_members_only',
		'plugin_comment_auto_approve'
	) AS $key)
	{
		if (isset ($settings [$key]))
		{
			$sanitzed_settings [$key] = trim ($settings [$key]);
		}
	}

	//Subdomain is always lowercase
	if (isset ($sanitzed_settings ['api_subdomain']))
	{
		$api_subdomain = strtolower ($sanitzed_settings ['api_subdomain']);

		//Full domain entered
		if (preg_match ("/([a-z0-9\-]+)\.api\.oneall\.com/i", $api_subdomain, $matches))
		{
			$api_subdomain = $matches [1];
		}

		$sanitzed_settings ['api_subdomain'] = $api_subdomain;
	}


	//Enabled providers
	if (isset ($settings ['providers']) AND is_array ($settings ['providers']))
	{
		foreach ($oa_social_login_providers AS $key => $name)
		{
			if (isset ($settings ['providers'] [$key]) AND $settings ['providers'] [$key] == '1')
			{
				$sanitzed_settings ['providers'] [$key] = 1;
			}
		}
	}

	//Flag settings
	$sanitzed_settings ['api_connection_handler'] = ((isset ($sanitzed_settings ['api_connection_handler']) AND in_array ($sanitzed_settings ['api_connection_handler'], array ('curl', 'fsockopen'))) ? $sanitzed_settings ['api_connection_handler'] : 'curl');
	$sanitzed_settings ['plugin_use_small_buttons'] == ((isset ($sanitzed_settings ['plugin_use_small_buttons']) AND $sanitzed_settings ['plugin_use_small_buttons'] == '1') ? 1 : 0);
	$sanitzed_settings ['plugin_show_avatars_in_comments'] == ((isset ($sanitzed_settings ['plugin_show_avatars_in_comments']) AND $sanitzed_settings ['plugin_show_avatars_in_comments'] == '1') ? 1 : 0);
	$sanitzed_settings ['plugin_link_verified_accounts'] == ((isset ($sanitzed_settings ['plugin_link_verified_accounts']) AND $sanitzed_settings ['plugin_link_verified_accounts'] == '0') ? 0 : 1);
	$sanitzed_settings ['plugin_login_form_redirect'] = ((isset ($sanitzed_settings ['plugin_login_form_redirect']) AND in_array ($sanitzed_settings ['plugin_login_form_redirect'], array ('dashboard','homepage', 'custom'))) ? $sanitzed_settings ['plugin_login_form_redirect'] : 'homepage');
	$sanitzed_settings ['plugin_registration_form_redirect'] = ((isset ($sanitzed_settings ['plugin_registration_form_redirect']) AND in_array ($sanitzed_settings ['plugin_registration_form_redirect'], array ('dashboard', 'homepage', 'custom'))) ? $sanitzed_settings ['plugin_registration_form_redirect'] : 'dashboard');
	$sanitzed_settings ['plugin_display_in_login_form'] == ((isset ($sanitzed_settings ['plugin_display_in_login_form']) AND $sanitzed_settings ['plugin_display_in_login_form'] == '0') ? 0 : 1);
	$sanitzed_settings ['plugin_comment_show_if_members_only'] == ((isset ($sanitzed_settings ['plugin_comment_show_if_members_only']) AND $sanitzed_settings ['plugin_comment_show_if_members_only'] == '1') ? 1 : 0);
	$sanitzed_settings ['plugin_comment_auto_approve'] == ((isset ($sanitzed_settings ['plugin_comment_auto_approve']) AND $sanitzed_settings ['plugin_comment_auto_approve'] == '1') ? 1 : 0);

	//Check Login Redirection Settings
	if ($sanitzed_settings ['plugin_login_form_redirect'] == 'custom')
	{
		if (empty ($sanitzed_settings ['plugin_login_form_redirect_custom_url']))
		{
			$sanitzed_settings ['plugin_login_form_redirect'] = 'homepage';
		}
	}
	else
	{
		$sanitzed_settings ['plugin_login_form_redirect_custom_url'] = '';
	}


	//Check Registration Redirection Settings
	if ($sanitzed_settings ['plugin_registration_form_redirect'] == 'custom')
	{
		if (empty ($sanitzed_settings ['plugin_registration_form_redirect_custom_url']))
		{
			$sanitzed_settings ['plugin_registration_form_redirect'] = 'dashboard';
		}
	}
	else
	{
		$sanitzed_settings ['plugin_registration_form_redirect_custom_url'] = '';
	}

	//Done
	return $sanitzed_settings;
}



/**
 * Display Settings Page
 **/
function oa_display_social_login_settings ()
{
	//Import providers
	GLOBAL $oa_social_login_providers;

	?>
	<div class="wrap">
		<h2><?php _e ('Social Login Settings', 'oa_social_login'); ?></h2>
		<?php
			if (get_option ('oa_social_login_api_settings_verified') !== '1')
			{
			?>
					<div class="oa_container oa_container_welcome">
						<h3>
							<?php _e ('Make your blog social!', 'oa_social_login'); ?>
						</h3>
						<div class="oa_container_body">
							<p>
								<?php _e ('Allow your visitors to comment, login and register with social networks like Twitter, Facebook, LinkedIn, Hyves, VKontakte, Google or Yahoo.', 'oa_social_login'); ?>
								<strong><?php _e ('Draw a larger audience and increase user engagement in a  few simple steps.', 'oa_social_login'); ?></strong>
							</p>
							<p>
								<?php
										printf (__ ('To be able to use this plugin you first of all need to create a free account at %s and setup a Site', 'oa_social_login'), '<a href="https://app.oneall.com/signup/" target="_blank">http://www.oneall.com</a>');
										_e ('After having created your account and setup your Site, please enter the Site settings in the form below.', 'oa_social_login');
								?>
							</p>
							<h3><?php printf (__ ('You are in good company! This plugin is used on more than %s websites!', 'oa_social_login'), '25000+'); ?></h3>
							<p>
								<a class="button-secondary" href="https://app.oneall.com/signup/" target="_blank"><strong><?php _e ('Setup my free account', 'oa_social_login'); ?></strong></a>
							</p>
						</div>
					</div>
				<?php
					}
					else
					{
				?>
					<div class="oa_container oa_container_welcome">
						<h3>
							<?php _e ('Your API Account is setup correctly', 'oa_social_login'); ?>
						</h3>
						<div class="oa_container_body">
							<p>
								<?php _e ('Login to your account to manage your providers and access your Social Insights', 'oa_social_login'); ?>.
								<?php _e ("Determine which social networks are popular amongst your users and tailor your registration experience to increase your users' engagement.", 'oa_social_login'); ?>
							</p>
							<p>
								<a class="button-secondary" href="https://app.oneall.com/signin/" target="_blank"><strong><?php _e ('Login to my account', 'oa_social_login'); ?></strong></a>
							</p>
						</div>
					</div>
				<?php
					}
				?>
		<div class="oa_container oa_container_links">
			<h3>
				<?php _e ('Help, Updates &amp; Documentation', 'oa_social_login'); ?>
			</h3>
			<ul>
				<li><?php printf (__ ('<a target="_blank" href="%s">Follow us on Twitter</a> to stay informed about updates', 'oa_social_login'), 'http://www.twitter.com/oneall'); ?>;</li>
				<li><?php printf (__ ('<a target="_blank" href="%s">Read the online documentation</a> for more information about this plugin', 'oa_social_login'), 'http://docs.oneall.com/plugins/guide/social-login-wordpress/'); ?>;</li>
				<li><?php printf (__ ('<a target="_blank" href="%s">Contact us</a> if you have feedback or need assistance', 'oa_social_login'), 'http://www.oneall.com/company/contact-us/'); ?></li>
			</ul>
		</div>
		<form method="post" action="options.php">
			<?php
				settings_fields ('oa_social_login_settings_group');
				$settings = get_option ('oa_social_login_settings');
			?>
				<table class="form-table oa_form_table">
			  	<tr>
			  		<th class="head" colspan="2">
			  			<?php _e ('API Connection Handler', 'oa_social_login'); ?>
			  		</th>
				  </tr>
				  <?php
					  $api_connection_handler = ((empty ($settings ['api_connection_handler']) OR $settings ['api_connection_handler'] <> 'fsockopen') ? 'curl' : 'fsockopen');
				  ?>
					<tr>
		    	  <th scope="row" rowspan="2">
		      		<label><?php _e ('API Connection Handler', 'oa_social_login'); ?>:</label>
		      	</th>
		      	<td>
		      		<input type="radio" id="oa_social_login_api_connection_handler_curl" name="oa_social_login_settings[api_connection_handler]" value="curl" <?php echo (($api_connection_handler <> 'fsockopen') ? 'checked="checked"' : ''); ?> />
		      		<label for="oa_social_login_api_connection_handler_curl"><?php _e ('Use PHP CURL to communicate with the API', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong></label><br />
		      		<span class="description"><?php _e ('Using CURL is recommended but it might be disabled on some servers.', 'oa_social_login'); ?></span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="radio" id="oa_social_login_api_connection_handler_fsockopen" name="oa_social_login_settings[api_connection_handler]" value="fsockopen" <?php echo (($api_connection_handler == 'fsockopen') ? 'checked="checked"' : ''); ?> />
							<label for="oa_social_login_api_connection_handler_fsockopen"><?php _e ('Use PHP FSOCKOPEN to communicate with the API', 'oa_social_login'); ?></label><br />
		      		<span class="description"><?php _e ('Try using FSOCKOPEN if you encounter any problems with CURL.', 'oa_social_login'); ?></span>
			     	</td>
		      </tr>
					<tr class="foot">
						<td>
							<a class="button-secondary" id="oa_social_login_autodetect_api_connection_handler" href="#"><?php _e ('Autodetect API Connection', 'oa_social_login'); ?></a>
						</td>
						<td>
							<div id="oa_social_login_api_connection_handler_result"></div>
						</td>
					</tr>
				</table>
			  <table class="form-table oa_form_table">
			  	<tr>
			  		<th class="head">
			  			<?php _e ('API Settings', 'oa_social_login'); ?>
			  		</th>
			  		<th class="head">
			  		<a href="https://app.oneall.com/applications/" target="_blank"><?php _e ('Click here to create and view your API Credentials', 'oa_social_login'); ?></a>
			  		</th>
			  	</tr>
					<tr>
		    	  <th scope="row">
		      		<label for="oa_social_login_settings_api_subdomain"><?php _e ('API Subdomain', 'oa_social_login'); ?>:</label>
		      	</th>
		      	<td>
		      		<input type="text" id="oa_social_login_settings_api_subdomain" name="oa_social_login_settings[api_subdomain]" size="75" value="<?php echo (isset ($settings ['api_subdomain']) ? htmlspecialchars ($settings ['api_subdomain']) : ''); ?>" />
		      	</td>
		      </tr>
					<tr>
						<th scope="row">
							<label for="oa_social_login_settings_api_key"><?php _e ('API Public Key', 'oa_social_login'); ?>:</label>
		      	</th>
						<td>
		      		<input type="text" id="oa_social_login_settings_api_key" name="oa_social_login_settings[api_key]" size="75" value="<?php echo (isset ($settings ['api_key']) ? htmlspecialchars ($settings ['api_key']) : ''); ?>" />
		      	</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="oa_social_login_settings_api_secret"><?php _e ('API Private Key', 'oa_social_login'); ?>:</label>
						</th>
						<td>
							<input type="text" id="oa_social_login_settings_api_secret"  name="oa_social_login_settings[api_secret]" size="75" value="<?php echo (isset ($settings ['api_secret']) ? htmlspecialchars ($settings ['api_secret']) : ''); ?>" />
						</td>
					</tr>
					<tr class="foot">
						<td>
							<a class="button-secondary" id="oa_social_login_test_api_settings" href="#"><?php _e ('Verify API Settings', 'oa_social_login'); ?></a>
						</td>
						<td>
							<div id="oa_social_login_api_test_result"></div>
						</td>
					</tr>
				</table>
				<table class="form-table oa_form_table">
			  	<tr>
			  		<th class="head">
			  			<?php _e ('Enable the social networks/identity providers of your choice', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
			  	<?php
					  $i = 0;
					  foreach ($oa_social_login_providers AS $key => $provider_data)
					  {
				  		?>
				  			<tr class="<?php echo ((($i++) % 2) == 0) ? 'row_even' : 'row_odd' ?> row_provider">
					    	  <td class="row">
					    	  	<label for="oneall_social_login_provider_<?php echo $key; ?>"><span class="oa_provider oa_provider_<?php echo $key; ?>" title="<?php echo htmlspecialchars ($provider_data ['name']); ?>"><?php echo htmlspecialchars ($provider_data ['name']); ?></span></label>
					    	  	<input type="checkbox" id="oneall_social_login_provider_<?php echo $key; ?>" name="oa_social_login_settings[providers][<?php echo $key; ?>]" value="1"  <?php checked ('1', $settings ['providers'] [$key]); ?> />
					      		<label for="oneall_social_login_provider_<?php echo $key; ?>"><?php echo htmlspecialchars ($provider_data ['name']); ?></label>
					      		<?php
										  if ($key == 'vkontakte')
										  {
											  echo ' - ' . sprintf (__ ('To enable cyrillic usernames, you might need <a target="_blank" href="%s">this plugin</a>', 'oa_social_login'), 'http://wordpress.org/extend/plugins/wordpress-special-characters-in-usernames/');
										  }
								  ?>
					      	</td>
					      </tr>
			  			<?php
							  }
						  ?>
				</table>
				<table class="form-table oa_form_table oa_form_table_notice">
			  	<tr>
			  		<th class="head">
			  			<?php _e ('Keep in mind when testing the plugin', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
			  	<tr class="row_even">
			  		<td>
			  			<?php _e ('Social Login is a plugin that allows your users to comment and login with social networks. If a user is already logged in, the plugin will not be displayed. There is in fact no need to give the user the possibilty to connect with a social network if he is already connected.'); ?>
			  			<strong><?php _e ('You will therefore have to logout to see the plugin in action.');?></strong>
			  		</td>
			  	</tr>
				</table>

				<table class="form-table oa_form_table oa_form_table_settings">
			  	<tr>
			  		<th class="head">
			  			<?php _e ('Basic Settings', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
			  	<tr class="row_odd">
			  		<td>
			  			<?php _e ('Enter the description to be displayed above the social network login buttons (leave empty for none):', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<input type="text"  name="oa_social_login_settings[plugin_caption]" size="118" value="<?php echo (isset ($settings ['plugin_caption']) ? htmlspecialchars ($settings ['plugin_caption']) : _e ('Connect with:', 'oa_social_login')); ?>" />
						</td>
					</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ("If the user's social network profile has an avatar thumbnail, should we show it as default avatar for the user?", 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_show_avatars_in_comments = (isset ($settings ['plugin_show_avatars_in_comments']) AND $settings ['plugin_show_avatars_in_comments'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_show_avatars_in_comments]"  value="1" <?php echo ($plugin_show_avatars_in_comments ? 'checked="checked"' : ''); ?> /> <?php _e ('Yes, show user avatars from social networks if available', 'oa_social_login'); ?><br />
							<input type="radio" name="oa_social_login_settings[plugin_show_avatars_in_comments]"  value="0" <?php echo (!$plugin_show_avatars_in_comments ? 'checked="checked"' : ''); ?> /> <?php _e ('No, display the default avatars', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong>
						</td>
					</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ("Do you want to use the default or the small social network buttons?", 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_use_small_buttons = (isset ($settings ['plugin_use_small_buttons']) AND $settings ['plugin_use_small_buttons'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_use_small_buttons]"  value="0" <?php echo (!$plugin_use_small_buttons ? 'checked="checked"' : ''); ?> /> <?php printf (__ ('Use the default social network buttons (%s)', 'oa_social_login'), '32x32 px'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_use_small_buttons]"  value="1" <?php echo ($plugin_use_small_buttons ? 'checked="checked"' : ''); ?> /> <?php printf (__ ('Use the small social network buttons (%s)', 'oa_social_login'), '16x16 px'); ?>
						</td>
					</tr>
				</table>

				<table class="form-table oa_form_table oa_form_table_settings">
			  	<tr>
			  		<th class="head">
			  			<?php _e ('Comment Settings', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ("Show the Social Login buttons the comment area if comments are disabled for guests?", 'oa_social_login'); ?><br />

			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_comment_show_if_members_only = (isset ($settings ['plugin_comment_show_if_members_only']) AND $settings ['plugin_comment_show_if_members_only'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_comment_show_if_members_only]"  value="0" <?php echo (!$plugin_comment_show_if_members_only ? 'checked="checked"' : ''); ?> /> <?php _e('No, do not show the social network buttons', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_comment_show_if_members_only]"  value="1" <?php echo ($plugin_comment_show_if_members_only ? 'checked="checked"' : ''); ?> /> <?php _e('Yes, show the social network buttons', 'oa_social_login'); ?><br />
							<span class="description"><?php _e('The buttons will be displayed below the "You must be logged in to leave a comment" notice');?></span>
						</td>
					</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ("Automatically approve comments left by users that connected with a social network?", 'oa_social_login'); ?><br />

			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_comment_auto_approve = (isset ($settings ['plugin_comment_auto_approve']) AND $settings ['plugin_comment_auto_approve'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_comment_auto_approve]"  value="0" <?php echo (!$plugin_comment_auto_approve ? 'checked="checked"' : ''); ?> /> <?php _e('No, do not automatically approve', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_comment_auto_approve]"  value="1" <?php echo ($plugin_comment_auto_approve ? 'checked="checked"' : ''); ?> /> <?php _e('Yes, automatically approve comments made by users that connected with a social network', 'oa_social_login'); ?><br />
						</td>
					</tr>
				</table>

				<table class="form-table oa_form_table oa_form_table_settings">
					<tr>
			  		<th class="head">
			  			<?php _e ('Login Settings', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ('Do you want to display the social network login buttons below the login form of your blog?', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_display_in_login_form = (!isset ($settings ['plugin_display_in_login_form']) OR $settings ['plugin_display_in_login_form'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_display_in_login_form]" value="1" <?php echo ($plugin_display_in_login_form ? 'checked="checked"' : ''); ?> /> <?php _e ('Yes, display the social network buttons below the login form', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_display_in_login_form]" value="0" <?php echo (!$plugin_display_in_login_form ? 'checked="checked"' : ''); ?> /> <?php _e ('No, disable social network buttons in the login form', 'oa_social_login'); ?>
						</td>
					</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ('Where should existent users be redirected to after having logged in with their social network account?', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_login_form_redirect = ((!isset ($settings ['plugin_login_form_redirect']) OR !in_array ($settings ['plugin_login_form_redirect'], array ('dashboard', 'homepage', 'custom'))) ? 'homepage' : $settings ['plugin_login_form_redirect']);
							?>
							<input type="radio" name="oa_social_login_settings[plugin_login_form_redirect]" value="homepage" <?php echo ($plugin_login_form_redirect == 'homepage' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to the homepage of my blog', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_login_form_redirect]" value="dashboard" <?php echo ($plugin_login_form_redirect == 'dashboard' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to their account dashboard', 'oa_social_login'); ?><br />
							<input type="radio" name="oa_social_login_settings[plugin_login_form_redirect]" value="custom" <?php echo ($plugin_login_form_redirect == 'custom' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to the following url', 'oa_social_login'); ?>:<br />
							<input type="text"  name="oa_social_login_settings[plugin_login_form_redirect_custom_url]" size="118" value="<?php echo (isset ($settings ['plugin_login_form_redirect_custom_url']) ? htmlspecialchars ($settings ['plugin_login_form_redirect_custom_url']) : ''); ?>" />
						</td>
					</tr>
				</table>
				<table class="form-table oa_form_table oa_form_table_settings">
					<tr>
			  		<th class="head">
			  			<?php _e ('Registration Settings', 'oa_social_login'); ?>
			  		</th>
			  	</tr>
			  	<tr class="row_odd">
			  		<td>
			  			<?php _e ('If the email address of the social network profile is verified, should we try to link it to an existing account?', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_link_verified_accounts = (!isset ($settings ['plugin_link_verified_accounts']) OR $settings ['plugin_link_verified_accounts'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_link_verified_accounts]"  value="1" <?php echo ($plugin_link_verified_accounts ? 'checked="checked"' : ''); ?> /> <?php _e ('Yes, try to link verified social network profiles to existing blog accounts', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_link_verified_accounts]"  value="0" <?php echo (!$plugin_link_verified_accounts ? 'checked="checked"' : ''); ?> />  <?php _e ('No, disable account linking', 'oa_social_login'); ?>
						</td>
					</tr>
					<tr class="row_odd">
			  		<td>
			  			<?php _e ('Do you want to display the social network login buttons below the registration form of your blog?', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_display_in_registration_form = (!isset ($settings ['plugin_display_in_registration_form']) OR $settings ['plugin_display_in_registration_form'] == '1');
							?>
							<input type="radio" name="oa_social_login_settings[plugin_display_in_registration_form]" value="1" <?php echo ($plugin_display_in_registration_form ? 'checked="checked"' : ''); ?> /> <?php _e ('Yes, display the social network buttons below the registration form', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_display_in_registration_form]" value="0" <?php echo (!$plugin_display_in_registration_form ? 'checked="checked"' : ''); ?> /> <?php _e ('No, disable social network buttons in the registration form', 'oa_social_login'); ?>
						</td>
					</tr>

					<tr class="row_odd">
			  		<td>
			  			<?php _e ('Where should new users be redirected to after having registered with their social network account?', 'oa_social_login'); ?>
			  		</td>
			  	</tr>
					<tr class="row_even">
						<td>
							<?php
								$plugin_registration_form_redirect = ((!isset ($settings ['plugin_registration_form_redirect']) OR !in_array ($settings ['plugin_registration_form_redirect'], array ('dashboard', 'homepage', 'custom'))) ? 'dashboard' : $settings ['plugin_registration_form_redirect']);
							?>
							<input type="radio" name="oa_social_login_settings[plugin_registration_form_redirect]" value="homepage" <?php echo ($plugin_registration_form_redirect == 'homepage' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to the homepage of my blog', 'oa_social_login'); ?><br />
							<input type="radio" name="oa_social_login_settings[plugin_registration_form_redirect]" value="dashboard" <?php echo ($plugin_registration_form_redirect == 'dashboard' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to their account dashboard', 'oa_social_login'); ?> <strong>(<?php _e ('Default', 'oa_social_login') ?>)</strong><br />
							<input type="radio" name="oa_social_login_settings[plugin_registration_form_redirect]" value="custom" <?php echo ($plugin_registration_form_redirect == 'custom' ? 'checked="checked"' : ''); ?> /> <?php _e ('Redirect users to the following url', 'oa_social_login'); ?>:<br />
							<input type="text"  name="oa_social_login_settings[plugin_registration_form_redirect_custom_url]" size="118" value="<?php echo (isset ($settings ['plugin_registration_form_redirect_custom_url']) ? htmlspecialchars ($settings ['plugin_registration_form_redirect_custom_url']) : ''); ?>" />
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e ('Save Changes', 'oa_social_login') ?>" />
				</p>
			</form>
		</div>
	<?php
	}
