<?php
/**
 * Template Name: Standard Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<!-- Hero -->
		<?php 
			$hero_image = get_field('hero_image');
			$hero_image_default = get_field('hero_image_default', 'option');
			$hero_subheading = get_field('hero_subheading');
		?>
		<div class="hero" style="background: url('<?php if($hero_image): echo $hero_image['url']; else: echo $hero_image_default['url']; endif; ?>') center / cover no-repeat">
			<div class="hero__page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->

		<?php 
			$display_button = get_field('display_button');
			$button_type = get_field('button_type');

			if($display_button): 
				if($button_type == 'Book Now'): ?>
			<div class="display-button">
				<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()">Book Now</button>
			</div>            
		<?php
				elseif($button_type == 'Link to Form'): ?>
			<div class="display-button">
				<a href="/about-us/free-estimate" class="button button--primary button--large">Get an Estimate</a>
			</div>
		<?php
				endif;
			endif;
		?>
		
		<!-- Display the_content if it's not empty -->
		<?php
			$the_content = get_the_content();
			if(!empty($the_content)) { ?>
			<div class="the-content">
				<?php the_content(); ?>
			</div>
		
			<?php }
		?>

		<?php
			if(have_rows('page_content_options')): while(have_rows('page_content_options')): the_row();
		?>
		
		
		<?php 
			if(get_row_layout() == 'visual_editor'):
				$visual_editor = get_sub_field('visual_editor');
		?>
			<!-- Visual Editor -->
			<div class="visual-editor">
				<?php echo $visual_editor; ?>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'video_embed'):
				$video_embed = get_sub_field('video_embed');
				$video_embed_header = get_sub_field('video_embed_header');
		?>
			<!-- Video Embed -->
			<div class="video-embed">
				<?php if($video_embed_header): echo $video_embed_header; endif; ?>
				<div class="video-embed__container">
				<?php echo $video_embed; ?>
				</div>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'multi-column_link_list'):
				$multi_column_link_list_header = get_sub_field('multi-column_link_list_header');
		?>
			<!-- Multi-Column List  -->
			<div class="multi-column-link-list">
				<?php if($multi_column_link_list_header): echo $multi_column_link_list_header; endif; ?>
				<ul class="multi-column-link-list__list">
					<?php
						if(have_rows('multi-column_link_list')): while(have_rows('multi-column_link_list')): the_row();
							$multi_column_link_list_item = get_sub_field('multi-column_link_list_item');
					?>
					<li class="multi-column-link-list__list-item">
						<a href="<?php echo $multi_column_link_list_item['url']; ?>" class="multi-column-link-list__list-item-link">
							<?php echo $multi_column_link_list_item['title']; ?>
						</a>
					</li>
					<?php
							endwhile; endif;
					?>
				</ul>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'heading_list'):
				$heading_list_header = get_sub_field('heading_list_header');
		?>
			<!-- Heading List  -->
			<div class="heading-list">
				<?php if($heading_list_header): echo $heading_list_header; endif; ?>
				<ul class="heading-list__list">
					<?php
						if(have_rows('heading_list')): while(have_rows('heading_list')): the_row();
							$heading_list_item = get_sub_field('heading_list_item');
					?>
					<li class="heading-list__list-item">
						<?php echo $heading_list_item; ?>
					</li>
					<?php
							endwhile; endif;
					?>
				</ul>
			</div>
		
		
		<?php
			elseif(get_row_layout() == 'card_group'):
				$card_group_layout = get_sub_field('card_group_layout');
				$card_group_header = get_sub_field('card_group_header');
		?>
			<!-- Card Group -->
			<div class="card-group">
				<?php if($card_group_header): echo $card_group_header; endif; ?>
				<div class="card-group__cards <?php if($card_group_layout == '2'): echo '--two'; elseif($card_group_layout == '3'): echo '--three'; endif; ?>">
					<?php
						if(have_rows('card_group')): while(have_rows('card_group')): the_row();
							$card_title = get_sub_field('card_title');
							$card_image = get_sub_field('card_image');
							$card_video = get_sub_field('card_video');
							$card_detail = get_sub_field('card_detail');
							$card_link = get_sub_field('card_link');
							$card_color = get_sub_field('card_color');
					?>
					<div class="card <?php if($card_color == 'Primary Brand Color'): echo 'card--color-primary'; elseif($card_color == 'Neutral Gray'): echo 'card--color-neutral'; endif; ?><?php if($card_link): ?> card--link<?php endif; ?>">
						
						<?php if($card_link): ?>
						<div class="card__group-content">
						<?php endif; ?> 

						<?php if($card_title): ?>
						<h4><?php echo $card_title; ?></h4>
						<?php endif; ?>

						<?php if($card_image): ?>
						<figure>
							<img 
								src="<?php echo $card_image['url']; ?>"
								srcset="
									<?php echo $card_image['sizes']['medium']; ?> 570w,
									<?php echo $card_image['sizes']['large']; ?> 740w,
								"
								sizes="
									(min-width: 768px) 33vw,
									80vw
								"
								alt="<?php echo $card_image['alt']; ?>"
							>
						</figure>
						<?php endif; ?>
						
						<?php if($card_video): ?>
							<div class="video-embed__container">
								<?php echo $card_video; ?>
							</div>
						<?php endif; ?>

						<?php if($card_detail): ?>
						<?php echo $card_detail; ?>
						<?php endif; ?>

						<?php if($card_link): ?>
						</div> <!-- .card__group-content -->
						<a href="<?php echo $card_link['url']; ?>" class="button button--secondary"><?php echo $card_link['title']; ?></a>
						<?php endif; ?>
					</div>
					<?php
						endwhile; endif;
					?>
				</div>
			</div>

		
		<?php
			elseif(get_row_layout() == 'accessory_features'):
				$accessory_card_group_layout = get_sub_field('card_group_layout');
				$card_group_header = get_sub_field('card_group_header');
		?>
			<!-- Accessory Features -->
			<div class="breakout accessory-features">
				<?php if($card_group_header): echo $card_group_header; endif; ?>
				<div class="card-group">
					<div class="card-group__cards <?php if($accessory_card_group_layout == '2'): echo '--two'; elseif($accessory_card_group_layout == '3'): echo '--three'; endif; ?>">
						<?php
							if(have_rows('card_group')): while(have_rows('card_group')): the_row();
								$card_title = get_sub_field('card_title');
								$card_image = get_sub_field('card_image');
								$card_detail = get_sub_field('card_detail');
								$card_link = get_sub_field('card_link');
						?>
						<div class="card card--color-neutral <?php if($card_link): ?>card--link<?php endif; ?>">
							<?php if($card_link): ?>
							<div class="card__group-content">
							<?php endif; ?>

							<?php if($card_title): ?>
							<h4><?php echo $card_title; ?></h4>
							<?php endif; ?>
				
							<?php if($card_image): ?>
							<figure>
								<img 
									src="<?php echo $card_image['url']; ?>"
									srcset="
										<?php echo $card_image['sizes']['medium']; ?> 570w,
										<?php echo $card_image['sizes']['large']; ?> 740w,
									"
									sizes="
										(min-width: 768px) 33vw,
										80vw
									"
									alt="<?php echo $card_image['alt']; ?>"
								>
							</figure>
							<?php endif; ?>
				
							<?php if($card_detail): ?>
							<?php echo $card_detail; ?>
							<?php endif; ?>

							<?php if($card_link): ?>
							</div>
							<?php endif; ?>
				
							<?php if($card_link): ?>
							<a href="<?php echo $card_link['url']; ?>" class="button button--secondary"><?php echo $card_link['title']; ?></a>
							<?php endif; ?>
						</div>
						<?php
							endwhile; endif;
						?>
					</div>
				</div>
			</div>
		
		
		<?php 
			elseif(get_row_layout() == 'checklist'):
				$checklist_header = get_sub_field('checklist_header');
				$checklist_is_horizontal = get_sub_field('is_horizontal');
		?>
			<!-- Checklist Module -->
			<div class="checklist">
				<?php if($checklist_header): echo $checklist_header; endif; ?>
				<?php if(have_rows('checklist')): ?>
				<ul class="checklist__list<?php if($checklist_is_horizontal): echo ' --checklist__is-horizontal'; endif; ?>">
					<?php while(have_rows('checklist')): the_row(); ?>
					<li class="checklist__list-item">
						<?php echo get_sub_field('checklist_item'); ?>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'file_list'):
				$file_list_header = get_sub_field('file_list_header');   
				$file_list_is_horizontal = get_sub_field('is_horizontal'); 
				
		?>
			<!-- File List Module -->
			<div class="file-list">
				<?php
					if($file_list_header):
						echo $file_list_header;
					endif;
				?>
				<?php if(have_rows('file_list')): ?>
				<ul class="file-list__list<?php if($file_list_is_horizontal): echo ' --file-list__is-horizontal'; endif; ?>">
					<?php while(have_rows('file_list')): the_row(); ?>
					<?php
						$file_list_item = get_sub_field('file_list_item');
						$file_list_item_target = $file_list_item['target'] ? $file_list_item['target'] : '_self';
						$file_list_item_rel = get_sub_field('file_list_item_rel_attribute');
					?>
					
					<li class="file-list__list-item">
						<a href="<?php echo $file_list_item['url']; ?>" rel="<?php echo $file_list_item_rel; ?>" target="<?php echo $file_list_item_target; ?>"><?php echo $file_list_item['title']; ?></a>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>

		
		<?php
			elseif(get_row_layout() == 'image_section'):
				$image = get_sub_field('image');
				$image_section_header = get_sub_field('image_section_header');  
		?>
			<!-- Image Section Module -->
			<div class="image-section">
				<?php if($image_section_header): echo $image_section_header; endif; ?>
				<div class="image-section__figure-content">
					<figure class="image-section__figure">
						<img 
							class="image-section__image"
							src="<?php echo $image['url']; ?>"
							srcset="
								<?php echo $image['sizes']['small']; ?> 220w,
								<?php echo $image['sizes']['medium']; ?> 570w,
							"
							sizes="
								(min-width: 768px) 33vw,
								(min-width: 960px) 25vw,
								80vw
							"
							alt="<?php echo $image['alt']; ?>"
						>
						<figcaption class="image-section__caption"><?php echo $image['title']; ?></figcaption>
					</figure>
					<?php if(have_rows('image_section_content_options')): ?>
					<div class="image-section__content">
						<?php while(have_rows('image_section_content_options')): the_row(); ?>

							<?php if(get_row_layout() == 'visual_editor'):
								$visual_editor = get_sub_field('visual_editor');
							?>
						<div class="visual-editor">
							<?php echo $visual_editor; ?>
						</div>

						<!-- Checklist Module -->
						<?php 
							elseif(get_row_layout() == 'checklist'):
								$checklist_header = get_sub_field('checklist_header');
						?>
							<div class="checklist">
								<?php if($checklist_header): echo $checklist_header; endif; ?>
								<?php if(have_rows('checklist')): ?>
								<ul class="checklist__list">
									<?php while(have_rows('checklist')): the_row(); ?>
									<li class="checklist__list-item">
										<?php echo get_sub_field('checklist_item'); ?>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>

							<?php 
								elseif(get_row_layout() == 'file_list'): 

								$file_list_header = get_sub_field('file_list_header');   
								$file_list_is_horizontal = get_sub_field('is_horizontal');	
							?>
							<!-- File List Module -->
							<div class="file-list">
								<?php
									if($file_list_header):
										echo $file_list_header;
									endif;
								?>
								<?php if(have_rows('file_list')): ?>
								<ul class="file-list__list<?php if($file_list_is_horizontal): echo ' --file-list__is-horizontal'; endif; ?>">
									<?php while(have_rows('file_list')): the_row(); ?>
									<?php
										$file_list_item = get_sub_field('file_list_item');
										$file_list_item_target = $file_list_item['target'] ? $file_list_item['target'] : '_self';
										$file_list_item_rel = get_sub_field('file_list_item_rel_attribute');
									?>
									
									<li class="file-list__list-item">
										<a href="<?php echo $file_list_item['url']; ?>" rel="<?php echo $file_list_item_rel; ?>" target="<?php echo $file_list_item_target; ?>"><?php echo $file_list_item['title']; ?></a>
									</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>							
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		<?php 
			elseif(get_row_layout() == 'content_breakout'):
				$content_breakout_image = get_sub_field('content_breakout_image');
				$has_background_image = get_sub_field('has_background_image');
				$content_breakout = get_sub_field('visual_editor');
				$is_left_aligned = get_sub_field('is_left_aligned');
				$additional_content = get_sub_field('additional_content');
				$content_breakout_cta = get_sub_field('cta_button');

				$cb_checklist = get_sub_field('checklist');
				$checklist_header = $cb_checklist['checklist_header'];
				$checklist_is_horizontal = $cb_checklist['is_horizontal'];
				$checklist_list = $cb_checklist['checklist_list'];

				
		?>
			<!-- Content Breakout -->
			<div class="breakout content-breakout<?php if($is_left_aligned): echo ' content-breakout--leftAligned'; endif; ?>" <?php if($has_background_image): ?> style="background-image: url(<?php echo $content_breakout_image['url']; ?>); background-repeat: no-repeat; background-size: cover;" <?php endif; ?>>
				<div class="content-breakout__content">
					<?php echo $content_breakout; ?>

					<?php if($content_breakout_cta): ?>
						<a href="<?php echo $content_breakout_cta['url']; ?>" class="button button--primary"><?php echo $content_breakout_cta['title']; ?></a>
					<?php endif; ?>

					<?php if($additional_content == "Checklist"): ?>
					<!-- Checklist Module -->
					<?php
						if(have_rows('checklist')):
							while(have_rows('checklist')): the_row();
					?>
					<div class="checklist">
						<?php if($checklist_header): echo $checklist_header; endif; ?>
						<?php
							// var_dump($checklist_list);
						?>
						<?php if(have_rows('checklist_list')): ?>
						<ul class="checklist__list<?php if($checklist_is_horizontal): echo ' --checklist__is-horizontal'; endif; ?>">
							<?php while(have_rows('checklist_list')): the_row(); ?>
							<li class="checklist__list-item">
								<?php echo get_sub_field('checklist_list_item'); ?>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
					<?php
							endwhile;
						endif;
					?>
					<?php endif; ?>
				</div>
			</div>

		<?php 
			elseif(get_row_layout() == 'anchor_links'):
		?>
			<!-- Anchor Links -->
			<div class="anchor-links">
				
				<?php if(have_rows('anchor_link_section')): 
						while(have_rows('anchor_link_section')): the_row(); 
							$anchor_link_heading = get_sub_field('anchor_link_heading');
							$back_to_top_id = get_sub_field('back_to_top_id');
				?>
				<div class="anchor-links__link-id-title" id="<?php echo $back_to_top_id; ?>">
					<div class="visual-editor">
						<?php echo $anchor_link_heading; ?>
					</div>
					<ul class="anchor-links__link-ids-list">
						<?php if(have_rows('anchor_links')): while(have_rows('anchor_links')): the_row(); 
							$anchor_link_id = get_sub_field('anchor_link_id'); 
							$anchor_link_title = get_sub_field('anchor_link_title');
						?>
						<li class="anchor-links__link-ids-list-item">
							<a href="#<?php echo $anchor_link_id; ?>" class="anchor-links__link-ids-list-item-link"><?php echo $anchor_link_title; ?></a>
						</li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
				<?php endwhile; endif; ?>
				
				<?php if(have_rows('anchor_link_section')): 
						while(have_rows('anchor_link_section')): the_row(); 
							$anchor_link_heading = get_sub_field('anchor_link_heading');
							$back_to_top_id = get_sub_field('back_to_top_id');
				?>
				<div class="anchor-links__destination-group">
					<?php echo $anchor_link_heading; ?>
					<?php if(have_rows('anchor_links')): while(have_rows('anchor_links')): the_row(); 
						$anchor_link_id = get_sub_field('anchor_link_id'); 
						$anchor_link_title = get_sub_field('anchor_link_title');
						$anchor_detail = get_sub_field('anchor_detail');
						
					?>
					
					<div class="visual-editor" id="<?php echo $anchor_link_id; ?>">
						<h4><?php echo $anchor_link_title; ?></h4>
						<?php echo $anchor_detail; ?>
						<p><a href="#<?php echo $back_to_top_id; ?>" class="anchor-links__back-to-top">Back to Top</a></p>
					</div>
					
					
				
					<?php endwhile; endif;?>
					
				</div>
				<?php endwhile; endif; ?>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'single_image'):
				$single_image = get_sub_field('single_image');
				$single_image_caption = $single_image['caption'];
				$single_image_header = get_sub_field('single_image_header');
		?> 
			<!-- Single Image -->       
			<div class="single-image">
				<?php if($single_image_header): echo $single_image_header; endif; ?>
				<figure class="single-image__figure">
					<img 
						class="single-image_img"
						src="<?php echo $single_image['url'];?>"
						srcset="
							<?php echo $single_image['sizes']['medium']; ?> 570w,
							<?php echo $single_image['sizes']['large']; ?> 740w,
						"
						sizes="
							(min-width: 768px) 75vw,
							(min-width: 960px) 66vw,
							80vw
						"
						alt="<?php echo $single_image['alt']; ?>"
					>
					<?php if($single_image_caption): ?>
					<figcaption class="single-image__caption"><?php echo $single_image['caption']; ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
		
		
		<?php 
			elseif(get_row_layout() == 'iframe_embed'):
				$iframe_url = get_sub_field('iframe_url');
				$iframe_width = get_sub_field('iframe_width');
				$iframe_height = get_sub_field('iframe_height');
				$iframe_header = get_sub_field('iframe_header');
		?>
			<!-- iFrame Embed -->
			<div class="iframe-embed">
				<?php if($iframe_header): echo $iframe_header; endif; ?>
				<div class="video-embed__container embed-container__map">
				<?php 
					echo '<iframe src=';
					echo '"' . esc_attr($iframe_url) . '"';
					echo '" "' . ' width='; 
					echo '"' . esc_attr($iframe_width) . '"';
					echo '" "' . ' height='; 
					echo '"' . esc_attr($iframe_height) . '"';
					echo '" "' . ' frameborder="0" allowfullscreen></iframe>';
				?>
				</div>
			</div>

		
		<?php
			elseif(get_row_layout() == 'collapsible_areas'):
				$collapsible_areas_header = get_sub_field('collapsible_areas_header');
		?>
			<!-- Collapsible Areas -->
			<div class="collapsible-areas">
				<?php if($collapsible_areas_header): echo $collapsible_areas_header; endif; ?>
		
				<?php if(have_rows('collapsible_areas')): ?>
				<?php
					while(have_rows('collapsible_areas')): the_row();
						$collapsible_title = get_sub_field('collapsible_title');
						$collapsible_details = get_sub_field('collapsible_details');
				?>
					<section class="collapsible-area">
						<header class="collapsible-area__title">
							<?php echo $collapsible_title; ?>
						</header>
						<main class="collapsible-area__details">
							<?php echo $collapsible_details; ?>
						</main>
					</section>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>

		
		<?php
			elseif(get_row_layout() == 'custom_script'):
				$custom_script = get_sub_field('custom_script');
		?>
			<!-- Custom Script -->
			<div class="custom-script">
				<?php echo $custom_script; ?>
			</div>

		
		<?php 
			elseif(get_row_layout() == 'cta_button'):
				$cta_button = get_sub_field('cta_button');
				$cta_new_window = get_sub_field('new_window');
				$cta_button_style = get_sub_field('button_style');
				$cta_button_target = $cta_button['target'] ? $cta_button['target'] : '_self';

				switch($cta_button_style) {
					case "Primary Background":
						$button_class = 'button--primary';
						break;
					case "Secondary Background":
						$button_class = 'button--secondary';
						break;
					case "Text Only - No Background";
						$button_class = 'button--textOnly';
						break;
				}

		?> 
			<!-- CTA Button -->
			<div class="cta-button">
				<a href="<?php echo $cta_button['url'] ?>" target="<?php echo $cta_button_target; ?>" class="button <?php echo $button_class; if($cta_new_window): echo ' --cta__new-window'; endif; ?>"><?php echo $cta_button['title']; ?></a>
			</div>
		
		
		<?php 
			elseif(get_row_layout() == 'icon_grid'):
		?>
			<!-- Icon Grid -->
			<div class="icon-grid">
		<?php
				if(have_rows('icon_grid')): while(have_rows('icon_grid')): the_row();
					
		
					$icon_grid_card_icon = get_sub_field('icon_grid_card_icon');
					$icon_grid_card_heading = get_sub_field('icon_grid_card_heading');
					$icon_grid_card_detail = get_sub_field('icon_grid_card_detail');
		?>
			
				<div class="icon-grid__card">
					<?php if($icon_grid_card_icon ): ?>
					<img src="<?php echo $icon_grid_card_icon['url']; ?>" alt="<?php echo $icon_grid_card_icon['alt']; ?>" class="icon-grid__icon">
					<?php endif; ?>
					<?php if($icon_grid_card_heading): ?>
					<h5 class="icon-grid__heading"><?php echo $icon_grid_card_heading; ?></h5>
					<?php endif; ?>
					<?php if($icon_grid_card_detail): ?>
					<div class="icon-grid__detail">
						<?php echo $icon_grid_card_detail; ?>
					</div>
					<?php endif; ?>
				</div>
			
		<?php
					endwhile; endif; 
		?>
			</div> 

		<?php 
			elseif(get_row_layout() == 'book_now_button'):
		?>
			<!-- Icon Grid -->
			<div class="display-button">
				<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()"><?php echo get_sub_field('book_now_button_text'); ?></button>
			</div>    		


		<?php 
			elseif(get_row_layout() == 'feature_breakout'):
				$feature_breakout_image = get_sub_field('feature_breakout_image');
				$feature_breakout_header = get_sub_field('feature_breakout_header');
				$feature_breakout_checklist = get_sub_field('feature_breakout_checklist');
				$feature_breakout_button = get_sub_field('feature_breakout_button');
		?>
			<!-- Feature Breakout -->
			
			
			<div class="breakout feature-breakout" <?php if($feature_breakout_image): echo 'style="background-image: url(' . $feature_breakout_image['url'] . '); background-position: right top; background-size: auto 100%; background-repeat: no-repeat;"'; endif; ?>>
				
				<div class="content-breakout__content" >
					<?php 
						if($feature_breakout_header):
							echo $feature_breakout_header;
						endif;
					

						$feature_breakout_checklist_header = get_sub_field('feature_breakout_checklist_header');
					?>
						<!-- Checklist Module -->
						<div class="featured-checklist">
							<?php if($feature_breakout_checklist_header): echo $feature_breakout_checklist_header; endif; ?>
							<?php if(have_rows('feature_breakout_checklist')): ?>
							<ul class="featured-checklist__list">
								<?php while(have_rows('feature_breakout_checklist')): the_row(); ?>
								<li class="featured-checklist__list-item">
									<?php echo get_sub_field('feature_breakout_checklist_item'); ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>

						
						<?php if($feature_breakout_button):?>
							<div class="feature_breakout__button">
								<a href="<?php echo $feature_breakout_button['url']; ?>" class="button button--secondary"><?php echo $feature_breakout_button['title']; ?></a>
							</div>
						<?php
						endif;
					?>
				</div>

			</div> 

		<?php
			/** End get_row_layout() */
			endif;
		?>
		
		<?php
			/** End Page Content Options */
			endwhile; endif;
		?>

		<!-- 5-Point Guarantee -->
		<?php 
			$display_5_point_guarantee = get_field('display_5_point_guarantee');
		?>
			<?php if($display_5_point_guarantee != "None"): ?>
			<div class="breakout guarantee">
				<div class="guarantee__content">
					<?php 
						switch($display_5_point_guarantee) {
							case "Heating":
								// echo get_field('guarantee_heating', 'option');
								if(have_rows('heating_guarantee', 'option')): while(have_rows('heating_guarantee', 'option')): the_row();

									if(get_row_layout() == 'heating_guarantee_intro'):
									echo get_sub_field('heating_guarantee_intro', 'option');

									elseif(get_row_layout() == 'book_now_button'):
									?>
									<div class="display-button" style="display: flex; justify-content: center; margin-bottom: 1rem;">
										<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()"><?php echo get_sub_field('book_now_button_text', 'option'); ?></button>
									</div>
									<?php 
									elseif(get_row_layout() == 'heating_guarantee_icon'):
									echo get_sub_field('heading_guarantee_icon', 'option');
									endif; 
								endwhile; endif; 
								break;
							case "Plumbing":
								echo get_field('guarantee_plumbing', 'option');
								break;
							case "Air Conditioning":
								if(have_rows('air_conditioning_guarantee', 'option')): while(have_rows('air_conditioning_guarantee', 'option')): the_row();

									if(get_row_layout() == 'air_conditioning_guarantee_intro'):
									echo get_sub_field('air_conditioning_guarantee_intro', 'option');

									elseif(get_row_layout() == 'book_now_button'):
									?>
									<div class="display-button" style="display: flex; justify-content: center; margin-bottom: 1rem;">
										<button class="se-widget-button button button-cta button--schedule button--large book-now-button" onclick="ScheduleEngine.show()"><?php echo get_sub_field('book_now_button_text', 'option'); ?></button>
									</div>
									<?php 
									elseif(get_row_layout() == 'air_conditioning_guarantee_icon'):
									echo get_sub_field('air_conditioning_guarantee_icon', 'option');
									endif; 
								endwhile; endif; 
								break;
							case "General":
								echo get_field('guarantee_general', 'option');
								break;
							case "HVAC":
								echo get_field('guarantee_hvac', 'option');
								break;								
						}
					?>
					<div class="heading-list">
						<ul class="heading-list__list">
							<?php
								if(have_rows('heading_list', 'option')): while(have_rows('heading_list', 'option')): the_row();
									$heading_list_item = get_sub_field('heading_list_item', 'option');
							?>
							<li class="heading-list__list-item">
								<?php echo $heading_list_item; ?>
							</li>
							<?php
								endwhile; endif;
							?>
						</ul>
					</div>
					
				</div>
			</div>
			<?php endif; ?>
			
		</div>
		<a href="#top" class="back-to-top">Back to Top</a>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
