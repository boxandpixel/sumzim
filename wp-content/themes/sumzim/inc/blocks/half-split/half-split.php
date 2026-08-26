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
$panel_style = $half_split['panel_style'] ?? '';

$class = 'half-split';
if ( $panel_style && $panel_style !== 'none' ) $class .= ' half-split--' . $panel_style;

// Per-column brand accent and the optional filled footer bar.
$accents = [
	'left'  => $half_split['left_panel_accent']  ?? '',
	'right' => $half_split['right_panel_accent'] ?? '',
];
$footers = [
	'left'  => $half_split['left_panel_footer_link']  ?? [],
	'right' => $half_split['right_panel_footer_link'] ?? [],
];

/**
 * Class list for one column.
 */
if (!function_exists('half_split_col_class')):
function half_split_col_class(string $side, array $accents): string {
	$class = 'half-split__col half-split__col--' . $side;
	$accent = $accents[$side] ?? '';
	if ( $accent && $accent !== 'none' ) {
		$class .= ' half-split__col--accent-' . $accent;
	}
	return $class;
}
endif;

/**
 * Filled footer bar for one column.
 */
if (!function_exists('half_split_render_footer')):
function half_split_render_footer(array $link): void {
	if ( empty($link['url']) ) {
		return;
	}
	printf(
		'<a class="half-split__panel-footer" href="%s"%s>%s</a>',
		esc_url($link['url']),
		!empty($link['target']) ? ' target="' . esc_attr($link['target']) . '" rel="noopener"' : '',
		esc_html($link['title'] ?: $link['url'])
	);
}
endif;

/**
 * Render a flexible content column
 */
if (!function_exists('half_split_render_column')):
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
endif;

?>

<section class="<?= esc_attr($class); ?>">
    <div class="container">
        <div class="half-split__inner">

            <div class="<?= esc_attr(half_split_col_class('left', $accents)); ?>">
                <?php if (!empty($left)): ?>
                    <?php half_split_render_column($left, $layouts); ?>
                <?php endif; ?>
                <?php half_split_render_footer($footers['left']); ?>
            </div>

            <div class="<?= esc_attr(half_split_col_class('right', $accents)); ?>">
                <?php if (!empty($right)): ?>
                    <?php half_split_render_column($right, $layouts); ?>
                <?php endif; ?>
                <?php half_split_render_footer($footers['right']); ?>
            </div>

        </div>
    </div>
</section>