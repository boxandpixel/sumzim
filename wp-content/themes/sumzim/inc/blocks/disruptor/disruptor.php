<?php
/**
 * Disruptor
*/

$disruptor = get_field('disruptor');
$layout = !empty($disruptor['layout']) ? $disruptor['layout'] : 'default';
$heading = $disruptor['heading'] ?? '';
$image = $disruptor['image'] ?? null;
$description = $disruptor['description'] ?? '';
$button = $disruptor['button'] ?? [];
$background_color = $disruptor['background_color'] ?? '';

// The centered-text layout is text only: no image, no button, everything centered.
$is_centered_text = ($layout === 'centered-text');

if ($is_centered_text) {
	$image = null;
	$button = [];
}

$has_image = !empty($image);

// Backgrounds dark enough to need light text and a white button.
$dark_backgrounds = ['gradient', 'dark-navy'];
$is_dark = in_array($background_color, $dark_backgrounds, true);

$classes = ['disruptor'];
if ($has_image) {
	$classes[] = 'disruptor--has-image';
}
if ($background_color) {
	$classes[] = 'disruptor--' . $background_color;
}
if ($is_centered_text) {
	$classes[] = 'disruptor--centered-text';
}
?>

<section class="<?php echo esc_attr(implode(' ', $classes)); ?>">
	<div class="container">
		<div class="disruptor__content">
			<?php if ($has_image): ?>
			<div class="disruptor__image">
				<img src="<?php echo esc_url($image['url']); ?>"
				     alt="<?php echo esc_attr($image['alt']); ?>"
				     width="<?php echo esc_attr($image['width']); ?>"
				     height="<?php echo esc_attr($image['height']); ?>"
				     srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $image['ID'], 'full' ) ); ?>"
				     sizes="(max-width: 768px) 120px, 160px"
				     loading="lazy" />
			</div>
			<?php endif; ?>
			<div class="disruptor__content-text">
				<?php if ($heading): ?>
				<h2 class="disruptor__content-heading"><?= esc_html($heading); ?></h2>
				<?php endif; ?>
				<div class="disruptor__content-description">
					<?= wp_kses_post($description); ?>
				</div>
			</div>
		</div>

		<?php if($button): ?>
		<div class="disruptor__button">
			<a href="<?php echo $button['url']; ?>" class="button <?php echo $is_dark ? 'button--white' : 'button--primary'; ?>"><?php echo $button['title']; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>