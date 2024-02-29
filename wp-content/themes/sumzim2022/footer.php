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

<!-- phone insertion script begins -->
<script>

  function ybFun_CustomFindAndReplace(searchText, replacement, searchNode) {
      var qsParm = ybFun_RetreiveQueryParams();
      if (!searchText || typeof replacement === 'undefined') {
          return;
      }

      var targetNum = searchText.toString();
      var provisionNum = replacement.toString();
      var delims = new Array();
      delims[0] = "";
      delims[1] = "-";
      delims[2] = ".";
      for (var i = 0; i < delims.length; i++) {
          var delimToUse = delims[i];
          var newTargetNum = targetNum.substring(1, 4) + delimToUse + targetNum.substring(4, 7) + delimToUse + targetNum.substring(7, 11);
          var newProvisionNum = provisionNum.substring(1, 4) + delimToUse + provisionNum.substring(4, 7) + delimToUse + provisionNum.substring(7, 11);
          ybFun_GenericFindAndReplace(newTargetNum, newProvisionNum);
      }
      var newTargetNum = "\\(" + targetNum.substring(1, 4) + "\\)\\s*"+ targetNum.substring(4, 7) + "-" + targetNum.substring(7, 11);
      var newProvisionNum = "(" + provisionNum.substring(1, 4)  + ") "+  provisionNum.substring(4, 7) + "-" +  provisionNum.substring(7, 11);
      ybFun_GenericFindAndReplace(newTargetNum, newProvisionNum);
  }

  function ybFun_GenericFindAndReplace(searchText, replacement, searchNode) {
      var regex = typeof searchText === 'string' ? new RegExp(searchText, 'g') : searchText;
      var bodyObj = document.body;
      var content = bodyObj.innerHTML;
      if (regex.test(content)) {
          content = content.replace(regex, replacement);
          bodyObj.innerHTML = content;
      }
  }

  function ybFun_RetreiveQueryParams() {
      var qsParm = new Array();
      var query =decodeURIComponent(parent.document.location.href);
      query = query.substring(query.indexOf('?') + 1, query.length);
      var parms = query.split('&');
      for (var i = 0; i < parms.length; i++) {
          var pos = parms[i].indexOf('=');
          if (pos > 0) {
              var key = parms[i].substring(0, pos);
              var val = parms[i].substring(pos + 1);
              val = val.replace("#", "");
              qsParm[key] = val;
          }
      }
      return qsParm;
  }

  var ybFindPhNums = [];
  var ybReplacePhNums = [];

  var ybFindCustomText = [];
  var ybReplaceCustomText = [];

  function ybFun_ReplaceText() {
      var qsParm = ybFun_RetreiveQueryParams();
      var useYB = qsParm['useYB'];

      var cookieUseYB = null;
      if (useYB == null) {
          cookieUseYB = ybFun_ReadCookie("useYB");
          if (cookieUseYB != null) {
              useYB = cookieUseYB;
          }
      }

      if (useYB != null) {
          ybFun_CreateCookie("useYB", useYB);
          if (ybFindPhNums == null || ybReplacePhNums == null || ybFindPhNums.length == 0 || ybReplacePhNums.length == 0
                  || ybFindPhNums.length != ybReplacePhNums.length) {
              return;
          }
          if (ybFindCustomText != null && ybReplaceCustomText != null) {
              if (ybFindCustomText.length != ybReplaceCustomText.length) {
                  return;
              }
          }

          if (useYB == '') {
              for (var i = 0; i < ybFindPhNums.length; i++) {
                  ybFun_CustomFindAndReplace(ybFindPhNums[i], ybReplacePhNums[i]);
              }

          } else {
              var idxs = useYB.split(',');
              for (var i = 0; i < idxs.length; i++) {
                  if (ybFun_IsDigit(idxs[i])) {
                      ybFun_CustomFindAndReplace(ybFindPhNums[(idxs[i] - 1)], ybReplacePhNums[(idxs[i] - 1)]);
                  }
              }
          }
      }
  }

  function ybFun_IsDigit(strVal) {
      var reg = new RegExp("^[0-9]$");
      return (reg.test(strVal));
  }

  function ybFun_CreateCookie(name, value, days) {
      if (days == null) {
          days = 90;
      }
      var date = new Date();
      date.setTime( date.getTime() + (days * (24*60*60*1000)) );
      var expires = "; expires="+date.toGMTString();
      document.cookie = name + "=" + value + expires + "; path=/";
  }

  function ybFun_ReadCookie(name) {
      var nameLookup = name;
      var cookieArr = document.cookie.split(';');
      for(var i=0; i < cookieArr.length; i++) {
          var cookieNV = cookieArr[i];
          while (cookieNV.charAt(0) == " ") {
              cookieNV = cookieNV.substring(1, cookieNV.length);
          }
          if (cookieNV.indexOf(nameLookup + "=") == 0) {
              return cookieNV.substring( (nameLookup.length + 1) ,cookieNV.length);
          }
          if (cookieNV.indexOf(nameLookup) == 0) {
              return "";
          }
      }
      return null;
  }

  function ybFun_EraseCookie(name) {
      ybFun_CreateCookie(name, "", -1);
  }
</script>

<script>


  ybFindPhNums = ['16105935129', '16105935129', '16105935129', '16105935129', '16105935129'];
  ybReplacePhNums = ['18775093463', '14842972338', '14842972450', '18778447906', '16106283841'];

  ybFun_ReplaceText();

  </script>

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
<script defer src="https://connect.podium.com/widget.js#ORG_TOKEN=de2c3c70-a55d-4045-b2db-c32074c317f6" id="podium-widget" organization-api-token="de2c3c70-a55d-4045-b2db-c32074c317f6"></script>	
<?php } ?>

<script type="text/javascript" src="//cdn.callrail.com/companies/947309817/e478a06236ed8312de3e/12/swap.js"></script>
</body>
</html>
