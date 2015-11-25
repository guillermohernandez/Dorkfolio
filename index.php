<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dorkfolio
 */

get_header(); ?>


<?php $sidebar_index = get_theme_mod('sidebar_index'); ?>

<div>

	<?php if ($sidebar_index == "block") : ?>
	
	<div id="primary" class="row content-area">
		<main id="main" class="large-9 columns site-main " role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

			<?php endwhile; ?>

			<?php dorkfolio_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->

		<div class="large-3 columns">
			<div class="box">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div><!-- #primary -->

	<?php endif; ?>

	
	<?php if ($sidebar_index == "none" || $sidebar_index == "") : ?>

	<div id="primary" class="content-area row" data-equalizer>
		<main id="main" class="site-main large-8 large-centered columns" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				


			<!-- </li> -->

			<?php endwhile; ?>

			<!-- </ul> -->

			<?php dorkfolio_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php endif; ?>
</div>

	

<?php get_footer(); ?>
