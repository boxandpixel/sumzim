<?php
/**
 * Template Name: Filters
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
		<div class="hero" style="background: url('<?php if($hero_image): echo $hero_image['url']; else: echo $hero_image_default['url']; endif; ?>') center / cover no-repeat">
			<div class="hero__page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page --wide">
		<!-- Begin Page Content Options -->



		<?php 
			$display_button = get_field('display_button');
			$button_type = get_field('button_type');

			if($display_button): 
				if($button_type == 'Book Now'): ?>
			<div class="display-button">
				<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()">Book Now</button>
			</div>            
		<?php
				elseif($button_type == 'Link to Form'): ?>
			<div class="display-button">
				<a href="/schedule-estimate" class="button button--primary button--large">Schedule a Consulation</a>
			</div>
		<?php
				endif;
			endif;
		?>
			<!-- Products page added 12/20/2021 -->
			<div class="filters">
				<div class="filters-overview">

				<?php
						
					$filters = array(
						'post_type' => 'filters',
						'order' => 'ASC',
						'orderby' => 'title',
						'posts_per_page' => -1,
						"facetwp" => true
					);
				
					if( $filters ):
						$filters_list = new WP_Query($filters);
						setup_postdata( $filters_list);
				?>

					<div class="filters-overview__filters">
						<h3>Filters</h3>



						<div class="filters__facet">
							<h5>Brand</h5>
							<?php echo do_shortcode('[facetwp facet="brand"]'); ?>
						</div>

						<div class="filters__facet">
							<h5>Size</h5>
							<?php echo do_shortcode('[facetwp facet="size"]'); ?>
						</div>
						
					</div>

					<div class="filters-overview__filters-list">
					<?php
							
						// $products = array(
						//     'post_type' => 'products',
						//     'order' => 'ASC',
						//     'orderby' => 'title',
						//     'posts_per_page' => -1,
						// );
								
						// if( $products ):
						//     $products_list = new WP_Query($products);
						//     setup_postdata( $products_list);
								
							while( $filters_list->have_posts() ): $filters_list->the_post();
					?>
						<section class="filter">
							<a href="<?php the_permalink(); ?>">
								
								<div class="filters__filter-detail">                            
									<figure class="filter-detail__figure">
										<?php the_post_thumbnail(); ?>
									</figure>
									<h6><?php the_title(); ?></h6>
								</div>
							</a>
						</section>

					
					<?php
							endwhile;
					?>
					</div>
					<?php 
						wp_reset_postdata();
						endif;
					?>
				</div>



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

					<div class="display-button" style="display: flex; justify-content: center; margin-bottom: 1rem;">
						<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()">Book Now</button>
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
