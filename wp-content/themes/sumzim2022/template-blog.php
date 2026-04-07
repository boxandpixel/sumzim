<?php
/**
 * Template Name: Blog Page
 *
 * @package _s
 */

get_header();

$paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$current_cat = isset( $_GET['cat'] ) ? intval( $_GET['cat'] ) : 0;

$query_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'order'          => 'DESC',
	'orderby'        => 'date',
	'posts_per_page' => 12,
	'paged'          => $paged,
);

if ( $current_cat ) {
	$query_args['cat'] = $current_cat;
}

$blog_query = new WP_Query( $query_args );
$categories = get_categories( array( 'hide_empty' => true ) );


$page_settings = get_field('page_settings');
$seo_title = $page_settings['seo_title'];
$tagline = $page_settings['tagline'];
?>

<main id="primary" class="site-main blog-landing">

	<header class="blog-hero">
		<div class="blog-hero__inner">
			<p class="blog-hero__eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
			<h1 class="blog-hero__title"><?= $seo_title ?: get_the_title(); ?></h1>
			<?php if($tagline): ?>
			<p class="blog-hero__tagline"><?= esc_html($tagline); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<div class="blog-layout">

		<section class="blog-main">
			<?php if ( $blog_query->have_posts() ) : ?>

				<div class="blog-grid">
					<?php while ( $blog_query->have_posts() ) : $blog_query->the_post();
						$post_categories = get_the_category();
						$primary_cat     = ! empty( $post_categories ) ? $post_categories[0] : null;
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="blog-card__image-link" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'medium_large', array( 'class' => 'blog-card__image' ) ); ?>
						</a>
						<?php endif; ?>

						<div class="blog-card__body">
							<?php if ( $primary_cat ) : ?>
							<a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>"
							   class="blog-card__category"><?php echo esc_html( $primary_cat->name ); ?></a>
							<?php endif; ?>

							<h2 class="blog-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>

							<p class="blog-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30, '&hellip;' ); ?></p>

							<div class="blog-card__footer">
								<time class="blog-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
								</time>
								<a href="<?php the_permalink(); ?>" class="blog-card__cta">Read more</a>
							</div>
						</div>

					</article>
					<?php endwhile; ?>
				</div>

				<?php if ( $blog_query->max_num_pages > 1 ) : ?>
				<nav class="blog-pagination" aria-label="Blog pagination">
					<?php
					echo paginate_links( array(
						'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'format'    => '?paged=%#%',
						'current'   => $paged,
						'total'     => $blog_query->max_num_pages,
						'prev_text' => '&laquo;',
						'next_text' => '&raquo;',
						'type'      => 'list',
					) );
					?>
				</nav>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p class="blog-no-posts">No posts found.</p>
			<?php endif; ?>
		</section>

		<?php if ( ! empty( $categories ) ) : ?>
		<aside class="blog-sidebar" aria-label="Blog sidebar">

			<div class="blog-sidebar__widget">
				<h3 class="blog-sidebar__heading">Browse by Category</h3>
				<ul class="blog-sidebar__list">
					<?php foreach ( $categories as $cat ) : ?>
					<li>
						<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
							<?php echo esc_html( $cat->name ); ?>
							<span class="blog-sidebar__count">(<?php echo intval( $cat->count ); ?>)</span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>

		</aside>
		<?php endif; ?>

	</div><!-- .blog-layout -->

</main>

<?php get_footer(); ?>
