<?php
class Furnihome_Resmenu{
	function __construct(){
		add_filter( 'wp_nav_menu_args' , array( $this , 'Furnihome_MenuRes_AdFilter' ), 100 ); 
		add_filter( 'wp_nav_menu_args' , array( $this , 'Furnihome_MenuRes_Filter' ), 110 );	
		add_action( 'wp_footer', array( $this  , 'Furnihome_MenuRes_AdScript' ), 110 );	
	}
	function Furnihome_MenuRes_AdScript(){
		$html  = '<script type="text/javascript">';
		$html .= '(function($) {
			/* Responsive Menu */
			$(document).ready(function(){
				$( ".show-dropdown" ).each(function(){
					$(this).on("click", function(){
						$(this).toggleClass("show");
						var $element = $(this).parent().find( "> ul" );
						$element.toggle( 300 );
					});
				});
			});
		})(jQuery);';
		$html .= '</script>';
		echo $html;
	}
	function Furnihome_MenuRes_AdFilter( $args ){
		$args['container'] = false;
		$furnihome_theme_locates = array();
		$furnihome_menu = furnihome_options()->getCpanelValue( 'menu_location' );
		if( !is_array( $furnihome_menu ) ){
			$furnihome_theme_locates[] = $furnihome_menu;
		}else{
			$furnihome_theme_locates = $furnihome_menu;
		}
		foreach( $furnihome_theme_locates as $furnihome_theme_locate ){
			if ( ( strcmp( $furnihome_theme_locate, $args['theme_location'] ) == 0 ) ) {	
				if( isset( $args['furnihome_resmenu'] ) && $args['furnihome_resmenu'] == true ) {
					return $args;
				}		
				$ResNavMenu = $this->ResNavMenu( $args );
				$args['container'] = '';
				$args['container_class'].= '';	
				$args['menu_class'].= ($args['menu_class'] == '' ? '' : ' ') . 'furnihome-menures';			
				$args['items_wrap']	= '<ul id="%1$s" class="%2$s">%3$s</ul>'.$ResNavMenu;
			}			
		}
		return $args;
	}
	function ResNavMenu( $args ){
		$args['furnihome_resmenu'] = true;		
		$select = wp_nav_menu( $args );
		return $select;
	}
	function Furnihome_MenuRes_Filter( $args ){
		/* Fix Menu on wp 4.7 */
		if( !isset( $args['furnihome_resmenu'] ) ){
			return $args;
		}
		$args['container'] = false;
		$furnihome_theme_locates = array();
		$furnihome_menu = furnihome_options()->getCpanelValue( 'menu_location' );
		if( !is_array( $furnihome_menu ) ){
			$furnihome_theme_locates[] = $furnihome_menu;
		}else{
			$furnihome_theme_locates = $furnihome_menu;
		}
		foreach( $furnihome_theme_locates as $furnihome_theme_locate ){
			if ( ( strcmp( $furnihome_theme_locate, $args['theme_location'] ) == 0 ) ) {	
				$args['container'] = 'div';
				$args['container_class'].= 'resmenu-container';
				$args['items_wrap']	= '<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenu'. esc_attr( $furnihome_theme_locate ) .'">
					<span class="sr-only">Categories</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button><div id="ResMenu'. esc_attr( $furnihome_theme_locate ) .'" class="collapse menu-responsive-wrapper"><ul id="%1$s" class="%2$s">%3$s</ul></div>';	
				$args['menu_class'] = 'furnihome_resmenu';
				$args['walker'] = new PACO_ResMenu_Walker();
			}			
		}
		return $args;
	}
}
class PACO_ResMenu_Walker extends Walker_Nav_Menu {
	function check_current($classes) {
		return preg_match('/(current[-_])|active|dropdown/', $classes);
	}

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"dropdown-resmenu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);
		if( !$item->is_dropdown && ($depth === 0) ){
			$item_html = str_replace('<a', '<a class="item-link"', $item_html);			
			$item_html = str_replace('</a>', '</a>', $item_html);			
		}
		if ( $item->is_dropdown ) {
			$item_html = str_replace('<a', '<a class="item-link dropdown-toggle"', $item_html);
			$item_html = str_replace('</a>', '</a>', $item_html);
			$item_html .= '<span class="show-dropdown"></span>';
		}
		$output .= $item_html;
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$element->is_dropdown = !empty($children_elements[$element->ID]);
		if ($element->is_dropdown) {			
			$element->classes[] = 'res-dropdown';
		}

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
new Furnihome_Resmenu();