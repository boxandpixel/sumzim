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


// Load values and assign defaults.



// Build a valid style attribute for background and text colors.
// $styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
// $style  = implode( '; ', $styles );

?>

<div class="block__question-answer">
	<?php if(have_rows('questions_&_answers')): while(have_rows('questions_&_answers')): the_row(); ?>
	<strong><?php echo get_sub_field("question"); ?></strong>
	<?php echo get_sub_field("answer"); ?>
	<?php endwhile; endif; ?>
</div>