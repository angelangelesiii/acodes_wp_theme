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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- backgrounds -->
			<div class="portfolio-background"></div>
			<canvas id="banner-background"></canvas>


			<section class="banner-section full-page active-page">
				<div class="container">
					<img src="<?php echo get_template_directory_uri().'/images/branding/white_transparent.png' ?>" alt="ACODES" class="banner-logo">
					<p>
						<a href="#" class="banner-link hvr-underline-from-center" id="portfolioBtn">View Portfolio</a>
						<a href="#" class="banner-link hvr-underline-from-center" id="contactBtn">Contact Us</a>
					</p>
				</div>
			</section>

			<section class="portfolio full-page">
				<div class="wrapper-big">
					<?php
					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/content', 'page' );
					
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					
					endwhile; // End of the loop.
					?>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

