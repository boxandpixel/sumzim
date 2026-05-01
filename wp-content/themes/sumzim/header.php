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


	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NFL8X42V');</script>
	<!-- End Google Tag Manager -->





<!-- Google Fonts -->
<!-- 20231117 -->
<link rel="preconnect" href="https://static.servicetitan.com" />
<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />
<!-- Raleway -->
<link rel="preload"
      as="style"
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" />
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap"
      media="print" onload="this.media='all'" />
<noscript>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" />
</noscript>

<!-- Material Symbols Outlined (subsetted) -->
<link rel="preload"
      as="style"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=360,add,arrow_back,arrow_forward,attach_money,award_star,calendar_month,check,check_circle,chevron_left,chevron_right,close,collapse_content,design_services,east,electric_bolt,exclamation,expand_content,expand_less,expand_more,format_quote,frame_exclamation,handshake,heat,hvac,keyboard_arrow_up,lightbulb_2,menu,mode_fan,pace,remove,safety_check,school,sentiment_dissatisfied,sentiment_satisfied,shield_with_house,star,task_alt,valve,water_drop&display=swap" />
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=360,add,arrow_back,arrow_forward,attach_money,award_star,calendar_month,check,check_circle,chevron_left,chevron_right,close,collapse_content,design_services,east,electric_bolt,exclamation,expand_content,expand_less,expand_more,format_quote,frame_exclamation,handshake,heat,hvac,keyboard_arrow_up,lightbulb_2,menu,mode_fan,pace,remove,safety_check,school,sentiment_dissatisfied,sentiment_satisfied,shield_with_house,star,task_alt,valve,water_drop&display=swap"
      media="print" onload="this.media='all'" />
