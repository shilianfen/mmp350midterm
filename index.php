<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package midterm_theme
 */

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="ls-post-container">
					<?php //the_title(); ?>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

<?php rewind_posts(); ?>

<?php

//$args = array( ‘post_type’ => ‘icphoto_item’, ‘posts_per_page’ => 10 );
$args = array('post_type' => 'icphoto_item', 'posts_per_page' => 10);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

echo '<div class="plugin-title">';
the_title();
echo '</div>';

echo '<div class="plugin-content">';
the_content();
echo '</div>';

endwhile;

?>


<?php myIcecream(); ?>
<iframe width="50%" height="60%" src="https://www.youtube.com/embed/QlWZluzBNxM" frameborder="0" allowfullscreen></iframe>


		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
