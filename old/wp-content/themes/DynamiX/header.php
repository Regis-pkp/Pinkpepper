<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(get_option('header_favicon')) { ?>
<link rel="shortcut icon" href="<?php echo get_option('header_favicon'); ?>" />
<?php } ?>
<title><?php if(is_front_page()) { bloginfo('name'); } else { wp_title( '', true, 'right' ); }?></title>

<?php
/***************************************************************/
/*	Call Custom Page Variables							   	   */
/***************************************************************/

if (have_posts()) : while (have_posts()) : the_post();
    $data = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true )); // Call custom page attributes  
endwhile; endif;

$show_slider = $data["gallery"];
$gallerycat=$data["gallerycat"];

require CWZ_FILES ."/inc/page-constants.php"; // Page Constants

/***************************************************************/
/*	Call Custom Page Variables *END*					   	   */
/***************************************************************/?>


<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<style type="text/css">
<?php require CWZ_DIR.'/style.php'; ?>
</style>

<?php
if(!$DYN_outskin) {if(DYN_OUTSKIN) {$DYN_outskin=DYN_OUTSKIN;} else {$DYN_outskin=$_SESSION['DYN_outskin'];}}
if(!$DYN_inskin) {if(DYN_INSKIN) {$DYN_inskin=DYN_INSKIN;} else {$DYN_inskin=$_SESSION['DYN_inskin'];}}

