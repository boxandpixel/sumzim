<?php
/**
 * Template Name: Through the Years
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
get_header('timeline');
?>
	<div class="tty">

		<div class="tty-hero">
			<div class="tty-hero__content">
				<div class="tty-hero__content-title">
					<?php the_title();?>
				</div>
				<div class="tty-hero__content-intro">
					<?php echo get_field('hero_intro'); ?>
				</div>
			</div>
		</div>

		<div class="tty-timeline">
			<!-- ** Start Line Drawing ** -->
			<div class="line-container">
				<svg viewBox="0 0 4 3000" fill="none" preserveAspectRatio="xMidYMax meet" id="timeline">
					<path d="M2 0V3000" stroke="#0C1E31" stroke-width="3" />
				</svg>
			</div>

			<div class="tty-years">
			<?php if(have_rows('timeline')): while(have_rows('timeline')): the_row(); ?>
				<div class="tty-year">
					<img src="<?php echo get_sub_field('timeline_image')['url']; ?>" alt="">
					<div class="tty-year-details scroll" data-rate=".2" data-direction="vertical">
						<h3><?php echo get_sub_field('timeline_year'); ?></h3>
						<?php echo get_sub_field('timeline_text'); ?>
					</div>
					<div class="tty-year-dot"></div>
				</div>
			<?php endwhile; endif; ?>	
			</div>
			
		</div>

	</div>



		<script>
			let path = document.querySelector("#timeline path");
			let pathLength = path.getTotalLength();

			path.style.strokeDasharray = pathLength + " " + pathLength;
			path.style.strokeDashoffset = pathLength;
			// console.log(path);

			window.addEventListener("scroll", () => {
				var scrollPercentage =
					(document.documentElement.scrollTop + document.body.scrollTop) /
					(document.documentElement.scrollHeight -
						document.documentElement.clientHeight);

				var drawLength = pathLength * scrollPercentage;

				path.style.strokeDashoffset = pathLength - drawLength;

				/** Parralax */
				const target = document.querySelectorAll('.scroll'); 

				target.forEach( (elem) => {
					let pos = window.scrollY * elem.dataset.rate;
					if (elem.dataset.direction === 'vertical') {
					return (elem.style.transform = `translateY(${pos}px)`);
					}
				});			
			});
		</script>
	</body>
</html>

<?php get_footer(); ?>


