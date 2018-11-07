<?php
global $wpsc_query, $wpdb;
$image_width = get_option('product_image_width');
$image_height = get_option('product_image_height');

if(get_option("arhimgeffect")) { // Check image effect option
	$image_effect=get_option("arhimgeffect");
} else {
	$image_effect="shadowreflection";
}

if($image_width>="850") { // Calculate shadow size.
	$shadow_size="shadow-large";
} elseif($image_width<"850" && $image_width>="300" ) {
	$shadow_size="shadow-medium";
} elseif($image_width<"300" && $image_width>="200") {
	$shadow_size="shadow-small";
} elseif ($image_width<"200") {
	$shadow_size="shadow-xsmall";
}

if(get_option("arhimgeffect")!="none" && get_option("arhimgeffect")!="shadow") {
	$image_reflect='reflect';
}

?>
<div id='products_page_container' class="wpsc_container productdisplay example-category">
	
	
	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>
	
	<?php if(wpsc_display_categories()): ?>
	  <?php if(get_option('wpsc_category_grid_view') == 1) :?>
			<div class='wpsc_categories wpsc_category_grid'>
				<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
					<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item" title='<?php wpsc_print_category_name();?>'>
						<?php wpsc_print_category_image(45, 45); ?>
					</a>
					<?php wpsc_print_subcategory("", ""); ?>
				<?php wpsc_end_category_query(); ?>
				<div class='clear_category_group'></div>
			</div>
	  <?php else:?>
			<ul class='wpsc_categories'>
				<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
						<li>
							<?php wpsc_print_category_image(32, 32); ?>
							
							<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link"><?php wpsc_print_category_name();?></a>
							<?php if(get_option('wpsc_category_description')) :?>
								<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>				
							<?php endif;?>
							
							<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
						</li>
				<?php wpsc_end_category_query(); ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>



	
	<?php if(wpsc_display_products()): ?>
		<?php if(wpsc_is_in_category()) : ?>
			<div class='wpsc_category_details'>
				<?php if(get_option('show_category_thumbnails') && wpsc_category_image()) : ?>
				<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
					<div class="gridimg-wrap" align="center">                        
						<img class="<?php echo $image_reflect; ?>" src='<?php echo wpsc_category_image(); ?>' alt='<?php echo wpsc_category_name(); ?>' title='<?php echo wpsc_category_name(); ?>' />
					</div>				
                </div>                        
				<?php endif; ?>
				
				<?php if(get_option('wpsc_category_description') &&  wpsc_category_description()) : ?>
					<?php echo wpsc_category_description(); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	
	
		<!-- Start Pagination -->
        <?php if ( ( get_option( 'use_pagination' ) == 1 && ( get_option( 'wpsc_page_number_position' ) == 1 || get_option( 'wpsc_page_number_position' ) == 3 ) ) ) : ?>
            <div class="wpsc_pagination top">
            <?php include_once(CWZ_FILES .'/inc/wp-pagenavi.php');
            if(function_exists('wp_pagenavi')) { wp_pagenavi(); }?>		
            <div class="clear"></div>
            </div>
        <?php endif; ?>	
		<!-- End Pagination -->

	<?php endif; ?>
	


	<div class="product_grid_display">
		<?php while (wpsc_have_products()) :  wpsc_the_product(); $postcount++; ?>
			<div class="product_grid_item product_view_<?php echo wpsc_the_product_id(); if($postcount == get_option('grid_number_per_row')) { echo ' last'; } ?>">
			
			
				<?php if(wpsc_the_product_thumbnail()) :?> 	   
					<div class="container <?php echo $image_effect; ?> <?php if($shadow_size) echo $shadow_size; ?>">
						<div class="gridimg-wrap">                                   
                             <a <?php if(get_option('show_thumbnails_thickbox')=="1") : ?>  rel="prettyPhoto[<?php echo str_replace(array(" ", '"',"'", '&quot;','&#039;'), array("_", "", "", "",''), wpsc_the_product_title()); ?>]" <?php endif; ?> class="<?php if(get_option('show_thumbnails_thickbox')=="1") : ?> galleryimg <?php endif; ?>preview_link" href="<?php if(get_option('show_thumbnails_thickbox')=="1") :  echo wpsc_the_product_image(); else : echo wpsc_the_product_permalink(); endif; ?>" style="height:<?php echo $image_height; ?>px">
								<img class="product_image <?php echo $image_reflect;?>" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/>
							</a>
						</div>
					</div>             
		
				<?php else: ?> 
					<div class="item_no_image <?php echo $image_effect; ?>">
						<a href="<?php echo wpsc_the_product_permalink(); ?>">
						<span>No Image Available</span>
						</a>
					</div>
				<?php endif; ?> 
				
					
				<?php if(get_option('show_images_only') != 1): ?>
					<div class="grid_product_info_wrap" style="width:<?php echo $image_width; ?>px">
                        <div class="grid_product_info">
                            <div class="product_text">
                                <h3><a href="<?php echo wpsc_the_product_permalink(); ?>"><?php echo wpsc_the_product_title(); ?></a></h3>
                                
									<span id="product_price_<?php echo wpsc_the_product_id(); ?>" class="pricedisplay"><?php echo wpsc_the_product_price(get_option('wpsc_hide_decimals')); ?></span>
									<?php if(get_option('display_pnp') == 1) : ?>
										<span class="pricedisplay"><?php echo wpsc_product_postage_and_packaging(get_option('wpsc_hide_decimals')); ?></span><?php echo __('P&amp;P', 'wpsc'); ?>:  <br />
									<?php endif; ?>	
                                
                                
                                <?php if(get_option('display_moredetails') == 1) : ?>
                                    <p><a href='<?php echo wpsc_the_product_permalink(); ?>'><?php echo __('More Details', 'wpsc'); ?></a></p>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="grid_more_info">
                            <form class='product_form'  enctype="multipart/form-data" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_<?php echo wpsc_the_product_id(); ?>" >
                                <input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
                                <input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>
                                
                                
                                <?php if(get_option('display_variations') == 1) : ?>
                                    <?php /** the variation group HTML and loop */ ?>
                                    <div class="wpsc_variation_forms">
                                    <?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
                                        <p>
                                            <?php /** the variation HTML and loop */?>
                                            <select class='wpsc_select_variation' name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
                                            <?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
                                                <option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?> ><?php echo wpsc_the_variation_name(); ?></option>
                                            <?php endwhile; ?>
                                            </select> <label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?></label>
                                        </p>
                                    <?php endwhile; ?>
                                    </div>
                                    <?php /** the variation group HTML and loop ends here */?>
                                <?php endif; ?>
                                
                                <?php if((get_option('display_addtocart') == 1) && (get_option('addtocart_or_buynow') !='1')) :?> 	   
                                    <?php if(wpsc_product_has_stock()) : ?>
                                        <div class='wpsc_buy_button_container'>
                                                <?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
                                                <?php 	$action =  wpsc_product_external_link(wpsc_the_product_id()); ?>
                                                <input class="wpsc_buy_button" type='button' value='<?php echo __('Buy Now', 'wpsc'); ?>' onclick='gotoexternallink("<?php echo $action; ?>")'>
                                                <?php else: ?>
                                            <input type="submit" value="<?php echo __('Add To Cart', 'wpsc'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
                                                <?php endif; ?>
                                            <div class='wpsc_loading_animation'>
                                                <img title="Loading" alt="Loading" src="<?php echo WPSC_URL; ?>/images/indicator.gif" class="loadingimage"/>
                                                <?php echo __('Updating cart...', 'wpsc'); ?>
                                            </div>
    
                                        </div>
                                    <?php else : ?>
									<div class='wpsc_buy_button_container'>                                
                                        <div class="button-wrap ">
                                            <div class="red button ">
                                                <a href="#"><?php echo __('Sold Out', 'wpsc'); ?></a>
                                            </div>
                                        </div>    
										<div class='wpsc_loading_animation'>
											<img title="Loading" alt="Loading" src="<?php echo WPSC_URL; ?>/images/indicator.gif" class="loadingimage"/>
											<?php echo __('Updating cart...', 'wpsc'); ?>
										</div> 
                                    </div>    
                                    <?php endif ; ?>
                                <?php endif; ?>
                                
                            </form>		
							<?php echo wpsc_product_rater_nv(); ?>
                            <div class="clear"></div>
                        </div>
                    </div>
					
					<?php if((get_option('display_addtocart') == 1) && (get_option('addtocart_or_buynow') == '1')) :?> 	  
						<?php echo wpsc_buy_now_button(wpsc_the_product_id()); ?>
					<?php endif ; ?>
					
				<?php endif; ?> 				
               
			</div>
			
			<?php if($postcount == get_option('grid_number_per_row')) { // Check if count matches grid columns  ?>
            <div class="clear"></div>
            <?php $postcount="0"; } // Reset count ?>
            
			<?php if((get_option('grid_number_per_row') > 0) && ((($wpsc_query->current_product +1) % get_option('grid_number_per_row')) == 0)) :?>
			  <div class='grid_view_newline'></div>
			<?php endif ; ?>
			
			
		<?php endwhile; ?>
		
		<?php if(wpsc_product_count() < 1):?>
			<p><?php  echo __('There are no products in this group.', 'wpsc'); ?></p>
		<?php endif ; ?>
		
		
	</div>
	
	<?php if(wpsc_has_pages() &&  ((get_option('wpsc_page_number_position') == 2) || (get_option('wpsc_page_number_position') == 3))) { ?>
            <div class="wpsc_pagination">
            <?php include_once(CWZ_FILES .'/inc/wp-pagenavi.php');
            if(function_exists('wp_pagenavi')) { wp_pagenavi(); }?>		
            <div class="clear"></div>
            </div>
	<?php } ?>
	
	
	<?php

	if(function_exists('fancy_notifications')) {
		echo fancy_notifications();
	}
	?>
</div>