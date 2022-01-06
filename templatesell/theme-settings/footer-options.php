<?php
/*Footer Options*/
$wp_customize->add_section('aroid_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'aroid'),
    'panel' => 'aroid_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('aroid_options[aroid-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aroid_options[aroid-footer-copyright]', array(
    'label' => __('Copyright Text', 'aroid'),
    'description' => __('Enter your own copyright text.', 'aroid'),
    'section' => 'aroid_footer_section',
    'settings' => 'aroid_options[aroid-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
