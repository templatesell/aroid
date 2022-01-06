<?php 
/*Logo Width*/
$wp_customize->add_setting( 'aroid_options[aroid_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['aroid_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'aroid_options[aroid_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'aroid' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'aroid'),
   'section'   => 'title_tagline',
   'settings'  => 'aroid_options[aroid_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );