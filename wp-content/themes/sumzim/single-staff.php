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
		<!-- Staff Hero -->
		<?php
			$thumbnail_image    = get_field('thumbnail_image');
			$job_title          = get_field('job_title');
			$career_start_date  = get_field('career_start_date');
			$hire_date          = get_field('hire_date');
		?>
		<div class="single-staff__hero">
			<div class="single-staff__hero-inner">
				<nav class="single-staff__hero-breadcrumb">
					<a href="/staff" class="single-staff__hero-breadcrumb-parent">Staff</a>
					<span class="single-staff__hero-breadcrumb-sep">/</span>
					<span class="single-staff__hero-breadcrumb-current"><?php the_title(); ?></span>
				</nav>
				<div class="single-staff__hero-body">
					<?php if($thumbnail_image): ?>
					<div class="single-staff__hero-image">
						<img
							src="<?php echo esc_url($thumbnail_image['url']); ?>"
							alt="<?php echo esc_attr($thumbnail_image['alt']); ?>"
						>
					</div>
					<?php endif; ?>
					<div class="single-staff__hero-content">
						<div class="single-staff__hero-content-identity">
							<h1 class="single-staff__hero-content-identity-name"><?php the_title(); ?></h1>
							<?php if($job_title): ?>
							<p class="single-staff__hero-content-identity-job-title"><?php echo esc_html($job_title); ?></p>
							<?php endif; ?>						
						</div>

						<div class="single-staff__hero-content-meta">
							<?php if($career_start_date): ?>
							<?php
								$today = new DateTime('now');
								$start = new DateTime($career_start_date);
								$interval = $today->diff($start);
								if ($interval->y < 1):
									$experience = $interval->m . ' month' . ($interval->m !== 1 ? 's' : '');
								elseif ($interval->y === 1):
									$experience = '1 year';
								else:
									$experience = $interval->y . ' years';
								endif;
							?>
							<div class="single-staff__hero-content-meta-item">
								<span class="single-staff__hero-content-meta-label">Experience</span>
								<span class="single-staff__hero-content-meta-value"><?php echo esc_html($experience); ?></span>
							</div>
							<?php endif; ?>
							<?php if($hire_date): ?>
							<div class="single-staff__hero-content-meta-item">
								<span class="single-staff__hero-content-meta-label">Joined S&amp;Z</span>
								<span class="single-staff__hero-content-meta-value"><?php echo esc_html($hire_date); ?></span>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div><!-- /.single-staff__hero-body -->
			</div><!-- /.single-staff__hero-inner -->
		</div><!-- /.single-staff__hero -->

		<?php
		while ( have_posts() ) : the_post(); ?>
		<div class="single-staff__content">
			<?php
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

				<div class="single-staff__bio-image-details">
					<?php if($large_image): ?>
					<div class="single-staff__bio-image <?php if($is_wall_of_fame): ?>single-staff__bio-image--wof<?php endif; ?>">
						<?php if($is_wall_of_fame): ?>
							<div class="single-staff__bio-image--wof-banner">
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

					<div class="single-staff__bio-details">

						<?php if($certifications): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Certifications</h5></dt>
								<dd><?php echo $certifications; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($wall_of_fame_employment_date_range): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Career at Summers &amp; Zim's</h5></dt>
								<dd><p><?php echo $wall_of_fame_employment_date_range; ?></p></dd>
							</dl>
						<?php endif; ?>

						<?php if($favorite_part_of_summers_zims): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Favorite Part of Working at Summers &amp; Zim's</h5></dt>
								<dd><?php echo $favorite_part_of_summers_zims; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($hobbies): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Hobbies</h5></dt>
								<dd><?php echo $hobbies; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($family): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Family</h5></dt>
								<dd><?php echo $family; ?></dd>
							</dl>
						<?php endif; ?>

						<?php if($additional_information): ?>
							<dl class="single-staff__bio-detail">
								<dt><h5>Additional Information</h5></dt>
								<dd><?php echo $additional_information; ?></dd>
							</dl>
						<?php endif; ?>
					</div>
				</div>
		</div><!-- /.single-staff__content -->
		<?php
		endwhile; // End of the loop.
		?>


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
