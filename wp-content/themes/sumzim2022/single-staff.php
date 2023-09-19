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
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">



		<?php
		while ( have_posts() ) : the_post(); ?>
		<div class="staff">
			<div class="staff__bio" @php post_class() @endphp>
			<?php
				$job_title = get_field('job_title');
				$career_start_date = get_field('career_start_date');
				$hire_date = get_field('hire_date');
				$wall_of_fame_employment_date_range = get_field('wall_of_fame_employment_date_range');
				$certifications = get_field('certifications');
				$favorite_part_of_summers_zims = get_field('favorite_part_of_summers_&_zims');
				$hobbies = get_field('hobbies');
				$family = get_field('family');
				$reviews = get_field('reviews');
				$large_image = get_field('large_image');
				$is_wall_of_fame = get_field('is_wall_of_fame');
				$additional_information = get_field('additional_information');
			?>
				<?php if($reviews): ?>
				<div class="staff__bio-review">
					<?php echo $reviews; ?>
				</div>
				<?php endif; ?>

				<div class="staff__bio-image-details">
					<?php if($large_image): ?>
					<div class="staff__bio-image <?php if($is_wall_of_fame): ?>staff__bio-image--wof<?php endif; ?>">
						<?php if($is_wall_of_fame): ?>
							<div class="staff__bio-image--wof-banner">
								<span>SZ Wall</span>
								<span>of Fame</span>
							</div>
						<?php endif; ?>
						<img 
							src="<?php echo $large_image['url']; ?>"
							srcset="
								<?php echo $large_image['sizes']['medium']; ?> 570w,
								<?php echo $large_image['sizes']['large']; ?> 740w,
							"
							sizes="
								(min-width: 768px) 50vw,
								(min-width: 960px) 66vw,
								(min-width: 1280px) 30vw,
								90vw
							"
							alt="<?php echo $large_image['alt']; ?>"
						>
					</div>
					<?php endif; ?>

					<div class="staff__bio-details">
						<?php if($job_title): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Job Title</h5></dt>
								<dd><p><?php echo $job_title; ?></p></dd>
							</dl>
						<?php endif; ?>

						<?php if($certifications): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Certifications</h5></dt>
								<dd><?php echo $certifications; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($career_start_date): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Career Experience</h5></dt>
								<dd>
									<?php
									$today = new DateTime("now");
									$start = new DateTime($career_start_date);				
									$interval = $today->diff($start);

									if($interval->y < 1):
										$timeframe = $interval->m . " months";
									elseif($interval->y == 1):
										$timeframe = $interval->y . " year";
									else:
										$timeframe = $interval->y . " years";
									endif;  
									?> 
									<p><?php echo $timeframe; ?></p>
								</dd>
							</dl>
						<?php endif; ?>

						<?php if($hire_date): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Date Hired at Summers &amp; Zim's</h5></dt>
								<dd><p><?php echo $hire_date; ?></p></dd>
							</dl>
						<?php endif; ?>

						<?php if($wall_of_fame_employment_date_range): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Career at Summers &amp; Zim's</h5></dt>
								<dd><p><?php echo $wall_of_fame_employment_date_range; ?></p></dd>
							</dl>
						<?php endif; ?>

						<?php if($favorite_part_of_summers_zims): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Favorite Part of Working at Summers &amp; Zim's</h5></dt>
								<dd><?php echo $favorite_part_of_summers_zims; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($hobbies): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Hobbies</h5></dt>
								<dd><?php echo $hobbies; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($family): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Family</h5></dt>
								<dd><?php echo $family; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($additional_information): ?>
							<dl class="staff__bio-detail">
								<dt><h5>Additional Information</h5></dt>
								<dd><?php echo $additional_information; ?></dd>
							</dl>
						<?php endif; ?>
					</div>
				</div>
			</div>		
		</div>
		<?php
		endwhile; // End of the loop.
		?>
	<div class="back-to-previous-page">
		<a href="/about-us/staff" class="button button--primary">View All Staff Members</a>
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
