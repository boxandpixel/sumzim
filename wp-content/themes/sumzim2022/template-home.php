<?php
/**
 * Template Name: Home Page
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
      <div class="home__section home__hero">
        <?php 

          /** Hero Section Variables */
          $hero_headline = get_field('hero_headline');
          $hero_link = get_field('hero_link');
        ?>
        
          <?php if($hero_headline): ?>
            <h1 style="text-shadow: 2px 2px 2px black; font-weight: 700; color: white;"><?php echo $hero_headline ?></h1>
          <?php endif ?>
          
          <?php if($hero_link): ?>
			<div class="home__hero-link">
				<div class="home__hero-link--desktop">
					<a 
            href="https://book.servicetitan.com/rodibizoajr2ydb24uw8s8x1?hl=en-US&gei=yhqdZ5W4OOjbptQP2LfRqA8&rwg_token=AAiGsoZe4ivBv_kqeIdkCTrg6eIJNfP2Ua2hQ-6jpoSUWDkpjd6tqFC7_hbu4o1_xLCztJazn15sMaNXLNElhKeI4wCveqVnQA%3D%3D" 
            class="button button-cta button--schedule button--large book-now-button" target="_blank">Book Now
          </a>
				</div>

				<div class="home__hero-link--mobile">
					<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button" id="sa-click-to-call">Call 610-593-5129</a>
					<div class="home__hero-link-mobile-alt">
						or <a href="https://book.servicetitan.com/rodibizoajr2ydb24uw8s8x1?hl=en-US&gei=yhqdZ5W4OOjbptQP2LfRqA8&rwg_token=AAiGsoZe4ivBv_kqeIdkCTrg6eIJNfP2Ua2hQ-6jpoSUWDkpjd6tqFC7_hbu4o1_xLCztJazn15sMaNXLNElhKeI4wCveqVnQA%3D%3D" 
                  class="se-widget-button se-button-alt" target="_blank">Book Now</a>
					</div>
				</div>
				
			</div>
          <?php endif; ?>
		  </div>

	<!-- Featured Cards -->
      <?php if(have_rows('featured_cards')): ?>
      <div class="home__section home__featured-cards">
        <?php while(have_rows('featured_cards')): the_row(); ?>
        <?php
          /** Featured Cards Variables */
          $featured_card_title = get_sub_field('featured_card_title');
          $featured_card_image = get_sub_field('featured_card_image');
          $featured_card_detail = get_sub_field('featured_card_detail');
          $featured_card_link = get_sub_field('featured_card_link');  
        ?>

          <section class="home__featured-card card card--color-primary">

            <?php if($featured_card_title): ?>
            <h4><?php echo $featured_card_title; ?></h4>
            <?php endif; ?>

            <?php if($featured_card_image): ?>
            <figure>  
              <img
                loading="lazy" 
                src="<?php echo $featured_card_image['url']; ?>"
                srcset="
                  <?php echo $featured_card_image['sizes']['medium']; ?> 570w,
                "
                sizes="
                  (min-width: 640px) 60vw,
                  (min-width: 768px) 30vw, 
                  (min-width: 960px) 25vw,
                  80vw
                "
                width="428"
                height="241"
                alt="<?php echo $featured_card_image['alt']; ?>">
            </figure>
            <?php endif; ?>

            <?php if($featured_card_detail): ?>
              <?php echo $featured_card_detail; ?>
            <?php endif; ?>

            <?php if($featured_card_link): ?>
              <a href="<?php echo $featured_card_link['url']; ?>" class="button button--secondary"><?php echo $featured_card_link['title']; ?></a>
            <?php endif; ?>            
          </section>

        <?php endwhile; ?>
      </div>
      <?php endif; ?>

      <!-- Service Icons -->
      <?php if(have_rows('service_icons')): ?>
      <div class="home__section home__service-icons" data-aos="fade-in" data-aos-once="false">
        <?php while(have_rows('service_icons')): the_row(); ?>
        <?php 

          /** Service Icon Variables */
          $service_icon = get_sub_field('service_icon');
          $service_link = get_sub_field('service_link');
        ?>
        <figure class="home__service-icon">
          <a href="<?php echo $service_link['url']; ?>">
          <img 
            loading="lazy"
            data-src="<?php echo $service_icon['url']; ?>"
            srcset="
              <?php echo $service_icon['sizes']['thumbnail']; ?> 150w
            "
            sizes="
              (min-width: 640px) 20vw,
              (min-width: 768px) 25vw, 
              (min-width: 960px) 20vw,
              25vw
            "
            alt="<?php echo $service_icon['alt']; ?>"
            width="124"
            height="124">
          <figcaption><?php echo $service_link['title']; ?></figcaption>
          </a>
        </figure>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>

      <!-- The Difference -->
      <?php if(have_rows('the_difference_cards')): ?>
      <div class="home__section home__the-difference">
      <?php while(have_rows('the_difference_cards')): the_row(); ?>
      <?php 

        /** The Differnce Variables */
        $the_difference_card_title = get_sub_field('the_difference_card_title');  
        $the_difference_card_image = get_sub_field('the_difference_card_image');
        $the_difference_card_detail = get_sub_field('the_difference_card_detail');

      ?>
      <section class="home__the-difference-card card card--color-primary">
        <?php if($the_difference_card_title): ?>
        <h4><?php echo $the_difference_card_title; ?></h4>
        <?php endif; ?>
        
        <?php if($the_difference_card_image): ?>
        <figure>
          <img 
            loading="lazy"
            data-src="<?php echo $the_difference_card_image['url']; ?>"
            srcset="
              <?php echo $the_difference_card_image['sizes']['small']; ?> 220w,
              <?php echo $the_difference_card_image['sizes']['medium']; ?> 570w,
            "
            sizes="
              (min-width: 640px) 50vw, 
              (min-width: 768px) 50vw,
              (min-width: 960px) 25vw,
              80vw
            "
            width="351"
            height="198"
            alt="<?php echo $the_difference_card_image['alt']; ?>"
            data-src="<?php echo $the_difference_card_image['url']; ?>"
            class="lazy">
        </figure>
        <?php endif; ?>
        
        <?php if($the_difference_card_detail): ?>
          <?php echo $the_difference_card_detail; ?>
        <?php endif; ?>
      </section>
      <?php endwhile; ?>
      </div>
      <?php endif; ?>

      <!-- Staff -->
      <div class="home__section home__staff">
      <?php 
      
        /** Staff Section Variables */
        $staff_heading = get_field('staff_heading');
        $staff_link = get_field('staff_link');
        
      ?>

      <?php if($staff_heading): ?>
        <h2 class="--variable-background"><?php echo $staff_heading; ?></h2>  
      <?php endif; ?>

      <div class="home__staff-slides swiper-container">
        <div class="home__staff-slides-wrapper swiper-wrapper">
      
      <?php 
      
        // Get featured staff
        $staff_is_featured = array(
          'order' => 'ASC',
          'post_type' => 'staff',
          'meta_key' => 'featured_order_number',
          'orderby' => 'meta_value',
          'meta_query' => array(
            array(
              'key'       => 'is_featured',
              'compare' => '=',
              'value'     => '1' 
            ),
          )
        );

        $staff_featured = new WP_Query($staff_is_featured);
        setup_postdata( $staff_featured );
      
        while( $staff_featured->have_posts() ): $staff_featured->the_post();
          $staff_thumbnail = get_field('thumbnail_image'); ?>
           
      	<div class="home__staff-slide swiper-slide">
      		<a href="<?php the_permalink(); ?>">
      		<figure>
            <img 
              loading="lazy"
              data-src="<?php echo $staff_thumbnail['url']; ?>"
              srcset="
                <?php echo $staff_thumbnail['sizes']['thumbnail']; ?> 150w,
                <?php echo $staff_thumbnail['sizes']['small']; ?> 220w,
              "
              sizes="
                (min-width: 640px) 30vw,
                (min-width: 768px) 20vw, 
                (min-width: 960px) 16vw,
                50vw
              "
              width="200"
              height="200"
              alt="<?php echo $staff_thumbnail['alt']; ?>">
      			<figcaption><?php the_title(); ?></figcaption>
      		</figure>
      		</a>
      	</div>

      <?php
        endwhile;
        wp_reset_postdata();
      ?>

      <?php

        // Get remaining staff alphabetically
        $staff_alpha = array(
          'post_type' => 'staff',
          'order' => 'ASC',
          'orderby' => 'title',
          'posts_per_page' => -1,
          'meta_query' => array(
            array(
              'key'       => 'is_featured',
              'compare' => '=',
              'value'     => '0' 
            ),
            array(
              'key'       => 'is_wall_of_fame',
              'compare' => '=',
              'value'     => '0' 
            )
          )
        );

        $staff_not_featured = new WP_Query($staff_alpha);
        setup_postdata( $staff_not_featured );

        while( $staff_not_featured->have_posts() ): $staff_not_featured->the_post();
          $staff_thumbnail = get_field('thumbnail_image'); 
      ?>
        
          <div class="home__staff-slide swiper-slide">
            <a href="<?php the_permalink(); ?>">
            <figure>
              <img 
                loading="lazy"
                data-src="<?php echo $staff_thumbnail['url']; ?>"
                srcset="
                  <?php echo $staff_thumbnail['sizes']['thumbnail']; ?> 150w,
                  <?php echo $staff_thumbnail['sizes']['small']; ?> 220w,
                "
                sizes="
                  (min-width: 640px) 30vw,
                  (min-width: 768px) 20vw, 
                  (min-width: 960px) 16vw,
                  50vw
                "
                width="200"
                height="200"
                alt="<?php echo $staff_thumbnail['alt']; ?>">
              <figcaption><?php the_title(); ?></figcaption>
            </figure>
            </a>
          </div>

      <?php 
        endwhile;
        wp_reset_postdata();
      ?>

      <?php 
      			
        // Staff: Wall of Fame
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
      			
      	$staff_alpha = new WP_Query($staff_wall_of_fame);
      	setup_postdata( $staff_alpha );
      			
      	while( $staff_alpha->have_posts() ): $staff_alpha->the_post();
          $staff_thumbnail = get_field('thumbnail_image');
      	?>
            <div class="home__staff-slide swiper-slide">
              <a href="<?php the_permalink(); ?>">
              <figure class="staff-wof">
                <div class="staff-wof--banner">
                  <span>SZ Wall</span>
                  <span>of Fame</span>
                </div>
                <img 
                  loading="lazy"
                  data-src="<?php echo $staff_thumbnail['url']; ?>"
                  srcset="
                    <?php echo $staff_thumbnail['sizes']['thumbnail']; ?> 150w,
                    <?php echo $staff_thumbnail['sizes']['small']; ?> 220w,
                  "
                  sizes="
                    (min-width: 640px) 30vw,
                    (min-width: 768px) 20vw, 
                    (min-width: 960px) 16vw,
                    50vw
                  "
                  width="170"
                  height="170"
                  alt="<?php echo $staff_thumbnail['alt']; ?>">
                <figcaption><?php the_title(); ?></figcaption>
              </figure>
              </a>
            </div>
      <?php
      	endwhile;
      	wp_reset_postdata();
      ?>



          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>
          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
          <?php if($staff_link): ?>
          <a href="<?php echo $staff_link['url']; ?>" class="button button--secondary"><?php echo $staff_link['title']; ?></a>
          <?php endif; ?>
      </div>

      <!-- Circle Features -->
      <div class="home__section home__circle-features">
        <div class="home__circle-anchor" id="circle-trigger"></div>
            <?php if(have_rows('circle_features')): while(have_rows('circle_features')): the_row(); ?>
            
            <div class="home__circle-feature-wrap" data-aos="example-anim2" data-aos-duration="1500" data-aos-anchor="#circle-trigger">
              <div class="home__circle-feature" data-aos="example-anim3" data-aos-duration="1500" data-aos-anchor="#circle-trigger">
            <?php
              /** Get Circle Feature Variables */
              $circle_heading = get_sub_field('circle_heading');
              $circle_detail = get_sub_field('circle_detail');
              $circle_link = get_sub_field('circle_link');
            ?>

            <?php if($circle_heading): ?>
                <h4><?php echo $circle_heading; ?></h4>
            <?php endif; ?>

            <?php if($circle_detail): ?>
                <?php echo $circle_detail; ?>
            <?php endif; ?>

            <?php if($circle_link): ?>
                <a href="<?php echo $circle_link['url']; ?>" class="button button--secondary"><?php echo $circle_link['title']; ?></a>
            <?php endif; ?>

              </div>
            </div>
            <?php endwhile; endif; ?>
      </div>

      <!-- Content Features -->
      <section class="home__section home__content-features">
      <?php 
        /** Get Content Features Variables */
        $content_features_heading = get_field('content_features_heading');
        $content_features_introduction = get_field('content_features_introduction');
        $content_features_addendum = get_field('content_features_addendum');
        $content_features_link = get_field('content_features_link');
      ?>
        <header class="home__content-features-header">
      <?php if($content_features_heading): ?>
          <h2 class="home__content-features-heading"><?php echo $content_features_heading; ?></h2>
      <?php endif; ?>

      <?php if($content_features_introduction): ?>
          <?php echo $content_features_introduction; ?>
      <?php endif; ?>
        </header>

		<main class="home__content-feature-video">
				<h3>Joe &amp; Alli discuss Why We Are Different</h3>
				<div class="video">
					<!-- Use the element. You may use it before the lite-yt-embed JS is executed. -->
					<lite-youtube videoid="ztj3eRrrwjc" playlabel="Play: Family"></lite-youtube>
				</div>
				<a class="button button--primary" href="/videos">See All Videos</a>
		</main>
        <footer class="home__content-features-footer">
      <?php if($content_features_addendum): ?>
          <?php echo $content_features_addendum; ?>
      <?php endif; ?>

      <?php if($content_features_link): ?>
          <a href="<?php echo $content_features_link['url']; ?>" class="button button--secondary"><?php echo $content_features_link['title']; ?></a>
      <?php endif; ?>      
        </footer>
      </section>

      <!-- Brands -->
      <div class="home__section home__brands">
      <?php 
        /** Brands Variables */
        $brands_heading = get_field('brands_heading');
        $brands_introduction = get_field('brands_introduction');
      ?>
      <?php if($brands_heading): ?>
      <h3 class="--variable-background"><?php echo $brands_heading; ?></h3>
      <?php endif; ?>

      <?php if($brands_introduction): ?>
        <?php echo $brands_introduction; ?>
      <?php endif; ?>

      <?php if(have_rows('brand_logos')): ?>
        <div class="home__brands-logos">
        <?php while(have_rows('brand_logos')): the_row(); ?>
        <?php 
          $brand_logo = get_sub_field('brand_logo');
        ?>  
          <figure class="home__brand-logo">
            <img 
              loading="lazy"
              data-src="<?php echo $brand_logo['url']; ?>"
              srcset="
                <?php echo $brand_logo['sizes']['thumbnail']; ?> 150w,
                <?php echo $brand_logo['sizes']['small']; ?> 220w
              "
              sizes="
                (min-width: 640px) 25vw,
                (min-width: 768px) 15vw, 
                (min-width: 960px) 10vw,
                25vw
              "
              width="150"
              height="150"
              alt="<?php echo $brand_logo['title']; ?>"
            >
          </figure>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
    
    <!-- Background Media -->
    <div class="home__background-media">
    <?php
      /** Media Variables */
      $background_video_webm = get_field('background_video_webm');
      $background_video_mp4 = get_field('background_video_mp4');
      $background_image = get_field('background_image');
    ?>
      
    <?php if($background_video_mp4 || $background_video_webm): ?>
		
      <div class="home__background-media-container" id="backgroundContainer"></div>
    <?php endif; ?>
      
    </div>

      </div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
