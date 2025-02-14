<?php
/**
 * Reviews
*/

$reviews = get_field("reviews");
$reviews_heading = $reviews['reviews_heading'];
?>


<section class="reviews contain">
	<?php if($reviews_heading): ?>
		<h2><?php echo $reviews_heading; ?></h2>
	<?php endif; ?>
	
	<div id="reviews-container"></div>
	
</section>


