<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'general-settings-group' ); 


// Gallery Data Export
$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
$slideset_data_ids = explode(",", $slideset_data_ids);

$gallery_data_options=array();

foreach($slideset_data_ids as $slideset_data_id) {
	$gallery_data_options[$slideset_data_id]=maybe_unserialize(get_option('slideset_data_'.$slideset_data_id));
}

$gallery_data_options = serialize($gallery_data_options); // serialise data
$gallery_data_options=base64_encode($gallery_data_options); // encode data


?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">DynamiX General Settings</h2>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Wordpress Custom Menu (For Main Menu)</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top">
<strong>Enable WP Custom Menu</strong><br />
<small class="description">Enable the Wordpress Custom Menu system for the Main Menu navigation.</small><br /><br />

	<label for="cufon_enable">Enable</label> 
    	<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="cufon_enable">Disable</label> 
    	<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="disable" || get_option('wpcustomm_enable')=="") {?> checked="checked" <?php } ?>  value="disable" />
  </td>
<td class="tr-top">
<strong>Enable WP Custom Menu Descriptions</strong><br />
<small class="description">Enable Custom Menu descriptions for Extended Menu ONLY. See documentation for more information.</small><br /><br />

	<label for="wpcustommdesc_enable">Enable</label> 
    	<input type="radio" name="wpcustommdesc_enable" <?php if(get_option('wpcustommdesc_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="wpcustommdesc_enable">Disable</label> 
    	<input type="radio" name="wpcustommdesc_enable" <?php if(get_option('wpcustommdesc_enable')=="disable" || get_option('wpcustommdesc_enable')=="") {?> checked="checked" <?php } ?>  value="disable" />
 </td>  
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<?php if (class_exists( 'BP_Core_User' ) || class_exists('bbPress')) { ?>
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>BuddyPress / bbPress Page Layout Config</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
<td class="tr-top">
<strong>Page Configuration</strong><br />
<small class="description">Select Page Configuration options.</small><br /><br />
<label><small class="description">Layout</small></label>
	<select name="buddylayout">
		<option <?php if(get_option('buddylayout')=="layout_four") {?> selected="selected" <?php } ?> value="layout_four">1x Column (Right)</option>    
		<option <?php if(get_option('buddylayout')=="layout_one") {?> selected="selected" <?php } ?> value="layout_one">Full Width</option>
		<option <?php if(get_option('buddylayout')=="layout_two") {?> selected="selected" <?php } ?> value="layout_two">1x Column (Left)</option>
		<option <?php if(get_option('buddylayout')=="layout_three") {?> selected="selected" <?php } ?> value="layout_three">2x Column (Left)</option>
		<option <?php if(get_option('buddylayout')=="layout_five") {?> selected="selected" <?php } ?> value="layout_five">2x Column (Right)</option> 
		<option <?php if(get_option('buddylayout')=="layout_six") {?> selected="selected" <?php } ?> value="layout_six">2x Column (Left,Right)</option>                            
	</select>

<span style="margin-right:20px;">&nbsp;</span>
<label><small class="description">Content Border</small></label><span style="margin-right:10px;">&nbsp;</span>
<label for="buddycontentborder">Enable</label> 
    	<input type="radio" name="buddycontentborder" <?php if(get_option('buddycontentborder')=="enable" || get_option('buddycontentborder')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
<label for="archbreadcrumb">Disable</label> 
    	<input type="radio" name="buddycontentborder" <?php if(get_option('buddycontentborder')=="disable") {?> checked="checked" <?php } ?>  value="disable" />            
        
  </td>
</tr>
<tr valign="top">
<td class="tr-top">
<strong>Column Configuration</strong><br />
<small class="description">If sidebars are required, please select below for each column (Column Two option is ignored if not required).</small><br /><br />
<?php $num_sidebars=get_option('sidebars_num');?>
<label for="buddycolone">Select Sidebar for <em>Column <strong>One</strong></em></label> 
<select name="buddycolone">
		<?php
			if(!$num_sidebars) $num_sidebars='2';
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('buddycolone')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select>
<span style="margin-right:20px;">&nbsp;</span>
<label for="buddycolone_border">Border</label> 
    	<input type="radio" name="buddycolone_border" <?php if(get_option('buddycolone_border')=="sidebarwrap" || get_option('buddycolone_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="buddycolone_border">Borderless</label> 
    	<input type="radio" name="buddycolone_border" <?php if(get_option('buddycolone_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />
<br />

<label for="buddycoltwo">Select Sidebar for <em>Column <strong>Two</strong></em></label> 
<select name="buddycoltwo">
		<?php
			$i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if(get_option('buddycoltwo')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				} 
		?>
</select>
<span style="margin-right:20px;">&nbsp;</span>
<label for="buddycoltwo_border">Border</label> 
    	<input type="radio" name="buddycoltwo_border" <?php if(get_option('buddycoltwo_border')=="sidebarwrap" || get_option('buddycoltwo_border')=="" ) {?> checked="checked" <?php } ?>  value="sidebarwrap" /> 
<label for="buddycoltwo_border">Borderless</label> 
    	<input type="radio" name="buddycoltwo_border" <?php if(get_option('buddycoltwo_border')=="borderless") {?> checked="checked" <?php } ?>  value="borderless" />

  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->
<?php } ?>



<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Full Widget Footer / Drop Panel</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top">
<small class="description">Enable Widget based Footer / Drop Panel columns, once enabled goto Appearance -> Widgets.</small><br /><br />

	<label for="cufon_enable">Enable</label> 
    	<input type="radio" name="ftdrpwidget_enable" <?php if(get_option('ftdrpwidget_enable')=="enable" || get_option('BotFirstselect')=="" && get_option('TopFirstselect')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 

	<label for="cufon_enable">Disable</label> 
    	<input type="radio" name="ftdrpwidget_enable" <?php if(get_option('ftdrpwidget_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Sidebars</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top"><label for="sidebars_num">Enter the amount of Sidebars required.</label> 
	<input type="text" name="sidebars_num"  size="4" value="<?php echo get_option('sidebars_num'); ?>" /><small class="description">Default is 2 Sidebars. See <a href="/wp-admin/widgets.php">Widgets</a>.</small></td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Branding Image</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong>Upload Branding Image.</strong><br />
        <small class="description">Enter Image URL or leave empty to display <strong>Blog Title</strong> &amp; <strong>Tagline</strong> text, see <a href="options-general.php">Settings</a>. Dimensions of logo must be within (W) 225px * (H) 50px<br />
        <br /></small>
    	<label for="branding_url">URL of  Image</label>
        	<input type="text" name="branding_url" size="50" value="<?php echo get_option('branding_url'); ?>" /> 
  			<a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Upload</a><small class="description">Copy  URL into box.</small>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Timthumb Image Resizing Script</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
	<strong>Disable or Enable the Timthumb image resizing script.</strong><br />
  	<label for="cufon_enable">Enable</label> 
      	<input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 
  
  	<label for="cufon_disable">Disable</label> 
      	<input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  			
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Excerpt Control</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<p>Please visit the <a href="<?php echo site_url('/wp-admin/options-general.php?page=options-advancedexcerpt'); ?>">Excerpt</a> admin page for controlling the output of the excerpt content.<p>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<?php /*
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>jQuery Priority Loading</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label  class="tooltip-next" for="priority_loading">jQuery Priority</label>
		<div class="tooltip-info"></div>
		<div class="tooltip">This option is allows HTML to load before any Javascript is initiated. This should improve your <em>Google Page Speed</em> score.</div>        
	</td>
    <td class="tr-top">           
  		<label for="priority_loading">Enable</label> 
		<input type="radio" name="priority_loading" <?php if(get_option('priority_loading')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
  
  		<label for="priority_loading">Disable</label> 
		<input type="radio" name="priority_loading" <?php if(get_option('priority_loading')=="") {?> checked="checked" <?php } ?>  value="" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->
*/ ?>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>JW Player Configuration</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong>Upload JW Player Core Files</strong><br />
        For JW Player to work you <strong>MUST</strong> download the core files from <a href="http://www.longtailvideo.com/players/jw-flv-player/">Longtail Video</a>. 
        <br /><br />
		You can upload the following files <em>( jwplayer.js, player.swf )</em> into the media library and copy the URL's from there into the relevant boxes. <a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Media Library</a><br /><br />
    	<label for="jwplayer_js" style="width:235px;display:inline-block;">JW Player <strong>Javascript</strong> URL <small class="description">( jwplayer.js )</small></label>
        	<input type="text" name="jwplayer_js" size="50" value="<?php echo get_option('jwplayer_js'); ?>" /><br />
    	<label for="jwplayer_swf" style="width:235px;display:inline-block;">JW Player <strong>Flash</strong> URL <small class="description">( player.swf )</small></label>
        	<input type="text" name="jwplayer_swf" size="50" value="<?php echo get_option('jwplayer_swf'); ?>" /><br /> 			 
		<label for="jwplayer_plugins" style="width:235px;display:inline-block;">JW Player <strong>Plugins</strong> <small class="description">( comma separated )</small></label>
        	<input type="text" name="jwplayer_plugins" size="50" value="<?php echo get_option('jwplayer_plugins'); ?>" /><br />
		<label for="jwplayer_skin" style="width:235px;display:inline-block;">JW Player <strong>Skin</strong> URL <small class="description">( .zip )</small></label>
        	<input type="text" name="jwplayer_skin" size="50" value="<?php echo get_option('jwplayer_skin'); ?>" /><br /> 		
		<label for="jwplayer_skinpos" style="width:235px;display:inline-block;">Controlbar Position</label>	
	<select name="jwplayer_skinpos">
		<option <?php if(get_option('jwplayer_skinpos')=="") {?> selected="selected" <?php } ?> value="">Over</option>
		<option <?php if(get_option('jwplayer_skinpos')=="top") {?> selected="selected" <?php } ?> value="top">Top</option>
		<option <?php if(get_option('jwplayer_skinpos')=="bottom") {?> selected="selected" <?php } ?> value="bottom">Bottom</option>                  
	</select><p>&nbsp;</p>
		    
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Twitter</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td  class="tr-top"><label for="twitter_usrname">Enter your Twitter username</label> 
	<input type="text" name="twitter_usrname" value="<?php echo get_option('twitter_usrname'); ?>" /><small class="description">Latest Tweets will be pulled from this username.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="twitter_feednum">Number of Tweets</label> 
	<input type="text" name="twitter_feednum" value="<?php echo get_option('twitter_feednum'); ?>" /><small class="description">Enter the amount of Tweets you would like to display.</small></td>
</tr>
<tr valign="top">
<td class="tr-top"><label for="twitter_label">Twitter Pod Label</label> 
	<input type="text" name="twitter_label" value="<?php echo get_option('twitter_label'); ?>" /><small class="description">Enter the label for the Twitter pod. (Blank is Latest Tweets)</small></td>
</tr>

</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Media Library Image List (Gallery Slide Set)</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
	<strong>Disable or Enable the Gallery Slide Set Media Library Image List.</strong><br />
  	<label for="cufon_enable">Enable</label> 
      	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 
  
  	<label for="cufon_disable">Disable</label> 
      	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  			
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="inskin,outskin,branding_url,font_color,font_link,font_hover,side_link,side_hover,sidebars_num,cufon_enable,cufontags,cufon_font,cufongradpri_1,cufongradpri_2,cufongradpri_3,cufongradpri_4,cufongradsec_1,cufongradsec_2,cufongradsec_3,cufongradsec_4,twitter_usrname,twitter_feednum,twitter_label" />
</form>

<form method="post" id="slideset-export" action="" enctype="multipart/form-data">
<div class="metabox-holder">
<div>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Export / Import Gallery Slide Set Settings</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
        <label for="sidebars_num"><strong>Export Slide Set Settings</strong></label><br />
<small class="description">Highlight all data below and copy/paste and save into a text file.</small><br />
        <textarea name="slideset_export" style="width:400px;height:100px;" id="slideset_export" /><?php echo $gallery_data_options; ?></textarea><small class="description"></small>
    </td>
	<td class="tr-top">
        <label for="slideset_import"><strong>Import Slide Set Settings</strong></label><br />
<small class="description">Upload previously generated export text file into this field and click the 'Import Data' button.</small><br />
        <input name="slideset_import"  type="file" />
        <p class="submit"><br />
			<input type="submit" name="save" class="button-primary" value="<?php _e('Import Data') ?>" />
		</p>
    </td>    
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


</div>
</div>
</form>
</div>