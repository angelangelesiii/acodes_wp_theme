<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACODES_2017
 */

get_header(); ?>

	<div id="primary" class="content-area front-page full-page">
		<main id="main" class="site-main" role="main">

			<section class="banner-section section" data-anchor="home">

				<div class="inner">
					<video poster="#" id="front-page-video" playsinline data-autoplay muted loop>
					  <!-- STILL NEEDS A FALLBACK IMAGE!!! -->
						<source src="<?php echo get_template_directory_uri().'/videos/background/acodesbackground.webm' ?>" type="video/webm">
						<source src="<?php echo get_template_directory_uri().'/videos/background/acodesbackground.mp4' ?>" type="video/mp4">
					</video>
					<div class="shade-overlay"></div>
					<div class="dot-overlay"></div>
					
					<div class="container">
						<div class="banner-logo">
							<img src="<?php echo get_template_directory_uri().'/images/branding/exploded/triangle.png' ?>" class="banner-logo-invisible">
					
							<img src="<?php echo get_template_directory_uri().'/images/branding/exploded/triangle.png' ?>" class="banner-logo-piece triangle">
							<img src="<?php echo get_template_directory_uri().'/images/branding/exploded/text.png' ?>" class="banner-logo-piece text">
							<img src="<?php echo get_template_directory_uri().'/images/branding/exploded/line1.png' ?>" class="banner-logo-piece line1">
							<img src="<?php echo get_template_directory_uri().'/images/branding/exploded/line2.png' ?>" class="banner-logo-piece line2">
						</div>
						<p>
							<a href="#" class="banner-link hvr-underline-from-center" id="portfolioBtn">View Portfolio</a>
							<a href="#" class="banner-link hvr-underline-from-center" id="contactBtn">Contact Us</a>
						</p>
					</div>
				</div>
				
			</section>

			<section class="portfolio section" data-anchor="portfolio">
				<?php 
						wp_reset_postdata();
						$worksArray = array(
							'post_type'				=> 'work',
							'posts_per_page'		=> '3',
							'meta_key'				=> 'fp_featured',
							'meta_value'			=>  true
							);
						$worksQuery = new WP_Query($worksArray);
						$count = 1;
						if ($worksQuery->have_posts()) {
							while ($worksQuery->have_posts()) {
								$worksQuery->the_post();
						?>
						
						<div class="slide portfolio-item <?php echo 'item-count-'.$count; ?>" data-anchor="<?php echo urlencode(the_title()); ?>">
							<div class="container">
								<?php if(has_post_thumbnail()): ?>
									<div class="portfolio-item-image" style="background: url('<?php echo the_post_thumbnail_url('full'); ?>');">
									</div>
								<?php else: ?>
									<div class="portfolio-item-image no-thumbnail">
										<h3>No Image</h3>
									</div>
								<?php endif; ?>
							</div>
							<div class="text-container">
								<h1><?php the_title(); ?></h1>
								<?php the_excerpt(); ?>
							</div>
						</div>
						
						<?php
							$count++;
							}
						
						} else {
							// FALLBACK
						}
						wp_reset_postdata();
						?>
						<div class="slide portfolio-more <?php echo 'item-count-'.$count; ?>" data-anchor="view-more">
							<h1>View More</h1>
						</div>
			</section>

			<section class="contact section" data-anchor="contactus">
				<h1>contact us</h1>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

