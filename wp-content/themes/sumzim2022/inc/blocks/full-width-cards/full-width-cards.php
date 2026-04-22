<?php
/**
 * Full-Width Cards
 */

$data             = get_field('full-width_cards') ?? [];
$heading          = $data['heading'] ?? '';
$heading_position = !empty($data['heading_position']) ? strtolower($data['heading_position']) : 'left';
$description      = $data['description'] ?? '';
$cards_set        = $data['cards_set'] ?? [];
$background_color = $data['background_color'] ?? '';

if (empty($cards_set)) {
    return;
}

$className = 'full-width-cards';

if ($background_color === 'none'):
    $className .= ' full-width-cards--none';
elseif ($background_color === 'light-blue'):
    $className .= ' full-width-cards--light-blue';
elseif ($background_color === 'light-blue-gradient-to-dark'):
    $className .= ' full-width-cards--light-blue-gradient-to-dark';
elseif ($background_color === 'light-blue-gradient-to-light'):
    $className .= ' full-width-cards--light-blue-gradient-to-light';
endif;
?>

<section class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if ($heading || $description): ?>
        <div class="full-width-cards__header full-width-cards__header--<?php echo esc_attr($heading_position); ?>">

            <?php if ($heading): ?>
            <h2 class="full-width-cards__header-heading"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($description): ?>
            <div class="full-width-cards__header-description">
                <?php echo wp_kses_post($description); ?>
            </div>
            <?php endif; ?>

        </div>
        <?php endif; ?>

        <div class="full-width-cards__cards">

            <?php foreach ($cards_set as $index => $card):
                $card_heading     = $card['card_heading'] ?? '';
                $card_description = $card['card_description'] ?? '';
                $show_number      = !empty($card['show_number']);
                $card_number      = $index + 1;
            ?>
            <div class="full-width-cards__card">

                <?php if ($show_number): ?>
                <span class="full-width-cards__card-number"><?php echo esc_html($card_number); ?></span>
                <?php endif; ?>

                <?php if ($card_heading): ?>
                <h3 class="full-width-cards__card-heading"><?php echo esc_html($card_heading); ?></h3>
                <?php endif; ?>

                <?php if ($card_description): ?>
                <div class="full-width-cards__card-description">
                    <?php echo wp_kses_post($card_description); ?>
                </div>
                <?php endif; ?>

            </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>
