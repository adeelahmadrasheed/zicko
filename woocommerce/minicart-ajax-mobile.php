<?php 
if ( !class_exists( 'WooCommerce' ) ) { 
	return false;
}
global $woocommerce; ?>
<div class="furnihome-minicart-mobile">
		<span class="icon-menu"></span>
		<?php echo '<span class="minicart-number">'.$woocommerce->cart->cart_contents_count.'</span>'; ?>
		<span class="menu-text"><?php echo esc_html__( 'Cart', 'furnihome' ); ?></span>
</div>