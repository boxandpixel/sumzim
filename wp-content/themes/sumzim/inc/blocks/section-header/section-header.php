<?php
/**
 * Section Header
*/

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

$section_header   = get_field('section_header') ?? [];
$heading          = $section_header['heading'] ?? '';
$heading_position = $section_header['heading_position'] ?? 'left';
$description      = $section_header['description'] ?? '';
?>

<section class="section-header">
	<div class="container">

		<?php if(!empty($heading) || !empty($description)): ?>
		<div class="section-header__header section-header__header--<?= esc_attr($heading_position); ?>">

			<?php if(!empty($heading)): ?>
			<h2 class="section-header__heading"><?= esc_html($heading); ?></h2>
			<?php endif; ?>

			<?php if(!empty($description)): ?>
			<div class="section-header__description">
				<?= wp_kses_post($description); ?>
			</div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

	</div>
</section>
