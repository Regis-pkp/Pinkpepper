<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
 */

get_header();


if(!is_search()) {
require CWZ_FILES ."/inc/page-constants.php"; // Get constants
} ?>

    <?php if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") { 
    
        get_sidebar(); 
    
    } ?>
    
        <div class="mid-wrap <?php 
            if($DYN_layout=="layout_one") { ?> left out-full  <?php } 
            elseif($DYN_layout=="layout_two") { ?> right out-threequarter  <?php }
            elseif($DYN_layout=="layout_three") { ?> right out-half  <?php }
            elseif($DYN_layout=="layout_four") { ?> left out-threequarter  <?php }
            elseif($DYN_layout=="layout_five") { ?> left out-half  <?php }
            elseif($DYN_layout=="layout_six") { ?> left out-half  <?php }	
            else { ?> left out-threequarter  <?php } ?>">
    
			<div id="content" role="main">
					
				<?php woocommerce_content(); ?>
				<div class="clear"></div>
                    
			</div><!-- #content -->
		</div><!-- /mid-wrap -->

<?php get_sidebar(); 


 
get_footer(); ?>