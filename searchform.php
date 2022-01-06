<?php
/**
 * Custom search form
 *
 * @package Aroid
 */
global $aroid_theme_options;
$placeholder_text = esc_attr($aroid_theme_options['aroid_search_placeholder']);
?>
<form id="searchform" class="searchform d-flex flex-nowrap" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="text" class="search-field" name="s" placeholder="<?php echo $placeholder_text; ?>" value="<?php echo get_search_query(); ?>">
  <button class="search_btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
</form> 