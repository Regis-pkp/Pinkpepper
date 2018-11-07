<div class="panel" style="width:<?php echo esc_attr($width); ?>px;">
    
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
	
	if($DYN_imageeffect=='shadowblackwhite') $DYN_imageeffect = "shadow blackwhite"; // add space for separate effects (shadow / black white)

	?>    
    
	<div class="panel-inner">
	<?php if($DYN_stagegallery!="textonly") { ?> 
    <?php if($DYN_videotype) { // Check "Preview Image" field is completed ?>    
    
		<div style="<?php if($DYN_stagegallery=="textimageleft") { ?>float:left;<?php } elseif($DYN_stagegallery=="textimageright") { ?>float:right;<?php } ?>" class="container videotype <?php echo esc_attr($shadow).' '.$DYN_imageeffect.' '. $DYN_cssclasses; ?>">
        
			<div class="gridimg-wrap" style="height:<?php echo esc_attr($height); ?>px;width:<?php echo esc_attr($width); ?>px">
                                	
				
				<?php           
 
				$vidurl = $DYN_movieurl;
				$file = basename($vidurl); 
				$parts = explode(".", $file); 
				//File name 
				$vidid = $parts[0]; 		
  				if($DYN_videotype=="youtube") {
				
                        $vidid = strstr($vidid,'='); // trim id after = 
						$vidremove = strstr($vidid,'&'); // trim id after & 
												
						$ishd = strpos($vidremove ,"hd=1");
						if($ishd!=false) {
							$ishd="hd=1";
						} else {
							$ishd="hd=0";
						}
											
						
						$vidid = str_replace($vidremove,"",$vidid);
                        $vidid = substr($vidid, 1); // remove =			
						
						
						$splitter = '?'; // set url parameter	
						$isplaylist = strpos($vidurl ,"playlist?list="); // check if playlist
						$isredirect = strpos($vidurl ,"youtu.be"); // check if share url
	
						if($isredirect!=false) { // if share url retrieve video id
							$vidid=$parts[0];
						}				
					
						if($isplaylist!=false) {
							$vidid = 'videoseries?list='.$vidid;
							$splitter = '&amp;';		
						}
					
				} elseif($DYN_videotype=="swf" || $DYN_videotype=="jwp") {
					$vidid = $vidurl;
				}
				
				if($DYN_videotype=="youtube") { ?>
				
				<iframe class="youtube-player" type="text/html" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" src="http://www.youtube.com/embed/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;wmode=opaque&amp;title="></iframe>
				
				<?php } elseif($DYN_videotype=="vimeo") { ?>
				
				<iframe src="http://player.vimeo.com/video/<?php echo $vidid; ?>?autoplay=<?php echo $DYN_videoautoplay ?>&amp;title=0&amp;byline=0&amp;portrait=0" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>"></iframe>
				
				<?php } elseif($DYN_videotype=="swf") {?>
				          
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo esc_attr($width); ?>>" height="<?php echo esc_attr($height); ?>">
				<param name="movie" value="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" />
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">
           		<!--[if !IE]>-->                
				<object type="application/x-shockwave-flash" data="<?php echo $vidid; ?><?php if($DYN_videotype!="swf") { ?>&amp;autoplay=<?php echo $DYN_videoautoplay ?><?php } ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
                <param name="wmode" value="transparent" />
                <param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
                <param name="scale" value="exactfit">				
                <!--<![endif]-->
				<div>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
				</div>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
				
			<?php } elseif($DYN_videotype=="jwp") {?>

            <div id="<?php echo $slide_id; ?>"></div>
            <script type="text/javascript">
			<?php if(get_option('priority_loading')=='enable') { ?>
			head.ready(function() {
			<?php } ?>
              jwplayer('<?php echo $slide_id; ?>').setup({
                'id': 'player_<?php echo $slide_id; ?>',
                'width': '<?php echo esc_attr($width); ?>',
                'height': '<?php echo esc_attr($height); ?>',
                'file': '<?php echo $vidid; ?>',
				<?php if(get_option('jwplayer_plugins')) { ?>
				'plugins': '<?php echo get_option('jwplayer_plugins'); ?>',
				<?php } ?>				
				<?php if(get_option('jwplayer_skin')) { ?>
				'skin': '<?php echo get_option('jwplayer_skin'); ?>',
				<?php } ?>
				<?php if(get_option('jwplayer_skinpos')) { ?>
				'controlbar.position': '<?php echo get_option('jwplayer_skinpos'); ?>',
				<?php } ?>				
				'stretching': 'exactfit',
				'controlbar.idlehide':'true',
				'wmode': 'transparent',
                'image': '<?php echo dyn_getimagepath($DYN_previewimgurl); ?>',
				'players': [
					{type: 'flash', src: '<?php echo get_option('jwplayer_swf'); ?>'},				
					{type: 'html5'},
                    {type: 'download'}
                ]
              });
			  
			jQuery(document).ready(function() {
    			jQuery('#<?php echo $slide_id; ?>').addClass('jwplayer'); 
				jQuery('#<?php echo $slide_id; ?>').addClass('id<?php echo esc_attr($id); ?>'); 

				if("1"=="<?php echo $DYN_videoautoplay; ?>") {
					jQuery('#<?php echo $slide_id; ?>').addClass('autostart'); 
					if("1"=="<?php echo $postcount; ?>") {
					jQuery('#<?php echo $slide_id; ?>').addClass('first'); 
					} 
				}

				var firstvideo = jQuery(this).find('.jwplayer.id<?php echo esc_attr($id); ?>.first').attr("id");
				if(firstvideo) {
					var autostart = jQuery('#'+firstvideo).attr("class");
					if(autostart.search("autostart")!=-1) {
						jwplayer(firstvideo).stop().play();
					}
				}
			
			});	
			<?php if(get_option('priority_loading')=='enable') { ?>
			});
			<?php } ?>
            </script>

			<?php } ?>
				<?php if(($DYN_stagegallery=="titleoverlay" || $DYN_stagegallery=="titletextoverlay")  && $DYN_slidesetid=="") { ?>
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        
                        <?php if($DYN_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                            <?php global $more; $more = FALSE; ?>
                            <?php if ( empty($post->post_excerpt) ) {
                                        
								
								the_advanced_excerpt('length='.$DYN_galleryexcerpt);
				
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read more &rarr;', 'DynamiX' );  ?></a>
                                <?php }
                            } else {
                                        
                                the_excerpt(); 
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read more &rarr;', 'DynamiX' );  ?></a>
                                <?php }
                                        
                            } ?>
                        </div> 
                        <?php } ?>
                    </div>	
                    <?php }  elseif(($DYN_stagegallery=="titleoverlay" || $DYN_stagegallery=="titletextoverlay") && $DYN_slidesetid!="") { ?>	
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>" target="_blank"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        <?php if($DYN_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($DYN_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	             
                    <?php } ?>            
 	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->		    

	<?php } elseif($DYN_previewimgurl) { // Check "Preview Image" field is completed 
	
	if($DYN_imageeffect=='shadowblackwhite') $DYN_imageeffect = 'shadow blackwhite'; // add space for separate effects (shadow / black white)
	
	?>     
   
		<div style="float:left;" class="container <?php echo esc_attr($shadow).' '.$DYN_imageeffect.' '. $DYN_cssclasses; ?>">
			<div class="gridimg-wrap">
                <?php if(class_exists('WPSC_Query') && ($DYN_productcat || $DYN_producttag)) {  ?>
				<span class="productprice"><?php echo $DYN_productprice; ?></span>	  
                <?php } ?>               
                	
                    <?php if($DYN_lightbox=="yes") { ?><a href="<?php if($DYN_movieurl) { echo $DYN_movieurl; } else { echo $DYN_previewimgurl; } ?>" rel="prettyPhoto[gallery<?php echo esc_attr($id); ?>]" <?php if($DYN_movieurl) { ?> class="galleryvid" <?php } else { ?> class="galleryimg" <?php } ?> style="height:<?php echo $DYN_imgheight;?>px"><?php } elseif(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php if($DYN_slidesetid) { echo $DYN_posttitle; } else { the_title(); } ?>"><?php } ?>
                    
						<img <?php if(esc_attr($imageeffect)=="reflection" || esc_attr($imageeffect)=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $DYN_imagepath . dyn_getimagepath($DYN_previewimgurl); ?>" alt="<?php if(esc_attr($slidesetid)) { echo $DYN_title; } else { echo the_title(); } ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" />
	
					<?php if(!$DYN_disablegallink || $DYN_lightbox=="yes") { ?>
                        </a>
                    <?php } ?>

				<?php if(($DYN_stagegallery=="titleoverlay" || $DYN_stagegallery=="titletextoverlay")  && $DYN_slidesetid=="") { ?>
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>" title="<?php echo the_title(); ?>"><?php } ?><?php echo the_title(); ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        
                        <?php if($DYN_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                            <?php global $more; $more = FALSE; ?>
                            <?php if ( empty($post->post_excerpt) ) {
                                        
								
								the_advanced_excerpt('length='.$DYN_galleryexcerpt);
				
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read more &rarr;', 'DynamiX' );  ?></a>
                                <?php }
                            } else {
                                        
                                the_excerpt(); 
                                if(!$DYN_disablegallink && !$DYN_disablereadmore) { ?>
                                <a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } else { echo get_permalink($post->ID); } ?>"><?php _e( 'Read more &rarr;', 'DynamiX' );  ?></a>
                                <?php }
                                        
                            } ?>
                        </div> 
                        <?php } ?>
                    </div>	
                    <?php }  elseif(($DYN_stagegallery=="titleoverlay" || $DYN_stagegallery=="titletextoverlay") && $DYN_slidesetid!="") { ?>	
                    <div class="title"><h2><?php if(!$DYN_disablegallink) { ?><a href="<?php if($DYN_galexturl) { echo $DYN_galexturl; } ?>" title="<?php echo $DYN_posttitle; ?>" target="_blank"><?php } ?><?php echo $DYN_posttitle; ?><?php if(!$DYN_disablegallink) { ?></a><?php } ?></h2>
                        <?php if($DYN_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($DYN_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	             
                    <?php } ?>                
            	
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->				
				
	<?php }         

} elseif($DYN_stagegallery=="textonly") { ?>

			<?php if($DYN_slidesetid!="") {
                echo do_shortcode($DYN_description);
            } elseif($DYN_slidesetid=="") {
                the_content();
            } ?>
        
<?php } ?>    
             
     </div><!--  / panel-inner -->
</div><!--  / panel -->          

         
