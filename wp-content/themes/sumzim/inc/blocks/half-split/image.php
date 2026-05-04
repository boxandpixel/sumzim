<?php
/**
 * Half Split – Image layout
 */

$data          = get_query_var('half_split_image_data') ?: [];
$image         = $data['image']         ?? [];
$image_caption = $data['image_caption'] ?? '';
$image_size    = $data['image_size']    ?? '100';
$image_fit     = $data['image_fit']     ?? 'cover';

if (empty($image)) {
    return;
}
?>

<div class="half-split__image half-split__image--<?= esc_attr($image_size); ?>">
    <figure>
        <?php if ($image_fit === 'contain'): ?>
        <img
            class="half-split__image-natural"
            src="<?= esc_url($image['url']); ?>"
            alt="<?= esc_attr($image['alt']); ?>"
            srcset="<?= esc_attr(wp_get_attachment_image_srcset($image['ID'], 'full')); ?>"
            sizes="(max-width: 768px) 100vw, 50vw"
            loading="lazy"
        >
        <?php else: ?>
        <div
            class="half-split__image-bg"
            style="--bg-image: url('<?= esc_url($image['url']); ?>');"
            role="img"
            aria-label="<?= esc_attr($image['alt']); ?>"
        ></div>
        <?php endif; ?>

        <?php if ($image_caption): ?>
        <figcaption><?= esc_html($image_caption); ?></figcaption>
        <?php endif; ?>
    </figure>
</div>
