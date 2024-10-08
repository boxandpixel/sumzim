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

	<!-- GTM #2 20240826 -->
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NFL8X42V');</script>
	<!-- End Google Tag Manager -->	 	

  <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MJT6M7F');</script>
  <!-- End Google Tag Manager -->



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
	<!-- GTM #2 20240826 -->
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFL8X42V"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	 

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJT6M7F"
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
		</div>
		<div class="banner__tommys-electric">
			<div>
				<div class="banner__tommys-electric-logo">
					<img src="/wp-content/themes/sumzim2022/assets/tommys-electric-logo.png" alt="">
				</div>
				<div class="banner__tommys-electric-content">
					<h3>Tommy's Electric has joined the Summers &amp; Zim's family</h3>
					<p>We now offer a full suite of electrical services for your home needs.</p>
				</div>	
			</div>		
		</div>
		<div class="header__mobile-call">
			<h2>Call us 24/7 at <a href="tel:6105935129">610-593-5129</a></h2>
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
				<div class="header__social">
					<p>Find us on:</p>
					<div class="header__social-icons">
						<a href="https://www.facebook.com/SumZim" target="_blank">
							<img src="/wp-content/themes/sumzim2022/assets/facebook-logo.svg" alt="Facebook">
						</a>
						<a href="https://www.instagram.com/summerszims/" target="_blank">
							<img src="/wp-content/themes/sumzim2022/assets/instagram-logo.svg" alt="Instagram">
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
