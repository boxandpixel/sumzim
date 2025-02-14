<?php
/**
 * Image Section
*/

$image_section = get_field('image_section');
$content_group = $image_section['content_group'];
$content = $content_group['content'];
$button = $content_group['button'];

$image_group = $image_section['image_group'];
$image = $image_group['image'];
$image_caption = $image_group['image_caption'];
?>


<section class="image-section-block contain">
	<figure>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
		<?php if($image_caption): ?>
		<figcaption><?php echo $image_caption; ?></figcaption>
		<?php endif; ?>
	</figure>
	<div class="image-section-content">
		<?php echo $content; ?>
		<?php if($button): ?>
			<a href="<?php echo $button['url']; ?>" class="button button--primary"><?php echo $button['title']; ?></a>
		<?php endif; ?>
	</div>
</section>


