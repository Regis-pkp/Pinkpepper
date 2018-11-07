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
<div id='products_page_container' class="wrap wpsc_container">

	
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
		
		
		<table class="list_productdisplay <?php echo wpsc_category_class(); ?>">
			<?php /** start the product loop here */?>
			<?php $alt = 0;	?>
			<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
				<?php
				$alt++;
				if ($alt %2 == 1) { $alt_class = 'alt'; } else { $alt_class = ''; }
				?>
				<tr  class="product_view_<?php echo wpsc_the_product_id(); ?> <?php echo $alt_class;?> productcol">
					
					<td width="55%">
                    	<span id="product_price_<?php echo wpsc_the_product_id(); ?>" class="pricedisplay"><?php echo wpsc_the_product_price(); ?></span>
                    	<a class="wpsc_product_title" href="<?php echo wpsc_the_product_permalink(); ?>">
							<h3><?php echo wpsc_the_product_title(); ?></h3>
						</a>
						<div class="clear"></div>
						<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
							<?php	$action =  wpsc_product_external_link(wpsc_the_product_id()); ?>
						<?php else: ?>
							<?php	$action =  wpsc_this_page_url(); ?>						
						<?php endif; ?>
                        
					</td>
				</tr>

				<tr class="list_view_description">
					<td>
						<div id="list_description_<?php echo wpsc_the_product_id(); ?>">
							<?php echo wpsc_the_product_description(); ?>
						</div>
					</td>
				</tr>

			<?php endwhile; ?>
			<?php /** end the product loop here */?>
		</table>
		
		
		<?php if(wpsc_product_count() < 1):?>
			<p><?php  echo __('There are no products in this group.', 'wpsc'); ?></p>
		<?php endif ; ?>

	<?php

	if(function_exists('fancy_notifications')) {
		echo fancy_notifications();
	}
	?>
		
		
		<!-- Start Pagination -->
		<?php if(wpsc_has_pages() &&  ((get_option('wpsc_page_number_position') == 2) || (get_option('wpsc_page_number_position') == 3))) { ?>
                <div class="wpsc_pagination">
                <?php include_once(CWZ_FILES .'/inc/wp-pagenavi.php');
                if(function_exists('wp_pagenavi')) { wp_pagenavi(); }?>		
                <div class="clear"></div>
                </div>
        <?php } ?>
		<!-- End Pagination -->
		
		
	<?php endif; ?>
</div>