<?php
/*
 *  Author: Samuel Kobe | @samuelkobe
 *  URL: webok.ca/web-ok-starter_2022 | @web-ok-starter
 */

/*------------------------------------*\
  Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')) {

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Localisation Support
    load_theme_textdomain('web-ok-starter', get_template_directory() . '/languages');

    // Custom logo support
    // $logo_width  = 64;
    // $logo_height = 64;

    // $logo_defaults = array(
    //     'height'               => $logo_height,
    //     'width'                => $logo_width,
    //     'unlink-homepage-logo' => false,
    // );
    // add_theme_support( 'custom-logo', $logo_defaults );
}

function webokstarter_custom_class_replace( $html ) {
    $html = str_replace('custom-logo', 'flex aspect-square', $html );
    return $html;
}
add_filter('get_custom_logo', 'webokstarter_custom_class_replace', 10);

function cc_mime_types($mimes) {
 $mimes['json'] = 'application/json';
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*------------------------------------*\
  Enqueue Editor assets.
\*------------------------------------*/
/** styles for the backend editor */
function webok_enqueue_editor_assets($theme_dir) {
    wp_enqueue_script(
        'webok-editor-scripts',
        get_stylesheet_directory_uri() . '/js/scripts.js'
    );
    
    wp_enqueue_style(
        'webok-all-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        filemtime( get_template_directory() . '/style.css' )
    );

    wp_enqueue_style(
        'webok-editor-styles',
        get_stylesheet_directory_uri() . '/style-editor.css',
        array(),
        filemtime( get_template_directory() . '/style-editor.css' )
    );
}
add_action( 'enqueue_block_editor_assets', 'webok_enqueue_editor_assets' );


/*------------------------------------*\
  ACF Blocks
\*------------------------------------*/
/** Add custom blocks via ACF to theme */
function register_acf_blocks() {
  $blocks = [
    __DIR__ . '/blocks/client-media',
    __DIR__ . '/blocks/content-clusters',
    __DIR__ . '/blocks/cta',
    __DIR__ . '/blocks/flexible-content',
    __DIR__ . '/blocks/form',
    __DIR__ . '/blocks/gallery',
    __DIR__ . '/blocks/leadership',
    __DIR__ . '/blocks/pricing-set',
    __DIR__ . '/blocks/testimonials',
    __DIR__ . '/blocks/partners',
    __DIR__ . '/blocks/three-cards',
    __DIR__ . '/blocks/side-by-side',
  ];

  foreach ($blocks as $block_path) {
    register_block_type($block_path);
  }
}
add_action( 'init', 'register_acf_blocks' );

/*------------------------------------*\
  Fucntions  
\*------------------------------------*/
/* ####### Load scripts (header.php) ####### */
function header_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
      wp_register_script('webokscripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0'); // Custom scripts
      wp_enqueue_script('webokscripts'); // Enqueue
  }
}

/* ####### Load scripts (footer.php) ####### */
function footer_scripts()
{
	wp_register_script('scroll-nav', get_template_directory_uri() . '/js/scroll.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('scroll-nav'); // Enqueue

    wp_register_script('lite-yt', get_template_directory_uri() . '/js/lite-yt-embed.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('lite-yt'); // Enqueue

	wp_register_script('button-scroll-js', get_template_directory_uri() . '/js/button-scroll.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('button-scroll-js'); // Enqueue

	wp_register_script('footer-js', get_template_directory_uri() . '/js/footer.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('footer-js'); // Enqueue

	wp_register_script('faqs-js', get_template_directory_uri() . '/js/faqs.js', array(), '1.0.0'); // Custom scripts
	wp_enqueue_script('faqs-js'); // Enqueue
}

/* ####### Load styles ####### */
function styles_sheet()
{
    wp_register_style('web-ok-starter-styles', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ), 'all');
    wp_enqueue_style('web-ok-starter-styles'); // Enqueue

    wp_register_style('block-styles', get_template_directory_uri() . '/blocks/flexible-content/flexible-content.css', array(), '1.0.0', 'all');
    wp_enqueue_style('block-styles'); // Enqueue
}

/* ####### Main Navigation ####### */
function webokstarter_nav_desktop()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'desktop-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="flex flex-col md:flex-row gap-y-2 md:gap-4 lg:gap-8 antialiased font-medium md:font-normal text-xl md:text-base lg:text-lg 2xl:text-xl">%3$s</ul>', // The items_wrap lets us put Tailwind CSS classes on the desktop menu's <ul> element.
		'depth'           => 0,
		'walker'          => false
		)
	);
}

function webokstarter_nav_footer()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="footer-menu-styles">%3$s</ul>', // The items_wrap lets us put Tailwind CSS classes on the Footer menu's <ul> element.
		'depth'           => 0,
		'walker'          => false
		)
	);
}

