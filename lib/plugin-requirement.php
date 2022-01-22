<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'furnihome_register_required_plugins' );
function furnihome_register_required_plugins() {
    $plugins = array(
      array(
        'name'               => esc_html__( 'WooCommerce', 'furnihome' ), 
        'slug'               => 'woocommerce', 
        'required'           => true, 
        'version'			 => '3.1.2'
        ),    
      array(
        'name'     			 => esc_html__( 'SW Core', 'furnihome' ),
        'slug'      		 => 'sw_core',
        'source'         	 => esc_url( 'http://demo.wpthemego.com/themes/sw_furnihome/plugins/sw_core.zip' ), 
        'required'  		 => true,   
        'version'			 => '1.0.0'
        ),      
      array(
        'name'     			 => esc_html__( 'SW WooCommerce', 'furnihome' ),
        'slug'      		 => 'sw_woocommerce',
        'source'         	 => esc_url( 'http://demo.wpthemego.com/themes/sw_furnihome/plugins/sw_woocommerce.zip' ), 
        'required'  		 => true,
        'version'			 => '1.0.0'
        ),   
      array(
        'name'               => esc_html__( 'SW Ajax Woocommerce Search', 'furnihome' ),
        'slug'               => 'sw_ajax_woocommerce_search',
        'source'             => esc_url( 'http://demo.wpthemego.com/themes/sw_furnihome/plugins/sw_ajax_woocommerce_search.zip' ), 
        'required'           => true,
        'version'            => '1.0'
        ),   
      array(
        'name'               => esc_html__( 'One Click Demo Import', 'furnihome' ), 
        'slug'               => 'one-click-demo-import', 
        'source'             => esc_url( 'http://demo.wpthemego.com/themes/sw_furnihome/plugins/one-click-demo-import.zip' ), 
        'required'           => true, 
        ),	
      array(
        'name'     			 => esc_html__( 'WordPress Importer', 'furnihome' ),
        'slug'      		 => 'wordpress-importer',
        'required' 			 => true,
        ), 
      array(
        'name'      		 => esc_html__( 'MailChimp for WordPress Lite', 'furnihome' ),
        'slug'     			 => 'mailchimp-for-wp',
        'required' 			 => false,
        ),
      array(
        'name'      		 => esc_html__( 'Contact Form 7', 'furnihome' ),
        'slug'     			 => 'contact-form-7',
        'required' 			 => false,
        ),
      array(
        'name'      		 => esc_html__( 'Image Widget', 'furnihome' ),
        'slug'     			 => 'image-widget',
        'required' 			 => false,
        ),
      array(
        'name'      		 => esc_html__( 'YITH Woocommerce Compare', 'furnihome' ),
        'slug'      		 => 'yith-woocommerce-compare',
        'required'			 => false
        ),
      array(
        'name'     			 => esc_html__( 'YITH Woocommerce Wishlist', 'furnihome' ),
        'slug'      		 => 'yith-woocommerce-wishlist',
        'required' 			 => false
        ), 
      array(
        'name'     			 => esc_html__( 'WordPress Seo', 'furnihome' ),
        'slug'      		 => 'wordpress-seo',
        'required'  		 => false,
        ),

      );
if( furnihome_options()->getCpanelValue('developer_mode') ): 
   $plugins[] = array(
    'name'               => esc_html__( 'Less Compile', 'furnihome' ), 
    'slug'               => 'lessphp', 
    'source'             => esc_url( 'http://demo.wpthemego.com/themes/sw_furnihome/plugins/lessphp.zip' ), 
    'required'           => true, 
    );
endif;
$config = array();

tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'furnihome_vcSetAsTheme' );
function furnihome_vcSetAsTheme() {
    vc_set_as_theme();
}