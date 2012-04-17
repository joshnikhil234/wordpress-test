<?php include (TEMPLATEPATH.'/get-option.php');?>
<?php if($sdt_slide_choose == "Nivo Slider"):?>

<div class="slider-shadow">
<div id="slider" class="slider-content nivoSlider">
	<?php 
	$order = explode(",",$sdt_slide_order);
	
	foreach($order as $i){ ?>
		<?php 
			$t1 = "sdt_slide_photo_";
			$t2 = "_link";
			$t3 = "_title";
			$t4 = "_caption";
			
			$temp_photo = $t1.$i;
			$photo = $$temp_photo;
			
			$temp_link = $t1.$i.$t2;
			$link = $$temp_link;
			
			$temp_title = $t1.$i.$t3;
			$title = $$temp_title;			
			
			$temp_caption = $t1.$i.$t4;
			$caption = $$temp_caption;
		?>
				<a href="<?php
				if($link!="")
					echo $link;
				else
					echo "#";
				?>">
					<img src="<?php echo $photo;?>" alt="" title="<?php if($title!="" && $caption!="")echo "<h2>".stripslashes($title)."</h2>".stripslashes($caption);?>" />
				</a> 	
	<?php } //end for ?>		
</div>		

</div>				
<?php //Kwick Slider?>
<?php elseif($sdt_slide_choose == "Accordion Slider"):?>

<div class="slider-shadow">
<div id="sliderkwick"> 
	<ul class="kwicks" > <?php 
	$order = explode(",",$sdt_slide_order);
	
	foreach($order as $i){ ?>
		<?php 
			$t1 = "sdt_slide_photo_";
			$t2 = "_link";
			$t3 = "_title";
			$t4 = "_caption";
			
			$temp_photo = $t1.$i;
			$photo = $$temp_photo;
			
			$temp_link = $t1.$i.$t2;
			$link = $$temp_link;
			
			$temp_title = $t1.$i.$t3;
			$title = $$temp_title;			
			
			$temp_title = $t1.$i.$t4;
			$caption = $$temp_title;
		?>
				<li id="kwick<?php echo $i;?>">
				<div class="shadow"></div>				
				<a href="<?php
				if($link!="")
					echo $link;
				else
					echo "#";
				?>">
					<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $photo;?>&amp;h=<?php echo $sdt_slide_acc_height; ?>&amp;w=<?php echo $sdt_slide_acc_width; ?>&amp;zc=1" alt="" />
				</a> 
				<?php if($title != "" || $caption != ""):?>
					<div class="headline">
						<div class="title"><?php echo "<h4>".$title."</h4>";?></div>
						<div class="title_active hidden"><?php echo "<h4>".$title."</h4>";?><p><?php echo $caption;?></p></div>
					</div>
				<?php endif ?>
				</li>
	<?php } //end for ?>	
	</ul>
</div>
</div>

<?php endif ?>