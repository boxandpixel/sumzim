<?php
/**
 * Content Divider
*/

$content_divider = get_field('content_divider');

$content_divider_items = $content_divider['content_divider_items'];

?>


<section class="content-divider-block contain">
	<ul>
	<?php foreach($content_divider_items as $item): ?>
	<?php
		$content_divider_item = $item['content_divider_item'];	
	?>
		<li>
			<?php echo $content_divider_item; ?>
		</li>
	<?php endforeach; ?>
	</ul>	


</section>


