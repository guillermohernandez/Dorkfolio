<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package dorkfolio
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main row" role="main">
            <section class="error-404 not-found large-8 large-centered columns">
                <header class="page-header">
                    <h1 class="error-title">404 ERROR</h1>
                    <h2 class="error-message"><?php _e( 'Sorry, the page you looking for isn&rsquo;t exist here.', 'dorkfolio' ); ?></h2>
                </header>
                <!-- .page-header -->

                <div class="page-content">
                    <p>
                        <?php _e( 'Nothing was found at this location. Maybe try a search to find something interest?', 'dorkfolio' ); ?>
                    </p>

                    <?php get_search_form(); ?>

                </div>
                <!-- .page-content -->
            </section>
            <!-- .error-404 -->

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php get_footer(); ?>