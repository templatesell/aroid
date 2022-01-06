<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('aroid_breadcrumb_options')) :
    function aroid_breadcrumb_options()
    {
        global $aroid_theme_options;
        $breadcrumbs = absint($aroid_theme_options['aroid-extra-breadcrumb']);
        $breadcrumb_from = esc_attr($aroid_theme_options['aroid-breadcrumb-selection-option']);        

        if ( $breadcrumbs == 1 && $breadcrumb_from == 'theme' ) {
            aroid_breadcrumbs();
        }elseif($breadcrumbs == 1 &&  $breadcrumb_from == 'yoast' && (function_exists('yoast_breadcrumb'))){
            yoast_breadcrumb();
        }elseif($breadcrumbs == 1 && 'rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif($breadcrumbs == 1 && 'navxt' == $breadcrumb_from && (function_exists('bcn_display'))){
            bcn_display();
        }else{
            //do nothing
        }
    }
endif;
add_action('aroid_breadcrumb_options_hook', 'aroid_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('aroid_breadcrumbs')):
    function aroid_breadcrumbs()
    {
        if (!function_exists('aroid_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        aroid_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('aroid_breadcrumbs_hook', 'aroid_breadcrumbs');