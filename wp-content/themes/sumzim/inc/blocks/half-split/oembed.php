<?php
/**
 * Half Split – oEmbed layout
 */

$data           = get_query_var('half_split_oembed_data') ?: [];
$oembed         = $data['oembed']         ?? '';
$oembed_caption = $data['oembed_caption'] ?? '';

if (empty($oembed)) {
    return;
}
?>

<div class="half-split__oembed">
    <figure>
        <?= $oembed; ?>
        <?php if ($oembed_caption): ?>
        <figcaption><?= esc_html($oembed_caption); ?></figcaption>
        <?php endif; ?>
    </figure>
</div>
