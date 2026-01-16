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

<div class="block__list-wysiwyg contain">
	<?php $list_type = get_field('list_type'); ?>
	<?php if($list_type == "ul"): ?>
		<ul>
	<?php elseif($list_type == "ol"): ?>
		<ol>
	<?php endif; ?>
	<?php if(have_rows('list_contents')): while(have_rows('list_contents')): the_row(); ?>
	<li>
		<?php echo get_sub_field("list_content"); ?>
	</li>
	<?php endwhile; endif; ?>
	<?php if($list_type == "ul"): ?>
		</ul>
	<?php elseif($list_type == "ol"): ?>
		</ol>
	<?php endif; ?>
</div>