<noscript>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=360,add,arrow_back,arrow_forward,attach_money,award_star,calendar_month,check,check_circle,chevron_left,chevron_right,close,collapse_content,design_services,east,electric_bolt,exclamation,expand_content,expand_less,expand_more,format_quote,frame_exclamation,handshake,heat,hvac,keyboard_arrow_up,lightbulb_2,menu,mode_fan,pace,remove,safety_check,school,sentiment_dissatisfied,sentiment_satisfied,shield_with_house,star,task_alt,valve,water_drop&display=swap" />
</noscript>

	<!-- preload video poster -->
	 <link rel="preload" as="image" href="https://sumzim.com/wp-content/uploads/2024/11/home-background.webp">


  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
  <meta name="msapplication-TileColor" content="#16375a">
  <meta name="theme-color" content="#ffffff">	


	<?php if(is_page(array('reviews'))): ?>

  	<script src="<?php echo get_template_directory_uri(); ?>/google-places.js"></script>
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

  	<script src="<?php echo get_template_directory_uri(); ?>/google-places.js"></script>
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

	<!-- Schema -->
	<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@graph": [
		{
		"@type": ["HVACBusiness","LocalBusiness","Organization"],
		"@id": "https://sumzim.com/#organization",
		"name": "Summers & Zim’s",
		"alternateName": "Summers & Zim’s Inc",
		"url": "https://sumzim.com/",
		"logo": { "@id": "https://sumzim.com/#logo" },
		"image": { "@id": "https://sumzim.com/#logo" },

		"telephone": "+1-610-467-7137",
		"email": "info@sumzim.com",

		"aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "4.9",
		"reviewCount": 1276,
		"ratingCount": 1276,
		"bestRating": "5",
		"worstRating": "1"
		},		

		"address": {
			"@type": "PostalAddress",
			"streetAddress": "403 Valley Avenue, P.O. Box 220",
			"addressLocality": "Atglen",
			"addressRegion": "PA",
			"postalCode": "19310",
			"addressCountry": "US"
		},

		"geo": {
			"@type": "GeoCoordinates",
			"latitude": 39.84668883693398,
			"longitude": -75.71155054588307
		},

		"openingHoursSpecification": [
			{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": [
				"Monday","Tuesday","Wednesday",
				"Thursday","Friday","Saturday","Sunday"
			],
			"opens": "09:00",
			"closes": "17:00"
			}
		],

		"contactPoint": [
			{
			"@type": "ContactPoint",
			"telephone": "+1-610-467-7137",
			"contactType": "customer service",
			"areaServed": "US-PA",
			"availableLanguage": ["en"]
			}
		],

		"sameAs": [
			"https://www.facebook.com/SumZim",
			"https://www.instagram.com/summerszims/",
			"https://www.yelp.com/biz/summers-and-zims-atglen",
			"https://www.youtube.com/channel/UCuv_dHhfdnoxwBg3OFG3mSA",
			"https://share.google/z7DCVibK8vBktQKqh"
		],

		"hasMap": "https://maps.google.com/?q=39.84668883693398,-75.71155054588307",
		"priceRange": "$$",

		"areaServed": [
			{ "@type": "AdministrativeArea", "name": "Chester County, PA" },
			{ "@type": "AdministrativeArea", "name": "Delaware County, PA" },
			{ "@type": "AdministrativeArea", "name": "Lancaster County, PA" },
			{ "@type": "AdministrativeArea", "name": "Designated areas within Berks County, PA" }
		],

		"hasOfferCatalog": {
			"@type": "OfferCatalog",
			"name": "Core Services",
			"itemListElement": [
			{
				"@type": "Offer",
				"itemOffered": {
				"@type": "Service",
				"serviceType": "Plumbing Services",
				"url": "https://sumzim.com/services/plumbing/"
				}
			},
			{
				"@type": "Offer",
				"itemOffered": {
				"@type": "Service",
				"serviceType": "Heating Services",
				"url": "https://sumzim.com/services/heating/"
				}
			},
			{
				"@type": "Offer",
				"itemOffered": {
				"@type": "Service",
				"serviceType": "Air Conditioning Services",
				"url": "https://sumzim.com/services/air-conditioning/"
				}
			},
			{
				"@type": "Offer",
				"itemOffered": {
				"@type": "Service",
				"serviceType": "System Replacements",
				"url": "https://sumzim.com/why-it-matters-who-installs-your-system/"
				}
			}
			]
		}
		},

		{
		"@type": "ImageObject",
		"@id": "https://sumzim.com/#logo",
		"url": "https://sumzim.com/wp-content/uploads/2022/09/sz-logo-20220926.svg",
		"contentUrl": "https://sumzim.com/wp-content/uploads/2022/09/sz-logo-20220926.svg",
		"caption": "Summers & Zim’s",
		"inLanguage": "en-US",
		"width": 700,
		"height": 572
		},

		{
		"@type": "WebSite",
		"@id": "https://sumzim.com/#website",
		"url": "https://sumzim.com/",
		"name": "Summers & Zim’s",
		"publisher": { "@id": "https://sumzim.com/#organization" },
		"inLanguage": "en-US",
		"potentialAction": {
			"@type": "SearchAction",
			"target": {
			"@type": "EntryPoint",
			"urlTemplate": "https://sumzim.com/?s={search_term_string}"
			},
			"query-input": "required name=search_term_string"
		}
		},

		{
		"@type": "WebPage",
		"@id": "https://sumzim.com/#webpage",
		"url": "https://sumzim.com/",
		"name": "Expert HVAC & Plumbing Services in Southeastern PA | Summers & Zim’s",
		"isPartOf": { "@id": "https://sumzim.com/#website" },
		"about": { "@id": "https://sumzim.com/#organization" },
		"primaryImageOfPage": { "@id": "https://sumzim.com/#logo" },
		"inLanguage": "en-US"
		},

		{
		"@type": "BreadcrumbList",
		"@id": "https://sumzim.com/#breadcrumbs",
		"itemListElement": [
			{
			"@type": "ListItem",
			"position": 1,
			"name": "Home",
			"item": "https://sumzim.com/"
			}
		]
		}
	]
	}
	</script> 


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
		$show_alert = get_field('show_alert', 'options');
		$alert_message = get_field('alert_message', 'options');
		$alert_link = get_field('alert_link', 'options');

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
			<span class="material-symbols-outlined header__nav-button-icon-menu">&#xe5d2;</span>
			<span class="material-symbols-outlined header__nav-button-icon-close">&#xe5cd;</span>
		</button>
		
		<?php 
			$logo = get_field('logo', 'options');
			$logo_min = get_field('logo_minified', 'options');
			$badge = get_field('years_of_experience', 'options');

		?>

		<div class="header__content">

			
			<div class="header__content-branding">
			<a class="header__brand-link" href="<?php echo home_url('/'); ?>" title="Summers &amp; Zim's">
				<img class="header__brand-logo-min" src="<?php echo esc_url( $logo_min['url'] ); ?>" alt="<?php echo esc_attr( $logo_min['alt'] ); ?>" width="<?php echo esc_attr( $logo_min['width'] ); ?>" height="<?php echo esc_attr( $logo_min['height'] ); ?>">
				<img class="header__brand-logo"
				     src="<?php echo esc_url( $logo['url'] ); ?>"
				     alt="<?php echo esc_attr( $logo['alt'] ); ?>"
				     width="<?php echo esc_attr( $logo['width'] ); ?>"
				     height="<?php echo esc_attr( $logo['height'] ); ?>"
				     srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $logo['ID'], 'full' ) ); ?>"
				     sizes="(max-width: 768px) 140px, 182px"
				>
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
							<?php
							$review_data  = sumzim_fetch_review_data();
							$review_total = $review_data['result']['user_ratings_total'] ?? 0;
							?>
							<p id="reviewsCount"><?= $review_total ? esc_html( number_format( $review_total ) . ' Google reviews' ) : ''; ?></p>
						</div>
					</a>				
					<?php
					$fb_url  = get_field('facebook_url', 'option');
					$ig_url  = get_field('instagram_url', 'option');
					?>
					<?php if ($fb_url || $ig_url): ?>
					<div class="header__social">
						<?php if ($fb_url): ?>
						<a href="<?php echo esc_url($fb_url); ?>" target="_blank" rel="noopener" aria-label="Facebook">
							<svg id="uuid-9b283d61-da2e-4b79-9bf1-cdd4476dcbe5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 143.11 143.11"><defs><style>.uuid-448be9a5-27b7-42b3-b6d6-1e6d66fb3fb4{fill:#0866ff;}.uuid-4e7cf7e8-da52-4b0b-b0c5-0c39a8ead7da{fill:#fff;}</style></defs><rect class="uuid-448be9a5-27b7-42b3-b6d6-1e6d66fb3fb4" width="143.1" height="143.1" rx="10.64" ry="10.64"/><path class="uuid-4e7cf7e8-da52-4b0b-b0c5-0c39a8ead7da" d="M111.74,71.69c0-22.2-17.99-40.19-40.19-40.19s-40.19,17.99-40.19,40.19c0,18.85,12.97,34.67,30.48,39.01v-26.73h-8.29v-12.28h8.29v-5.29c0-13.68,6.19-20.02,19.62-20.02,2.55,0,6.94.5,8.74,1v11.13c-.95-.1-2.6-.15-4.64-.15-6.59,0-9.14,2.5-9.14,8.99v4.34h13.13l-2.26,12.28h-10.87v27.62c19.9-2.4,35.32-19.35,35.32-39.9Z"/></svg>
						</a>
						<?php endif; ?>
						<?php if ($ig_url): ?>
						<a href="<?php echo esc_url($ig_url); ?>" target="_blank" rel="noopener" aria-label="Instagram">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 143.11 143.11"><defs><radialGradient id="ig-bg" cx="42.93" cy="153.13" r="200" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#ffd600"/><stop offset="20%" stop-color="#ff7a00"/><stop offset="40%" stop-color="#ff0069"/><stop offset="70%" stop-color="#d300c5"/><stop offset="100%" stop-color="#7638fa"/></radialGradient></defs><rect width="143.11" height="143.11" rx="10.64" ry="10.64" fill="#fff"/><g fill="url(#ig-bg)"><path d="M71.56 41.5c-8.3 0-9.34.04-12.6.18-3.25.15-5.47.67-7.41 1.43a15 15 0 0 0-5.41 3.52 15 15 0 0 0-3.52 5.41c-.76 1.94-1.28 4.16-1.43 7.41-.15 3.26-.18 4.3-.18 12.6s.04 9.34.18 12.6c.15 3.25.67 5.47 1.43 7.41a15 15 0 0 0 3.52 5.41 15 15 0 0 0 5.41 3.52c1.94.76 4.16 1.28 7.41 1.43 3.26.15 4.3.18 12.6.18s9.34-.04 12.6-.18c3.25-.15 5.47-.67 7.41-1.43a15 15 0 0 0 5.41-3.52 15 15 0 0 0 3.52-5.41c.76-1.94 1.28-4.16 1.43-7.41.15-3.26.18-4.3.18-12.6s-.04-9.34-.18-12.6c-.15-3.25-.67-5.47-1.43-7.41a15 15 0 0 0-3.52-5.41 15 15 0 0 0-5.41-3.52c-1.94-.76-4.16-1.28-7.41-1.43-3.26-.15-4.3-.18-12.6-.18zm0 5.5c8.15 0 9.12.03 12.34.18 2.98.14 4.59.63 5.67 1.05 1.42.55 2.44 1.22 3.51 2.29a9.48 9.48 0 0 1 2.29 3.51c.42 1.08.91 2.69 1.05 5.67.14 3.22.18 4.19.18 12.34s-.04 9.12-.18 12.34c-.14 2.98-.63 4.59-1.05 5.67a9.5 9.5 0 0 1-2.29 3.51 9.5 9.5 0 0 1-3.51 2.29c-1.08.42-2.69.91-5.67 1.05-3.22.14-4.19.18-12.34.18s-9.12-.04-12.34-.18c-2.98-.14-4.59-.63-5.67-1.05a9.5 9.5 0 0 1-3.51-2.29 9.5 9.5 0 0 1-2.29-3.51c-.42-1.08-.91-2.69-1.05-5.67-.14-3.22-.18-4.19-.18-12.34s.03-9.12.18-12.34c.14-2.98.63-4.59 1.05-5.67a9.48 9.48 0 0 1 2.29-3.51 9.48 9.48 0 0 1 3.51-2.29c1.08-.42 2.69-.91 5.67-1.05 3.22-.14 4.19-.18 12.34-.18z"/><path d="M71.56 58.1a13.95 13.95 0 1 0 0 27.9 13.95 13.95 0 0 0 0-27.9zm0 23a9.05 9.05 0 1 1 0-18.1 9.05 9.05 0 0 1 0 18.1z"/><circle cx="85.96" cy="57.69" r="3.26"/></g></svg>
						</a>
						<?php endif; ?>
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
