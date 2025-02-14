<?php
/**
 * Toggle
*/

$toggle = get_field('toggle');
$toggle_items = $toggle['toggle_items'];
?>


<section class="toggle-block contain">
<ul>
	<?php 
		foreach($toggle_items as $item): 
			$toggle_heading = $item['toggle_heading'];
			$toggle_content = $item['toggle_content'];
			$content = $toggle_content['content'];
			$button = $toggle_content['button'];
			
	?>
	
	<?php
		// $toggle_item = $item['toggle_item'];	
	?>
		<li>
			<h4 class="toggle-heading"><?php echo $toggle_heading; ?></h4>
			<div class="toggle-content">
				<?php echo $content; ?>
				<?php if($button): ?>
					<a href="<?php echo $button['url']; ?>" class="button button--primary"><?php echo $button['title']; ?></a>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
	</ul>	
</section>

