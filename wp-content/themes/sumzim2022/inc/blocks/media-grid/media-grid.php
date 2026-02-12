<?php
	$heading = get_field("heading");
	$description = get_field("description");
	$heading_position = !empty(get_field("heading_position")) ? strtolower(get_field("heading_position")) : 'left';
	$link = get_field("link");
	$media_items = get_field("media_items");
?>

<div class="block__media-grid contain">
	<div class="interior-container">
		<?php if($heading || $description): ?>
		<div class="media-grid__header media-grid__header--<?php echo esc_attr($heading_position); ?>">
			<?php if($heading): ?>
			<h2><?php echo esc_html($heading); ?></h2>
			<?php endif; ?>
			<?php if($description): ?>
			<div class="media-grid__description">
				<?php echo wp_kses_post($description); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="media-grid">
			<?php 
				foreach($media_items as $media_item): 

					$media_type = $media_item['media_type'];
					$video_id = $media_item['video_id'];
					$video_play_label = $media_item['video_play_label'];
					$video_title = $media_item['video_title'];
					$video_subtitle = $media_item['video_subtitle'];
					$image = $media_item['image'];
			?>
			<section class="media-grid-card">
				<div class="media-grid-item">
					<?php if($media_type == "Video"): ?>
					<div class="video">
						<lite-youtube videoid="<?php echo esc_attr($video_id); ?>" playlabel="Play <?php echo esc_attr($video_title); ?>"></lite-youtube>
					</div>
					<?php elseif($media_type == "Image"): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
					<?php endif; ?>
				</div>
				<div class="media-grid-description">
					<?php echo $video_title ? '<h4 class="media-grid-description__title">' . esc_html($video_title) . '</h4>' : ''; ?>
					<?php //echo $video_subtitle ? '<p>' . esc_html($video_subtitle) . '</p>' : ''; ?>
				</div>
			</section>
			<?php endforeach; ?>
		</div>

		<?php if($link && !empty($link['url'])): ?>
		<div class="media-grid__footer">
			<a href="<?php echo esc_url($link['url']); ?>" class="button button-cta button--primary" <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
				<?php echo esc_html($link['title']); ?>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>