<?php
/*Header Options*/
$wp_customize->add_section('aroid_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'aroid'),
    'panel' => 'aroid_panel',
));

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'aroid_options[aroid_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['aroid_enable_top_header_social'],
   'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control( 'aroid_options[aroid_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'aroid' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'aroid'),
   'section'   => 'aroid_header_section',
   'settings'  => 'aroid_options[aroid_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );