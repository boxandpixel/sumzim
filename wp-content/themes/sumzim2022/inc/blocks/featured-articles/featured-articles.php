<?php
/**
 * Featured Articles Block
 * 
 * Displays a grid of featured articles with images and titles
 */

// Get block fields group
$featured_articles = get_field('featured_articles');

// Bail if no featured articles group
if (empty($featured_articles)) {
    return;
}

// Get fields from group with defensive checks
$heading = $featured_articles['heading'] ?? '';
$articles = $featured_articles['articles'] ?? array();

// Bail if no articles
if (empty($articles)) {
    return;
}

?>

<section class="breakout featured-articles">
    <?php if (!empty($heading)): ?>
        <h2><?php echo wp_kses_post($heading); ?></h2>
    <?php endif; ?>
    
    <div class="featured-articles__grid contain">
        <?php foreach ($articles as $article_row): ?>
            <?php
                // Get the article post object from the repeater row
                $featured_article = $article_row['article'] ?? null;
                
                // Defensive checks
                if (empty($featured_article)) {
                    continue;
                }
                
                // Get the article data
                $article_id = is_object($featured_article) ? $featured_article->ID : $featured_article;
                $article_title = get_the_title($article_id) ?? '';
                $article_image = get_the_post_thumbnail_url($article_id, 'full') ?? '';
                $article_permalink = get_permalink($article_id) ?? '';
                
                // Skip if essential data is missing
                if (empty($article_title) || empty($article_permalink)) {
                    continue;
                }
            ?>
            
            <a href="<?php echo esc_url($article_permalink); ?>" 
               class="featured-articles__article" 
               <?php if ($article_image): ?>
               style="--bg-image: url('<?php echo esc_url($article_image); ?>');"
               <?php endif; ?>>
                <h5 class="featured-articles__title">
                    <?php echo esc_html($article_title); ?>
                </h5>
            </a>
            
        <?php endforeach; ?>
    </div>
</section>