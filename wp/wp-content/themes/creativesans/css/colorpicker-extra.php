<?php 
// Generate css of color picker
for($i=0; $i<=40 ;$i++){
?>
#colorSelector<?php echo $i;?> {
	position: relative;
	width: 36px;
	height: 36px;
	background: url(<?php echo get_template_directory_uri();?>/images/select2.png);
}
#colorSelector<?php echo $i;?> div {
	position: absolute;
	top: 3px;
	left: 3px;
	width: 30px;
	height: 30px;
	background: url(<?php echo get_template_directory_uri();?>/images/select2.png) center;
}
<?php 
}
?>