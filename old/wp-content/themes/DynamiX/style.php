<?php 


if ($_SESSION['DYN_inskin']) {
  $inskin = $_SESSION['DYN_inskin'];
} else {
  $inskin = '';
}

if ($_SESSION['DYN_outskin']) {
  $outskin = $_SESSION['DYN_outskin'];
} else {
  $outskin = '';
}


if($inskin=="two") {
	$defaultcolor_one="#ccc";
	$defaultcolor_two="#ddd";
} else {
	$defaultcolor_one="#5f5f5f";
	$defaultcolor_two="#999";
}

if(LINKCOLOR) {
	$linkcol = LINKCOLOR;
} else {
	if($outskin=="two") {
		$linkcol="2e52de";
	} elseif($outskin=="four") {
		$linkcol="008ec9";
	} elseif($outskin=="five") {
		$linkcol="13d700";		
	} elseif($outskin=="six") {
		$linkcol="ffa400";		
	} elseif($outskin=="seven") {
		$linkcol="ffb400";		
	} elseif($outskin=="eight") {
		$linkcol="f80016";		
	} elseif($outskin=="nine") {
		$linkcol="ff00cc";		
	} elseif($outskin=="twelve") {
		$linkcol="000";		
	} elseif($outskin=="sixteen") {
		$linkcol="34505c";		
	} elseif($outskin=="seventeen") {
		$linkcol="195f25";		
	} elseif($outskin=="eighteen") {
		$linkcol="990063";		
	} elseif($outskin=="nineteen") {
		$linkcol="bc0000";		
	} elseif($outskin=="twenty") {
		$linkcol="4e342a";		
	} else {
		$linkcol="1594d9";
	}
}

if(LINKHOVER) {
	$linkhov = LINKHOVER;
} else {
	if($outskin=="two") {
		$linkhov="7690e3";
	} elseif($outskin=="four") {
		$linkhov="00c0ff";
	} elseif($outskin=="five") {
		$linkhov="15ef00";		
	} elseif($outskin=="six") {
		$linkhov="ffd200";		
	} elseif($outskin=="seven") {
		$linkhov="ffe400";		
	} elseif($outskin=="eight") {
		$linkhov="ff4051";		
	} elseif($outskin=="nine") {
		$linkhov="fd4fff";		
	} elseif($outskin=="twelve") {
		$linkhov="d20000";		
	} elseif($outskin=="sixteen") {
		$linkhov="466f80";		
	} elseif($outskin=="seventeen") {
		$linkhov="458952";		
	} elseif($outskin=="eighteen") {
		$linkhov="c4007e";		
	} elseif($outskin=="nineteen") {
		$linkhov="d80000";		
	} elseif($outskin=="twenty") {
		$linkhov="794f40";		
	} else {
		$linkhov="3bb8ff";
	}
}

if(SIDECOLOR) {
  $sidecol = SIDECOLOR;
} else {
  $sidecol = '';
}

if(SIDEHOVER) {
  $sidehov = SIDEHOVER;
} else {
  $sidehov = '';
}


if(TEXTCOLOR) {
  $textcol = TEXTCOLOR;
} else {
  $textcol = '';
}
?>

#toppanel, #toppanel a,.lowerfooter, .tweets h3 a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {<?php if($textcol) { ?>color: #<?php echo $textcol; ?>;<?php } else { ?>color:<?php echo $defaultcolor_one; ?>;<?php } ?>}	
.sidebar-content li a, #footer a, #panel a  {<?php if($sidecol) { ?>color: #<?php echo $sidecol; ?>;<?php } else { ?>color: <?php echo $defaultcolor_one; ?>;<?php } ?>}
.sidebar-content li a:hover, #toppanel a:hover{<?php if($sidehov) { ?>color: #<?php echo $sidehov ?>;<?php } else { ?>color: <?php echo $defaultcolor_two; ?>;<?php } ?>}

a, div.item-list-tabs#subnav a.show-hide-new, div.item-list-tabs#subnav a.new-reply-link {
	color: #<?php echo $linkcol; ?>;
  	text-decoration: none;
	outline: none; /* firefox fix  */
}

a:hover,#sub-tabs ul li.current_page_item,div.item-list-tabs#subnav a.show-hide-new:hover,div.item-list-tabs#subnav a.new-reply-link:hover, span.bbp-breadcrumb-current {color: #<?php echo $linkhov ?>;}

