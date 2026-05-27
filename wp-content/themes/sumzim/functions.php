<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( 'sumzim_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'sumzim_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sumzim_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on _s, use a find and replace
		* to change 'sumzim' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sumzim', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'sumzim' ),
			'utility-menu' => esc_html__( 'Utility Menu', 'sumzim' ),
			'footer-services-menu' => esc_html__( 'Footer Services Menu', 'sumzim' ),
			'footer-about-menu' => esc_html__( 'Footer About Menu', 'sumzim' ),
			'footer-locations-menu' => esc_html__( 'Footer Locations Menu', 'sumzim' ),
			'footer-utility-menu' => esc_html__( 'Footer Utility Menu', 'sumzim' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sumzim_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sumzim_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sumzim_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sumzim_content_width', 640 );
}
add_action( 'after_setup_theme', 'sumzim_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sumzim_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sumzim' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sumzim' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sumzim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sumzim_scripts() {
	$js_version  = filemtime( get_template_directory() . '/scripts.min.js' );
	$css_version = filemtime( get_stylesheet_directory() . '/style.css' );
	wp_enqueue_style( 'sumzim-style', get_stylesheet_uri(), array(), $css_version );


wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/scripts.min.js', array(), $js_version, true);

	wp_style_add_data( ' sumzim-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sumzim_scripts' );


  
/** 
 * Remove versions from CSS & JS
 */

function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/** 
 * Add small image size
 */
 add_image_size('small', 220, 9999);

/** 
 * Register Staff
 */
function register_staff() {
	register_post_type('staff', array(
		'label' => 'Staff',
		'menu_icon' => 'dashicons-admin-users',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'query_var' => true,
		'has_archive' => false,
		'supports' => array('title'),
		'show_in_rest' => true,
		'labels' => array (
			'name' => 'Staff',
			'singular_name' => 'Staff',
			'menu_name' => 'Staff',
			'add_new' => 'Add Staff',
			'add_new_item' => 'Add New Staff',
			'edit' => 'Edit',
			'edit_item' => 'Edit Staff',
			'new_item' => 'New Staff',
			'view' => 'View',
			'view_item' => 'View Staff',
			'search_items' => 'Search Staff',
			'not_found' => 'No Staff Found',
			'not_found_in_trash' => 'No Staff Found in Trash',
			'parent' => 'Parent Staff'
		)
	) );

	flush_rewrite_rules( false );
}
add_action('init', 'register_staff');

/**
 * Add Products
 */


/** 
 * Add products to permalinks page
 */

// add_action('admin_init', function() {
// 	add_settings_field('sumzim_product_slug', __('Products base', 'txtdomain'), 'sumzim_slug_output', 'permalink', 'optional');
// });

function sumzim_slug_output() {
	?>
	<input name="sumzim_product_slug" type="text" class="regular-text code" value="<?php echo esc_attr(get_option('sumzim_product_slug')); ?>" placeholder="<?php echo 'reference'; ?>" />
	<?php
}

/** 
 * Add button class to next/previous navigation
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="button button--primary"';
}

/**
 * Fetch a YouTube video title via oEmbed with a 24-hour transient cache.
 * No API key required. Returns the title string, or empty string on failure.
 */
function sumzim_get_youtube_title( $video_id ) {
	if ( empty( $video_id ) ) {
		return '';
	}

	$cache_key = 'sumzim_yt_title_' . sanitize_key( $video_id );
	$cached    = get_transient( $cache_key );
	if ( $cached !== false ) {
		return $cached;
	}

	$url      = 'https://www.youtube.com/oembed?url=' . rawurlencode( 'https://www.youtube.com/watch?v=' . $video_id ) . '&format=json';
	$response = wp_remote_get( $url, array( 'timeout' => 5 ) );

	if ( is_wp_error( $response ) ) {
		return '';
	}

	$data  = json_decode( wp_remote_retrieve_body( $response ), true );
	$title = $data['title'] ?? '';

	set_transient( $cache_key, $title, 24 * HOUR_IN_SECONDS );
	return $title;
}

/**
 * Fetch Google review data with a 6-hour transient cache.
 * Returns the full API response array, or null on failure.
 */
function sumzim_fetch_review_data() {
	$cached = get_transient( 'sumzim_google_review_count' );
	if ( $cached !== false ) {
		return $cached;
	}

	$response = wp_remote_get(
		'https://maps.googleapis.com/maps/api/place/details/json?place_id=ChIJd5IeY6tFxokR8QWJk68CUpI&fields=user_ratings_total&key=AIzaSyDSRvqTsYQXGTJ3gCbaaSXvAIqnnT3MMiM',
		array( 'timeout' => 5 )
	);

	if ( is_wp_error( $response ) ) {
		return null;
	}

	$data = json_decode( wp_remote_retrieve_body( $response ), true );
	set_transient( 'sumzim_google_review_count', $data, 6 * HOUR_IN_SECONDS );
	return $data;
}

/**
 * REST endpoint — kept for external use; serves from transient cache.
 */
add_action( 'rest_api_init', function() {
	register_rest_route( 'sumzim/v1', '/google-reviews', array(
		'methods'             => 'GET',
		'callback'            => 'sumzim_google_review_count',
		'permission_callback' => '__return_true',
	) );
} );

function sumzim_google_review_count() {
	$data = sumzim_fetch_review_data();
	if ( ! $data ) {
		return new WP_REST_Response( array( 'error' => 'Failed to fetch' ), 500 );
	}
	return rest_ensure_response( $data );
}

/** 
 * Add options page
 */
 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	


}

/** 
 * Add PPC user role
 */

function addPPCRole() {
	$ppc_capabilities = array(
		'upload_files' => true,
		'read' => true,
	);
	// remove_role('ppc_manager');
	add_role( 'ppc_manager', __( 'PPC Manager' ),  $ppc_capabilities);
}

add_filter('admin_init', 'addPPCRole', 10);


function add_ppc_caps() {
	$ppc_role = get_role('ppc_manager');
	$ppc_role->add_cap('upload_files');
}

add_filter('admin_init', 'add_ppc_caps', 10);

/** 
 * Add styles to visual editor
 */
function wysiwygCss($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wysiwygCss');

function wysiwygCssFormats( $formats ) {  

    $style_formats = array(  
        array(  
			'title' => 'Primary Button', 
			'block' => 'div',
            'classes' => 'primary-button',
            'wrapper' => true,
             
        ),  
        array(  
			'title' => 'Secondary Button',
			'block' => 'div',
			'classes' => 'secondary-button',
			'wrapper' => true,
		),
		array(  
					'title' => 'Small Print',
					'block' => 'div',
					'classes' => 'small-print',
					'wrapper' => true,
		),
    );  
    
    $formats['style_formats'] = json_encode( $style_formats );
    return $formats;
   
}
add_filter( 'tiny_mce_before_init', 'wysiwygCssFormats' ); 

/** Invoke CSS for tinyMCE styles */
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


/** Block: Question & Answer */
// add_action( 'init', 'register_block_question_answer' );
// function register_block_question_answer() {
//     register_block_type( __DIR__ . '/blocks/question-answer/block.json' );
// }

/** Block: List WYSIWYG */
// add_action( 'init', 'register_block_list_wysiwyg' );
// function register_block_list_wysiwyg() {
//     register_block_type( __DIR__ . '/blocks/list-wysiwyg/block.json' );
// }


/** 
 * Initialize Blocks
 */

add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

	$blocks = [
		'cta-button' => [
			'title'       => __( 'CTA Button', 'sumzim' ),
			'description' => __( 'A section with a simple CTA button.', 'sumzim' ),
			'icon'        => 'format-image',
		],   
		'diagonal-image-callout' => [
			'title'       => __( 'Diagonal Image Callout', 'sumzim' ),
			'description' => __( 'A section with a content area and image.', 'sumzim' ),
			'icon'        => 'format-image',
		],   	
		'media-grid' => [
			'title'       => __( 'Media Grid', 'sumzim' ),
			'description' => __( 'A section with a grid of media items.', 'sumzim' ),
			'icon'        => 'format-image',
		],  
		'question-answer' => [
			'title'       => __( 'Question / Answer ', 'sumzim' ),
			'description' => __( 'A section with QA items.', 'sumzim' ),
			'icon'        => 'format-image',
		],  	
		'cards' => [
			'title'       => __( 'Cards', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'content-divider' => [
			'title'       => __( 'Content Divider', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'image-section' => [
			'title'       => __( 'Image Section', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'iframe' => [
			'title'       => __( 'iFrame', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'toggle' => [
			'title'       => __( 'Toggle', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'disruptor' => [
			'title'       => __( 'Disruptor', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'icon-callout' => [
			'title'       => __( 'Icon Callout', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'membership-table' => [
			'title'       => __( 'Membership Table', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		],
		'list-wysiwyg' => [
			'title'       => __( 'List WYSIWYG', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'featured-articles' => [
			'title'       => __( 'Featured Articles', 'sumzim' ),
			'description' => __( 'A section with cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'google-reviews' => [
			'title'       => __( 'Google Reviews', 'sumzim' ),
			'description' => __( 'A section with reviews.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'expandable-slider' => [
			'title'       => __( 'Expandable Slider', 'sumzim' ),
			'description' => __( 'A slider with expandable cards.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'comparison-table' => [
			'title'       => __( 'Comparison Table', 'sumzim' ),
			'description' => __( 'A table with rows and columns.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'flip-cards' => [
			'title'       => __( 'Flip Cards', 'sumzim' ),
			'description' => __( 'A section with cards that have content on the back.', 'sumzim' ),
			'icon'        => 'format-image',
		], 
		'featured-staff' => [
			'title'       => __( 'Featured Staff', 'sumzim' ),
			'description' => __( 'A section with cards that have content on the back.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'staff-slider' => [
			'title'       => __( 'Staff Slider', 'sumzim' ),
			'description' => __( 'A section with cards that have content on the back.', 'sumzim' ),
			'icon'        => 'format-image',
		], 		
		'brands-list' => [
			'title'       => __( 'Brands List', 'sumzim' ),
			'description' => __( 'A section with cards that have content on the back.', 'sumzim' ),
			'icon'        => 'format-image',
		], 		
		'homepage-hero' => [
			'title'       => __( 'Homepage Hero', 'sumzim' ),
			'description' => __( 'A hero section with a title, image, headline, and CTA.', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'page-intro' => [
			'title'       => __( 'Page Intro', 'sumzim' ),
			'description' => __( 'A section large intro text', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'half-split' => [
			'title'       => __( 'Half Split', 'sumzim' ),
			'description' => __( 'A 50/50 section with flexible content fields', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'icon-items' => [
			'title'       => __( 'Icon Items', 'sumzim' ),
			'description' => __( 'A section with icons and text', 'sumzim' ),
			'icon'        => 'format-image',
		],
		'full-width-cards' => [
			'title'       => __( 'Full-Width Cards', 'sumzim' ),
			'description' => __( 'A stacked list of full-width content cards', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'icon-grid' => [
			'title'       => __( 'Icon Grid', 'sumzim' ),
			'description' => __( 'A grid with icons and text, and a link', 'sumzim' ),
			'icon'        => 'format-image',
		], 	
		'oembed-section' => [
			'title'       => __( 'oEmbed Section', 'sumzim' ),
			'description' => __( 'A section with an oembed, text, and a link', 'sumzim' ),
			'icon'        => 'format-image',
		],
		'section-header' => [
			'title'       => __( 'Section Header', 'sumzim' ),
			'description' => __( 'A section with an heading and content', 'sumzim' ),
			'icon'        => 'format-image',
		],
		'section-content' => [
			'title'       => __( 'Section Content', 'sumzim' ),
			'description' => __( 'A section with a heading, position, and description', 'sumzim' ),
			'icon'        => 'format-image',
		],		 	

																	 						 				     
	];

	foreach ( $blocks as $slug => $block ) {
		acf_register_block_type( [
			'name'            => $slug,
			'title'           => $block['title'],
			'description'     => $block['description'],
			'render_template' => get_template_directory() . "/inc/blocks/{$slug}/{$slug}.php",
			'category'        => 'formatting',
			'icon'            => $block['icon'],
			'keywords'        => [ $slug ],
			'mode'            => 'edit',
			'supports'        => [
				'align' => [ 'full', 'wide' ],
				'mode'  => true,
                'className' => true,
			],
		] );
	}
} );

/**
 * Block Editor Assets
 */
add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_script(
		'sumzim-block-transforms',
		get_template_directory_uri() . '/js/editor/block-transforms.js',
		[ 'wp-blocks', 'wp-hooks' ],
		filemtime( get_template_directory() . '/js/editor/block-transforms.js' ),
		true
	);
} );

/**
 * Google Maps API Key — defined in wp-config.php per environment.
 * GOOGLE_MAPS_API_KEY must be set there; never hardcode it here.
 */
function my_acf_init() {
    if ( defined( 'GOOGLE_MAPS_API_KEY' ) ) {
        acf_update_setting( 'google_api_key', GOOGLE_MAPS_API_KEY );
    }
}
add_action( 'acf/init', 'my_acf_init' );

/**
 * Half Split Layouts
 */

function half_split_layouts(): array {
    return [
        'google_reviews' => [
            'template'  => 'inc/blocks/google-reviews/google-reviews',
            'data_key'  => 'google_reviews_data',
            'field_key' => 'google_reviews',
        ],
        'icon_items' => [
            'template'  => 'inc/blocks/icon-items/icon-items',
            'data_key'  => 'icon_items_data',
            'field_key' => 'icon_items',
        ],
        'wysiwyg' => [
            'template'  => 'inc/blocks/half-split/wysiwyg',
            'data_key'  => 'wysiwyg_data',
            'field_key' => 'content',
        ],
        'google_map' => [
            'template'  => 'inc/blocks/half-split/google-map',
            'data_key'  => 'google_map_data',
            'field_key' => 'google_map',
        ],
        'image' => [
            'template'  => 'inc/blocks/half-split/image',
            'data_key'  => 'half_split_image_data',
            'field_key' => 'image_group',
        ],
        'oembed' => [
            'template'  => 'inc/blocks/half-split/oembed',
            'data_key'  => 'half_split_oembed_data',
            'field_key' => 'oembed_group',
        ],
    ];
}

add_filter('query_vars', function($vars) {
    foreach (half_split_layouts() as $config) {
        $vars[] = $config['data_key'];
    }
    return $vars;
});

/** Add new user role */

add_role( 'seo-admin', 'SEO Administrator',
	array(
		'switch_themes' => false,
		'edit_themes' => false,
		'edit_theme_options' => false,
		'install_themes' => false,
		'activate_plugins' => true,
		'edit_plugins' => true,
		'install_plugins' => true,
		'edit_users' => false,
		'edit_files' => true,
		'manage_options' => true,
		'moderate_comments' => true,
		'manage_categories' => true,
		'manage_links' => true,
		'upload_files' => true,
		'import' => true,
		'unfiltered_html' => true,
		'edit_posts' => true,
		'edit_others_posts' => true,
		'edit_published_posts' => true,
		'publish_posts' => true,
		'edit_pages' => true,
		'read' => true,
		'publish_pages' => true,
		'edit_others_pages' => true,
		'edit_published_pages' => true,
		'delete_pages' => true,
		'delete_others_pages' => true,
		'delete_published_pages' => true,
		'delete_posts' => true,
		'delete_others_posts' => true,
		'delete_published_posts' => true,
		'delete_private_posts' => true,
		'edit_private_posts' => true,
		'read_private_posts' => true,
		'delete_private_pages' => true,
		'edit_private_pages' => true,
		'read_private_pages' => true,
		'delete_users' => false,
		'create_users' => false,
		'unfiltered_upload' => true,
		'edit_dashboard' => false,
		'customize' => true,
		'delete_site' => false,
		'update_plugins' => true,
		'delete_plugins' => true,
		'update_themes' => false,
		'update_core' => false,
		'list_users' => false,
		'remove_users' => false,
		'add_users' => false,
		'promote_users' => false,
		'delete_themes' => false,
		'export' => true,
		'edit_comment' => true,
		'create_sites' => false,
		'delete_sites' => false,
		'manage_network' => false,
		'manage_sites' => false,
		'manage_network_users' => false,
		'manage_network_themes' => false,
		'manage_network_options' => false, 
		'manage_network_plugins' => true,
		'upload_plugins' => true,
		'upload_themes' => false,
		'upgrade_network' => false,
		'setup_network' => false,
	)
);

// Disable Gravity Forms CSS
add_filter( 'gform_disable_css', '__return_true' );

// Start Progress/Steps at 0
add_filter( 'gform_progressbar_start_at_zero', '__return_true' );




add_filter( 'gform_field_container_10', 'custom_fieldset_wrapper', 10, 6 );
function custom_fieldset_wrapper( $field_container, $field, $form, $css_class, $style, $field_content ) {
    if ( is_admin() ) {
        return $field_container;
    }

    // Define your fieldset groups
    $fieldsets = [
        'hvac-equipment-fieldset' => [40, 15, 88, 41, 42, 89, 90, 37, 45],
        'hvac-accessories-fieldset' => [57, 58, 46, 91, 39,],
        'electrical-fieldset' => [48, 49, 50],
        'plumbing-fieldset' => [51, 56, 53, 87, 55, 54, 52],

        // Add more groups here...
    ];

    // Loop through each group
    foreach ( $fieldsets as $class => $ids ) {
        $first = reset($ids);
        $last = end($ids);

        if ( $field->id == $first ) {
            $legend = ucfirst(str_replace('-', ' ', str_replace('-selections-fieldset', '', $class)));
            $fieldset_start = '<fieldset class="' . esc_attr($class) . '">
                <legend class="gfield_label gfield_label_before_complex">' . esc_html($legend) . '<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $fieldset_start . $field_container;
        }

        if ( $field->id == $last ) {
            return $field_container . '</fieldset>';
        }
    }

    return $field_container;
}

add_filter('gform_get_form_filter', function($form_string, $form){
	if ($form['id'] != 10) {
		return $form_string;
	}

	// Step 1: Wrap accessories + electrical in .column-2-wrapper
	$pattern_column_2 = '/(<fieldset class="hvac-accessories-fieldset">.*?<\/fieldset>\s*<fieldset class="electrical-fieldset">.*?<\/fieldset>)/s';
	if (preg_match($pattern_column_2, $form_string, $matches)) {
		$form_string = str_replace($matches[1], '<div class="equipment-column-2">' . $matches[1] . '</div>', $form_string);
	}

	// Step 2: Wrap equipment, column-2, and plumbing in .equipment-fieldsets-wrapper
	$pattern_all = '/(<fieldset class="hvac-equipment-fieldset">.*?<div class="equipment-column-2">.*?<\/div>\s*<fieldset class="plumbing-fieldset">.*?<\/fieldset>)/s';
	if (preg_match($pattern_all, $form_string, $matches)) {
		$form_string = str_replace($matches[1], '<div class="equipment-fieldsets-wrapper">' . $matches[1] . '</div>', $form_string);
	}

	return $form_string;
}, 10, 2);


/**
 * Menu: Replace button with image for blue collar club
 */

function replace_menu_item_with_button($item_output, $item, $depth, $args) {
    // Change only specific menu items (adjust ID as needed)
    if ($item->title === 'Book Now') { // Change to match your menu item
        // $item_output = '<button class="menu-button" onclick="location.href=\'' . esc_url($item->url) . '\'">' . esc_html($item->title) . '</button>';
		$item_output = '<button class="button button-cta button--schedule book-now-button menu-book-now-button" onclick="_scheduler.show({ schedulerId: \'sched_ejqbmr1e0g7tagr59sdo4rr2\' })" type="button">' . esc_html($item->title) . '</button>';
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'replace_menu_item_with_button', 10, 4);

/** 
 * Gravity Forms: Require zip code in service area  
 * */

// ZIP code validation for Form ID 1 (single-page form)
add_filter('gform_validation_1', 'validate_zip_code_service_area_form_1');

function validate_zip_code_service_area_form_1($validation_result) {
    return validate_zip_core($validation_result, 1, false);
}

// ZIP code validation for Form ID 10 (multi-page form)
add_filter('gform_validation_10', 'validate_zip_code_service_area_form_10');

function validate_zip_code_service_area_form_10($validation_result) {
    return validate_zip_core($validation_result, 10, true);
}

// Shared ZIP validation logic
function validate_zip_core($validation_result, $form_id, $is_multipage) {
    $form = $validation_result['form'];

    // If multipage and transitioning between pages, skip validation
    if ($is_multipage &&
        rgpost("gform_target_page_number_{$form_id}") != 0 &&
        rgpost("gform_target_page_number_{$form_id}") != rgpost("gform_page_number_{$form_id}")) {
        return $validation_result;
    }

    $allowed_zips = [
        '19320', '19382', '19380', '19335', '19460', '19087', '19355', '19348', '19341', '19073',
        '19465', '19363', '19425', '19390', '19344', '19312', '19475', '19350', '19311', '19317',
        '19352', '19343', '19365', '19301', '19333', '19520', '19362', '19330', '19310', '19383',
        '19372', '19483', '19487', '19489', '19488', '19374', '19319', '19358', '19388', '19457',
        '19371', '19347', '19351', '19353', '19354', '19357', '19360', '19367', '19366', '19369',
        '19375', '19376', '19381', '19395', '19399', '19398', '19421', '19432', '19442', '19496',
        '19316', '19318', '19346', '19345', '19480', '19482', '19481', '19493', '19495', '19494',
        '19470', '17603', '17601', '17602', '17543', '17522', '17022', '17545', '17512', '17552',
        '17517', '17557', '17566', '19540', '17551', '17540', '17584', '17547', '17555', '17368',
        '17073', '17569', '17538', '17554', '19362', '17527', '17578', '19543', '17519', '17560',
        '17579', '17562', '17572', '17529', '17520', '17501', '17509', '17516', '17532', '17535',
        '17563', '17536', '17505', '17502', '17565', '17518', '19501', '17582', '17581', '17508',
        '17583', '17576', '17528', '17533', '17534', '17537', '17549', '17550', '17564', '17567',
        '17568', '17570', '17573', '17575', '17580', '17585', '17604', '17605', '17606', '17607',
        '17608', '17699', '17503', '17504', '17506', '17507', '17521', '17611', '17622', '19082',
        '19063', '19087', '19083', '19013', '19050', '19026', '19064', '19023', '19018', '19010',
        '19342', '19014', '19073', '19008', '19061', '19015', '19003', '19153', '19036', '19086',
        '19060', '19081', '19078', '19317', '19079', '19085', '19033', '19041', '19070', '19076',
        '19032', '19074', '19094', '19022', '19029', '19043', '19373', '19319', '19113', '19080',
        '19089', '19088', '19052', '19397', '19331', '19340', '19339', '19016', '19017', '19028',
        '19037', '19039', '19065', '19091', '19098'
    ];

    foreach ($form['fields'] as &$field) {
        if ($field->type === 'address') {
            $zip = rgpost("input_{$field->id}_5");

            // Clean the ZIP to remove +4 codes (e.g., 17603-1234 -> 17603)
            $zip = preg_replace('/[^0-9\-]/', '', $zip); // keep only digits and hyphen
            $zip = preg_replace('/^(\d{5})-\d{4}$/', '$1', $zip); // trim +4 if present

            error_log("Cleaned ZIP Code: " . print_r($zip, true));

            if (!in_array($zip, $allowed_zips)) {
                $field->failed_validation = true;
                $field->validation_message = 'Sorry, but this address is not in our service area. <a href="/about-us/where-we-work/" target="_blank" rel="noopener">See where we work</a>.';
                $validation_result['is_valid'] = false;
                break;
            }
        }
    }

    $validation_result['form'] = $form;
    return $validation_result;
}

/**
 * Add ID to nav Pay Online button
 */

add_filter('nav_menu_link_attributes', 'add_custom_attributes_to_menu_link', 10, 3);
function add_custom_attributes_to_menu_link($atts, $item, $args) {
    // Target a specific menu item by ID or title
    if ($item->ID === 30615) {
        // Add or append class
        $atts['id'] = isset($atts['id']) 
            ? $atts['id'] . ' pay-online-menu-item' 
            : 'pay-online-menu-item';
    }

    return $atts;
}





/** Adds a validation block message at the top of the page if there's an error */

add_filter('gform_validation_message_1', 'custom_top_error_message', 10, 2);
add_filter('gform_validation_message_10', 'custom_top_error_message', 10, 2);

function custom_top_error_message($message, $form) {
    return '<div class="validation_error">There is an error on the page. Please check the highlighted fields below.</div>';
}


/**
 * Custom og:image for /?spdirect
 */
add_filter( 'wpseo_opengraph_image', 'custom_og_image_for_spdirect', 1 );
add_filter( 'wpseo_twitter_image', 'custom_og_image_for_spdirect', 1 );

function custom_og_image_for_spdirect( $image ) {
    if ( isset( $_GET['spdirect'] ) && is_front_page() ) {
        return 'https://sumzim.com/wp-content/uploads/2025/12/og-image-spdirect@2x.webp';
    }
    return $image;
}

/**
 * Hide page title when Homepage Hero block is present
 * 
 * Add to functions.php: require_once get_template_directory() . '/inc/homepage-hero.php';
 */

add_filter('the_title', 'hide_title_when_hero_block', 10, 2);

function hide_title_when_hero_block($title, $post_id = null) {
    // Only filter on singular front-end views, not admin
    if (is_admin() || !is_singular() || !in_the_loop() || !is_main_query()) {
        return $title;
    }

    if (has_block('acf/homepage-hero', $post_id)) {
        return '';
    }

    return $title;
}

/**
 * Add body class when Homepage Hero block is present
 * Used to remove page top padding and hide page title
 */
add_filter('body_class', function ($classes) {
    if (is_singular() && has_block('acf/homepage-hero')) {
        $classes[] = 'has-homepage-hero';
    }
    return $classes;
});

/**
 * Add class to body element for each page
 */
add_filter( 'body_class', function( $classes ) {
    if ( is_page() ) {
        $slug = get_post_field( 'post_name', get_the_ID() );
        $classes[] = 'page-' . $slug;
    }
    return $classes;
} );

/**
 * Allow anchor tags in gravity forms
 */
add_filter( 'gform_allowable_tags', function( $tags, $field ) {
    return '<a><strong><em>'; // only these tags survive strip_tags()
}, 10, 2 );

// Usage in WYSIWYG: [years_since year="1934"]
add_shortcode('years_since', function($atts) {
    $atts = shortcode_atts(['year' => date('Y')], $atts);
    return date('Y') - intval($atts['year']);
});
