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

<style>
/* ============================================================
   CSS Custom Properties
   ============================================================ */
:root {
  --color__secondary: hsla(40, 91%, 57%, 1);
  --color__secondary--dark: hsla(40, 91%, 27%, 1);
  --color__primary--very-light: hsla(211, 61%, 90%, 1);
  --color__primary--light: hsla(211, 61%, 56%, 1);
  --color__primary: hsla(211, 61%, 22%, 1);
  --color__primary--dark: hsla(211, 61%, 12%, 1);
  --color__neutral--light: hsla(0, 0%, 75%, 1);
  --color__attention: hsla(0, 100%, 40%, 1);
  --color__text: hsla(0, 0%, 33%, 1);
  --color__text--light: hsla(0, 0%, 80%, 1);
  --font: "Raleway", "Verdana", "sans-serif";
  --gutter: 1rem;
  --letter-spacing: 0.05ch;
  --border-radius: 30px;
  --spacer: 1rem;
  --section__padding: 1rem;
}

/* ============================================================
   Reset
   ============================================================ */
*, *::before, *::after { box-sizing: border-box; }
body, h1, h2, h3, h4, h5, h6, p, ul, ol, li, figure, figcaption, blockquote, dl, dd { margin: 0; }
body { min-height: 100vh; scroll-behavior: smooth; text-rendering: optimizeSpeed; line-height: 1.5; }
ul, ol { padding: 0; list-style: none; }
img { max-width: 100%; display: block; height: auto; }
input, button, textarea, select { font: inherit; }
button { cursor: pointer; }

/* ============================================================
   Global
   ============================================================ */
body {
  background: #f8f9fa;
  font: 18px/1.4 var(--font);
  color: var(--color__text);
}

/* ============================================================
   Keyframes
   ============================================================ */
@keyframes navAnimation {
  0%   { background-position: 0% 50%; }
  50%  { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* ============================================================
   Header
   ============================================================ */
header.site-header {
  position: fixed;
  top: 0;
  width: 100vw;
  z-index: 9999;
}

header.site-header .header__content {
  padding: 2rem 1rem 1rem;
  background: var(--color__primary--dark);
  position: relative;
  display: flex;
  justify-content: space-between;
  min-height: 8rem;
}

@media (min-width: 1024px) {
  header.site-header .header__content { min-height: 10rem; }
}

@media (min-width: 1280px) {
  header.site-header .header__content { padding: 1rem; min-height: 11rem; }
}

header.site-header .header__content-branding a { display: block; }

.header__brand-logo {
  position: absolute;
  width: calc(140px * 1.3);
  bottom: -54px;
  left: 50%;
  transform: translateX(-50%);
  max-width: none;
}

@media (min-width: 1024px) {
  .header__brand-logo {
    width: calc(252px * 1.1);
    bottom: -80px;
    left: auto;
    transform: translate(0);
  }
}

@media (min-width: 1280px) {
  .header__brand-logo { width: calc(252px * 1.2); bottom: -92px; }
}

.header__brand-logo-min {
  width: 4rem;
  position: absolute;
  top: 0.75rem;
  left: var(--gutter);
  display: none;
}

.header__badge { display: none; }

@media (min-width: 1024px) {
  .header__badge {
    display: block;
    position: absolute;
    left: calc(1rem + 260px + 2rem);
    width: 94px;
    height: 108px;
  }
}

@media (min-width: 1280px) {
  .header__badge { top: 23px; left: calc(1rem + 290px + 2rem); width: 110px; height: 126px; }
}

.header__years {
  display: block;
  text-align: center;
  font-weight: 800;
  color: var(--color__primary);
  font-size: 36px;
}

@media (min-width: 1024px) { .header__years { font-size: 48px; } }
@media (min-width: 1280px) { .header__years { font-size: 60px; } }

.header__content-actions {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: center;
  width: 50%;
}

@media (min-width: 1024px) {
  .header__content-actions { width: calc(100% - 390px); gap: 10px; }
}

@media (min-width: 1280px) {
  .header__content-actions { justify-content: space-between; }
}

.header__reviews-social { display: flex; gap: 15px; }

.header-google-reviews {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%) translateY(-40%);
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  background: white;
  width: 100%;
  padding: .25rem 1rem;
}

@media (min-width: 1024px) {
  .header-google-reviews {
    position: static;
    width: auto;
    transform: none;
    background: transparent;
    padding: .25rem 1rem;
    border-right: solid 1px #7D9392;
  }
}

.header-google-reviews--excellent p {
  margin-bottom: 0;
  color: var(--color__primary--dark);
  font-family: var(--font);
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing);
  font-size: 14px;
}

