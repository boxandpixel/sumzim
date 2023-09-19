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
      <div class="filter-single">
          <figure class="filter-single__figure">
            <?php the_post_thumbnail(); ?>
          </figure>
          
          <div class="filter-single__detail">
              <h2 class="entry-title"><?php the_title(); ?></h2>
              <h6>Description</h6>
				<?php the_content(); ?>

            <?php
              $specs = get_field('specs');
            ?>

            <?php if($specs): ?>
            <div class="filter-single__specs">

              <h6>Specs</h6>
              <?php echo $specs; ?>
            </div>
            <?php endif; ?>

            <?php 
                $affiliate_link = get_field('affiliate_link');

                if($affiliate_link):
            ?>
                <a href="<?php echo $affiliate_link['url']; ?>" class="button button--primary">
                <?php echo $affiliate_link['title']; ?>
                </a>
            
            <?php
                endif;
            ?>
          </div>
          
      </div>

</article><!-- #post-<?php the_ID(); ?> -->
