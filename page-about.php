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


				<?php //get_template_part( 'template-parts/content', 'page-about' ); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
				
						<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'midterm-theme' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<!--<footer class="entry-footer">
						<?php 
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'midterm-theme' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer>--><!-- .entry-footer -->
				</article><!-- #post-## -->





				

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>



<?php rewind_posts(); ?>

<?php

//$args = array( ‘post_type’ => ‘photo_item’, ‘posts_per_page’ => 10 );
$args = array('post_type' => 'photo_item', 'posts_per_page' => 10);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();




echo '<div class="plug-content">';
the_content();
echo '</div>';

endwhile;

?>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
