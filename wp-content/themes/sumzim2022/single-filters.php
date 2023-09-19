<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<h1>Replacement Filters</h1>
				<h4>Purchase a selection of air filters directly from our site.</h4>
			</div>  
		</div>

		<div class="content__page">
			<div class="post">




		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'sumzim' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'sumzim' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
						
			</div>
			<div class="back-to-previous-page">
				<a href="/replacement-filters" class="button button--neutral" target="_blank">View All Filters</a>
			</div>
			
			<!-- 5-Point Guarantee -->
			<?php 
				$display_5_point_guarantee = get_field('display_5_point_guarantee', 32);
				$guarantee_editor = get_field('visual_editor', 'option');
			?>
				<?php if($display_5_point_guarantee): ?>
				<div class="breakout guarantee">
					<div class="guarantee__content">
						<?php echo $guarantee_editor; ?>
						
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

		
		



	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
