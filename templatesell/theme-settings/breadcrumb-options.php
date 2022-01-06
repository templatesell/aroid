<?php 
/*Extra Options*/

$wp_customize->add_section( 'aroid_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'aroid' ),
    'panel'          => 'aroid_panel',
) );



/*Breadcrumb Enable*/
$wp_customize->add_setting( 'aroid_options[aroid-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid-extra-breadcrumb'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control( 'aroid_options[aroid-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'aroid' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'aroid' ),
    'section'   => 'aroid_extra_options',
    'settings'  => 'aroid_options[aroid-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions related posts*/
if (!function_exists('aroid_breadcrumb_callback')) :
    function aroid_breadcrumb_callback()
    {
        global $aroid_theme_options;
        $breadcrumb = absint($aroid_theme_options['aroid-extra-breadcrumb']);
        if (1 == $breadcrumb) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select Breadcrumb From*/
$wp_customize->add_setting('aroid_options[aroid-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-breadcrumb-selection-option'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control('aroid_options[aroid-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme' => __('Theme Default', 'aroid'),
        'yoast' => __('Yoast Plugin', 'aroid'),
        'rankmath' => __('Rank Math Plugin', 'aroid'),
        'navxt' => __('NavXT Plugin', 'aroid'),
    ),
    'label' => __('Select Breadcrumb From', 'aroid'),
    'description' => __('You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use plugin Breadcrumb.', 'aroid'),
    'section' => 'aroid_extra_options',
    'settings' => 'aroid_options[aroid-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
    'active_callback'=>'aroid_breadcrumb_callback',
));