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

	<!-- Start StackAdapt Pixel -->
	<script>!function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('ts', 'MzKT5xYhsXoA2GRtEnje6g');</script>
	<!-- End StackAdapt Universal Pixel -->

	<!-- Start StackAdapt Click to Call Pixel -->
	<script>
		document.getElementById("sa-click-to-call").addEventListener("click",function() { !function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('conv', 'cuJArc7ZMDOyfyEhCMMMuU'); });
	</script>
			
	<!-- End StackAdapt Click to Call Pixel -->

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

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
  <meta name="msapplication-TileColor" content="#16375a">
  <meta name="theme-color" content="#ffffff">	




	<?php if(is_page(array('reviews'))): ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
			$social_icons = get_field('social_icons', 'options') ?? [];

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
					<?php if($social_icons && !empty($social_icons)): ?>	
					<div class="header__social">
						<?php 
							foreach($social_icons as $item): 
								$social_icon = $item['social_icon'] ?? [];
								$social_link = $item['social_link'] ?? [];

								if($social_link): 
									$social_link_url = $social_link['url'] ?? '';
									$social_link_target = $social_link['target'] ? $social_link['target'] : '_blank'; 
								endif;
						?>

						<a href="<?= $social_link_url; ?>" target="<?= $social_link_target; ?>">
							<img src="<?= $social_icon['url']; ?>" alt="<?= $social_icon['alt']; ?>">
						</a>
						<?php endforeach; ?>						
					</div>	
					<?php endif; ?>				
				</div>
				<p class="header__call">Call us 24/7 at <a href="tel:+16105935129">(610) 593-5129</a></p>

				<nav class="header__nav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
						)
					);					
					?>
				</nav>
			</div>
		</div>
		</header>