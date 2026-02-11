<?php
/**
 * Flip Cards Block
 */

$flip_cards_block = get_field('flip_cards');

if (empty($flip_cards_block) || !is_array($flip_cards_block)) {
    return;
}

$heading     = $flip_cards_block['heading'] ?? '';
$description = $flip_cards_block['description'] ?? '';
$cards       = $flip_cards_block['flip_cards'] ?? [];

if (empty($heading) && empty($cards)) {
    return;
}
?>

<section class="acf-block flip-cards">
    <div class="container">

        <?php if ($heading || $description): ?>
            <header class="flip-cards__header">
                <?php if ($heading): ?>
                    <h2 class="flip-cards__heading">
                        <?= esc_html($heading); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="flip-cards__description">
                        <?= wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </header>
        <?php endif; ?>

        <?php if (!empty($cards)): ?>
        <div class="flip-cards__grid">
            <?php foreach ($cards as $card): 
                $heading = $card['heading'] ?? '';
                $description = $card['description'] ?? '';
                $link = $card['link'] ?? null;
                $image = $card['image'] ?? null;

                $img_url = $image['url'] ?? '';
            ?>
                <div class="flip-card">
                    <div class="flip-card__inner">

                        <!-- FRONT -->
                        <div class="flip-card__face flip-card__face--front"
                            style="--bg-image: url('<?= esc_url($img_url); ?>');">
                            <button class="flip-card__toggle" data-flip-card aria-label="Flip card">
                                <span class="material-icons">360</span>
                            </button>
                            <?php if ($heading): ?>
                                <h3 class="flip-card__title"><?= esc_html($heading); ?></h3>
                            <?php endif; ?>
                        </div>

                        <!-- BACK -->
                        <div class="flip-card__face flip-card__face--back"
                            style="--bg-image: url('<?= esc_url($img_url); ?>');">
                            <button class="flip-card__toggle" data-flip-card aria-label="Flip card back">
                                <span class="material-icons">360</span>
                            </button>
                            
                            <div class="flip-card__overlay-content">
                                <?php if ($heading): ?>
                                    <h3 class="flip-card__title"><?= esc_html($heading); ?></h3>
                                <?php endif; ?>

                                <?php if ($description): ?>
                                    <div class="flip-card__description">
                                        <?= wp_kses_post($description); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($link): ?>
                                    <a class="flip-card__link button button--secondary"
                                    href="<?= esc_url($link['url']); ?>"
                                    target="<?= esc_attr($link['target'] ?: '_self'); ?>">
                                        <?= esc_html($link['title'] ?: 'Learn more'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>