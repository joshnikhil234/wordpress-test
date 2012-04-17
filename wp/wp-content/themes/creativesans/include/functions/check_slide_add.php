<?php 
//Check wheter we add more item or not?
session_start();
function getSave(){		 
	global $item_value; 
	if(isset($_POST["item_value"]) ){		
		if(!$_SESSION["item_value"]){
			$_SESSION["item_value"] = $_POST["item_value"];
		}else{		
			$_SESSION["item_value"] = $_SESSION["item_value"].",".$_POST["item_value"];
		}
	}
}
getSave();
?>