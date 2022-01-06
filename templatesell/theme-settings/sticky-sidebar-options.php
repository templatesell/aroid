<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'aroid_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'aroid' ),
   'panel' 		 => 'aroid_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'aroid_options[aroid-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid-enable-sticky-sidebar'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
) );

$wp_customize->add_control( 'aroid_options[aroid-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'aroid' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'aroid'),
    'section'   => 'aroid_sticky_sidebar',
    'settings'  => 'aroid_options[aroid-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );