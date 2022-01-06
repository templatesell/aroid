<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Aroid 1.0.0
 *
 */
if (!function_exists('aroid_masonry_start')) :
    function aroid_masonry_start()
    { ?>
        <div class="masonry-start"><div id="masonry-loop">
        
        <?php
    }
endif;
add_action('aroid_masonry_start_hook', 'aroid_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Aroid 1.0.0
 *
 */
if (!function_exists('aroid_masonry_end')) :
    function aroid_masonry_end()
    { ?>
        </div>
        </div>
        
        <?php
    }
endif;
add_action('aroid_masonry_end_hook', 'aroid_masonry_end', 10, 1);