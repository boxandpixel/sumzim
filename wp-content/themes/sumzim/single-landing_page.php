<?php
/**
 * Single Landing Page (landing_page post type).
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'landing-page' );
		endwhile;
		?>

	</main><!-- #main -->

<?php
get_footer();
