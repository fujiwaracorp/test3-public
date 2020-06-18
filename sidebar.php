<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package claudia
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="widgets-panel">
	<a id="widgets-close" class="button-widgets" href="#" >
		<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/right-arrow.png');?>" alt="<?php _e('widgets button','claudia');?>"/>
	</a>
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
</div>