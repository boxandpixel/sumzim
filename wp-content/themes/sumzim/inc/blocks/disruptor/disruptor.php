<?php
/**
 * Disruptor
*/

$disruptor = get_field('disruptor');
$heading = $disruptor['heading'] ?? '';
$image = $disruptor['image'] ?? null;
$description = $disruptor['description'] ?? '';
$button = $disruptor['button'] ?? [];
$background_color = $disruptor['background_color'] ?? '';

$has_image = !empty($image);
?>

<section class="disruptor<?php echo $has_image ? ' disruptor--has-image' : ''; echo ' disruptor--' . $background_color?>">
	<div class="container">
		<div class="disruptor__content">
			<?php if ($has_image): ?>
			<div class="disruptor__image">
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			</div>
			<?php endif; ?>
			<div class="disruptor__content-text">
				<h3 class="disruptor__content-heading"><?= esc_html($heading); ?></h3>
				<div class="disruptor__content-description">
					<?= wp_kses_post($description); ?>
				</div>
			</div>
		</div>

		<?php if($button): ?>
		<div class="disruptor__button">
			<a href="<?php echo $button['url']; ?>" class="button <?php if($background_color == 'gradient'): echo 'button--white'; else: echo 'button--primary'; endif; ?>"><?php echo $button['title']; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>