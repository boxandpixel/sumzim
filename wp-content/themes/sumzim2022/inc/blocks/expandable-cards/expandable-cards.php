<?php
/**
 * Expandable Cards - Static Grid Variation
 */

    $expandable_cards = get_field('expandable_cards');

    if (empty($expandable_cards) || !is_array($expandable_cards)):
        return;
    endif;

    $cards = $expandable_cards['cards'] ?? [];

    if(empty($cards)):
        return;
    endif;
    
    // Limit cards to max 4
    $cards = array_slice($cards, 0, 4);
?>

<section class="acf-block expandable-cards expandable-cards--static">
    <div class="container">
        <div class="expandable-cards__body">
            <div class="cards-container" data-expandable-cards-static>
                <div class="cards-wrapper">
                    <div class="cards" data-cards-static data-card-count="<?php echo count($cards); ?>">
                        <?php 
                            foreach($cards as $index => $item): 
                                $heading = $item['heading'] ?? '';
                                $image = $item['image'] ?? null;
                                $description = $item['description'] ?? '';
                                $link = $item['link'] ?? null;
                                
                                $card_id = 'card-' . $index;
                                
                                // Get link details if it exists
                                $link_url = '';
                                $link_title = '';
                                $link_target = '_self';
                                if($link): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                endif;
                        ?>
                            <div class="card" data-card-id="<?php echo esc_attr($card_id); ?>" data-card-index="<?php echo $index; ?>"
                                style="--bg-image: url('<?php echo esc_attr($image['url']); ?>');">
                                <button class="card__close-btn" data-close-card>
                                    <span>Close</span>
                                </button>
                                <button class="card__expand-btn" data-expand-card>
                                    <span>Learn More</span>
                                </button>                                
                                
                                <div class="card__content">
                                    <div class="card__expanded-content">
                                        <div class="card__expanded-inner">
                                            <div class="card__main-content">
                                                <?php if($heading): ?>
                                                <h3 class="card__heading"><?php echo esc_html($heading); ?></h3>                                                    
                                                <?php endif; ?>
                                            
                                                <?php if($description): ?>
                                                <div class="card__description"><?php echo wp_kses_post($description); ?></div>
                                                <?php endif; ?>
                                                
                                                <?php if($link && $link_url): ?>
                                                <a href="<?php echo esc_attr($link_url); ?>" class="card__link button button--tertiary" target="<?php echo esc_attr($link_target); ?>">
                                                    <?php echo esc_html($link_title ?: 'Learn More'); ?>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Modal -->
<div class="card-modal" data-card-modal
    style="--bg-image: url(<?php echo $image['url'] ?? ''; ?>)">
    <div class="card-modal__content">
        <button class="card-modal__close" data-modal-close>
           <span>Close</span>
        </button>
        
        <img class="card-modal__image" src="" alt="" data-modal-image>
        
        <div class="card-modal__body">
            <h3 class="card-modal__title" data-modal-title></h3>
            <div class="card-modal__description" data-modal-description></div>
            <a href="#" class="card-modal__link button button--tertiary" data-modal-link style="display: none;"></a>
        </div>
    </div>
</div>