/* ####### Register Navigation Options ####### */
function register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'desktop-menu' => __('Main Menu', 'web-ok-starter'), // Main Navigation
        'footer-menu' => __('Footer Menu', 'web-ok-starter'), // Footer Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
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

// restrict searchs to only posts
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

/**
 * Halt the main query in the case of an empty search 
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function webokstarter_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'prev_text' => __('Previous'),
        'next_text' => __('Next'),        
        'total'     => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function custom_post_excerpt( $excerpt, $length ) {
    $output = wp_trim_words( $excerpt, $length, '...'); // use the excerpt if it exists and trim it if it is too long.
    return $output;
}

function my_custom_title($title) {
  return wp_trim_words($title, 6, '...');
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function webokstarter_wp_style_remove($tag)
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
function webokstarter_wp_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

/*------------------------------------*\
	Web Ok - Navigation alterations
\*------------------------------------*/

// Remove and add custom navigation classes - Web Ok
// function add_link_atts($atts, $item) {
//   $atts['class'] = "menu-anchor"; // styles for anchors in menu.
//   $dataTitle = formatAnchor($item->title);
//   $atts['data-title'] = $dataTitle; // gives menu <a> a data attribute for the title of the page
//   return $atts;
// }

// Add custom navigation classes based on menu location - Web Ok
function add_link_atts_specific($atts, $item, $args) {
    // Check if the menu location matches the desired one
    if ($args->theme_location === 'desktop-menu') { // Replace 'desktop-menu' with your desired menu location
        $atts['class'] = "menu-anchor";
        $dataTitle = formatAnchor($item->title);
        $atts['data-title'] = $dataTitle;
    } else {
        $atts['class'] = "";
        $dataTitle = formatAnchor($item->title);
        $atts['data-title'] = $dataTitle;
    }
    return $atts;
}

// Function to add ARIA attributes to parent menu items with submenus
function add_aria_attributes_to_menu_items( $items, $args ) {
    $dom = new DOMDocument();
    $dom->loadHTML( '<ul>' . $items . '</ul>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    $list_items = $dom->getElementsByTagName('li');

    foreach ($list_items as $li) {
        $submenu = $li->getElementsByTagName('ul')->item(0);

        if ($submenu && $submenu->getAttribute('class') === 'sub-menu') {
            if (!$li->hasAttribute('aria-haspopup')) {
                $li->setAttribute('aria-haspopup', 'true');
                $li->setAttribute('aria-expanded', 'false');

                // Add the <button> element
                $button = $dom->createElement('button', '▼');
                $button->setAttribute('class', 'plus-icon');
                $button->setAttribute('aria-label', 'Expand submenu for ' . $li->getElementsByTagName('a')->item(0)->textContent); // Dynamic label
                $li->insertBefore($button, $submenu); // Insert before the submenu

                 // Add the "hidden" class to the submenu
                $submenu->setAttribute('class', $submenu->getAttribute('class') . ' hidden'); // Append the class
            }
        }
    }

    $ul_element = $dom->getElementsByTagName('ul')->item(0);
    $inner_html = '';

    if ($ul_element) {
        foreach ($ul_element->childNodes as $child) {
            $inner_html .= $child->C14N();
        }
    }

    return $inner_html;
}
add_filter( 'wp_nav_menu_items', 'add_aria_attributes_to_menu_items', 10, 2 );

function clear_nav_menu_item_class($classes, $item, $args) {
    // Add the 'active' class if necessary
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }

    // Now, remove all classes that start with specified prefixes
    $classes = array_filter($classes, function ($class) {
        return !preg_match('/^(menu-item-|page-item-|page_item|current_page_item|current-menu-item|menu-item)/', $class);
    });

    return $classes;
}

// Clears <li> IDs from menu
function clear_nav_menu_item_id($id, $item, $args) {
    return ""; 
}

/*------------------------------------*\
	Web Ok - Remove <p> tags from content
\*------------------------------------*/
// function remove_paragraph_tags( $content ) {
//   return preg_replace( '/<p>(.*?)<\/p>/s', '$1', $content );
// }
// add_filter( 'the_content', 'remove_paragraph_tags' );

/*------------------------------------*\
	Web Ok - Remove Comments completely
\*------------------------------------*/
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function webokstarter_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}

/*------------------------------------*\
	Anchors formatted with hyphens(-) instead of spaces
\*------------------------------------*/
function formatAnchor($str, $sep='-')
{
  $res = strtolower($str);
  $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
  $res = preg_replace('/[[:space:]]+/', $sep, $res);
  return trim($res, $sep);
}

/* ####### Actions + Filters + ShortCodes ####### */

// Add Actions
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_footer', 'footer_scripts'); // Add custom scripts to wp_footer
add_action('wp_enqueue_scripts', 'styles_sheet'); // Add Theme Stylesheet
add_action('init', 'register_menu'); // Add Menus
add_action('init', 'webokstarter_wp_pagination'); // Add the Pagination

