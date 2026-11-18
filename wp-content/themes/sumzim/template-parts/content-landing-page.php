<?php
/**
 * Template part for landing pages (single-landing_page.php).
 *
 * Hero order: title, heading, description, button, phone, then image. The
 * image sits beside the text on desktop and drops below the button on phones,
 * so the button stays near the top on every screen size.
 *
 * @package _s
 */

// The scheduler ID every Book Now button on the site uses.
$scheduler_id = 'sched_ejqbmr1e0g7tagr59sdo4rr2';

$hero        = get_field( 'landing_hero' );
$hero        = is_array( $hero ) ? $hero : [];
$heading     = $hero['heading'] ?? '';
$description = $hero['description'] ?? '';
$image_id    = (int) ( $hero['image'] ?? 0 );
$show_phone  = $hero['show_phone'] ?? true;
$phone_label = ! empty( $hero['phone_label'] ) ? $hero['phone_label'] : 'Prefer to talk? Call';

$cta       = is_array( $hero['cta'] ?? null ) ? $hero['cta'] : [];
$cta_type  = $cta['type'] ?? 'book_now';
$cta_label = ! empty( $cta['label'] ) ? $cta['label'] : 'Book Now';
// Direct link IDs are short ServiceTitan tokens; anything else is dropped.
$spdirect  = preg_replace( '/[^A-Za-z0-9_-]/', '', (string) ( $cta['spdirect'] ?? '' ) );
$cta_link  = is_array( $cta['link'] ?? null ) ? $cta['link'] : [];

// Without an ID there is nothing to open directly, so fall back to the
// general scheduler rather than rendering a dead button.
if ( 'book_now_direct' === $cta_type && '' === $spdirect ) {
	$cta_type = 'book_now';
}

$phone     = get_field( 'phone_number', 'options' );
$phone_tel = $phone ? preg_replace( '/[^0-9]/', '', $phone ) : '';

$hero_class = 'landing-page-hero';
if ( $image_id ) {
	$hero_class .= ' landing-page-hero--has-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'landing-page' ); ?>>

	<header class="<?= esc_attr( $hero_class ); ?>">
		<div class="landing-page-hero__inner">

			<div class="landing-page-hero__content">
				<h1 class="landing-page-hero__title"><?= esc_html( get_the_title() ); ?></h1>

				<?php if ( $heading ) : ?>
				<p class="landing-page-hero__heading"><?= esc_html( $heading ); ?></p>
				<?php endif; ?>

				<?php if ( $description ) : ?>
				<div class="landing-page-hero__description"><?= wp_kses_post( $description ); ?></div>
				<?php endif; ?>

				<div class="landing-page-hero__cta">
					<?php if ( 'book_now_direct' === $cta_type ) : ?>
						<?php // The href is the no-JS fallback; the footer scheduler script handles the click. ?>
						<a class="button button--schedule button--large" href="<?= esc_url( '?spdirect=' . $spdirect ); ?>" data-spdirect="<?= esc_attr( $spdirect ); ?>"><?= esc_html( $cta_label ); ?></a>
					<?php elseif ( 'link' === $cta_type && ! empty( $cta_link['url'] ) ) : ?>
						<a class="button button--primary button--large" href="<?= esc_url( $cta_link['url'] ); ?>"<?= ! empty( $cta_link['target'] ) ? ' target="' . esc_attr( $cta_link['target'] ) . '" rel="noopener"' : ''; ?>><?= esc_html( $cta_link['title'] ?: 'Learn More' ); ?></a>
					<?php elseif ( 'book_now' === $cta_type ) : ?>
						<button class="button button-cta button--schedule button--large" onclick="_scheduler.show({ schedulerId: '<?= esc_js( $scheduler_id ); ?>' })" type="button"><?= esc_html( $cta_label ); ?></button>
					<?php endif; ?>

					<?php if ( $show_phone && $phone ) : ?>
					<p class="landing-page-hero__phone"><?= esc_html( $phone_label ); ?> <a href="tel:+1<?= esc_attr( $phone_tel ); ?>"><?= esc_html( $phone ); ?></a></p>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $image_id ) : ?>
			<figure class="landing-page-hero__image">
				<?=
				wp_get_attachment_image(
					$image_id,
					'large',
					false,
					[
						'loading'       => 'eager',
						'fetchpriority' => 'high',
						'sizes'         => '(min-width: 1024px) 600px, 100vw',
					]
				);
				?>
			</figure>
			<?php endif; ?>

		</div>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
