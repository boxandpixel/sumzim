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
				<h1>Blog</h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">

			<?php 
				$display_button = get_field('display_button', 32);
				$button_type = get_field('button_type', 32);
			
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

		<?php
		
		while ( have_posts() ) :
			the_post(); ?>
			<div class="post">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		
		<?php
		endwhile; // End of the loop.
		?>

	<div class="back-to-previous-page">
      <a href="/about-us/blog" class="button button--primary">View All Blog Posts</a>
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

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
