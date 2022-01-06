<?php
/**
 * Display related posts from same category
 *
 * @since Aroid 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('aroid_related_post')) :
    
    function aroid_related_post($post_id)
    {
        
        global $aroid_theme_options;
        $title = esc_html($aroid_theme_options['aroid-single-page-related-posts-title']);
        if (0 == $aroid_theme_options['aroid-single-page-related-posts']) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>
                <div class="related-posts clearfix">
                    <h2 class="widget-title">
                        <?php echo $title; ?>
                    </h2>
                    <div class="related-posts-list">
                        <?php
                        $aroid_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $aroid_featured_query = new WP_Query($aroid_cat_post_args);
                        
                        while ($aroid_featured_query->have_posts()) : $aroid_featured_query->the_post();
                            ?>
                            <div class="show-3-related-posts">
                                <div class="post-wrap">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <?php
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src( $image_id,'',true );
                                         ?>
                                        <figure class="post-media">
                                            <a href="<?php the_permalink() ?>" class="post-image" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
                                            </a>
                                        </figure>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="post-content">
                                        <h2 class="post-title entry-title"><a
                                                    href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>                                      
                                            <div class="post-date">
                                                <div class="entry-meta">
                                                <i class="fa fa-user-o"></i><?php  aroid_posted_by(); ?>
                                                <i class="fa fa-calendar-o"></i><?php aroid_posted_on(); ?>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('aroid_related_posts', 'aroid_related_post', 10, 1);