<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Komni
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
                                <?php
								// Extract the first URL from the content.
								$post_title_link = get_permalink();
								$url_in_content = get_url_in_content( get_the_content() );
								if( ! empty( $url_in_content ) && false !== $url_in_content ) {
									$post_title_link = $url_in_content;
								}
							?>

                                    <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( $post_title_link ) . '" rel="bookmark">', '</a></h4>' ); ?>
                            </header>
                            <!-- .entry-header -->

                            <div class="entry-excerpt">

                                <?php the_excerpt(); ?>

                                    <?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'dorkfolio' ),
									'after'  => '</div>',
								) );
							?>
                            </div>
                            <!-- .entry-content -->
                        </div>
                    </div>

                    <?php else : ?>

                        <header class="entry-header">

                            <?php
								// Extract the first URL from the content.
								$post_title_link = get_permalink();
								$url_in_content = get_url_in_content( get_the_content() );
								if( ! empty( $url_in_content ) && false !== $url_in_content ) {
									$post_title_link = $url_in_content;
								}
							?>

                                <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( $post_title_link ) . '" rel="bookmark">', '</a></h4><!-- test -->' ); ?>
                        </header>
                        <!-- .entry-header -->

                        <div class="entry-excerpt">
                            <!-- content -->

                            <?php the_excerpt(); ?>

                                <?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'dorkfolio' ),
							'after'  => '</div>',
						) );
					?>
                        </div>
                        <!-- .entry-content -->

                        <?php endif; ?>

                            <div class="entry-meta">
                                <?php dorkfolio_entry_meta(); ?>
                            </div>

            </div>
        </div>

    </article>
    <!-- #post-## -->