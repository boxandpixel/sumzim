<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

		?>
  <!-- Hero -->
  <?php 
      $hero_image = get_field('hero_image');
      $hero_image_default = get_field('hero_image_default', 'option');
      $hero_subheading = get_field('hero_subheading');
  ?>
  <div class="hero" style="background: url('<?php if($hero_image): echo $hero_image['url']; else: echo $hero_image_default['url']; endif; ?>') center / cover no-repeat">
      <div class="hero__page-title">
          <h1><?php echo get_the_title(32); ?></h1>
          <h4><?php echo $hero_subheading; ?></h4>
      </div>  
  </div>

  <div class="content__page">
    <!-- Begin Page Content Options -->

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
        if(have_rows('page_content_options', 32)): while(have_rows('page_content_options', 32)): the_row();
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
        /** End get_row_layout() */
        endif;
    ?>
    
    <?php
        /** End Page Content Options */
        endwhile; endif;
    ?>
	<?php		

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :?>
			test
			<div class="posts">

			<?php
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() ); ?>
			</div>
			<?php

			endwhile; ?>
			<!-- the_posts_navigation(); -->
		<div class="posts__navigation">
			<?php the_posts_navigation(); ?>
		</div>
		<?php
		
			else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

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
// get_sidebar();
get_footer();
