<?php //Get option type ?>
<script>  
		//Save button slider
	   $(document).ready(function(){
	
		
	    // Tabs options
		$("a.tab").click(function () {
			
		//**** if it's top menu
			if(!$(this).hasClass("active-top") && $(this).hasClass("nav-top-item")){
				$(".active-top").removeClass("active-top");
				
				// switch this tab on
				$(this).addClass("active-top");
				
				// slide all content up
				$(".content").fadeOut(200);		
				
				// slide this content up
				var content_show = $(this).attr("title");
				$("#"+content_show).delay(200).fadeIn(200);				
			}
		//**** if it' sub menu	
			if(!$(this).hasClass("active-sub") && $(this).hasClass("nav-sub")){
				$(".active-sub").removeClass("active-sub");
				
				// switch this tab on
				$(this).addClass("active-sub");
				
				// slide all content up
				$(".content").fadeOut(200);
				
				// slide this content up
				var content_show = $(this).attr("title");
				$("#"+content_show).delay(200).fadeIn(200);				
			}
			
		});
	
	  });
	  
	$(document).ready(function(){		
		<?php // Generate Color Picker JS
		for( $i=0; $i<=40 ; $i++){
		?>
						
				$('#colorpickerField<?php echo $i;?>').ColorPicker({
				onSubmit: function(hsb, hex, rgb, el) {			
					$(el).val(hex);
					$(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				},
				onChange: function (hsb, hex, rgb) {
					$('#colorpickerField<?php echo $i;?>').val(hex);
					$('#colorpickerField<?php echo $i;?>').parent().next().css('backgroundColor', '#' + hex);
				}
				})
				.bind('keyup', function(){
				
					$(this).ColorPickerSetColor(this.value);
				})
					
				
		<?php
			//End generating
			}
		?>	
	});
 
	// Checkbox style
	$(document).ready( function(){ 
	/*
		$(".cb-enable").click(function(){
			var parent = $(this).parents('.switch');
			$('.cb-disable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('checked', true);
		});
		$(".cb-disable").click(function(){
			var parent = $(this).parents('.switch');
			$('.cb-enable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('checked', false);
		});*/
		
		$(".cb-enable").click(function(){
			var parent = $(this).parents('.switch');
			$('.cb-disable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('value', "yes");
		});
		$(".cb-disable").click(function(){
			var parent = $(this).parents('.switch');
			$('.cb-enable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('value', "no");
		});
		
		
		// description icon
		$(".desc-icon").hover(function(desc){
			var offset = $(this).offset();			
			$(".desc-box").css({position:"absolute", top: offset.top-170, left: offset.left-538} );
			
			var text = $(this).children(".hide").text();
			
			$(".desc-info").text(text);			
			$(".desc-info").append(desc);
			$(".desc-box").fadeIn(200);
			
		});
		
		// description icon
		$(".input-box").next(".button-box").next(".desc-icon").hover(function(desc){
			var offset = $(this).offset();			
			$(".desc-box").css({position:"absolute", top: offset.top-170, left: offset.left-615} );
			
			var text = $(this).children(".hide").text();
			
			$(".desc-info").text(text);			
			$(".desc-info").append(desc);
			$(".desc-box").fadeIn(200);
			
		});
		
		
		// description box
		$(".desc-box").mouseout(function(){
			$(".desc-box").fadeOut(200);
		});
			
	});
	// link to nothing
	function nothing(){
	}	
</script>

<div id="tabbed_box_1" class="tabbed_box"> 
	<div class="header-wrapper">
		<div class="logo">
		</div>
		<ul id="main-nav" class="tabs"> 
		
		<?php 
			$active_top=true;
			$active_sub = true;
			foreach ($options_in as $value) {
				switch ( $value['type'] ) { 
				case 'tab_list':
		?>
					<li><span class="icon <?php echo $value["icon"];?>"></span><a href="#" title="<?php echo $value['name'];?>" class="nav-top-item tab <?php if($active_top) echo " active-top current"; $active_top=false; ?>"><?php echo $value['desc'];?></a>
					<ul> 		
						<?php foreach( $value['options'] as $options){?>
							<li><span class="arrow"></span><a href="javascript:nothing();" title="<?php echo $options[1];?>" class="nav-sub tab <?php if($active_sub) echo " active-sub"; $active_sub=false; ?>"><?php echo $options[0]; ?></a></li>	
						<?php } ?>
					</ul>
					</li> 
		<?php 
				break;
				} 
			}
		?>		
		
        </ul> 
	</div>
<div class="tabbed_area">
	<?php //description box?>
	<div class="desc-box">
		<div class="desc-info-wrapper">
			<div class="desc-header">
				<span class="desc-header-icon"></span><strong>Description</strong>
			</div>
			<div class="desc-info">
			</div>
		</div>
	</div>
    <div id="saved"></div>	
<form method="post" id="admin-panel" action="" class="wrapper">
		<div class="theme-title">	
			<div class="right">
				<h2>creativesans</h2>
				<h3>Admin Panel</h3>
			</div>
			<div class="title-submit">	
				<span class="load-save"></span><input name="save" type="submit" value="<?php _e('Save changes','creativesans'); ?>" class="button"/> 
			</div>
		</div>
<!--
	<div class="submit top-submit">
		<input name="save" type="submit" value="<?php _e('Save changes','creativesans'); ?>"  class="button"/>
		<input type="hidden" name="action" value="save" />
	</div> -->
<div class="form-table">
		
	<?php 
		$show = true;
		foreach ($options_in as $value) {
		$get = $value['type'];
		switch ( $value['type'] ) { 
		
		case 'div_tab':
	?>
		<div id="<?php echo $value["name"];?>" class="content <?php if(!$show) echo "hide"; $show = false;?>">
	<?php
		break;
		case 'div_tab_close':
	?>
		</div>
	<?php
		break;
		case 'text':
	?>
		<div valign="top">
			<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
			<div class="right">
				<div class="input-box"> 
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php 
					if ( get_option( $value['id'] )) { echo get_option( $value['id'] ); }  elseif(isset($value['std'])) { echo $value['std']; } 
				?>" />
				</div>
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php
				endif
				?>

			</div>
		</div>
		
		
	
		<?php
		break;
		case 'upload':
		?>
		<div valign="top">
			<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
			<div class="right">
				<div class="input-box"> 
					<input id="<?php echo $value['id']; ?>" class="upload_image" type="text" size="36" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo ""; } ?>" />
				</div>
				<div class="button-box"> 
					<input class="upload_image_button" type="button" value="Upload" />
				</div>
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php
				endif
				?>

			</div>
		</div>
		
<?php
		break;

		case 'textarea':
		?>
		<div valign="top">
			<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
			<div class="right">
				<div class="input-box">
					<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="20" rows="8"><?php
					if( get_option($value['id']) != "") {
							echo __(stripslashes(get_option($value['id'])),'creativesans');
						} elseif(isset($value['std'])){
							echo __($value['std'],'creativesans');
					}?>
					
					</textarea>
				</div>
			 	<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php
				endif
				?>
				
			</div>
		</div>
<?php
		break;

		case 'nothing':
		?>
			<?php echo __("<div>".$value['desc']."</div>",'creativesans'); ?>
<?php 	break;
		
		case 'close':
?>
			<div class="divider"></div>
<?php
		break;

		case 'radio':
		?>
		<div valign="top">
			<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">
				<?php foreach ($value['options'] as $key=>$option) {
				$key++;
				$radio_setting = get_option($value['id']);
				if($radio_setting != ''){
					if ($key == get_option($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if( isset($value['std']) && $key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
				<div class="radio-style">
				<label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label><br />
				<input class="radio" type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?>/>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php
		break;
		case 'select':
		?>
		<div>
		<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">
				<div class="input-box">
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php $stop=false; foreach ($value['options'] as $option) { ?>
					<option <?php  if (get_option( $value['id'] ) == $option && !$stop) 
									{ 
										echo 'selected="selected"'; 
										$stop = true;
									} 
					?> value="<?php echo $option; ?>"><?php echo $option; ?></option><?php } ?>
					</select> 
				</div>
			
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>
			</div>
		</div>
		<?php
		break;
		case 'selectFont':
		?>
		<div>
		<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">
				<div class="input-box">
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php $stop=false; foreach ($value['options'] as $option) { ?>
					<option <?php  if (get_option( $value['id'] ) == $option && !$stop) 
									{ 
										echo 'selected="selected"'; 
										$stop = true;
									} 
									
									if(get_option( $value['id'] ) == ""){
										if(isset($value['std'])){
											if( $value['std'] == $option && !$stop){ 
													echo 'selected="selected"'; 
													$stop = true;
											} 
										}
									}
									
					?> value="<?php echo $option; ?>" <?php if($option=="Cufon" || $option=="Google Font(Font Face)"){ echo " disabled='disabled'";}?> ><?php if($option=="Cufon" || $option=="Google Font(Font Face)") echo $option; else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;".$option ; ?></option><?php } ?>
					</select> 
				</div>
			
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>
			</div>
		</div>
		<?php
		break;
		case 'selectCat':
		?>
		<div>
		<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">	
				<div class="input-box">
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						
					<?php  global $wpdb;
						$items_query = "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = 'category' ";
						$items = $wpdb->get_results($items_query);
						foreach ( $items as $item ):
						
										$cat_query = "SELECT name FROM $wpdb->terms WHERE term_id = '".$item->term_id."' ";
										$cat = $wpdb->get_results($cat_query);
					?>
					<option value="<?php echo $cat[0]->name;?>" <?php if ( get_option( $value['id'] ) == $cat[0]->name ) echo ' selected="selected"'; ?>><?php echo $cat[0]->name;?></option>				
					<?php endforeach; ?>	
					</select> 
				</div>
			<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>
			
			</div>
		</div>
		<?php
		break;
		case 'selectPort':
		?>
		<div>
		<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">	
				<div class="input-box">
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						
					<?php  global $wpdb;
						$items_query = "SELECT term_id FROM $wpdb->term_taxonomy WHERE taxonomy = 'port-cat' ";
						$items = $wpdb->get_results($items_query);
						foreach ( $items as $item ):
						
										$cat_query = "SELECT name FROM $wpdb->terms WHERE term_id = '".$item->term_id."' ";
										$cat = $wpdb->get_results($cat_query);
					?>
					<option value="<?php echo $cat[0]->name;?>" <?php if ( get_option( $value['id'] ) == $cat[0]->name ) echo ' selected="selected"'; ?>><?php echo $cat[0]->name;?></option>				
					<?php endforeach; ?>	
					</select> 
				</div>
			<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>
			
			</div>
		</div>
		<?php
		break;
		case 'selectPage':
		?>
		<div>
		<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="right">
				<div class="input-box">
					<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
						
					<?php global $wpdb;
							$page_query = "SELECT post_title FROM $wpdb->posts WHERE post_type = 'page' ";
							$pages = $wpdb->get_results($page_query);
							foreach ( $pages as $page ): ?>
						<option <?php if ( get_option( $value['id'] )== $page->post_title ) echo ' selected="selected"'; ?>>
							<?php echo $page->post_title; ?>
						</option>
					<?php endforeach; ?>
					
					</select> 
				</div>
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>
			</div>
		</div>
		
		<?php
		break;
		case 'checkbox':
		?>
		<div valign="top">
			<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>
			<div class="input-box field switch">
				
				<label class="cb-enable <?php $no=false; 
				if(get_option($value['id']) == "yes") echo " selected";
				elseif(get_option($value['id']) == "no") $no = true;
				elseif( isset($value['std']) && $value['std'] == "yes") echo " selected";
				else $no = true;
				?>
				"><span>On</span></label>
				<label class="cb-disable <?php if($no) echo " selected";?>"><span>Off</span></label>
					<input type="checkbox" id="checkbox" class="checkbox" name=<?php echo $value['id']; ?> value=<?php 
					
					$val = false;
					if(get_option($value['id']) == "yes"){
						$val = true;
					}elseif(get_option($value['id']) == "no"){
						$val = false;						
					}elseif( isset($value['std']) && $value['std'] == "yes"){						
						$val = true;
					}
					if($val) echo "yes"; else echo "no";?> checked="checked" />
			</div>
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>				
		</div>
	
	
		<?php
		break;
		case 'ul_slider':
		?>
		<ul id="sortable">
		<?php
		break;
		case 'slider_value':		
		?>
		<input type="hidden" id="<?php echo $value["id"];?>" name="<?php echo $value["id"];?>" class="<?php echo $value["class"];?>" value="<?php if ( get_option( $value["id"] ) != "") { echo get_option( $value['id'] ); }  elseif(isset($value['std'])) { echo $value["std"]; } ?>">
		
		<?php
		break;
		case 'li_slider':
		?>
		<li class="ui-state-default">
			<input type="hidden" class="order-item" value="<?php echo $value['order'];?>">
			<div class="slider-item-title">
				<div class="slider-item-thumbnail">
					<?php
						if( get_option($value['id']) != "" ){
							echo "<img src=\"".get_option($value['id'])."\" width=65 height=50 >";
						} else {
							echo "No Imgae Uploaded";
						}
						
					?>
				</div>
				<div class="slider-item-title-text"><?php echo get_option($value['id']);?></div>
				<div class="arrow-slider up arrow-click"></div>
			</div>
			
		<div class="slider-content">
		
		<?php
		break;
		case 'upload_slider':
		?>
	        <?php // Upload section?>
				<div valign="top">
					<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
					<div class="right">
						<div class="input-box"> 
							<input id="<?php echo $value['id']; ?>" class="upload_image" type="text" size="36" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo ""; } ?>" />
						</div>
						<div class="button-box"> 
							<input class="upload_image_button" type="button" value="Upload" />
						</div>
						<?php 
							if(!empty($value["desc"])):
						?>
							<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
						<?php 
						endif
						?>

					</div>
				</div>
			
				
				
			<?php
			break;
			case 'title_slider':
			?>
	        <?php // textarea ?>
				<div valign="top">
					<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
					<div class="right">
						<div class="input-box">
							<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="title_image" cols="20"><?php							
								if( get_option($value['id']) != "") {
										echo __(stripslashes(get_option($value['id'])),'creativesans');
									}else{
										echo __("",'creativesans');
								}
							?></textarea>
						</div>
						<?php 
							if(!empty($value["desc"])):
						?>
							<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
						<?php 
						endif
						?>
						
					</div>
				</div>
			
			<?php
			break;
			case 'caption_slider':
			?>
	        <?php // textarea ?>
				<div valign="top">
					<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
					<div class="right">
						<div class="input-box">
							<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="text_image" cols="20"><?php
							if( get_option($value['id']) != "") {
									echo __(stripslashes(get_option($value['id'])),'creativesans');
								}else{
									echo __("",'creativesans');
							}?></textarea>
						</div>
						<?php 
							if(!empty($value["desc"])):
						?>
							<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
						<?php 
						endif
						?>
						
					</div>
				</div>
		
			
			
			
			<?php
			break;
			case 'link_slider':
			?>
			<?php // text ?>
				<div valign="top">
					<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
					<div class="right">
						<div class="input-box"> 
						<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="link_image" type="text" value="<?php  echo get_option( $value['id'] ); ?>" />
						</div>
						<?php 
							if(!empty($value["desc"])):
						?>
							<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
						<?php 
						endif
						?>

					</div>
				</div>	

			<?php
			break;
			case 'delete_slider':
			?>
			<?php // Delete ?>
			
				<div valign="top">
					<div class="left" scope="row"><label><?php echo __($value['name'],'creativesans'); ?></label></div>
					<div class="right">
						<div class="input-box"> 
							<input type="button" value="" class="delete-button">
						</div>
						
					</div>
				</div>	

				
			</div>
			</li>
			
		<?php
		break;
		case 'ul_slider_close':
		?>
		</ul>
		<?php
		break;
		case 'add_slider_item':
		?>
		
		<div valign="top">
			<div class="left" scope="row"><label for="<?php echo $value['id']; ?>"><?php echo __($value['name'],'creativesans'); ?></label></div>
			<div class="right">
				<div class="input-box"> 
				<input type="button" class="add-slider-item" value="">
				</div>
				<?php 
					if(!empty($value["desc"])):
				?>
					<div class="desc-icon"><div class="hide"><?php echo __($value['desc'],'creativesans');?></div></div>
				<?php 
				endif
				?>

			</div>
		</div>
<?php

		break;
	
		default:

		break;
	}
	
	//Generating colorSelecotr Div
		for($i=0; $i<=40; $i++){
		$string = "colorPicker".$i;
		if( $get == $string){
	?>
			<div>
			<div class="left" scope="row"><?php echo __($value['name'],'creativesans'); ?></div>				
				<div class="input-box">
					<span class="pre-color fleft">#</span>	
					<span class="fleft">
					<input type="text" maxlength="6" size="6" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i;?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); }  elseif(isset($value['std'])) { echo $value['std']; } ?>" />
					</span>
					<span class="show-color fleft" style="background-color: #<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } elseif(isset($value['std'])) { echo $value['std']; } ?>"></span>
				</div>
			</div>
	<?php
		}
	// End of generating colorSelecotr Div
	}
	
}
?>
	<div class="submit">
		<span class="load-save"></span><input name="save" type="submit" value="<?php _e('Save changes','creativesans'); ?>" class="button"/> 
		<input type="hidden" name="action" value="theme_data_save" />
        <input type="hidden" name="security" value="<?php echo wp_create_nonce('theme-data'); ?>" />
       
	</div>

</div>
</form>
</div>
</div>