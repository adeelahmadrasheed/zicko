<?php 
	do_action( 'before' ); 
?>
<?php if ( class_exists( 'WooCommerce' ) && !furnihome_options()->getCpanelValue( 'disable_cart' ) ) { ?>
<?php
	$furnihome_page_header = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : furnihome_options()->getCpanelValue('header_style');
	if($furnihome_page_header == 'style7'){
		get_template_part( 'woocommerce/minicart-ajax-style3' ); 
	}elseif($furnihome_page_header == 'style6'){
		get_template_part( 'woocommerce/minicart-ajax-style2' ); 
	}else{
		get_template_part( 'woocommerce/minicart-ajax' ); 
	}
	
?>
<?php } ?>