<?php
$lib_dir = trailingslashit( str_replace( '\\', '/', get_template_directory() . '/lib/' ) );

if( !defined('FURNI_DIR') ){
	define( 'FURNI_DIR', $lib_dir );
}

if( !defined('FURNI_URL') ){
	define( 'FURNI_URL', trailingslashit( get_template_directory_uri() ) . 'lib' );
}

if( !defined('FURNI_OPTIONS_URL') ){
	define( 'FURNI_OPTIONS_URL', trailingslashit( get_template_directory_uri() ) . 'lib/options/' ); 
}

defined('FURNIHOME_THEME') or die;

if (!isset($content_width)) { $content_width = 940; }

define("FURNI_PRODUCT_TYPE","product");
define("FURNI_PRODUCT_DETAIL_TYPE","product_detail");

require_once( get_template_directory().'/lib/options.php' );
function furnihome_Options_Setup(){
	global $furnihome_options, $options, $options_args;

	$options = array();
	$options[] = array(
		'title' => esc_html__('General', 'furnihome'),
		'desc' => wp_kses( __('<p class="description">The theme allows to build your own styles right out of the backend without any coding knowledge. Upload new logo and favicon or get their URL.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
		'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_019_cogwheel.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
		'fields' => array(	

			array(
				'id' => 'sitelogo',
				'type' => 'upload',
				'title' => esc_html__('Logo Image', 'furnihome'),
				'sub_desc' => esc_html__( 'Use the Upload button to upload the new logo and get URL of the logo', 'furnihome' ),
				'std' => get_template_directory_uri().'/assets/img/logo-default.png'
				),

			array(
				'id' => 'favicon',
				'type' => 'upload',
				'title' => esc_html__('Favicon', 'furnihome'),
				'sub_desc' => esc_html__( 'Use the Upload button to upload the custom favicon', 'furnihome' ),
				'std' => ''
				),

			array(
				'id' => 'tax_select',
				'type' => 'multi_select_taxonomy',
				'title' => esc_html__('Select Taxonomy', 'furnihome'),
				'sub_desc' => esc_html__( 'Select taxonomy to show custom term metabox', 'furnihome' ),
				),

			array(
				'id' => 'title_length',
				'type' => 'text',
				'title' => esc_html__('Title Length Of Item Listing Page', 'furnihome'),
				'sub_desc' => esc_html__( 'Choose title length if you want to trim word, leave 0 to not trim word', 'furnihome' ),
				'std' => 0
				)					
			)		
);

$options[] = array(
	'title' => esc_html__('Schemes', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Custom color scheme for theme. Unlimited color that you can choose.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_163_iphone.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(		
		array(
			'id' => 'scheme',
			'type' => 'radio_img',
			'title' => esc_html__('Color Scheme', 'furnihome'),
			'sub_desc' => esc_html__( 'Select one of 1 predefined schemes', 'furnihome' ),
			'desc' => '',
			'options' => array(
				'default' => array('title' => 'Default', 'img' => get_template_directory_uri().'/assets/img/default.png'),
									), //Must provide key => value(array:title|img) pairs for radio options
			'std' => 'default'
			),

		array(
			'id' => 'developer_mode',
			'title' => esc_html__( 'Developer Mode', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off compile less to css and custom color', 'furnihome' ),
			'desc' => '',
			'std' => '0'
			),

		array(
			'id' => 'scheme_color',
			'type' => 'color',
			'title' => esc_html__('Color', 'furnihome'),
			'sub_desc' => esc_html__('Select main custom color.', 'furnihome'),
			'std' => ''
			),

		)
	);

$options[] = array(
	'title' => esc_html__('Layout', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">SmartAddons Framework comes with a layout setting that allows you to build any number of stunning layouts and apply theme to your entries.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_319_sort.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'layout',
			'type' => 'select',
			'title' => esc_html__('Box Layout', 'furnihome'),
			'sub_desc' => esc_html__( 'Select Layout Box or Wide', 'furnihome' ),
			'options' => array(
				'full' => esc_html__( 'Wide', 'furnihome' ),
				'boxed' => esc_html__( 'Boxed', 'furnihome' )
				),
			'std' => 'wide'
			),

		array(
			'id' => 'bg_box_img',
			'type' => 'upload',
			'title' => esc_html__('Background Box Image', 'furnihome'),
			'sub_desc' => '',
			'std' => ''
			),
		array(
			'id' => 'sidebar_left_expand',
			'type' => 'select',
			'title' => esc_html__('Left Sidebar Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12', 
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '3',
			'sub_desc' => esc_html__( 'Select width of left sidebar.', 'furnihome' ),
			),

		array(
			'id' => 'sidebar_right_expand',
			'type' => 'select',
			'title' => esc_html__('Right Sidebar Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12',
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '3',
			'sub_desc' => esc_html__( 'Select width of right sidebar medium desktop.', 'furnihome' ),
			),
		array(
			'id' => 'sidebar_left_expand_md',
			'type' => 'select',
			'title' => esc_html__('Left Sidebar Medium Desktop Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12',
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '4',
			'sub_desc' => esc_html__( 'Select width of left sidebar medium desktop.', 'furnihome' ),
			),
		array(
			'id' => 'sidebar_right_expand_md',
			'type' => 'select',
			'title' => esc_html__('Right Sidebar Medium Desktop Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12',
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '4',
			'sub_desc' => esc_html__( 'Select width of right sidebar.', 'furnihome' ),
			),
		array(
			'id' => 'sidebar_left_expand_sm',
			'type' => 'select',
			'title' => esc_html__('Left Sidebar Tablet Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12',
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '4',
			'sub_desc' => esc_html__( 'Select width of left sidebar tablet.', 'furnihome' ),
			),
		array(
			'id' => 'sidebar_right_expand_sm',
			'type' => 'select',
			'title' => esc_html__('Right Sidebar Tablet Expand', 'furnihome'),
			'options' => array(
				'2' => '2/12',
				'3' => '3/12',
				'4' => '4/12',
				'5' => '5/12',
				'6' => '6/12',
				'7' => '7/12',
				'8' => '8/12',
				'9' => '9/12',
				'10' => '10/12',
				'11' => '11/12',
				'12' => '12/12'
				),
			'std' => '4',
			'sub_desc' => esc_html__( 'Select width of right sidebar tablet.', 'furnihome' ),
			),				
		)
);

$options[] = array(
	'title' => esc_html__('Header & Footer', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">SmartAddons Framework comes with a header and footer setting that allows you to build style header.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_336_read_it_later.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'header_style',
			'type' => 'select',
			'title' => esc_html__('Header Style', 'furnihome'),
			'sub_desc' => esc_html__('Select Header style', 'furnihome'),
			'options' => array(
				'style1'  => esc_html__( 'Style 1', 'furnihome' ),
				'style2'  => esc_html__( 'Style 2', 'furnihome' ),
				),
			'std' => 'style1'
			),

		array(
			'id' => 'disable_search',
			'title' => esc_html__( 'Disable Search', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Check this to disable search on header', 'furnihome' ),
			'desc' => '',
			'std' => '0'
			),

		array(
			'id' => 'disable_cart',
			'title' => esc_html__( 'Disable Cart', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Check this to disable cart on header', 'furnihome' ),
			'desc' => '',
			'std' => '0'
			),				

		array(
			'id' => 'footer_style',
			'type' => 'pages_select',
			'title' => esc_html__('Footer Style', 'furnihome'),
			'sub_desc' => esc_html__('Select Footer style', 'furnihome'),
			'std' => ''
			),

		array(
			'id' => 'copyright_style',
			'type' => 'select',
			'title' => esc_html__('Copyright Style', 'furnihome'),
			'sub_desc' => esc_html__('Select Copyright style', 'furnihome'),
			'options' => array(
				'style1'  => esc_html__( 'Style 1', 'furnihome' ),
				'style2'  => esc_html__( 'Style 2', 'furnihome' ),
				),
			'std' => 'style1'
			),

		array(
			'id' => 'footer_copyright',
			'type' => 'editor',
			'sub_desc' => '',
			'title' => esc_html__( 'Copyright text', 'furnihome' )
			),	

		)
);
$options[] = array(
	'title' => esc_html__('Navbar Options', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">If you got a big site with a lot of sub menus we recommend using a mega menu. Just select the dropbox to display a menu as mega menu or dropdown menu.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_157_show_lines.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'menu_type',
			'type' => 'select',
			'title' => esc_html__('Menu Type', 'furnihome'),
			'options' => array( 'dropdown' => 'Dropdown Menu', 'mega' => 'Mega Menu' ),
			'std' => 'mega'
			),

		array(
			'id' => 'menu_location',
			'type' => 'menu_location_multi_select',
			'title' => esc_html__('Theme Location', 'furnihome'),
			'sub_desc' => esc_html__( 'Select theme location to active mega menu and menu responsive.', 'furnihome' ),
			'std' => 'primary_menu'
			),		

		array(
			'id' => 'sticky_menu',
			'type' => 'checkbox',
			'title' => esc_html__('Active sticky menu', 'furnihome'),
			'sub_desc' => '',
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
						),

		array(
			'id' => 'menu_event',
			'type' => 'select',
			'title' => esc_html__('Menu Event', 'furnihome'),
			'options' => array( '' => esc_html__( 'Hover Event', 'furnihome' ), 'click' => esc_html__( 'Click Event', 'furnihome' ) ),
			'std' => ''
			),

		array(
			'id' => 'menu_number_item',
			'type' => 'text',
			'title' => esc_html__( 'Number Item Vertical', 'furnihome' ),
			'sub_desc' => esc_html__( 'Number item vertical to show', 'furnihome' ),
			'std' => 8
			),	

		array(
			'id' => 'menu_more_text',
			'type' => 'text',
			'title' => esc_html__('Vertical More Text', 'furnihome'),
			'sub_desc' => esc_html__( 'Change more text on vertical menu', 'furnihome' ),
			'std' => ''
			),

		array(
			'id' => 'menu_less_text',
			'type' => 'text',
			'title' => esc_html__('Vertical Less Text', 'furnihome'),
			'sub_desc' => esc_html__( 'Change less text on vertical menu', 'furnihome' ),
			'std' => ''
			)	
		)
);
$options[] = array(
	'title' => esc_html__('Blog Options', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Select layout in blog listing page.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_071_book.png',
		//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'sidebar_blog',
			'type' => 'select',
			'title' => esc_html__('Sidebar Blog Layout', 'furnihome'),
			'options' => array(
				'full' => esc_html__( 'Full Layout', 'furnihome' ),		
				'left'	=>  esc_html__( 'Left Sidebar', 'furnihome' ),
				'right' => esc_html__( 'Right Sidebar', 'furnihome' ),
				),
			'std' => 'left',
			'sub_desc' => esc_html__( 'Select style sidebar blog', 'furnihome' ),
			),
		array(
			'id' => 'blog_layout',
			'type' => 'select',
			'title' => esc_html__('Layout blog', 'furnihome'),
			'options' => array(
				'list'	=>  esc_html__( 'List Layout', 'furnihome' ),
				'grid' =>  esc_html__( 'Grid Layout', 'furnihome' )								
				),
			'std' => 'list',
			'sub_desc' => esc_html__( 'Select style layout blog', 'furnihome' ),
			),
		array(
			'id' => 'blog_column',
			'type' => 'select',
			'title' => esc_html__('Blog column', 'furnihome'),
			'options' => array(								
				'2' => '2 columns',
				'3' => '3 columns',
				'4' => '4 columns'								
				),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select style number column blog', 'furnihome' ),
			),
		)
);	
$options[] = array(
	'title' => esc_html__('Product Options', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Select layout in product listing page.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_202_shopping_cart.png',
		//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'product_banner',
			'title' => esc_html__( 'Select Banner', 'furnihome' ),
			'type' => 'select',
			'sub_desc' => '',
			'options' => array(
				'' => esc_html__( 'Use Banner', 'furnihome' ),
				'listing' => esc_html__( 'Use Category Product Image', 'furnihome' ),
				),
			'std' => '',
			),

		array(
			'id' => 'product_listing_banner',
			'type' => 'upload',
			'title' => esc_html__('Listing Banner Product', 'furnihome'),
			'sub_desc' => esc_html__( 'Use the Upload button to upload banner product listing', 'furnihome' ),
			'std' => get_template_directory_uri().'/assets/img/bg-shop.jpg'
			),

		array(
			'id' => 'product_col_large',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Desktop', 'furnihome'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',							
				),
			'std' => '3',
			'sub_desc' => esc_html__( 'Select number of column on Desktop Screen', 'furnihome' ),
			),

		array(
			'id' => 'product_col_medium',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Medium Desktop', 'furnihome'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',							
				),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select number of column on Medium Desktop Screen', 'furnihome' ),
			),

		array(
			'id' => 'product_col_sm',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Tablet', 'furnihome'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',							
				),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select number of column on Tablet Screen', 'furnihome' ),
			),

		array(
			'id' => 'sidebar_product',
			'type' => 'select',
			'title' => esc_html__('Sidebar Product Layout', 'furnihome'),
			'options' => array(
				'left'	=> esc_html__( 'Left Sidebar', 'furnihome' ),
				'full' => esc_html__( 'Full Layout', 'furnihome' ),		
				'right' => esc_html__( 'Right Sidebar', 'furnihome' )
				),
			'std' => 'left',
			'sub_desc' => esc_html__( 'Select style sidebar product', 'furnihome' ),
			),

		array(
			'id' => 'product_quickview',
			'title' => esc_html__( 'Quickview', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off Product Quickview', 'furnihome' ),
			'std' => '1'
			),

		array(
			'id' => 'product_zoom',
			'title' => esc_html__( 'Product Zoom', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off image zoom when hover on single product', 'furnihome' ),
			'std' => '1'
			),

		array(
			'id' => 'product_number',
			'type' => 'text',
			'title' => esc_html__('Product Listing Number', 'furnihome'),
			'sub_desc' => esc_html__( 'Show number of product in listing product page.', 'furnihome' ),
			'std' => 12
			),

		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Config For Product Categories Widget', 'furnihome' ),
			'desc' => '',
			'class' => 'furnihome-opt-info'
			),

		array(
			'id' => 'product_number_item',
			'type' => 'text',
			'title' => esc_html__( 'Category Number Item Show', 'furnihome' ),
			'sub_desc' => esc_html__( 'Choose to number of item category that you want to show, leave 0 to show all category', 'furnihome' ),
			'std' => 8
			),	

		array(
			'id' => 'product_more_text',
			'type' => 'text',
			'title' => esc_html__( 'Category More Text', 'furnihome' ),
			'sub_desc' => esc_html__( 'Change more text on category product', 'furnihome' ),
			'std' => ''
			),

		array(
			'id' => 'product_less_text',
			'type' => 'text',
			'title' => esc_html__( 'Category Less Text', 'furnihome' ),
			'sub_desc' => esc_html__( 'Change less text on category product', 'furnihome' ),
			'std' => ''
			)	
		)
);		
$options[] = array(
	'title' => esc_html__('Typography', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Change the font style of your blog, custom with Google Font.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_151_edit.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Global Typography', 'furnihome' ),
			'desc' => '',
			'class' => 'furnihome-opt-info'
			),

		array(
			'id' => 'google_webfonts',
			'type' => 'google_webfonts',
			'title' => esc_html__('Use Google Webfont', 'furnihome'),
			'sub_desc' => esc_html__( 'Insert font style that you actually need on your webpage.', 'furnihome' ), 
			'std' => ''
			),

		array(
			'id' => 'webfonts_weight',
			'type' => 'multi_select',
			'sub_desc' => esc_html__( 'For weight, see Google Fonts to custom for each font style.', 'furnihome' ),
			'title' => esc_html__('Webfont Weight', 'furnihome'),
			'options' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900'
				),
			'std' => ''
			),

		array(
			'id' => 'info_typo2',
			'type' => 'info',
			'title' => esc_html( 'Header Tag Typography', 'furnihome' ),
			'desc' => '',
			'class' => 'furnihome-opt-info'
			),

		array(
			'id' => 'header_tag_font',
			'type' => 'google_webfonts',
			'title' => esc_html__('Header Tag Font', 'furnihome'),
			'sub_desc' => esc_html__( 'Select custom font for header tag ( h1...h6 )', 'furnihome' ), 
			'std' => ''
			),

		array(
			'id' => 'info_typo2',
			'type' => 'info',
			'title' => esc_html( 'Main Menu Typography', 'furnihome' ),
			'desc' => '',
			'class' => 'furnihome-opt-info'
			),

		array(
			'id' => 'menu_font',
			'type' => 'google_webfonts',
			'title' => esc_html__('Main Menu Font', 'furnihome'),
			'sub_desc' => esc_html__( 'Select custom font for main menu', 'furnihome' ), 
			'std' => ''
			),

		)
);

$options[] = array(
	'title' => __('Social', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">This feature allow to you link to your social.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_222_share.png',
		//Lets leave this as a blank section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'social-share-fb',
			'title' => esc_html__( 'Facebook', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-tw',
			'title' => esc_html__( 'Twitter', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-tumblr',
			'title' => esc_html__( 'Tumblr', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-in',
			'title' => esc_html__( 'Linkedin', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-instagram',
			'title' => esc_html__( 'Instagram', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-go',
			'title' => esc_html__( 'Google+', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			),
		array(
			'id' => 'social-share-pi',
			'title' => esc_html__( 'Pinterest', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
			)

		)
);

$options[] = array(
	'title' => esc_html__('Popup Config', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Enable popup and more config for Popup.</p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'popup_active',
			'type' => 'checkbox',
			'title' => esc_html__( 'Active Popup Subscribe', 'furnihome' ),
			'sub_desc' => esc_html__( 'Check to active popup subscribe', 'furnihome' ),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
						),	

		array(
			'id' => 'popup_background',
			'title' => esc_html__( 'Popup Background', 'furnihome' ),
			'type' => 'upload',
			'sub_desc' => esc_html__( 'Choose popup background image', 'furnihome' ),
			'desc' => '',
			'std' => get_template_directory_uri().'/assets/img/popup/bg-main.jpg'
			),

		array(
			'id' => 'popup_content',
			'title' => esc_html__( 'Popup Content', 'furnihome' ),
			'type' => 'editor',
			'sub_desc' => esc_html__( 'Change text of popup mode', 'furnihome' ),
			'desc' => '',
			'std' => ''
			),	

		array(
			'id' => 'popup_form',
			'title' => esc_html__( 'Popup Form', 'furnihome' ),
			'type' => 'text',
			'sub_desc' => esc_html__( 'Put shortcode form to this field and it will be shown on popup mode frontend.', 'furnihome' ),
			'desc' => '',
			'std' => ''
			),

		)
);

$options[] = array(
	'title' => esc_html__('Advanced', 'furnihome'),
	'desc' => wp_kses( __('<p class="description">Custom advanced with Cpanel, Widget advanced, Developer mode </p>', 'furnihome'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it furnihome for default.
	'icon' => FURNI_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a furnihome section, no options just some intro text set above.
	'fields' => array(

		array(
			'id' => 'widget-advanced',
			'title' => esc_html__('Widget Advanced', 'furnihome'),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off Widget Advanced', 'furnihome' ),
			'desc' => '',
			'std' => '1'
			),					

		array(
			'id' => 'social_share',
			'title' => esc_html__( 'Social Share', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off social share', 'furnihome' ),
			'desc' => '',
			'std' => '1'
			),

		array(
			'id' => 'breadcrumb_active',
			'title' => esc_html__( 'Turn Off Breadcrumb', 'furnihome' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn off breadcumb on all page', 'furnihome' ),
			'desc' => '',
			'std' => '0'
			),

		array(
			'id' => 'back_active',
			'type' => 'checkbox',
			'title' => esc_html__('Back to top', 'furnihome'),
			'sub_desc' => '',
			'desc' => '',
						'std' => '1'// 1 = on | 0 = off
						),	

		array(
			'id' => 'direction',
			'type' => 'select',
			'title' => esc_html__('Direction', 'furnihome'),
			'options' => array( 'ltr' => 'Left to Right', 'rtl' => 'Right to Left' ),
			'std' => 'ltr'
			),

		)
);

$options_args = array();

	//Setup custom links in the footer for share icons
$options_args['share_icons']['facebook'] = array(
	'link' => 'http://www.facebook.com/SmartAddons.page',
	'title' => 'Facebook',
	'img' => FURNI_URL.'/options/img/glyphicons/glyphicons_320_facebook.png'
	);
$options_args['share_icons']['twitter'] = array(
	'link' => 'https://twitter.com/smartaddons',
	'title' => 'Folow me on Twitter',
	'img' => FURNI_URL.'/options/img/glyphicons/glyphicons_322_twitter.png'
	);
$options_args['share_icons']['linked_in'] = array(
	'link' => 'http://www.linkedin.com/in/smartaddons',
	'title' => 'Find me on LinkedIn',
	'img' => FURNI_URL.'/options/img/glyphicons/glyphicons_337_linked_in.png'
	);


	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$options_args['opt_name'] = FURNIHOME_THEME;

	$options_args['google_api_key'] = 'AIzaSyAL_XMT9t2KuBe2MIcofGl6YF1IFzfB4L4'; //must be defined for use with google webfonts field type

	//Custom menu title for options page - default is "Options"
	$options_args['menu_title'] = esc_html__('Theme Options', 'furnihome');

	//Custom Page Title for options page - default is "Options"
	$options_args['page_title'] = esc_html__('Furnihome Options ', 'furnihome') . wp_get_theme()->get('Name');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "furnihome_theme_options"
	$options_args['page_slug'] = 'furnihome_theme_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	$options_args['page_type'] = 'submenu';

	//custom page location - default 100 - must be unique or will override other items
	$options_args['page_position'] = 27;
	$furnihome_options = new Furnihome_Options( $options, $options_args );
}
add_action( 'admin_init', 'furnihome_Options_Setup', 0 );
furnihome_Options_Setup();

function furnihome_widget_setup_args(){
	$furnihome_widget_areas = array(
		
		array(
			'name' => esc_html__('Sidebar Left Blog', 'furnihome'),
			'id'   => 'left-blog',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),
		array(
			'name' => esc_html__('Sidebar Right Blog', 'furnihome'),
			'id'   => 'right-blog',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),
		array(
			'name' => esc_html__('Top', 'furnihome'),
			'id'   => 'top',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
			),	
		array(
			'name' => esc_html__('Header Right', 'furnihome'),
			'id'   => 'header-right',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
			),	
		array(
			'name' => esc_html__('Header Right 2', 'furnihome'),
			'id'   => 'header-right2',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
			),			
		array(
			'name' => esc_html__('Sidebar Left Product', 'furnihome'),
			'id'   => 'left-product',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),
		array(
			'name' => esc_html__('Sidebar Right Product', 'furnihome'),
			'id'   => 'right-product',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),				
		array(
			'name' => esc_html__('Sidebar Left Detail Product', 'furnihome'),
			'id'   => 'left-product-detail',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),		
		array(
			'name' => esc_html__('Sidebar Right Detail Product', 'furnihome'),
			'id'   => 'right-product-detail',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
			),		
		array(
			'name' => esc_html__('Sidebar Bottom Detail Product', 'furnihome'),
			'id'   => 'bottom-detail-product',
			'before_widget' => '<div class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
			),
		array(
			'name' => esc_html__('Footer Copyright', 'furnihome'),
			'id'   => 'footer-copyright',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
			),
		);
return apply_filters( 'furnihome_widget_register', $furnihome_widget_areas );
}