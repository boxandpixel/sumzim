<?php
/**
 * iFrame
*/

$iframe = get_field('iframe');
$iframe_url = $iframe['iframe_url'];
$iframe_width = $iframe['iframe_width'];
$iframe_height = $iframe['iframe_height'];
?>


<section class="iframe-block contain">
	<div class="iframe-container">
		<?php 
			echo '<iframe class="responsive-iframe" src=';
			echo '"' . esc_attr($iframe_url) . '"';
			echo '" "' . ' width='; 
			echo '"' . esc_attr($iframe_width) . '"';
			echo '" "' . ' height='; 
			echo '"' . esc_attr($iframe_height) . '"';
			echo '" "' . ' frameborder="0" allowfullscreen></iframe>';
		?>
	</div>
</section>


