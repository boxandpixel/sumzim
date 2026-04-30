<?php
/**
 * Icon Grid
 */

$icon_grid        = get_field('icon_grid');

$heading          = $icon_grid['heading']          ?? '';
$description      = $icon_grid['description']      ?? '';
$link             = $icon_grid['link']             ?? [];
$items            = $icon_grid['items']            ?? [];
$background_color = $icon_grid['background_color'] ?? '';

$class = 'icon-grid';
if ( $background_color === 'none' )                             $class .= ' icon-grid--none';
elseif ( $background_color === 'light-blue' )                   $class .= ' icon-grid--light-blue';
elseif ( $background_color === 'light-blue-gradient-to-dark' )  $class .= ' icon-grid--light-blue-gradient-to-dark';
elseif ( $background_color === 'light-blue-gradient-to-light' ) $class .= ' icon-grid--light-blue-gradient-to-light';
?>

<section class="<?php echo esc_attr( $class ); ?>">
    <div class="container">

        <?php if ( $heading || $description ) : ?>
        <div class="icon-grid__header">
            <?php if ( $heading ) : ?>
            <h2 class="icon-grid__heading"><?php echo esc_html( $heading ); ?></h2>
            <?php endif; ?>

            <?php if ( $description ) : ?>
            <div class="icon-grid__description"><?php echo wp_kses_post( $description ); ?></div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ( $items ) : ?>
        <div class="icon-grid__grid">

            <?php foreach ( $items as $item ) :
                $icon_type     = $item['icon_type']     ?? '';
                $material_icon = $item['material_icon'] ?? '';
                $image_icon    = $item['image_icon']    ?? [];
                $item_heading  = $item['heading']        ?? '';
                $item_desc     = $item['description']    ?? '';
                $item_link     = $item['link']           ?? [];

                $has_link   = ! empty( $item_link['url'] );
                $tag        = $has_link ? 'a' : 'div';
                $link_attrs = '';
                if ( $has_link ) {
                    $link_attrs  = ' href="' . esc_url( $item_link['url'] ) . '"';
                    $link_attrs .= ! empty( $item_link['target'] ) ? ' target="' . esc_attr( $item_link['target'] ) . '"' : '';
                }
            ?>
            <<?php echo $tag . $link_attrs; ?> class="icon-grid__item<?php echo $has_link ? ' icon-grid__item--linked' : ''; ?>">

                <?php if ( $icon_type === 'material-icon' && $material_icon ) : ?>
                <div class="icon-grid__icon">
                    <span class="material-symbols-outlined"><?php echo esc_html( $material_icon ); ?></span>
                </div>
                <?php elseif ( $icon_type === 'image-icon' && $image_icon ) : ?>
                <div class="icon-grid__icon icon-grid__icon--image">
                    <img
                        src="<?php echo esc_url( $image_icon['url'] ); ?>"
                        alt="<?php echo esc_attr( $image_icon['alt'] ); ?>"
                        width="<?php echo esc_attr( $image_icon['width'] ); ?>"
                        height="<?php echo esc_attr( $image_icon['height'] ); ?>"
                    >
                </div>
                <?php endif; ?>

                <div class="icon-grid__content">

                    <?php if ( $item_heading ) : ?>
                    <h3 class="icon-grid__item-heading"><?php echo esc_html( $item_heading ); ?></h3>
                    <?php endif; ?>

                    <?php if ( $item_desc ) : ?>
                    <div class="icon-grid__item-description"><?php echo wp_kses_post( $item_desc ); ?></div>
                    <?php endif; ?>

                    <?php if ( $has_link ) : ?>
                    <span class="icon-grid__item-link">
                        <?php echo esc_html( $item_link['title'] ); ?>
                        <span class="material-symbols-outlined icon-grid__item-link-arrow" aria-hidden="true">arrow_forward</span>
                    </span>
                    <?php endif; ?>

                </div>

            </<?php echo $tag; ?>>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>

        <?php if ( $link && ! empty( $link['url'] ) ) : ?>
        <div class="icon-grid__footer">
            <a
                href="<?php echo esc_url( $link['url'] ); ?>"
                class="button button-cta button--primary"
                <?php echo ! empty( $link['target'] ) ? 'target="' . esc_attr( $link['target'] ) . '"' : ''; ?>
            >
                <?php echo esc_html( $link['title'] ); ?>
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>