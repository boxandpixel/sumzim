<?php
/**
 * Site-wide alert banner
 *
 * General-purpose announcement bar driven by the Header field group on Theme
 * Settings (show_alert, alert_message, alert_link). Server-rendered in normal
 * flow above .header__status, so the page lays out with it from the first paint
 * and nothing shifts when it appears.
 *
 * @package sumzim
 */

if (!get_field('show_alert', 'option')) {
	return;
}

$alert_message = get_field('alert_message', 'option');
$alert_link    = get_field('alert_link', 'option');

if (!$alert_message) {
	return;
}
?>

<aside class="banner__alert" role="region" aria-label="Site announcement">
	<div class="banner__alert-inner">
		<div class="banner__alert-message">
			<?php echo wp_kses_post($alert_message); ?>
		</div>

		<?php if (!empty($alert_link['url'])) : ?>
			<a class="banner__alert-link"
			   href="<?php echo esc_url($alert_link['url']); ?>"
			   <?php echo !empty($alert_link['target']) ? 'target="' . esc_attr($alert_link['target']) . '" rel="noopener"' : ''; ?>>
				<?php echo esc_html($alert_link['title'] ?: 'Learn More'); ?>
			</a>
		<?php endif; ?>
	</div>
</aside>
