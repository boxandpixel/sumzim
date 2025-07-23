<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Test 20250410 3:32pm -->
	<meta charset="utf-8">	
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

	<!-- Load Swiper -->
	<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
	/>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>	 

	<!-- Load AOS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<!-- Initialize AOS and Swiper -->
	<script>
		document.addEventListener("DOMContentLoaded", () => {
			AOS.init();

			const swiper = new Swiper(".home__staff-slides", {
				slidesPerView: 2,
				slidesPerGroup: 2,
				spaceBetween: 10,
				lazy: true,
				loop: true,
				autoHeight: true,
				breakpoints: {
					480: {
					slidesPerView: 3,
					slidesPerGroup: 3,
					spaceBetween: 10,
					},
					768: {
					slidesPerView: 4,
					slidesPerGroup: 4,
					spaceBetween: 10,
					},
					960: {
					slidesPerView: 5,
					slidesPerGroup: 5,
					spaceBetween: 10,
					},
					1280: {
					slidesPerView: 6,
					slidesPerGroup: 6,
					spaceBetween: 20,
					},
					1600: {
					slidesPerView: 8,
					slidesPerGroup: 8,
					spaceBetween: 20,
					},
				},
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
				});

				const content_features = new Swiper(".home__content-features-slides", {
				slidesPerView: 1,
				slidesPerGroup: 1,
				lazy: true,
				loop: true,
				autoHeight: true,
				observer: true,
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
				});			
		});
	</script>
		

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NFL8X42V');</script>
	<!-- End Google Tag Manager -->



<script

  data-api-key="d9qkujhrus8g37jijaslp2o3"

  data-schedulerid="sched_ejqbmr1e0g7tagr59sdo4rr2"

  defer

  id="se-widget-embed"

  src=https://embed.scheduler.servicetitan.com/scheduler-v1.js

></script>	


<!-- Google Fonts -->
<!-- 20231117 -->
<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
<link rel="preload"
      as="style"
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />

<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap"
      media="print" onload="this.media='all'" />

<noscript>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />
</noscript>

	<!-- preload video poster -->
	 <link rel="preload" as="image" href="https://sumzim.com/wp-content/uploads/2024/11/home-background.webp">


  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
  <meta name="msapplication-TileColor" content="#16375a">
  <meta name="theme-color" content="#ffffff">	


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<?php if(is_page(array('reviews'))): ?>

  	<script src="/wp-content/themes/sumzim2022/google-places.js"></script>
  	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDSRvqTsYQXGTJ3gCbaaSXvAIqnnT3MMiM"></script>

	<script>
		jQuery(document).ready(function() {
			$("#google-reviews").googlePlaces({
				placeId: 'ChIJd5IeY6tFxokR8QWJk68CUpI',
				render: ['reviews'],
				min_rating: 5,
				max_rows: 0,
				shorten_names: false,
			});
		});
	</script>	
	<?php endif; ?>

    <?php if(is_page(array('memberships', 'membership-benefits', 'heating-system-repair', 'heating-system-maintenance',
	'heating-system-installation'))): ?>

  	<script src="/wp-content/themes/sumzim2022/google-places.js"></script>
  	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDSRvqTsYQXGTJ3gCbaaSXvAIqnnT3MMiM"></script>

	<script>
		jQuery(document).ready(function() {
			$("#google-reviews-site").googlePlaces({
				placeId: 'ChIJd5IeY6tFxokR8QWJk68CUpI',
				render: ['reviews'],
				min_rating: 5,
				max_rows: 1,
				shorten_names: false,
			});
		});
	</script>	
	<?php endif; ?>  	

	<?php if(!is_page('free-estimate')): ?>
	<!-- Reviews Block -->
	<script>
		jQuery(document).ready(function() {
			$("#reviews-container").googlePlaces({
				placeId: 'ChIJd5IeY6tFxokR8QWJk68CUpI',
				render: ['reviews'],
				min_rating: 5,
				max_rows: 3,
				shorten_names: false,
				staticMap: false,
			});
		});
	</script>	
	<?php endif; ?>  	

	<!-- Audacy -->
	<style>
		.audacy {
		position: absolute;
				width: 1px;
				height: 1px;
				padding: 0;
				margin: -1px;
				overflow: hidden;
				clip: rect(0, 0, 0, 0);
				white-space: nowrap; /* added line */
				border: 0;
		}
		</style>


