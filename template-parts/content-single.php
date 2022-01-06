<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Aroid
 */
global $aroid_theme_options;
$social_share = absint($aroid_theme_options['aroid-single-social-share']);
$image = absint($aroid_theme_options['aroid-single-page-featured-image']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if($image == 1 ){ ?>
            <div class="post-media">
                <?php aroid_post_thumbnail(); ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <div class="post-cats">
                <?php aroid_entry_meta(); ?>
            </div>
            <?php
            if (is_singular()) :
                the_title('<h1 class="post-title entry-title">', '</h1>');
            else :
                the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                ?>
            <?php endif; ?>
            <div class="post-date">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <i class="fa fa-user-o"></i><?php  aroid_posted_by(); ?>
                        <i class="fa fa-calendar-o"></i><?php aroid_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </div>

            <div class="content post-excerpt entry-content clearfix">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'aroid'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'aroid'),
                    'after' => '</div>',
                
                ));
                ?>
            </div><!-- .entry-content -->
            <footer class="post-footer entry-footer">
                <div class="d-flex justify-content-between">
                    <?php if(has_tag()) { ?>
                        <div class="d-flex justify-content-start align-items-center post-tags"> 
                            <i class="fa fa-tag"></i> <?php aroid_entry_tags_meta(); ?>
                        </div>
                    <?php } ?>
                    
                    <?php 
                    if( 1 == $social_share ){ ?>
                        <div class="d-flex justify-content-end">
                            <?php do_action( 'aroid_social_sharing' ,get_the_ID() ); ?>
                        </div>
                    <?php } ?>
                </div>
            </footer><!-- .entry-footer -->
            <?php the_post_navigation(); ?>
            <?php 
            /**
             * aroid_related_posts hook
             * @since Aroid 1.0.0
             *
             * @hooked aroid_related_posts -  10
             */
            do_action( 'aroid_related_posts' ,get_the_ID() );
            ?>
            
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->