<?php
/**
 * Staff Slider Block
 * 
 * Displays a swiper carousel of staff cards with images, names, and titles
 * Hand-picked staff appear first, followed by remaining staff alphabetically
 */

// Get the staff slider field group
$staff_slider = get_field('staff_slider');

// Bail early if no data
if (empty($staff_slider)) {
    return;
}

// Get settings with defaults
$heading = $staff_slider['heading'] ?? '';
$description = $staff_slider['description'] ?? '';
$featured_staff = $staff_slider['staff_members'] ?? [];
$view_all_link = $staff_slider['link'] ?? null;

// Get IDs of hand-picked staff
$featured_ids = array_filter(array_map(function($staff_row) {
    $staff_post = $staff_row['name'] ?? null;
    return $staff_post ? $staff_post->ID : null;
}, $featured_staff));

// Query for all other staff (alphabetical, excluding featured)
$remaining_staff_query = new WP_Query([
    'post_type' => 'staff',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'post__not_in' => $featured_ids,
    'post_status' => 'publish'
]);

// Combine featured staff with remaining staff
$all_staff = [];

// Add featured staff first (in the order they were picked)
foreach ($featured_staff as $staff_row) {
    $staff_post = $staff_row['name'] ?? null;
    if ($staff_post) {
        $all_staff[] = $staff_post;
    }
}

// Add remaining staff alphabetically
if ($remaining_staff_query->have_posts()) {
    while ($remaining_staff_query->have_posts()) {
        $remaining_staff_query->the_post();
        $all_staff[] = get_post();
    }
    wp_reset_postdata();
}

// Bail if no staff at all
if (empty($all_staff)) {
    return;
}

// Generate unique ID for this slider instance
$slider_id = 'staff-slider-' . uniqid();

?>

<section class="staff-slider">
    <div class="container">
        <?php if($heading || $description): ?>
        <div class="staff-slider__header">
            <h2 class="staff-slider__header-heading"><?= esc_html($heading); ?></h2>
            <?php if($description): ?>
            <div class="staff-slider__header-description">
                <?= wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="staff-slider__wrapper">
            <div class="swiper <?= esc_attr($slider_id); ?>">
                <div class="swiper-wrapper">
                <?php foreach($all_staff as $staff_post): ?>
                    <?php
                        // Get staff data from the post
                        $name = get_the_title($staff_post->ID);
                        $job_title = get_field('job_title', $staff_post->ID);
                        $thumbnail_image = get_field('thumbnail_image', $staff_post->ID);
                        $staff_url = get_permalink($staff_post->ID);
                    ?>
                    
                    <div class="swiper-slide">
                        <a href="<?= esc_url($staff_url); ?>" class="staff-card">
                            <?php if($thumbnail_image && !empty($thumbnail_image['url'])): ?>
                                <div class="staff-card__image-wrapper">
                                    <div class="staff-card__image" style="background-image: url('<?= esc_url($thumbnail_image['url']); ?>');"></div>
                                    <div class="staff-card__gradient"></div>
                                    
                                    <div class="staff-card__overlay-content">
                                        <?php if($name): ?>
                                            <div class="staff-card__name">
                                                <h5><?= esc_html($name); ?></h5>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($job_title): ?>
                                            <div class="staff-card__title">
                                                <?= esc_html($job_title); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>

                <?php endforeach; ?>
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="staff-slider__nav">
                <button class="staff-slider__prev <?= esc_attr($slider_id); ?>-prev" aria-label="Previous slide">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button class="staff-slider__next <?= esc_attr($slider_id); ?>-next" aria-label="Next slide">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </div>

        <?php if($view_all_link && !empty($view_all_link['url'])): ?>
        <div class="staff-slider__cta">
            <a href="<?= esc_url($view_all_link['url']); ?>" 
               class="button button--primary"
               target="<?= esc_attr($view_all_link['target'] ?: '_self'); ?>">
                <?= esc_html($view_all_link['title'] ?: 'View All Staff'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
(function() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSlider);
    } else {
        initSlider();
    }

    function initSlider() {
        // Check if Swiper is loaded
        if (typeof Swiper === 'undefined') {
            console.error('Swiper is not loaded');
            return;
        }

        const swiper = new Swiper('.<?= esc_js($slider_id); ?>', {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 24,
            loop: false,
            navigation: {
                nextEl: '.<?= esc_js($slider_id); ?>-next',
                prevEl: '.<?= esc_js($slider_id); ?>-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                    spaceBetween: 24,
                },
                768: {
                    slidesPerView: 4,
                    slidesPerGroup: 4,
                    spaceBetween: 32,
                },
                1024: {
                    slidesPerView: 6,
                    slidesPerGroup: 6,
                    spaceBetween: 32,
                }
            }
        });
    }
})();
</script>