<?php
/*Slider Options*/
$GLOBALS['aroid_theme_options'] = aroid_get_options_value();

$wp_customize->add_section( 'aroid_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'aroid' ),
   'panel' 		 => 'aroid_panel',
) );

/*callback functions slider*/
if ( !function_exists('aroid_slider_active_callback') ) :
  function aroid_slider_active_callback(){
      global $aroid_theme_options;
      $enable_slider = absint($aroid_theme_options['aroid_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'aroid_options[aroid_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aroid_enable_slider'],
   'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control(
    'aroid_options[aroid_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'aroid' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'aroid'),
       'section'   => 'aroid_slider_section',
       'settings'  => 'aroid_options[aroid_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'aroid_options[aroid-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Aroid_Customize_Category_Dropdown_Control(
        $wp_customize,
        'aroid_options[aroid-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'aroid' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'aroid'),
            'section'   => 'aroid_slider_section',
            'settings'  => 'aroid_options[aroid-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'aroid_slider_active_callback',
        )
    )

);

/*Header Search Enable Option*/
$wp_customize->add_setting( 'aroid_options[aroid_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid_enable_search'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control( 'aroid_options[aroid_enable_search]', array(
    'label'     => __( 'Enable Search', 'aroid' ),
    'description' => __('It will help to display the search in Menu.', 'aroid'),
    'section'   => 'aroid_slider_section',
    'settings'  => 'aroid_options[aroid_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'aroid_slider_active_callback',

) );
/*Search Placeholder*/
$wp_customize->add_setting( 'aroid_options[aroid_search_placeholder]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid_search_placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'aroid_options[aroid_search_placeholder]', array(
    'label'     => __( 'Search form Placeholder', 'aroid' ),
    'description' => __('Enter Search Placeholder Text here.', 'aroid'),
    'section'   => 'aroid_slider_section',
    'settings'  => 'aroid_options[aroid_search_placeholder]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'aroid_slider_active_callback',
) );