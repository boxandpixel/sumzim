<?php
/**
 * Membership Table
*/

$membership_table = get_field('membership_table');
$section_header = $membership_table['section_header'];
$column_headers = $membership_table['column_headers'];
$rows = $membership_table['rows'];
$footer = $membership_table['footer'];
?>

<section class="membership-table contain">
	<?php if($section_header): ?>
	<div class="membership-section-header">
		<?php echo $section_header; ?>
	</div>
	<?php endif; ?>
	<table>
		<?php if($column_headers): ?>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<?php
					foreach($column_headers as $column_header):
						$image = $column_header['image'];
				?>
				<th>
					<img src="<?php echo $image['url']; ?>" alt="">
				</th>
				<?php
					endforeach;
				?>				
			</tr>
		</thead>
		<?php endif; ?>

		<?php if($rows): ?>
		<tbody>
			<?php 
				foreach($rows as $row):
					$service = $row['service'];
					$membership_value = $row['membership_value'];
					$watchdog_value = $row['watchdog_value'];

					/** Membership values */
					$membership_value_type = $membership_value['value_type'];
					$membership_text = $membership_value['text'];
					$membership_icon = $membership_value['icon'];
					
					/** Watchdog values */
					$watchdog_value_type = $watchdog_value['value_type'];
					$watchdog_text = $watchdog_value['text'];
					$watchdog_icon = $watchdog_value['icon'];					
			?>
			<tr>
				<td data-label="Service">
					<?php echo $service; ?>
				</td>

				<td data-label="Blue Membership">
					<?php if($membership_value_type == "Text"): ?>
						<?php echo $membership_text; ?>
					<?php elseif($membership_value_type == "Icon"): ?>
						<span class="material-symbols-outlined"><?php echo $membership_icon; ?></span>
					<?php endif; ?>
				</td>	
				
				<td data-label="Blue Membership + Watchdog">
					<?php if($watchdog_value_type == "Text"): ?>
						<?php echo $watchdog_text; ?>
					<?php elseif($watchdog_value_type == "Icon"): ?>
						<span class="material-symbols-outlined"><?php echo $watchdog_icon; ?></span>						
					<?php endif; ?>
				</td>					

			</tr>			
			<?php
				endforeach; 
			?>
		</tbody>
		<?php endif; ?>
	</table>
</section>


