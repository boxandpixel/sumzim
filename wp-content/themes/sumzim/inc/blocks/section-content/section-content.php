<?php
/**
 * Section Content
 */

$section_content  = get_field('section_content') ?? [];
$heading          = $section_content['heading'] ?? '';
$heading_position = $section_content['heading_position'] ?? 'left';
$description      = $section_content['description'] ?? '';
?>

<section class="section-content">
	<div class="container">

		<?php if (!empty($heading) || !empty($description)): ?>
		<div class="section-content__header section-content__header--<?= esc_attr($heading_position); ?>">

			<?php if (!empty($heading)): ?>
			<h2 class="section-content__heading"><?= esc_html($heading); ?></h2>
			<?php endif; ?>

			<?php if (!empty($description)): ?>
			<div class="section-content__description">
				<?= wp_kses_post($description); ?>
			</div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

	</div>
</section>