if($DYN_outskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/darkblue.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="three") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/blue.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="four" ) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/teal.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="five" ) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/green.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="six") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/mustard.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="seven") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/orange.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eight") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/red.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="nine") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/pink.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="ten") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/grey.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eleven") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/urban.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="twelve") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/carbon.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="thirteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/wood.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="fourteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/grunge.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="fithteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/bokeh.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="sixteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/teal-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="seventeen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/green-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="eighteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/pink-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="nineteen") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/red-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="twenty") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/brown-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="custom") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/custom.css" type="text/css" media="screen" />
<?php } elseif($DYN_outskin=="customplus") { 

$primary_color=get_option('skin_header_pri_color');
$secondary_color=get_option('skin_header_sec_color');

$primary_color_gallery=get_option('skin_headergallery_pri_color');
$secondary_color_gallery=get_option('skin_headergallery_sec_color');

$primary_color_footer=get_option('skin_footer_pri_color');
$secondary_color_footer=get_option('skin_footer_sec_color');

$header_image=get_option('skin_header_image');
$header_image_valign=get_option('skin_header_image_valign');
$header_image_halign=get_option('skin_header_image_halign');
$header_image_repeat=get_option('skin_header_image_repeat');


$headergallery_image=get_option('skin_headergallery_image');
$headergallery_image_valign=get_option('skin_headergallery_image_valign');
$headergallery_image_halign=get_option('skin_headergallery_image_halign');
$headergallery_image_repeat=get_option('skin_headergallery_image_repeat');

$footer_image=get_option('skin_footer_image');
$footer_image_valign=get_option('skin_footer_image_valign');
$footer_image_halign=get_option('skin_footer_image_halign');
$footer_image_repeat=get_option('skin_footer_image_repeat');

$footer_image=get_option('skin_footer_image');
$footer_image_valign=get_option('skin_footer_image_valign');
$footer_image_halign=get_option('skin_footer_image_halign');
$footer_image_repeat=get_option('skin_footer_image_repeat');

$footer_link		= (get_option('skin_footer_link_color')			!="") ? get_option('skin_footer_link_color')			: 'ffffff';
$footer_linkhover	= (get_option('skin_footer_linkhover_color')	!="") ? get_option('skin_footer_linkhover_color')		: 'd9d9d9';
$footer_text		= (get_option('skin_footer_text_color')			!="") ? get_option('skin_footer_text_color')			: 'd9d9d9';

$footer_form_back=get_option('skin_footer_back_color');
$footer_form_btl=get_option('skin_footer_border_tl_color');
$footer_form_bbr=get_option('skin_footer_border_br_color');


$menu_link		= (get_option('skin_menu_link_color')				!="") ? get_option('skin_menu_link_color')			: 'ffffff';
$menu_linkhover	= (get_option('skin_menu_linkhover_color')			!="") ? get_option('skin_menu_linkhover_color')		: 'd9d9d9';
$menu_text		= (get_option('skin_menu_text_color')				!="") ? get_option('skin_menu_text_color')			: 'd9d9d9';
$menu_back		= (get_option('skin_menu_back_color')				!="") ? get_option('skin_menu_back_color')			: $primary_color;
$menu_border	= (get_option('skin_menu_border_color')				!="") ? get_option('skin_menu_border_color')		: $primary_color;


?>

<style type="text/css">
/** Page Structure **/
#page.pages,#page.gallery,#wrapper,#wrapper.gallery {background:none;}
#wrapper .header-wrap {
 background: #<?php echo $primary_color; ?>;
<?php if($secondary_color) { ?>
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color; ?>, endColorstr=#<?php echo $secondary_color; ?>);
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color; ?>, endColorstr=#<?php echo $secondary_color; ?>)";
 background: -o-linear-gradient(top,#<?php echo $primary_color; ?>, #<?php echo $secondary_color; ?>);
 background: -moz-linear-gradient(100% 100% 90deg, #<?php echo $secondary_color; ?>,#<?php echo $primary_color; ?>);
 background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(#<?php echo $primary_color; ?>), to(#<?php echo $secondary_color; ?>));
 *background: transparent;
 zoom:1;
<?php } ?>;
}

<?php if($header_image) { ?>
#wrapper .header-wrap-img {
 background:url(<?php echo $header_image; ?>) <?php echo $header_image_halign.' '.$header_image_valign.' '.$header_image_repeat; ?>;
}
<?php }?>

#wrapper.gallery .header-wrap {
 background: #<?php echo $primary_color_gallery; ?>;
<?php if($secondary_color_gallery) { ?>
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color_gallery; ?>, endColorstr=#<?php echo $secondary_color_gallery; ?>);
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color_gallery; ?>, endColorstr=#<?php echo $secondary_color_gallery; ?>)";
 background: -o-linear-gradient(top,#<?php echo $primary_color_gallery; ?>, #<?php echo $secondary_color_gallery; ?>);
 background: -moz-linear-gradient(100% 100% 90deg, #<?php echo $secondary_color_gallery; ?>,#<?php echo $primary_color_gallery; ?>);
 background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(#<?php echo $primary_color_gallery; ?>), to(#<?php echo $secondary_color_gallery; ?>));
 *background: transparent;
 zoom:1;
<?php } ?>;
}

<?php if($headergallery_image) { ?>
#wrapper.gallery .header-wrap-img {
 background:url(<?php echo $headergallery_image; ?>) <?php echo $headergallery_image_halign.' '.$headergallery_image_valign.' '.$headergallery_image_repeat; ?>;
}
<?php } else { ?>
#wrapper.gallery .header-wrap-img {
 background:none;
}	
<?php }?>

/** / Page Structure **/


/** Menu Navigation **/
#nv-tabs a {color:#<?php echo $menu_link; ?>;}
#nv-tabs a:hover {color:#<?php echo $menu_linkhover; ?>;}

#nv-tabs ul ul {
 background:#<?php echo $menu_back; ?>;
 border:1px solid #<?php echo $menu_border; ?>;
}

#nv-tabs ul li.current_page_item, #nv-tabs ul li:hover {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/gradient-f-light.png) repeat-x top;}
#nv-tabs ul li ul li  {background:none;}
#nv-tabs ul li a:hover, #nv-tabs ul li.current_page_item ul li a:hover, #footer a:hover, #nv-tabs ul li ul li.current_page_item a {	color:#<?php echo $menu_linkhover; ?>;}
#nv-tabs ul li.current_page_item ul li a {color:<?php echo $menu_link; ?>;}
#nv-tabs li.menubreak,#nv-tabs li.menubreak:hover {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/break-c-alpha.png) left center repeat-y;}
#nv-tabs .menudesc {color:#<?php echo $menu_text; ?>;}
/** / Menu Navigation **/

/** Footer **/
#footer a {color:#<?php echo $footer_link; ?>;}
#footer a:hover {color:#<?php echo $footer_linkhover; ?>;}
#footer {color:#<?php echo $footer_text; ?>;}

#footer-wrap {
 background: #<?php echo $primary_color_footer; ?>;
<?php if($secondary_color_footer) { ?>
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color_footer; ?>, endColorstr=#<?php echo $secondary_color_footer; ?>);
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $primary_color_footer; ?>, endColorstr=#<?php echo $secondary_color_footer; ?>)";
 background: -o-linear-gradient(top,#<?php echo $primary_color_footer; ?>, #<?php echo $secondary_color_footer; ?>);
 background: -moz-linear-gradient(100% 100% 90deg, #<?php echo $secondary_color_footer; ?>,#<?php echo $primary_color_footer; ?>);
 background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(#<?php echo $primary_color_footer; ?>), to(#<?php echo $secondary_color_footer; ?>));
 *background: transparent;
 zoom:1;
<?php } ?>;
}

<?php if($footer_image) { ?>
#footer-wrap-inner {
	background:url(<?php echo $footer_image; ?>) <?php echo $footer_image_halign.' '.$footer_image_valign.' '.$footer_image_repeat; ?>;
}
<?php } else { ?>
#footer-wrap-inner {
	background:none;
}	
<?php }?>


#footer pre,#footer input[type=text],#footer input[type=password],#footer input[type=file],#footer textarea {
	background:#<?php echo $footer_form_back; ?> url(images/shadow-h.png) top repeat-x;
	border: 1px solid;
	color:#<?php echo $footer_text; ?>;
	border-color:#<?php echo $footer_form_btl; ?> #<?php echo $footer_form_bbr; ?> #<?php echo $footer_form_bbr; ?> #<?php echo $footer_form_btl; ?>;
}

