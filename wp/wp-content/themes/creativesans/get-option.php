<?php
//allows the theme to get info from the theme options page
global $options;
foreach ($options as $value) {

	//sdt = SAINTDO's Theme
	if( !empty($value['id'])){
		$pre_option = str_replace("cts","sdt",$value['id']);

		if (get_option( $value['id'] ) === FALSE && isset($value['std'])) { 
		
			$$value['id'] = stripslashes($value['std']); 	
		}else { 		
			$$pre_option = stripslashes(get_option( $value['id'] )); 	
		}		
	}
}
?>