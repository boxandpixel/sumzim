<?php
/**
 * List Icons
*/

$list_items_icons = get_field('list_items_icons');

$list_items = $list_items_icons['list_items'];


?>


<section class="list-items-icons-block contain">
	<ul class="list-items">
	<?php foreach($list_items as $list_item): ?>
	<?php
		$list_item = $list_item['list_item'];	
	?>
		<li class="list-item"><?php echo $list_item; ?></li>
	<?php endforeach; ?>
	</ul>

</section>


