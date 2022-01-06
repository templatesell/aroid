<?php
/**
 * Post Navigation Function
 *
 * @since Aroid 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('aroid_posts_navigation')) :
    function aroid_posts_navigation()
    {
        global $aroid_theme_options;
        $aroid_pagination_option = $aroid_theme_options['aroid-pagination-options'];
        if ('numeric' == $aroid_pagination_option) {
            echo "<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'aroid'),
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'aroid'),
            ));
            echo "</div>";
        } elseif ('ajax' == $aroid_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if(paginate_links()) {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('View More', 'aroid') . "</div><div id='free-temp-post'></div></div>";
            }
            } else {
            return false;
        }
    }
endif;
add_action('aroid_action_navigation', 'aroid_posts_navigation', 10);