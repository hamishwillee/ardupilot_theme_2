<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * Modified  in ardupilot2 theme to replace the wordress acknowledgement with the 3DRobotics sponsorshiop. Could easily instead use a pluign for this change.
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php do_action( 'twentyfourteen_credits' ); ?>
				<p><a href="<?php echo esc_url( __( 'http://3drobotics.com/', 'twentyfourteen' ) ); ?>"><?php printf( __( 'Sponsored  by %s', 'twentyfourteen' ), '3DRobotics' ); ?></a></p>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
