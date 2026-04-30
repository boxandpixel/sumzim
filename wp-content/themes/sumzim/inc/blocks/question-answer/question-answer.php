<?php
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Build schema data
$schema_items = array();

if( have_rows('questions_&_answers') ) {
    while( have_rows('questions_&_answers') ) {
        the_row();
        $schema_items[] = array(
            '@type' => 'Question',
            'name' => get_sub_field('question'),
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => wp_strip_all_tags(get_sub_field('answer'))
            )
        );
    }
}

$schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $schema_items
);
?>

<?php if (!empty($schema_items)): ?>
<script type="application/ld+json">
<?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>
<?php endif; ?>

<div class="block__question-answer contain">
	<?php if(have_rows('questions_&_answers')): while(have_rows('questions_&_answers')): the_row(); ?>
	<strong><?php echo get_sub_field("question"); ?></strong>
	<?php echo get_sub_field("answer"); ?>
	<?php endwhile; endif; ?>
</div>