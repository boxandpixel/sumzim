<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

$current_term = get_queried_object();
$current_cat_id = ( $current_term instanceof WP_Term ) ? $current_term->term_id : 0;
$categories = get_categories( array( 'hide_empty' => true ) );
?>

<main id="primary" class="site-main blog-landing">

	<header class="blog-hero">
		<div class="blog-hero__inner">
			<nav class="blog-breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'about-us/blog' ) ) ); ?>" class="blog-breadcrumb__parent">Blog &amp; Resources</a>
				<span class="blog-breadcrumb__sep">/</span>
				<span class="blog-breadcrumb__current"><?php the_archive_title(); ?></span>
			</nav>
			<p class="blog-hero__eyebrow">Summers &amp; Zim's</p>
			<h1 class="blog-hero__title"><?php the_archive_title(); ?></h1>
			<?php
			$description = get_the_archive_description();
			if ( $description ) : ?>
			<p class="blog-hero__tagline"><?php echo wp_kses_post( $description ); ?></p>
			<?php else : ?>
			<p class="blog-hero__tagline">Tips, guides, and updates from the Summers &amp; Zim's team.</p>
			<?php endif; ?>
		</div>
	</header>

	<div class="blog-layout">

		<section class="blog-main">
			<?php if ( have_posts() ) : ?>

				<div class="blog-grid">
					<?php while ( have_posts() ) : the_post();
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

				<nav class="blog-pagination" aria-label="Blog pagination">
					<?php
					global $wp_query;
					echo paginate_links( array(
						'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'format'    => '?paged=%#%',
						'current'   => max( 1, get_query_var( 'paged' ) ),
						'total'     => $wp_query->max_num_pages,
						'prev_text' => '&laquo;',
						'next_text' => '&raquo;',
						'type'      => 'list',
					) );
					?>
				</nav>

			<?php else : ?>
				<p class="blog-no-posts">No posts found in this category.</p>
			<?php endif; ?>
		</section>

		<?php if ( ! empty( $categories ) ) : ?>
		<aside class="blog-sidebar" aria-label="Blog sidebar">

			<div class="blog-sidebar__widget">
				<h3 class="blog-sidebar__heading">Browse by Category</h3>
				<ul class="blog-sidebar__list">
					<?php foreach ( $categories as $cat ) : ?>
					<li class="<?php echo ( $current_cat_id === $cat->term_id ) ? 'is-active' : ''; ?>">
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
