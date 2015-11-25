<?php
/**
 * The template for displaying image attachments
 *
 * @package dorkfolio
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>

<?php $sidebar_single = get_theme_mod('sidebar_single'); ?>

<div id="primary" class="content-area image-attachment">
	<main id="main" class="site-main" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>

		<?php if ($sidebar_single == "block") : ?>

			<div class="row collapse" data-equalizer>
				<div class="large-9 column" data-equalizer-watch>
					<div class="attachment">
						<?php
							$image_size = apply_filters( 'dorkfolio_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>
					</div><!-- .attachment -->


					<div class="row">
  						<div class="large-11 large-centered column">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="entry-header">
									<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<div class="entry-attachment">
										<?php if ( has_excerpt() ) : ?>
											<div class="entry-caption">
												<?php the_excerpt(); ?>
											</div><!-- .entry-caption -->
										<?php endif; ?>
									</div><!-- .entry-attachment -->

									<?php
										the_content();
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'dorkfolio' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>

									<?php edit_post_link( __( 'Edit', 'dorkfolio' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-content -->

								<div class="entry-meta">
									<span class="entry-date">Published on <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
									<span class="parent-post-link">On <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
									<span class="full-size-link">Original <a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a> (PX)</span>									
								</div><!-- .entry-meta -->
						
							</article><!-- #post-## -->
						</div>
					</div>

					<div class="row">
						<div class="large-11 large-centered column">

							<nav id="image-navigation" class="navigation image-navigation">
								<div class="nav-links">
								<?php previous_image_link( false, '<div class="nav-previous"> <span class="meta-nav">&larr;</span>&nbsp;' . __( 'Previous Image', 'dorkfolio' ) . '</div>' ); ?>
								<?php next_image_link( false, '<div class="nav-next">' . __( 'Next Image', 'dorkfolio' ) . '&nbsp;<span class="meta-nav">&rarr;</span></div>' ); ?>
								</div><!-- .nav-links -->
							</nav><!-- #image-navigation -->
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
						</div><!-- /column -->
					</div><!-- /row -->


				</div><!-- /column -->
			

			

			

				<div class="large-3 column sidebar panel" data-equalizer-watch>
					<?php get_sidebar(); ?>
				</div>

			</div><!-- /row -->


		<?php endif; ?>

			<?php if ($sidebar_single == "none" || $sidebar_single == "") : ?>

				<div class="row">
					<div class="large-8 large-centered column">
						<div class="attachment">
							<?php
								$image_size = apply_filters( 'dorkfolio_attachment_size', 'large' );

								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>
						</div><!-- .attachment -->

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<div class="entry-attachment">
									<?php if ( has_excerpt() ) : ?>
										<div class="entry-caption">
											<?php the_excerpt(); ?>
										</div><!-- .entry-caption -->
									<?php endif; ?>
								</div><!-- .entry-attachment -->

								<?php
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'dorkfolio' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
							</div><!-- .entry-content -->

							<div class="entry-meta">
								<span class="entry-date">Published on <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
								<span class="parent-post-link">On <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
								<span class="full-size-link">Original <a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a> (PX)</span>
								<?php edit_post_link( __( 'Edit', 'dorkfolio' ), '<span class="edit-link">', '</span>' ); ?>
							</div><!-- .entry-meta -->
							
						</article><!-- #post-## -->
					</div><!-- /column -->
				</div><!-- /row -->

				<div class="row">
					<div class="large-8 large-centered column">

						<nav id="image-navigation" class="navigation image-navigation">
							<div class="nav-links">
							<?php previous_image_link( false, '<div class="nav-previous"> <span class="meta-nav">&larr;</span>&nbsp;' . __( 'Previous Image', 'dorkfolio' ) . '</div>' ); ?>
							<?php next_image_link( false, '<div class="nav-next">' . __( 'Next Image', 'dorkfolio' ) . '&nbsp;<span class="meta-nav">&rarr;</span></div>' ); ?>
							</div><!-- .nav-links -->
						</nav><!-- #image-navigation -->

					</div><!-- /column -->
				</div><!-- /row -->

				<div class="comment-area">
					<div class="row">
						<div class="large-8 large-centered column">
							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						</div><!-- /column -->
					</div><!-- /row -->
				</div><!-- /comment-area -->
			<?php endif; ?>

	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
