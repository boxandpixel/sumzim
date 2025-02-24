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
			'menu-1' => esc_html__( 'Primary', 'sumzim' ),
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
	wp_enqueue_style( ' sumzim-style', get_stylesheet_uri(), array(), sumzim_VERSION );

	wp_enqueue_script( 'liteYouTube-scripts', get_template_directory_uri() . '/dist/liteYouTube.js');
	wp_enqueue_style( 'liteYouTube-styles', get_template_directory_uri() . '/dist/liteYouTube.css');
	
	$rand = rand( 0, 999999999999 );
	if(is_front_page()) {
		wp_enqueue_style( 'home-styles', get_template_directory_uri() . '/dist/home.css', array(), '20240716');
		// wp_enqueue_script( 'home-scripts', get_template_directory_uri() . '/dist/home.js', array(), '1.0.0', 
		// array(
		// 	'in_footer' => true,
		// 	'strategy'  => 'async',
		// ));

		wp_enqueue_script( 'home-scripts', get_template_directory_uri() . '/dist/home.js', array(), '2.0.0',
			array(
				'strategy' => 'async'
			));
		

	} elseif(is_page('through-the-years')) {
		wp_enqueue_style( 'timeline-styles', get_template_directory_uri() . '/dist/timeline.css');
		wp_enqueue_script( 'timeline-scripts', get_template_directory_uri() . '/dist/timeline.js');
	} else {
		wp_enqueue_style( 'site-styles', get_template_directory_uri() . '/dist/site.css', $rand);
		wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/dist/site.js', $rand);
	}

	wp_localize_script("site-scripts", "WPVars", array(
        "GOOGLE_API" => "AIzaSyCHHeuBppENoo0gFHnxYtAA3aoV3LG0Dfc",
    ));
	
	wp_style_add_data( ' sumzim-style', 'rtl', 'replace' );

	wp_enqueue_script( ' sumzim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), sumzim_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sumzim_scripts' );

/**
 * Partytown if we can figure out how to use it.
 */
// function my_plugin_partytown_config( $config ) {
// 	$config["forward"] = ['dataLayer.push'];
// 	return $config;
//   }
//   add_filter( 'partytown_configuration', 'my_plugin_partytown_config' );
  
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

 /** CUSTOM: REGISTER PRODUCTS */
function register_filters() {
	register_post_type('filters', array(
		'label' => 'Filters',
		'menu_icon' => 'dashicons-products',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'query_var' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
		'rewrite' => [
			'slug' => 'replacement-filter',
			'with_front' => false
		],		
		'labels' => array (
			'name' => 'Filters',
			'singular_name' => 'Filter',
			'menu_name' => 'Filters',
			'add_new' => 'Add Filter',
			'add_new_item' => 'Add New Filter',
			'edit' => 'Edit',
			'edit_item' => 'Edit Filter',
			'new_item' => 'New v',
			'view' => 'View',
			'view_item' => 'View Filter',
			'search_items' => 'Search Filters',
			'not_found' => 'No Filters Found',
			'not_found_in_trash' => 'No Filters Found in Trash',
			'parent' => 'Parent Filter'
		)
	) );

	flush_rewrite_rules( false );
}
add_action('init', 'register_filters');

/** 
 * CREATE PRODUCT CATEGORIES
 * */
add_action( 'init', 'create_filters_taxonomy', 0 );
function create_filters_taxonomy() {

	$labels = array(
		'name' => _x( 'Product Categories', 'taxonomy general name', 'sumzim'),
		'singular_name' => _x( 'Filter Category', 'taxonomy singular name', 'sumzim' ),
		'search_items' =>  __( 'Filter Category', 'sumzim' ),
		'all_items' => __( 'All Filters Category', 'sumzim' ),
		'parent_item' => __( 'Parent Filter Category', 'sumzim' ),
		'parent_item_colon' => __( 'Parent Filter Category:', 'sumzim' ),
		'edit_item' => __( 'Edit Filter Category', 'sumzim' ), 
		'update_item' => __( 'Update Filter Category', 'sumzim' ),
		'add_new_item' => __( 'Add New Filter Category', 'sumzim' ),
		'new_item_name' => __( 'New Filter Category Name', 'sumzim' ),
		'menu_name' => __( 'Filter Categories', 'sumzim' ),
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		// 'rewrite' => array( 'slug' => 'best', 'with_front' => false ),
		'show_in_menu' => 'directory',
	);
 
	register_taxonomy('filter-category',array('filters'), $args);
}

