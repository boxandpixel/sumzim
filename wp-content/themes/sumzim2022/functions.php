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
	// wp_enqueue_style( ' sumzim-style', get_stylesheet_uri(), array(), sumzim_VERSION );

	
	$rand = rand( 0, 999999999999 );
	wp_enqueue_style( 'home-styles', get_template_directory_uri() . '/dist/site.css', $rand);
	wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/dist/site.js', $rand);
	
	wp_style_add_data( ' sumzim-style', 'rtl', 'replace' );

	wp_enqueue_script( ' sumzim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), sumzim_VERSION, true );

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
		'page_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	

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
add_filter( 'wpseo_frontend_presentation', 'custom_og_image_for_spdirect_presentation', 99 );

function custom_og_image_for_spdirect_presentation( $presentation ) {
    // Check if the spdirect parameter exists and we're on the front page
    if ( isset( $_GET['spdirect'] ) && is_front_page() ) {
        $presentation->open_graph_images = [
            [
                'url' => 'https://sumzim.com/wp-content/uploads/2025/12/og-image-spdirect@2x.webp',
            ]
        ];
    }
    
    return $presentation;
}
