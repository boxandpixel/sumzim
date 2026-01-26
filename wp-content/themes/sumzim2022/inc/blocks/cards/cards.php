<?php
/**
 * Cards Block
 * 
 * Displays a grid of cards with optional images, headings, descriptions, and buttons
 */

// Get the cards field group
$cards = get_field('cards');

// Bail early if no cards data
if (empty($cards)) {
    return;
}

// Get card settings with defaults
$cards_columns = !empty($cards['cards_columns']) ? $cards['cards_columns'] : '3';
$cards_set = !empty($cards['cards_set']) ? $cards['cards_set'] : array();
$heading = $cards['heading'] ?? '';
$description = $cards['description'] ?? '';

// Bail if no cards in the set
if (empty($cards_set)) {
    return;
}

?>

<section class="cards">
    <div class="container">
        <?php if($heading || $description): ?>
        <div class="cards__header">
            <h2 class="cards__header-heading"><?= esc_html($heading); ?></h2>
            <?php if($description): ?>
            <div class="cards__header-description">
                <?= wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="cards-block cards-<?php echo esc_attr($cards_columns); ?> contain">
        <?php foreach($cards_set as $card): ?>
            <?php
                // Extract card data with defensive checks
                $card_heading = !empty($card['card_heading']) ? $card['card_heading'] : '';
                $card_description = !empty($card['card_description']) ? $card['card_description'] : '';
                $card_image = !empty($card['card_image']) ? $card['card_image'] : null;
                $card_button = !empty($card['card_button']) ? $card['card_button'] : null;
                
                // Determine if card should be a link
                $is_link = !empty($card_button) && !empty($card_button['url']);
            ?>
            
            <?php if($is_link): ?>
                <a href="<?php echo esc_url($card_button['url']); ?>" class="card">
            <?php else: ?>
                <div class="card">
            <?php endif; ?>
                
                <?php if($card_image && !empty($card_image['url'])): ?>
                    <div class="card-image-wrapper">
                        <div class="card-image" style="background-image: url('<?php echo esc_url($card_image['url']); ?>');"></div>
                        <div class="card-gradient"></div>
                        
                        <div class="card-overlay-content">
                            <?php if($card_heading): ?>
                                <div class="card-heading">
                                    <h5><?php echo wp_kses_post($card_heading); ?></h5>
                                </div>
                            <?php endif; ?>

                            <?php if($card_description): ?>
                                <div class="card-description">
                                    <?php echo wp_kses_post($card_description); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($is_link): ?>
                                <div class="card-button">
                                    <button class="button-cta button--secondary"><?php echo esc_html($card_button['title']); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Fallback for cards without images -->
                    <div class="card-content">
                        <?php if($card_heading): ?>
                            <div class="card-heading">
                                <h5><?php echo wp_kses_post($card_heading); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if($card_description): ?>
                            <div class="card-description">
                                <?php echo wp_kses_post($card_description); ?>
                            </div>
                        <?php endif; ?>

                        <?php if($is_link): ?>
                            <div class="card-button">
                                <button class="button-cta button--primary"><?php echo esc_html($card_button['title']); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php if($is_link): ?>
                </a>
            <?php else: ?>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>
        </div>
    </div>
</section>