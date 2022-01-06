<?php
/**
 * Dynamic css
 *
 * @since Aroid 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('aroid_dynamic_css')) :

    function aroid_dynamic_css()
    {
        global $aroid_theme_options;

        /* Color Options Options */
        $aroid_primary_color              = esc_attr($aroid_theme_options['aroid_primary_color']);
        $aroid_logo_width              = absint($aroid_theme_options['aroid_logo_width_option']);
        
        $aroid_header_overlay  = esc_attr($aroid_theme_options['aroid_slider_overlay_color']);
        $aroid_header_transparent  = esc_attr($aroid_theme_options['aroid_slider_overlay_transparent']);
        $aroid_header_min_height              = absint($aroid_theme_options['aroid_header_image_height']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($aroid_primary_color)) {
            $custom_css .= "
            #toTop,
            .comment-form #submit{ 
                background-color: ". $aroid_primary_color."; 
                border-color: ".$aroid_primary_color.";
            }";

        }
        //Primary Color
        if (!empty($aroid_primary_color)) {
            $custom_css .= "
            #author:hover, 
            #email:hover, 
            #url:hover, 
            #comment:hover,
            #author:active, 
            #email:active, 
            #url:active, 
            #comment:active, 
            #author:focus, 
            #email:focus, 
            #url:focus, 
            #comment:focus{
                border-color:".$aroid_primary_color.";
            }";
         }
        //Primary Color
        if (!empty($aroid_primary_color)) {
            $custom_css .= "
            .site-footer a:hover, 
            .site-footer a:focus,
            .entry-content h1 a, 
            .entry-content h2 a, 
            .entry-content h3 a, 
            .entry-content h4 a, 
            .entry-content h5 a, 
            .entry-content h6 a, 
            .entry-content li a, 
            .entry-content p a, 
            .entry-content a,
            .comment-meta .comment-author .fn .url:hover, 
            .comment-meta .comment-author .fn .url:focus,
            ul.trail-items li a:hover span,
            .post-tags i,
            .comment-meta .comment-metadata a:hover, 
            .comment-meta .comment-metadata a:focus,
            .widget a:hover, 
            .widget a:focus,
            .footer-menu li a:hover, 
            .footer-menu li a:focus, 
            .main-menu ul li.current-menu-item>a, 
            .main-menu ul li:hover>a{ 
                color : ". $aroid_primary_color."; 
            }";
        }

        //Logo Width
        if (!empty($aroid_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $aroid_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($aroid_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $aroid_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($aroid_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $aroid_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($aroid_header_min_height)) {
            $custom_css .= "
            .header-1 .header-image .head_one { 
                min-height : ". $aroid_header_min_height."px; 
            }";
        }

        wp_add_inline_style('aroid-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'aroid_dynamic_css', 99);