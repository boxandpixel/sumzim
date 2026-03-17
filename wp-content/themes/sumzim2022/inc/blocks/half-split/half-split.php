<?php
/**
 * Half Split Block
 */

$half_split = get_field('half_split');

if (empty($half_split) || !is_array($half_split)) {
    return;
}

$left   = $half_split['left_column'] ?? [];
$right  = $half_split['right_column'] ?? [];
$layouts = half_split_layouts();

/**
 * Render a flexible content column
 */
function half_split_render_column(array $rows, array $layouts): void {
    foreach ($rows as $row) {
        $layout = $row['acf_fc_layout'] ?? '';

        if (!isset($layouts[$layout])) {
            continue;
        }

        $config = $layouts[$layout];
        $data   = $row[$config['field_key']] ?? [];

        set_query_var($config['data_key'], $data);
        get_template_part($config['template']);
        set_query_var($config['data_key'], null);
    }
}

?>

<section class="half-split">
    <div class="container">
        <div class="half-split__inner">

            <div class="half-split__col half-split__col--left">
                <?php if (!empty($left)): ?>
                    <?php half_split_render_column($left, $layouts); ?>
                <?php endif; ?>
            </div>

            <div class="half-split__col half-split__col--right">
                <?php if (!empty($right)): ?>
                    <?php half_split_render_column($right, $layouts); ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>