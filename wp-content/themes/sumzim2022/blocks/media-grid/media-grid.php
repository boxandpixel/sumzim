<?php
	$heading = get_field("heading");
	$description = get_field("description");

	$media_items = get_field("media_items");
?>

<div class="block__media-grid">
	<div class="interior-container">
		<h1><?php echo $heading ? $heading : ''; ?></h1>
		<?php echo $description ? $description : ''; ?>

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
					<?php if($media_type = "Video"): ?>
					<div class="video">
						<lite-youtube videoid="<?php echo $video_id; ?>" playlabel="Play <?php echo $video_title; ?>"></lite-youtube>
					</div>
					<?php elseif($media_Type = "Image"): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php endif; ?>
				</div>
				<div class="media-grid-description">
					<?php echo $video_title ? '<h3>' . $video_title . '</h3>' : ''; ?>
					<?php echo $video_subtitle ? '<p>' . $video_subtitle . '</p>' : ''; ?>
				</div>
			</section>
			<?php endforeach; ?>
		</div>
	</div>

</div>