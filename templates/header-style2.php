<?php
/* 
** Content Header
*/
$furnihome_page_header = get_post_meta( get_the_ID(), 'page_header_style', true );
$furnihome_colorset = furnihome_options()->getCpanelValue('scheme');
$furnihome_logo = furnihome_options()->getCpanelValue('sitelogo');
$sticky_menu 		= furnihome_options()->getCpanelValue( 'sticky_menu' );
$furnihome_page_header  = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : furnihome_options()->getCpanelValue('header_style');
$furnihome_menu_item 	= ( furnihome_options()->getCpanelValue( 'menu_number_item' ) ) ? furnihome_options()->getCpanelValue( 'menu_number_item' ) : 9;
$furnihome_more_text 	= ( furnihome_options()->getCpanelValue( 'menu_more_text' ) )	 ? furnihome_options()->getCpanelValue( 'menu_more_text' )		: esc_html__( 'See More', 'furnihome' );
$furnihome_less_text 	= furnihome_options()->getCpanelValue( 'menu_less_text' )			 ? furnihome_options()->getCpanelValue( 'menu_less_text' )		: esc_html__( 'See Less', 'furnihome' );
?>
<header id="header" class="header header-<?php echo esc_attr( $furnihome_page_header ); ?>">
	<div class="header-top">
		<div class="container">
			<!-- Sidebar Top Menu -->
			<?php if (is_active_sidebar('top')) {?>
			<div class="top-header">
				<?php dynamic_sidebar('top'); ?>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="header-mid">
		<div class="container">
			<div class="row">
				<!-- Logo -->
				<div class="top-header col-lg-3 col-md-2 pull-left">
					<div class="furnihome-logo">
						<?php furnihome_logo(); ?>
					</div>
				</div>
				<?php if (is_active_sidebar('header-right')) {?>
				<div  class="header-right">
					<?php dynamic_sidebar('header-right'); ?>
				</div>
				<?php }?>
				<?php if( !furnihome_options()->getCpanelValue( 'disable_search' ) ) : ?>
				<div class="search-cate pull-right">
					<?php if( is_active_sidebar( 'search' ) && class_exists( 'sw_woo_search_widget' ) ): ?>
						<?php dynamic_sidebar( 'search' ); ?>
					<?php else : ?>
						<div class="widget furnihome_top non-margin">
							<div class="widget-inner">
								<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<div class="row">
				<!-- Primary navbar -->
				<?php if ( has_nav_menu('primary_menu') ) { ?>
				<div id="main-menu" class="main-menu clearfix col-lg-7 col-md-7 pull-left">
					<nav id="primary-menu" class="primary-menu">
						<div class="mid-header clearfix">
							<div class="navbar-inner navbar-inverse">
								<?php
								$furnihome_menu_class = 'nav nav-pills';
								if ( 'mega' == furnihome_options()->getCpanelValue('menu_type') ){
									$furnihome_menu_class .= ' nav-mega';
								} else $furnihome_menu_class .= ' nav-css';
								?>
								<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $furnihome_menu_class)); ?>
							</div>
						</div>
					</nav>
				</div>			
				<?php } ?>
				<!-- /Primary navbar -->
				<?php if (is_active_sidebar('header-right2')) {?>
				<div  class="header-right2">
					<?php dynamic_sidebar('header-right2'); ?>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</header>