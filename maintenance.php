<?php
/**
 * Maintenance page — bootstraps WordPress for ACF options data.
 * Activate by redirecting all traffic here via .htaccess.
 */

require_once __DIR__ . '/wp-load.php';

http_response_code( 503 );
header( 'Retry-After: 3600' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Pragma: no-cache' );

// --- Header ACF options ---
$logo      = get_field( 'logo', 'options' );
$logo_min  = get_field( 'logo_minified', 'options' );
$badge     = get_field( 'years_of_experience', 'options' );
$fb_url    = get_field( 'facebook_url', 'options' );
$ig_url    = get_field( 'instagram_url', 'options' );

$review_data  = sumzim_fetch_review_data();
$review_total = $review_data['result']['user_ratings_total'] ?? 0;

$years_founded = 1930;
$now_ts        = time();
$years_old     = date( 'Y' ) - $years_founded;
if ( strtotime( '+' . $years_old . ' years', mktime( 0, 0, 0, 1, 1, $years_founded ) ) > $now_ts ) {
	$years_old--;
}

// --- Footer ACF options ---
$footer             = get_field( 'footer', 'options' );
$footer_logo        = $footer['logo'] ?? null;
$footer_tagline     = $footer['tagline'] ?? '';
$footer_cta_type    = $footer['cta']['cta_type'] ?? '';
$footer_link        = $footer['cta']['link'] ?? null;
$footer_link_target = ( ! empty( $footer_link['target'] ) ) ? $footer_link['target'] : '_self';
$footer_book_now    = $footer['cta']['book_now'] ?? '';
$footer_phone       = $footer['phone_number'] ?? '';
$footer_clean_phone = preg_replace( '/[^0-9]/', '', $footer_phone );
$footer_safety_seal = $footer['safety_seal'] ?? null;
$footer_associations = $footer['associations'] ?? [];
$footer_social_icons = $footer['social_icons'] ?? [];
$footer_address     = $footer['address'] ?? '';

$locations = get_nav_menu_locations();

$footer_banner        = get_field( 'footer_banner', 'options' );
$fb_heading           = $footer_banner['heading'] ?? '';
$fb_description       = $footer_banner['description'] ?? '';
$fb_cta_type          = $footer_banner['cta']['cta_type'] ?? '';
$fb_link              = $footer_banner['cta']['link'] ?? null;
$fb_link_target       = ( ! empty( $fb_link['target'] ) ) ? $fb_link['target'] : '_self';
$fb_book_now          = $footer_banner['cta']['book_now'] ?? '';

$theme_uri = get_stylesheet_directory_uri();
$site_url  = home_url( '/' );
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>We'll Be Back Soon | Summers &amp; Zim's</title>
<meta name="robots" content="noindex, nofollow">

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-- Google Fonts: Raleway -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap"></noscript>

<!-- Material Symbols -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward,check_circle,east,star&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward,check_circle,east,star&display=swap" media="print" onload="this.media='all'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward,check_circle,east,star&display=swap"></noscript>

<link rel="preload" as="image" href="https://sumzim.com/wp-content/uploads/2024/11/home-background.webp">

<link rel="stylesheet" href="<?php echo esc_url( $theme_uri ); ?>/style.css?v=<?php echo filemtime( get_stylesheet_directory() . '/style.css' ); ?>">
</head>
<body class="maintenance">

<div id="page" class="site">

	<!-- ========== HEADER ========== -->
	<header class="site-header header--static">
		<div class="header__content">

			<div class="header__content-branding">
				<a class="header__brand-link" href="<?php echo esc_url( $site_url ); ?>" title="Summers &amp; Zim's">
					<?php if ( $logo_min ) : ?>
					<img class="header__brand-logo-min"
					     src="<?php echo esc_url( $logo_min['url'] ); ?>"
					     alt="<?php echo esc_attr( $logo_min['alt'] ); ?>"
					     width="<?php echo esc_attr( $logo_min['width'] ); ?>"
					     height="<?php echo esc_attr( $logo_min['height'] ); ?>">
					<?php endif; ?>
					<?php if ( $logo ) : ?>
					<img class="header__brand-logo"
					     src="<?php echo esc_url( $logo['url'] ); ?>"
					     alt="<?php echo esc_attr( $logo['alt'] ); ?>"
					     width="<?php echo esc_attr( $logo['width'] ); ?>"
					     height="<?php echo esc_attr( $logo['height'] ); ?>">
					<?php endif; ?>
				</a>

				<?php if ( $badge ) : ?>
				<div class="header__badge" style="background: url('<?php echo esc_url( $badge['url'] ); ?>') left top no-repeat; background-size: cover;">
					<span class="header__years"><?php echo esc_html( $years_old ); ?></span>
				</div>
				<?php endif; ?>
			</div><!-- .header__content-branding -->

			<div class="header__content-actions">

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
							<p><?php echo $review_total ? esc_html( number_format( $review_total ) . ' Google reviews' ) : ''; ?></p>
						</div>
					</a>

					<?php if ( $fb_url || $ig_url ) : ?>
					<div class="header__social">
						<?php if ( $fb_url ) : ?>
						<a href="<?php echo esc_url( $fb_url ); ?>" target="_blank" rel="noopener" aria-label="Facebook">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 143.11 143.11"><defs><style>.fb-bg{fill:#0866ff}.fb-fg{fill:#fff}</style></defs><rect class="fb-bg" width="143.1" height="143.1" rx="10.64" ry="10.64"/><path class="fb-fg" d="M111.74,71.69c0-22.2-17.99-40.19-40.19-40.19s-40.19,17.99-40.19,40.19c0,18.85,12.97,34.67,30.48,39.01v-26.73h-8.29v-12.28h8.29v-5.29c0-13.68,6.19-20.02,19.62-20.02,2.55,0,6.94.5,8.74,1v11.13c-.95-.1-2.6-.15-4.64-.15-6.59,0-9.14,2.5-9.14,8.99v4.34h13.13l-2.26,12.28h-10.87v27.62c19.9-2.4,35.32-19.35,35.32-39.9Z"/></svg>
						</a>
						<?php endif; ?>
						<?php if ( $ig_url ) : ?>
						<a href="<?php echo esc_url( $ig_url ); ?>" target="_blank" rel="noopener" aria-label="Instagram">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 143.11 143.11"><defs><radialGradient id="ig-bg-m" cx="42.93" cy="153.13" r="200" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#ffd600"/><stop offset="20%" stop-color="#ff7a00"/><stop offset="40%" stop-color="#ff0069"/><stop offset="70%" stop-color="#d300c5"/><stop offset="100%" stop-color="#7638fa"/></radialGradient></defs><rect width="143.11" height="143.11" rx="10.64" ry="10.64" fill="#fff"/><g fill="url(#ig-bg-m)"><path d="M71.56 41.5c-8.3 0-9.34.04-12.6.18-3.25.15-5.47.67-7.41 1.43a15 15 0 0 0-5.41 3.52 15 15 0 0 0-3.52 5.41c-.76 1.94-1.28 4.16-1.43 7.41-.15 3.26-.18 4.3-.18 12.6s.04 9.34.18 12.6c.15 3.25.67 5.47 1.43 7.41a15 15 0 0 0 3.52 5.41 15 15 0 0 0 5.41 3.52c1.94.76 4.16 1.28 7.41 1.43 3.26.15 4.3.18 12.6.18s9.34-.04 12.6-.18c3.25-.15 5.47-.67 7.41-1.43a15 15 0 0 0 5.41-3.52 15 15 0 0 0 3.52-5.41c.76-1.94 1.28-4.16 1.43-7.41.15-3.26.18-4.3.18-12.6s-.04-9.34-.18-12.6c-.15-3.25-.67-5.47-1.43-7.41a15 15 0 0 0-3.52-5.41 15 15 0 0 0-5.41-3.52c-1.94-.76-4.16-1.28-7.41-1.43-3.26-.15-4.3-.18-12.6-.18zm0 5.5c8.15 0 9.12.03 12.34.18 2.98.14 4.59.63 5.67 1.05 1.42.55 2.44 1.22 3.51 2.29a9.48 9.48 0 0 1 2.29 3.51c.42 1.08.91 2.69 1.05 5.67.14 3.22.18 4.19.18 12.34s-.04 9.12-.18 12.34c-.14 2.98-.63 4.59-1.05 5.67a9.5 9.5 0 0 1-2.29 3.51 9.5 9.5 0 0 1-3.51 2.29c-1.08.42-2.69.91-5.67 1.05-3.22.14-4.19.18-12.34.18s-9.12-.04-12.34-.18c-2.98-.14-4.59-.63-5.67-1.05a9.5 9.5 0 0 1-3.51-2.29 9.5 9.5 0 0 1-2.29-3.51c-.42-1.08-.91-2.69-1.05-5.67-.14-3.22-.18-4.19-.18-12.34s.03-9.12.18-12.34c.14-2.98.63-4.59 1.05-5.67a9.48 9.48 0 0 1 2.29-3.51 9.48 9.48 0 0 1 3.51-2.29c1.08-.42 2.69-.91 5.67-1.05 3.22-.14 4.19-.18 12.34-.18z"/><path d="M71.56 58.1a13.95 13.95 0 1 0 0 27.9 13.95 13.95 0 0 0 0-27.9zm0 23a9.05 9.05 0 1 1 0-18.1 9.05 9.05 0 0 1 0 18.1z"/><circle cx="85.96" cy="57.69" r="3.26"/></g></svg>
						</a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div><!-- .header__reviews-social -->

				<p class="header__call">Call us 24/7 at <a href="tel:+16105935129">(610) 593-5129</a></p>

			</div><!-- .header__content-actions -->

		</div><!-- .header__content -->
	</header><!-- .site-header -->

	<!-- ========== HERO ========== -->
	<section class="homepage-hero">
		<div class="homepage-hero__media">
			<img
				class="homepage-hero__image homepage-hero__image--fallback"
				src="https://sumzim.com/wp-content/uploads/2024/11/home-background.webp"
				alt="Summers &amp; Zim's — HVAC &amp; Plumbing"
				loading="eager"
				fetchpriority="high"
				decoding="async"
			>
			<div class="homepage-hero__gradient"></div>
		</div>

		<div class="homepage-hero__content">
			<h1 class="homepage-hero__headline">Capturing the hearts of Chester County for <?php echo esc_html( $years_old ); ?> years</h1>
			<p style="color:white;font-family:var(--font);font-size:1rem;font-weight:600;letter-spacing:var(--letter-spacing);text-align:center;margin:0;text-transform:uppercase;">Undergoing maintenance &ndash; be back shortly!</p>

			<div class="homepage-hero__book-now">
				<div class="homepage-hero__desktop">
					<div style="display:flex;flex-direction:column;align-items:center;gap:14px;">
						<button
							class="button button-cta button--schedule button--large"
							onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })"
							type="button"
						>Book a Service</button>
						<a href="tel:+16105935129" style="color:white;font-family:var(--font);font-size:.875rem;font-weight:600;letter-spacing:var(--letter-spacing);text-decoration:none;text-transform:uppercase;">Or call (610) 593-5129</a>
					</div>
				</div>
				<div class="homepage-hero__mobile">
					<a href="tel:+16105935129" class="button button-cta button--schedule button--large">Call (610) 593-5129</a>
					<button
						class="homepage-hero__book-now-text"
						onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })"
						type="button"
					>or Book Now <span class="material-symbols-outlined" aria-hidden="true">&#xe5c8;</span></button>
				</div>
			</div>
		</div>
	</section>

	<!-- ========== FOOTER CTA ========== -->
	<?php if ( $fb_heading ) : ?>
	<div class="footer-cta">
		<div class="footer-cta__card">
			<h3 class="footer-cta__card-heading"><?php echo esc_html( $fb_heading ); ?></h3>
			<?php echo wp_kses_post( $fb_description ); ?>
			<?php if ( $fb_cta_type === 'Link' && $fb_link ) : ?>
			<a href="<?php echo esc_url( $fb_link['url'] ); ?>" target="<?php echo esc_attr( $fb_link_target ); ?>"><?php echo esc_html( $fb_link['title'] ); ?></a>
			<?php elseif ( $fb_cta_type === 'Book Now' ) : ?>
			<button class="button__book-now button__book-now--primary" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?php echo esc_html( $fb_book_now ); ?></button>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- ========== FOOTER ========== -->
	<footer class="site-footer">
		<div class="footer__header">
			<div class="footer__header-brand">
				<?php if ( $footer_logo ) : ?>
				<img src="<?php echo esc_attr( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" width="<?php echo esc_attr( $footer_logo['width'] ); ?>" height="<?php echo esc_attr( $footer_logo['height'] ); ?>" class="footer__header-brand-logo">
				<?php endif; ?>
				<p class="footer__header-brand-tagline"><?php echo esc_html( $footer_tagline ); ?></p>
			</div>
			<div class="footer__header-contact">
				<?php if ( $footer_cta_type === 'Link' && $footer_link ) : ?>
				<a href="<?php echo esc_url( $footer_link['url'] ); ?>" target="<?php echo esc_attr( $footer_link_target ); ?>"><?php echo esc_html( $footer_link['title'] ); ?></a>
				<?php elseif ( $footer_cta_type === 'Book Now' ) : ?>
				<button class="button__book-now button__book-now--secondary" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?php echo esc_html( $footer_book_now ); ?></button>
				<?php endif; ?>
				<a href="tel:<?php echo esc_attr( $footer_clean_phone ); ?>" target="_blank" class="footer__contact-number"><?php echo esc_html( $footer_phone ); ?></a>
			</div>
		</div>

		<div class="footer__main">
			<div class="footer__address">
				<h5><?php bloginfo( 'name' ); ?></h5>
				<?php echo wp_kses_post( $footer_address ); ?>
			</div>
		</div>

		<div class="footer__footer">
			<div class="footer__footer-site-info">
				<h5><?php echo '&copy; ' . esc_html( date( 'Y' ) ) . ' Summers &amp; Zim\'s'; ?></h5>
				<?php wp_nav_menu( [ 'theme_location' => 'footer-utility-menu', 'menu_id' => 'footer-utility-menu' ] ); ?>
			</div>

			<?php if ( $footer_safety_seal || ! empty( $footer_associations ) ) : ?>
			<div class="footer__footer-brand-associations">
				<?php if ( $footer_safety_seal ) : ?>
				<div class="footer__footer-associations-badge">
					<img src="<?php echo esc_attr( $footer_safety_seal['url'] ); ?>" alt="<?php echo esc_attr( $footer_safety_seal['alt'] ); ?>" width="<?php echo esc_attr( $footer_safety_seal['width'] ); ?>" height="<?php echo esc_attr( $footer_safety_seal['height'] ); ?>" class="footer__brand-badge">
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $footer_associations ) ) : ?>
				<ul class="footer__associations">
					<?php foreach ( $footer_associations as $assoc ) :
						$img = $assoc['association'] ?? [];
						if ( empty( $img['url'] ) ) continue;
					?>
					<li>
						<img src="<?php echo esc_attr( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="<?php echo esc_attr( $img['width'] ); ?>" height="<?php echo esc_attr( $img['height'] ); ?>" loading="lazy">
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</footer>

</div><!-- #page -->

<!-- Book Now scheduler (lazy-loaded) -->
<script>
(function() {
  var loaded = false;
  var queue  = [];
  window._scheduler = { show: function(opts) { queue.push(opts); load(); } };
  function load() {
    if (loaded) return;
    loaded = true;
    var s = document.createElement('script');
    s.setAttribute('data-api-key', 'd9qkujhrus8g37jijaslp2o3');
    s.setAttribute('data-schedulerid', 'sched_ejqbmr1e0g7tagr59sdo4rr2');
    s.id  = 'se-widget-embed';
    s.src = 'https://embed.scheduler.servicetitan.com/scheduler-v1.js';
    s.onload = function() {
      setTimeout(function() {
        queue.forEach(function(o) { window._scheduler && window._scheduler.show(o); });
        queue = [];
      }, 50);
    };
    document.head.appendChild(s);
  }
  ['mousemove','keydown','touchstart','scroll'].forEach(function(ev) {
    document.addEventListener(ev, load, { once: true, passive: true });
  });
})();
</script>

</body>
</html>