#footer .widgetlinks, #footer .menu, #footer  .widget ul {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/break-a-alpha.png) bottom left repeat-x;}
#footer .widgetlinks li, #footer .menu li, #footer .widget li{background:url(<?php bloginfo('template_url') ?>/stylesheets/images/break-a-alpha.png) top left repeat-x;}
#footer .widgetlinks li a, #footer .menu li a, #footer .widget li a {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/li-arrow-white.png) center left no-repeat;}
#footer .hozbreak {	background:url(<?php bloginfo('template_url') ?>/stylesheets/images/break-a-alpha.png) center repeat-x;}
#footer #wp-calendar, #footer #wp-calendar tfoot a { color:#555; }
#footer #wp-calendar caption { color:#fff; }
#footer .blockquote_line, #footer .blockquote_quotes, #footer blockquote {color:#fff;}
#footer .blockquote_quotes .quote.left {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/quote-open-dark.png) no-repeat top left;}
#footer .blockquote_quotes .quote.right {background:url(<?php bloginfo('template_url') ?>/stylesheets/images/quote-close-dark.png) no-repeat bottom right;}
/** / Footer **/
</style>

<?php } 

// BUDDYPRESS 

if(DYN_INSKIN!="one" && $DYN_inskin!="one") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/dark-content.css" type="text/css" media="screen" />
<?php } elseif($DYN_inskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/dark-content.css" type="text/css" media="screen" />
<?php }

//**  IE / Opera Only Functions 
$a_browser_data = browser_detection('full');
if ( $a_browser_data[0] == 'ie' || $a_browser_data[0] == 'op') { 
if($a_browser_data[0] == 'op' && $a_browser_data[1]<"9.8" || $a_browser_data[0] == 'ie' && $a_browser_data[1]<"9" )   { // Opera 10.5 introduced CSS3
?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only.css" type="text/css" media="screen" />
<?php if(DYN_INSKIN!="one" && $DYN_inskin!="one") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only-dark.css" type="text/css" media="screen" />
<?php } elseif($DYN_inskin=="two") { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheets/opera-ie-only-dark.css" type="text/css" media="screen" />
<?php } ?>
<?php } ?>
<?php } ?>


<!--[if IE 6]>
<style type="text/css" media="screen">
  @import "<?php bloginfo('template_url'); ?>/stylesheets/ie6.css";
</style>
<![endif]-->

<!--[if IE 7]>
<style type="text/css" media="screen">
  @import "<?php bloginfo('template_url'); ?>/stylesheets/ie7.css";
</style>
<![endif]-->

<!--[if IE]> <style> .clearfix {display: inline-block;} /* Hides from IE-mac \*/ * html .clearfix {height: 1%;} .clearfix {display: block;} /* End hide from IE-mac */ </style> <![endif]-->

<?php if(get_option("cufon_font")) { // If a user defined font exists use it. ?> 
<script type="text/javascript" src="<?php echo get_option("cufon_font"); ?>"></script>
<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
<?php } else { ?> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Lucida_Sans_Unicode_400.font.js" defer></script>
<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
<?php } ?>


