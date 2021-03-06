<?php 
if ( !class_exists( 'WooCommerce' ) ) { 
	return false;
}
global $woocommerce; ?>
<div class="top-form top-form-minicart furnihome-minicart3 pull-right">
	<div class="top-minicart-icon pull-right">
		<i class="fa fa-shopping-cart"></i>
		<div class="title-cart">
			<h3><?php esc_html_e('My Cart', 'furnihome'); ?></h3>
			<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'furnihome'); ?>"><?php echo '<span class="minicart-numbers">'.$woocommerce->cart->cart_contents_count.'</span>';  esc_html_e(' item(s)', 'furnihome');?> :  <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		</div>
	</div>
	<div class="wrapp-minicart">
		<div class="minicart-padding">
			<div class="number-item"><?php echo esc_html__('There are ','furnihome').'<span class="item">' .$woocommerce->cart->cart_contents_count.' item(s)</span>'.esc_html__(' in your cart','furnihome');?></div>
			<ul class="minicart-content">
				<?php 
					foreach($woocommerce->cart->cart_contents as $cart_item_key => $cart_item): 
					$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_name = ( sw_woocommerce_version_check( '3.0' ) ) ? $_product->get_name() : $_product->get_title();
				?>
					<li>
						<a href="<?php echo get_permalink($cart_item['product_id']); ?>" class="product-image">
							<?php echo $_product->get_image( 'thumbnail' ); ?>
						</a>
						<?php 	global $product, $post, $wpdb, $average; ?>
						<div class="detail-item">
							<div class="product-details"> 
								<h4><a class="title-item" href="<?php echo get_permalink($cart_item['product_id']); ?>"><?php echo esc_html( $product_name ); ?></a></h4>	  		
								<div class="product-price">
									<span class="price"><?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>	      
									<div class="qty">
										<?php echo '<span class="qty-number">'.esc_html( $cart_item['quantity'] ).'</span>'; ?>
									</div>
								</div>
								<div class="product-action clearfix">
									<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="btn-remove" title="%s"><span class="fa fa-trash-o"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'furnihome' ) ), $cart_item_key ); ?>           
									<a class="btn-edit" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'furnihome'); ?>"><i class="fa fa-pencil"></i><span></span></a>    
								</div>
							</div>	
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="cart-checkout">
			    <div class="price-total">
				   <span class="label-price-total"><?php esc_html_e('Subtotal:', 'furnihome'); ?></span>
				   <span class="price-total-w"><span class="price"><?php echo $woocommerce->cart->get_cart_total(); ?></span></span>			
				</div>
				<div class="cart-links clearfix">
					<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" title="<?php esc_attr_e( 'Cart', 'furnihome' ) ?>"><?php esc_html_e('View Cart', 'furnihome'); ?></a></div>
					<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>" title="<?php esc_attr_e( 'Check Out', 'furnihome' ) ?>"><?php esc_html_e('Check Out', 'furnihome'); ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>