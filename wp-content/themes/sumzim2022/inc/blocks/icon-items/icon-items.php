<?php
/**
 * Icon Items
 */

$icon_items = get_query_var('icon_items_data') ?: get_field('icon_items');

$heading          = $icon_items['heading'] ?? '';
$items            = $icon_items['items'] ?? [];
$link             = $icon_items['link'] ?? [];
$background_color = $icon_items['background_color'] ?? '';

$is_embedded = !empty(get_query_var('icon_items_data'));

$className = 'icon-items';
if ($is_embedded) $className .= ' icon-items--embedded';

if ($background_color === 'none'):
    $className .= ' icon-items--none';
elseif ($background_color === 'light-blue'):
    $className .= ' icon-items--light-blue';
elseif ($background_color === 'light-blue-gradient-to-dark'):
    $className .= ' icon-items--light-blue-gradient-to-dark';
elseif ($background_color === 'light-blue-gradient-to-light'):
    $className .= ' icon-items--light-blue-gradient-to-light';
endif;
?>

<section class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if ($heading): ?>
        <div class="icon-items__header">
            <h2 class="icon-items__heading"><?php echo esc_html($heading); ?></h2>
        </div>
        <?php endif; ?>

        <div class="icon-items__grid">

            <?php foreach ($items as $item):
                $icon        = $item['icon'] ?? '';
                $item_heading = $item['heading'] ?? '';
                $description = $item['description'] ?? '';
            ?>
            <div class="icon-items__item">

                <?php if ($icon): ?>
                <div class="icon-items__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html($icon); ?></span>
                </div>
                <?php endif; ?>

                <div class="icon-items__content">
                    <?php if ($item_heading): ?>
                    <h5 class="icon-items__item-heading"><?php echo esc_html($item_heading); ?></h5>
                    <?php endif; ?>

                    <?php if ($description): ?>
                    <p class="icon-items__item-description"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>

            </div>
            <?php endforeach; ?>

        </div>

        <?php if ($link && !empty($link['url'])): ?>
        <div class="icon-items__footer">
            <a
                href="<?php echo esc_url($link['url']); ?>"
                class="button button-cta button--primary"
                <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>
            >
                <?php echo esc_html($link['title']); ?>
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>