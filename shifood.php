<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

               
				

				<?php get_template_part( 'template-parts/content', 'shifood' ); ?>
				


				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<div class="ls-post-container">
					<?php //the_title(); ?>
					<?php the_content(); ?>
				</div>	
				

			<?php endwhile; // End of the loop. ?>



<?php rewind_posts(); ?>

<?php

//$args = array( ‘post_type’ => ‘icphoto_item’, ‘posts_per_page’ => 10 );
$args = array('post_type' => 'icphoto_item', 'posts_per_page' => 10);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();


the_title();

echo '<div class="plugin-content">';
the_content();
echo '</div>';

endwhile;

?>





		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
