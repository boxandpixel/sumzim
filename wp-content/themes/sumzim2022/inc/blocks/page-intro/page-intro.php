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
			<p><?= esc_html($intro); ?></p>
		<?php endif; ?>
	</div>
</section>


