<?php
/**
 * Disruptor
*/

$disruptor = get_field('disruptor');
$heading = $disruptor['heading'] ?? '';
$description = $disruptor['description'] ?? '';
$button = $disruptor['button'] ?? [];
?>


<section class="disruptor">
	<div class="container">
		<div class="disruptor__content">
			<h3 class="disruptor__content-heading"><?= esc_html($heading); ?></h3>
			<div class="disruptor__content-description">
				<?= wp_kses_post($description); ?>
			</div>
		</div>

		<?php if($button): ?>
		<div class="disruptor__button">
			<a href="<?php echo $button['url']; ?>" class="button button--white"><?php echo $button['title']; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>

