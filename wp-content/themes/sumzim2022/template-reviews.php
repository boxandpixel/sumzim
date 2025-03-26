<?php
/**
 * Template Name: Reviews
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<!-- Hero -->
		<?php 
			$hero_image = get_field('hero_image');
			$hero_image_default = get_field('hero_image_default', 'option');
			$hero_subheading = get_field('hero_subheading');
		?>
		<div class="hero-landing">
			<div class="hero__page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">

			<div class="display-button display-button--desktop">
				<button class="button button-cta button--schedule button--large book-now-button" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button">Book Now!</button>
			</div>

			<div class="display-button display-button--mobile">
				<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button" id="sa-click-to-call">Call 610-593-5129</a>
				<div class="home__hero-link-mobile-alt">
					or <button class="se-button-alt" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })">Book Now</button>
				</div>
			</div>		

			<div class="reviews">

			<?php
				if(have_rows('page_content_options')): while(have_rows('page_content_options')): the_row();
			?>
			<!-- Visual Editor -->
			<?php 
				if(get_row_layout() == 'visual_editor'):
					$visual_editor = get_sub_field('visual_editor');
			?>
				<div class="visual-editor">
					<?php echo $visual_editor; ?>
				</div>


			<?php
				elseif(get_row_layout() == 'custom_script'):
					$custom_script = get_sub_field('custom_script');
			?>
				<div class="custom-script">
					<?php echo $custom_script; ?>
				</div>

			<?php
				/** End get_row_layout() */
				endif;
			?>

			<?php
				/** End Page Content Options */
				endwhile; endif;
			?>
				
			</div>
		</div>
		<a href="#top" class="back-to-top">Back to Top</a>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
