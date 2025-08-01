<?php
/**
 * Template Name: Design Membership
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
		<div class="hero">
			<div class="hero__page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->
			<div id="membership-design">
				<div class="memdesign">
					
					<div class="mem__totals">
						<h4>Your Current Selections:</h4>
						<div>
							<span id="total-month"><span id="increment-month">$0</span>/month</span>
							<span>or</span>
							<span id="total-year"><span id="increment-year">$0</span>/year</span>
						</div>
						<div>
							<span id="mem__discount"></span>
						</div>
					</div>
					<?php the_content() ?>
				</div>
			</div>

			<a href="#top" class="back-to-top">Back to Top</a>

		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
