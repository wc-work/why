<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function post_remove ()      //creating functions post_remove for removing menu item
{ 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Custom Nav Logo
function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Register Custom Navigation Walker
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        
        wp_register_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '4.1.3'); // Bootstrap 4
        wp_enqueue_script('bootstrapjs'); // Enqueue it!

        wp_register_script('modal', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js', array(), null, true ); // Bootstrap Modal
        wp_enqueue_script( 'modal'); // Enqueue it!

      	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array('jquery'), '', true); // Jquery
        wp_enqueue_script('jquery'); // Enqueue it! 

        wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), '', true); // Popper.js
        wp_enqueue_script('popper'); // Enqueue it!
        
        wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('scripts'); // Enqueue it!
    }
}

function my_custom_mime_types( $mimes ) {
 
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['mp4'] = 'video/mp4';
    $mimes['doc'] = 'application/msword';
    $mimes['docx'] = 'application/msword';
     
    // Optional. Remove a mime type.
    unset( $mimes['exe'] );
     
    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

/*------------------------------------*\
	     Custom Accordion Menu
\*------------------------------------*/

class CSS_Menu_Maker_Walker extends Walker {

    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul>\n";
    }
  
    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n";
    }
  
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
      global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
      $class_names = $value = '';        
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
  
      /* Add active class */
      if(in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
        unset($classes['current-menu-item']);
      }
  
      /* Check for children */
      $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
      if (!empty($children)) {
        $classes[] = 'has-sub';
      }
  
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
  
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
  
      $output .= $indent . '<li' . $id . $value . $class_names .'>';
  
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
  
      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'><span>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</span></a>';
      $item_output .= $args->after;
  
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "</li>\n";
    }
  }
  
  /* ACF Options Page */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}

// ============ Remove All Comments ============= //
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        remove_action('admin_bar_menu', 'wp_admin_bar_logbook_menu');

    }
});

// Load HTML5 Blank conditional scripts
// function html5blank_conditional_scripts()
// {
//     if (is_page('pagenamehere')) {
//         wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
//         wp_enqueue_script('scriptname'); // Enqueue it!
//     }
// }

// Load HTML5 Blank styles
function html5blank_styles()
{
    // wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    // wp_enqueue_style('normalize'); // Enqueue it!
    wp_enqueue_style( 'bootstrap_css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('style'); // Enqueue it!
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css'); 
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Register HTML5 Blank Navigation
function register_navwalker_menu()
{
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'THEMENAME' ),
    ) );
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Remove form label on re-captcha to remove ada compliance error
add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );
function my_custom_script_load(){
    wp_enqueue_script('my-custom-script',get_stylesheet_directory_uri().'/js/custom-scripts.js',array('jquery'),false,true);
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

/*------------------------------------*\
	     Login Custom Styles
\*------------------------------------*/

add_filter( 'login_headerurl', 'namespace_login_headerurl' );
/**
 * Replaces the login header logo URL
 *
 * @param $url
 */
function namespace_login_headerurl( $url ) {
    $url = home_url( '/' );
    return $url;
}

add_filter( 'login_headertext', 'namespace_login_headertext' );
/**
 * Replaces the login header logo title
 *
 * @param $title
 */
function namespace_login_headertext( $title ) {
    $title = get_bloginfo( 'name' );
    return $title;
}

/**
 * Replaces the login header logo
 */
function namespace_login_style() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_url') . '/login/custom-login-style.scss"/>';
}


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

function event_custom_post_type() {
    register_taxonomy_for_object_type('category', 'events'); // Register Taxonomies for Category
    register_post_type('events', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Events', 'events'), // Rename these to suit
            'singular_name' => __('Event', 'events'),
            'add_new' => __('Add Event', 'events'),
            'add_new_item' => __('Add New Event', 'events'),
            'edit_item' => __('Edit Event', 'events'),
            'new_item' => __('New Event', 'events'),
            'all_items'=> __('All Events', 'events'),
            'view' => __('New Item', 'events'),
            'view_item' => __('View Item', 'events'),
            'search_items' => __('Search Events', 'events'),
            'not_found' => __('No items found', 'events'),
            'not_found_in_trash' => __('No items found in trash', 'events')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'rewrite' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array(
            'title',
            'editor',
            'revisions',
            'custom-fields',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ), // Add Category and Post Tags support
        'menu_position' => 5
    ));
}



/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
// add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'register_navwalker_menu'); // Add Navwalker for Bootstrap Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action( 'login_head', 'namespace_login_style' ); // Adds customization for login screen
add_action('init', 'event_custom_post_type'); // Adds event custom post type to wp-admin

// Remove Actions
// remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
// remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
// remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
// remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
// remove_action('wp_head', 'index_rel_link'); // Index link
// remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
// remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
// remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
// add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
// add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
// add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
// add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
// add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// // add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// // add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// // add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
// add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
// add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
// add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
// add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
// add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
// add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
// add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
// remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
// add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
// add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5()
// {
//     register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'html5-blank');
//     register_post_type('html5-blank', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//             'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//             'add_new' => __('Add New', 'html5blank'),
//             'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//             'edit' => __('Edit', 'html5blank'),
//             'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//             'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//             'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//             'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//             'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

// /*------------------------------------*\
// 	ShortCode Functions
// \*------------------------------------*/

// // Shortcode Demo with Nested Capability
// function html5_shortcode_demo($atts, $content = null)
// {
//     return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
// }

// // Shortcode Demo with simple <h2> tag
// function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// {
//     return '<h2>' . $content . '</h2>';
// }

?>
