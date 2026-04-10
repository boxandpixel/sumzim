<?php
/**
 * oEmbed Section
*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

$oembed_section = get_field('oembed_section');
$link = $oembed_section['link'] ?? [];

$oembed_group = $oembed_section['oembed_group'];
$oembed = $oembed_group['oembed'] ?? '';
$oembed_caption = $oembed_group['oembed_caption'] ?? '';

$content_group = $oembed_section['content_group'];
$heading = $content_group['heading'] ?? '';
$description = $content_group['description'] ?? '';
?>


<section class="oembed-section">
	<div class="container">

		<?php if($link && !empty($link)): ?>
		<a href="<?= esc_url($link['url']); ?>" class="oembed-section__container">
		<?php else: ?>
		<div class="oembed-section__container">
		<?php endif; ?>

			<?php if($oembed): ?>
			<div class="oembed-section__media">
				<figure>
					<?php echo $oembed; ?>
					<?php if($oembed_caption): ?>
					<figcaption><?php echo esc_html($oembed_caption); ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
			<?php endif; ?>
			<?php if(!empty($heading) || !empty($description)): ?>
			<div class="oembed-section__content">

				<div class="oembed-section__content-header">
					<h3 class="oembed-section__content-heading"><?= esc_html($heading); ?></h3>
					<div class="oembed-section__content-description">
						<?= wp_kses_post($description); ?>
					</div>

					<?php if($link && !empty($link)): ?>
					<div class="oembed-section__button">
						<button href="<?php echo $link['url']; ?>" class="button button--primary"><?php echo $link['title']; ?></button>
					</div>
					<?php endif; ?>
				</div>

			</div>
			<?php endif; ?>
		<?php if($link && !empty($link)): ?>
		</a>
		<?php else: ?>
		</div>
		<?php endif; ?>
	</div>
</section>


