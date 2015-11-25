<?php
/**
 * The template for displaying all single posts.
 *
 * @package dorkfolio
 */

get_header(); ?>

<?php $sidebar_single = get_theme_mod('sidebar_single'); ?>

<div id="primary" class="content-area single">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ($sidebar_single == "block") : ?>

				<div class="row collapse" data-equalizer>
					<div class="large-9 column" data-equalizer-watch>

						<?php the_post_thumbnail(); ?>

						<div class="row">
  							<div class="large-11 large-centered column">

								<?php get_template_part( 'content', 'single' ); ?>

							</div>
						</div>

						<div class="row">
							<div class="large-11 large-centered column">
								<?php dorkfolio_post_nav(); ?>
				 			</div>
						</div>
						
							<div class="row">
								<div class="large-11 large-centered column">
									<?php
										// If comments are open or we have at least one comment, load up the comment template
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>
								</div>
							</div>
					</div>
					<div class="large-3 column sidebar panel" data-equalizer-watch>
						<?php get_sidebar(); ?>
					</div>
				</div>
				
			<?php endif; ?>

			<?php if ($sidebar_single == "none" || $sidebar_single == "") : ?>

				<?php the_post_thumbnail(); ?>

				<div class="row">
  					<div class="large-8 large-centered columns">

						<?php get_template_part( 'content', 'single' ); ?>

					</div>
				</div>

				<div class="row">
					<div class="large-8 large-centered column">
						<?php dorkfolio_post_nav(); ?>
		 			</div>
				</div>
				<div class="comment-area">
					<div class="row">
						<div class="large-8 large-centered column">
							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
