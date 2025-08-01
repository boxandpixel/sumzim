<?php
/**
 * Template Name: Blue Membership Plans
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
				<h4>Membership Plans</h4>
			</div>  
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->
		 
		<div class="display-button display-button--desktop">
			<button class="button button-cta button--schedule button--large book-now-button" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button">Book Now!</button>
		</div>

		<div class="display-button display-button--mobile">
			<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button" id="sa-click-to-call">Call 610-593-5129</a>
			<div class="home__hero-link-mobile-alt">
				or <button class="se-button-alt" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })">Book Now</button>
			</div>
		</div>		


		<!-- 20230329 -->
		<div class="mem__section">
			<img src="/wp-content/uploads/2025/06/blue-collar-club-card.webp" alt="" style="width: 60%">
		</div>		 
		<div class="mem__section">
			<h2 class="mem__section-heading">Protect your investment with a Blue Collar Club Maintenance Plan</h2>
		</div>
		<div class="mem__section">
			<a href="/design-your-customer-membership/" class="button button--primary button--large">Customize Your Membership Today</a>
		</div>

		<div class="mem__video video-embed">
			<div class="video-embed__container">
				<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/uL2pVtG4-8c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
		</div>

		<div class="mem__benefits">
			<h2>Membership Benefits</h2>
			<div class="mem__benefits-grid">			
				<div class="mem__benefits-each mem__benefits-one">
					<h3>1. Maintenance Visits</h3>
					<p>A Good Natured technician visits once per year to thoroughly clean and performance test your system. They will make fine tuning adjustments and inform you if components are not performing as they should.</p>
				</div>
				<div class="mem__benefits-each mem__benefits-two">
					<h3>2. 25% Discount on Repairs</h3>
					<p>Repairs can be costly and unexpected! For members, any materials used and technician labor needed to solve the problem will be discounted at 25%.</p>
				</div>
				<div class="mem__benefits-each mem__benefits-three">
					<h3>3. Access to On-Call Staff</h3>
					<p>Emergencies never happen at convenient times. For this reason, our technical support staff is available 24/7, at no extra cost, to help solve the issue.</p>
				</div>
				<div class="mem__benefits-four">
					<div id="google-reviews-site">
					
						<div id="google-reviews"></div>

					<a href="/reviews" class="button button--primary">See More Reviews</a>
				</div>
			</div>
		</div>

		<div class="mem__section mem__section-cta">
			<a href="/design-your-customer-membership/" class="button button--primary button--large">Customize Your Membership Today</a>
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
