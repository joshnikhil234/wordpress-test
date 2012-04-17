<?php //main option
$general = array (
	array(
		"name" => "general_post_layout",
		"desc" => "General",
		"type" => "tab_list",
		"icon" => "general",
		"options" => array(array("Post Setting","general_post_setting"),array("Contact Info","general_contact"),array("Social Share","general_social"),array("Google Analytic","general_google_analytic"),array("Lightbox Setting","general_lightbox"))
	),


/**
** Post Setting
**/
	array(
		"name" => "general_post_setting",
		"type" => "div_tab"
	),
	array(
	    "name" => "Post Layout",
		"desc" => "Layout type that will appear in Single page",
		"id" => $shortname."_post_layout",
		"type" => "select",		
		"options" => array("Right Sidebar","Left Sidebar","Without Sidebar")
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Show date, author, comment",
		"id" => $shortname."_post_date_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Show thumbanil in post",
		"id" => $shortname."_post_thumb_ena",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Contact
**/
	array(
		"name" => "general_contact",
		"type" => "div_tab"
	),
	array(
		"name" => "Email Address",
		"id" => $shortname."_contact_email",
		"desc" => "Please fill your email address for 'Contact' page and 'Contact Widget'",
		"type" => "text"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Social
**/
	array(
		"name" => "general_social",
		"type" => "div_tab"
	),
	array(
	    "name" => "Facebook",
		"id" => $shortname."_social_facebook",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Twitter",
		"id" => $shortname."_social_twitter",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Google",
		"id" => $shortname."_social_google",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Stumble up on",
		"id" => $shortname."_social_stumble",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "My Space",
		"id" => $shortname."_social_myspace",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Delicious",
		"id" => $shortname."_social_delicious",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Digg",
		"id" => $shortname."_social_digg",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Reddit",
		"id" => $shortname."_social_reddit",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "LinkedIn",
		"id" => $shortname."_social_linkedin",
		"type" => "checkbox",
		"std" => "yes"
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Google analytic
**/
	array(
		"name" => "general_google_analytic",
		"type" => "div_tab"
	),	
	array(
		"id" => $shortname."_google_ana_ena",
		"name" => "Enable",
		"type" => "checkbox"
	),
	array(
		"type" => "close"
	),
	array(
	    "name" => "Google Analytic",
		"id" => $shortname."_google_ana",
		"type" => "textarea",
		"desc" => "Put your google analytic code here."
	),
	array(
		"type" => "div_tab_close"
	),
/**
** Lightbox Setting
**/
	array(
		"name" => "general_lightbox",
		"type" => "div_tab"
	),	
	array(
		"name" => "Speed",
		"id" => $shortname."_lightbox_animation_speed",
		"type" => "select",
		"options" => array("fast","slow","normal")
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "slideshow",
		"id" => $shortname."_lightbox_slideshow",
		"type" => "text",
		"desc" => "interval time in ms",
		"std" => "5000"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "autoplay slideshow",
		"id" => $shortname."_lightbox_autoplay_slideshow",
		"type" => "select",
		"options" => array("false","true")
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Background Opacity",
		"id" => $shortname."_lightbox_opacity",
		"type" => "text",
		"std" => "0.8",
		"desc" => "Value between 0 and 1"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Show Title",
		"id" => $shortname."_lightbox_title",
		"type" => "select",
		"options" => array("true","false")
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Allow Resize",
		"id" => $shortname."_lightbox_allow_resize",
		"type" => "select",
		"options" => array("true","false"),
		"desc" => "Resize the photos bigger than viewport"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Default Width",
		"id" => $shortname."_lightbox_width",
		"type" => "text",
		"std" => "500"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Default Height",
		"id" => $shortname."_lightbox_height",
		"type" => "text",
		"std" => "344"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Counter Separator Label",
		"id" => $shortname."_lightbox_counter_separator",
		"type" => "text",
		"std" => "/",
		"desc" => "The separator for the gallery counter 1 of 2"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Theme",
		"id" => $shortname."_lightbox_theme",
		"type" => "select",
		"options" => array("pp_default","light_rounded","dark_rounded","light_square","dark_square","facebook"),
		"desc" => "Resize the photos bigger than viewport"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Horizontal Padding",
		"id" => $shortname."_lightbox_padding",
		"type" => "text",
		"std" => "20",
		"desc" => "The padding on each side of the picture"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Overlay Gallery",
		"id" => $shortname."_lightbox_overlay",
		"type" => "select",
		"options" => array("true","false"),
		"desc" => "Show thumbnails on slider"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "keyboard Shortcuts",
		"id" => $shortname."_lightbox_keyboard",
		"type" => "select",
		"options" => array("true","false"),
		"desc" => "Able to use keyboard to control lightbox"
	),
	array(
		"type" => "close"
	),
	array(
		"name" => "Social Share",
		"id" => $shortname."_lightbox_social",
		"type" => "select",
		"options" => array("true","false"),
		"desc" => "Show Facebook and Twitter share button"
	),
	array(
		"type" => "div_tab_close"
	),
);
?>