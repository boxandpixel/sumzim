<?php
/**
 * Image Section
*/

$image_section = get_field('image_section');
$link = $image_section['link'] ?? [];

$image_group = $image_section['image_group'];
$image = $image_group['image'] ?? [];
$image_caption = $image_group['image_caption'] ?? '';

$content_group = $image_section['content_group'];
$heading = $content_group['heading'] ?? '';
$description = $content_group['description'] ?? '';
?>


<section class="image-section">
	<div class="container">

		<?php if($link && !empty($link)): ?>
		<a href="<?= esc_url($link['url']); ?>" class="image-section__container">
		<?php else: ?>
		<div class="image-section__container">
		<?php endif; ?>

			<div class="image-section__image">
				<figure>
					<?php if(!empty($image_link)): ?>
					<a href="<?= esc_url($image_link['url']); ?>" target="<?= esc_attr($image_link_target); ?>">
					<?php endif; ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php if(!empty($image_link)): ?>
					</a>
					<?php endif; ?>		
					<?php if($image_caption): ?>
					<figcaption><?php echo $image_caption; ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
			<?php if(!empty($heading) || !empty($description)): ?>
			<div class="image-section__content">
				
				<div class="image-section__content-header">
					<h3 class="image-section__content-heading"><?= esc_html($heading); ?></h3>
					<div class="image-section__content-desription">
						<?= wp_kses_post($description); ?>
					</div>

					<?php if($link && !empty($link)): ?>
					<div class="image-section__button">
						<button href="<?php echo $link['url']; ?>" class="button button--primary"><?php echo $link['title']; ?></button>
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


