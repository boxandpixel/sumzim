<?php
/**
 * Card Scroll
 */

    $cards_scroll = get_field('cards_scroll');

    if (empty($cards_scroll) || !is_array($cards_scroll)):
        echo "no fields";
    endif;

    $heading = $cards_scroll['heading'] ?? '';
    $description = $cards_scroll['description'] ?? [];
    $cards = $cards_scroll['cards'] ?? [];

    if(empty($heading) && empty($cards)):
        return;
    endif;
?>

<section class="acf-block cards-scroll">
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
        <div class="cards-scroll__body">
            <div class="cards-container" data-cards-scroll>
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
                                if($link): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                endif;
                        ?>
                            <div class="card <?= !$has_image ? 'card--no-image' : ''; ?>" 
                                data-card-id="<?= esc_attr($card_id); ?>"
                                <?php if($has_image): ?>
                                style="--bg-image: url('<?= esc_attr($image['url']) ?>');"
                                <?php endif; ?>>
                                
                                <!-- Mobile: tap to open modal -->
                                <button class="card__mobile-trigger" data-open-modal>
                                    <span>View details</span>
                                </button>
                                
                                <div class="card__content">
                                    <div class="card__inner">
                                        <div class="card__main-content">
                                            <?php if($heading): ?>
                                            <h4 class="card__heading"><?= esc_html($heading); ?></h4>                                                    
                                            <?php endif; ?>
                                        
                                            <?php if($description): ?>
                                            <div class="card__description"><?= wp_kses_post($description); ?></div>
                                            <?php endif; ?>
                                            
                                            <?php if($link && $link_url): ?>
                                            <a href="<?= esc_attr($link_url); ?>" class="card__link button button--secondary" target="<?= esc_attr($link_target); ?>">
                                                <?= esc_html($link_title ?: 'Learn More'); ?>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                            endforeach;
                        ?>
                    </div>
                </div>
                
                <div class="cards__nav">
                    <div class="cards__nav-nav">
                        <button class="cards__nav-nav-prev" data-prev-btn>Prev</button>
                        <button class="cards__nav-nav-next" data-next-btn>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Modal -->
<div class="card-modal" data-card-modal>
    <div class="card-modal__content">
        <button class="card-modal__close" data-modal-close>
           <span>Close</span>
        </button>
        
        <div class="card-modal__body">
            <h3 class="card-modal__title" data-modal-title></h3>
            <div class="card-modal__description" data-modal-description></div>
            <a href="#" class="card-modal__link button button--secondary" data-modal-link style="display: none;"></a>
        </div>
    </div>
</div>