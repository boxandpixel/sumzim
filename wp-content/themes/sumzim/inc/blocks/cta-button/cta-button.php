<?php
/**
 * CTA Button block
*/

$cta_button = get_field('cta_button');

$cta_button_type              = $cta_button['cta_button_type'] ?? '';
$cta_button_book_now_title    = $cta_button['cta_button_book_now_title'] ?? '';
$cta_button_page_link         = $cta_button['cta_button_page_link'] ?? '';
$global_phone                 = get_field( 'phone_number', 'options' );
$global_phone_tel             = preg_replace( '/[^0-9]/', '', $global_phone );
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

				<div class="cta-button__mobile">
					<?php if ( $global_phone ) : ?>
					<a href="tel:<?= esc_attr( $global_phone_tel ); ?>" class="button button-cta button--schedule button--large">
						Call <?= esc_html( $global_phone ); ?>
					</a>
					<?php endif; ?>
					<button class="cta-button__book-now-text" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button">or Book Now <span class="material-symbols-outlined" aria-hidden="true">&#xe5c8;</span></button>
				</div>

				<div class="cta-button__desktop">
					<button class="button button-cta button--schedule button--large" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button"><?= esc_html( $cta_button_book_now_title ); ?></button>
				</div>

			</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>


