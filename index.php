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
 * @package Future_Imperfect
 */

get_header(); ?>

		<!-- Main -->
		<div id="main">

		<?php
		// see if we have any posts
		if ( have_posts() ) :

			// if this is the main blog roll, print this header
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/archive-content', 'single' );

			endwhile;

				// check to see if we have a previous link
				if ( ! get_previous_posts_link() ) :
						$prev_disable = 'disabled ';
					else :
						$prev_disable = '';
				endif;

				// check to see if we have a next link
				if ( ! get_next_posts_link() ) :
					$next_disable = 'disabled ';
				else :
					$next_disable = '';
				endif;

				// make pagination
				echo '<ul class="actions pagination">' . "\n";
					echo '<li><a href="' . esc_url( get_previous_posts_page_link() ) . '" class="' . esc_attr( $prev_disable ) . 'button big previous">Previous Page</a></li>' . "\n";
					echo '<li><a href="' . esc_url( get_next_posts_page_link() ) . '" class="' . esc_attr( $next_disable ) . 'button big next">Next Page</a></li>' . "\n";
				echo '</ul>' . "\n";

				// make pagination
				echo '<ul class="actions pagination">' . "\n";
					echo '<li><a href="' . esc_url( get_previous_posts_page_link() ) . '" class="disabled button big previous">Previous Page</a></li>' . "\n";
					echo '<li><a href="' . esc_url( get_next_posts_page_link() ) . '" class="button big next">Next Page</a></li>' . "\n";
				echo '</ul>' . "\n";

		endif; ?>

		</div>

		<?php get_sidebar(); ?>

<?php
get_footer();
