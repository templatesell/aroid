<?php
/*Blog Page Options*/
$wp_customize->add_section('aroid_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'aroid'),
    'panel' => 'aroid_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('aroid_options[aroid-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-sidebar-blog-page'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control( new Aroid_Radio_Image_Control(
        $wp_customize,
    'aroid_options[aroid-sidebar-blog-page]', array(
    'choices' => aroid_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'aroid'),
    'description' => __('This sidebar will work blog and archive pages.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('aroid_options[aroid-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-column-blog-page'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control('aroid_options[aroid-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'aroid'),
        'masonry-post' => __('Masonry Layout', 'aroid'),
    
    ),
    'label' => __('Blog Layout Options', 'aroid'),
    'description' => __('Change your blog or archive page layout.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('aroid_options[aroid-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-blog-image-layout'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control('aroid_options[aroid-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'aroid'),
        'left-image' => __('Grid Layout', 'aroid'),
    
    ),
    'label' => __('Blog Page Layout', 'aroid'),
    'description' => __('This will work only on Full layout Option', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('aroid_options[aroid-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-content-show-from'],
    'sanitize_callback' => 'aroid_sanitize_select'
));

$wp_customize->add_control('aroid_options[aroid-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'aroid'),
        'content' => __('Show from Content', 'aroid'),
    ),
    'label' => __('Select Content Display From', 'aroid'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('aroid_options[aroid-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('aroid_options[aroid-excerpt-length]', array(
    'label' => __('Excerpt Length', 'aroid'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('aroid_options[aroid-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aroid_options[aroid-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'aroid'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('aroid_options[aroid-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-pagination-options'],
    'sanitize_callback' => 'aroid_sanitize_select'

));

$wp_customize->add_control('aroid_options[aroid-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'aroid'),
        'ajax' => __('Ajax Pagination', 'aroid'),
    ),
    'label' => __('Pagination Types', 'aroid'),
    'description' => __('Choose Required Pagination Type', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('aroid_options[aroid-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('aroid_options[aroid-read-more-text]', array(
    'label' => __('Read More Text', 'aroid'),
    'description' => __('Read more text for blog and archive page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('aroid_options[aroid-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-show-hide-share'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-show-hide-share]', array(
    'label' => __('Show Social Share', 'aroid'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('aroid_options[aroid-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-show-hide-category'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-show-hide-category]', array(
    'label' => __('Show Category', 'aroid'),
    'description' => __('Option to hide the category on the blog page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('aroid_options[aroid-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-show-hide-date'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-show-hide-date]', array(
    'label' => __('Show Date', 'aroid'),
    'description' => __('Option to hide the date on the blog page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('aroid_options[aroid-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['aroid-show-hide-author'],
    'sanitize_callback' => 'aroid_sanitize_checkbox'
));

$wp_customize->add_control('aroid_options[aroid-show-hide-author]', array(
    'label' => __('Show Author', 'aroid'),
    'description' => __('Option to hide the author on the blog page.', 'aroid'),
    'section' => 'aroid_blog_page_section',
    'settings' => 'aroid_options[aroid-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

