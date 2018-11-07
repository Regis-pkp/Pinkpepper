<?php if(get_option('medialib_disable')=='enable'||get_option('medialib_disable')=='') { ?>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('0(1F).1E(4(){0(\'.M-L.1D\').K().J(I).H(i);0(".P-1C").f(4(){0("#P-1B").O("1A","").O("1z","1y");e(0("#N").6()!=""&&0("#N").6()!="1x 1w 1v 1u"){G 1t}0(\'.M-L.a\').K().J(I).H(i);G 1s});F();y()});4 F(){0(\'.2-3-1r\').f(4(){0(\'.2-3\').v();0(9).1q().t(\'<5 7="2-3" 1p="1o:1n;"><C><j 7="2-3-j"><d><b>1m 1l 1k</b><b><E 7="2-z"></E><1j 1i="D" B="D" 1h="1g" 1f="1" /> 1e 1d / 1c</b></d></j></C><5 B="2-3"><5 7="1b-1a"></5></5></5>\');0(\'.2-3\').19({18:\'17\'},i);$8=0(\'#2-3-q\').6();0("#2-3").p($8+"/o/n/m/2-3.l",4(16,h,g){e(h=="a"){x A="15 14 13 12 11 a: ";0("#a").10(A+g.h+" "+g.Z)}});0(\'.2-z\').f(4(){0(\'5.2-3\').Y()})})}4 y(){0(\'.X-2-3\').W(4(){x $c=0(9).6();e($c){$u=0(9).V(\'d\').w(\'.U\');0(9).w(\'.s-r\').v();0($u).t(\'<5 7="s-r"><T S="\'+$c+\'" /></5>\')}})}4 R($k){$8=0(\'#2-3-q\').6();0("#2-3").p($8+\'/o/n/m/2-3.l?Q=\'+$k)}',62,104,'jQuery||media|list|function|div|val|class|media_list_url|this|error|th|imageval|tr|if|click|xhr|status|400|thead|getpage|php|inc|adm|lib|load|url|image|preview|append|place_img|remove|find|var|display_image|close|msg|id|table|addtitledesc|span|get_media_list|return|slideUp|4000|delay|fadeIn|wrap|alertbox|skin_id_id|attr|skin|page|load_pagination|src|img|slider_img_wrap|closest|each|get|hide|statusText|html|an|was|there|but|Sorry|response|show|width|animate|loader|ajax|Description|Title|Add|value|checkbox|type|name|input|Images|Library|Media|350px|left|style|parent|button|false|true|ID|Skin|New|Enter|_self|target|action|data|save|green|ready|document'.split('|')))


jQuery(document).ready(function() {
jQuery("#preview-skin").click(function() {
	var previewurl = jQuery('#page-preview  option:selected').val();
	var permalink = '<?php if ( get_option('permalink_structure') != '') { echo'yes'; } else { echo 'no'; } ?>';
	if(!previewurl) {
		previewurl = '<?php echo get_bloginfo('url'); ?>';
		var permalink_tag = '?';
	
	} else {
		if(permalink=='yes') {var permalink_tag = '?';} else {var permalink_tag = '&';}
	}
	
	jQuery("#skin-data").attr("action", previewurl+permalink_tag+"preview=skin").attr("target","_blank").submit();
});

opac_slider();
});
</script>
<?php }

$font = array('"Lucida Grande", "Lucida Sans Unicode", Arial, Verdana, sans-serif','"Helvetica Neue", Helvetica, Arial, sans-serif','Baskerville, "Times New Roman", Times, serif','Cambria, Georgia, Times, "Times New Roman", serif','"Century Gothic", "Apple Gothic", sans-serif','Consolas, "Lucida Console", Monaco, monospace','"Copperplate Light", "Copperplate Gothic Light"','"Courier New", Courier, monospace','"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif','Futura, "Century Gothic", AppleGothic, sans-serif','Garamond, "Hoefler Text", Times New Roman, Times, serif','Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif','Perpetua, Baskerville, "Big Caslon", "Palatino Linotype", Palatino, "URW Palladio L", "Nimbus Roman No9 L", serif;','Didot,"Bodoni MT", "Century Schoolbook", "Niagara Solid", Utopia, Georgia, Times, "Times New Roman", serif','Verdana, Tahoma, "Trebuchet MS", "DejuVu Sans", "Bitstream Vera Sans", sans-serif'); // Font List


