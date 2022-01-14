<?php
/**
 * TukiTwo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TukiTwo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tukitwo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tukitwo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TukiTwo, use a find and replace
		 * to change 'tukitwo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tukitwo', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'tukitwo' ),
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
				'tukitwo_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'tukitwo_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tukitwo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tukitwo_content_width', 640 );
}
add_action( 'after_setup_theme', 'tukitwo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tukitwo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar-1', 'tukitwo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tukitwo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s trending-posts">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	
}
add_action( 'widgets_init', 'tukitwo_widgets_init' );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
 }
 add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Enqueue scripts and styles.
 */
function tukitwo_scripts() {
    wp_enqueue_style( 'tukitwo-Animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-Fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-Magnific-Popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-Slick', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-Nice-Select', get_template_directory_uri() . '/assets/css/jquery-nice-select.min.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-icon', 'https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css', array(), _S_VERSION);
    wp_enqueue_style( 'tukitwo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tukitwo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tukitwo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-load', get_template_directory_uri() . '/js/ajaxLoadMore.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.6.0.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'tukitwo-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true );

    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tukitwo_scripts' );

//function google_fonts() {
   // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Poppins:wght@200;300;400;500;600;700;900&display=swap', false );
//}
//add_action( 'wp_enqueue_scripts', 'google_fonts' );


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
 * Customizer additions.
 */
require get_template_directory() . '/inc/tuki-comments.php';
/**
 * Plugin-installer.
 */
require get_template_directory() . '/inc/Plugin-installer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Get current year with shortcode.
 */
function currentYear($atts){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );




//load more button
function tukitwo_pagination() {

    global $wp_query;
    
    if ( $wp_query->max_num_pages <= 1 ) return; 
    
    $big = 999999999; // need an unlikely integer
    
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_text'          => __( '<' ),
            'next_text'          => __( '>' ),
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagination center"><ul>';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
            }
    }