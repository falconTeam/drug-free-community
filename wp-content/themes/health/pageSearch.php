<?php /* Template Name: SearchPage */ ?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package health
 */

get_header(); ?>

<?php get_search_form(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<?php 
	// 1st Method - Declaring $wpdb as global and using it to execute an SQL query statement that returns a PHP object

global $wpdb;
//$results = $wpdb->get_results( 'SELECT * FROM rehibliationCenter  ', OBJECT );

// 2nd Method - Utilizing the $GLOBALS superglobal. Does not require global keyword ( but may not be best practice )
$myrows = $wpdb->get_results( "SELECT * FROM rehibliationCenter" );//$results = $GLOBALS['wpdb']->get_results( 'SELECT * FROM wp_options WHERE option_id = 1', OBJECT );

 var_dump($myrows);
?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
