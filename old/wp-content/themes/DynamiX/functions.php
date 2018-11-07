<?php if (!is_admin()) if(!session_id()) session_start();
/***************************************************************/
/*	Initialise DynamiX and JQUERY Scripts					   */
/***************************************************************/

function init_dynscripts() {
    if (!is_admin()) {

		if ( function_exists('bp_is_blog_page')) {
			if (!bp_is_blog_page()) {
				wp_enqueue_script( 'bp-js', BP_PLUGIN_URL . '/bp-themes/bp-default/_inc/global.js', array( 'jquery' ) );
			}
		}

		wp_register_style('dynamix-style', get_bloginfo('stylesheet_url'),false,null);
        wp_enqueue_style('dynamix-style');
			
		wp_dequeue_style('em-ui-css'); // stop Event Manager jQuery UI CSS interfering. 
		
  		wp_enqueue_script('jquery-ui',false,null);
		wp_enqueue_script('jquery-ui-core',false,null);
      	wp_enqueue_script('jquery-ui-tabs',false,null);
		wp_enqueue_script("jquery-effects-core",false,null);
		wp_enqueue_script("jquery-ui-accordion",false,null);

		wp_deregister_script( 'dynamix' );	
	    wp_register_script( 'dynamix', get_bloginfo('template_directory').'/js/dynamix.min.js',false,null);
        wp_enqueue_script( 'dynamix' );
		
		if(get_option('jwplayer_js')) { // Check jw player javascript file is present
		
		$CWZ_jwplayer_js = get_option('jwplayer_js');
		
		wp_deregister_script( 'jw-player' );	
	    wp_register_script( 'jw-player', $CWZ_jwplayer_js );
        wp_enqueue_script( 'jw-player' );		
		}
	
    }
}    
add_action('init', 'init_dynscripts',100);

function _remove_script_version( $src ){
    $parts = explode( '?', $src );
	return $parts[0];
}
//add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
//add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/***************************************************************/
/*	Initialise DynamiX and JQUERY Scripts *END*			   */
/***************************************************************/


/***************************************************************/
/*	WOOCOMMERCE												   */
/***************************************************************/


add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
 
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
		<span class="shop-cart-itemnum">
			<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - 
		</span>
         <?php echo $woocommerce->cart->get_cart_total(); ?>
		
    </a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;

}

/***************************************************************/
/*	De-Register WPSC GoldCart 								   */
/***************************************************************/

function remove_wpsc_style() {
    global $wp_styles;
    wp_deregister_style( 'wpsc-gold-cart-grid-view' );
	wp_deregister_style( 'wpsc-gold-cart' );
}
add_action('wp_print_styles', 'remove_wpsc_style', 100);

/***************************************************************/
/*	De-Register WPSC GoldCart *END*							   */
/***************************************************************/

/***************************************************************/
/*	Define File Directories			  						   */
/***************************************************************/

define( 'CWZ_DIR', get_template_directory());
define( 'CWZ_FILES', CWZ_DIR . '/lib' );

require CWZ_FILES .'/adm/inc/note-admin.php';require CWZ_FILES .'/inc/constants.php';
require CWZ_FILES .'/inc/sub-functions.php';
require CWZ_DIR .'/custom-functions.php';

if ( is_admin() ) require_once CWZ_FILES . '/adm/index.php';

require CWZ_FILES .'/adm/inc/advanced-excerpt/advanced-excerpt.php';
require CWZ_FILES .'/adm/inc/custom-widgets.php';


/***************************************************************/
/*	Define File Directories *END*	  						   */
/***************************************************************/



/***************************************************************/
/*	Archive Excerpt					  						   */
/***************************************************************/

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . __( 'Read More', 'DynamiX' )  . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/***************************************************************/
/*	Archive Excerpt	*END*			  						   */
/***************************************************************/

/***************************************************************/
/*	Menu Pages 						  						   */
/***************************************************************/

function DYN_menupages() {

add_filter('wp_list_pages', 'DYN_page_lists');
$menupageslist = wp_list_pages('echo=0&title_li=&');

remove_filter('wp_list_pages', 'DYN_page_lists'); // Remove filter to not affect all calls to wp_list_pages
return $menupageslist;

}

