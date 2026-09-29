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

// The centered-text layout has no image; everything is centered, with the
// optional button stacked below the text.
$is_centered_text = ($layout === 'centered-text');

if ($is_centered_text) {
	$image = null;
}

$has_image = !empty($image);

// A WYSIWYG left blank can still save empty tags or &nbsp;, so check for real
// text (or an inline image) rather than a non-empty string.
$has_description = trim(str_replace('&nbsp;', ' ', wp_strip_all_tags($description))) !== ''
	|| strpos($description, '<img') !== false;
$has_text = $heading || $has_description;

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
		<?php if ($has_image || $has_text): ?>
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
			<?php if ($has_text): ?>
			<div class="disruptor__content-text">
				<?php if ($heading): ?>
				<h2 class="disruptor__content-heading"><?= esc_html($heading); ?></h2>
				<?php endif; ?>
				<?php if ($has_description): ?>
				<div class="disruptor__content-description">
					<?= wp_kses_post($description); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($button): ?>
		<div class="disruptor__button">
			<a href="<?php echo $button['url']; ?>" class="button <?php echo $is_dark ? 'button--white' : 'button--primary'; ?>"><?php echo $button['title']; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>