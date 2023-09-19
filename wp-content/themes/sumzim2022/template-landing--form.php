<?php
/**
 * Template Name: Landing - Form
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
		<div class="landing__hero">
			<div class="landing__hero-page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php the_field('title_subheading') ?></h4>
			</div>  
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->

			<div class="landing-content landing--form">
				<div class="landing-content__image-description">
					<?php if(get_field('content_subheading')): ?>
					<h3><?php the_field('content_subheading'); ?></h3>
					<?php endif; ?>
					<?php 
						$content_image = get_field('content_image');
						if($content_image):
					?>
					<div class="landing-content__image">
						<img src="<?php echo $content_image['url']; ?>" alt="">
					</div>	
					<?php endif; ?>

					<?php if(get_field('content_additional_text')): ?>
					<div class="landing-content__description">
						<?php the_field('content_additional_text'); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="landing-content__cta">
					<div class="landing-content__cta--form">
						<h3><?php the_field('cta_heading'); ?></h3>
						<?php echo do_shortcode('[contact-form-7 id="27557" title="Landing Page" html_class="form-landing"]'); ?>
					</div>
				</div>
			</div>

			<div class="custom-script">
				<div id="google-reviews-site"></div>
			</div>

		<!-- 5-Point Guarantee -->
		<?php 
			$display_5_point_guarantee = get_field('display_5_point_guarantee');
		?>
			<?php if($display_5_point_guarantee != "None"): ?>
			<div class="breakout guarantee">
				<div class="guarantee__content">
					<?php 
						switch($display_5_point_guarantee) {
							case "Heating":
								echo get_field('guarantee_heating', 'option');
								break;
							case "Plumbing":
								echo get_field('guarantee_plumbing', 'option');
								break;
							case "Air Conditioning":
								echo get_field('guarantee_air_conditioning', 'option');
								break;
							case "General":
								echo get_field('guarantee_general', 'option');
								break;
							case "HVAC":
								echo get_field('guarantee_hvac', 'option');
								break;										
						}
					?>
					<div class="heading-list">
						<ul class="heading-list__list">
							<?php
								if(have_rows('heading_list', 'option')): while(have_rows('heading_list', 'option')): the_row();
									$heading_list_item = get_sub_field('heading_list_item', 'option');
							?>
							<li class="heading-list__list-item">
								<?php echo $heading_list_item; ?>
							</li>
							<?php
								endwhile; endif;
							?>
						</ul>
					</div>
					
				</div>
			</div>
			<?php endif; ?>
			
		</div>
		<a href="#top" class="back-to-top">Back to Top</a>


	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
