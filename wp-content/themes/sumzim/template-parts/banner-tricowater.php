<?php
/**
 * Tri-County Water Services transition banner
 *
 * Shown only to visitors who land here from a tricowater.com redirect. The
 * Cloudflare redirect rules append ?from=tricowater to every target URL; that
 * parameter is what switches this banner on. Nothing else on the site triggers it.
 *
 * Two ways in:
 *   ?from=tricowater      real referral traffic. The parameter is stripped from
 *                         the address bar on load so visitors don't bookmark or
 *                         share a tagged URL.
 *   ?tricowater-preview   manual preview on any page. Not stripped, so the banner
 *                         survives a refresh while it's being styled.
 *
 * Temporary: remove this part, its SCSS partial, and the header.php include once
 * the tricowater.com redirects are retired.
 *
 * @package sumzim
 */

// phpcs:disable WordPress.Security.NonceVerification.Recommended -- Read-only display toggle, no state change.
$from_tricowater = isset($_GET['from']) && 'tricowater' === sanitize_key(wp_unslash($_GET['from']));
$is_preview      = isset($_GET['tricowater-preview']);
// phpcs:enable WordPress.Security.NonceVerification.Recommended

if (!$from_tricowater && !$is_preview) {
	return;
}

$transition_url = home_url('/tri-county-water-services-summers-and-zims/');
$logo_url       = get_template_directory_uri() . '/assets/tri-county-water-services-logo.webp';
?>

<aside class="banner__tricowater" role="region" aria-label="Tri-County Water Services transition notice">
	<div class="banner__tricowater-inner">
		<span class="banner__tricowater-logo-cell">
			<img class="banner__tricowater-logo"
			     src="<?php echo esc_url($logo_url); ?>"
			     alt="Tri-County Water Services"
			     width="525"
			     height="181"
			     decoding="async">
		</span>

		<div class="banner__tricowater-content">
			<p class="banner__tricowater-message">
				Tri-County Water Services has selected Summers &amp; Zim&rsquo;s as your new primary
				contact for plumbing and water treatment.
			</p>

			<a class="button button--primary banner__tricowater-button" href="<?php echo esc_url($transition_url); ?>">
				Learn More
			</a>
		</div>
	</div>
</aside>

<?php if ($from_tricowater) : ?>
<script>
	// Drop the referral parameter once the banner has rendered so the visitor is
	// left on the clean, canonical URL.
	(function () {
		if (!window.history || !window.history.replaceState) {
			return;
		}
		var url = new URL(window.location.href);
		url.searchParams.delete('from');
		window.history.replaceState({}, '', url.pathname + url.search + url.hash);
	})();
</script>
<?php endif; ?>
