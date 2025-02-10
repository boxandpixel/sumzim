<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php //sumzim_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();
  
    $specs = get_field('specs');

    if($specs): 
    ?>

    <div class="filter-specs">
      <?php echo $specs; ?>
    </div>

    <?php endif; ?>

    <?php 
    $affiliate_link = get_field('affiliate_link');

    if($affiliate_link):
?>
    <div class="filter-link">
      <a href="<?php echo $affiliate_link['url']; ?>" class="button button--primary">
      <?php echo $affiliate_link['title']; ?>
      </a>
    </div>


<?php
    endif;
?>    

  <?php 
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
