<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aroid
 */
$GLOBALS['aroid_theme_options'] = aroid_get_options_value();
global $aroid_theme_options;
$enable_social = absint($aroid_theme_options['aroid_enable_top_header_social']);
?>
<header class="header-1 header-mobile d-md-block d-lg-none">		
	<section class="main-header">
		<?php $header_image = esc_url(get_header_image());
			$header_class = ($header_image == "") ? '' : 'header-image';
		?>
		<div class="head_one py-0 <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<div class="logo text-center">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							endif;
							$aroid_description = get_bloginfo( 'description', 'display' );
							if ( $aroid_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $aroid_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-logo -->
					</div>
					
				</div>
			</div>
		</div>
		<div class="menu-area border-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 d-flex align-items-center justify-content-between">
						<nav id="site-navigation" class="site-navigation">
							<div class="hamburger-menu">
								<button class="bar-menu">
									<span></span>
								</button>
							</div>
							<div class="main-menu menu-caret">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => 'ul',
									'menu_class'      => ''
								));
								?>
							</div>
						</nav><!-- #site-navigation -->
						<div class="header-right d-flex align-items-center justify-content-end">
							<?php if( $enable_social == 1 ){ ?>
								<div class="social-links">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_id'        => 'social-menu',
											'menu_class'     => 'aroid-social-menu',
										) );
									?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</setion><!-- #masthead -->
</header>

<header class="header-1 header-desktop d-none d-lg-block">	
	<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-image';
	?>
	<section class="main-header">
		<div class="head_one <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
			<div class="container">
				<div class="row align-items-center justify-content-between">
					<div class="col-sm-2">
						<div class="logo">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							else :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							endif;
							$aroid_description = get_bloginfo( 'description', 'display' );
							if ( $aroid_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $aroid_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-logo -->
					</div>
					<div class="col-sm-8">
						<nav id="site-navigation" class="site-navigation">
							<div class="main-menu menu-caret">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => 'ul',
									'menu_class'      => ''
								));
								?>
							</div>
						</nav><!-- #site-navigation -->
					</div>
					<div class="col-sm-2">
						<?php if( $enable_social == 1 ){ ?>
							<div class="right-side">
								<div class="social-links">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_id'        => 'social-menu',
											'menu_class'     => 'aroid-social-menu',
										) );
									?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		
	</setion><!-- #masthead --> 
</header>

