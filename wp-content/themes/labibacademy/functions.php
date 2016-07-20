<?php




include( dirname( __FILE__ ) . '/inc/apf/admin-page-framework.php' );
if ( ! class_exists( 'hub_AdminPageFramework' ) ) { return; }

include( dirname( __FILE__ ) . '/inc/dash.php' );



function dash($section,$field,$default){
	$data = hub_AdminPageFramework::getOption( 'dash', array( $section, $field ), $default );
	return $data;
}


include( get_template_directory() . "/inc/class-Upbootwp_Walker_Nav_Menu.php" );

// Setting up Content Width
if ( ! isset( $content_width ) ){
	$content_width = 660;
}


// Theme Setup
if ( ! function_exists( 'labibacademy_setup' ) ) :
function labibacademy_setup(){

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' )
	) );

}
endif;
add_action( 'after_setup_theme', 'labibacademy_setup' );

// Register widget area.
function labibacademy_widgets_init(){
	register_sidebar( array(
		'name'          => __( 'Widget Area' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.' ),
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="text-uppercase"><b>',
		'after_title'   => '</b></h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home news Area' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Home news Area.' ),
		'before_widget' => '',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="heading h4 text-center"><b>',
		'after_title'   => ' </b></div><div class="item clearfix">',
	) );
}
add_action( 'widgets_init', 'labibacademy_widgets_init' );

// Enqueue scripts and styles.
function labibacademy_scripts(){

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'BootStrap', 	get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.2' );
	wp_enqueue_style( 'Style', 		get_template_directory_uri() . '/css/style.css', array(), '3.2' );
	
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', 	get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', 	get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );
	
	wp_enqueue_script( 'BootStrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20150330', true );
	wp_enqueue_script( 'WebTicker', get_template_directory_uri() . '/js/jquery.webticker.js', array( 'jquery' ), '20150332', true );
	wp_enqueue_script( 'Script', 	get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20150333', true );
	
}
add_action( 'wp_enqueue_scripts', 'labibacademy_scripts' );



function wp_bootstrap_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous' ),
        'next_string'     => __( 'Next' ),
        'before_output'   => '<div class="post-nav"><ul class="pager">',
        'after_output'    => '</ul></div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', 'text-domain' ) . '</a></li>';
    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage ) {
        $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
    }
    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}
