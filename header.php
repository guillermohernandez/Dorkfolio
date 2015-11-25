<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dorkfolio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Foundation .off-canvas-wrap start -->

 <div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

	<nav class="tab-bar show-for-small-only">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>
    </nav> 

	<!-- Off Canvas Menu -->
	 <aside class="left-off-canvas-menu">
		<ul class="off-canvas-list">
			<?php wp_nav_menu( array( 
				'theme_location' => 'primary', 
				'container' => '', 
				'menu_class' => '', 
				'menu_id' => '', 
				'items_wrap' => '%3$s',
				'depth' => 3
			) ); ?>
		</ul>
	</aside> 

<!-- Foundation .off-canvas-wrap end -->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dorkfolio' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="row"><!-- Foundation .row start -->
				<div class="small-12 columns"><!-- Foundation .columns start -->
					<div>
						<?php if ( get_theme_mod( 'dorkfolio_logo' ) ) : ?>
						    <div class='site-logo'>
						        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'dorkfolio_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
						    </div>
						<?php else : ?>
						    <hgroup>
						        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
						        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
						    </hgroup>
						<?php endif; ?>
					</div>
				</div><!-- Foundation .columns end -->

			</div><!-- Foundation .row end -->
			
		</div><!-- .site-branding -->

		
		<!-- Foundation top-bar navigation start -->
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<!-- Display social media menu here -->
			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<div class="row">
					<div class="small-12 columns text-center">
						<nav id="social-navigation" class="social-navigation" role="navigation">
							<?php
								// Social links navigation menu.
								wp_nav_menu( array(
									'theme_location' => 'social',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav><!-- .social-navigation -->
					</div>
				</div>
			<?php endif; ?>
				
				
			<!-- Display primary menu here -->
			<div class="row">
				<div class="small-12 columns">
					<nav class="top-bar" data-topbar>
						<section class="top-bar-section text-center small-only-text-left hide-for-small-only">
							<?php wp_nav_menu( array( 
								'theme_location' => 'primary', 
								'menu_id' => 'top-nav',
							) ); ?> 
						</section> 
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</nav><!-- .row -->
		<!-- Foundation top-bar navigation end -->

	</header><!-- #masthead --> 

	<div id="content" class="site-content">
