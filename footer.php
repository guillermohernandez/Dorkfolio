<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dorkfolio
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<?php do_action( 'dorkfolio_footer' ); ?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


	<!-- close the off-canvas menu -->
	 <a class="exit-off-canvas"></a>

	</div> <!-- .inner-wrap -->
 </div> <!-- .off-canvas-wrap -->

</body>
</html>
