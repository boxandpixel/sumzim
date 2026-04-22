<?php
/**
 * Page Intro block
*/

$page_intro = get_field('page_intro');

$intro = $page_intro['intro'] ?? '';
?>


<section class="page-intro">
	<div class="container">
		<?php if($page_intro): ?>
			<h6><?= esc_html($intro); ?></h6>
		<?php endif; ?>
	</div>
</section>


