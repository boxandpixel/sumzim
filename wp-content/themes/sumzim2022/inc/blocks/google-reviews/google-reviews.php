<?php
/**
 * Google Reviews Block
 * 
 * Displays selected Google reviews in a carousel
 */

// Get block fields
$google_reviews = get_field('google_reviews');

// Bail if no google reviews group
if (empty($google_reviews)) {
    return;
}

// Get fields from group with defensive checks
$heading = $google_reviews['heading'] ?? '';
$description = $google_reviews['description'] ?? '';
$filter_keyword = $google_reviews['filter_keyword'] ?? '';
$selected_reviews = $google_reviews['selected_reviews'] ?? array();
$show_google_logo = $google_reviews['show_google_logo'] ?? true;

// Get all available reviews
$all_reviews = get_curated_google_reviews();

if (empty($all_reviews)) {
    if (current_user_can('manage_options')) {
        echo '<div style="padding: 20px; background: #f0f0f0; text-align: center;">No reviews available. <a href="' . admin_url('admin.php?page=google-reviews-manager') . '">Fetch reviews first</a></div>';
    }
    return;
}

// Filter reviews by keyword if specified
if (!empty($filter_keyword)) {
    $all_reviews = array_filter($all_reviews, function($review) use ($filter_keyword) {
        $keywords = $review['keywords'] ?? array();
        $keywords_lower = array_map('strtolower', $keywords);
        return in_array(strtolower($filter_keyword), $keywords_lower);
    });
    
    // Re-index array
    $all_reviews = array_values($all_reviews);
}

// If manual selection is used
if (!empty($selected_reviews)) {
    $reviews = array();
    foreach ($selected_reviews as $selected) {
        $review_id = $selected['review_id'] ?? null;
        if ($review_id !== null && isset($all_reviews[$review_id])) {
            $reviews[] = $all_reviews[$review_id];
        }
    }
} else {
    // Auto-select top 3 reviews (5-star first, then by date)
    usort($all_reviews, function($a, $b) {
        if ($b['rating'] !== $a['rating']) {
            return $b['rating'] - $a['rating'];
        }
        return strtotime($b['date']) - strtotime($a['date']);
    });
    
    $reviews = array_slice($all_reviews, 0, 3);
}

// Bail if we don't have reviews
if (empty($reviews)) {
    if (current_user_can('edit_posts')) {
        echo '<div style="padding: 20px; background: #f0f0f0; text-align: center;">No reviews found matching the selected criteria.</div>';
    }
    return;
}

// Generate unique ID for this carousel
$carousel_id = 'google-reviews-' . uniqid();

?>

<section class="breakout google-reviews">

    <div class="container">
        <?php if(!empty($heading) || !empty($description)): ?>
        <div class="google-reviews__header">
            <h2 class="google-reviews__header-heading"><?= esc_html($heading); ?></h2>
            <?php if($description): ?>
            <div class="google-reviews__header-description">
                <?= wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <div class="contain">
            <div class="google-reviews__carousel" id="<?php echo esc_attr($carousel_id); ?>" data-total="<?php echo count($reviews); ?>">
                
                <div class="google-reviews__carousel-wrapper">
                    <?php foreach ($reviews as $index => $review): ?>
                        <?php
                            $rating = $review['rating'] ?? 5;
                            $text = $review['text'] ?? '';
                            $author_name = $review['author_name'] ?? '';
                            $date = $review['date'] ?? '';
                            $is_active = $index === 0 ? 'active' : '';
                        ?>
                        
                        <div class="google-reviews__card <?php echo $is_active; ?>" data-index="<?php echo $index; ?>">
                            <div class="google-reviews__stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="star <?php echo $i <= $rating ? 'filled' : 'empty'; ?>">★</span>
                                <?php endfor; ?>
                            </div>
                            
                            <div class="google-reviews__text">
                                <?php echo wp_kses_post(wpautop($text)); ?>
                            </div>
                            
                            <div class="google-reviews__footer">
                                <div class="google-reviews__author-info">
                                    <div class="google-reviews__author">
                                        <?php echo esc_html($author_name); ?>
                                    </div>
                                    <div class="google-reviews__date">
                                        <?php echo esc_html($date); ?>
                                    </div>
                                </div>
                                
                                <?php if ($show_google_logo): ?>
                                    <div class="google-reviews__logo">
                                        <svg width="32" height="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    <?php endforeach; ?>
                </div>
                
                <div class="google-reviews__navigation">
                    <button class="google-reviews__nav-btn google-reviews__nav-btn--prev" aria-label="Previous review">previous</button>
                    
                    <div class="google-reviews__pagination">
                        <span class="google-reviews__current">1</span>
                        <span class="google-reviews__separator">/</span>
                        <span class="google-reviews__total"><?php echo count($reviews); ?></span>
                    </div>
                    
                    <button class="google-reviews__nav-btn google-reviews__nav-btn--next" aria-label="Next review">next</button>
                </div>
                
            </div>
        </div>
    </div>
</section>