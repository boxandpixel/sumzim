<?php

  $footer = get_field("footer", "options");

  $logo = $footer['logo'];
  $tagline = $footer['tagline'];

  $cta = $footer['cta'] ?? '';
  $cta_type = $cta['cta_type'] ?? '';
  $link = $cta['link'] ?? '';

  if(!empty($link)):
    $link_target = $link['target'] ? $link['target'] : '_self';
  endif;

  $book_now = $cta['book_now'] ?? '';

  $phone_number = $footer['phone_number'] ?? '';
  $clean_phone = preg_replace('/[^0-9]/', '', $phone_number);

  $safety_seal = $footer['safety_seal'] ?? []; 
  $associations = $footer['associations'] ?? [];
  $social_icons = $footer['social_icons'] ?? [];

  
  
  /** Get Menu Names */
	$locations = get_nav_menu_locations();

	/** Menu Name: Footer Services */
	$footer_services_menu_id = $locations['footer-services-menu'] ?? ''; 
	$footer_services_menu = wp_get_nav_menu_object($footer_services_menu_id);

  /** Menu Name: Footer About */
	$footer_about_menu_id = $locations['footer-about-menu'] ?? ''; 
	$footer_about_menu = wp_get_nav_menu_object($footer_about_menu_id);

  /** Menu Name: Footer Locations */
	$footer_services_locations_id = $locations['footer-locations-menu'] ?? ''; 
	$footer_locations_menu = wp_get_nav_menu_object($footer_services_locations_id);

  /**
   * Footer CTA Variables
   */

  $footer_banner = get_field("footer_banner", "options");

  // var_dump($footer_cta);

  $heading = $footer_banner['heading'] ?? '';
  $description = $footer_banner['description'] ?? '';
  
  $footer_banner_cta = $footer_banner['cta'] ?? '';
  $footer_banner_cta_type = $footer_banner_cta['cta_type'] ?? '';
  $footer_banner_link = $footer_banner_cta['link'] ?? '';

  if(!empty($footer_banner_link)):
    $footer_banner_link_target = $footer_banner_link['target'] ? $footer_banner_link['target'] : '_self';
  endif;

  $footer_banner_book_now = $footer_banner_cta['book_now'] ?? '';  
?>

<div class="footer-cta">
  <div class="footer-cta__card">
    <h4><?= esc_html($heading); ?></h4>
    <?= wp_kses_post($description); ?>

    <?php 
      if($footer_banner_cta_type == "Link"): 
    ?>  
    <a href="<?= $footer_banner_link['url']; ?>"><?= $footer_banner_link['title']; ?></a>
    <?php elseif($footer_banner_cta_type == "Book Now"): ?>
    <button class="button__book-now button__book-now--primary" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?= esc_html($footer_banner_book_now); ?></button>
    <?php endif; ?>    

  </div>
</div>

<footer class="site-footer">
  <div class="footer__header">
    <div class="footer__header-brand">
      <img src="<?= esc_attr($logo['url']) ?>" alt="<?= esc_attr($logo['alt']) ?>" class="footer__header-brand-logo">
      <p class="footer__header-brand-tagline"><?= esc_html($tagline); ?></p>
    </div>
    <div class="footer__header-contact">
      
      <?php 
      
        if($cta_type == "Link"): 
      ?>  
      <a href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
      <?php elseif($cta_type == "Book Now"): ?>
      <button class="button__book-now button__book-now--secondary" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?= esc_html($book_now); ?></button>
      <?php endif; ?>

      <a href="tel: <?= $clean_phone; ?>" target="_blank" class="footer__contact-number"><?= esc_html($phone_number); ?></a>
    </div>
  </div>
  <div class="footer__main">
    <div class="footer__main-menus">
      <div class="footer__menu-services">
        <h5><?php echo $footer_services_menu->name; ?></h5>
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-services-menu',
              'menu_id'        => 'footer-services-menu',
            )
          );					
        ?>  
      </div>
      <div class="footer__menu-about">
        <h5><?php echo $footer_about_menu->name; ?></h5>
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-about-menu',
              'menu_id'        => 'footer-about-menu',
            )
          );					
        ?>  
      </div>
      <div class="footer__menu-locations">
        <h5><?php echo $footer_locations_menu->name; ?></h5>
        <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer-locations-menu',
              'menu_id'        => 'footer-locations-menu',
            )
          );					
        ?>  
      </div>
    </div>
    <div class="footer__main-brand-associations">
      <div class="footer__brand-associations-badge">
          <img src="<?= esc_attr($safety_seal['url']); ?>" alt="<?= esc_attr($safety_seal['alt']); ?>" class="footer__brand-badge">
      </div>
      <ul class="footer__associations">
        <?php foreach($associations as $association): ?>
          
          <li>
            <img src="<?= esc_attr($association['association']['url']); ?>" alt="<?= esc_attr($association['association']['alt']); ?>">
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="footer__footer">
    <?= '&copy; ' . date('Y') . ' Summers &amp; Zim\'s'; ?>

    <?php
      wp_nav_menu(
        array(
          'theme_location' => 'footer-utility-menu',
          'menu_id'        => 'footer-utility-menu',
        )
      );					
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


<script
  data-api-key="d9qkujhrus8g37jijaslp2o3"
  data-schedulerid="sched_ejqbmr1e0g7tagr59sdo4rr2"
  defer
  id="se-widget-embed"
  src="https://embed.scheduler.servicetitan.com/scheduler-v1.js"
></script>

<?php 
/**
 * StackAdapt Book Now tracking
 */
if(is_front_page()): 

?>
<script>
        document.querySelectorAll('.home__hero-link--desktop .button--schedule, .home__hero-link-mobile-alt button, .nav-book-now .button--schedule').forEach(function (option) {option.addEventListener("click", function() {
                !function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('conv', 'iV4x5qdg1gLpu8U4bOr4nc');
})});
</script>
<?php endif; ?>

	<!-- Start StackAdapt Pixel -->
	<script>!function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('ts', 'MzKT5xYhsXoA2GRtEnje6g');</script>
	<!-- End StackAdapt Universal Pixel -->

	<!-- Start StackAdapt Click to Call Pixel -->
	<?php if(!is_page("free-estimate")): ?>
	<script>
		document.getElementById("sa-click-to-call").addEventListener("click",function() { !function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('conv', 'cuJArc7ZMDOyfyEhCMMMuU'); });
	</script>
	<?php endif; ?>
			
	<!-- End StackAdapt Click to Call Pixel -->

	<!-- StackAdapt: Pay Online -->
	<script>
			document.getElementById("pay-online-menu-item").addEventListener("click",function() {
					!function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('conv', '97jggc45ox7tJbCnR4CEbJ');
			});
	</script>	 

</body>
</html>
