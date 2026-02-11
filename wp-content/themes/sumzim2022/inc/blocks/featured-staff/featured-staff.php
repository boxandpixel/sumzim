<?php
/**
 * Featured Staff Block
 * 
 * Displays a grid of staff cards with images, names, and titles
 */

// Get the featured staff field group
$featured_staff = get_field('featured_staff');

// Bail early if no data
if (empty($featured_staff)) {
    return;
}

// Get settings with defaults
$heading = $featured_staff['heading'] ?? '';
$description = $featured_staff['description'] ?? '';
$staff_members = $featured_staff['staff_members'] ?? [];
$view_all_link = $featured_staff['link'] ?? null;

// Bail if no staff members
if (empty($staff_members)) {
    return;
}

?>

<section class="featured-staff">
    <div class="container">
        <?php if($heading || $description): ?>
        <div class="featured-staff__header">
            <h2 class="featured-staff__header-heading"><?= esc_html($heading); ?></h2>
            <?php if($description): ?>
            <div class="featured-staff__header-description">
                <?= wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="featured-staff__grid">
        <?php foreach($staff_members as $staff_row): ?>
            <?php
                // Get the staff post object
                $staff_post = $staff_row['name'] ?? null;
                
                // Skip if no post object
                if (!$staff_post) {
                    continue;
                }
                
                // Get staff data from the post
                $name = get_the_title($staff_post->ID);
                $job_title = get_field('job_title', $staff_post->ID);
                $thumbnail_image = get_field('thumbnail_image', $staff_post->ID);
                $staff_url = get_permalink($staff_post->ID);
            ?>
            
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

        <?php endforeach; ?>
        </div>

        <?php if($view_all_link && !empty($view_all_link['url'])): ?>
        <div class="featured-staff__cta">
            <a href="<?= esc_url($view_all_link['url']); ?>" 
               class="button button--primary"
               target="<?= esc_attr($view_all_link['target'] ?: '_self'); ?>">
                <?= esc_html($view_all_link['title'] ?: 'View All Staff'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>