@media (min-width: 1024px) {
  .header-google-reviews--excellent p { font-size: 1rem; color: white; }
}

.header-google-reviews--stars { display: flex; gap: 1px; }

.header-google-reviews--stars span {
  font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
  color: var(--color__secondary);
}

.header-google-reviews--reviewTotal p {
  color: var(--color__primary--dark);
  font-family: var(--font);
  font-weight: 400;
  font-size: 11px;
  margin-bottom: 0;
}

@media (min-width: 1024px) {
  .header-google-reviews--reviewTotal p { font-size: 12px; color: white; }
}

.header__social {
  display: flex;
  gap: 8px;
  align-items: center;
  margin-top: 8px;
  margin-right: -8px;
}

@media (min-width: 1024px) {
  .header__social { margin-right: 0; margin-top: 0; }
}

.header__social a { display: flex; }

.header__social a svg,
.header__social a img { aspect-ratio: 1/1; width: 36px; max-width: none; }

@media (min-width: 1024px) {
  .header__social a svg,
  .header__social a img { width: 48px; }
}

.header__call {
  display: none;
  color: white;
  font-size: 36px;
  font-weight: 400;
  margin-bottom: 0;
  margin-top: -10px;
}

@media (min-width: 1024px) { .header__call { display: block; } }

.header__call a { color: white; display: inline-block; text-decoration: none; font-weight: 700; }

/* ============================================================
   Homepage Hero
   ============================================================ */
.homepage-hero {
  position: relative;
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.homepage-hero__media {
  position: absolute;
  inset: 0;
  z-index: 0;
}

.homepage-hero__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  max-width: none;
  display: block;
}

.homepage-hero__gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, rgba(12, 30, 49, 0.6) 0%, rgba(12, 30, 49, 0.82) 100%);
}

.homepage-hero__content {
  position: relative;
  z-index: 1;
  text-align: center;
  padding: 10rem 1.5rem 4rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
  max-width: 900px;
  width: 100%;
}

@media (min-width: 1024px) { .homepage-hero__content { padding-top: 16rem; } }
@media (min-width: 1280px) { .homepage-hero__content { padding-top: 18rem; } }

.homepage-hero__headline {
  color: white;
  font-family: var(--font);
  font-weight: 800;
  font-size: 1.75rem;
  letter-spacing: var(--letter-spacing);
  text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
  line-height: 1.2;
}

@media (min-width: 768px) { .homepage-hero__headline { font-size: 2.25rem; } }
@media (min-width: 1024px) { .homepage-hero__headline { font-size: 2.75rem; } }

