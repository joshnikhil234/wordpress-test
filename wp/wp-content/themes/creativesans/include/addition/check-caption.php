<?php 
	function checkCaption($desc_style){
		//Check Description style case		
		if($desc_style == "Title Only"){
			$desc_style = "2";
		}elseif($desc_style == "Caption Only"){
			$desc_style = "1";
		}
		elseif($desc_style == "Title and Caption"){
			$desc_style = "0";
		}
		
		return $desc_style;
	}
?>