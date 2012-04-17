jQuery(document).ready(function($) {

	/* Autodetect API Connection Handler */
	$('#oa_social_login_autodetect_api_connection_handler').click(function(){	
		var message_string;		
		var message_container;
		var is_success;	
		
		var data = {
				_ajax_nonce: objectL10n.oa_social_login_ajax_nonce,
				action: 'autodetect_api_connection_handler'
			};
		
		message_container = jQuery('#oa_social_login_api_connection_handler_result');	
		message_container.removeClass('success_message error_message').addClass('working_message');
		message_container.html(objectL10n.oa_admin_js_1);
		
		jQuery.post(ajaxurl,data, function(response) {				
			
			/* CURL/FSOCKOPEN Radio Boxs */
			var radio_curl = jQuery("#oa_social_login_api_connection_handler_curl");
			var radio_fsockopen = jQuery("#oa_social_login_api_connection_handler_fsockopen");											
			radio_curl.removeAttr("checked");
			radio_fsockopen.removeAttr("checked");
					
			/* CURL detected */
			if (response == 'success_autodetect_api_curl')
			{
				is_success = true;
				radio_curl.attr("checked", "checked");				
				message_string = objectL10n.oa_admin_js_201;
			}			
			else
			{
				/* FSOCKOPEN detected */
				if (response == 'success_autodetect_api_fsockopen')
				{
					is_success = true;
					radio_fsockopen.attr("checked", "checked");					
					message_string = objectL10n.oa_admin_js_202;
				}
				/* No handler detected */
				else
				{
					is_success = false;
					radio_curl.attr("checked", "checked");					
					message_string = objectL10n.oa_admin_js_211;
				}
			}		
			message_container.removeClass('working_message');
			message_container.html(message_string);
			
			if (is_success){
				message_container.addClass('success_message');
			} else {
				message_container.addClass('error_message');
			}						
		});
		return false;	
	});
	
	/* Test API Settings */
	$('#oa_social_login_test_api_settings').click(function(){
		var message_string;		
		var message_container;
		var is_success;	
	
		var radio_curl_val = jQuery("#oa_social_login_api_connection_handler_curl:checked").val();
		var radio_fsockopen_val = jQuery("#oa_social_login_api_connection_handler_fsockopen:checked").val();	
		
		var subdomain = jQuery('#oa_social_login_settings_api_subdomain').val();
		var key = jQuery('#oa_social_login_settings_api_key').val();
		var secret = jQuery('#oa_social_login_settings_api_secret').val();	
		var handler = (radio_fsockopen_val == 'fsockopen' ? 'fsockopen' : 'curl');		
				
		var data = {
			_ajax_nonce: objectL10n.oa_social_login_ajax_nonce,
			action: 'check_api_settings',
			api_connection_handler: handler,
			api_subdomain: subdomain,
			api_key: key,
			api_secret: secret
		};
		
		message_container = jQuery('#oa_social_login_api_test_result');	
		message_container.removeClass('success_message error_message').addClass('working_message');
		message_container.html(objectL10n.oa_admin_js_1);
		
		jQuery.post(ajaxurl,data, function(response) {		
			if (response == 'error_not_all_fields_filled_out'){
				is_success = false;
				message_string = objectL10n.oa_admin_js_111;
			}
			else if (response == 'error_subdomain_wrong'){
				is_success = false;
				message_string = objectL10n.oa_admin_js_112;
			}
			else if (response == 'error_subdomain_wrong_syntax'){
				is_success = false;
				message_string = objectL10n.oa_admin_js_113;	
			}
			else if (response == 'error_communication'){
				is_success = false;
				message_string = objectL10n.oa_admin_js_114;					
			}
			else if (response == 'error_authentication_credentials_wrong'){
				is_success = false;
				message_string = objectL10n.oa_admin_js_115;		
			}
			else {
				is_success = true;
				message_string = objectL10n.oa_admin_js_101;		
			}
		
			message_container.removeClass('working_message');
			message_container.html(message_string);
		
			if (is_success){				
				message_container.addClass('success_message');
			} else {
				message_container.addClass('error_message');
			}			
		});
		return false;
	});
});