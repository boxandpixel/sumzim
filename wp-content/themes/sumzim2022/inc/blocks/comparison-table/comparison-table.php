<?php
/**
 * Membership Features
 */

    $comparison_table = $args['comparison_table'] ?? get_field("comparison_table");
    $eyebrow = $comparison_table['eyebrow'] ?? '';
    $heading = $comparison_table['heading'] ?? '';
    $description = $comparison_table['description'] ?? '';
    $feature_rows = $comparison_table['feature_rows'] ?? [];

    // Basic column data
    $basic_column_title = $comparison_table['basic_column_title'] ?? 'Basic';
    $basic_column_price = $comparison_table['basic_column_price'] ?? '';
    $basic_column_description = $comparison_table['basic_column_description'] ?? '';
    $basic_column_links = $comparison_table['basic_column_links'] ?? [];

    // Full column data
    $full_column_title = $comparison_table['full_column_title'] ?? 'Full';
    $full_column_price = $comparison_table['full_column_price'] ?? '';
    $full_column_description = $comparison_table['full_column_description'] ?? '';
    $full_column_links = $comparison_table['full_column_links'] ?? [];

    if(empty($comparison_table) || !is_array($comparison_table)):
        return;
    endif; 

    // Inline check icon SVG
    $check_svg = '<span class="comparison-table__check">check</span>' ?? '';
    $alt_svg = '' ?? '';    
?>