.homepage-hero__book-now {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.homepage-hero__desktop { display: none; }

.homepage-hero__mobile {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

@media (min-width: 1024px) {
  .homepage-hero__desktop { display: block; }
  .homepage-hero__mobile { display: none; }
}

.homepage-hero__book-now-text {
  background: none;
  border: none;
  color: white;
  font-size: .875rem;
  font-weight: 600;
  font-family: var(--font);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing);
  display: flex;
  align-items: center;
  gap: 4px;
  cursor: pointer;
}

/* ============================================================
   Buttons
   ============================================================ */
a.button,
button.button-cta {
  padding: 16px 40px;
  display: inline-flex;
  text-transform: uppercase;
  font-weight: 600;
  text-decoration: none;
  font-size: 14px;
  line-height: 1;
  letter-spacing: var(--letter-spacing);
  border-radius: 999px;
  border: none;
  cursor: pointer;
  font-family: var(--font);
}

.button--schedule {
  background: linear-gradient(130deg, var(--color__secondary), var(--color__attention));
  background-size: 200% 200%;
  animation: navAnimation 5s ease infinite;
  color: white;
  justify-content: center;
}

.button--large { padding: 24px 60px; font-size: 18px; }

.button__book-now { max-width: fit-content; }

.button__book-now--primary {
  background: linear-gradient(130deg, var(--color__secondary), var(--color__attention));
  background-size: 200% 200%;
  animation: navAnimation 5s ease infinite;
  color: white;
  border: none;
  border-radius: 40px;
  padding: 12px 50px;
  text-transform: uppercase;
  font-weight: 800;
  font-size: 12px;
  cursor: pointer;
  font-family: var(--font);
}

@media (min-width: 768px) { .button__book-now--primary { font-size: 14px; } }

.button__book-now--secondary {
  background: none;
  border: solid 1px var(--color__primary--dark);
  color: var(--color__primary--dark);
  border-radius: 40px;
  padding: 12px 50px;
  text-transform: uppercase;
  font-weight: 800;
  font-size: 12px;
  cursor: pointer;
  font-family: var(--font);
}

@media (min-width: 768px) { .button__book-now--secondary { font-size: 14px; } }

/* ============================================================
   Footer CTA
   ============================================================ */
.footer-cta {
  padding: 40px 1rem 70px;
  background-color: var(--color__secondary);
  display: flex;
  justify-content: center;
  align-items: center;
}

@media (min-width: 768px) { .footer-cta { padding: 80px 1rem 110px; } }

.footer-cta__card {
  background: white;
  border-radius: 20px;
  padding: 20px 40px;
  text-align: center;
  width: 100%;
  max-width: 360px;
  box-shadow: 5px 9px 30px 1px rgba(0, 0, 0, 0.26);
}

@media (min-width: 768px) { .footer-cta__card { padding: 40px 160px; max-width: 770px; } }

.footer-cta__card-heading {
  font-size: 24px;
  font-weight: 700;
  color: var(--color__primary--dark);
  margin-bottom: 0.5rem;
}

@media (min-width: 768px) { .footer-cta__card-heading { font-size: 34px; } }

.footer-cta__card p { font-size: 16px; }
@media (min-width: 768px) { .footer-cta__card p { font-size: 18px; } }

/* ============================================================
   Footer
   ============================================================ */
footer.site-footer {
  display: flex;
  background: #d3d6da;
  padding: var(--section__padding);
  flex-direction: column;
  z-index: 2;
  position: relative;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  color: var(--color__primary--dark);
  margin-top: -30px;
}

.footer__header {
  display: flex;
  flex-direction: column;
  padding-bottom: 20px;
  border-bottom: solid 1px rgba(12, 30, 49, 0.2);
  gap: 16px;
}

@media (min-width: 768px) {
  .footer__header { flex-direction: row; justify-content: space-between; }
}

.footer__header-brand { display: flex; flex-direction: column; gap: 8px; }
@media (min-width: 768px) { .footer__header-brand { gap: 16px; } }

.footer__header-brand-logo { width: 100%; max-width: 80px; }
@media (min-width: 768px) { .footer__header-brand-logo { max-width: 127px; } }

.footer__header-brand-tagline { margin-bottom: 0; font-style: italic; font-weight: 600; }

.footer__header-contact { display: flex; flex-direction: column; gap: 21px; }

.footer__contact-number {
  font-size: 18px;
  font-weight: 800;
  color: var(--color__primary--dark);
  text-decoration: none;
}

@media (min-width: 768px) { .footer__contact-number { font-size: 24px; } }

.footer__main {
  padding: 20px 0;
  display: flex;
  flex-direction: column;
  gap: 30px;
  border-bottom: solid 1px rgba(12, 30, 49, 0.2);
}

.footer__address h5 {
  text-transform: uppercase;
  font-weight: 800;
  font-size: 12px;
  color: rgba(12, 30, 49, 0.75);
  margin-bottom: 0.25rem;
}

@media (min-width: 768px) { .footer__address h5 { font-size: 14px; } }

.footer__footer {
  display: flex;
  flex-direction: column-reverse;
  padding-top: 20px;
  font-size: 12px;
  color: rgba(12, 30, 49, 0.5);
  gap: 16px;
}

@media (min-width: 768px) {
  .footer__footer {
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-end;
    font-size: 14px;
  }
}

.footer__footer-brand-associations { display: flex; align-items: center; gap: 30px; }

@media (min-width: 768px) {
  .footer__footer-brand-associations { flex-direction: column; flex: 0 0 260px; }
}

.footer__associations { display: flex; list-style: none; gap: 20px; }

.footer__footer-site-info { display: flex; flex-direction: column; gap: 8px; }

.footer__footer-site-info h5 {
  text-transform: capitalize;
  font-weight: 800;
  font-size: 12px;
  color: rgba(12, 30, 49, 0.75);
}

@media (min-width: 768px) { .footer__footer-site-info h5 { font-size: 14px; } }

.menu-footer-utility-menu-container ul { display: flex; flex-direction: column; gap: 8px; }
@media (min-width: 768px) { .menu-footer-utility-menu-container ul { flex-direction: row; } }
.menu-footer-utility-menu-container ul li a { color: rgba(12, 30, 49, 0.5); text-decoration: none; }
</style>
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
			<h1 class="homepage-hero__headline">Capturing the hearts of the best customers for life</h1>
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