<!--[if lte IE 8]>
<style type="text/css">
.content-wrapper,.styledbox.general,.columns.border,.gallery-wrap,div#object-nav.item-list-tabs,div#message {
    behavior: url(<?php bloginfo('template_directory'); ?>/js/PIE.htc);
}
</style>
<![endif]-->

<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { $i_device=true; } // detect iPhone / iPad ?>

</head>
<body  <?php body_class('inskin-'.$DYN_inskin); ?>>
<?php require CWZ_FILES ."/inc/cufon-replace.php"; // Cufon Font Replacement Script ?>

<?php if(class_exists('WPSC_Query')) { ?>

<script type='text/javascript'>
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>

jQuery(document).ready(function() {
	
jQuery(".product_form").live('submit' , function() { 
			if(jQuery(this).parents('form:first').find('select.wpsc_select_variation[value=0]:first').length)
				return false;
    		var cartCount = jQuery('.shop-cart .shop-cart-itemnum').text();
    		var cartInt = parseInt(cartCount);
    		var quantity = parseInt(jQuery('.cartcount').val());
    		if (quantity > 1)
    			cartInt += quantity;
    		else
    			cartInt++;
 			jQuery('.shop-cart .shop-cart-itemnum').text(cartInt);
    	});
    	jQuery('a.emptycart').click(function(){
    		jQuery('.shop-cart .shop-cart-itemnum').text("0");
    	});

	jQuery('.shop-cart').hover(function(e) {
			jQuery(this).find('.shop-cart-contents').hoverFlow(e.type, { height: "show" }, 150, "easeInOutCubic");
			}, function(e) {
			jQuery(this).find('.shop-cart-contents').hoverFlow(e.type, { height: "hide" }, 250, "easeInBack");
	});
	
	
	jQuery('.wpcart_gallery a').each(function() {
	jQuery('.wpcart_gallery a.thickbox').unbind('click');	
	jQuery(this).removeClass('thickbox').addClass('galleryimg');
	var rel = jQuery(this).attr("rel");
	jQuery(this).attr('rel', 'prettyPhoto['+rel+']');
	jQuery(this).attr('title', rel);
	jQuery(this).removeAttr('rev');
	
	});

});	
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>

<?php } ?>

<div><a id="top"></a></div>

