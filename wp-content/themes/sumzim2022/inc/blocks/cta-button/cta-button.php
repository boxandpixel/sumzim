<?php
/**
 * CTA Button block
*/

$cta_button = get_field('cta_button');

$cta_button_type = $cta_button['cta_button_type'] ?? '';
$cta_button_book_now_title = $cta_button['cta_button_book_now_title'] ?? '';
$cta_button_page_link = $cta_button['cta_button_page_link'] ?? '';
?>


<section class="cta-button">
	<div class="container">
		<?php if($cta_button): ?>
			<?php if($cta_button_type == "Link"): ?>
			<div class="cta-button__link">
				<a href="<?php echo $cta_button_page_link['url']; ?>" class="button button--large button--primary"><?php echo $cta_button_page_link['title']; ?></a>
			</div>
			<?php endif; ?>

			<?php if($cta_button_type == "Book Now"): ?>
			<div class="cta-button__book-now">
				<button class="button button-cta button--schedule button--large book-now-button" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?= esc_html($cta_button_book_now_title); ?></button>
			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>


