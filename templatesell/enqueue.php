<?php
/**
 * Enqueue scripts and styles.
 */
function aroid_scripts() {

	/*google font  */
	global $aroid_theme_options;
    /*body  */
    wp_enqueue_style('aroid-body', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet', array(), null);
    /*heading  */
    wp_enqueue_style('aroid-heading', '//fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('aroid-sign', '//fonts.googleapis.com/css2?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.5.0' );
    //*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );

   /*Main CSS*/
    wp_enqueue_style( 'aroid-style', get_stylesheet_uri() );

	/*RTL CSS*/
	wp_style_add_data( 'aroid-style', 'rtl', 'replace' );

    $aroid_pagination_option =  esc_attr($aroid_theme_options['aroid-pagination-options']);
    
    if( 'ajax' == $aroid_pagination_option )  {
    	
    	wp_enqueue_script( 'aroid-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '20200412', true );

    $masonry =  esc_attr($aroid_theme_options['aroid-column-blog-page']);
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'aroid-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'aroid-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0', true  );
    

    
    /*Custom Script JS*/
	wp_enqueue_script( 'aroid-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'aroid-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'aroid-custom', 'aroid_ajax', array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'aroid' ),
        'no_more_posts'        => __( 'No More', 'aroid' ),
    ));

	wp_enqueue_script( 'aroid-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $aroid_theme_options;
	if( 1 == absint($aroid_theme_options['aroid-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'aroid-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'aroid_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function aroid_block_styles() {
    wp_enqueue_style( 'aroid-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    /*body  */
    wp_enqueue_style('aroid-body', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500&display=swap" rel="stylesheet', array(), null);
    
    /*heading  */
    wp_enqueue_style('aroid-heading', '//fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null);

    $aroid_custom_css = '
    .editor-styles-wrapper p{ 
        font-family: Roboto;
        line-height: 1.5;
    }

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{font-family:Roboto Slab;} 
    ';

    wp_add_inline_style( 'aroid-editor-styles', $aroid_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'aroid_block_styles' );


/**
 * Enqueue Style for block pattern.
 */
function prefer_blog_block_style() {

    /*Block Pattern*/
    if (is_admin()) {
        wp_enqueue_style( 'aroid-block-style', get_template_directory_uri() . '/templatesell/patterns/block-style.css');
    }
}
add_action( 'enqueue_block_assets', 'prefer_blog_block_style');
