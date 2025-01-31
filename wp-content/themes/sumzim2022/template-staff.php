<?php
/**
 * Template Name: Staff
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

		<div class="content__page --wide">
		<!-- Begin Page Content Options -->

		<div class="display-button">
			<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button">Call Now 610-593-5129</a>
		</div>		

		<?php 
			$display_button = get_field('display_button');
			$button_type = get_field('button_type');

			if($display_button): 
				if($button_type == 'Book Now'): ?>
			<div class="display-button">
				<a 
					href="https://book.servicetitan.com/rodibizoajr2ydb24uw8s8x1?hl=en-US&gei=yhqdZ5W4OOjbptQP2LfRqA8&rwg_token=AAiGsoZe4ivBv_kqeIdkCTrg6eIJNfP2Ua2hQ-6jpoSUWDkpjd6tqFC7_hbu4o1_xLCztJazn15sMaNXLNElhKeI4wCveqVnQA%3D%3D" 
					class="button button-cta button--schedule button--large book-now-button" target="_blank">Book Now
				</a>				
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
		
			<div class="staff">
				<div class="staff__grid">
			
			<?php
			
				$staff = array(
					'post_type' => 'staff',
					'order' => 'ASC',
					'orderby' => 'title',
					'posts_per_page' => -1,
					'meta_query' => array(  
						array(
							'key'       => 'is_wall_of_fame',
							'compare' => '=',
							'value'     => '0' 
						)
					)
				);
			
				if( $staff ):
				$staff_list = new WP_Query($staff);
				setup_postdata( $staff_list);
			
				while( $staff_list->have_posts() ): $staff_list->the_post();
					$staff_thumbnail = get_field('thumbnail_image');
				
			?>
				<div class="staff__each">
					<a href="<?php the_permalink(); ?>">
						<img 
							src="<?php echo $staff_thumbnail['url']; ?>" 
							srcset="
								<?php echo $staff_thumbnail['sizes']['small']; ?> 220w,
								<?php echo $staff_thumbnail['sizes']['medium']; ?> 570w,

							"
							sizes="
								(min-width: 768px) 66vw,
								(min-width: 960px) 25vw,
								100vw
							"
							alt="<?php echo $staff_thumbnail['alt']; ?>"
						>  
						<div class="staff__each-overlay">
							<span class="staff__each-name"><?php the_title(); ?></span>
							<span class="staff__each-position"><?php the_field("job_title"); ?></span>
						</div> <!-- .staff__each-name-position -->
					</a>
				</div> <!-- .staff-each -->  
			
			<?php
				endwhile;
				wp_reset_postdata();
				
				endif;
			?>
			
			<?php
				$staff_wall_of_fame = array(
				'post_type' => 'staff',
				'order' => 'ASC',
				'orderby' => 'title',
				'posts_per_page' => -1,
				'meta_query' => array(
					array(
						'key'       => 'is_wall_of_fame',
						'compare' => '=',
						'value'     => '1' 
					),
					)
				);
			
				if( $staff_wall_of_fame ):
				$staff_wof = new WP_Query($staff_wall_of_fame);
				setup_postdata( $staff_wof);
			
				while( $staff_wof->have_posts() ): $staff_wof->the_post();
					$staff_thumbnail = get_field('thumbnail_image'); 
				
			?> 
				<div class="staff__each staff__each--wof">
					<div class="staff__each--wof-banner">
						<span>SZ Wall</span>
						<span>of Fame</span>
					</div>
					<a href="<?php the_permalink(); ?>">
						<img 
							src="<?php echo $staff_thumbnail['url']; ?>" 
							alt="<?php echo $staff_thumbnail['alt']; ?>"
						>  
						<div class="staff__each-overlay staff__each-overlay--wof">
							<span class="staff__each-name"><?php the_title(); ?></span>
							<span class="staff__each-position"><?php the_field("job_title"); ?></span>
						</div> <!-- .staff__each-name-position -->
					</a>
				</div> <!-- .staff-each -->  
			<?php
				endwhile;
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
					
				</div>
			</div>
			<?php endif; ?>
			
		</div>
		<a href="#top" class="back-to-top">Back to Top</a>


	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
