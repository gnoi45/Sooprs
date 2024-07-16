<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
/**
 * Loads the child theme textdomain.
 */
function drift_blog_load_language() {
    load_child_theme_textdomain( 'drift-blog' );
}
add_action( 'after_setup_theme', 'drift_blog_load_language' );

/**
 * Gist functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gist
 */
if ( ! function_exists( 'drift_blog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function drift_blog_setup() {

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'top-menu' => esc_html__( 'Top Menu', 'drift-blog' ),

        ) );
    }
endif;
add_action( 'after_setup_theme', 'drift_blog_setup' );

/**
* Enqueue Style
*/
add_action( 'wp_enqueue_scripts', 'drift_blog_style' );
function drift_blog_style() {
	wp_enqueue_style( 'gist-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'drift-blog-style',get_stylesheet_directory_uri() . '/style.css',array('gist-style'));
	wp_enqueue_style('drift-blog-google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display');

    wp_enqueue_script( 'drift-blog-custom', get_stylesheet_directory_uri() . '/js/drift-blog-custom.js', array('jquery'), '20151215', true );
}
/**
 * Gist Theme Customizer default value
 *
 * @package Gist
 */
if ( !function_exists('gist_default_theme_options') ) :
    function gist_default_theme_options() {

        $default_theme_options = array(
            'gist-header-social' => 0,
        	'gist_primary_color' => '#ca9b52',
            'gist-footer-copyright'=> esc_html__('All Rights Reserved 2020','drift-blog'),
            'gist-footer-gototop' => 1,
            'gist-sticky-sidebar'=> 1,
            'gist-sidebar-options'=>'right-sidebar',
            'gist-font-url'=> esc_url('//fonts.googleapis.com/css?family=Open+Sans', 'drift-blog'),
            'gist-font-family' => esc_html__('Open Sans','drift-blog'),
            'gist-font-size'=> 16,
            'gist-font-line-height'=> 2,
            'gist-letter-spacing'=> 0,
            'gist-blog-excerpt-options'=> 'excerpt',
            'gist-blog-excerpt-length'=> 25,
            'gist-blog-featured-image'=> 'left-image',
            'gist-blog-meta-options'=> 0,
            'gist-blog-read-more-options' => esc_html__('Continue Reading','drift-blog'),
            'gist-blog-pagination-type-options'=>'numeric',
            'gist-related-post'=> 1,
            'gist-single-featured'=> 1,
            'gist-footer-social' => 0,
            'gist-extra-breadcrumb' => 1,
            'gist-breadcrumb-text' => esc_html__('You Are Here','drift-blog'),
            'gist-breadcrumb-display-from-option'=> 'theme-default',
            'gist-breadcrumb-display-from-plugins'=>'yoast'
        );
        return apply_filters( 'gist_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function drift_blog_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'drift-blog'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'drift-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'drift-blog'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'drift-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'drift-blog'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'drift-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 4', 'drift-blog'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'drift-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'drift_blog_widgets_init');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function drift_blog_customize_register( $wp_customize ) {

    $default = gist_default_theme_options();

    /*Header Options*/
        $wp_customize->add_section( 'gist_header_section', array(
            'priority'       => 15,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Header Options', 'drift-blog' ),
            'panel'          => 'gist_panel',
        ) );
        $wp_customize->add_setting( 'gist_theme_options[gist-header-social]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['gist-header-social'],
            'sanitize_callback' => 'gist_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'gist_theme_options[gist-header-social]', array(
            'label'     => __( 'Social Icons', 'drift-blog' ),
            'description' => __('Enable Social Icons on Header', 'drift-blog'),
            'section'   => 'gist_header_section',
            'settings'  => 'gist_theme_options[gist-header-social]',
            'type'      => 'checkbox',
            'priority'  => 25
        ) );
    }
add_action( 'customize_register', 'drift_blog_customize_register' );