<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aroid
 */
global $aroid_theme_options;
$show_content_from = esc_attr($aroid_theme_options['aroid-content-show-from']);
$read_more = esc_html($aroid_theme_options['aroid-read-more-text']);
$masonry = esc_attr($aroid_theme_options['aroid-column-blog-page']);
$image_location = esc_attr($aroid_theme_options['aroid-blog-image-layout']);
$social_share = absint($aroid_theme_options['aroid-show-hide-share']);
$date = absint($aroid_theme_options['aroid-show-hide-date']);
$category = absint($aroid_theme_options['aroid-show-hide-category']);
$author = absint($aroid_theme_options['aroid-show-hide-author']);
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src( $image_id,'',true );
$classes = array(
    $masonry,
    'item-blog',
);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <a href="<?php the_permalink(); ?>" class="post-image" style="background-image: url(<?php echo esc_url($image_url[0]);?>)"></a>
                
            </div>
        <?php } ?>
        <div class="post-content post-overly">
            
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-between">
                <div class="post-meta">
                    <?php
                    if ('post' === get_post_type()) :
                        ?>
                        <div class="post-date">
                            <div class="entry-meta">
                                <?php
                                if($author == 1 ){
                                    ?>
                                    <i class="fa fa-user-o"></i>
                                  <?php
                                    aroid_posted_by();
                                }
                                ?>
                            </div><!-- .entry-meta -->
                        </div>
                    <?php endif; ?>
                </div>
                <?php if($category == 1 ){ ?>
                    <div class="post-cats">
                        <?php aroid_entry_meta(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</article><!-- #post- -->