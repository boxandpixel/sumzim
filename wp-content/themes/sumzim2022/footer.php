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

<script>

(function(q,w,e,r,t,y,u){q[t]=q[t]||function(){(q[t].q = q[t].q || []).push(arguments)};

  q[t].l=1*new Date();y=w.createElement(e);u=w.getElementsByTagName(e)[0];y.async=true;

  y.src=r;u.parentNode.insertBefore(y,u);q[t]('init', '05e09310-291c-4804-8f21-0a371f946097');

})(window, document, 'script', 'https://static.servicetitan.com/text2chat/shim.js', 'T2CWidgetManager');

</script>

<!-- <script>
  jQuery(document).ready(function($) {
    $(document).on('gform_pre_submission', function(event, formId) {
      console.log("submitted!");
      if (formId === 1 || formId === 10) {
          // Get the ZIP code from the address input (input_3.5)
          var zipCode = $("input[name='input_3.5']").val();

          console.log(zipCode);

          // Check if the ZIP code is populated
          if (zipCode) {
              // Create a new hidden field to store the ZIP code
              var zipHiddenField = $("<input>", {
                  type: "hidden",
                  name: "input_zip_code",
                  value: zipCode
              });

              // Append the hidden field to the form before submission
              $(event.target).append(zipHiddenField);
          }
      }
    });
  });
</script> -->



</body>
</html>
