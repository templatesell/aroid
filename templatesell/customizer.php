<?php
/**
 * Aroid Theme Customizer
 *
 * @package Aroid
 */

if ( !function_exists('aroid_default_theme_options_values') ) :

    function aroid_default_theme_options_values() {

        $default_theme_options = array(

          /*Logo Options*/
          'aroid_logo_width_option' => '600',

            /*Header Image*/
            'aroid_enable_header_image_overlay'=> 0,
            'aroid_slider_overlay_color'=> '#000000',
            'aroid_slider_overlay_transparent'=> '0.1',
            'aroid_header_image_height'=> '100',

           /*Header Options*/
           'aroid_enable_top_header_social'=> 0,
            'aroid_enable_search'  => 0,
            'aroid_search_placeholder'=> esc_html__('Search','aroid'),

            /*Colors Options*/
            'aroid_primary_color'              => '#ec407a',

            /*Slider Options*/
            'aroid_enable_slider'      => 1,
            'aroid-select-category'    => 0,
    
            /*Boxes Section */
            'aroid_enable_promo'       => 0,
            'aroid-promo-select-category'=> 0,
            
            /*Blog Page*/
            'aroid-sidebar-blog-page' => 'no-sidebar',
            'aroid-column-blog-page'  => 'masonry-post',
            'aroid-blog-image-layout' => 'full-image',
            'aroid-content-show-from' => 'excerpt',
            'aroid-excerpt-length'    => 25,
            'aroid-pagination-options'=> 'ajax',
            'aroid-blog-exclude-category'=> '',
            'aroid-read-more-text'    => '',
            'aroid-show-hide-share'   => 1,
            'aroid-show-hide-category'=> 1,
            'aroid-show-hide-date'=> 1,
            'aroid-show-hide-author'=> 1,

            /*Single Page */
            'aroid-single-page-featured-image' => 1,
            'aroid-single-page-related-posts'  => 0,
            'aroid-single-page-related-posts-title' => esc_html__('Related Posts','aroid'),
            'aroid-sidebar-single-page'=> 'single-right-sidebar',
            'aroid-single-social-share' => 1,


            /*Sticky Sidebar*/
            'aroid-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'aroid-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2021','aroid'),

            /*Breadcrumb Options*/
            'aroid-extra-breadcrumb' => 1,
            'aroid-breadcrumb-selection-option'=> 'theme',

        );
return apply_filters( 'aroid_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Aroid Theme Options and Settings
 *
 * @since Aroid 1.0.0
 *
 * @param null
 * @return array aroid_get_options_value
 *
 */
if ( !function_exists('aroid_get_options_value') ) :
    function aroid_get_options_value() {
        $aroid_default_theme_options_values = aroid_default_theme_options_values();
        $aroid_get_options_value = get_theme_mod( 'aroid_options');
        if( is_array( $aroid_get_options_value )){
            return array_merge( $aroid_default_theme_options_values, $aroid_get_options_value );
        }
        else{
            return $aroid_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aroid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'aroid_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'aroid_customize_partial_blogdescription',
     ) );
  }
  $default = aroid_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'aroid_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aroid_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aroid_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aroid_customize_preview_js() {
	wp_enqueue_script( 'aroid-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'aroid_customize_preview_js' );

/*
** Customizer Styles
*/
function aroid_panels_css() {
     wp_enqueue_style('aroid-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'aroid_panels_css' );