<?php
/**
 * Template Name: Blog Page
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
					href="https://sumzim.com/about-us/free-estimate/?ref=service" 
					class="button button-cta button--schedule button--large book-now-button" target="_blank">Book Now
				</a>				
			</div>            
		<?php
				elseif($button_type == 'Link to Form'): ?>
			<div class="display-button">
				<a href="/about-us/free-estimate" class="button button--primary button--large">Get an Estimate</a>
			</div>
		<?php
				endif;
			endif;
		?>
		
		<!-- Display the_content if it's not empty -->
		<?php
			$the_content = get_the_content();
			if(!empty($the_content)) { ?>
			<div class="the-content">
				<?php the_content(); ?>
			</div>
		
			<?php }
		?>

		<?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$posts = array(
				'post_type' => 'post',
				'order' => 'DESC',
				'posts_per_page' => 10,
				'paged' => $paged,
			);

			if( $posts): 
				$blog_posts = new WP_Query($posts);
				setup_postdata( $blog_posts);
				
				while($blog_posts->have_posts()): $blog_posts->the_post();
		?>
			<div class="posts">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							// sumzim_posted_on();
							// sumzim_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<span><?php the_time( 'F j, Y' );?></span>
				</header><!-- .entry-header -->

				<?php sumzim_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					// $content = get_the_content();
					// echo wp_trim_words($content, 55, '...');
					the_excerpt();

					// wp_link_pages(
					// 	array(
					// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sumzim' ),
					// 		'after'  => '</div>',
					// 	)
					// );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php echo '<div class="post__continue"><p><a href="'. get_the_permalink() .'">Continue Reading &raquo;</a></p></div>'; ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->
			</div>
			<?php 
				endwhile; 
			?>
			<div class="pagination">
    			<?php previous_posts_link('&laquo; Newer Posts'); ?>
				<?php next_posts_link('Older Posts &raquo;', $blog_posts->max_num_pages); ?>
			</div>
			<?php
				wp_reset_postdata(); 
				endif;
			?>


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
