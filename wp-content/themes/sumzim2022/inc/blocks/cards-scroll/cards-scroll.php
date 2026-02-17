<?php
/**
 * Card Scroll
 */

    $cards_scroll = get_field('cards_scroll');

    if (empty($cards_scroll) || !is_array($cards_scroll)):
        return;
    endif;

    $heading = $cards_scroll['heading'] ?? '';
    $description = $cards_scroll['description'] ?? [];
    $cards = $cards_scroll['cards'] ?? [];

    if(empty($heading) && empty($cards)):
        return;
    endif;
?>

<section class="acf-block cards-scroll" data-cards-scroll>
    <div class="cards-scroll__sticky">
        <div class="container">
            <?php if($heading): ?>
            <div class="cards-scroll__header">
                <div class="cards-scroll__header-group">
                    <h2 class="cards-scroll__header-group-heading"><?= esc_html($heading); ?></h2>
                    <?php if($description): ?>
                    <div class="cards-scroll__header-group-description">
                        <?= wp_kses_post($description); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="cards-scroll__body">
            <div class="cards-container">
                <div class="cards-wrapper">
                    <div class="cards" data-cards-slider>
                        <?php 
                            foreach($cards as $index => $item): 
                                $heading = $item['heading'] ?? '';
                                $image = $item['image'] ?? null;
                                $description = $item['description'] ?? '';
                                $link = $item['link'] ?? null;
                                
                                $card_id = 'card-' . $index;
                                $has_image = !empty($image) && !empty($image['url']);
                                
                                // Get link details if it exists
                                $link_url = '';
                                $link_title = '';
                                $link_target = '_self';
                                $has_link = false;
                                if($link && !empty($link['url'])): 
                                    $has_link = true;
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                endif;

                                // Strip <a> tags from description to prevent nested links
                                $safe_description = $description;
                                if($has_link && $description):
                                    $safe_description = preg_replace('/<a\b[^>]*>(.*?)<\/a>/is', '$1', $description);
                                endif;

                                // Card tag: <a> if link exists, <div> otherwise
                                $card_tag = $has_link ? 'a' : 'div';
                                $card_attrs = '';
                                if($has_link):
                                    $card_attrs = sprintf(
                                        'href="%s" target="%s"',
                                        esc_attr($link_url),
                                        esc_attr($link_target)
                                    );
                                endif;
                        ?>
                            <<?= $card_tag; ?> class="card <?= !$has_image ? 'card--no-image' : ''; ?>" 
                                data-card-id="<?= esc_attr($card_id); ?>"
                                <?= $card_attrs; ?>
                                <?php if($has_image): ?>
                                style="--bg-image: url('<?= esc_attr($image['url']) ?>');"
                                <?php endif; ?>>
                                
                                <div class="card__content">
                                    <div class="card__inner">
                                        <div class="card__text-group">
                                            <?php if($heading): ?>
                                            <h4 class="card__heading"><?= esc_html($heading); ?></h4>                                                    
                                            <?php endif; ?>
                                        
                                            <?php if($description): ?>
                                            <div class="card__description"><?= wp_kses_post($safe_description); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if($has_link && $link_title): ?>
                                        <div class="card__action-group">
                                            <span class="card__link button button-cta button--secondary">
                                                <?= esc_html($link_title); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </<?= $card_tag; ?>>

                        <?php 
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>