/***************************************************************/
/*	Menu Pages *END*				  						   */
/***************************************************************/

/***************************************************************/
/*	Menu Descriptions				  						   */
/***************************************************************/

function DYN_page_lists($output) {	
	global $wpdb;

	$get_MenuDesc = mysql_query("SELECT p.ID, p.post_title, p.guid, p.post_parent, pm.meta_value FROM " . $wpdb->posts . " AS p LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " AS ipm WHERE meta_key = 'pgopts') AS pm ON p.ID = pm.post_id WHERE p.post_type = 'page' AND p.post_status = 'publish' ORDER BY p.menu_order ASC");
	while ($row = mysql_fetch_assoc($get_MenuDesc)) {
			extract($row);
			$post_title = wptexturize($post_title);
			$data = maybe_unserialize(get_post_meta( $ID, 'pgopts', true ));		

			$menudesc=$data["menudesc"];		
			
			if($menudesc!="") {
			$output = str_replace('>' . $post_title .'</a>' , '>' . $post_title . '</a><span class="menudesc">' . $data["menudesc"] . '</span>', $output);
			}
			
		}	

			$parts = preg_split('/(<ul|<li|<\/ul>)/',$output,null,PREG_SPLIT_DELIM_CAPTURE);
			$insert = '<li class="menubreak"></li>';
			$newmenu = '';
			$level = 0;
			foreach ($parts as $part) {
			if ('<ul' == $part) {++$level; }
			if ('</ul>' == $part) {--$level;}
			if ('<li' == $part && $level == 0) {$newmenu .= $insert;}
			if ('</ul>' == $part && $level == 1) {$newmenu .= $insert_a;}
			$newmenu .= $part;
			}
		


	return $newmenu;
}


/***************************************************************/
/*	Menu Descriptions *END*			  						   */
/***************************************************************/


/***************************************************************/
/*	Create Sidebars					  						   */
/***************************************************************/

global $wpdb,$num_sidebars;


$get_sidebar_num = get_option('sidebars_num');

if($get_sidebar_num) {
$num_sidebars=get_option('sidebars_num');  //  Sidebars number of Sidebars defined in Admin settings.
}

else {
$num_sidebars="2";
}

	$i=1;
    while($i<=$num_sidebars)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'sidebar'.$i,
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}


if(get_option('ftdrpwidget_enable')=="enable") { // Check to see if Droppanel / Footer widgets are enabled

$get_droppanel_num 	=	(get_option('droppanel_columns_num')!="") 	? get_option('droppanel_columns_num') 	: '4'; // If not set, default to 4 columns
$get_footer_num 	= 	(get_option('footer_columns_num')!="") 		? get_option('footer_columns_num') 		: '4'; // If not set, default to 4 columns
	
	$i=1;
    while($i<=$get_droppanel_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'Drop Panel Column '.$i,
				'description' => 'Widgets in this area will be shown in Drop Panel column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}

	$i=1;
    while($i<=$get_footer_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array('name'=>'Footer Column '.$i,
				'description' => 'Widgets in this area will be shown in Footer column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}	


}	


/***************************************************************/
/*	Create Sidebars	*END*			  						   */
/***************************************************************/



/***************************************************************/
/*	Browser Detection				  						   */
/***************************************************************/

require CWZ_FILES .'/inc/browser-detect.php';

/***************************************************************/
/*	Browser Detection *END*			  						   */
/***************************************************************/


/***************************************************************/
/*	Generate Custom Fields			  						   */
/***************************************************************/

require CWZ_FILES .'/adm/inc/meta-fields.php';

/***************************************************************/
/*	Generate Custom Fields	*END*	  						   */
/***************************************************************/


/***************************************************************/
/*	Short Codes						  						   */
/***************************************************************/

require CWZ_FILES .'/inc/shortcodes.php';

/***************************************************************/
/*	Short Codes	*END*				  						   */
/***************************************************************/

/***************************************************************/
/*	Breadcrumbs					  						   */
/***************************************************************/

require CWZ_FILES .'/inc/breadcrumbs.php';

/***************************************************************/
/*	Breadcrumbs	*END*				  						   */
/***************************************************************/



/***************************************************************/
/*	Pagination						  						   */
/***************************************************************/

function pagination( $query, $baseURL ) {
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="paging">';
		// Previous link?
		if ( $page > 1 ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">&laquo; previous</a></li>';
			} else {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'&amp;paged='.($page-1).'">&laquo; previous</a></li>';
			}			
			
		}
		// Loop through pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<li class="pagebutton active">'.$i.'</li>';
			} else {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton"><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
			} else {
				echo '<li class="pagebutton"><a href="'.$baseURL.'&amp;paged='.$i.'">'.$i.'</a></li>';
			}
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">next &raquo;</a></li>';
			} else {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'&amp;paged='.($page+1).'">next &raquo;</a></li>';
			}				
		}
		echo '</ul>';
	}

}




