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

    <script>
  const navBookNow = document.querySelector(".nav-book-now");

  if(navBookNow) {
    navBookNow.innerHTML = "";
    const navBookButton = document.createElement('button');
    navBookButton.innerText = "Book Now";
    navBookButton.classList.add('button-cta', 'button--schedule');
    navBookNow.insertAdjacentElement('afterbegin', navBookButton);
  }

  const navSchedule = () => {
    ScheduleEngine.show();
  }

  navBookNow.addEventListener('click', navSchedule);
  
  </script>

<?php if(is_page("contact-us")): ?>        
  <script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
      ga('send', 'event', 'Contact Form', 'Send Message', 'Contact Us');
  }, false );
  </script>
<?php endif; ?>

  <script type="application/ld+json">
  {
    "@context" : "http://schema.org",
    "@type" : "LocalBusiness",
    "name" : "Summers & Zim’s",
    "image" : "https://sumzim.com/wp-content/uploads/2018/07/logo-summers-and-zims.svg",
    "telephone" : "(610) 593-5129",
    "email" : "info@sumzim.com",
    "address" : {
      "@type" : "PostalAddress",
      "streetAddress" : "403 Valley Avenue, P.O. Box 220",
      "addressLocality" : "Atglen",
      "addressRegion" : "PA",
      "addressCountry" : "US",
      "postalCode" : "19310"
    },
    "url" : "https://sumzim.com/"
  }
</script>



<?php wp_footer(); ?>

<?php
$args = array(
	'fields' => 'ids',
	'numberposts' => -1,
	'post_type' => 'post',
);
$posts = get_posts($args);

if (!is_single($posts) && !is_page('blog')) { ?>
<script async src="https://connect.podium.com/widget.js#ORG_TOKEN=de2c3c70-a55d-4045-b2db-c32074c317f6" id="podium-widget" organization-api-token="de2c3c70-a55d-4045-b2db-c32074c317f6"></script>	
<?php } ?>

</body>
</html>
