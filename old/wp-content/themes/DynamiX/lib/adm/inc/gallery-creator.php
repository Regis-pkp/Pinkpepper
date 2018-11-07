<?php if(get_option('medialib_disable')=='enable' || get_option('medialib_disable')=='') { ?>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0(1w).1v(4(){0(\'.1u\').1t(4(){0(7).x(\'#O-1s\').1r()});0(\'.N-M.1q\').L().K(J).I(j);0(".O-1p").g(4(){f(0("#1o").9()!=""){H 1n}0(\'.N-M.a\').L().K(J).I(j);H 1m});G();z()});4 G(){0(\'.2-3-1l\').g(4(){0(\'.2-3\').d();0(7).1k().u(\'<5 6="2-3"><D><k 6="2-3-k"><e><b>1j 1i 1h</b><b><F 6="2-A"></F><1g 1f="E" C="E" 1e="1d" 1c="1" /> 1b 1a / 19</b></e></k></D><5 C="2-3"><5 6="18-17"></5></5></5>\');0(\'.2-3\').16({15:\'14\'},j);$8=0(\'#2-3-r\').9();0("#2-3").q($8+"/p/o/n/2-3.m",4(13,i,h){f(i=="a"){y B="12 11 10 Z Y a: ";0("#a").X(B+h.i+" "+h.W)}});0(\'.2-A\').g(4(){0(\'5.2-3\').d()})})}4 z(){0(\'.V-2-3\').U(4(){y $c=0(7).9();f($c){$v=0(7).x(\'e\').w(\'.T\');0(7).w(\'.t-s\').d();0($v).u(\'<5 6="t-s"><S R="\'+$c+\'" /></5>\')}})}4 Q($l){$8=0(\'#2-3-r\').9();0("#2-3").q($8+\'/p/o/n/2-3.m?P=\'+$l)}',62,95,'jQuery||media|list|function|div|class|this|media_list_url|val|error|th|imageval|remove|tr|if|click|xhr|status|400|thead|getpage|php|inc|adm|lib|load|url|image|preview|append|place_img|find|closest|var|display_image|close|msg|id|table|addtitledesc|span|get_media_list|return|slideUp|4000|delay|fadeIn|wrap|alertbox|slideset|page|load_pagination|src|img|slider_img_wrap|each|get|statusText|html|an|was|there|but|Sorry|response|show|width|animate|loader|ajax|Description|Title|Add|value|checkbox|type|name|input|Images|Library|Media|parent|button|false|true|slideset_id_id|save|green|submit|dataselect|change|slideset_select|ready|document'.split('|')))

</script>
<?php }
settings_fields( 'gallery-settings-group' );

$filter_categories_str = maybe_unserialize(get_option('filter_categories'));

if (!$get_slideset_num) {
	 $get_slideset_num = 1;
}

$chk_gallery_data = maybe_unserialize(get_option('slideset_data')); // check is pre 2.8.2 version
$get_gallery_version_data = maybe_unserialize(get_option('slideset_data_update')); // check is pre 2.8.2 version
$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
$slideset_data_ids = explode(",", $slideset_data_ids);

if($_POST['slideset_select']) $slideset_select = $_POST['slideset_select'];

if($slideset_select) $get_gallery_data = maybe_unserialize(get_option('slideset_data_'.$slideset_select)); 
?>
<div class="wrap gallerycreator">
<input name="media-list-url" id="media-list-url" type="hidden" value="<?php bloginfo('template_directory'); ?>" />
		<p>
        <div class="alertbox-wrap error">
            <div class="alertbox">
            <p>You must enter a unique name for the Slide Set ID.</p>
            </div>
		</div> 
        </p>
		<?php 
		if(!$get_gallery_version_data && $chk_gallery_data) { ?>
		<p>&nbsp;</p>
		<div class="alertbox-wrap">
		<div class="alertbox">
        <p>The functionality of this system has changed. Your Gallery Slide Set data needs to be upgraded, please click the upgrade button to proceed.</p>
		</div>
		</div>
		<form method="post" id="slideset-upgrade" action="">
		<p><input type="submit" class="button-secondary" value="Upgrade Slide Set Data" name="upgrade" /></p>
		
		</form>
		<?php } else { 
		
		if ( $_POST['delete'] && $_POST['slideset_id_dbid']  ) { ?>
		<p>       
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Slide Set was successfully deleted.</p>
    		</div>
		</div>		
		</p>
		<?php } elseif($_POST['save']) { ?>
		<p>
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Slide Set was successfully saved.</p>
    		</div>
		</div>		
		</p>		
		<?php } ?>
		<form method="post" id="slideset-dataselect" action="">
		<table class="widefat" style="margin-top:20px;">
            <thead>
                <tr style="cursor: move;">
                    <th class="nowrap">
                       <label>Select Slide Set </label>
					   <select style="margin-left:10px;" class="slideset_select" id="slideset_select" name="slideset_select">
					   <option value="">Select Slide Set</option>
                       <?php
					   
					   	if($slideset_data_ids) {
						
               			if(is_array($slideset_data_ids)) {
                        		foreach ($slideset_data_ids as $slideset_data_ids) {
                        		echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";
                        		}
               			} else {
               			    echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";
               			}	
               		}	

               			?>
                       </select> <input type="submit" class="button-primary add_gal" value="New Slide Set" />	
					</th>
					<th class="nowrap" style="text-align:right">
					   <label>New Filter Category: </label><input name="newcategory" class="newcategory" type="text" value="" />
                       <input type="button" class="button-secondary apply adddatacat" id="<?php echo $i; ?>" value="Add Category" />
                       <select style="margin-left:20px;" class="filter_categories_select" id="filter_categories_select" name="filter_categories_select">
                       <?php
               		
               		   $filter_categories = explode(",", $filter_categories_str);
					   if($filter_categories) {
    					   if(is_array($filter_categories)) {
                           		foreach ($filter_categories as $filter_categories) {
                            		echo"<option value='". $filter_categories ."'>". $filter_categories."</option>";
                            	}
    						} else {
                   			    echo"<option value='". $filter_categories ."'>". $filter_categories."</option>";
                   			}	
               			}	
               			?>
                       </select>
                       <input type="button" class="button-secondary apply deldatacat" id="<?php echo $i; ?>" value="Delete Category" />	   
                    </th>
                </tr>
            </thead>
		</table>		
		</form>
        <form method="post" id="slideset-data" action="" style="margin-top:20px;">
		
        <input name="slideset_number" class="slideset_number count_hide_rm" type="hidden" value="<?php echo $get_slideset_num; ?>" />
		<input name="filter_categories" class="filter_categories" type="hidden" value="<?php echo $filter_categories_str; ?>" />
			
        <div class="table_wrap">
		<?php $slide_set = $get_gallery_data['slideset_id_id'];  
		?>
        <input id="slideset_id_dbid" name="slideset_id_dbid" type="hidden" value="<?php echo $slide_set; ?>" />		
        <div id="table-<?php echo $i ?>" class="multitables selected_custom correct_gallery_num">

        <input name="slideset_id_slide_count" id="slideset_id_slide_count" class="slide_counter count_hide_rm correct_num" type="hidden" value="<?php if($get_gallery_data['slideset_id_slide_count']) echo $get_gallery_data['slideset_id_slide_count']; else echo "1";  ?>" />
        <table class="widefat">
            <thead>
                <tr style="cursor: move;">
                    <th>
                    <label style="padding-top:4px;">Slide Set ID:</label> <input style="margin-left:10px;" class="correct_num" id="slideset_id_id" name="slideset_id_id" type="text" value="<?php echo $slide_set; ?>" />
                    </th>
                </tr>
            </thead>
        
            <tfoot>
                <tr>
                    <th></th>
                </tr>
            </tfoot>
            <tr>      
        	<tbody>
            <tr>
                <td>                
                <div>
                <p style="padding:5px 0 5px 0;"><input type="submit" style="float:right" class="button-secondary apply del_gal correct_gallery_num" id="delete" name="delete" value="Delete Slide Set" /><input type="submit" class="button-secondary apply add_row correct_gallery_num" id="" value="Add New Slide" /> <a title="Add an Image" class="button cwz thickbox" href="media-upload.php?type=image&amp;TB_iframe=1&amp;width=640&amp;height=338">Media Library</a> </p>                
                <table class="widefat table_sort" tabindex="">
                
                    <thead>
                        <tr style="cursor: move;">
                            <th width="40px">Order</th>
                            <th width="20px">&nbsp;</th>
                            <th width="280px">Setting</th>
                            <th width="280px">Description</th>
                            <th width="280px">&nbsp;</th>
                            <th width="300px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>                    
                
                    <tbody>
                      <?php 
                     
                      $count = $get_gallery_data['slideset_id_slide_count'] +1; 
					  if(!$get_gallery_data['slideset_id_slide_count']) {$count="2";}
                      
					  for($z = 0; $z < $count; $z++) {
                      
					  if($z+1 == $count){ $get_gallery_data=null;}
					  ?>
                    <tr class="multitable multitable_hide_rm<?php if ($z+1 == $count) echo ' hidden'; if($z+1 == $count) echo ' clone_row';?>">
                        
                    <td class="slider_drag media-list-wrap">
                    <div class="slider_img_wrap" style="position:relative"></div>
                      <span class="changenumber"><?php echo $z+1; ?></span>
                    </td>
                      
                    <td>
                      <a href='#' title="Delete Row" tabindex="" class='del_row' id='del_number_<?php echo $z + 1; ?>'><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/delete.png" alt="Delete Slide" /></a>
                    </td>
                      
                    <td class="media-list-wrap" style="min-width:320px;">
                      <div style="float:left;width:110px;">Image URL</div>
                      <div style="position:relative">
                      <input class="correct_num get-media-list" id="slideset_id_url_<?php echo $z; ?>" name="slideset_id_url_<?php echo $z; ?>" type="text" value="<?php echo $get_gallery_data['slideset_id_url_'.$z] ?>" /> 
                      <?php  if(get_option('medialib_disable')=='enable' || get_option('medialib_disable')=='') { ?>
						   <img src="/wp-admin/images/media-button-image.gif?ver=20100531" class="media-list-button" alt="Add an Image">
					  <?php } else { ?>
						  <a href="media-upload.php?post_id=3239&amp;type=image&amp;TB_iframe=1" id="add_image" class="thickbox" title="Add an Image"><img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a>
					  <?php } ?><br />
                      </div>
                      <div style="float:left;width:110px;">Link URL</div>
                      <input class="correct_num" id="slideset_id_link_<?php echo $z; ?>" name="slideset_id_link_<?php echo $z; ?>" type="text" value="<?php echo $get_gallery_data['slideset_id_link_'.$z] ?>" /><br />
                
                      <div style="float:left;width:110px;">Disable Link Text</div>
                      <?php if($get_gallery_data['slideset_id_disreadmore_'.$z]){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                      <input class="correct_num" type="checkbox" id="slideset_id_disreadmore_<?php echo $z; ?>" name="slideset_id_disreadmore_<?php echo $z; ?>" value="true" <?php echo $checked; ?> /><small class="description">Disable Read More text.</small><br class="clear" />
              
				      
                      <div style="float:left;width:110px;">Image Crop</div>
                      <select class="correct_num" id="slideset_id_crop_<?php echo $z; ?>" name="slideset_id_crop_<?php echo $z; ?>">
                      <?php
                      $crop_image = array("Crop","Zoom","Zoom Crop");
                      foreach ($crop_image as $crop_image) {
                      if ($get_gallery_data['slideset_id_crop_'.$z] == $crop_image && $z+1 != $count){
                      $selected = "selected='selected'";	
                      }else{
                      $selected = "";		
                      }
                      echo"<option $selected value='". $crop_image."'>". $crop_image."</option>";
                      }
                      ?>
                      </select><br />
                      <div style="float:left;width:110px;">Stage Content</div>
                      <select class="correct_num" id="slideset_id_stagecontent_<?php echo $z; ?>" name="slideset_id_stagecontent_<?php echo $z; ?>">
                      <?php
                      $stage_content = array("Image Only","Text/Image (Left Align)","Text/Image (Right Align)","Title Overlay Image","Title / Text Overlay Image","Text Only");
                      foreach ($stage_content as $stage_content) {
                      if ($get_gallery_data['slideset_id_stagecontent_'.$z] == $stage_content && $z+1 != $count){
                      $selected = "selected='selected'";	
                      }else{
                      $selected = "";
                      }
					   echo"<option $selected value='". $stage_content ."'>". $stage_content."</option>";
                      }
                      ?>
                      </select><br />
                      
                    </td>
                      
                    <td>
                    <div style="float:left;width:80px;">Title</div>
                    <input class="correct_num get-media-list-title" id="slideset_id_title_<?php echo $z; ?>" name="slideset_id_title_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_title_'.$z])); ?>" /><br />          
                    <div style="float:left;width:80px;">Description</div><textarea rows="2" class="correct_num get-media-list-desc" id="slideset_id_desc_<?php echo $z; ?>" name="slideset_id_desc_<?php echo $z; ?>"><?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_desc_'.$z])); ?></textarea><br />
                      <div style="float:left;width:80px;">Title Overlay</div>
                      <select class="correct_num" id="slideset_id_overlay_<?php echo $z; ?>" name="slideset_id_overlay_<?php echo $z; ?>">
                      <?php
                      $overlay = array("Disabled","Center Left Light","Center Right Light","Center Middle Light","Center Left Dark","Center Right Dark","Center Middle Dark","Top Left Light","Top Right Light","Top Middle Light","Top Left Dark","Top Right Dark","Top Middle Dark Text","Bottom Left Light","Bottom Right Light","Bottom Middle Light","Bottom Left Dark","Bottom Right Dark","Bottom Middle Dark");
                      foreach ($overlay as $overlay) {
                      if ($get_gallery_data['slideset_id_overlay_'.$z] == $overlay && $z+1 != $count){
                      $selected = "selected='selected'";	
                      }else{
                      $selected = "";
                      }
                      if($overlay!="Disabled") {
                        echo"<option $selected value='". $overlay."'>". $overlay."</option>";
                      } else {
                        echo"<option $selected value=''>". $overlay."</option>";				  
                      }
                      }
                      ?>
                      </select><br />
                    </td>

                    <td>
                    <div style="float:left;width:80px;">Video URL</div>
                    <input class="correct_num" id="slideset_id_videourl_<?php echo $z; ?>" name="slideset_id_videourl_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_videourl_'.$z])); ?>" /><br />   
                      <div style="float:left;width:80px;">Embed Type</div>
                      <select class="correct_num" id="slideset_id_embed_<?php echo $z; ?>" name="slideset_id_embed_<?php echo $z; ?>">
                      <?php
                      $video_embed = array("Disabled","Vimeo","YouTube","SWF","3dvid","jwp");
                      foreach ($video_embed as $video_embed) {
                      if ($get_gallery_data['slideset_id_embed_'.$z] == $video_embed && $z+1 != $count){
                      $selected = "selected='selected'";	
                      }else{
                      $selected = "";		
                      }
                      if($video_embed!="Disabled") {
					  	if($video_embed=="3dvid") {
					     echo"<option $selected value='". $video_embed."'>Video (3d Gallery Only)</option>";					  
						} elseif($video_embed=="jwp") {
						 echo"<option $selected value='". $video_embed."'>JW Player</option>";	
						} else {
                          echo"<option $selected value='". $video_embed."'>". $video_embed."</option>";
						}
                      } else {
                        echo"<option $selected value=''>". $video_embed."</option>";				  
                      }
                      }
                      ?>
                      </select><br />
                           
                    <div style="float:left;width:80px;">Timeout</div>
                    <input class="correct_num" style="width:30px" id="slideset_id_timeout_<?php echo $z; ?>" name="slideset_id_timeout_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_timeout_'.$z])); ?>" /><small class="description">Seconds</small><br />
                    <div style="float:left;width:80px;">Autoplay</div>
                    <?php if($get_gallery_data['slideset_id_autoplay_'.$z]){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                    <input class="correct_num" type="checkbox" id="slideset_id_autoplay_<?php echo $z; ?>" name="slideset_id_autoplay_<?php echo $z; ?>" value="true" <?php echo $checked; ?> /> <small class="description">(YouTube, Vimeo, Video(3d) Embed)</small><br />
            
                    </td>

                    <td>
					  <div style="float:left;width:110px;">CSS Classes</div>
					  <input class="correct_num" id="slideset_id_cssclasses_<?php echo $z; ?>" name="slideset_id_cssclasses_<?php echo $z; ?>" type="text" style="width:120px" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_cssclasses_'.$z])); ?>" /><small class="description">Separate by spaces</small><br />
                      <div style="float:left;width:110px;">Filter Category</div>
                      <select class="catselect">
                      
                      <?php
					  echo"<option value='Disabled'>Select Category</option>";	
					  $filter_categories = explode(",", $filter_categories_str);
					  
					  if(is_array($filter_categories)) {
                        foreach ($filter_categories as $filter_categories) {
    					  
                          if($filter_categories!="Disabled") {
                            echo"<option value='". $filter_categories."'>". $filter_categories."</option>";
                          } else {
                            echo"<option value=''>". $filter_categories."</option>";				  
                          }
                        }
					  } else {	  
                         if($filter_categories!="Disabled") {
                            echo"<option value='". $filter_categories."'>". $filter_categories."</option>";
                          } else {
                            echo"<option value=''>". $filter_categories."</option>";				  
                          }					  
					  }
                      ?>
                      </select><br />
                      <input type="hidden" class="correct_num selected_cats" id="slideset_id_catselect_<?php echo $z; ?>" name="slideset_id_catselect_<?php echo $z; ?>" value="<?php echo $get_gallery_data['slideset_id_catselect_'.$z]; ?>" />
                      <ul id="catselect">
                      <?php
					  if($get_gallery_data['slideset_id_catselect_'.$z]) {
							$selected_cats = explode(",", $get_gallery_data['slideset_id_catselect_'.$z] );
							
							if(is_array($selected_cats)) {
								foreach ($selected_cats as $selected_cat) { ?>
									<li class="button-secondary" title="<?php echo $selected_cat; ?>"><span class="cat-remove"></span><?php echo $selected_cat; ?></li>
								<?php }
							} else { ?>
									<li class="button-secondary" title="<?php echo $selected_cats; ?>"><span class="cat-remove"></span><?php echo $selected_cats; ?></li>
							<?php }
							
					  }
					  ?>
                      
                      </ul>
                      <div class="reveal threed"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext">3d Gallery Settings</div></div>
					  <div class="reveal-content">
					  <br />
					  <div style="float:left;width:110px;">Pieces</div>
                      <input class="correct_num" style="width:40px" id="slideset_id_segments_<?php echo $z; ?>" name="slideset_id_segments_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_segments_'.$z])); ?>" /><br />

					  <div style="float:left;width:110px;">Transition</div>
                      
	                  <select class="correct_num" id="slideset_id_transition_<?php echo $z; ?>" name="slideset_id_transition_<?php echo $z; ?>">
                      <?php
					  echo"<option value=''>Select</option>";
                      $tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeOutInCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeOutInQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeOutInCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeOutInBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeOutInQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeOutInQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeOutInExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeOutInElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce", "easeOutInBounce");
		 
                      foreach ($tween_types as $tween_type) {
                      if ($get_gallery_data['slideset_id_transition_'.$z] == $tween_type && $z+1 != $count){
                      $selected = "selected='selected'";	
                      }else{
                      $selected = "";		
                      }
                      if($video_embed!="Disabled") {
                          echo"<option $selected value='". $tween_type ."'>". $tween_type ."</option>";
                      } 
                      }
                      ?>
                      </select><br />				  
 					  <div style="float:left;width:110px;">Transition Time</div>
                      <input class="correct_num" style="width:40px" id="slideset_id_transtime_<?php echo $z; ?>" name="slideset_id_transtime_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_transtime_'.$z])); ?>" /><small class="description">Seconds (Default 1.2)</small><br class="clear" />

 					  <div style="float:left;width:110px;">Delay</div>
                      <input class="correct_num" style="width:40px" id="slideset_id_transdelay_<?php echo $z; ?>" name="slideset_id_transdelay_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_transdelay_'.$z])); ?>" /><small class="description">Seconds (Default 0.1)</small><br />

 					  <div style="float:left;width:110px;">Depth Offset</div>
                      <input class="correct_num" style="width:40px" id="slideset_id_depthoffset_<?php echo $z; ?>" name="slideset_id_depthoffset_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_depthoffset_'.$z])); ?>" /><small class="description">(-200 to 700)</small><br />

 					  <div style="float:left;width:110px;">Cube Distance</div>
                      <input class="correct_num" style="width:40px" id="slideset_id_cubedistance_<?php echo $z; ?>" name="slideset_id_cubedistance_<?php echo $z; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_gallery_data['slideset_id_cubedistance_'.$z])); ?>" /><small class="description">(Default 20)</small><br />
               
   
					  </div>        	
					  	
          
                    	</td>                    
                      </tr>
                      <?php } ?>
                    </tbody>
                
                </table>
                <p>&nbsp;</p>
				<input type="submit" class="button-secondary apply add_row correct_gallery_num" id="" value="Add New Slide" /> <a title="Add an Image" class="button cwz thickbox" href="media-upload.php?type=image&amp;TB_iframe=1&amp;width=640&amp;height=338">Media Library</a></p>                
                </div>
            </td>
            </tr>
            </tbody>
        </table>
        </div>
        </div>
        <p><input type="submit" class="button-primary slideset-save" value="<?php _e('Save Slide Set') ?>" name="save" /></p>
        <input type="hidden" name="action" value="update" />
                 
        </form>
		<?php } ?>
</div>
