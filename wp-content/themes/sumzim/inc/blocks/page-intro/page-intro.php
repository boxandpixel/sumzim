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
			<h5><?= esc_html($intro); ?></h5>
		<?php endif; ?>
	</div>
</section>


