<?php
/**
 * Icon Callout
*/

$icon_callout = get_field('icon_callout');
$icon = $icon_callout['icon'];
$content = $icon_callout['content'];
?>


<section class="icon-callout contain">
	<div class="icon">
		<span class="material-symbols-outlined"><?php echo $icon; ?></span>
	</div>
	<div class="content">
		<?php echo $content; ?>	
	</div>
</section>

