<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';


// Remove <p> and <br/> tags from Contact Form
add_filter('wpcf7_autop_or_not', '__return_false');


// Add ACF global option for site
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Opcje strony',
		'menu_title'	=> 'Opcje strony',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function create_wedding_halls_post_type() {

    register_post_type( 'sale',
    array(
        'labels' => array(
            'name' => __( 'Sale', 'sage' ),
            'singular_name' => __( 'Sala', 'sage' ),
            'add_new' => __( 'Dodaj salę', 'sage' ),
            'add_new_item' => __( 'Dodaj salę', 'sage' ),
            'edit_item' => __( 'Edytuj salę', 'sage' ),
            'item_updated' => __( 'Sala została zaktualizowana', 'sage' ),
            'view_item' => __( 'Zobacz salę', 'sage' ),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'sale'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => array( 'title', 'page-attributes', 'thumbnail', 'excerpt' ),
    )
    );
}
add_action( 'init', 'create_wedding_halls_post_type' );


function create_gallery_post_type() {

    register_post_type( 'galeria',
    array(
        'labels' => array(
            'name' => __( 'Galeria', 'sage' ),
            'singular_name' => __( 'Wpis', 'sage' ),
            'add_new' => __( 'Dodaj wpis', 'sage' ),
            'add_new_item' => __( 'Dodaj wpis', 'sage' ),
            'edit_item' => __( 'Edytuj wpis', 'sage' ),
            'item_updated' => __( 'Wpis został zaktualizowany', 'sage' ),
            'view_item' => __( 'Zobacz wpis', 'sage' ),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'galeria'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array( 'title', 'page-attributes', 'thumbnail', 'excerpt' ),
    )
    );

    register_taxonomy(
        'gallery-taxonomy',
        'galeria',
        array(
            'hierarchical' => true,
            'label' => 'Kategorie',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'kategorie-galerii',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'create_gallery_post_type' );

function create_dish_menu_post_type() {

    register_post_type( 'menu',
    array(
        'labels' => array(
            'name' => __( 'Menu', 'sage' ),
            'singular_name' => __( 'Menu', 'sage' ),
            'add_new' => __( 'Dodaj menu', 'sage' ),
            'add_new_item' => __( 'Dodaj menu', 'sage' ),
            'edit_item' => __( 'Edytuj menu', 'sage' ),
            'item_updated' => __( 'Menu zostało zaktualizowane', 'sage' ),
            'view_item' => __( 'Zobacz menu', 'sage' ),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'menu'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-carrot',
        'supports' => array( 'title', 'page-attributes' ),
    )
    );
}
add_action( 'init', 'create_dish_menu_post_type' );

function create_calendar_post_type() {

    register_post_type( 'kalendarz',
    array(
        'labels' => array(
            'name' => __( 'Kalendarz', 'sage' ),
            'singular_name' => __( 'Kalendarz', 'sage' ),
            'add_new' => __( 'Dodaj kalendarz', 'sage' ),
            'add_new_item' => __( 'Dodaj kalendarz', 'sage' ),
            'edit_item' => __( 'Edytuj kalendarz', 'sage' ),
            'item_updated' => __( 'Kalendarz został zaktualizowany', 'sage' ),
            'view_item' => __( 'Zobacz kalendarz', 'sage' ),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'kalendarz'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array( 'title', 'page-attributes' ),
    )
    );
}
add_action( 'init', 'create_calendar_post_type' );
function create_client_panel_post_type() {

    register_post_type( 'client-posts',
    array(
        'labels' => array(
            'name' => __( 'Wpisy Panelu klienta', 'sage' ),
            'singular_name' => __( 'Wpis Panelu klienta', 'sage' ),
            'add_new' => __( 'Dodaj wpis', 'sage' ),
            'add_new_item' => __( 'Dodaj wpis', 'sage' ),
            'edit_item' => __( 'Edytuj wpis', 'sage' ),
            'item_updated' => __( 'Wpis został zaktualizowany', 'sage' ),
            'view_item' => __( 'Zobacz wpis', 'sage' ),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'panel'),
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'page-attributes', 'thumbnail', 'excerpt' ),
    )
    );

    register_taxonomy(
        'client-posts-taxonomy',
        'client-posts',
        array(
            'hierarchical' => true,
            'label' => 'Kategorie',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'kategorie-wpisów',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'create_client_panel_post_type' );


function create_news_post_type() {

    register_post_type( 'aktualnosci',
    array(
        'labels' => array(
            'name' => __( 'Aktualności', 'sage' ),
            'singular_name' => __( 'Aktualność', 'sage' ),
            'add_new' => __( 'Dodaj aktualność', 'sage' ),
            'add_new_item' => __( 'Dodaj aktualność', 'sage' ),
            'edit_item' => __( 'Edytuj aktualność', 'sage' ),
            'item_updated' => __( 'Aktualność została zaktualizowana', 'sage' ),
            'view_item' => __( 'Zobacz aktualność', 'sage' ),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'aktualnosci'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
    )
    );
}
add_action( 'init', 'create_news_post_type' );

// Remove default gallery shortcode
remove_shortcode('gallery');

// Add a custom shortcode with the same name
add_shortcode('gallery', function ($attr) {
  $imgIDs =  explode(",", $attr['ids']);

 return \Roots\view('organisms.single-post-gallery', ['ids' => $imgIDs]);
});

// Add custom Color to WYSIWYG

function my_mce4_options($init) {

    $custom_colours = '
    "bc9856","Gold",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');


/**
 * Disable node modules and vendor from All in One export
 *
 * @return array
 */
function disable_node_modules($exclude_filters){
    $exclude_filters[] = wp_get_theme()->stylesheet .'/node_modules';
    return $exclude_filters;
}
add_filter('ai1wm_exclude_themes_from_export', 'disable_node_modules');


/**
 * Add preload value to CSS files
 *
 * @return string
 */
function preload_filter( $html, $handle ){
    // Put ID of element in array that you want to preload
    $preload = array(
        'contact-form-7',
        'sbi_styles',
        'newsletter',
    );

    if (in_array( $handle, $preload )) {
        $html = str_replace("rel='stylesheet'", "rel='stylesheet preload' as='style' ", $html);
    }
    return $html;
}
add_filter( 'style_loader_tag',  'preload_filter', 10, 2 );

/**
 * Add defer value to JS files
 *
 * @return string
 */
function mind_defer_scripts( $tag, $handle, $src ) {

    $defer = array();
    // Put ID of element in array that you want to preload

    if (is_page('login')  || is_page('panel') || is_page_template('template-client-panel.blade.php') || is_singular('client-posts')) {
        $defer = array(
            'sbi_scripts',
            'contact-form-7',
            'wp-polyfill',
            'regenerator-runtime'
        );
    } else{
        $defer = array(
            'sbi_scripts',
            'contact-form-7',
            'wp-polyfill',
            'regenerator-runtime',
            'jquery-core',
            'jquery-migrate',
        );
    }

      if ( in_array( $handle, $defer ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
     }
     return $tag;
}
add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );
