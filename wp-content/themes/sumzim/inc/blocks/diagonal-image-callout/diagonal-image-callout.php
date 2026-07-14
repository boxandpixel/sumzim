<?php
/**
 * Diagonal Image Callout
*/

$diagonal_image_callout    = get_field('diagonal_image_callout');
$diagonal_content_heading  = $diagonal_image_callout['diagonal_content_heading'] ?? '';
$diagonal_content_desc     = $diagonal_image_callout['diagonal_content_description'] ?? '';
$diagonal_content_image    = $diagonal_image_callout['diagonal_content_image'] ?? '';
$diagonal_image            = $diagonal_image_callout['diagonal_image'];
$diagonal_cta              = $diagonal_image_callout['diagonal_cta'];
$diagonal_content_align    = ! empty( $diagonal_image_callout['diagonal_content_alignment'] ) ? strtolower( $diagonal_image_callout['diagonal_content_alignment'] ) : 'left';
?>

<section class="diagonal-image-callout" style="background-image: url(<?php echo esc_url( $diagonal_image['url'] ); ?>);">
	<div class="diagonal-content-container diagonal-content-container--<?php echo esc_attr( $diagonal_content_align ); ?>">
		<div class="diagonal-content">
			<?php if ( $diagonal_content_heading ) : ?>
				<h2><?php echo esc_html( $diagonal_content_heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $diagonal_content_image ) : ?>
				<div class="diagonal-content__image">
					<img
						src="<?php echo esc_url( $diagonal_content_image['url'] ); ?>"
						alt="<?php echo esc_attr( $diagonal_content_image['alt'] ); ?>"
						width="<?php echo esc_attr( $diagonal_content_image['width'] ); ?>"
						height="<?php echo esc_attr( $diagonal_content_image['height'] ); ?>"
						srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $diagonal_content_image['ID'], 'full' ) ); ?>"
						sizes="(min-width: 1024px) 480px, 100vw"
						loading="lazy"
					>
				</div>
			<?php endif; ?>

			<?php if ( $diagonal_content_desc ) : ?>
				<div class="diagonal-content__description">
					<?php echo wp_kses_post( $diagonal_content_desc ); ?>
				</div>
			<?php endif; ?>

			<?php if ( $diagonal_cta ) : ?>
				<a href="<?php echo esc_url( $diagonal_cta['url'] ); ?>" class="button button--primary"><?php echo esc_html( $diagonal_cta['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>