$font_styles='
<div class="tooltip" style="opacity:1;max-width:620px">
<span class="font-a">"Helvetica Neue", Helvetica, Arial, sans-serif</span><br />
<span class="font-b">Baskerville, "Times New Roman", Times, serif</span><br />
<span class="font-c">Cambria, Georgia, Times, "Times New Roman", serif</span><br />
<span class="font-d">"Century Gothic", "Apple Gothic", sans-serif</span><br />
<span class="font-e">"Copperplate Light", "Copperplate Gothic Light"</span><br />
<span class="font-f">"Courier New", Courier, monospace</span><br />
<span class="font-g">"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif</span><br />
<span class="font-h">Futura, "Century Gothic", AppleGothic, sans-serif</span><br />
<span class="font-i">Garamond, "Hoefler Text", Times New Roman, Times, serif</span><br />
<span class="font-j">Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif</span><br />
<span class="font-l">Perpetua, Baskerville, "Big Caslon", "Palatino Linotype", Palatino, "URW Palladio L", "Nimbus Roman No9 L", serif</span><br />
<span class="font-m">Didot,"Bodoni MT", "Century Schoolbook", "Niagara Solid", Utopia, Georgia, Times, "Times New Roman", serif</span><br />
<span class="font-n">Verdana, Tahoma, "Trebuchet MS", "DejuVu Sans", "Bitstream Vera Sans", sans-serif;</span><br />
</div>';
																		
$cufonfont_styles='<div class="tooltip" style="opacity:1;max-width:590px"><img src="'. get_bloginfo('template_directory') .'/lib/adm/imgs/font-list.jpg" /></div>';



if (!$get_skin_num) {
	 $get_skin_num = 1;
}


if($_POST['skin_select']) $skin_select = $_POST['skin_select'];

