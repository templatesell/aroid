<?php 
/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'aroid_options[aroid_primary_color]',
    array(
        'default'           => $default['aroid_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'aroid_options[aroid_primary_color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'aroid' ),
            'description' => esc_html__( 'Change your whole site color from here. More are available in premium version.', 'aroid' ),
            'section'     => 'colors',  
        )
    )
);

