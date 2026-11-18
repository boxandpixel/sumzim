<?php
/**
 * Template part for landing pages (single-landing_page.php).
 *
 * Everything, including the hero, comes from blocks. The Landing Hero block
 * (inc/blocks/landing-hero) renders the title, button and image at the top.
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'landing-page' ); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
