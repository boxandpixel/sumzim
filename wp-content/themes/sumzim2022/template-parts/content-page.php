<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$page_settings      = get_field('page_settings');
$seo_title          = $page_settings['seo_title'] ?? '';
$show_breadcrumb    = $page_settings['show_breadcrumb'] ?? false;

$parent_id = wp_get_post_parent_id( get_the_ID() );
if ( $parent_id ) {
	$breadcrumb_parent_url   = get_permalink( $parent_id );
	$breadcrumb_parent_label = get_the_title( $parent_id );
} else {
	$breadcrumb_parent_url   = home_url( '/' );
	$breadcrumb_parent_label = 'Home';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( $show_breadcrumb ) : ?>
		<div class="container entry-header__breadcrumb">
			<nav class="blog-breadcrumb" aria-label="Breadcrumb">
				<a href="<?= esc_url( $breadcrumb_parent_url ); ?>" class="blog-breadcrumb__parent"><?= esc_html( $breadcrumb_parent_label ); ?></a>
				<span class="blog-breadcrumb__sep">/</span>
				<span class="blog-breadcrumb__current"><?= esc_html( get_the_title() ); ?></span>
			</nav>
		</div>
		<?php endif; ?>

		<h1><?= $seo_title ?: get_the_title(); ?></h1>
	</header><!-- .entry-header -->

	<?php sumzim_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sumzim' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'sumzim' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->