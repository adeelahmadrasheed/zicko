<?php 
/*
	* Name: WC Vendor Hook
	* Develop: SmartAddons
*/

/*
** Wrapper for dashboard
*/
add_action( 'wcvendors_before_dashboard', 'furnihome_wrapper_before_vendor_dashboard' );
add_action( 'wcvendors_after_dashboard', 'furnihome_wrapper_after_vendor_dashboard' );
function furnihome_wrapper_before_vendor_dashboard(){
	echo '<div class="vendor-dashboard-wrapper">';
}

function furnihome_wrapper_after_vendor_dashboard(){
	echo '</div>';
}

add_action( 'wp', 'furnihome_wcvendor_hook' );
function furnihome_wcvendor_hook(){
	$wc_prd_vendor_options 	= get_option( 'wc_prd_vendor_options' ); 
	$pro_store_header		= ( isset( $wc_prd_vendor_options[ 'vendor_store_header_type' ] ) ) ? $wc_prd_vendor_options[ 'vendor_store_header_type' ] : ''; 
	if( 'pro' !== $pro_store_header ) {
		remove_action( 'woocommerce_before_main_content', array( 'WCV_Vendor_Shop', 'shop_description' ), 30 );
		add_action( 'woocommerce_archive_description', array( 'WCV_Vendor_Shop', 'shop_description' ), 10 );
	}else{
		if( WCV_Vendors::is_vendor_page() ) {
			add_action( 'woocommerce_before_main_content', 'furnihome_vendor_breadcrumb', 9 );
			remove_action( 'woocommerce_before_main_content', 'furnihome_banner_listing', 10 );
		}
	}
	if( WCV_Vendors::is_vendor_page() ) {
		add_action( 'woocommerce_before_main_content', 'furnihome_vendor_breadcrumb', 9 );
	}
}

function furnihome_vendor_breadcrumb(){
?>
	<div class="furnihome_breadcrumbs">
		<div class="container">
			<?php
				if (!is_front_page() ) {
					if (function_exists('furnihome_breadcrumb')){
						furnihome_breadcrumb('<div class="breadcrumbs custom-font theme-clearfix">', '</div>');
					} 
				} 
			?>
		</div>
	</div>
<?php 
}

// Add sold by to product loop before add to cart
if ( WC_Vendors::$pv_options->get_option( 'sold_by' ) ) { 
	remove_action( 'woocommerce_after_shop_loop_item', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9 );
	add_action( 'woocommerce_after_shop_loop_item', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 50 );
	add_action( 'woocommerce_after_shop_loop_item', 'furnihome_soldby_wrapper_start', 1 );
	add_action( 'woocommerce_after_shop_loop_item','furnihome_soldby_wrapper_end', 51 );
	function furnihome_soldby_wrapper_start(){
		echo '<div class="wc-soldby-start">';
	}
	
	function furnihome_soldby_wrapper_end(){
		echo '</div>';
	}
} 