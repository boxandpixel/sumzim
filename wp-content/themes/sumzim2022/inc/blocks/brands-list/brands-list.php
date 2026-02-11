<?php
/**
 * Brands List Block
 * 
 * Displays a grid of brand logos
 */

// Get the brands list field group
$brands_list = get_field('brands_list');

// Bail early if no data
if (empty($brands_list)) {
    return;
}

// Get settings with defaults
$heading = $brands_list['heading'] ?? '';
$description = $brands_list['description'] ?? '';
$brands = $brands_list['brands'] ?? [];

// Bail if no brands
if (empty($brands)) {
    return;
}

?>

<section class="brands-list">
    <div class="container">
        <?php if($heading || $description): ?>
        <div class="brands-list__header">
            <h2 class="brands-list__header-heading"><?= esc_html($heading); ?></h2>
            <?php if($description): ?>
            <div class="brands-list__header-description">
                <?= wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="brands-list__grid">
        <?php foreach($brands as $brand): ?>
            <?php
                $brand_image = $brand['brand_image'] ?? null;
            ?>
            
            <?php if($brand_image && !empty($brand_image['url'])): ?>
                <div class="brand-card">
                    <div class="brand-card__image-wrapper">
                        <img src="<?= esc_url($brand_image['url']); ?>" 
                             alt="<?= esc_attr($brand_image['alt'] ?: 'Brand logo'); ?>"
                             class="brand-card__image">
                    </div>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>
        </div>
    </div>
</section>