<?php
/**
 * List Icons
*/

$icon_list_items = get_field('icon_list_items');

$list_items = $icon_list_items['list_items'];


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


