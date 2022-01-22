<?php 	
	$furnihome_page_footer   	 = ( get_post_meta( get_the_ID(), 'page_footer_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_footer_style', true ) : furnihome_options()->getCpanelValue( 'footer_style' );
	$furnihome_copyright_text 	 = furnihome_options()->getCpanelValue( 'footer_copyright' ); 
	$furnihome_copyright_footer  = ( get_post_meta( get_the_ID(), 'copyright_footer_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'copyright_footer_style', true ) : furnihome_options()->getCpanelValue('copyright_style');
?>

<footer id="footer" class="footer default theme-clearfix">
	<!-- Content footer -->
	<div class="container">
		<?php 
			if( $furnihome_page_footer != '' ) :
				echo sw_get_the_content_by_id( $furnihome_page_footer ); 
			endif;
		?>
	</div>
	<div class="footer-copyright <?php echo esc_attr( $furnihome_copyright_footer ); ?>">
		<div class="container">
			<!-- Copyright text -->
			<div class="copyright-text">
				<?php if( $furnihome_copyright_text == '' ) : ?>
					<p>&copy;<?php echo date('Y') .' '. esc_html__('WordPress Theme SW Furnihome. All Rights Reserved. Designed by ','furnihome'); ?><a class="mysite" href="<?php echo esc_url( 'http://www.wpthemego.com/' ); ?>"><?php esc_html_e('WPThemeGo.com','furnihome');?></a>.</p>
				<?php else : ?>
					<?php echo wp_kses( $furnihome_copyright_text, array( 'a' => array( 'href' => array(), 'title' => array(), 'class' => array() ), 'p' => array()  ) ) ; ?>
				<?php endif; ?>
			</div>
			<?php if (is_active_sidebar('footer-copyright')){ ?>
			<div class="sidebar sidebar-copyright">
				<?php dynamic_sidebar('footer-copyright'); ?>
			</div>
		<?php } ?>
		</div>
	</div>
</footer>