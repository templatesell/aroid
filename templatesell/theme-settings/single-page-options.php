<?php
$GLOBALS['aroid_theme_options'] = aroid_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('aroid_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'aroid'),
    'panel' => 'aroid_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('aroid_options[aroid-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-single-page-featured-image'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'aroid'),
    'description' => __('You can hide images on single post from here.', 'aroid'),
    'section' => 'aroid_single_page_section',
    'settings' => 'aroid_options[aroid-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('aroid_options[aroid-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-sidebar-single-page'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control( 
    new Aroid_Radio_Image_Control(
        $wp_customize,
    'aroid_options[aroid-sidebar-single-page]', array(
    'choices' => aroid_sidebar_position_array(),
    'label' => __('Select Sidebar', 'aroid'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'aroid'),
    'section' => 'aroid_single_page_section',
    'settings' => 'aroid_options[aroid-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('aroid_options[aroid-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-single-page-related-posts'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-single-page-related-posts]', array(
    'label' => __('Related Posts', 'aroid'),
    'description' => __('2 posts of same category will appear.', 'aroid'),
    'section' => 'aroid_single_page_section',
    'settings' => 'aroid_options[aroid-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('aroid_related_post_callback')) :
    function aroid_related_post_callback()
    {
        global $aroid_theme_options;
        $related_posts = absint($aroid_theme_options['aroid-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('aroid_options[aroid-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aroid_options[aroid-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'aroid'),
    'description' => __('Enter the suitable title.', 'aroid'),
    'section' => 'aroid_single_page_section',
    'settings' => 'aroid_options[aroid-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'aroid_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('aroid_options[aroid-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-single-social-share'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-single-social-share]', array(
    'label' => __('Social Sharing', 'aroid'),
    'description' => __('Enable Social Sharing on Single Posts.', 'aroid'),
    'section' => 'aroid_single_page_section',
    'settings' => 'aroid_options[aroid-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
