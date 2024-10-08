<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

<footer class="footer">
  <div class="footer__contact-info">
    <section class="footer__copyright">
      <p>&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </section>

    <section class="footer__address-information">
      <?php
        if(get_field('address_information', 'option')):
          echo get_field('address_information', 'option');
        endif;
      ?>
    </section>  
  </div>
  <div class="footer__ancillary">
    <?php
      if(get_field('ancillary_information', 'option')):
        echo get_field('ancillary_information', 'option');
      endif;
    ?>
  </div>
</footer>



<?php wp_footer(); ?>

</body>
</html>
