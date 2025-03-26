<?php
/**
 * Template Name: HVAC System Replacements
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

	<main id="primary" class="site-main hsr">
		<!-- Comment for push -->
		<div class="hsr-hero" style="background-image: url('https://sumzim.com/wp-content/uploads/2020/12/heating-installation.jpg');">

			<div class="hsr-hero-content">
				<h1>In need of an HVAC System Replacement?</h1>
				<p>Every system replacement is different, and when making an investment of this size, you want to be sure to have it done right.</p>
			</div>
			
		</div>

		<div class="content__page">
		<!-- Begin Page Content Options -->

			<div class="display-button display-button--desktop">
				<button class="button button-cta button--schedule button--large book-now-button" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })" type="button">Book Now!</button>
			</div>

			<div class="display-button display-button--mobile">
				<a href="tel:6105935129" class="button button-cta button--schedule button--large book-now-button" id="sa-click-to-call">Call 610-593-5129</a>
				<div class="home__hero-link-mobile-alt">
					or <button class="se-button-alt" onclick="_scheduler.show({ schedulerId: 'sched_ejqbmr1e0g7tagr59sdo4rr2' })">Book Now</button>
				</div>
			</div>		

			<div class="hsr hsr-difference">
				<h2>The Summers & Zim's Difference</h2>
				<p>Here are a few highlights of what makes Summers &amp; Zim's system installations different from the industry as a whole.</p>
			</div>

			<div class="hsr hsr-down-arrow">
				<span class="material-symbols-outlined">south</span>
			</div>

			<div class="hsr hsr-image-section">
				<img src="https://sumzim.com/wp-content/uploads/2023/06/system-assembly.jpg" alt="">

				<div class="hsr-image-section-overlay">
					<h2>Excellence in System Assembly</h2>
					<p>HVAC replacement systems are not like buying a car. Instead, it's more like buying a box of car parts. Who you choose to assemble them makes all the difference.</p>
					<p>At Summers &amp; Zim's, we have <a href="/staff">well trained technicians</a> - with an average of 19 years experience - who go above and beyond to make sure your system is installed the right way.</p>
				</div>
			</div>
			
			<div class="hsr hsr-video">
				<?php 
				$video_embed = get_field('video');
				// $video_embed_header = get_sub_field('video_header');
				?>
			<!-- Video Embed -->
			<div class="video-embed">
				<div class="video-embed__container">
				<?php echo $video_embed; ?>
				</div>
			</div>				
			</div>

			<div class="hsr hsr-pricing">
				<h2>Our Pricing</h2>
				<p>Our project managers are paid a set salary unlike the commission-based pay that's industry standard. This means we have no incentive to steer you toward anything other than what is the best fit for you.</p>
			</div>

			<div class="hsr hsr-attention">
				<div class="hsr-attention-center">
					<h2>Our Attention to Detail</h2>
					<p>It is our job to care about the details so you don't have to. Here are a few of the things that we care about to make sure your system is as efficient as possible and lasts as long as possible:</p>
				</div>
				

				<div class="hsr hsr-attention-grid">
					<div class="hsr-attention-grid-item">
						<img src="https://sumzim.com/wp-content/uploads/2023/06/fabrication-shop.jpg" alt="">
						<div class="hsr-attention-desc">
							<h3>Custom Metal Duct Work</h3>
							<p>We make custom duct work adaptations to fit your home the day of the install in our fab shop and deliver it to your home the same day. This way we can optimize airflow efficiency.</p>
						</div>
					</div>

					<div class="hsr-attention-callout">
						<span class="material-symbols-outlined">release_alert</span>
						<p>Our design of the base ell that many applications call for takes extra time and equipment to fabricate, but are up to 5 times more efficient than traditional duct base ells.</p>
					</div>
					<div class="hsr-attention-grid-item">
						<img src="http://sumzim.com/wp-content/uploads/2023/06/custom-drain-pan.jpg" alt="">
						<div class="hsr-attention-desc">
							<h3>Extra Protection</h3>
							<p>We use a custom fabricated emergency drain pan to add one more level of leak protection between the system and the rest of your home.</p>
						</div>

					</div>

					<div class="hsr-attention-callout">
						<span class="material-symbols-outlined">workspace_premium</span>
						<p>We offer 10-year parts <em>and labor</em> warranties on all Summers &amp; Zim's installed equipment.</p>
					</div>	

					<div class="hsr-attention-grid-item">
						<img src="https://sumzim.com/wp-content/uploads/2024/01/sz-technician-steam-boiler-maintenance-1.jpg" alt="">
						<div class="hsr-attention-desc">
							<h3>Redundancy Checking</h3>
							<p>We perform a detailed system commissioning at the conclusion of each installation, checking combustion and/or refrigeration pressures for optimal performance according to manufacturer specifications.</p>
						</div>
					</div>		
										
				</div>

			</div>

			<div class="display-button">
				<a href="/about-us/free-estimate" class="button button--primary button--large">Get a Free Estimate</a>
			</div>			

			<div class="breakout breakout--background-image" style="background:url('https://sumzim.com/wp-content/uploads/2023/06/how-long-do-air-conditioners-last.jpeg'); background-position: center center; background-repeat: no-repeat;">
				<div class="hsr hsr-carrier">
					<h2>Carrier</h2>
					<p>The oldest name in Air Conditioning, and widely accepted as the highest quality brand of equipment. Check out why we choose Carrier for most of our equipment.</p>				
				</div>
			</div>

			<div class="hsr hsr-pricing">
				<h2>Our Warranties</h2>
				<p>All of our HVAC replacement jobs come with 10 year parts and labor warranties as a Summers &amp; Zim's standard.  When we install a unit the right way, we are confident that we can take care of anything that goes wrong with the unit in the first 10 years on us.</p>
				<p>Also, with our team of technicians, we are able to get to and take care of most issues within a few hours of you placing the call any time of the day. </p>
			</div>

			<div class="hsr hsr-guarantee">
				<h2>Our Guarantees</h2>
				<div class="heading-list">
					<ul class="heading-list__list">
						<li class="heading-list__list-item">
							<h3>Comfort Guarantee</h3>
							<p>We guarantee that the thermostat in your home will maintain at least a 70 degree heating temperature and a 75 degree cooling temperature at all times. Should this not be the case, Summers and Zim's will make the needed adjustments or replace the system at no cost.</p>
						</li>
						<li class="heading-list__list-item">
							<h3>No Lemons Guarantee</h3>
							<p>If the compressor in your air conditioner fails twice in the first 5 years, we will install a completely new outdoor unit. If the heat exchanger in your furnace fails within the first 10 years, we will install a new furnace.</p>
						</li>

						<li class="heading-list__list-item">
							<h3>Property Protection Guarantee</h3>
							<p>All property such as lawns, shrubbery, carpeting, floors, walls, furniture and door frames are protected. Any property that's accidentally damaged will be replaced or repaired. Protective shoe covers and hall runners will be used on all appropriate work and traffic areas.</h3>
						</li>
						
						<li class="heading-list__list-item">
							<h3>$500 No Frustration Guarantee</h3>
							<p>If your system breaks down during the first two years and leaves you without heating or cooling for 24 hours, we will pay you $500.00 for your inconvenience.</p>
						</li>
						
						<li class="heading-list__list-item">
							<h3>100% Money Back Guarantee</h3>
							<p>We guarantee that the equipment we have installed will perform as we have stated. If the system does not meet your expectations, we will remove it and return 100% of your investment.</p>
						</li>						
					</ul>
				</div>			
			</div>

			<div class="display-button">
				<a href="/about-us/free-estimate" class="button button--primary button--large">Get a Free Estimate</a>
			</div>			
		
		<a href="#top" class="back-to-top">Back to Top</a>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