/***************************************************************/
/*	Pagination *END*				  						   */
/***************************************************************/


/***************************************************************/
/*	Add default postorder number	  						   */
/***************************************************************/

if (have_posts()) : while (have_posts()) : the_post();
    
	if(! maybe_unserialize(get_post_meta( $post->ID, 'Order', true ))) {
	update_post_meta( $post->ID, 'Order', '0' );
	}

endwhile; endif;

/***************************************************************/
/*	Add default postorder number *END* 						   */
/***************************************************************/

/***************************************************************/
/*	Post Comments					 						   */
/***************************************************************/


function dynamix_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
	<div class="commenttext">
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

		<?php comment_text() ?>
	</div>
    <div class="commentbreak">&nbsp;</div>
	<div class="clear"></div>
<div class="authorwrap clearfix">
	<ul>
        <li class="comment-author vcard">
             <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
        </li>
        <li>
        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        </li>
        <li class="comment-meta commentmetadata"><small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small></li>
        <li class="reply">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </li>
    </ul>
	</div>
	</div>
<?php
        }

/***************************************************************/
/*	Post Comments *END*				 						   */
/***************************************************************/


/***************************************************************/
/*	WP 3.0 Custom Menu Shortcode	 						   */
/***************************************************************/

// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");

/***************************************************************/
/*	WP 3.0 Custom Menu Shortcode *END* 						   */
/***************************************************************/


/***************************************************************/
/*	WP 3.0 Custom Menu for Main Navigation					   */
/***************************************************************/

add_theme_support( 'nav-menus' );
	register_nav_menus( array(
		'mainnav' => __( 'Main Navigation', 'DynamiX' ),
	) );


class dyn_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		if($depth=="0") {
		$output .= $indent . '<li class="menubreak"></li><li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		} else {
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';		
		}
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		if($item->attr_title) {
		$item_output .= '<span class="menudesc">' . $item->attr_title  . '</span>';
		}
		if($item->description && get_option('wpcustommdesc_enable')=='enable') {
		$item_output .= '<div class="menudesc">' . do_shortcode($item->description) . '</div>';
		}
		$item_output .= $args->after;
   
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );	
	}
}

/***************************************************************/
/*	WP 3.0 Custom Menu for Main Navigation	*END*			   */
/***************************************************************/

/***************************************************************/
/*	Get Image Path for Timthumb								   */
/***************************************************************/
function dyn_getimagepath($img_src) {
    global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $img_src);
		if (isset($imageParts[1])) {
			$img_src = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $img_src;
}

add_theme_support( 'post-thumbnails' ); // add wp thumbnail support

/***************************************************************/
/*	Get Image Path for Timthumb	*END*						   */
/***************************************************************/

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_options' );
add_action('admin_head', 'add_admin_theme');

function add_admin_theme() { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/adm/css/admin.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/adm/css/colorpicker.css" type="text/css" /> 
<?php }


/***************************************************************/
/*	BuddyPress	/ bbPress									   */
/***************************************************************/

add_theme_support( 'bbpress' );


function filter_bbPress_breadcrumb_separator() {
//$sep = ' » ';
$sep = is_rtl() ? __( ' &nbsp; ', 'bbpress' ) : __( ' &nbsp; ', 'bbpress' );
return $sep;
}

add_filter('bbp_breadcrumb_separator', 'filter_bbPress_breadcrumb_separator');


