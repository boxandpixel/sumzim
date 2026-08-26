<?php
/**
 * Page Intro block
*/

$page_intro = get_field('page_intro');

$intro = $page_intro['intro'] ?? '';
$background_color = $page_intro['background_color'] ?? '';

$class = 'page-intro';
if ( $background_color && $background_color !== 'none' ) $class .= ' page-intro--' . $background_color;
?>


<section class="<?= esc_attr($class); ?>">
	<div class="container">
		<?php if($page_intro): ?>
			<h5><?= esc_html($intro); ?></h5>
		<?php endif; ?>
	</div>
</section>


