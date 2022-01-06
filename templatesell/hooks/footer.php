<?php
/**
 * Goto Top functions
 *
 * @since Aroid 1.0.0
 *
 */

if (!function_exists('aroid_go_to_top')) :
    function aroid_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'aroid'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
<?php
    } endif;
add_action('aroid_go_to_top_hook', 'aroid_go_to_top', 10, 1);