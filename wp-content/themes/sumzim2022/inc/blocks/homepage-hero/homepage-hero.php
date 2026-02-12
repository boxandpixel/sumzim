<?php
/**
 * Homepage Hero Block
 * 
 * Full-width hero with background video (desktop) / image (mobile)
 */

$hero = get_field('homepage_hero');

if (empty($hero)) {
    return;
}

$video = !empty($hero['video']) ? $hero['video'] : null;
$image = !empty($hero['image']) ? $hero['image'] : null;
$headline = !empty($hero['headline']) ? $hero['headline'] : '';
$button_type = !empty($hero['button_type']) ? $hero['button_type'] : '';
$page_link = !empty($hero['page_link']) ? $hero['page_link'] : null;
$book_now_title = !empty($hero['book_now_link_title']) ? $hero['book_now_link_title'] : '';

if (!$video && !$image && !$headline) {
    return;
}

// Responsive image setup
$image_url = $image['url'] ?? '';
$image_alt = $image['alt'] ?? $headline;
$image_srcset = '';

if ($image) {
    $sizes_to_check = ['medium', 'medium_large', 'large', 'full'];
    $srcset_parts = [];
    
    foreach ($sizes_to_check as $size) {
        if ($size === 'full') {
            $srcset_parts[] = $image['url'] . ' ' . $image['width'] . 'w';
        } elseif (!empty($image['sizes'][$size])) {
            $srcset_parts[] = $image['sizes'][$size] . ' ' . $image['sizes'][$size . '-width'] . 'w';
        }
    }
    
    $image_srcset = implode(', ', $srcset_parts);
}
?>

<section class="homepage-hero">
    <div class="homepage-hero__media">
        <?php if ($image): ?>
            <img 
                class="homepage-hero__image<?php echo $video ? ' homepage-hero__image--fallback' : ''; ?>"
                src="<?php echo esc_url($image_url); ?>"
                <?php if ($image_srcset): ?>
                    srcset="<?php echo esc_attr($image_srcset); ?>"
                    sizes="100vw"
                <?php endif; ?>
                alt="<?php echo esc_attr($image_alt); ?>"
                loading="eager"
                fetchpriority="high"
                decoding="async"
            />
        <?php endif; ?>

        <?php if ($video): ?>
            <video 
                class="homepage-hero__video"
                autoplay 
                muted 
                loop 
                playsinline
                preload="none"
                poster="<?php echo $image ? esc_url($image_url) : ''; ?>"
            >
                <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
            </video>
        <?php endif; ?>

        <div class="homepage-hero__gradient"></div>
    </div>

    <?php if ($headline || $button_type): ?>
        <div class="homepage-hero__content">
            <?php if ($headline): ?>
                <h1 class="homepage-hero__headline"><?php echo esc_html($headline); ?></h1>
            <?php endif; ?>

            <?php if ($button_type === 'Link' && $page_link && !empty($page_link['url'])): ?>
                <div class="homepage-hero__button">
                    <a href="<?php echo esc_url($page_link['url']); ?>" 
                       class="button button--large button--primary"
                       <?php echo !empty($page_link['target']) ? 'target="' . esc_attr($page_link['target']) . '"' : ''; ?>
                    >
                        <?php echo esc_html($page_link['title']); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($button_type === 'Book Now' && $book_now_title): ?>
                <div class="homepage-hero__button">
                    <button 
                        class="button button-cta button--schedule button--large book-now-button" 
                        onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" 
                        type="button"
                    >
                        <?php echo esc_html($book_now_title); ?>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>