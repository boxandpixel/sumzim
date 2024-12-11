<?php
/**
 * Template Name: Membership
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
		<div class="hero-landing">
			<div class="hero__page-title">
				<h1><?php the_title(); ?></h1>
				<h4><?php echo $hero_subheading; ?></h4>
			</div>  
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->
		 
		<div class="display-button">
			<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button">Call Now 610-593-5129</a>
		</div>		

		<?php 
			$display_button = get_field('display_button');
			$button_type = get_field('button_type');

			if($display_button): 
				if($button_type == 'Book Now'): ?>
			<div class="display-button">
				<button class="se-widget-button button button-cta button--schedule button--large" onclick="ScheduleEngine.show()">Book Now</button>
			</div>            
		<?php
				elseif($button_type == 'Link to Form'): ?>
			<div class="display-button">
				<a href="/schedule-estimate" class="button button--primary button--large">Schedule a Consulation</a>
			</div>
		<?php
				endif;
			endif;
		?>

		<!-- Display the_content if it's not empty -->
		<?php
			$the_content = get_the_content();
			if(!empty($the_content)) {
				the_content();
			}
		?>


		<?php
			if(have_rows('page_content_options')):
				while(have_rows('page_content_options')): the_row();
		?>
				<!-- Visual Editor -->
				<?php 
					if(get_row_layout() == 'visual_editor'):
						$visual_editor = get_sub_field('visual_editor');
				?>
					<div class="visual-editor">
						<?php echo $visual_editor; ?>
					</div>

				<!-- Video Embed -->
				<?php 
					elseif(get_row_layout() == 'video_embed'):
						$video_embed = get_sub_field('video_embed');
				?>
					<div class="video-embed">
						<div class="video-embed__container">
						<?php echo $video_embed; ?>
						</div>
					</div>

				<!-- Multi-Column List  -->
				<?php 
					elseif(get_row_layout() == 'multi-column_link_list'):
						$multi_column_link_list_header = get_sub_field('multi-column_link_list_header');
				?>
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
					
				<!-- Heading List  -->
				<?php 
					elseif(get_row_layout() == 'heading_list'):
						$heading_list_header = get_sub_field('heading_list_header');
				?>
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
					
				<!-- Card Group -->
				<?php
					elseif(get_row_layout() == 'card_group'):
						$card_group_layout = get_sub_field('card_group_layout');
						$card_group_header = get_sub_field('card_group_header');
				?>
					
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
							<div class="card <?php if($card_color == 'Primary Brand Color'): echo 'card--color-primary'; elseif($card_color == 'Neutral Gray'): echo 'card--color-neutral'; endif; ?>">
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
								<a href="<?php echo $card_link['url']; ?>" class="button button--secondary"><?php echo $card_link['title']; ?></a>
								<?php endif; ?>
							</div>
							<?php
								endwhile; endif;
							?>
						</div>
					</div> 
					
				<!-- Accessory Features -->
				<?php
					elseif(get_row_layout() == 'accessory_features'):
						$accessory_card_group_layout = get_sub_field('card_group_layout');
						$card_group_header = get_sub_field('card_group_header');
				?>
					<div class="breakout accessory-features">
						<?php if($card_group_header): echo $card_group_header; endif; ?>
						<div class="card-group <?php if($accessory_card_group_layout == '2'): echo '--two'; elseif($accessory_card_group_layout == '3'): echo '--three'; endif; ?>">
							<?php
								if(have_rows('card_group')): while(have_rows('card_group')): the_row();
									$card_title = get_sub_field('card_title');
									$card_image = get_sub_field('card_image');
									$card_detail = get_sub_field('card_detail');
									$card_link = get_sub_field('card_link');
							?>
							<div class="card card--color-neutral">
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
								<a href="<?php echo $card_link['url']; ?>" class="button button--secondary"><?php echo $card_link['title']; ?></a>
								<?php endif; ?>
							</div>
							<?php
								endwhile; endif;
							?>
						</div>
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
					
				<!-- File List Module -->
				<?php 
					elseif(get_row_layout() == 'file_list'):
						$file_list_header = get_sub_field('file_list_header');       
				?>
					<div class="file-list">
						<?php if($file_list_header): echo $file_list_header; endif; ?>
						<?php if(have_rows('file_list')): ?>
						<ul class="file-list__list">
							<?php while(have_rows('file_list')): the_row(); 
								$file_list_item = get_sub_field('file_list_item');
							?>
							<li class="file-list__list-item">
								<?php echo $file_list_item; ?>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
					
				<!-- Image Section Module -->
				<?php
					elseif(get_row_layout() == 'image_section'):
						$image = get_sub_field('image');
						$image_section_header = get_sub_field('image_section_header');  
				?>
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
									?>
								
								<div class="file-list">
									<?php
										if($file_list_header):
											echo $file_list_header;
										endif;
									?>
									<?php if(have_rows('file_list')): ?>
									<ul class="file-list__list">
										<?php while(have_rows('file_list')): the_row(); 
											$file_list_item = get_sub_field('file_list_item');
										?>
										<li class="file-list__list-item">
											<?php echo $file_list_item; ?>
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
				
				<!-- Content Breakout Module -->
				<?php 
					elseif(get_row_layout() == 'content_breakout'):
						$content_breakout = get_sub_field('visual_editor');
						$content_breakout_image = get_sub_field('content_breakout_image');
						$has_background_image = get_sub_field('has_background_image');
						$content_breakout_cta_button = get_sub_field('cta_button');
						$content_breakout_new_window = get_sub_field('new_window');
						$content_breakout_button_style = get_sub_field('button_style');
						// $content_breakout_button_target = $content_breakout_cta_button['target'] ? $content_breakout_cta_button['target'] : '_self';
			

						switch($content_breakout_button_style) {
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
					<div class="breakout content-breakout <?php echo ($has_background_image == 1) ? 'breakout--background-image' : ''; ?>" <?php echo ($has_background_image == 1) ? 'style="background: url(' . $content_breakout_image['url'] . ') center / cover no-repeat"' : '' ?>>
						<div class="content-breakout__content <?php echo ($has_background_image == 1) ? 'content-breakout__content--background-image' : ''; ?>">
							<?php echo $content_breakout; ?>
							<?php echo ($has_background_image == 0) ? '<img src=" ' . $content_breakout_image['sizes']['medium'] . '" alt="">' : '' ?>
							
							<?php 
								if($content_breakout_cta_button):
							?>
							<div class="cta-button">
								<a href="<?php echo $content_breakout_cta_button['url'] ?>" <?php if($content_breakout_cta_button['target']): echo 'target="'. $content_breakout_cta_button['target'] . '"'; endif; ?> class="button <?php echo $button_class; if($content_breakout_new_window): echo ' --cta__new-window'; endif; ?>"><?php echo $content_breakout_cta_button['title']; ?></a>
							</div>
							<?php 
								endif;
							?>


						</div>
					</div>            

				<!-- Anchor Links -->
				<?php 
					elseif(get_row_layout() == 'anchor_links'):
				?>
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

				<!-- Single Image -->
				<?php 
					elseif(get_row_layout() == 'single_image'):
						$single_image = get_sub_field('single_image');
						$single_image_caption = $single_image['caption'];
						$single_image_header = get_sub_field('single_image_header');
				?>        
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
					
				<!-- iFrame Embed -->
				<?php 
					elseif(get_row_layout() == 'iframe_embed'):
						$iframe_url = get_sub_field('iframe_url');
						$iframe_width = get_sub_field('iframe_width');
						$iframe_height = get_sub_field('iframe_height');
						$iframe_header = get_sub_field('iframe_header');
				?>
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
					
				<!-- Collapsible Areas -->
				<?php
					elseif(get_row_layout() == 'collapsible_areas'):
						$intro = get_sub_field('intro');
				?>
					<div class="collapsible-areas">
						<?php if($intro): echo $intro; endif; ?>

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
					elseif(get_row_layout() == 'membership_table'):
						$membership_table_header = get_sub_field('membership_table_header');

						// Schedule update variables
						$schedule_update = get_sub_field('schedule_update');
						$today = date('Ymd');

				?>

					<div class="membership">
						<?php if($membership_table_header): echo $membership_table_header; endif; ?>
						<table class="membership__table">

						<?php 
							// Get each header row to determine if a logo (plan) exists for each service
							$plan_rows = get_sub_field('membership_table_headers'); 
							$blue_membership_row = $plan_rows[0];
							$watchdog_row = $plan_rows[1];
						?>
						
						<?php if(have_rows('membership_table_headers')): ?>

							<thead class="membership__table-header">
								<tr class="membership__table-header-row">
									<th class="membership__table-header-data membership__table-header-data--empty">&nbsp;</th>

						<?php while(have_rows('membership_table_headers')): the_row(); 
							$membership_table_header_logo = get_sub_field('membership_table_header'); 
						?>
									<th class="membership__table-header-data" scope="col">
								<img 
									src="<?php echo $membership_table_header_logo['url']; ?>"
									alt="<?php echo $membership_table_header_logo['alt']; ?>"
									width="150"
									class="membership__table-header-data-badge"
								>
									</th>
						<?php endwhile;?>
								</tr>
							</thead>
						<?php endif; ?>
					
						<?php if(have_rows('membership_table_rows')): ?>
							<tbody class="membership__table-body">
						<?php while(have_rows('membership_table_rows')): the_row(); 
							$service = get_sub_field('service');
							$column_type = get_sub_field('column_type');
							$column_a_text = get_sub_field('column_a_text');
							$column_a_icon = get_sub_field('column_a_icon');
							$column_b_text = get_sub_field('column_b_text');
							$column_b_icon = get_sub_field('column_b_icon');
							$is_row_heading = get_sub_field('is_row_heading');
							$row_heading = get_sub_field('row_heading');

							// Schedule update variables
							$column_a_text_update = get_sub_field('column_a_text_update');
							$column_b_text_update = get_sub_field('column_b_text_update');
						?>
						
						<?php
							if($is_row_heading == 1): ?>
							<tr class="membership__table-body-row membership__table-body-row--heading">
								<th class="membership__table-body-row-header membership__table-body-row-header--full-width" scope="row" colspan="3">
									<?php echo $row_heading; ?>
								</th>
							</tr>

							<?php else: ?>
								<tr class="membership__table-body-row">
									<th class="membership__table-body-row-header" scope="row">
										<?php echo $service; ?>
									</th>

									<td class="membership__table-body-row-data membership__table-body-row-data--column-a">
										<?php 
											if($column_type == "Text"):

												// Schedule update if applicable
												if($today >= $schedule_update && $column_a_text_update !== ""):
													echo $column_a_text_update;
												else: 
													echo $column_a_text;
												endif;
											elseif($column_type == "Icon"):
												if($column_a_icon == "Yes"): ?>
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
											<title>Yes</title>
											<path d="M0 0h24v24H0z" fill="none"/><path class="icon--yes" d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
										</svg>
										<?php elseif($column_a_icon == "No"): ?>
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
											<title>No</title>
											<path d="M0 0h24v24H0z" fill="none"/>
											<path class="icon--no" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
										</svg>
										<?php
												endif;
											endif;
										?>
									</td>
									<?php 
										// If the watchdog logo isn't in the row, that means that the plan doesn't exist for a service
										if($watchdog_row != ''): 
									?>
									<td class="membership__table-body-row-data membership__table-body-row-data--column-b">
										<?php 
											if($column_type == "Text"):
												// Schedule update if applicable
												if($today >= $schedule_update && $column_b_text_update != ""):
													echo $column_b_text_update;
												else: 
													echo $column_b_text;
												endif;
											elseif($column_type == "Icon"):
												if($column_b_icon == "Yes"): ?>
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
											<title>Yes</title>
											<path d="M0 0h24v24H0z" fill="none"/><path class="icon--yes" d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
										</svg>
										<?php elseif($column_b_icon == "No"): ?>
										<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
											<title>No</title>
											<path d="M0 0h24v24H0z" fill="none"/>
											<path class="icon--no" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
										</svg>
										<?php
												endif;
											endif;
										?>
									</td>
									<?php endif; ?>
								</tr>
							<?php endif; ?>
						<?php endwhile; ?>
							</tbody>
						<?php endif; ?>
						
						<?php
							$membership_table_footer = get_sub_field('membership_table_footer');
						?>
						<?php if($membership_table_footer): ?>
							<tfoot class="membership__table-footer">
								<tr class="membership__table-footer-row">
									<td colspan="3" class="membership__table-footer-row-data">
										<?php echo $membership_table_footer; ?>
									</td>
								</tr>
							</tfoot>
						<?php endif; ?>
						</table>
					</div>
					
				<!-- Custom Script -->
				<?php
					elseif(get_row_layout() == 'custom_script'):
						$custom_script = get_sub_field('custom_script');
				?>
					<div class="custom-script">
						<?php echo $custom_script; ?>
					</div>
			
				<?php 
					elseif(get_row_layout() == 'cta_button'):
						$cta_button = get_sub_field('cta_button');
						$cta_new_window = get_sub_field('new_window');
						$cta_button_style = get_sub_field('button_style');
						// $cta_button_target = $cta_button['target'] ? $cta_button['target'] : '_self';
				
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
					<!-- Removed target due to unknown issue 2022/09/21 -->
					<div class="cta-button">
						<a href="<?php echo $cta_button['url'] ?>" class="button <?php echo $button_class; ?>"><?php echo $cta_button['title']; ?></a>
					</div>  
					
				<!-- Icon Grid -->
				<?php 
					elseif(get_row_layout() == 'icon_grid'):
				?>
					
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
					
				<!-- End get_row_layout() -->

				<?php 
					endif;
				?>
		<?php
				/** End Page Content Options */
				endwhile;
			endif;
		?>
		<!-- 20230329 -->
		<div class="mem__section">
			<h2 class="mem__section-heading">Protect Your Investment with SZ Maintenance Plans</h2>
		</div>
		<div class="mem__section">
			<a href="/design-your-customer-membership/" class="button button--primary button--big">Customize Your Membership Today</a>
		</div>

		<div class="mem__video video-embed">
			<div class="video-embed__container">
				<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/uL2pVtG4-8c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
		</div>

		<div class="mem__benefits">
			<h2>Membership Benefits</h2>
			<div class="mem__benefits-grid">			
				<div class="mem__benefits-each mem__benefits-one">
					<h3>1. Maintenance Visits</h3>
					<p>A Good Natured technician visits once per year to thoroughly clean and performance test your system. They will make fine tuning adjustments and inform you if components are not performing as they should.</p>
				</div>
				<div class="mem__benefits-each mem__benefits-two">
					<h3>2. 25% Discount on Repairs</h3>
					<p>Repairs can be costly and unexpected! For members, any materials used and technician labor needed to solve the problem will be discounted at 25%.</p>
				</div>
				<div class="mem__benefits-each mem__benefits-three">
					<h3>3. Access to On-Call Staff</h3>
					<p>Emergencies never happen at convenient times. For this reason, our technical support staff is available 24/7, at no extra cost, to help solve the issue.</p>
				</div>
				<div class="mem__benefits-four">
					<div id="google-reviews-site">
						<div id="google-reviews">
							<div class="review-item">
								<div class="review-meta">
									<span class="review-author">Dick Barrett</span><span class="review-sep">, </span><span class="review-date">Apr 11, 2023</span>
								</div>
								<div class="review-stars"><ul><li><i class="star"></i></li><li><i class="star"></i></li><li><i class="star"></i></li><li><i class="star"></i></li><li><i class="star"></i></li></ul></div>
								<p class="review-text">Always a good experience with S&amp;Z. Great communications, service, and results. For over 25 years  we have had installs (heat and ac); maintenance (scheduled and unscheduled); and, work done that our aging home required in order to ensure a quality outcome.

		Never once have  we been uncomfortable or dissatisfied with this firm’s team of skilled people  who go out of their way to satisfy the customer. It sounds corny but they do make us feel like family. I say that knowing there’s nothing  special about us!</p></div>	
							</div>
						</div>

					<a href="/reviews" class="button button--primary">See More Reviews</a>
				</div>
			</div>
		</div>

		<div class="mem__section">
			<a href="/design-your-customer-membership/" class="button button--primary button--big">Customize Your Membership Today</a>
		</div>

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
								echo get_field('guarantee_heating', 'option');
								break;
							case "Plumbing":
								echo get_field('guarantee_plumbing', 'option');
								break;
							case "Air Conditioning":
								echo get_field('guarantee_air_conditioning', 'option');
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
