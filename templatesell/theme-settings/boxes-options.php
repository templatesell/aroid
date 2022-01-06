<?php
/*Promo Section Options*/
$GLOBALS['aroid_theme_options'] = aroid_get_options_value();
$wp_customize->add_section( 'aroid_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'aroid' ),
    'panel'          => 'aroid_panel',
) );

/*callback functions slider*/
if ( !function_exists('aroid_promo_active_callback') ) :
    function aroid_promo_active_callback(){
        global $aroid_theme_options;
        $enable_promo = absint($aroid_theme_options['aroid_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'aroid_options[aroid_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid_enable_promo'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control( 'aroid_options[aroid_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'aroid' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'aroid'),
    'section'   => 'aroid_promo_section',
    'settings'  => 'aroid_options[aroid_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'aroid_options[aroid-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Aroid_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aroid_options[aroid-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'aroid' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'aroid'),
            'section'   => 'aroid_promo_section',
            'settings'  => 'aroid_options[aroid-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'aroid_promo_active_callback'
        )
    )
);