/** 
 * CUSTOM: CREATE PRODUCT TAGS
 */
add_action( 'init', 'create_filter_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_filter_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Filter Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Filter Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Filter Tags' ),
    'popular_items' => __( 'Popular Filter Tags' ),
    'all_items' => __( 'All Filter Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Filter Tag' ), 
    'update_item' => __( 'Update Filter Tag' ),
    'add_new_item' => __( 'Add New Filter Tag' ),
    'new_item_name' => __( 'New Filter Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Filter Tags' ),
  ); 

  register_taxonomy('tag','filters',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

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
 * Add options page
 */
 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Content Settings',
		'menu_slug' 	=> 'content-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Content',
		'menu_title'	=> 'Footer Content',
		'menu_slug' 	=> 'footer-content',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Content',
		'menu_title'	=> 'Header Content',
		'menu_slug' 	=> 'header-update',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
		'redirect'		=> false
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> '5-Point Guarantee',
		'menu_title'	=> '5-Point Guarantee',
		'menu_slug' 	=> '5-point-guarantee',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
		'redirect'		=> false
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Alert Content',
		'menu_title'	=> 'Alert Content',
		'menu_slug' 	=> 'alert-content',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
		'redirect'		=> false
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Products Content',
		'menu_title'	=> 'Products Content',
		'menu_slug' 	=> 'products-content',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
		'redirect'		=> false
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Content',
		'menu_title'	=> '404 Content',
		'menu_slug' 	=> '404-content',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'content-settings',
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

/** Membership Design */

/** Gas Furnace: Monthly */
add_filter( 'wpcf7_form_elements', 'gasFurnaceMonthly' );
function gasFurnaceMonthly( $content ) {
    $str_pos = strpos( $content, 'name="gas-furnace-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-attr="custom" data-monthly="19.09" ', $str_pos, 0 );
    }
    return $content;
}