$get_skin_data = maybe_unserialize(get_option('skin_data_customplus')); 
?>
<div class="wrap skinmanager form-table ">
<div id="icon-options-general" class="icon32"></div><h2 style="padding-bottom:15px">Skin Settings</h2>
<input name="media-list-url" id="media-list-url" type="hidden" value="<?php bloginfo('template_directory'); ?>" />
		<?php		
		if ( $_POST['delete'] && $_POST['skin_id_dbid']  ) { ?>
		<p>       
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Skin Preset was successfully deleted.</p>
    		</div>
		</div>		
		</p>
		<?php } elseif($_POST['save']) { ?>
		<p>
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Skin Preset was successfully saved.</p>
    		</div>
		</div>		
		</p>		
		<?php } ?>

        <form method="post" action="options.php">
		<?php settings_fields( 'skin-settings-group' ); ?>
        <input name="slideset_number" class="slideset_number count_hide_rm" type="hidden" value="<?php echo $get_skin_num; ?>" />
		
        <div class="table_wrap">
		<?php $slide_set = $get_skin_data['skin_id_id'];  
		?>
        <input id="skin_id_dbid" name="skin_id_dbid" type="hidden" value="customplus" />	
        <input id="skin_id_id" name="skin_id_id" type="hidden" value="customplus" />		
        <div id="table-<?php echo $i ?>" class="multitables selected_custom correct_gallery_num">

        <input name="skin_id_custom_count" id="skin_id_custom_count" class="slide_counter count_hide_rm correct_num" type="hidden" value="<?php if($get_skin_data['skin_id_custom_count']) echo $get_skin_data['skin_id_custom_count']; else echo "1";  ?>" />                                                            



		<table class="widefat b-margin overflow" tabindex="">
			<thead>
				<tr>
					<th>Skins</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
				</tr>
			</tfoot>                    
			<tbody>
            	<tr>
                	<td>    
                    	<table class="borderless">
 
                        <tr valign="top">
                        <td width="300" class="tr-top">
							 <div class="label-wrap" style="width:140px"><label for="skinopt"><strong>Header / Footer Skin</strong></label></div>
                            <select name="outskin">
                                <option <?php if(get_option('outskin')=="one") {?> selected="selected" <?php } ?> value="one">Light Grey</option>
                                <option <?php if(get_option('outskin')=="two") {?> selected="selected" <?php } ?> value="two">Dark Blue</option>
                                <option <?php if(get_option('outskin')=="three") {?> selected="selected" <?php } ?> value="three">Blue</option>
                                <option <?php if(get_option('outskin')=="four") {?> selected="selected" <?php } ?> value="four">Teal</option>
                                <option <?php if(get_option('outskin')=="five") {?> selected="selected" <?php } ?> value="five">Green</option> 
                                <option <?php if(get_option('outskin')=="six") {?> selected="selected" <?php } ?> value="six">Mustard</option>   
                                <option <?php if(get_option('outskin')=="seven") {?> selected="selected" <?php } ?> value="seven">Orange</option>           
                                <option <?php if(get_option('outskin')=="eight") {?> selected="selected" <?php } ?> value="eight">Red</option>   
                                <option <?php if(get_option('outskin')=="nine") {?> selected="selected" <?php } ?> value="nine">Pink</option>  
                                <option <?php if(get_option('outskin')=="ten") {?> selected="selected" <?php } ?> value="ten">Dark Grey</option>          
                                <option <?php if(get_option('outskin')=="eleven") {?> selected="selected" <?php } ?> value="eleven">Urban</option>  
                                <option <?php if(get_option('outskin')=="twelve") {?> selected="selected" <?php } ?> value="twelve">Carbon</option>  
                                <option <?php if(get_option('outskin')=="thirteen") {?> selected="selected" <?php } ?> value="thirteen">Wood</option> 
                                <option <?php if(get_option('outskin')=="fourteen") {?> selected="selected" <?php } ?> value="fourteen">Grunge</option>   
                                <option <?php if(get_option('outskin')=="fithteen") {?> selected="selected" <?php } ?> value="fithteen">Bokeh</option>                           
                                <option <?php if(get_option('outskin')=="sixteen") {?> selected="selected" <?php } ?> value="sixteen">Dark Teal</option>           
                                <option <?php if(get_option('outskin')=="seventeen") {?> selected="selected" <?php } ?> value="seventeen">Dark Green</option>   
                                <option <?php if(get_option('outskin')=="eighteen") {?> selected="selected" <?php } ?> value="eighteen">Dark Pink</option>   
                                <option <?php if(get_option('outskin')=="nineteen") {?> selected="selected" <?php } ?> value="nineteen">Dark Red</option>   
                                <option <?php if(get_option('outskin')=="twenty") {?> selected="selected" <?php } ?> value="twenty">Dark Brown</option>  
                                <option <?php if(get_option('outskin')=="custom") {?> selected="selected" <?php } ?> value="custom">Custom</option>
                                <option <?php if(get_option('outskin')=="customplus") {?> selected="selected" <?php } ?> value="customplus">Custom Skin + </option>                        
                            </select>
                        
                        
                        <small class="description">Affects the header, drop panel and footer background / foreground colors.</small><br />
                        </td>
                        </tr>
                        <tr>
                        <td class="tr-top">
							 <div class="label-wrap" style="width:140px"><label for="skinopt"><strong>Body Skin</strong></label></div>
                            <select name="inskin">
                                <option <?php if(get_option('inskin')=="one") {?> selected="selected" <?php } ?> value="one">Light</option>
                                <option <?php if(get_option('inskin')=="two") {?> selected="selected" <?php } ?> style="background:#202020;color:#fff;" value="two">Dark</option>
                            </select>
                        
                        
                        <small class="description">Affects the body background / foreground colors.</small><br />
                        </td>
                        </tr>
					</table>
				</td>                    
			</tr>
		</tbody>
	</table>                   


        
		<table class="widefat b-margin overflow" tabindex="">
			<thead>
				<tr>
					<th>General Styling Settings</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
				</tr>
			</tfoot>                    
			<tbody>
            	<tr>
                	<td>    
                    	<table class="borderless">
                                           
                                            	<tr>
                                                	<td width="140px" class="tr-top" colspan="3">
									<div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Font Settings</h4></div></div>
                                        <div class="reveal-content">
                                            <table class="borderless">
                                                    <tr>
                                                        <td class="tr-top">                           
                                                            <div class="label-wrap" style="width:140px"><label for="skin_font_size">Font Size:</label></div> <input class="xsmall" id="skin_id_background_font_size" name="skin_font_size" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_font_size'))); ?>" /><small class="description">px (default is 12)</small>
                                                        </td>
                                                    </tr>
													<tr>
                                                        <td width="140px" class="tr-top">
                                                            <div class="label-wrap" style="width:140px"><label for="skin_font">Font Family</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_font" name="skin_font">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($font as $background_font) {
                                                                    if (stripslashes(get_option('skin_font')) == $background_font && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $background_font ."'>". $background_font."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div> <div class="tooltip-info" style="margin-left:10px;margin-top:5px;"></div><?php echo $font_styles; ?>
														</td>
													</tr>


                                                <tr valign="top">
                                                <td class="tr-top">
                                                <div class="label-wrap" style="width:140px"><label for="font_color">Content Font Color</label></div>
                                                #<input type="text" id="font_color"  name="font_color"  size="15" value="<?php if(get_option('font_color')) {echo get_option('font_color');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
                                                </tr>
                                                <tr valign="top">
                                                <td class="tr-top">
                                                <div class="label-wrap" style="width:140px"><label for="font_link">Content Link Color</label></div>
                                                #<input type="text" name="font_link" id="font_link"  size="15" value="<?php if(get_option('font_link')) {echo get_option('font_link');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
                                                </tr>
                                                <tr valign="top">
                                                <td  class="tr-top">
                                                <div class="label-wrap" style="width:140px"><label for="font_hover">Content Link Hover</label></div>
                                                #<input type="text" id="font_hover" name="font_hover"  size="15" value="<?php if(get_option('font_hover')) {echo get_option('font_hover');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color</small></td>
                                                </tr>
                                                
                                                
                                                <tr valign="top">
                                                <td class="tr-top">
                                                <div class="label-wrap" style="width:140px"><label for="font_link">Sidebar Link Color</label></div>
                                                #<input type="text" id="side_link" name="side_link"  size="15" value="<?php if(get_option('side_link')) {echo get_option('side_link');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
                                                </tr>
                                                <tr valign="top">
                                                <td class="tr-top">
                                                <div class="label-wrap" style="width:140px"><label for="font_hover">Sidebar Link Hover</label></div>
                                                #<input type="text" id="side_hover" name="side_hover"  size="15" value="<?php if(get_option('side_hover')) {echo get_option('side_hover');} ?>" /><span class="color_icon">&nbsp;</span><small class="description">Clear to use default color.</small></td>
                                                </tr>


									</table>
                                    </div>
								</td>
							</tr>                        
         					<tr>
                           		<td width="140px" class="tr-top" colspan="3">
									<div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Cuf&oacute;n Font Options</h4></div></div>
                                        <div class="reveal-content">
                                            <table class="borderless">
                                                <tr valign="top">
                                                <td class="tr-top">
                                                    <label for="cufon_enable">Enable Cuf&oacute;n</label> 
                                                        <input type="radio" name="cufon_enable" <?php if(get_option('cufon_enable')=="enable" || get_option('cufon_enable')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
                                                
                                                    <label for="cufon_enable">Disable</label> 
                                                        <input type="radio" name="cufon_enable" <?php if(get_option('cufon_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
                                                  </td>
                                                </tr>
                                                </table>
                                                
                                                <table class="form-table">
                                                <tr valign="top">
                                                    <td class="tr-top">
                                                    <strong>Where to use Cuf&oacute;n effect.</strong><br />
                                                
                                                    <label for="cufontags">Branding &amp; <strong>h1</strong> - <strong>h6</strong> Tags </label> 
                                                        <input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="all") {?> checked="checked" <?php } ?>  value="all" /> 
                                                
                                                    <label for="cufontags">Branding &amp; <strong>h1</strong> - <strong>h2</strong> Tags </label> 
                                                        <input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="brandingh1h2") {?> checked="checked" <?php } ?>  value="brandingh1h2" /> 
                                                
                                                    <label for="cufontags">Branding Only</label> 
                                                        <input type="radio" class="hspace" name="cufon_tags" <?php if(get_option('cufon_tags')=="branding") {?> checked="checked" <?php } ?>  value="branding" /> 
                                                
                                                    </td>
                                                </tr>
                                                </table>
                                                
                                                <table class="form-table">
                                                <tr valign="top">
                                                    <td  class="tr-top">
                                                        <strong>Upload new Cuf&oacute;n font.</strong><br />
                                                        <small class="description">Default is Lucida Sans Unicode</small><br /><br />
                                                        <label for="cufon_font">Upload Cuf&oacute;n Font</label>
                                                            <input type="text" name="cufon_font" size="50" value="<?php echo get_option('cufon_font'); ?>" /> 
                                                            <a href="media-upload.php?TB_iframe=true" target="_blank" class="thickbox button" title="Add File">Upload</a><small class="description">Copy URL into box.</small><p>&nbsp;</p>
                                                            Download <a href="http://www.cufonfonts.com/" target="_blank">Cuf&oacute;n Fonts</a>.
                                                    </td>
                                                </tr>

                                                <tr valign="top">
                                                    <td class="tr-top">
                                                        <strong>Header / Footer Gradient Colors</strong><br />
                                                        <small class="description">Enter gradient colors from <strong>Top</strong> to <strong>Bottom</strong>, affects branding and drop panel colors.</small><br /><br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h1 Tag</h3></small></div>
                                                
                                                        <label for="cufongradpri_1">1: </label>#<input type="text" id="cufongradpri_1" name="cufongradpri_1" size="15" value="<?php if(get_option('cufongradpri_1')) {echo get_option('cufongradpri_1');} ?>" /><span class="color_icon">&nbsp;</span>
                                                        <label style="margin-left:20px" for="cufongradpri_2">2: </label>#<input type="text" id="cufongradpri_2" name="cufongradpri_2" size="15" value="<?php if(get_option('cufongradpri_2')) {echo get_option('cufongradpri_2');} ?>" /><span class="color_icon">&nbsp;</span>
                                                
                                                <br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h2 Tag</h3></small></div>
                                                
                                                        <label for="cufongradpri_3">1: </label>#<input type="text" id="cufongradpri_3" name="cufongradpri_3" size="15" value="<?php echo get_option('cufongradpri_3'); ?>" /><span class="color_icon">&nbsp;</span>
                                                        <label style="margin-left:20px" for="cufongradpri_4">2: </label>#<input type="text" id="cufongradpri_4" name="cufongradpri_4" size="15" value="<?php echo get_option('cufongradpri_4'); ?>" /><span class="color_icon">&nbsp;</span>
                                                
                                                <br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h3 - h6 Tags</h3></small></div>
                                                
                                                        <label for="cufongradpri_5">1: </label>#<input type="text" id="cufongradpri_5" name="cufongradpri_5" size="15" value="<?php echo get_option('cufongradpri_5'); ?>" /><span class="color_icon">&nbsp;</span>
                                                        <label style="margin-left:20px" for="cufongradpri_6">2: </label>#<input type="text" id="cufongradpri_6" name="cufongradpri_6" size="15" value="<?php echo get_option('cufongradpri_6'); ?>" /><span class="color_icon">&nbsp;</span>
                                                        
                                                    </td>
                                                </tr>
                                                
                                                <tr valign="top">
                                                    <td class="tr-mid">
                                                        <strong>Content / Sidebar Gradient Colors</strong><br />
                                                        <small class="description">Enter gradient colors from <strong>Top</strong> to <strong>Bottom</strong>, affects main content and sidebar colors.</small><br /><br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h1 Tag</h3></small></div>
                                                
                                                        <label for="cufongradsec_1">1: </label>#<input type="text" id="cufongradsec_1" name="cufongradsec_1" size="15" value="<?php if(get_option('cufongradsec_1')) {echo get_option('cufongradsec_1');} ?>" /><span class="color_icon">&nbsp;</span>
                                                        <label style="margin-left:20px" for="cufongradsec_2">2: </label>#<input type="text" id="cufongradsec_2"  name="cufongradsec_2" size="15" value="<?php if(get_option('cufongradsec_2')) {echo get_option('cufongradsec_2');} ?>" /><span class="color_icon">&nbsp;</span>
                                                
                                                <br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h2 Tag</h3></small></div>
                                                
                                                        <label for="cufongradsec_3">1: </label>#<input type="text" id="cufongradsec_3" name="cufongradsec_3" size="15" value="<?php echo get_option('cufongradsec_3'); ?>" /><span class="color_icon">&nbsp;</span>  
                                                        <label style="margin-left:20px" for="cufongradsec_4">2: </label>#<input type="text" id="cufongradsec_4" name="cufongradsec_4" size="15" value="<?php echo get_option('cufongradsec_4'); ?>" /><span class="color_icon">&nbsp;</span>
                                                
                                                <br class="clear" />
                                                <div class="label-wrap" style="width:140px"><small class="description"><h3>h3 - h6 Tags</h3></small></div>
                                                
                                                        <label for="cufongradsec_5">1: </label>#<input type="text" id="cufongradsec_5" name="cufongradsec_5" size="15" value="<?php echo get_option('cufongradsec_5'); ?>" /><span class="color_icon">&nbsp;</span>  
                                                        <label style="margin-left:20px" for="cufongradsec_6">2: </label>#<input type="text" id="cufongradsec_6" name="cufongradsec_6" size="15" value="<?php echo get_option('cufongradsec_6'); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>
                                         	</table>
                                    	</div>
								</td>
							</tr>                                                                                              		
			</tbody>    
		</table>

                	</td>
				</tr>                
			</tbody>               
		</table>
        
		<table class="widefat b-margin overflow" tabindex="">
			<thead>
				<tr>
					<th>Add Custom CSS</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
				</tr>
			</tfoot>                    
			<tbody>
            	<tr>
                	<td>
						<textarea name="custom_css" id="custom_css" style="width:100%;height:70px" /><?php echo get_option('custom_css'); ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>                                                
                                    
        
		<hr />
		<table class="widefat b-margin overflow" tabindex="">
			<thead>
				<tr>
					<th>Custom Skin +</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
				</tr>
			</tfoot>                    
			<tbody>
            	<tr>
                	<td>    
                    	<table class="borderless">
								<tr><?php //******** menu START ?>
                                    <td class="media-list-wrap tr-top" colspan="3"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Menu Settings</h4></div></div>
                                        <div class="reveal-content">                 
                                            <table  class="borderless">                                
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_menu_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_menu_link_color" name="skin_menu_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_menu_link_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_menu_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_menu_linkhover_color" name="skin_menu_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_menu_linkhover_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>  
                                                <tr>
													<td class="tr-top" colspan="2">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_menu_text_color">Text Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_menu_text_color" name="skin_menu_text_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_menu_text_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>                                                 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_menu_back_color">Drop Menu Background:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_menu_back_color" name="skin_menu_back_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_menu_back_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_menu_border_color">Drop Menu Border:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_menu_border_color" name="skin_menu_border_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_menu_border_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>                                                                                                                  
                                            </table> 
										</div>
									</td>											
								</tr>                               
								<tr><?php //******** header START ?>
                                    <td class="media-list-wrap tr-top" colspan="3"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Header Background</h4></div></div>
                                        <div class="reveal-content">                 
                                            <table  class="borderless">                                
                                                <tr>
                                                    <td class="media-list-wrap tr-top" colspan="2">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer1_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_header_image" name="skin_header_image" type="text" value="<?php echo get_option('skin_header_image'); ?>" />
																<?php  if(get_option('medialib_disable')=='enable' || get_option('medialib_disable')=='') { ?>
                                                                       <img src="/wp-admin/images/media-button-image.gif?ver=20100531" class="media-list-button" alt="Add an Image">
                                                                <?php } else { ?>
                                                                      <a href="media-upload.php?post_id=3239&amp;type=image&amp;TB_iframe=1" id="add_image" class="thickbox" title="Add an Image"><img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a>
                                                                <?php } ?><br />
                                                            </div>                                    
                                                    </td> 
                                                                                                                    
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_header_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_header_image_valign" name="skin_header_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if (get_option('skin_header_image_valign') == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_header_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_header_image_halign" name="skin_header_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if (get_option('skin_header_image_halign') == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_header_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_header_image_repeat" name="skin_header_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if (get_option('skin_header_image_repeat') == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                 						                                                    
                                                </tr>         
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_header_pri_color">Background Color Top:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_header_pri_color" name="skin_header_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_header_pri_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_header_sec_color">Background Color Bottom:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_header_sec_color" name="skin_header_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_header_sec_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>                                                                  
                                            </table> 
										</div>
									</td>											
								</tr>
								<tr><?php //******** header gallery START ?>
                                    <td class="media-list-wrap tr-top" colspan="3"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Header Gallery Background</h4></div></div>
                                        <div class="reveal-content">                 
                                            <table  class="borderless">                                
                                                <tr>
                                                    <td class="media-list-wrap tr-top" colspan="2">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer1_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_headergallery_image" name="skin_headergallery_image" type="text" value="<?php echo get_option('skin_headergallery_image'); ?>" />
																<?php  if(get_option('medialib_disable')=='enable' || get_option('medialib_disable')=='') { ?>
                                                                       <img src="/wp-admin/images/media-button-image.gif?ver=20100531" class="media-list-button" alt="Add an Image">
                                                                <?php } else { ?>
                                                                      <a href="media-upload.php?post_id=3239&amp;type=image&amp;TB_iframe=1" id="add_image" class="thickbox" title="Add an Image"><img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a>
                                                                <?php } ?><br />
                                                            </div>                                    
                                                    </td> 
                                                                                                                    
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_headergallery_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_headergallery_image_valign" name="skin_headergallery_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if (get_option('skin_headergallery_image_valign') == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_headergallery_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_headergallery_image_halign" name="skin_headergallery_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if (get_option('skin_headergallery_image_halign') == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_headergallery_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_headergallery_image_repeat" name="skin_headergallery_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if (get_option('skin_headergallery_image_repeat') == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                 						                                                    
                                                </tr>         
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_headergallery_pri_color">Background Color Top:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_headergallery_pri_color" name="skin_headergallery_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_headergallery_pri_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:140px"><label for="skin_headergallery_sec_color">Background Color Bottom:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_headergallery_sec_color" name="skin_headergallery_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_headergallery_sec_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>                                                                  
                                            </table> 
										</div>
									</td>											
								</tr>       
								<tr><?php //******** footer START ?>
                                    <td class="media-list-wrap tr-top" colspan="3"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php bloginfo('template_directory') ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Footer Settings</h4></div></div>
                                        <div class="reveal-content">    
                                                     
                                            <table  class="borderless">                                
                                                <tr>
                                                    <td class="media-list-wrap tr-top" colspan="2">
                                                        <div class="label-wrap" style="width:160px"><label for="skin_id_layer1_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_footer_image" name="skin_footer_image" type="text" value="<?php echo get_option('skin_footer_image'); ?>" />
																<?php  if(get_option('medialib_disable')=='enable' || get_option('medialib_disable')=='') { ?>
                                                                       <img src="/wp-admin/images/media-button-image.gif?ver=20100531" class="media-list-button" alt="Add an Image">
                                                                <?php } else { ?>
                                                                      <a href="media-upload.php?post_id=3239&amp;type=image&amp;TB_iframe=1" id="add_image" class="thickbox" title="Add an Image"><img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a>
                                                                <?php } ?><br />
                                                            </div>                                    
                                                    </td> 
                                                                                                                    
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:160px"><label for="skin_footer_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_footer_image_valign" name="skin_footer_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if (get_option('skin_footer_image_valign') == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:160px"><label for="skin_footer_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_footer_image_halign" name="skin_footer_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if (get_option('skin_footer_image_halign') == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap" style="width:160px"><label for="skin_footer_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_footer_image_repeat" name="skin_footer_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if (get_option('skin_footer_image_repeat') == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                 						                                                    
                                                </tr>         
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_pri_color">Background Color Top:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_pri_color" name="skin_footer_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_pri_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_sec_color">Background Color Bottom:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_sec_color" name="skin_footer_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_sec_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>                                                                  
                                  
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_link_color" name="skin_footer_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_link_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_linkhover_color" name="skin_footer_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_linkhover_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
                                                </tr>   
                                                <tr>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_text_color">Text Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_text_color" name="skin_footer_text_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_text_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>                                                
                                                    <td style="width:215px;" class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_back_color">Form Background:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_back_color" name="skin_footer_back_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_back_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
												</tr>
                                                <tr>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_border_tl_color">Form Border (Top,Left):</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_border_tl_color" name="skin_footer_border_tl_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_border_tl_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>
													<td class="tr-top">
                                                    <div class="label-wrap" style="width:160px"><label for="skin_footer_border_br_color">Form Border (Bottom,Right):</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_footer_border_br_color" name="skin_footer_border_br_color" type="text" value="<?php echo stripslashes(htmlspecialchars(get_option('skin_footer_border_br_color'))); ?>" /><span class="color_icon">&nbsp;</span>
                                                    </td>                                                    
                                                </tr>                                                                                                                  
                                            </table>                                             
											</div>
											</td>											
										</tr>                                                                                                                                                                             
									</table>       
           
							</td>
						</tr>
                        
					</table>
				</td>                    
			</tr>
            
		</tbody>
	</table>        
        
		<p>&nbsp;</p>    
	</div>
</div>
<p><input type="submit" class="button-primary skin-save" id="save-skin" value="<?php _e('Save Settings') ?>" name="save" /></p>
<input type="hidden" name="action" value="update" />             
</form>
</div>
