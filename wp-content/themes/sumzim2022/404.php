<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header();
?>

    <!-- Hero -->
    <?php 
        $hero_image = get_field('404_hero_image', 'option');
        $hero_page_title = get_field('404_hero_page_title', 'option');
        $hero_subheading = get_field('404_hero_subheading', 'option');
        $hero_content = get_field('404_content', 'option');
    ?>
    <div class="hero" style="background: url('<?php echo $hero_image['url']; ?>') center / cover no-repeat">
        <div class="hero__page-title">
            <h1><?php echo $hero_page_title; ?></h1>
            <h4><?php echo $hero_subheading; ?></h4>
        </div>  
    </div>

    <div class="content__page">
        <!-- Begin Page Content Options -->
        <div class="page-not-found">
          <?php echo $hero_content; ?>
        </div>
        <!-- End Page Content Options -->
    </div>

<?php
get_footer();