/** Gas Furnace: Yearly */
add_filter( 'wpcf7_form_elements', 'gasFurnaceYearly' );
function gasFurnaceYearly( $content ) {
    $str_pos = strpos( $content, 'name="gas-furnace-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-attr="custom" data-yearly="229.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Gas Furnace w/Watchdog: Monthly */
add_filter( 'wpcf7_form_elements', 'gasFurnaceWatchdogMonthly' );
function gasFurnaceWatchdogMonthly( $content ) {
    $str_pos = strpos( $content, 'name="gas-furnace-watchdog-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-attr="custom" data-monthly="27.34" ', $str_pos, 0 );
    }
    return $content;
}

/** Gas Furnace w/Watchdog: Yearly */
add_filter( 'wpcf7_form_elements', 'gasFurnaceWatchdogYearly' );
function gasFurnaceWatchdogYearly( $content ) {
    $str_pos = strpos( $content, 'name="gas-furnace-watchdog-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-attr="custom" data-yearly="328.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Gas Boiler: Monthly */
add_filter( 'wpcf7_form_elements', 'gasBoilerMonthly' );
function gasBoilerMonthly( $content ) {
    $str_pos = strpos( $content, 'name="gas-boiler-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="19.09" ', $str_pos, 0 );
    }
    return $content;
}

/** Gas Boiler: Yearly */
add_filter( 'wpcf7_form_elements', 'gasBoilerYearly' );
function gasBoilerYearly( $content ) {
    $str_pos = strpos( $content, 'name="gas-boiler-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="229.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Oil Boiler/Furnace: Monthly */
add_filter( 'wpcf7_form_elements', 'oilBoilerFuranceMonthly' );
function oilBoilerFuranceMonthly( $content ) {
    $str_pos = strpos( $content, 'name="oil-boiler-furnace-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="23.67" ', $str_pos, 0 );
    }
    return $content;
}

/** Oil Boiler/Furnace: Yearly */
add_filter( 'wpcf7_form_elements', 'oilBoilerFurnaceYearly' );
function oilBoilerFurnaceYearly( $content ) {
    $str_pos = strpos( $content, 'name="oil-boiler-furnace-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="284.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump w/Oil Furnace Backup: Monthly */
add_filter( 'wpcf7_form_elements', 'heatPumpOilFurnaceBackupMonthly' );
function heatPumpOilFurnaceBackupMonthly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-oil-furnace-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="38.17" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump w/Oil Furnace Backup: Yearly */
add_filter( 'wpcf7_form_elements', 'heatPumpOilFurnaceBackupYearly' );
function heatPumpOilFurnaceBackupYearly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-oil-furnace-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="458.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump w/Gas Furnace Backup: Monthly */
add_filter( 'wpcf7_form_elements', 'heatPumpGasFurnaceBackupMonthly' );
function heatPumpGasFurnaceBackupMonthly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-gas-furnace-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="38.17" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump w/Gas Furnace Backup: Yearly */
add_filter( 'wpcf7_form_elements', 'heatPumpGasFurnaceBackupYearly' );
function heatPumpGasFurnaceBackupYearly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-gas-furnace-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="458.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump w/Electric Furnace Backup: Monthly */
add_filter( 'wpcf7_form_elements', 'heatPumpElectricBackupMonthly' );
function heatPumpElectricBackupMonthly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-electrical-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="38.17" ', $str_pos, 0 );
    }
    return $content;
}

/** Heat Pump: Yearly */
add_filter( 'wpcf7_form_elements', 'heatPumpElectricBackupYearly' );
function heatPumpElectricBackupYearly( $content ) {
    $str_pos = strpos( $content, 'name="heat-pump-electrical-backup-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="458.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Humidifier: Monthly */
add_filter( 'wpcf7_form_elements', 'wholeHouseHumidifierMonthly' );
function wholeHouseHumidifierMonthly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-humidifier-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="5.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Humidifier: Yearly */
add_filter( 'wpcf7_form_elements', 'wholeHouseHumidifierYearly' );
function wholeHouseHumidifierYearly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-humidifier-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="60.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Air Conditioner: Monthly */
add_filter( 'wpcf7_form_elements', 'airConditionerMonthly' );
function airConditionerMonthly( $content ) {
    $str_pos = strpos( $content, 'name="air-conditioner-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="19.09" ', $str_pos, 0 );
    }
    return $content;
}

/** Air Conditioner: Yearly */
add_filter( 'wpcf7_form_elements', 'airConditionerYearly' );
function airConditionerYearly( $content ) {
    $str_pos = strpos( $content, 'name="air-conditioner-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="229.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Air Conditioner w/Watchdog: Monthly */
add_filter( 'wpcf7_form_elements', 'airConditionerWatchdogMonthly' );
function airConditionerWatchdogMonthly( $content ) {
    $str_pos = strpos( $content, 'name="air-conditioner-watchdog-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="27.34" ', $str_pos, 0 );
    }
    return $content;
}

/** Air Conditioner w/Watchdog: Yearly */
add_filter( 'wpcf7_form_elements', 'airConditionerWatchdogYearly' );
function airConditionerWatchdogYearly( $content ) {
    $str_pos = strpos( $content, 'name="air-conditioner-watchdog-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="328.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Dehumidifer: Monthly */
add_filter( 'wpcf7_form_elements', 'dehumidifierMonthly' );
function dehumidifierMonthly( $content ) {
    $str_pos = strpos( $content, 'name="dehumidifier-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="7.09" ', $str_pos, 0 );
    }
    return $content;
}

/** Dehumidifier: Yearly */
add_filter( 'wpcf7_form_elements', 'dehumidifierYearly' );
function dehumidifierYearly( $content ) {
    $str_pos = strpos( $content, 'name="dehumidifier-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="85" ', $str_pos, 0 );
    }
    return $content;
}

/** AC Heat Pump: Monthly */
// add_filter( 'wpcf7_form_elements', 'acHeatPumpMonthly' );
// function acHeatPumpMonthly( $content ) {
//     $str_pos = strpos( $content, 'name="ac-heat-pump-qty"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-monthly="37.33" ', $str_pos, 0 );
//     }
//     return $content;
// }

/** AC Heat Pump: Yearly */
// add_filter( 'wpcf7_form_elements', 'acHeatPumpYearly' );
// function acHeatPumpYearly( $content ) {
//     $str_pos = strpos( $content, 'name="ac-heat-pump-qty"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-yearly="448.00" ', $str_pos, 0 );
//     }
//     return $content;
// }

/** Tankless Water Heater: Monthly */
add_filter( 'wpcf7_form_elements', 'tanklessWaterHeaterMonthly' );
function tanklessWaterHeaterMonthly( $content ) {
    $str_pos = strpos( $content, 'name="tankless-water-heater-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="17.84" ', $str_pos, 0 );
    }
    return $content;
}

/** Tankless Water Heater: Yearly */
add_filter( 'wpcf7_form_elements', 'tanklessWaterHeaterYearly' );
function tanklessWaterHeaterYearly( $content ) {
    $str_pos = strpos( $content, 'name="tankless-water-heater-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="214.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Water Softener: Monthly */
add_filter( 'wpcf7_form_elements', 'waterSoftenerMonthly' );
function waterSoftenerMonthly( $content ) {
    $str_pos = strpos( $content, 'name="water-softener-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="17.84" ', $str_pos, 0 );
    }
    return $content;
}

/** Water Softener: Yearly */
add_filter( 'wpcf7_form_elements', 'waterSoftenerYearly' );
function waterSoftenerYearly( $content ) {
    $str_pos = strpos( $content, 'name="water-softener-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="214.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Backflow Preventer: Monthly */
add_filter( 'wpcf7_form_elements', 'backflowPreventerMonthly' );
function backflowPreventerMonthly( $content ) {
    $str_pos = strpos( $content, 'name="backflow-preventer-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="17.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Backflow Preventer: Yearly */
add_filter( 'wpcf7_form_elements', 'backflowPreventerYearly' );
function backflowPreventerYearly( $content ) {
    $str_pos = strpos( $content, 'name="backflow-preventer-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="204.00" ', $str_pos, 0 );
    }
    return $content;
}

/** UV Light (water): Monthly */
// add_filter( 'wpcf7_form_elements', 'uvLightWaterMonthy' );
// function uvLightWaterMonthy( $content ) {
//     $str_pos = strpos( $content, 'name="uv-light-water-qty"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-monthly="7.50" ', $str_pos, 0 );
//     }
//     return $content;
// }

/** UV Light (water): Yearly */
// add_filter( 'wpcf7_form_elements', 'uvLightWaterYearly' );
// function uvLightWaterYearly( $content ) {
//     $str_pos = strpos( $content, 'name="uv-light-water-qty"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-yearly="90.00" ', $str_pos, 0 );
//     }
//     return $content;
// }

/** Water Filter (other): Monthly */
add_filter( 'wpcf7_form_elements', 'waterFilterOtherMonthly' );
function waterFilterOtherMonthly( $content ) {
    $str_pos = strpos( $content, 'name="water-filter-additional-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="7.92" ', $str_pos, 0 );
    }
    return $content;
}

/** Water Filter (other): Yearly */
add_filter( 'wpcf7_form_elements', 'waterFilterOtherYearly' );
function waterFilterOtherYearly( $content ) {
    $str_pos = strpos( $content, 'name="water-filter-additional-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="95.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Plumbing: Monthly */
add_filter( 'wpcf7_form_elements', 'wholeHousePlumbingMonthly' );
function wholeHousePlumbingMonthly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-plumbing-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="17.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Plumbing: Yearly */
add_filter( 'wpcf7_form_elements', 'wholeHousePlumbingYearly' );
function wholeHousePlumbingYearly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-plumbing-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="204.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Media Filter: Yearly */
add_filter( 'wpcf7_form_elements', 'mediaFilterYearly' );
function mediaFilterYearly( $content ) {
    $str_pos = strpos( $content, 'name="media-filter-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="70.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Media Filter: Monthly */
add_filter( 'wpcf7_form_elements', 'mediaFilterMonthly' );
function mediaFilterMonthly( $content ) {
    $str_pos = strpos( $content, 'name="media-filter-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="5.84" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Electrical: Monthly */
add_filter( 'wpcf7_form_elements', 'wholeHouseElectricalMonthly' );
function wholeHouseElectricalMonthly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-electrical-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="18.25" ', $str_pos, 0 );
    }
    return $content;
}

/** Whole House Electrical: Yearly */
add_filter( 'wpcf7_form_elements', 'wholeHouseElectricalYearly' );
function wholeHouseElectricalYearly( $content ) {
    $str_pos = strpos( $content, 'name="whole-house-electrical-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="219.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Generator Maintenance: Monthly */
add_filter( 'wpcf7_form_elements', 'backupGeneratorMaintenanceMonthly' );
function backupGeneratorMaintenanceMonthly( $content ) {
    $str_pos = strpos( $content, 'name="backup-generator-maintenance-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-monthly="33.25" ', $str_pos, 0 );
    }
    return $content;
}

/** Generator Maintenance: Yearly */
add_filter( 'wpcf7_form_elements', 'backupGeneratorMaintenanceYearly' );
function backupGeneratorMaintenanceYearly( $content ) {
    $str_pos = strpos( $content, 'name="backup-generator-maintenance-qty"' );
    if ( $str_pos !== false ) {
        $content = substr_replace( $content, ' data-yearly="399.00" ', $str_pos, 0 );
    }
    return $content;
}

/** Remote Monitoring / Smart Home Connectivity: Monthly */
// add_filter( 'wpcf7_form_elements', 'smartHomeConnectivityMonthly' );
// function smartHomeConnectivityMonthly( $content ) {
//     $str_pos = strpos( $content, 'value="Remote Monitoring (Smart Home Connectivity)"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-monthly="8.25" ', $str_pos, 0 );
//     }
//     return $content;
// }

/** Remote Monitoring / Smart Home Connectivity: Yearly */
// add_filter( 'wpcf7_form_elements', 'smartHomeConnectivityYearly' );
// function smartHomeConnectivityYearly( $content ) {
//     $str_pos = strpos( $content, 'value="Remote Monitoring (Smart Home Connectivity)"' );
//     if ( $str_pos !== false ) {
//         $content = substr_replace( $content, ' data-yearly="99.00" ', $str_pos, 0 );
//     }
//     return $content;
// }

// Remove <p> and <br/> from Contact Form 7
// add_filter('wpcf7_autop_or_not', '__return_false');

/** Block: Question & Answer */
add_action( 'init', 'register_block_question_answer' );
function register_block_question_answer() {
    register_block_type( __DIR__ . '/blocks/question-answer/block.json' );
}

/** Block: List WYSIWYG */
add_action( 'init', 'register_block_list_wysiwyg' );
function register_block_list_wysiwyg() {
    register_block_type( __DIR__ . '/blocks/list-wysiwyg/block.json' );
}

/** Block: Media Grid */
add_action( 'init', 'register_block_media_grid' );
function register_block_media_grid() {
    register_block_type( __DIR__ . '/blocks/media-grid/block.json' );
}

// /** Block: FAQs */
// add_action( 'init', 'register_block_faq' );
// function register_block_faq() {
//     register_block_type( __DIR__ . '/blocks/faqs/block.json' );
// }

/** Block: CTA Button */
add_action( 'init', 'register_block_cta_button' );
function register_block_cta_button() {
    register_block_type( __DIR__ . '/blocks/cta-button/block.json' );
}

/** Block: Diagonal Image Callout */
add_action( 'init', 'register_block_diagonal_image_callout' );
function register_block_diagonal_image_callout() {
    register_block_type( __DIR__ . '/blocks/diagonal-image-callout/block.json' );
}

/** Block: Reviews */
add_action( 'init', 'register_block_reviews' );
function register_block_reviews() {
    register_block_type( __DIR__ . '/blocks/reviews/block.json' );
}

/** Block: Cards */
add_action( 'init', 'register_block_cards' );
function register_block_cards() {
    register_block_type( __DIR__ . '/blocks/cards/block.json' );
}

/** Block: Icon List Items */
add_action( 'init', 'register_block_icon_list_items' );
function register_block_icon_list_items() {
    register_block_type( __DIR__ . '/blocks/icon-list-items/block.json' );
}

/** Block: Content Divider */
add_action( 'init', 'register_block_content_divider' );
function register_block_content_divider() {
    register_block_type( __DIR__ . '/blocks/content-divider/block.json' );
}

/** Block: Image Section */
add_action( 'init', 'register_block_image_section' );
function register_block_image_section() {
    register_block_type( __DIR__ . '/blocks/image-section/block.json' );
}

/** Block: iFrame */
add_action( 'init', 'register_block_iframe' );
function register_block_iframe() {
    register_block_type( __DIR__ . '/blocks/iframe/block.json' );
}

/** Block: Toggle */
add_action( 'init', 'register_block_toggle' );
function register_block_toggle() {
    register_block_type( __DIR__ . '/blocks/toggle/block.json' );
}

/** Block: Disruptor */
add_action( 'init', 'register_block_disruptor' );
function register_block_disruptor() {
    register_block_type( __DIR__ . '/blocks/disruptor/block.json' );
}

/** Block: Icon Callout */
add_action( 'init', 'register_block_icon_callout' );
function register_block_icon_callout() {
    register_block_type( __DIR__ . '/blocks/icon-callout/block.json' );
}

/** Block: Membership Table */
add_action( 'init', 'register_block_membership_table' );
function register_block_membership_table() {
    register_block_type( __DIR__ . '/blocks/membership-table/block.json' );
}

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

/** 
 * Gravity Forms: Add fieldset for heating equipment selections
*/

add_filter( 'gform_field_container_10', 'heating_equipment_selections_fieldset', 10, 6 );
function heating_equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 40  ) {
            $fieldset_classes = array(
                'heating-equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 46 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

/** 
 * Gravity Forms: Add fieldset for all equipment selections
 */

add_filter( 'gform_field_container_10', 'equipment_selections_fieldset', 10, 6 );
function equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 40  ) {
            $fieldset_classes = array(
                'equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">All<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 58 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}



/** 
 * Gravity Forms: Add fieldset for air conditioning equipment selections
*/

add_filter( 'gform_field_container_10', 'ac_equipment_selections_fieldset', 2, 6 );
function ac_equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 47  ) {
            $fieldset_classes = array(
                'ac-equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 39 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

/** 
 * Gravity Forms: Add fieldset for electrical conditioning equipment selections
*/

add_filter( 'gform_field_container_10', 'electrical_equipment_selections_fieldset', 2, 6 );
function electrical_equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 48  ) {
            $fieldset_classes = array(
                'electrical-equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 50 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

/** 
 * Gravity Forms: Add fieldset for plumbing conditioning equipment selections
*/

add_filter( 'gform_field_container_10', 'plumbing_equipment_selections_fieldset', 2, 6 );
function plumbing_equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 51  ) {
            $fieldset_classes = array(
                'plumbing-equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 56 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

/** 
 * Gravity Forms: Add fieldset for additional name and address information
*/

add_filter( 'gform_field_container_10', 'addtional_information_fieldset', 2, 6 );
function addtional_information_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 73  ) {
            $fieldset_classes = array(
                'additional-information-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 76 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

// gform.addFilter('gppt_swiper_options', function (options) {
//     options.on.slideChange = function () {
//         window.scroll({
//             top: 0,
//             left: 0,
//             behavior: 'smooth'
//         });
//     }
	
//     return options;
// });

/** 
 * Gravity Forms: Add fieldset for additional conditioning equipment selections
*/

add_filter( 'gform_field_container_10', 'additional_equipment_selections_fieldset', 2, 6 );
function additional_equipment_selections_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
        if( $field->id == 57  ) {
            $fieldset_classes = array(
                'additional-equipment-selections-fieldset'
            );
            $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
                <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
            return $new_fieldset_start . $field_container;
        }elseif($field->id == 58 ) {
            return $field_container . '</fieldset>';
        }
    return $field_container;
}

/**
 * Pre submission test
*/

/** 
 * Gravity Forms: Add fieldset for total
*/

// add_filter( 'gform_field_container_4', 'estiamted_total_fieldset', 2, 6 );
// function estiamted_total_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
//         if( $field->id == 59  ) {
//             $fieldset_classes = array(
//                 'estimated-total-fieldset'
//             );
//             $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
//                 <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
//             return $new_fieldset_start . $field_container;
//         }elseif($field->id == 62 ) {
//             return $field_container . '</fieldset>';
//         }
//     return $field_container;
// }

/** 
 * Gravity Forms: Add fieldset for totals each
*/

// add_filter( 'gform_field_container_4', 'estiamted_totals_each_fieldset', 2, 6 );
// function estiamted_totals_each_fieldset( $field_container, $field, $form, $css_class, $style, $field_content ) {
//         if( $field->id == 59  ) {
//             $fieldset_classes = array(
//                 'estimated-totals-each-fieldset'
//             );
//             $new_fieldset_start = '<fieldset class="' . implode(' ', $fieldset_classes) . '">
//                 <legend class="gfield_label gfield_label_before_complex">Your Information<span class="gfield_required"><span class="gfield_required gfield_required_text">(Required)</span></span></legend>';
//             return $new_fieldset_start . $field_container;
//         }elseif($field->id == 67 ) {
//             return $field_container . '</fieldset>';
//         }
//     return $field_container;
// }

// add_filter( 'gform_confirmation_anchor', function() {
//     return 20;
// } );