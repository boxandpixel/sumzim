<?php
/**
 * Expandable Card Slider
 */

    $expandable_slider = get_field('expandable_slider');

    if (empty($expandable_slider) || !is_array($expandable_slider)):
        // return;
        echo "no fields";
    endif;

    $heading = $expandable_slider['heading'] ?? '';
    $description = $expandable_slider['description'] ?? [];
    $cards = $expandable_slider['cards'] ?? [];

    if(empty($heading) && empty($cards)):
        return;
    endif;
?>

<section class="acf-block expandable-slider">
    <div class="container">
        <?php if($heading): ?>
        <div class="expandable-slider__header">
            <div class="expandable-slider__header-group">
                <h2 class="expandable-slider__header-group-heading"><?= esc_html($heading); ?></h2>
                <?php if($description): ?>
                <div class="expandable-slider__header-group-description">
                    <?= wp_kses_post($description);  ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="expandable-slider__body">
            <div class="cards-container" data-expandable-slider>
                <div class="cards-wrapper">
                    <div class="cards" data-cards-slider>
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
                            <div class="card" data-card-id="<?= esc_attr($card_id); ?>"
                                style="--bg-image: url('<?= esc_attr($image['url']) ?>');">
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

                                                <div class="card__main-content-core">
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
<div class="card-modal" data-card-modal
    style="--bg-image: url(<?= $image['url']; ?>)">
    <div class="card-modal__content">
        <button class="card-modal__close" data-modal-close>
           <span>Close</span>
        </button>
        
        <img class="card-modal__image" src="" alt="" data-modal-image>
        
        <div class="card-modal__body">
            <h3 class="card-modal__title" data-modal-title></h3>
            <div class="card-modal__description" data-modal-description></div>
            <a href="#" class="card-modal__link button button--secondary" data-modal-link style="display: none;"></a>
            <div class="card-modal__stats" data-modal-stats style="display: none;"></div>
        </div>
    </div>
</div>