// Remove Actions
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.

// Add Filters
add_filter('avatar_defaults', 'webokstarter_wp_gravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'webokstarter_wp_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Web Ok filters
// add_filter('nav_menu_link_attributes', 'add_link_atts', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_link_attributes', 'add_link_atts_specific', 'desktop-menu', 10, 2); // add attr to menu anchors - Web Ok
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3); // Remove class attr on menu items - Web Ok
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3); // Remove id attr on menu items - Web Ok
add_action( 'wp_before_admin_bar_render', 'webokstarter_admin_bar_render' );

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


// disable gutneberg for certain post types
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'testimonial') return false;
    return $current_status;
}

// Add custom post type archive title
function new_cpt_archive_title($title){

    if ( is_post_type_archive('leadership') ){
        $title = 'Leadership - ' . get_bloginfo('name');
        return $title;
    }

    return $title;
} 

add_filter( 'pre_get_document_title', 'new_cpt_archive_title', 9999 );

// Reorder columns and add a custom column to the "Testimonial" post type
// function add_testimonial_client_column($columns) {
//     // Remove the "Date" column temporarily
//     unset($columns['date']);

//     // Add the "Client" column
//     $columns['testimonial_client'] = 'Client';

//     // Re-add the "Date" column after the "Client" column
//     $columns['date'] = 'Date';

//     return $columns;
// }

function display_testimonial_client_column($column_name, $post_id) {
    if ($column_name === 'testimonial_client') {
        $client_ids = get_field('associated_client', $post_id);
        $client_titles = array();
        foreach ($client_ids as $client_id) {
            $client_title = get_the_title($client_id);
            $client_titles[] = '<a href="' . get_edit_post_link($client_id) . '">' . $client_title . '</a>';
        }
        echo implode(', ', $client_titles);
    }
}

// add_filter('manage_testimonial_posts_columns', 'add_testimonial_client_column');
add_action('manage_posts_custom_column', 'display_testimonial_client_column', 10, 2);


function get_page_colour() {
  if ( is_404() ) {
    return 'secondary';
  } elseif ( is_singular( 'client' ) || is_post_type_archive( 'client' ) ) {
    return 'off-white';
  } else { // Add an 'else' for other pages if needed
    return 'secondary'; // Or another default color
  }
}


// Renaming the "Posts" menu item to "News & Media"
function rename_post_to_news_media() {
    global $wp_post_types;

    if (isset($wp_post_types['post'])) {
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News & Media';
        $labels->singular_name = 'News or Media Item';
        $labels->add_new = 'Add New Item';
        $labels->add_new_item = 'Add New News or Media Item';
        $labels->edit_item = 'Edit News or Media Item';
        $labels->new_item = 'New News or Media Item';
        $labels->view_item = 'View News or Media Item';
        $labels->search_items = 'Search News & Media';
        $labels->not_found = 'No News & Media items found';
        $labels->not_found_in_trash = 'No News & Media items found in Trash';
        $labels->all_items = 'All News & Media';
        $labels->menu_name = 'News & Media';
        $labels->name_admin_bar = 'News & Media';
        $wp_post_types['post']->menu_icon = 'dashicons-megaphone'; // Optional: Change the icon
    }
}
add_action('init', 'rename_post_to_news_media');

function rename_post_taxonomy_labels() {
    global $wp_taxonomies;
    if (isset($wp_taxonomies['category'])) {
        $labels = &$wp_taxonomies['category']->labels;
        $labels->name = 'News & Media Categories';
        $labels->singular_name = 'News & Media Category';
        $labels->search_items = 'Search News & Media Categories';
        $labels->all_items = 'All News & Media Categories';
        $labels->parent_item = 'Parent News & Media Category';
        $labels->parent_item_colon = 'Parent News & Media Category:';
        $labels->edit_item = 'Edit News & Media Category';
        $labels->update_item = 'Update News & Media Category';
        $labels->add_new_item = 'Add New News & Media Category';
        $labels->new_item_name = 'New News & Media Category Name';
        $labels->menu_name = 'News & Media Categories';
    }
    if (isset($wp_taxonomies['post_tag'])) {
        $labels = &$wp_taxonomies['post_tag']->labels;
        $labels->name = 'News & Media Tags';
        $labels->singular_name = 'News & Media Tag';
        $labels->search_items = 'Search News & Media Tags';
        $labels->all_items = 'All News & Media Tags';
        $labels->edit_item = 'Edit News & Media Tag';
        $labels->update_item = 'Update News & Media Tag';
        $labels->add_new_item = 'Add New News & Media Tag';
        $labels->new_item_name = 'New News & Media Tag Name';
        $labels->menu_name = 'News & Media Tags';
    }
}
add_action( 'init', 'rename_post_taxonomy_labels', 11 );

add_filter( 'wpcf7_autop_or_not', '__return_false' );