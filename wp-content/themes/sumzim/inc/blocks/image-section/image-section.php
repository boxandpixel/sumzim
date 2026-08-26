<?php
/**
 * Image Section
*/

$image_section = get_field('image_section');
$link = $image_section['link'] ?? [];
$layout = $image_section['layout'] ?? 'default';
$background_color = $image_section['background_color'] ?? '';

$class = 'image-section';
if ( $background_color && $background_color !== 'none' ) $class .= ' image-section--' . $background_color;

$image_group = $image_section['image_group'] ?? [];
$image = $image_group['image'] ?? [];
$image_caption = $image_group['image_caption'] ?? '';
$image_size = $image_group['image_size'] ?? '100';
$image_fit = $image_group['image_fit'] ?? 'cover';

$content_group = $image_section['content_group'] ?? [];
$heading = $content_group['heading'] ?? '';
$heading_icon = $content_group['heading_icon'] ?? '';
$heading_accent = $content_group['heading_accent'] ?? '';
$description = $content_group['description'] ?? '';
?>


<section class="<?= esc_attr($class); ?>">
	<div class="container">

		<?php if($link && !empty($link)): ?>
		<a href="<?= esc_url($link['url']); ?>" class="image-section__container<?= $layout === 'reversed' ? ' image-section__container--reversed' : ''; ?>">
		<?php else: ?>
		<div class="image-section__container<?= $layout === 'reversed' ? ' image-section__container--reversed' : ''; ?>">
		<?php endif; ?>

			<?php if(!empty($image)): ?>
			<div class="image-section__image image-section__image-<?= esc_attr($image_size); ?>">
				<figure>
					<?php if ($image_fit === 'contain'): ?>
					<img class="image-section__image-natural" src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
					<?php else: ?>
					<div class="image-section__image-bg" style="--bg-image: url('<?= esc_url($image['url']); ?>');" role="img" aria-label="<?= esc_attr($image['alt']); ?>"></div>
					<?php endif; ?>
					<?php if($image_caption): ?>
					<figcaption><?= esc_html($image_caption); ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
			<?php endif; ?>

			<?php if(!empty($heading) || !empty($description)): ?>
			<div class="image-section__content">

				<div class="image-section__content-header">
					<?php if($heading_icon): ?>
					<span class="material-symbols-outlined image-section__content-icon" aria-hidden="true"><?= esc_html($heading_icon); ?></span>
					<?php endif; ?>
					<h3 class="image-section__content-heading">
						<span class="image-section__content-heading-lead"><?= esc_html($heading); ?></span>
						<?php if($heading_accent): ?>
						<span class="image-section__content-heading-accent"><?= esc_html($heading_accent); ?></span>
						<?php endif; ?>
					</h3>
					<div class="image-section__content-description">
						<?= wp_kses_post($description); ?>
					</div>

					<?php if($link && !empty($link)): ?>
					<div class="image-section__button">
						<button href="<?= esc_url($link['url']); ?>" class="button button--primary"><?= esc_html($link['title']); ?></button>
					</div>
					<?php endif; ?>
				</div>

			</div>
			<?php endif; ?>

		<?php if($link && !empty($link)): ?>
		</a>
		<?php else: ?>
		</div>
		<?php endif; ?>
	</div>
</section>
