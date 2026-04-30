<?php
/**
 * Diagonal Image Callout
*/

$diagonal_image_callout = get_field('diagonal_image_callout');
$diagonal_content = $diagonal_image_callout['diagonal_content'];
$diagonal_image = $diagonal_image_callout['diagonal_image'];
$diagonal_cta = $diagonal_image_callout['diagonal_cta']; 
?>


<section class="diagonal-image-callout" style="background-image: url(<?php echo $diagonal_image['url']; ?>);">
	<div class="diagonal-content-container">
		<div class="diagonal-content">
			<?php echo $diagonal_content; ?>

			<?php if($diagonal_cta): ?>
				<a href="<?php echo $diagonal_cta['url']; ?>" class="button button--primary"><?php echo $diagonal_cta['title']; ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>


