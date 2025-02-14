<?php
/**
 * CTA Button block
*/

$cta_button = get_field('cta_button');
$cta_button_heading = $cta_button['cta_button_heading'];
$cta_button_description = $cta_button['cta_button_description'];

$cta_button_color = $cta_button['cta_button_color'];
$cta_button_type = $cta_button['cta_button_type'];
$cta_button_schedule_engine_title = $cta_button['cta_button_schedule_engine_title'];
$cta_button_page_link = $cta_button['cta_button_page_link'];
?>


<section class="cta-button-section<?php if($cta_button_heading || $cta_button_description): ?> cta-button-has-content<?php endif; ?> contain">


<?php echo $cta_button_description; ?>

<?php if($cta_button): ?>
	<?php if($cta_button_type == "Link"): ?>
	<div class="cta-button">
		<a href="<?php echo $cta_button_page_link['url']; ?>" class="<?php if($cta_button_color == "Navy"): echo "cta-button--primary"; elseif($cta_button_color == "Yellow"): echo "cta-button--secondary"; elseif($cta_button_color == "Orange & Red Gradient"): echo "cta-button--gradient"; endif; ?>"><?php echo $cta_button_page_link['title']; ?></a>
	</div>
	<?php endif; ?>

	<?php if($cta_button_type == "Schedule Engine"): ?>
	<div class="cta-button">
		<a href="https://sumzim.com/about-us/free-estimate/?ref=service" class="button button-cta button--schedule button--large book-now-button" target="_blank">Book Now</a>
	</div>
	<?php endif; ?>
<?php endif; ?>

</section>


