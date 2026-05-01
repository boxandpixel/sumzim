<?php
/**
 * Reviews
 *
 * incomplete
*/

$reviews = get_field("reviews");
$reviews_heading = $reviews['reviews_heading'];

wp_enqueue_script('gplaces-lib', get_template_directory_uri() . '/google-places.js', array('jquery'), '1.0', true);
wp_enqueue_script('gmaps-places', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDSRvqTsYQXGTJ3gCbaaSXvAIqnnT3MMiM', array('gplaces-lib'), null, true);
wp_add_inline_script('gmaps-places', 'jQuery(function($){if($("#reviews-container").length){$("#reviews-container").googlePlaces({placeId:"ChIJd5IeY6tFxokR8QWJk68CUpI",render:["reviews"],min_rating:5,max_rows:3,shorten_names:false,staticMap:false});}});');
?>


<section class="reviews contain">
	<?php if($reviews_heading): ?>
		<h2><?php echo $reviews_heading; ?></h2>
	<?php endif; ?>

	<div id="reviews-container"></div>

</section>
