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

	$page_settings = get_field('page_settings');
	$seo_title = $page_settings['seo_title'];
?>

	<main id="primary" class="site-main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php //the_title( '<h1 class="entry-title">', '</h1>' ); echo "test" ?>
				<h1><?= $seo_title ? $seo_title : get_the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>

				<div class="staff">

					<div class="staff__search">
						<div class="staff__search-field">
							<input
								type="search"
								id="staff-search"
								class="staff__search-input"
								placeholder="Find an expert..."
								aria-label="Search staff members"
							>
						</div>
					</div>
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
						$job_title = get_field('job_title');

				?>
					<a href="<?php the_permalink(); ?>" class="staff-card" data-name="<?php echo esc_attr(get_the_title()); ?>">
						<div class="staff-card__image-wrapper">
							<div class="staff-card__image" style="background-image: url('<?php echo esc_url($staff_thumbnail['url']); ?>');"></div>
							<div class="staff-card__gradient"></div>
							<div class="staff-card__overlay-content">
								<div class="staff-card__name"><h5><?php the_title(); ?></h5></div>
								<?php if($job_title): ?>
								<div class="staff-card__title"><?php echo esc_html($job_title); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</a>

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
						$job_title = get_field('job_title');

				?>
					<a href="<?php the_permalink(); ?>" class="staff-card staff-card--wof" data-name="<?php echo esc_attr(get_the_title()); ?>">
						<div class="staff-card__image-wrapper">
							<div class="staff-card__wof-banner">
								<span>SZ Wall</span>
								<span>of Fame</span>
							</div>
							<div class="staff-card__image" style="background-image: url('<?php echo esc_url($staff_thumbnail['url']); ?>');"></div>
							<div class="staff-card__gradient"></div>
							<div class="staff-card__overlay-content">
								<div class="staff-card__name"><h5><?php the_title(); ?></h5></div>
								<?php if($job_title): ?>
								<div class="staff-card__title"><?php echo esc_html($job_title); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</a>
				<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
				</div>				
			</div>
		</article>
		
			

		

			
		

	</main><!-- #main -->

<script>
(function () {
	var input = document.getElementById('staff-search');
	if (!input) return;

	input.addEventListener('input', function () {
		var query = this.value.trim().toLowerCase();
		var cards = document.querySelectorAll('.staff-card');

		cards.forEach(function (card) {
			var name = card.getAttribute('data-name').toLowerCase();
			card.style.display = (!query || name.includes(query)) ? '' : 'none';
		});
	});
})();
</script>

<?php
// get_sidebar();
get_footer();
