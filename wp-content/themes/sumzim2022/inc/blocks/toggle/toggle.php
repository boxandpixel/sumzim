<?php
/**
 * Toggle
*/

$toggle = get_field('toggle');
$toggle_items = $toggle['toggle_items'];
$heading = $toggle['heading'];
$description = $toggle['description'];
?>

<section class="toggle-block">
	<div class="container">
		<?php if($heading || $description): ?>
		<div class="toggle-block__header">
			<h2 class="toggle-block__header-heading"><?= esc_html($heading); ?></h2>
			<?php if($description): ?>
			<div class="toggle-block__header-description">
				<?= wp_kses_post($description); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="toggle-block__body">
			<ul>
				<?php 
					foreach($toggle_items as $index => $item): 
						$toggle_heading = $item['toggle_heading'];
						$toggle_content = $item['toggle_content'];
						$content = $toggle_content['content'];
						$button = $toggle_content['button'];
						$is_first = ($index === 0); // Check if this is the first item
				?>
				<li>
					<div class="toggle-heading<?php echo $is_first ? ' expand' : ''; ?>">
						<h3 class="toggle-heading"><?php echo $toggle_heading; ?></h3>
						<div class="toggle-heading__icon"></div>
					</div>
					<div class="toggle-content<?php echo $is_first ? ' expand' : ''; ?>">
						<?php echo $content; ?>
						<?php if($button): ?>
							<a href="<?php echo $button['url']; ?>" class="button button--primary"><?php echo $button['title']; ?></a>
						<?php endif; ?>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>	
		</div>
	</div>
</section>