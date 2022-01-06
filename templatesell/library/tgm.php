<?php
/**
 * Recommended plugins
 *
 * @package Aroid 1.0.0
 */

if ( ! function_exists( 'aroid_recommended_plugins' ) ) :

    /**
     * Recommend plugin list.
     *
     * @since 1.0.0
     */
    function aroid_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => __( 'Modula Image Gallery', 'aroid' ),
                'slug'     => 'modula-best-grid-gallery',
                'required' => false,
            ),
            array(
                'name'     => __( 'Instagram Feed', 'aroid' ),
                'slug'     => 'instagram-feed',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'aroid_recommended_plugins' );
