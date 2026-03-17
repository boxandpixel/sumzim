<?php
/**
 * Disruptor
*/

if (defined('WP_DEBUG') && WP_DEBUG): ?>
<pre style="background:#fff;padding:1rem;font-size:11px;">
<?php var_dump(get_field('disruptor')); ?>
</pre>
<?php endif; 

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

