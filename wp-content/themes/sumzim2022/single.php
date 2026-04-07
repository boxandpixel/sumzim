<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();

while ( have_posts() ) :
	the_post();

	// ── Post data ──────────────────────────────────────────────────────────────
	$post_categories  = get_the_category();
	$primary_cat      = ! empty( $post_categories ) ? $post_categories[0] : null;
	$thumbnail_url    = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$post_tags        = get_the_tags();

	// Read time
	$word_count  = str_word_count( strip_tags( get_the_content() ) );
	$read_time   = max( 1, (int) ceil( $word_count / 200 ) );

	// Rendered content with IDs added to H2s for TOC anchors
	$rendered_content = apply_filters( 'the_content', get_the_content() );
	preg_match_all( '/<h2[^>]*>(.*?)<\/h2>/is', $rendered_content, $h2_matches );

	$toc_headings = array();
	foreach ( $h2_matches[1] as $heading_html ) {
		$text           = trim( strip_tags( $heading_html ) );
		$toc_headings[] = array(
			'text' => $text,
			'id'   => sanitize_title( $text ),
		);
	}

	$rendered_content = preg_replace_callback(
		'/<h2([^>]*)>(.*?)<\/h2>/is',
		function ( $matches ) {
			if ( strpos( $matches[1], 'id=' ) !== false ) {
				return $matches[0];
			}
			$id = sanitize_title( trim( strip_tags( $matches[2] ) ) );
			return '<h2' . $matches[1] . ' id="' . esc_attr( $id ) . '">' . $matches[2] . '</h2>';
		},
		$rendered_content
	);

	// Related posts (same category, excluding current)
	$related_posts = array();
	if ( $primary_cat ) {
		$related_query = new WP_Query( array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 3,
			'cat'            => $primary_cat->term_id,
			'post__not_in'   => array( get_the_ID() ),
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );
		$related_posts = $related_query->posts;
		wp_reset_postdata();
	}

	// Prev / next posts
	$prev_post = get_previous_post();
	$next_post = get_next_post();

	$blog_page_url = get_permalink( get_page_by_path( 'about-us/blog' ) );
?>

<main id="primary" class="site-main post-single">

	<!-- ── Hero ──────────────────────────────────────────────────────────── -->
	<div class="post-hero<?php echo $thumbnail_url ? ' post-hero--has-image' : ' post-hero--no-image'; ?>"
	     <?php if ( $thumbnail_url ) : ?>style="background-image: url('<?php echo esc_url( $thumbnail_url ); ?>');"<?php endif; ?>>
		<div class="post-hero__overlay"></div>
		<div class="post-hero__content">
			<nav class="blog-breadcrumb" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( $blog_page_url ); ?>" class="blog-breadcrumb__parent">Blog &amp; Resources</a>
				<span class="blog-breadcrumb__sep">/</span>
				<span class="blog-breadcrumb__current"><?php the_title(); ?></span>
			</nav>
			<p class="post-hero__eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
			<?php if ( $primary_cat ) : ?>
			<a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>" class="post-hero__category"><?php echo esc_html( $primary_cat->name ); ?></a>
			<?php endif; ?>
			<h1 class="post-hero__title"><?php the_title(); ?></h1>
			<div class="post-hero__meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></time>
				<span class="post-hero__read-time"><?php echo $read_time; ?> min read</span>
			</div>
		</div>
	</div>

	<!-- ── Content ───────────────────────────────────────────────────────── -->
	<div class="post-wrap">

		<?php if ( count( $toc_headings ) >= 2 ) : ?>
		<nav class="post-toc" aria-label="Table of contents">
			<p class="post-toc__label">In this article</p>
			<ol class="post-toc__list">
				<?php foreach ( $toc_headings as $heading ) : ?>
				<li><a href="#<?php echo esc_attr( $heading['id'] ); ?>"><?php echo esc_html( $heading['text'] ); ?></a></li>
				<?php endforeach; ?>
			</ol>
		</nav>
		<?php endif; ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-body' ); ?>>
			<?php echo $rendered_content; ?>
		</article>

		<!-- ── Tags ──────────────────────────────────────────────────────── -->
		<?php if ( $post_tags ) : ?>
		<div class="post-tags">
			<span class="post-tags__label">Topics:</span>
			<?php foreach ( $post_tags as $tag ) : ?>
			<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tags__pill"><?php echo esc_html( $tag->name ); ?></a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>


	</div><!-- .post-wrap -->

</main>

<?php
endwhile;
get_footer();
?>
