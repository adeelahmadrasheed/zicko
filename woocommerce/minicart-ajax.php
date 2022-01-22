<?php 
if ( !class_exists( 'WooCommerce' ) ) { 
	return false;
}
global $woocommerce; ?>
<div class="top-form top-form-minicart furnihome-minicart pull-right">
	<div class="top-minicart-icon pull-right">
		<span class="icon"></span>
		<div class="minicart-title">
			<h2><?php esc_html_e('Shopping Cart','furnihome');?></h2>
			<h3><?php esc_html_e('My Cart -','furnihome');?></h3>
			<span><?php $count = $woocommerce->cart->cart_contents_count;
				if ($count < 2) { echo $count.' item ';
			} else { 
				echo $count.' items ';
			}
			?></span><label>-</label> <?php echo $woocommerce->cart->get_cart_total(); ?>
		</div>
	</div>
	<div class="wrapp-minicart">
		<div class="minicart-padding">
			<div class="minicart-title">
				<h2><?php echo esc_html_e('Your product', 'furnihome');?></h2>
				<p><?php echo esc_html_e('Price', 'furnihome');?></p>
			</div>
			<ul class="minicart-content clearfix">
				<?php 
				foreach($woocommerce->cart->cart_contents as $cart_item_key => $cart_item): 
					$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_name = ( sw_woocommerce_version_check( '3.0' ) ) ? $_product->get_name() : $_product->get_title();
				?>
				<li>
					<div class="item-thumb">
						<a href="<?php echo get_permalink($cart_item['product_id']); ?>" class="product-image">
							<?php echo $_product->get_image( 'thumbnail' ); ?>
						</a>
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="btn-remove" title="%s"><span class="fa fa-times-circle"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'furnihome' ) ), $cart_item_key ); ?>
					</div>
					<?php 	global $product, $post, $wpdb, $average;
					$count = $wpdb->get_var($wpdb->prepare("
						SELECT COUNT(meta_value) FROM $wpdb->commentmeta
						LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
						WHERE meta_key = 'rating'
						AND comment_post_ID = %d
						AND comment_approved = '1'
						AND meta_value > 0
						",$cart_item['product_id']));

					$rating = $wpdb->get_var($wpdb->prepare("
						SELECT SUM(meta_value) FROM $wpdb->commentmeta
						LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
						WHERE meta_key = 'rating'
						AND comment_post_ID = %d
						AND comment_approved = '1'
						",$cart_item['product_id']));?>		
						<div class="detail-item">
							<div class="product-details"> 
								<a class="title-item" href="<?php echo get_permalink($cart_item['product_id']); ?>"><?php echo esc_html( $product_name ); ?></a>		
								<div class="qty">
									<span class="qty-label"><?php echo esc_html_e('Quantity:', 'furnihome');?></span>
									<?php echo '<span class="qty-number">'.esc_html( $cart_item['quantity'] ).'</span>'; ?>
								</div>
							</div>	
						</div>
						<div class="product-price">
							<span class="price"><?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>		        		        		    		
						</div>					
					</li>
					<?php
					endforeach;
					?>
				</ul>
				<div class="cart-checkout">
					<div class="price-total">
						<span class="label-price-total"><?php esc_html_e('Total:', 'furnihome'); ?></span>
						<span class="price-total-w"><span class="price"><?php echo $woocommerce->cart->get_cart_total(); ?></span></span>

					</div>
					<div class="cart-links">
						<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" title="<?php esc_attr_e( 'Cart', 'furnihome' ) ?>"><?php esc_html_e('Go to cart', 'furnihome'); ?></a></div>
						<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>" title="<?php esc_attr_e( 'Check Out', 'furnihome' ) ?>"><?php esc_html_e('Check Out', 'furnihome'); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>