function bp_dtheme_enqueue_styles() {
    // Bump this when changes are made to bust cache
    $version = '20110804';
 
    // Default CSS
    wp_enqueue_style( 'bp-default-main', get_template_directory_uri() . '/stylesheets/style-buddypress.css', array(), $version );
 
    // Right to left CSS
    if ( is_rtl() )
        wp_enqueue_style( 'bp-default-main-rtl',  get_template_directory_uri() . '/_inc/css/default-rtl.css', array( 'bp-default-main' ), $version );
}


if ( function_exists('bp_is_blog_page') && !is_admin()) {
	add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles' );
}

/* Constant paths. */
/* We define MY_THEME and MY_THEME_URL here for use in and calling functions-buddypress.php */
	define( 'MY_THEME', get_stylesheet_directory() );
	define( 'MY_THEME_URL', get_stylesheet_directory_uri() );


/* Load the BuddyPress functions for the theme */
	require_once( MY_THEME . '/functions-buddypress.php' );


/***************************************************************/
/*	BuddyPress *END*										   */
/***************************************************************/

add_theme_support( 'admin-bar', array( 'callback' => 'adminbar_nv') );
function adminbar_nv(){
    echo '<style>#toppanel,#wrapper {margin-top: 30px;}</style>';
}


/***************************************************************/
/*	Gallery SlideSet Upgrade								   */
/***************************************************************/
if(get_option('slideset_data_update')!='yes' && get_option('slideset_data')!='') {
		update_option('slideset_data_update','yes');
		$get_slideset_num = maybe_unserialize(get_option('slideset_number'));
		$get_gallery_data = maybe_unserialize(get_option('slideset_data')); 
		  
		  for($i = 0; $i < $get_slideset_num; $i++) {
		  		 foreach ($get_gallery_data as $key => $value) {
    				if($key=="slideset_id".$i."_id") {
    					$options_gallery_ids .= $value.",";	
						$slide_set_id = $value;
    				}
					if ( preg_match("/slideset_id".$i."/", $key) ) {
        				$find = "/slideset_id".$i."/";
						$replace = "slideset_id"; 
         				$key = preg_replace ($find, $replace, $key); 						
						$options_gallery_slidesets[$key] = $value;					
					
					}		 
				 }
                
        			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
        			$options_gallery_slidesets="";
		  		}
				
				update_option( 'slideset_data_ids', $options_gallery_ids );
}
/***************************************************************/
/*	Gallery SlideSet Upgrade *END*							   */
/***************************************************************/

/***************************************************************/
/*	Make DynamiX available for translation					   */
/***************************************************************/

	// Load languages directory for translation
	load_theme_textdomain( 'DynamiX', CWZ_DIR . '/languages' );

	$locale = get_locale();
	$locale_file = CWZ_DIR . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

/***************************************************************/
/*	Make DynamiX available for translation	*END*			   */
/***************************************************************/
		
/***************************************************************/
/*	Fix for WP Minify and Google jQuery CDN					   */
/***************************************************************/	
function add_minify_location(){
	if (class_exists('WPMinify')) {?>

<!-- WP-Minify JS -->
<!-- WP-Minify CSS -->
<?php }
/***************************************************************/
/*	WPSC Functions											   */
/***************************************************************/

function wpsc_product_rater_nv() {
	global $wpsc_query;
	$product_id = get_the_ID();
	$output = '';
	if ( get_option( 'product_ratings' ) == 1 ) {
		$output .= "<div class='product_footer'>";

		$output .= "<div class='product_average_vote'>";
		$output .= "<strong>" . __( 'Avg. Customer Rating', 'wpsc' ) . ":</strong>";
		$output .= wpsc_product_existing_rating_nv( $product_id );
		$output .= "</div>";

		$output .= "<div class='product_user_vote'>";

		$output .= "<strong><span id='rating_" . $product_id . "_text'>" . __( 'Your Rating', 'wpsc' ) . ":</span>";
		$output .= "<span class='rating_saved' id='saved_" . $product_id . "_text'> " . __( 'Saved', 'wpsc' ) . "</span>";
		$output .= "</strong>";

		$output .= wpsc_product_new_rating( $product_id );
		$output .= "</div>";
		$output .= "</div>";
	}
	return $output;
}

function wpsc_product_existing_rating_nv( $product_id ) {
	global $wpdb;
	$get_average = $wpdb->get_results( "SELECT AVG(`rated`) AS `average`, COUNT(*) AS `count` FROM `" . WPSC_TABLE_PRODUCT_RATING . "` WHERE `productid`='" . $product_id . "'", ARRAY_A );
	$average = floor( $get_average[0]['average'] );
	$count = $get_average[0]['count'];
	$output  = "  <span class='votetext'>";
	for ( $l = 1; $l <= $average; ++$l ) {
		$output .= "<img class='goldstar' src='" . get_bloginfo('template_directory') . "/images/gold-star.png' alt='$l' title='$l' />";
	}
	$remainder = 5 - $average;
	for ( $l = 1; $l <= $remainder; ++$l ) {
		$output .= "<img class='goldstar' src='" . get_bloginfo('template_directory') . "/images/grey-star.png' alt='$l' title='$l' />";
	}

	$output .= "</span> \r\n";
	return $output;
}

/***************************************************************/
/*	WPSC Functions *END*									   */
/***************************************************************/
}
add_action('wp_head','add_minify_location',99);
/***************************************************************/
/*	Fix for WP Minify and Google jQuery CDN *END*			   */
/***************************************************************/	

