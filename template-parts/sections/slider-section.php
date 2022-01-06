<?php 
/**
 * Aroid Slider Function
 * @since Aroid 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $aroid_theme_options;
$slide_id = absint($aroid_theme_options['aroid-select-category']);
$search_header = absint($aroid_theme_options['aroid_enable_search']);
        $slick_args = array(
            'slidesToShow'      => 1,
            'slidesToScroll'    => 1,
            'dots'              => false,
            'arrows'            => false,
            'fade'              => true,
        );
      $args = array(
			'posts_per_page' => 2,
			'paged' => 1,
			'cat' => $slide_id,
			'post_type' => 'post'
		);
    ?>
  <div class="banner-section">
      <?php
  		$slider_query = new WP_Query($args);
  		if ($slider_query->have_posts()): ?>
      <div class="banner-slider">
  				<?php while ($slider_query->have_posts()) : $slider_query->the_post(); 
            if(has_post_thumbnail()){
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src( $image_id,'',true );
          ?>
  				
            <div class="sinlge-banner">
              <div class="banner-wrapper">
                <div class="banner-bg" style="background-image: url(<?php echo esc_url($image_url[0]);?>)"></div>
                  <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                      <h3 class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <div data-animation="fadeInUp" data-delay="1s">
                        <?php the_excerpt(); ?>
                      </div>
                      <?php if($search_header == 1 ){ ?>
                      <div class="search">
                        <div class="box-search">
                           <?php echo get_search_form(); ?>      
                        </div>
                      </div>
                    <?php } ?>
                    <div class="post-cats mb-4">
                      <?php aroid_entry_meta(); ?>
                    </div>
                  </div>
              </div>
            </div>
          <?php } endwhile;
          wp_reset_postdata(); ?>
      </div>
      <?php endif; ?>
  </div>