<?php
/**
 * FAQs block
*/

$faqs = get_field('faqs');
$faqs_header = $faqs['faqs_header'];
$faq_items = $faqs['faq_items'];
?>


<?php if($faqs): ?>
<div class="block__faqs">
	<?php if($faqs_header): ?>
		<?php echo $faqs_header; ?>
	<?php endif; ?>

	<?php if($faq_items): ?>
		<dl>
			<?php foreach($faq_items as $faq_item): ?>
				<dt><h5><?php echo $faq_item['faq_title']; ?></h5></dt>
				<dd><?php echo $faq_item['faq_description']; ?></dd>
			<?php endforeach; ?>
		</dl>
	<?php endif; ?>
</div>
<?php endif; ?>