/*
 * headJS_loader is the class that handles ALL of the plugin functionality.
 * It helps us avoid name collisions
 * http://codex.wordpress.org/Writing_a_Plugin#Avoiding_Function_Name_Collisions
 * @package headJS_loader
 */
 
if(get_option('priority_loading')=='enable') {

if (!class_exists('headJS_loader')) {

class headJS_loader {

	/**
	 * Initializes the plugin and sets up all actions and hooks necessary.
	 */
	function headJS_loader() {
	
		/* No need to run on admin / rss / xmlrpc */
		if (!is_admin() && !is_feed() && !defined('XMLRPC_REQUEST')) {
			$this->_pluginName = 'headjs-loader';
			add_action('init', array($this, 'pre_content'), 99998);
			add_action('wp_footer', array($this, 'post_content'));
		}
		
	}
	
	/**
	 * Buffer the output so we can play with it.
	 */
	function pre_content() {
	
		ob_start(array($this, 'modify_buffer'));

		/* Variable for sanity checking */
		$this->buffer_started = true;

    }
	
	/**
	 * Modify the buffer.  Search for any js tags in it and replace them
	 * with Head JS calls.
	 *
	 * @return string buffer
	 */
	function modify_buffer($buffer) {
	
		$script_array = array();
		/* Look for any script tags in the buffer */
		preg_match_all('/<script([^>]*?)><\/script>/i', $buffer, $script_tags_match);		
		if (!empty($script_tags_match[0])) {
			foreach ($script_tags_match[0] as $script_tag) {
				if (strpos(strtolower($script_tag), 'text/javascript') !== false) {
					preg_match('/src=[\'"]([^\'"]+)/', $script_tag, $src_match);
					if ($src_match[1]) {
						/* Remove the script tags */
						$buffer = str_replace($script_tag, '', $buffer);
						/* Save the script location */
						$script_array[] = $src_match[1];
					}
				}
			}
		}
	
		/* Sort out the Head JS */
		$headJS = '<script type="text/javascript" src="' . get_bloginfo('template_url') . '/js/load.min.js"></script>';
		
		if (!empty($script_array)) {
			$script_array = array_unique($script_array);
			$i=0;
			foreach ($script_array as $script_location) {
				/* Load the scripts into a .js */
				if ($i != 0) { $js_files .= "\n    "; }
				$js_files .= '.js("' . $script_location . '")';
				$i++;
			}
			$headJS .= "\n<script>\nhead" . $js_files . ";\n</script>";
		}
		
		/* Write Head JS before the end of head */
		$buffer = str_replace('</head>', $headJS . "\n</head>", $buffer);
		
		return $buffer;
	}
	
	/**
	 * After we are done modifying the contents, flush everything out to the screen.
	 */
	function post_content() {
      // sanity checking
      if ($this->buffer_started) {
        ob_end_flush();
      }
    }
	
} // class headJS_loader
} // if !class_exists('headJS_loader')


/* 
 * Instantiate our class
 */

$headJS_loader = new headJS_loader();

}
?>