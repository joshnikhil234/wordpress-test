<?php 
global $options;
foreach ($options as $value) {

	if(isset($value["name"]) && $value["name"] == "Admin Bar"){
		if (  get_option($value["id"]) == "no"  ){
			add_filter('show_admin_bar', '__return_false');
		}
	}
}
?>