<?php if(get_option('droppanel')!="none") { // Check if drop panel is enabled ?>
<!-- Drop Panel -->
<div id="toppanel">

<?php if(get_option('droppanel')!="disable") { // Check if drop panel is enabled ?>

	<div id="panel" style="<?php if(isset($_POST['TopFirstsubmitted']) || isset($_POST['TopSecondsubmitted']) || isset($_POST['TopThirdsubmitted']) || isset($_POST['TopFourthsubmitted'])) { ?>display:block;<?php if(isset($hasError) || isset($captchaError)) { ?>min-height:300px <?php } ?> <?php } ?>">
		<div class="content clearfix">
				
				<?php if(get_option('ftdrpwidget_enable')=="enable") { // Check to see if Droppanel / Footer widgets are enabled ?>

				<?php
				$get_droppanel_num 	=	(get_option('droppanel_columns_num')!="") 	? get_option('droppanel_columns_num') 	: '4'; // If not set, default to 4 columns
				
				$i=1;
				while($i<=$get_droppanel_num)
				{ ?>
				
				<div class="panel-wrap panel-columns-<?php echo $get_droppanel_num; ?> <?php if($i == $get_droppanel_num) { echo "last"; } ?>">
					<ul>
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Drop Panel Column '.$i)) : endif; ?>
					</ul>
				</div>
				
				<?php $i++;	} ?>

				<?php } else { ?>
        
				<div class="panel-wrap">
					<?php
				
                    $thiscol="TopFirst";
					
						if(get_option($thiscol.'select')==$thiscol."-1" || get_option($thiscol.'select')=="") {  // ********* Default Option ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?php	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>

				</div><!-- / panel-wrap -->
				<div class="panel-wrap">
					<?php
								
                    $thiscol="TopSecond";
                    			
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?php	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
				</div><!-- / panel-wrap -->
				<div class="panel-wrap">
					<?php
			
                    $thiscol="TopThird";
                    				
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?php	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?php	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5" || get_option($thiscol.'select')=="") {  // ********* Default Option ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
				</div><!-- / panel-wrap -->
				<div class="panel-wrap last">
					<?php
				
                    $thiscol="TopFourth";
                  					
						if(get_option($thiscol.'select')==$thiscol."-1") { ?>
							<?php custom_html(get_option($thiscol.'htmltitle'),do_shortcode(get_option($thiscol.'content'))); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-2") { ?>
							<?	contact_form($thiscol.'',get_option($thiscol.'contacttitle'),get_option($thiscol.'contactdesc'),get_option($thiscol.'contactemail'),get_option($thiscol.'contactmsg'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-3") { ?>
							<?	pages_list(get_option($thiscol.'pagestitle'),get_option($thiscol.'pagesexc')); ?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-4") { ?>
							<?php	recent_posts(get_option($thiscol.'recenttitle'),get_option($thiscol.'recentcat'),get_option($thiscol.'recentnum'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-5") { ?>
							<?	categories(get_option($thiscol.'cattitle'),get_option($thiscol.'cat'));	?>
						<?php } elseif(get_option($thiscol.'select')==$thiscol."-6") { ?>
							<?	meta_information(get_option($thiscol.'metatitle'),get_option($thiscol.'meta1'),get_option($thiscol.'meta2'),get_option($thiscol.'meta3'),get_option($thiscol.'meta4'),get_option($thiscol.'meta5')); ?>	
						<?php } ?>
						
				</div><!-- / panel-wrap -->
				<?php } ?>
		</div><!-- / content -->
	</div> <!-- / panel -->

<?php } ?>
    
    <div class="tab-wrap">
	<!-- The tab on top -->
	<div class="tab">
		<ul class="panelswitch">
			<li class="left"> </li>
			<!-- Login / Register -->
			<li id="toggle" class="<?php if(get_option('droppanel')!="disable") { ?>droppanel<?php } if( class_exists('Woocommerce') ) { ?> wcom<?php } ?>">
				<div class="search-wrap">
					<form method="get" id="panelsearchform" action="<?php bloginfo('url'); ?>">
						<fieldset>
                        <input type="text" value="<?php _e('Search', 'DynamiX' ); ?>" name="s" id="drops" onFocus="if(this.value == '<?php _e('Search', 'DynamiX' ); ?>') {this.value = '';}" onBlur="if (this.value == '') {this.value = '<?php _e('Search', 'DynamiX' ); ?>';}" />
						<input type="submit" id="panelsearchsubmit" value="&nbsp;" />
        				</fieldset>
                    </form>
				</div><!-- search-wrap end -->
                <?php if(get_option('droppanel')!="disable") { ?>
                <div class="trigger">
					<?php if(isset($_POST['TopFirstsubmitted']) || isset($_POST['TopSecondsubmitted']) || isset($_POST['TopThirdsubmitted']) || isset($_POST['TopFourthsubmitted'])) { ?> 
                    <a id="open" style="display: none;" class="toggle open" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="open panel" /></a>
                    <a id="close" class="toggle close" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="close panel" /></a>
                    <?php } else { ?>
                    <a id="open" class="toggle open" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="open panel" /></a>
                    <a id="close" style="display: none;" class="toggle close" href="#"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="15" height="10" alt="close panel" /></a>
                    <?php } ?>
                </div><!-- /trigger -->
                <?php } ?>
                <?php 

				if( class_exists('Woocommerce') ) {
							
					global $woocommerce; // WooCommerce ?>
                    <div class="shop-cart">
						<span class="shop-cart-items">
							<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'NorthVantage'); ?>">
                                <span class="shop-cart-itemnum">
                                <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> -
                                </span>
                                <?php echo $woocommerce->cart->get_cart_total(); ?>
 							</a>
						</span>
						<span class="shop-cart-icon">
							<a target="_parent" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"></a>
						</span>
					</div>
                 <?php }				


				if ( function_exists('wpsc_cart_item_count') ) { ?>
                <div class="shop-cart">
					<span class="shop-cart-items"><a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>"><span class="shop-cart-itemnum"><?php echo wpsc_cart_item_count(); ?></span> <?php _e( 'items', 'dynamix' ); ?></a> 
                    </span>
                    <span class="shop-cart-icon">
                    	<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/blank.gif" width="29" height="22" alt="shopping cart" /></a>
					</span>
                    <div class="shopping-cart-wrapper widget_wp_shopping_cart shop-cart-contents">
    					<?php include( wpsc_get_template_file_path( 'wpsc-cart_widget.php' ) ); ?>
                    </div>
                </div>
                <?php } ?>                
			</li> <!-- / toggle -->
			<li class="right"> </li>
		</ul>
	</div> <!-- / top -->
    </div> <!-- / tab-wrap -->
</div> <!--/toppanel -->
<?php } ?>
<div id="wrapper" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="gallery3d" && is_page() || $show_slider=="galleryaccordion" && is_page()) { ?>gallery <?php } ?>">
	<div id="page" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="gallery3d" && is_page() || $show_slider=="galleryaccordion" && is_page()) { ?>gallery <?php } else { ?>pages <?php } ?>">
    	<div class="header-wrap"></div>
        <div class="header-wrap-img"></div>
		<div id="header" class="<?php if($show_slider=="stageslider" && is_page() || $show_slider=="galleryaccordion" && is_page() || $show_slider=="gallery3d" && $i_device==true) { ?>gallery <?php } elseif($show_slider=="gallery3d" && is_page() && $i_device!=true) {?>gallery3d <?php } else { ?>pages <?php } ?>">
        	<?php if(get_option('header_html')) { echo do_shortcode(get_option('header_html')); } ?>
			<div id="header-logo">
				<div id="logo">
<?php if(get_option("branding_url")) { // Is Branding Image Set ?>
					<a href="<?php echo get_option('home'); ?>/"><img src="<?php echo get_option("branding_url"); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
					<div class="description"><h2><?php bloginfo('description'); ?></h2></div>
						<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<?php } ?>
				</div>
				<div class="clear"></div>
			</div><!-- /header-logo -->
              
			<div id="nv-tabs">
				<?php if(get_option('wpcustomm_enable')=="enable") { // WP3.0 Custom Menu Support
                
                $walker = new dyn_walker;
				
                wp_nav_menu(array('echo' => true,'container' => 'ul','menu_id' => 'dyndropmenu','theme_location' => 'mainnav','walker' => $walker	));
				?>
                <?php } else { ?>
                
				<ul id="dropmenu">
                <?php echo DYN_menupages(); ?>
					<li class="menubreak"></li>
				<?php if(get_option('droppanel')!="disable") { ?>
                <?php if(get_option('droptriggername')) { ?>
					<li class="page_item"><a href="#" class="droppaneltrigger" title="<?php echo get_option('droptriggername'); ?>"><?php echo get_option('droptriggername'); ?></a><span class="menudesc"><?php echo get_option('droptriggerdesc'); ?></span></li><li class="menubreak"></li>
                <?php } ?>
                <?php } ?>
				</ul>
				<?php } ?>
			</div><!-- /tabs -->
		</div><!-- /header -->

<?php



/***************************************************************/
/*	Stage Gallery        									   */
/***************************************************************/

if(is_page()) { 
	if($DYN_show_slider=="stageslider") {
	
		require CWZ_FILES ."/inc/gallery-stage.php"; // Group Slider Gallery
	
	}
}
/***************************************************************/
/*	Stage Gallery *END*   									   */
/***************************************************************/

/***************************************************************/
/*	Piecemaker Gallery 		   								   */
/***************************************************************/

if($i_device && $DYN_show_slider=="gallery3d") { // if iPad or iPhone
	if(is_page()) { 
		require CWZ_FILES ."/inc/gallery-stage.php"; // Group Slider Gallery
	}

} else {

	if(is_page()) { 
	
		if($DYN_show_slider=="gallery3d") { ?>
			<?php require CWZ_FILES .'/inc/gallery-piecemaker.php'; //
		}
	}

}

/***************************************************************/
/*	Piecemaker Gallery *END*   								   */
/***************************************************************/

/***************************************************************/
/*	Accordion Gallery 		   								   */
/***************************************************************/

if(is_page()) { 
	if($DYN_show_slider=="galleryaccordion") { ?>
		<?php require CWZ_FILES .'/inc/gallery-accordion.php';
	}
}

/***************************************************************/
/*	Accordion Gallery *END*   								   */
/***************************************************************/


/***************************************************************/
/*	Breadcrumbs			  									   */
/***************************************************************/

if(is_archive()) {
		if(get_option("archbreadcrumb")=="disable") {
		$DYN_hidebreadcrumbs="yes";
	}	else {
		$DYN_hidebreadcrumbs="";
	}
}

if (class_exists( 'BP_Core_User' ) ) {
if(!bp_is_blog_page()) {
	$DYN_hidebreadcrumbs="yes";
}
}

if(!$DYN_hidebreadcrumbs) {
?>

<div id="sub-header">
	<div id="sub-tabs">
<?php
if(class_exists('bbPress') && is_bbpress()) {
	bbp_breadcrumb();?> 
<?php } else { ?>
		<ul>
<?php if (function_exists('DYN_breadcrumbs')) DYN_breadcrumbs(); ?>
        	<?php if(function_exists('wpsc_has_breadcrumbs')) 
			if(wpsc_has_breadcrumbs()) { ?>
					<div class='breadcrumb'>
						<li class="home"><a href='<?php echo get_option('product_list_url'); ?>'><?php echo get_option('blogname'); ?></a></li>
						<?php while (wpsc_have_breadcrumbs()) : wpsc_the_breadcrumb(); ?>
							<?php if(wpsc_breadcrumb_url()) :?> 	   
								<li><a href='<?php echo wpsc_breadcrumb_url(); ?>'><?php echo wpsc_breadcrumb_name(); ?></a></li>
							<?php else: ?> 
								<li><?php echo wpsc_breadcrumb_name(); ?></li>
							<?php endif; ?> 
						<?php endwhile; ?>
                        <?php if ($wp_query->is_single === true && get_post_type() == 'wpsc-product') : ?>
                        		<li class="current_page_item"><?php echo wpsc_the_product_title(); ?></li>
                        <?php endif; ?>
					</div>
				<?php } ?>
		</ul>
<?php } ?>
	</div>
</div> 

<?php

}

/***************************************************************/
/*	Breadcrumbs *END*	  									   */
/***************************************************************/
?>

<div class="clear"></div>
	<div class="inner-page <?php if($DYN_show_slider=='stageslider' || $DYN_show_slider=='gallery3d') { ?>gallery<?php } ?>"><!-- inner page -->
<?php

/***************************************************************/
/*	Grid Gallery										   	   */
/***************************************************************/
	
if(is_page()) { 
if($DYN_show_slider=="gridgallery" && $DYN_groupsliderpos!="below") { ?>

<div class="gallerywrap grid-gallery top">

	<?php require CWZ_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery ?>

</div>
<?php } 
}

/***************************************************************/
/*	Grid Gallery *END*										   */
/***************************************************************/




/***************************************************************/
/*	Group Slider Gallery									   */
/***************************************************************/

if(is_page()) { 
if($DYN_show_slider=="groupslider" && $DYN_groupsliderpos!="below") { ?>

<div class="gallery-slider top">

	<?php require CWZ_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery ?>

</div>

<?php }
}

/***************************************************************/
/*	Group Slider Gallery *END*   							   */
/***************************************************************/


/***************************************************************/
/*	Call Twitter         									   */
/***************************************************************/

if($DYN_twitter=="pagetop") { ?>

<div class="twitter-wrap top">

	<?php require CWZ_FILES .'/inc/twitter.php'; // Call Twitter Template ?>

</div>

<?php }

/***************************************************************/
/*	Call Twitter *END*    									   */
/***************************************************************/

?>

<?php if($DYN_hidecontent!="yes") { ?>
<?php 
if(is_archive()) {
		if(get_option("archcontentborder")=="disable") {
		$DYN_contentborder="yes";
	} else {
		$DYN_contentborder="no";
	}
} 

if (class_exists( 'BP_Core_User' )) {
if(!bp_is_blog_page()) {
	if(get_option("buddycontentborder")=="disable" || $DYN_contentborder=='yes') {
		$DYN_contentborder="yes";
	} else {
		$DYN_contentborder="no";
	}
}
}

if(class_exists('bbPress')) {
	if(get_post_type() == 'forum' OR get_post_type() == 'topic' OR get_post_type() == 'reply') {
		if(get_option("buddycontentborder")=="disable" || $DYN_contentborder=='yes') {
			$DYN_contentborder="yes";
		} else {
			$DYN_contentborder="no";
		}
	}
}

global $wp_query;

if ($wp_query->is_single === true && get_post_type() == 'wpsc-product') { // Check is single product page
	if(get_option("archcontentborder")=="disable" || $DYN_contentborder=='yes') {
		$DYN_contentborder="yes";
	} else {
		$DYN_contentborder="no";
	}	
}

?>
<div <?php if($DYN_contentborder!="yes") { ?>class="content-wrapper"<?php } ?>>
	<div class="content-wrapper-inner">
    
<?php } ?>
