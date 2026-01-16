<?php
/**
 * Disruptor
*/

$disruptor = get_field('disruptor');
$content = $disruptor['content'];
$button = $disruptor['button'];
?>


<section class="disruptor-block">
	<div class="disruptor-container">
		<div class="disruptor-content">
			<?php echo $content; ?>
		</div>

		<?php if($button): ?>
		<div class="disruptor-button">
			<a href="<?php echo $button['url']; ?>" class="button button--white"><?php echo $button['title']; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>

