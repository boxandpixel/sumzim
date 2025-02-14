<?php
/**
 * CTA Button block
*/

$cards = get_field('cards');

$cards_set = $cards['cards_set'];

?>


<section class="cards-block contain">
	<?php foreach($cards_set as $card): ?>
	<?php
		$card_heading = $card['card_heading'];
		$card_description = $card['card_description'];
		$card_image = $card['card_image'];
		$card_button = $card['card_button'];	
	?>
		<?php if($card_button): ?>
		<a href="<?php echo $card_button['url']; ?>" class="card">
		<?php else: ?>
		<div class="card">
		<?php endif; ?>
			
			<?php if($card_image): ?>
			<div class="card-image" style="background-image: url(<?php echo $card_image['url']; ?>);"></div>
			<?php endif; ?>

			<div class="card-content">
				<?php if($card_heading): ?>
				<div class="card-heading">
					<h5><?php echo $card_heading; ?></h5>
				</div>
				<?php endif; ?>

				<?php if($card_description): ?>
				<div class="card-description">
					<?php echo $card_description; ?>
				</div>
				<?php endif; ?>

				<?php if($card_button): ?>
				<div class="card-button">
					<button class="button-cta button--primary"><?php echo $card_button['title']; ?></button>
				</div>
				<?php endif; ?>		
			</div>

	

		<?php if($card_button): ?>
		</a>
		<?php else: ?>
		</div>
		<?php endif; ?>

	<?php endforeach; ?>


</section>


