<?php 

if(!$DYN_previewimgurl) { // check what image to use, custom, featured, image within post. 
	$post_image_id = get_post_thumbnail_id($post_to_use->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
			$DYN_previewimgurl=$thumbnail[0];
		} elseif($image) {
		$DYN_previewimgurl=$image;
	}
}

if($DYN_previewimgurl) { // Check "Preview Image" field is completed 
	$imagepath=$DYN_previewimgurl;
} 

if(!$imagepath) {
	$imagepath=get_bloginfo('template_url')."/images/video_blank.jpg";
}

$target_chk = strpos($DYN_cssclasses,'target_blank');
if($target_chk === false) {
	$target='_self';
}
else {
	$target='_blank';
}


if(!$DYN_videotype) { ?>
<Image Source="<?php echo $DYN_imagepath . dyn_getimagepath($imagepath); ?>" Title="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>">

	<?php if($DYN_stagegallery!="image" || $DYN_description!="") { ?>
	<Text>
		&lt;h1&gt;<?php if($DYN_slidesetid!='') { echo $DYN_posttitle; } else {  echo the_title(); } ?> &lt;/h1&gt;
		<?php if(!$DYN_slidesetid) {
			
	
	  						global $more; $more = FALSE; ?>
                            <?php if ( empty($post->post_excerpt) ) {
								if(class_exists('WPSC_Query') && ($DYN_productcat || $DYN_producttag)) { 
									echo "&lt;p&gt;&lt;b&gt;"; 
									echo $DYN_productprice;  
									echo "&lt;/b&gt; &lt;/p&gt;";		
                 				}                                     
								echo "&lt;p&gt;";    
                                $content=htmlspecialchars(get_the_content());
								echo $content;
								echo "&lt;/p&gt;";									
                               
                            } else {
                                echo "&lt;p&gt;";  
                                htmlspecialchars(the_excerpt()); 
								echo "&lt;/p&gt;";
                                        
                            } 
		} elseif($DYN_slidesetid) {
			
								echo "&lt;p&gt;";  
                                echo htmlspecialchars(do_shortcode($DYN_description));
								echo "&lt;/p&gt;";
		} ?>
	</Text>
    <?php }  
	
	if(!$DYN_slidesetid) { // Get Links 
	
	if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
	<Hyperlink URL="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" Target="_self" />
    <?php }
	
	} elseif($DYN_slidesetid) {
	if(!$DYN_disablegallink  && !$DYN_disablereadmore) { ?>
    <Hyperlink URL="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" Target="<?php echo $target; ?>" />
	<?php }	
	
	} ?>

</Image>
<?php } elseif($DYN_videotype=="swf") { ?>
<Flash Source="<?php echo $DYN_movieurl; ?>" Title="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>">
      <Image Source="<?php echo $DYN_imagepath . dyn_getimagepath($imagepath); ?>" />
</Flash>
<?php } elseif($DYN_videotype=="3dvid") { ?>
<Video Source="<?php echo $DYN_movieurl; ?>" Title="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>" Width="<?php echo $DYN_imgwidth; ?>" Height="<?php if($DYN_imgheight) { echo $DYN_imgheight; } else { ?>350<?php } ?>" Autoplay="<?php if($DYN_videoautoplay) { echo "true"; } else { echo "false"; } ?>">
      <Image Source="<?php echo $DYN_imagepath . dyn_getimagepath($imagepath); ?>" />
</Video>
<?php } ?>