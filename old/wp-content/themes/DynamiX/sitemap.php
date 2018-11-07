<?php
/**
 * @package WordPress
 * @subpackage DynamiX
 
Template Name: Sitemap
 
*/

?>

<?php get_header();
if(!is_search()) {
require CWZ_FILES ."/inc/page-constants.php"; // Get constants
} 

if($DYN_hidecontent!="yes") { 

if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") { 

	get_sidebar(); 

} ?>

    <div class="mid-wrap <?php 

		if($DYN_layout=="layout_one") { ?> left out-full  <?php } 
		elseif($DYN_layout=="layout_two") { ?> right out-threequarter  <?php }
		elseif($DYN_layout=="layout_three") { ?> right out-half  <?php }
		elseif($DYN_layout=="layout_four") { ?> left out-threequarter  <?php }
		elseif($DYN_layout=="layout_five") { ?> left out-half  <?php }
		elseif($DYN_layout=="layout_six") { ?> left out-half  <?php }
		
		else { ?> left out-threequarter  <?php }
	
	?>">
    
            	<div id="content">          
                	<div class="post" id="post-<?php the_ID(); ?>"><!-- post -->

		<?php if($DYN_textresize=="yes") { ?>
                            <div class="textresize">
                                <ul>
                                    <li class="resize-sml"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="16" height="22"  alt="Decrease" class="decreaseFont" /></li>
                                    <li class="resize-lrg"><img src="<?php bloginfo("template_url"); ?>/images/blank.gif" width="20" height="22"  alt="Increase" class="increaseFont" /></li>
                                </ul>
                            </div><!-- /textresizer -->
        <?php } ?>
		<?php if($DYN_socialicons=="yes") { 
            require_once CWZ_FILES .'/inc/social-icons.php';
        } ?>                    
                     <?php 
					 
					 if($DYN_authorname=='posts') $DYN_pageauthorname=""; else $DYN_pageauthorname = $DYN_authorname; // Check dispplay author status 
					 
					 if($DYN_postdate!="" && $DYN_pageauthorname!="" && $DYN_pagesubtitle!="" && $DYN_pagetitle!="" || $DYN_pagetitle !="BLANK") { ?>
                            <div class="post-titles"><!-- post-titles -->
                               <?php if($DYN_pagetitle) { ?>
                                		<?php if($DYN_pagetitle != "BLANK") { ?>
										<h1><?php $DYN_pagetitle = htmlspecialchars($DYN_pagetitle); echo do_shortcode($DYN_pagetitle); ?></h1>
                                        <?php } ?>
								<?php } else { ?>
                                		<?php if($DYN_pagetitle != "BLANK") { ?>
										<h1><?php the_title(); ?></h1>
                                        <?php } ?>							
								<?php } ?>		
                                <?php if($DYN_pagesubtitle) { ?>
                                        <h2><?php $DYN_pagesubtitle = htmlspecialchars($DYN_pagesubtitle); echo do_shortcode($DYN_pagesubtitle);  ?></h2>
                                        <?php } ?>
                                <?php if($DYN_postdate || $DYN_pageauthorname) { ?>
                                 	<div class="date-author-wrap">
                                        <div class="hozbreak nospace">&nbsp;</div>
                                            <p class="post-date">
                                                <?php if($DYN_postdate) { ?>
                                                <small><?php the_time('F jS  Y'); ?></small><span class="break">&nbsp;</span>
                                                <?php } ?>
                                                <?php if($DYN_pageauthorname) { ?>
                                                <small>By <span class="author"><?php echo the_author_firstname(); ?>&nbsp;<?php echo the_author_lastname(); ?></span></small>
                                                <?php } ?>
                                            </p>
                                        <div class="hozbreak nospace">&nbsp;</div>
                                    </div>
								<?php } ?>           
                            </div><!-- /post-titles -->
							<div class="clear"></div>
                            <?php } ?>  
                            <div class="entry"><!-- entry -->
                            
                                <h3><?php echo __('Pages', 'DynamiX' ); ?></h3>
                                <ul><?php wp_list_pages("title_li=" ); ?></ul>
                                
                                <h3><?php echo __('Feeds', 'DynamiX' ); ?></h3>
                                <ul>
                                    <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
                                    <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
                                </ul>
                                
                                <h3><?php echo __('Categories', 'DynamiX' ); ?></h3>
                                <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
                                
                                <h3><?php echo __('Blog Posts', 'DynamiX' ); ?></h3>
                                <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
                                        while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                                            <li>
                                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                                             (<?php comments_number('0', '1', '%'); ?>)
                                            </li>
                                        <?php endwhile; ?>
                                </ul>
                                
                                <h3><?php echo __('Archives', 'DynamiX' ); ?></h3>
                                <ul>
                                    <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                                </ul>	

                       
                            </div><!-- /entry -->  
                     </div><!-- /post -->
                
                    	<?php edit_post_link(__('Edit this entry.', 'DynamiX' ), '<p>', '</p>'); ?>
 
				<?php // comments_template(); // Enable this line for comments on pages ?> 


                </div><!-- /content -->
                <div class="clear"></div>
       
	</div><!-- /mid-wrap -->
    

<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>