#sub-tabs ul li a {	color:#b4b4b4;}
acronym, abbr {	border-bottom: 1px dashed #<?php echo $linkcol; ?>;}


<?php if($inskin =="two") { ?>
.slidernav-left a {	background:#<?php echo $linkcol; ?> url(<?php bloginfo('template_url'); ?>/stylesheets/images/gallery-nav-dark.png) top left no-repeat;}
.slidernav-right a { background:#<?php echo $linkcol; ?> url(<?php bloginfo('template_url'); ?>/stylesheets/images/gallery-nav-dark.png) top right no-repeat;}
.slidernav-left a:hover {background:#<?php echo $linkhov; ?> url(<?php bloginfo('template_url'); ?>/stylesheets/images/gallery-nav-dark.png) top left no-repeat;}
.slidernav-right a:hover {background:#<?php echo $linkhov; ?> url(<?php bloginfo('template_url'); ?>/stylesheets/images/gallery-nav-dark.png) top right no-repeat;}
<?php } else { ?>
.slidernav-left a {background:#<?php echo $linkcol; ?> url(<?php bloginfo('template_url'); ?>/images/gallery-nav.png) top left no-repeat;}
.slidernav-right a {background:#<?php echo $linkcol; ?> url(<?php bloginfo('template_url'); ?>/images/gallery-nav.png) top right no-repeat;}
.slidernav-left a:hover {background:#<?php echo $linkhov; ?> url(<?php bloginfo('template_url'); ?>/images/gallery-nav.png) top left no-repeat;}
.slidernav-right a:hover {background:#<?php echo $linkhov; ?> url(<?php bloginfo('template_url'); ?>/images/gallery-nav.png) top right no-repeat;}
<?php } ?>


#content ul li.socialinit, #content ul li.socialhide:hover, #content .socialicons ul li, #content .postmetadata .comments.yes, .twitterfollow a, #wp-calendar td a,.tab a.open,.tab a.close,#content .textresize ul li,ul.paging li.pagebutton,.accordion .ui-icon,.revealbox .ui-icon, .stage-control #stage-prev,.stage-control #stage-next,.stage-control #stage-pause,.stage-control #stage-resume, .stage-control .poststage-prev,.stage-control .poststage-next,.stage-control .poststage-pause,.stage-control .poststage-resume,span.highlight.one {
 background-color:#<?php echo $linkcol; ?>;
}

#content ul li.socialinit:hover,#content ul li.socialhide, #content .socialicons ul li:hover, #content .postmetadata .comments.yes:hover, .twitterfollow a:hover,#wp-calendar td a:hover,.tab a:hover.open,.tab a:hover.close,#content .textresize ul li:hover,ul.paging li.pagebutton.active, ul.paging a li.pagebutton, .accordion .ui-state-active .ui-icon, .stage-control #stage-prev:hover,.stage-control #stage-next:hover,.stage-control #stage-pause:hover,.stage-control #stage-resume:hover, .stage-control .poststage-prev:hover,.stage-control .poststage-next:hover,.stage-control .poststage-pause:hover,.stage-control .poststage-resume:hover {
 background-color:#<?php echo $linkhov; ?>;
}

.panelcontent h2 a, .panelcontent h2 { color:<?php if(CUFON_SECGRAD_3) { echo "#".CUFON_SECGRAD_3; } else { echo $defaultcolor_one; } ?>;}

<?php
if(get_option('header_height')) { ?>
#header { height:<?php echo get_option('header_height'); ?>px; }
<?php }

if(get_option('branding_menu')=='two') {
$tabs.='left:0;';
$header_logo.='right:0;text-align:right;';
} 

if(get_option('menu_margin')) {
$tabs.='margin-top:'.get_option('menu_margin').'px;';
} 

if(get_option('branding_margin')) {
$header_logo.='margin-top:'.get_option('branding_margin').'px;';
} 

if($tabs) { ?>
#nv-tabs {<?php echo $tabs; ?>}
<?php }

if($header_logo) { ?>
#header-logo {<?php echo $header_logo; ?>}
<?php } ?>

<?php if(get_option('branding_menu')=='two') { ?>
#header-logo .description {right:0;}
<?php } 

$skin_font		= (get_option('skin_font')			!="") ? get_option('skin_font')			: '"Lucida Grande", "Lucida Sans Unicode", Arial, Verdana, sans-serif';
$skin_font_size	= (get_option('skin_font_size')		!="") ? get_option('skin_font_size').'px'	: '0.75em';
?>

body { 
 font-family: <?php echo $skin_font; ?>;
 font-size:<?php echo $skin_font_size; ?>; 
}	


<?php if($outskin!='one' || $outskin=='') { ?>
#wrapper #nv-tabs ul li.extended-menu ul li ul li:hover {background:url(<?php bloginfo('template_url'); ?>/stylesheets/images/gradient-f-light.png) repeat-x top;}	
<?php } ?>

<?php if(get_option('custom_css'))  echo get_option('custom_css'); ?>