<section class="acf-block comparison-table" id="comparison-table">
    <div class="container">

        <div class="comparison-table__header">
            <?php if ($eyebrow): ?>
                <p class="comparison-table__eyebrow"><?= esc_html($eyebrow); ?></p>
            <?php endif; ?>

            <?php if ($heading): ?>
                <h2 class="comparison-table__heading"><?= esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <div class="feature-comparison__description">
                    <?= wp_kses_post($description); ?>
                </div>
            <?php endif; ?>
        </div>


        <div class="comparison-table__table" id="comparison-table">
            <?php if (!empty($feature_rows)): ?>
                <!-- Desktop Table -->
                <table class="comparison-table__table comparison-table__table--desktop">
                <colgroup>
                    <!-- <col style="width: auto;">
                    <col style="width: 252px;">
                    <col style="width: 188px;">
                    <col style="width: 20px;"> -->
                    <col>
                    <col>
                    <col>
                    <col>                    
                </colgroup>                    
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>
                                <div class="comparison-table__column-header">
                                    <h3 class="comparison-table__column-heading"><?= esc_html($basic_column_title); ?></h3>

                                    <?php if ($basic_column_description): ?>
                                        <p class="comparison-table__description"><?= esc_html($basic_column_description); ?></p>
                                    <?php endif; ?>
                                </div>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <div class="comparison-table__column-header">
                                    <h3 class="comparison-table__column-heading"><?= esc_html($full_column_title); ?></h3>
                                    <?php if ($full_column_description): ?>
                                        <p class="comparison-table__description"><?= esc_html($full_column_description); ?></p>
                                    <?php endif; ?>                                  
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feature_rows as $row):
                            $feature_label = $row['feature_label'] ?? '';
                            $display_type = $row['feature_display_type'] ?? 'image';

                            // Image type: use boolean icons (Basic first, then Full)
                            $basic_icon = !empty($row['basic_included_icon']) ? '<div class="comparison-table-included comparison-table-included__included">' . $check_svg . '</div>' : '<div class="comparison-table-included comparison-table-included__notIncluded"></div>';
                            $full_icon = !empty($row['full_included_icon']) ? '<div class="comparison-table-included comparison-table-included__included">' . $check_svg . '</div>' : '<div class="comparison-table-included comparison-table-included__notIncluded"></div>';

                            // Text type: use custom text fields
                            $basic_text = $row['basic_included_text'] ?? '';
                            $full_text = $row['full_included_text'] ?? '';
                        ?>
                            <tr>
                                <td class="table-features"><?= esc_html($feature_label); ?></td>
                                <td>
                                    <?= ($display_type === 'custom-text' && $basic_text) ? esc_html($basic_text) : $basic_icon; ?>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <?= ($display_type === 'custom-text' && $full_text) ? esc_html($full_text) : $full_icon; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Links below table -->
                <?php if (!empty($basic_column_links) || !empty($full_column_links)): ?>
                    <div class="comparison-table__table-links">
                        <div class="comparison-table__table-links-spacer"></div>
                        <div class="comparison-table__table-links-column comparison-table__table-links-column--basic">
                            <?php if ($basic_column_price): ?>
                            <div class="comparison-table__price">
                                <p class="comparison-table__price-text"><?= esc_html($basic_column_price); ?></p>
                            </div>
                            <?php endif; ?>                              
                            <?php if (!empty($basic_column_links)): ?>
                                <div class="comparison-table__links">
                                    <?php foreach ($basic_column_links as $link_item): 
                                        $link = $link_item['link'] ?? [];
                                        if (!empty($link['url'])):
                                        $link_style = $link_item['link_style'];
                                    ?>
                                        <a href="<?= esc_url($link['url']); ?>" 
                                        class="button button--primary" 
                                        <?= !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                            <?= esc_html($link['title'] ?? 'Learn more'); ?>
                                        </a>
                                    <?php 
                                        endif;
                                    endforeach; ?>
                                </div>
                            <?php endif; ?>  
                        </div>

                        <div class="comparison-table__table-links-spacer-right"></div>
                        <div class="comparison-table__table-links-column comparison-table__table-links-column--full">
                            <?php if ($full_column_price): ?>
                                <div class="comparison-table__price">
                                    <p class="comparison-table__price-text"><?= esc_html($full_column_price); ?></p>
                                </div>
                                
                            <?php endif; ?>                          
                            <?php if (!empty($full_column_links)): ?>
                                <div class="comparison-table__links">
                                    <?php foreach ($full_column_links as $link_item): 
                                        $link = $link_item['link'] ?? [];
                                        if (!empty($link['url'])):
                                        $link_style = $link_item['link_style']; 
                                    ?>
                                        <a href="<?= esc_url($link['url']); ?>" 
                                           class="button button--primary" 
                                           <?= !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                            <?= esc_html($link['title'] ?? 'Learn more'); ?>
                                        </a>
                                    <?php 
                                        endif;
                                    endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="comparison-table__table comparison-table__table--mobile">

                    <!-- Basic Features -->
                    <div class="comparison-table__table-mobile comparison-table__table-mobile--basic">
                        <div class="comparison-table__mobile-header">
                            <h3 class="comparison-table__heading"><?= esc_html($basic_column_title); ?></h3>
                            <?php if ($basic_column_price): ?>
                                <p class="comparison-table__price"><?= esc_html($basic_column_price); ?></p>
                            <?php endif; ?>
                            <?php if ($basic_column_description): ?>
                                <p class="comparison-table__description"><?= esc_html($basic_column_description); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="comparison-table__features-list">
                            <p class="comparison-table__list-label">Basic features:</p>
                            <ul class="comparison-table__mobile-list">
                                <?php foreach ($feature_rows as $row):
                                    $feature_label = $row['feature_label'] ?? '';
                                    $display_type = $row['feature_display_type'] ?? 'image';
                                    $has_icon = !empty($row['basic_included_icon']);
                                    $basic_text = $row['basic_included_text'] ?? '';
                                    $mobile_basic_text = $row['mobile_basic_included_text'] ?? '';

                                    // Determine if this item should be shown (only if included)
                                    $is_included = ($display_type === 'custom-text') ? !empty($basic_text) : $has_icon;
                                    
                                    // Skip if not included
                                    if (!$is_included) continue;
                                    
                                    // Determine what content will be displayed
                                    $display_content = '';
                                    if ($display_type !== 'custom-text' && !empty($feature_label)) {
                                        $display_content = esc_html($feature_label);
                                    }
                                    if (!empty($mobile_basic_text)) {
                                        $display_content .= wp_kses_post($mobile_basic_text);
                                    }
                                    
                                    // Only create the <li> if there's content to display
                                    if (!empty($display_content)) :
                                ?>
                                    <li class="comparison-table__mobile-item">
                                        <?php if ($display_type !== 'custom-text' && !empty($feature_label)) : ?>
                                            <?= esc_html($feature_label); ?>
                                        <?php endif; ?>
                                        <?php if (!empty($mobile_basic_text)) : ?>
                                            <?= wp_kses_post($mobile_basic_text); ?>
                                        <?php endif; ?>
                                    </li>
                                <?php 
                                    endif;
                                endforeach; ?>
                            </ul>
                        </div>

                        <?php if (!empty($basic_column_links)): ?>
                            <div class="comparison-table__links">
                                <?php foreach ($basic_column_links as $link_item): 
                                    $link = $link_item['link'] ?? [];
                                    if (!empty($link['url'])):
                                    $link_style = $link_item['link_style']; 
                                ?>
                                    <a href="<?= esc_url($link['url']); ?>" 
                                       class="comparison-table__link button button--<?= esc_attr($link_style); ?>" 
                                       <?= !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                        <?= esc_html($link['title'] ?? 'Learn more'); ?>
                                    </a>
                                <?php 
                                    endif;
                                endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Full Features -->
                    <div class="comparison-table__table-mobile comparison-table__table-mobile--full">
                        <div class="comparison-table__mobile-header">
                            <h3 class="comparison-table__heading"><?= esc_html($full_column_title); ?></h3>
                            <?php if ($full_column_price): ?>
                                <p class="comparison-table__price"><?= esc_html($full_column_price); ?></p>
                            <?php endif; ?>
                            <?php if ($full_column_description): ?>
                                <p class="comparison-table__description"><?= esc_html($full_column_description); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="comparison-table__features-list">
                            <p class="comparison-table__list-label">Full features:</p>
                            <ul class="comparison-table__mobile-list">
                                <?php foreach ($feature_rows as $row):
                                    $feature_label = $row['feature_label'] ?? '';
                                    $display_type = $row['feature_display_type'] ?? 'image';
                                    $has_icon = !empty($row['full_included_icon']);
                                    $full_text = $row['full_included_text'] ?? '';
                                    $mobile_full_text = $row['mobile_full_included_text'] ?? '';

                                    // Determine if this item should be shown (only if included)
                                    $is_included = ($display_type === 'custom-text') ? !empty($full_text) : $has_icon;
                                    
                                    // Skip if not included
                                    if (!$is_included) continue;
                                    
                                    // Determine what content will be displayed
                                    $display_content = '';
                                    if ($display_type !== 'custom-text' && !empty($feature_label)) {
                                        $display_content = esc_html($feature_label);
                                    }
                                    if (!empty($mobile_full_text)) {
                                        $display_content .= wp_kses_post($mobile_full_text);
                                    }
                                    
                                    // Only create the <li> if there's content to display
                                    if (!empty($display_content)) :
                                ?>
                                    <li class="comparison-table__mobile-item">
                                        <?php if ($display_type !== 'custom-text' && !empty($feature_label)) : ?>
                                            <?= esc_html($feature_label); ?>
                                        <?php endif; ?>
                                        <?php if (!empty($mobile_full_text)) : ?>
                                            <?= wp_kses_post($mobile_full_text); ?>
                                        <?php endif; ?>
                                    </li>
                                <?php 
                                    endif;
                                endforeach; ?>
                            </ul>
                        </div>

                        <?php if (!empty($full_column_links)): ?>
                            <div class="comparison-table__links">
                                <?php foreach ($full_column_links as $link_item): 
                                    $link = $link_item['link'] ?? [];
                                    if (!empty($link['url'])):
                                    $link_style = $link_item['link_style']; 
                                ?>
                                    <a href="<?= esc_url($link['url']); ?>" 
                                       class="comparison-table__link button button--<?= esc_attr($link_style) ?>" 
                                       <?= !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                                        <?= esc_html($link['title'] ?? 'Learn more'); ?>
                                    </a>
                                <?php 
                                    endif;
                                endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            <?php endif; ?>
        </div>
    </div>
</section>