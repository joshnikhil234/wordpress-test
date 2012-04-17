// Accordion menu
$(document).ready(function(){		
		$("#main-nav li ul").hide(); 
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); 
		
		$("#main-nav li a.nav-top-item").click(
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); 
				$(this).next().slideToggle("normal");
				return false;
			}
		);
});
  
// Sortable
 $(function() {
		$( "#sortable" ).sortable({
			placeholder: "ui-state-highlight",
			update: function(){
				order = "";
				$(".order-item").each(function(){
					if(order == ""){
						order = $(this).val();
					}else{
						order = order+","+$(this).val();
					}
				});
				$(".order").val(order);
			}
		});
		//$( "#sortable" ).disableSelection();
		
	});
	
// tab up and down
$(document).ready(function() {	
	
	$('.arrow-click').click(function() {		

		if($(this).hasClass("down")){					
			$(this).parent().next(".slider-content").slideUp();					
			$(this).removeClass("down");							
			$(this).addClass("up");
		}else{				
			$(this).parent().next(".slider-content").slideDown();									
			$(this).removeClass("up");
			$(this).addClass("down");
		}
	});
			
});

//Add item slider
$(document).ready(function() {	

	function updateOrderList(){
		order = "";
				$(".order-item").each(function(){
					if(order == ""){
						order = $(this).val();
					}else{
						order = order+","+$(this).val();
					}
				});
		$(".order").val(order);
	}

	$(".delete-button").click( function(){
		//Check if stack has more than one element ???
		if( $(".order").val().indexOf(",") > -1){
		
			//get stack
			del_stack = $(".delete-item").val();
			
			//this order value
			del_value = $(this).parents(".ui-state-default").children(".order-item").val();
			$(this).parents(".ui-state-default").remove();
			
			if(del_stack!=""){
				del_stack = del_stack+","+del_value;
			}else{
				del_stack = del_value ;
			}		
			
			// Update stack
			$(".delete-item").val(del_stack);
			
			//Update orderlist
			updateOrderList();
			
		}
			
	});
	
	$(".add-slider-item").click(function() {	
		
		//get stack
		del_stack = $(".delete-item").val();
				
		if(del_stack == ""){
			var max = $(".max-value").val();
			max++;
			// Update max value
			$(".max-value").val(max);
			value = max;				
			
		}else{
			if(del_stack.indexOf(',') > -1){		
				value = del_stack.substring(0,del_stack.indexOf(','));
				del_stack = del_stack.substring(del_stack.indexOf(',')+1);
			}else{
				value = del_stack;
				del_stack = "";
			}			
			// Update stack
			$(".delete-item").val(del_stack);
		}
				
		//Clone it
		$(".ui-state-default").first().clone(true).appendTo("#sortable");
				
	    //Delete thumbnail
		$(".ui-state-default").last().children(".slider-item-title").children(".slider-item-thumbnail").html("No Imgae Uploaded");
			
		// Delete Title
	    $(".ui-state-default").last().children(".slider-item-title").children(".slider-item-title-text").html("");
			
		//Change URL id
		url = "cts_slide_photo_"+value;		
		$(".upload_image").last().val("");
		$(".upload_image").last().attr('id',url);
		$(".upload_image").last().attr('name',url);
				
		//Change Title id
		title = url+"_title";	
		$(".title_image").last().html("");
		$(".title_image").last().attr('id',title);	
		$(".title_image").last().attr('name',title);	
		
		//Change Caption id
		caption = url+"_caption";	
		$(".text_image").last().html("");
		$(".text_image").last().attr('id',caption);	
		$(".text_image").last().attr('name',caption);	
		
		//Change Link id
		link = url+"_link";		
		$(".link_image").last().val("");
		$(".link_image").last().attr('id',link);
		$(".link_image").last().attr('name',link);
		
		
		//Add order id
	    $(".ui-state-default").last().children(".order-item").val(value);
		
		//UpdateOrderList
		updateOrderList();
		
		var theme_name = "creativesans";
		$.post("../wp-content/themes/"+theme_name+"/include/functions/check_slide_add.php" , {item_value : value} , 		
			function(data){ 							
			}
		);
		
	});
					
});
	