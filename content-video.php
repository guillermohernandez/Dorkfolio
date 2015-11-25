<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package dorkfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'box' ); ?>>
	<div class="row">
		<div class="large-12 columns">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="row">
				<div class="large-4 columns right">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="large-8 columns">
					<header class="entry-header">
						<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content"><!-- content - video -->

						<?php the_content(); ?>

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'dorkfolio' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					
				</div>
			</div>

		<?php else : ?>
			<header class="entry-header">
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content"><!-- content - video -->

				<?php the_content(); ?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'dorkfolio' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		
		<?php endif; ?>

		
	
			<div class="entry-meta">
				<?php dorkfolio_entry_meta(); ?>
			</div>

		</div>
	</div>
	

	
</article><!-- #post-## -->
