<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('aroid_social_sharing')) :
    function aroid_social_sharing($post_id)
    {
        $aroid_url = get_the_permalink($post_id);
        $aroid_title = get_the_title($post_id);
        $aroid_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $aroid_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $aroid_title . '&url=' . $aroid_url);
        $aroid_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $aroid_url);
        $aroid_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $aroid_url . '&media=' . $aroid_image . '&description=' . $aroid_title);
        $aroid_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $aroid_title . '&url=' . $aroid_url);
        
        ?>
        
        <div class="post-share">
            <span class="btn-text">Share</span>
            <span class="btn-icon"><i class="fa fa-share-alt"></i></span>
            <ul class="share-icons">
                <li>
                <a target="_blank" href="<?php echo $aroid_facebook_sharing_url; ?>">
                    <i class="fa fa-facebook"></i>
                </a>
                </li>
                <li>
                    <a target="_blank" href="<?php echo $aroid_twitter_sharing_url; ?>">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="<?php echo $aroid_pinterest_sharing_url; ?>">
                        <i class="fa fa-pinterest"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="<?php echo $aroid_linkedin_sharing_url; ?>">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
            </ul>
        </div>
        <?php
    }
endif;
add_action('aroid_social_sharing', 'aroid_social_sharing', 10);