</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFL8X42V"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	 

    <img height="1" width="1" class="audacy" style="border-style:none;" alt="" src="https://insight.adsrvr.org/track/pxl/?adv=mw5wx89&ct=0:ouqlti8&fmt=3"/>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sumzim' ); ?></a>
	<?php
		$show_alert = get_field('show_alert', 'option');
		$alert_message = get_field('alert_message', 'option');
		$alert_link = get_field('alert_link', 'option');

		if($show_alert): ?> 
		
		<div class="alert">
		<?php if($alert_message): ?>
		<?php echo $alert_message; ?>
		<?php endif; ?>
		<?php if($alert_link): ?>
			<a href="<?php echo $alert_link['url']; ?>" class="button button--attention"><?php echo $alert_link['title']; ?></a>
		<?php endif; ?>
		
			<button class="alert__button-close">
				<span>Close</span>
				<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
				<path d="M0 0h24v24H0z" fill="none"/>
				<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
				</svg>
			</button>
		</div>
		<?php endif; ?>

		<?php 
			$date = time();

			$contestStart = strtotime('2024-04-24 11:00:00');

			if ($date > $contestStart):
		?>
		<div class="header__status">
			<p class="header__status-message" id="statusAll"></p>
			<div class="utility-menu">
			<?php
					wp_nav_menu(
						array('menu' => 'utility-menu')
					);
					?>				
			</div>
		</div>
		<div class="banner__tommys-electric">
			<div>
				<div class="banner__tommys-electric-logo">
					<img src="/wp-content/themes/sumzim2022/assets/tommys-electric-logo.png" alt="">
				</div>
				<div class="banner__tommys-electric-content">
					<p><a href="/services/electrical-service/"><span>Tommy's Electric has joined the Summers & Zim's family.</span> <span>We now offer full electrical services for your home.</span></a></p>
				</div>	
			</div>		
		</div>
		<div class="header__mobile-call">
			<h2>Call us 24/7 at <a href="tel:6105935129" id="sa-click-to-call">610-593-5129</a></h2>
		</div>
		<?php endif; ?>
		<header class="site-header">
		<button class="header__nav-button" aria-haspopup="true" aria-controls="menu-primary-navigation" aria-expanded="false">
			<span class="header__nav-button-span">Menu</span>
			<div class="header__nav-button-icon">
				<svg class="header__nav-button-icon-menu" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
				<path d="M0 0h24v24H0z" fill="none"/>
				<path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
				</svg>
				<svg class="header__nav-button-icon-close" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
				<path d="M0 0h24v24H0z" fill="none"/>
				<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
				</svg>
			</div>

		</button>
		
		<?php 
			$logo = get_field('logo', 'options');
			$logo_min = get_field('logo_minified', 'options');
			$badge = get_field('years_of_experience', 'options');

		?>

		<div class="header__content">

			
			<div class="header__content-branding">
			<a class="header__brand-link" href="<?php echo home_url('/'); ?>" title="Summers &amp; Zim's">
				<img class="header__brand-logo-min" src="<?php echo $logo_min['url']; ?>" alt="<?php echo $logo_min['alt']; ?>">
				<img class="header__brand-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
			</a>  
			<!-- badge update 2022/09/26 -->
			<div class="header__badge" style="background: url('<?php echo $badge['url']?>') left top no-repeat; background-size: cover;">
				<?php
				function getYears($then) {
					$then_ts = strtotime($then);
					$then_year = date('Y', $then_ts);
					$years = date('Y') - $then_year;
					if(strtotime('+' . $years . ' years', $then_ts) > time()) $years--;
					return $years;
				}
				?> 
				<span class="header__years"><?php print getYears('1930-01-01');  ?></span>      
			</div>   
			</div>
			<div class="header__content-actions">

				<!-- Added 20250225 -->
				<div class="header__reviews-social">
					<a href="https://g.page/r/CfEFiZOvAlKSEB0/review" target="_blank" class="header-google-reviews">
						<div class="header-google-reviews--excellent">
							<p>Excellent</p>
						</div>
						<div class="header-google-reviews--stars">
							<span class="material-symbols-outlined">star</span>
							<span class="material-symbols-outlined">star</span>
							<span class="material-symbols-outlined">star</span>
							<span class="material-symbols-outlined">star</span>
							<span class="material-symbols-outlined">star</span>
						</div>
						<div class="header-google-reviews--reviewTotal">
							<p id="reviewsCount">Fetching reviews...</p>
							<script>
								async function fetchGoogleReviews() {
									try {
										const response = await fetch("/wp-content/themes/sumzim2022/proxy.php"); // Call the PHP script
										const data = await response.json();

										if (data.result && data.result.user_ratings_total) {
											document.getElementById("reviewsCount").innerText = `${data.result.user_ratings_total} Google reviews`;
										} else {
											document.getElementById("reviewsCount").innerText = "Could not retrieve the total number of reviews.";
										}
									} catch (error) {
										console.error("Error fetching reviews:", error);
										document.getElementById("reviewsCount").innerText = "Error fetching data.";
									}
								}

								fetchGoogleReviews();
							</script>					 
						</div>
					</a>				
					<div class="header__social">
						<a href="https://www.facebook.com/SumZim" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 143.1">
								<g id="Layer_1" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
									<path d="M501.4 0H10.6C4.8 0 0 4.8 0 10.6v121.8c0 5.9 4.8 10.6 10.6 10.6h490.7c5.9 0 10.6-4.8 10.6-10.6V10.6c0-5.9-4.8-10.6-10.6-10.6Z" style="fill:#0866ff;fill-rule:evenodd"/>
									<path d="M127.9 143V0h7v143h-7Z" style="fill:#075ce6"/>
									<path fill="#fff" d="M106.2 71.7c0-22.2-18-40.2-40.2-40.2s-40.2 18-40.2 40.2 13 34.7 30.5 39V84H48V71.7h8.3v-5.3c0-13.7 6.2-20 19.6-20s6.9.5 8.7 1v11.1c-.9 0-2.6-.2-4.6-.2-6.6 0-9.1 2.5-9.1 9v4.3H84l-2.3 12.3H70.8v27.6c19.9-2.4 35.3-19.3 35.3-39.9ZM162.8 55.5V34.2h14.6v5.1h-8.8v3.5h7.1v4.7h-7.1v7.9h-5.9ZM179.7 55.5V34.2h5.9v21.3h-5.9ZM195.1 45.1v10.5h-5.9V34.3h4.6l8.6 10.8V34.3h5.8v21.3h-4.7L195 45.1ZM211.8 55.5V34.2h8.2c2.4 0 4.3.5 5.9 1.4 1.6 1 2.8 2.2 3.6 3.8.8 1.6 1.2 3.4 1.2 5.4s-.4 4-1.3 5.6c-.9 1.6-2.1 2.8-3.8 3.7-1.6.9-3.5 1.3-5.7 1.3h-8.2Zm13-10.7c0-1.1-.2-2.1-.6-2.9-.4-.8-.9-1.5-1.7-1.9-.7-.5-1.6-.7-2.6-.7h-2.3v11.1h2.3c1 0 1.9-.2 2.6-.7.7-.5 1.3-1.1 1.6-2s.6-1.8.6-2.9ZM249.4 55.7c-1.7 0-3.2-.3-4.4-.8-1.2-.6-2.2-1.3-3-2.3-.8-1-1.3-2.1-1.7-3.4-.4-1.3-.5-2.6-.5-4V34.3h5.8v10.9c0 .7 0 1.4.2 2s.4 1.2.7 1.7c.3.5.7.9 1.2 1.2.5.3 1 .4 1.7.4s1.3-.1 1.8-.4c.5-.3.9-.7 1.2-1.2.3-.5.5-1.1.6-1.7.1-.6.2-1.3.2-2V34.3h5.8v10.9c0 1.5-.2 2.9-.6 4.1-.4 1.3-1 2.4-1.8 3.4s-1.8 1.7-3 2.2-2.6.8-4.3.8ZM275.3 41.2c-.7-.4-1.3-.7-1.9-1-.6-.2-1.2-.5-1.8-.7-.7-.2-1.3-.3-2-.3s-.9 0-1.2.2c-.3.2-.5.4-.5.8s.2.6.5.9c.3.2.8.4 1.4.6.6.2 1.3.4 2.1.7 1.3.4 2.5.9 3.4 1.4 1 .5 1.7 1.2 2.2 2 .5.8.8 1.9.8 3.2s-.2 2.3-.7 3.2c-.5.9-1.1 1.6-1.9 2.1s-1.7.9-2.6 1.1-1.9.3-2.9.3-2.1-.1-3.2-.3c-1.1-.2-2.2-.5-3.2-.9s-2-.8-2.9-1.3l2.5-5.1c.8.5 1.5.9 2.2 1.2.7.3 1.4.6 2.2.8.8.2 1.6.4 2.4.4s1.1 0 1.3-.2c.2-.2.4-.4.4-.6 0-.4-.2-.7-.7-1-.4-.2-1-.4-1.7-.7-.7-.2-1.5-.5-2.4-.7-1.2-.4-2.3-.9-3.1-1.4-.8-.5-1.4-1.2-1.8-1.9-.4-.7-.6-1.6-.6-2.6 0-1.6.4-2.9 1.1-3.9s1.7-1.9 2.9-2.4 2.5-.8 3.9-.8 2 .1 3 .4c1 .3 1.9.6 2.7.9.9.4 1.6.7 2.2 1l-2.5 4.8ZM297.2 55.7c-1.6 0-3.1-.3-4.4-.9-1.3-.6-2.5-1.4-3.4-2.5-1-1-1.7-2.2-2.2-3.5s-.8-2.6-.8-4 .3-2.8.8-4 1.3-2.4 2.3-3.4c1-1 2.1-1.8 3.4-2.4 1.3-.6 2.8-.9 4.4-.9s3.1.3 4.4.9c1.3.6 2.5 1.4 3.4 2.5.9 1 1.7 2.2 2.2 3.5.5 1.3.8 2.6.8 4s-.3 2.7-.8 4c-.5 1.3-1.3 2.4-2.2 3.4-1 1-2.1 1.8-3.4 2.4-1.3.6-2.8.9-4.4.9Zm-4.8-10.8c0 .7.1 1.4.3 2.1.2.7.5 1.3.9 1.8s.9 1 1.5 1.3c.6.3 1.3.5 2.2.5s1.6-.2 2.2-.5c.6-.3 1.1-.8 1.5-1.3.4-.5.7-1.2.9-1.8.2-.7.3-1.4.3-2.1s0-1.4-.3-2.1c-.2-.7-.5-1.3-.9-1.8s-.9-.9-1.5-1.2c-.6-.3-1.3-.4-2.2-.4s-1.6.2-2.2.5c-.6.3-1.1.7-1.5 1.3-.4.5-.7 1.1-.9 1.8-.2.7-.3 1.4-.3 2.1ZM316.4 45.1v10.5h-5.8V34.3h4.6l8.6 10.8V34.3h5.8v21.3h-4.7l-8.5-10.5ZM164.3 110.9V72.6h26.3v9.2h-15.8v6.4h12.9v8.5h-12.9V111h-10.5ZM201.1 72.6h11.8l12.2 38.3h-10.7l-2-7.5h-10.8l-2 7.5h-10.7l12.3-38.3Zm9.4 23.8-3.6-13.5-3.6 13.5h7.1ZM224.6 91.4c0-2.3.4-4.6 1.3-6.9s2.2-4.3 3.9-6.1c1.7-1.8 3.8-3.3 6.2-4.4 2.4-1.1 5.2-1.6 8.2-1.6s6.9.8 9.6 2.3c2.7 1.5 4.8 3.6 6.1 6.1l-8 5.7c-.5-1.3-1.1-2.2-2-2.9-.9-.7-1.8-1.2-2.9-1.4-1-.3-2-.4-3-.4-1.5 0-2.8.3-3.9.9-1.1.6-2 1.4-2.7 2.3-.7 1-1.2 2.1-1.6 3.2-.3 1.2-.5 2.4-.5 3.6s.2 2.6.6 3.8c.4 1.2 1 2.3 1.7 3.3.8 1 1.7 1.7 2.8 2.2 1.1.5 2.3.8 3.7.8s2-.2 3-.5 1.9-.8 2.8-1.5c.8-.7 1.5-1.6 1.9-2.8l8.6 5.1c-.8 1.9-2 3.5-3.8 4.8-1.8 1.3-3.8 2.3-6 3.1-2.2.7-4.4 1.1-6.6 1.1s-5.4-.6-7.8-1.7c-2.4-1.1-4.4-2.6-6.1-4.5s-3-4-4-6.4c-.9-2.4-1.4-4.8-1.4-7.2ZM291.3 101.7v9.2H264V72.6h26.8v9.2h-16.3v5.4h13.9v8.5h-13.9v6h16.8ZM328.8 101.1c0 2.3-.6 4.2-1.9 5.6-1.2 1.4-2.9 2.5-5 3.2s-4.4 1-6.9 1h-18.8V72.6h22.2c1.8 0 3.4.5 4.7 1.4 1.3 1 2.3 2.2 3 3.7s1.1 3.1 1.1 4.7-.5 3.5-1.4 5.1c-.9 1.7-2.3 2.9-4.1 3.7 2.2.6 3.9 1.8 5.2 3.4 1.3 1.6 1.9 3.8 1.9 6.4Zm-22.1-19.6v5.9h7.2c.5 0 .9 0 1.4-.2.4-.2.8-.5 1.1-.9.3-.4.4-1 .4-1.8s-.1-1.3-.4-1.7c-.2-.4-.5-.7-.9-.9-.4-.2-.8-.3-1.3-.3h-7.5Zm11.4 17.4c0-.6-.1-1.2-.4-1.7-.2-.5-.5-.9-.9-1.2-.4-.3-.9-.4-1.4-.4h-8.7v6.4h8.3c.6 0 1.1-.1 1.6-.4.5-.3.8-.6 1.1-1.1.3-.5.4-1 .4-1.7ZM350.8 111.2c-2.9 0-5.6-.5-7.9-1.6-2.4-1.1-4.4-2.6-6.1-4.4-1.7-1.9-3-3.9-3.9-6.3-.9-2.3-1.4-4.7-1.4-7.2s.5-5 1.5-7.3 2.3-4.4 4.1-6.2c1.7-1.8 3.8-3.2 6.2-4.3 2.4-1 5-1.6 7.9-1.6s5.6.5 7.9 1.6c2.4 1.1 4.4 2.6 6.1 4.5 1.7 1.9 3 4 3.9 6.3s1.4 4.7 1.4 7.2-.5 4.9-1.4 7.2c-1 2.3-2.3 4.4-4.1 6.2-1.7 1.8-3.8 3.3-6.2 4.3-2.4 1.1-5 1.6-7.9 1.6Zm-8.7-19.5c0 1.3.2 2.5.5 3.8.4 1.2.9 2.3 1.6 3.2.7 1 1.6 1.7 2.7 2.3 1.1.6 2.4.8 3.9.8s2.8-.3 3.9-.9c1.1-.6 2-1.4 2.7-2.3.7-1 1.2-2.1 1.6-3.3.3-1.2.5-2.4.5-3.7s-.2-2.5-.5-3.7c-.4-1.2-.9-2.3-1.6-3.2-.7-1-1.6-1.7-2.8-2.2s-2.4-.8-3.9-.8-2.8.3-3.9.9c-1.1.6-2 1.3-2.7 2.3-.7 1-1.3 2-1.6 3.2-.3 1.2-.5 2.4-.5 3.7ZM392.1 111.2c-2.9 0-5.6-.5-7.9-1.6-2.4-1.1-4.4-2.6-6.1-4.4-1.7-1.9-3-3.9-3.9-6.3-.9-2.3-1.4-4.7-1.4-7.2s.5-5 1.5-7.3 2.3-4.4 4.1-6.2c1.7-1.8 3.8-3.2 6.2-4.3 2.4-1 5-1.6 7.9-1.6s5.6.5 7.9 1.6c2.4 1.1 4.4 2.6 6.1 4.5 1.7 1.9 3 4 3.9 6.3s1.4 4.7 1.4 7.2-.5 4.9-1.4 7.2c-1 2.3-2.3 4.4-4.1 6.2-1.7 1.8-3.8 3.3-6.2 4.3-2.4 1.1-5 1.6-7.9 1.6Zm-8.7-19.5c0 1.3.2 2.5.5 3.8.4 1.2.9 2.3 1.6 3.2.7 1 1.6 1.7 2.7 2.3 1.1.6 2.4.8 3.9.8s2.8-.3 3.9-.9c1.1-.6 2-1.4 2.7-2.3.7-1 1.2-2.1 1.6-3.3.3-1.2.5-2.4.5-3.7s-.2-2.5-.5-3.7c-.4-1.2-.9-2.3-1.6-3.2-.7-1-1.6-1.7-2.8-2.2s-2.4-.8-3.9-.8-2.8.3-3.9.9c-1.1.6-2 1.3-2.7 2.3-.7 1-1.3 2-1.6 3.2-.3 1.2-.5 2.4-.5 3.7ZM416.1 110.9V72.6h10.5v14.6l11.7-14.6h11.9l-13.9 17.2 14.9 21.2h-12.1l-9.5-14.1-2.9 3V111h-10.5Z"/>
								</g>
							</svg>							
						</a>
					</div>					
				</div>
				<p class="header__call">Call us 24/7 at <a href="tel:+16105935129">(610) 593-5129</a></p>

				<nav class="header__nav">
					<?php
					wp_nav_menu(
						array('menu' => 'primary_navigation')
					);
					?>
				</nav>
			</div>
		</div>
		</header>
