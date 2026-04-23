<?php
/**
 * Half Split – WYSIWYG layout
 */

$content = get_query_var('wysiwyg_data') ?: '';

if (empty($content)) {
    return;
}
?>

<div class="half-split__wysiwyg">
    <?php echo wp_kses_post($content); ?>
</div>
